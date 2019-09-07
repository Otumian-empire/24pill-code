<?php
    /**
     * this takes a string message as parameter and echos an error message,
     */
    function error_message($error_message)
    {
        $db_connection = $GLOBALS['db_connection'];
        return "{$error_message}" . urlencode(mysqli_error($db_connection)) . "<br/>";
    }


    /**
     * Thie will mysqli_real_escape_string, trim, striplashes and htmlspecialchars on 
     * the args given to it
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
     * This redirects to the page provided as an arg, $where
     */
    function redirect_to($where)
    {
        header("Location: {$where}");
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
     * updates the database with respect to the parameters given
     * @param $table_name
     * @param $field
     * @param $fields_value
     * @param $token
     */
    function update_tb($table_name, $field, $to, $token)
    {
        $db_connection = $GLOBALS['db_connection'];

        $sql = "UPDATE `$table_name` SET `$field` = '$fields_value' WHERE `index_number` = '$token'";

        $query = mysqli_query($db_connection, $sql);

        if (!$query) {
            echo "I am not sure of what is going on there.. " . mysqli_error($db_connection);
            return 0;
        }

        return 1;
    }


    /**
     * inserts into database with respect to the parameters given
     * @param $values_in_array
     */
    function insert_into_tb_users($values_in_array)
    {
        $db_connection = $GLOBALS['db_connection'];

        $sql = "INSERT INTO `users`(`user_first_name`,`user_last_name`,`user_email`,`user_password`,`user_bio`)" 
        . " VALUES('$values_in_array[0]','$values_in_array[1]','$values_in_array[2]','$values_in_array[3]',".
        "'$values_in_array[4]');";

        $query = mysqli_query($db_connection, $sql);

        if (!$query) {
            echo "System may be down, please try in a second later.. " . mysqli_error($db_connection);
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

        $sql = "INSERT INTO `articles`(`user_email`, `post_title`, `post_content`)
        VALUES(\"$values_in_array[0]\",\"$values_in_array[1]\",\"$values_in_array[2]\");";

        $query = mysqli_query($db_connection, $sql);

        if (!$query) {
            echo "Either there is an issue with your input or just that our servers may ".
            "be down.<br>Reload in a second.. " . mysqli_error($db_connection);
            return 0;
        }

        return 1;
    }


    /**
     * select email and password from table with respect to the parameters given
     * @param $values
     * values is an array of email and password
     */
    function select_from_tb_users($values)
    {
        $db_connection = $GLOBALS['db_connection'];

        $sql = "SELECT `users`.`user_email`, `users`.`user_password` FROM `users` WHERE `users`.`user_email` = " 
        . "\"$values[0]\"" . "AND `users`.`user_password` = " . "\"$values[1]\"" . "LIMIT 1";

        $query = mysqli_query($db_connection, $sql);

        if (!$query) {
            echo "Check your email and or password, and try again..." . mysqli_error($db_connection);
            return 0;
        }

        if (mysqli_num_rows($query) !== 1) {
            echo "You are creative, come up with a better and unique email<br> and or also use, a "
            ."strong password<br>". mysqli_error($db_connection);
            
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
     * else, set session to @param $data
     */
    function set_session($data)
    {
        session_destroy();
        session_start();
        $_SESSION['token'] = $data;
    }


    /**
     * generate a token for the session
     */
    function generate_session_token($data)
    {
        // delimiter '____' was intensionally used
        return sha1($data) . "____" . $data;
    }


    /**
     * return the users email based on the token set
     * explode the session token
     */
    function get_user_email()
    {
        return explode("____", $_SESSION['token'])[1];
    }


    /**
     * return an encoded string making use of htmlentities and htmlspecialchars
     * A rigorous version is check_data($data)
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
     * returns a random number, given the length of the data desired.
     * this random token generator function provided by Scott.
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
     * returns the token_dormancy period in 'Y-m-d H:i:s' format
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
     * return a bool on the success of updating the articles table
     * @param $set_field: the field to be updated
     * @param $to_this_value: the value to set to the updating field
     * @param $where_field: changes to this particular field
     * @param $is_this_value: changes should happen to the field which has this value
     * `UPDATE articles_tb SET $set_field = $set_field = $to_this_value WHERE $where_field = $has_this_value`
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
    