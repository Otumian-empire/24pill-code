<?php
    /**
     * this takes a string message as parameter and echos an error message,
     * @param $error_message
     */
    function error_message($error_message)
    {
        $db_connection = $GLOBALS['db_connection'];
        return "{$error_message} " . urlencode(mysqli_error($db_connection)) . "<br/>";
    }


    /**
     * Thie will mysqli_real_escape_string, trim, striplashes and htmlspecialchars on
     * the args given to it
     * @param $data
     */
    function check_data($data)
    {
        $db_connection = $GLOBALS['db_connection'];

        $data = mysqli_real_escape_string($db_connection, strip_tags($data));
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        if (!mb_check_encoding($data, 'UTF-8')) {

            // the string is not UTF-8, so re-encode it.
            $actualEncoding = mb_detect_encoding($data);
            $data = mb_convert_encoding($data, 'UTF-8', $actualEncoding);
        }

        return $data;
    }


    /**
     * This redirects to the page provided as an arg, $this_url
     * @param $this_url
     */
    function redirect_to($this_url)
    {
        header("Location: {$this_url}");
        exit();
    }

    
    /**
     * To check if the server is online
     */
    function ping_server()
    {
        $db_connection = $GLOBALS['db_connection'];

        return mysqli_ping($db_connection);
    }


    /**
     * inserts into database with respect to the parameters given
     * @param $values_in_array
     */
    function insert_into_tb_users($values_in_array)
    {
        $db_connection = $GLOBALS['db_connection'];

        $insert_into_users_query = "INSERT INTO `users`(`user_first_name`,`user_last_name`,`user_email`,`user_password`,`user_bio`)"
        . " VALUES('$values_in_array[0]','$values_in_array[1]','$values_in_array[2]','$values_in_array[3]',".
        "'$values_in_array[4]');";

        $insert_into_users_result = mysqli_query($db_connection, $insert_into_users_query);

        if (!$insert_into_users_result) {
            return 0;
        }

        return 1;
    }


    /**
     * inserts into database with respect to the parameters given
     * @param $values_in_array
     */
    function insert_into_tb_articles($values_in_array)
    {
        $db_connection = $GLOBALS['db_connection'];

        $insert_into_articles_query = "INSERT INTO `articles`(`user_email`, `post_title`, `post_content`)
        VALUES('$values_in_array[0]', '$values_in_array[1]', '$values_in_array[2]');";

        $insert_into_articles_result = mysqli_query($db_connection, $insert_into_articles_query);

        if (!$insert_into_articles_result) {
            return 0;
        }

        return 1;
    }


    /**
     * select email and password from table with respect to the parameters given
     * @param $values -> email and password
     * values is an array of email and password
     */
    function select_from_tb_users($values)
    {
        $db_connection = $GLOBALS['db_connection'];

        $select_from_users_query = "SELECT `users`.`user_email`, `users`.`user_password` FROM `users` WHERE `users`.`user_email` = '$values[0]' AND `users`.`user_password` = '$values[1]' LIMIT 1";

        $select_from_users_result = mysqli_query($db_connection, $select_from_users_query);

        if (!$select_from_users_result) {
            return 0;
        }

        if (mysqli_num_rows($select_from_users_result) !== 1) {
            return 0;
        }

        return 1;
    }


    /**
     * This function was intended to create a directory with the name (or username of the user)
     */
    function create_dir($dir_name)
    {
        if (!is_dir($dir_name)) {
            mkdir($dir_name);
            echo "dir created..";
        }
    }


    /**
     * check if session has been started
     * check if a user session is set return a boolean
     *
     */
    function check_session()
    {
        if (!$GLOBALS['db_connection'] || !isset($_SESSION['token'])) {
            return 0;
        }

        return 1;
    }


    /**
     * check if session isn't started and start a new session
     * else, set session with $data
     * @param $data
     */
    function set_session($data)
    {
        session_destroy();
        session_start();
        $_SESSION['token'] = $data;
    }


    /**
     * return generate a token for the session
     * @param $data
     */
    function generate_session_token($data)
    {
        // delimiter '____' was intensionally used
        return sha1($data) . "____" . $data;
    }


    /**
     * return the users email based on the token set.
     * explode the session token
     */
    function get_user_email()
    {
        if (!isset($_SESSION['token'])) {
            return 0;
        }

        return explode("____", $_SESSION['token'])[1];
    }


    /**
     * return an encoded string making use of htmlentities and htmlspecialchars
     * A rigorous version is check_data($data)
     * @param $data
     */
    function encode_data($data)
    {
        $db_connection = $GLOBALS['db_connection'];

        return htmlentities(htmlspecialchars(mysqli_real_escape_string($db_connection, $data)));
    }


    /**
     * return a decoded string making use of htmlspecialchars and htmlentities
     */
    function decode_data($data)
    {
        return htmlspecialchars_decode(html_entity_decode($data));
    }


    /**
     * returns a random alphanumeric characters, given the length of the data desired.
     * this random token generator function is provided by Scott.
     * source: https://stackoverflow.com/a/13733588/4592338
      */
    function generate_token()
    {
        define('TOKENLENGTH', 6);

        $token = "";

        $codeAlphabet  = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";

        $max = strlen($codeAlphabet);

        for ($i=0; $i < TOKENLENGTH; $i++) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }

        return $token;
    }


    /**
     * return a boolean comparing, if the current time stamp is gt the time given to
     * the token to expire.
     * @param `$token_dormancy`: the time given to the token to expire
     */
    function has_token_expired($token_dormancy)
    {
        // get the current time stamp
        $now = date('Y-m-d H:i:s', strtotime('now'));
        // and get token_dormancy, meaning, pass the $token_dormancy

        return strtotime($now) >= strtotime($token_dormancy) ? 1 : 0;

        // redirect_to token_field.php to return enter the new token as the old token
        // has expired.
    }


    /**
     * returns the token_dormancy period in `Y-m-d H:i:s` format
     */
    function get_dormancy_time()
    {
        return date('Y-m-d H:i:s', strtotime('now') + (60 * 30));
    }


    /**
     * returns the current time stamp in 'Y-m-d H:i:s' format
     */
    function get_current_time()
    {
        return date('Y-m-d H:i:s', strtotime('now'));
    }


    /**
     * return a bool on the success of updating the users table
     * @param $set_field: the field to be updated
     * @param $to_this_value: the value to set to the updating field
     * @param $where_field: changes to this particular field
     * @param $is_this_value: changes should happen to the field which has this value
     * `UPDATE users_tb SET $set_field = $set_field = $to_this_value WHERE $where_field = $has_this_value`
     */
    function update_tb_users($set_field, $to_this_value, $where_field, $has_this_value)
    {
        $db_connection = $GLOBALS['db_connection'];

        $update_user_query = "UPDATE `users` SET `$set_field` = '$to_this_value' WHERE `$where_field`= '$has_this_value'";

        $update_user_result = mysqli_query($db_connection, $update_user_query);

        if (!$update_user_result) {
            return 0;
        }

        return 1;
    }


    /**
     * return a bool on the success of updating the articles table.
     * `UPDATE articles_tb SET $set_field = $set_field = $to_this_value WHERE $where_field = $has_this_value`
     * @param $set_field: the field to be updated
     * @param $to_this_value: the value to set to the updating field
     * @param $where_field: changes to this particular field
     * @param $is_this_value: changes should happen to the field which has this value
     */
    function update_tb_articles($set_field, $to_this_value, $where_field, $has_this_value)
    {
        $db_connection = $GLOBALS['db_connection'];

        $update_article_query = "UPDATE `articles` SET `$set_field` = '$to_this_value' WHERE `$where_field`= '$has_this_value'";

        $update_article_result = mysqli_query($db_connection, $update_article_query);

        if (!$update_article_result) {
            return 0;
        }

        return 1;
    }


    /**
     * return a bool on the success of updating the comments table
     * @param $set_field: the field to be updated
     * @param $to_this_value: the value to set to the updating field
     * @param $where_field: changes to this particular field
     * @param $is_this_value: changes should happen to the field which has this value
     * `UPDATE comments_tb SET $set_field = $set_field = $to_this_value WHERE $where_field = $has_this_value`
     */
    function update_tb_comments($set_field, $to_this_value, $where_field, $has_this_value)
    {
        $db_connection = $GLOBALS['db_connection'];

        $update_comment_query = "UPDATE `comments` SET `$set_field` = '$to_this_value' WHERE `$where_field` = '$has_this_value'";

        $update_comment_result = mysqli_query($db_connection, $update_comment_query);

        if (!$update_comment_result) {
            return 0;
        }

        return 1;
    }
    

    /**
     * deletes the token by user_email and returns a bool
     * @param $where_field: delete token from this field
     * @param $has_this_value: which has a value
     */
    function delete_from_tb_token($where_field, $has_this_value)
    {
        $db_connection = $GLOBALS['db_connection'];

        $delete_token_query = "DELETE FROM `tokens` WHERE `$where_field` = '$has_this_value'";
        $delete_token_result = mysqli_query($db_connection, $delete_token_query);

        if (!$delete_token_result) {
            return 0;
        }

        return 1;
    }


    /**
     * insert comment into the comments table
     * @param $comment_data_list: an array of post_id, comment_text and user_email
     */
    function insert_into_tb_comment($comment_data_list)
    {
        $db_connection = $GLOBALS['db_connection'];

        $insert_comment_query = "INSERT INTO `comments`(`post_id`, `comment_text`, `user_email`) VALUES ($comment_data_list[0], '$comment_data_list[1]', '$comment_data_list[2]')";

        $insert_comment_result = mysqli_query($db_connection, $insert_comment_query);

        if (!$insert_comment_result) {
            return 0;
        }

        return 1;
    }


    /**
     * deletes all user comments and returns a bool on success
     * @param $where_field
     * @param $has_value
     */
    function delete_all_user_comments($where_field, $has_value)
    {
        $db_connection = $GLOBALS['db_connection'];

        $delete_all_user_comments_query = "DELETE FROM `comments` WHERE `$where_field` = '$has_value'";

        $delete_all_user_comments_result = mysqli_query($db_connection, $delete_all_user_comments_query);

        if (!$delete_all_user_comments_result) {
            return 0;
        }

        return 1;
    }
    

    /**
     * delete all user articles and return a bool
     * @param $where_field
     * @param $has_value
     */
    function delete_all_user_articles($where_field, $has_value)
    {
        $db_connection = $GLOBALS['db_connection'];

        $delete_all_user_articles_query = "DELETE FROM `articles` WHERE `$where_field` = '$has_value'";
        $delete_all_user_articles_result = mysqli_query($db_connection, $delete_all_user_articles_query);

        if (!$delete_all_user_articles_result) {
            return 0;
        }

        return 1;
    }


    /**
     * delete user and return a bool
     * @param $where_field
     * @param $has_value
     */
    function delete_from_tb_user($where_field, $has_value)
    {
        $db_connection = $GLOBALS['db_connection'];
        
        $delete_user_query = "DELETE FROM `users` WHERE `$where_field` = '$has_value'";
        $delete_user_result = mysqli_query($db_connection, $delete_user_query);

        if (!$delete_user_result) {
            return 0;
        }

        return 1;
    }


    /**
     * return an array of all the ids in the articles table
     */
    function select_article_ids()
    {
        $db_connection = $GLOBALS['db_connection'];

        $select_ids_query = "SELECT `post_id` FROM `articles`";
        $select_ids_result = mysqli_query($db_connection, $select_ids_query);
        
        if (!$select_ids_result) {
            return 0;
        }

        if (mysqli_num_rows($select_ids_result) < 1) {
            return 0;
        }
        
        return mysqli_fetch_all($select_ids_result);
    }


    /**
     * return an assoc array of post_title, post_content, post_date and user_email
     * @param $which_has_this_id
     */
    function select_article_row($which_has_this_id)
    {
        $db_connection = $GLOBALS['db_connection'];
        
        $read_article_row_query = "SELECT `post_title`, `post_content`, `post_date`, `user_email` FROM `articles` WHERE  `post_id`=" . $which_has_this_id . " LIMIT 1;";

        $read_article_row_result = mysqli_query($db_connection, $read_article_row_query);

        if (!$read_article_row_result) {
            return 0;
        }

        if (mysqli_num_rows($read_article_row_result) < 1) {
            return 0;
        }

        return mysqli_fetch_assoc($read_article_row_result);
    }

    
    /**
     * deletes the article by article_id and returns a bool
     * @param $where_field: delete article from this field
     * @param $has_this_value: which has a value
     */
    function delete_from_tb_article($where_field, $has_this_value)
    {
        $db_connection = $GLOBALS['db_connection'];

        $delete_article_query = "DELETE FROM `articles` WHERE `$where_field` = '$has_this_value'";
        $delete_article_result = mysqli_query($db_connection, $delete_article_query);

        if (!$delete_article_result) {
            return 0;
        }

        return 1;
    }
