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

        $data = mysqli_real_escape_string($db_connection, $data);
        $data = strip_tags($data);
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
     * select any field from the users table.
     * this returns just a row
     * @param $field
     * @param $where_field
     * @param $has_value
     */
    function select_from_tb_users($field, $where_field, $has_value)
    {
        $db_connection = $GLOBALS['db_connection'];

        $select_from_users_query = "SELECT `$field` FROM `users` WHERE `$where_field` = '$has_value' LIMIT 1";

        $select_from_users_result = mysqli_query($db_connection, $select_from_users_query);

        if (!$select_from_users_result) {
            return 0;
        }

        if (mysqli_num_rows($select_from_users_result) !== 1) {
            return 0;
        }

        return mysqli_fetch_array($select_from_users_result);
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
     * return an array of all the ids in the articles table
     */
    function select_comment_ids()
    {
        $db_connection = $GLOBALS['db_connection'];

        $select_ids_query = "SELECT `comment_id` FROM `comments`";
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
     * return an assoc array of post_id, comment_text, comment_date and user_email
     * @param $which_has_this_id
     */
    function select_comment_row($which_has_this_id)
    {
        $db_connection = $GLOBALS['db_connection'];
        
        $read_comment_row_query = "SELECT `post_id`, `comment_text`, `comment_date`, `user_email` FROM `comments` WHERE  `comment_id`=" . $which_has_this_id . " LIMIT 1;";

        $read_comment_row_result = mysqli_query($db_connection, $read_comment_row_query);

        if (!$read_comment_row_result) {
            return 0;
        }

        if (mysqli_num_rows($read_comment_row_result) < 1) {
            return 0;
        }

        return mysqli_fetch_assoc($read_comment_row_result);
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


    /**
     * deletes the comments by article_id and returns a bool.
     * delete a comment (when you delete an artilce) by post_id
     * and by comment_id (when just deleting the comment)
     * @param $where_field: delete article from this field
     * @param $has_this_value: which has a value
     */
    function delete_from_tb_comments($where_field, $has_this_value)
    {
        $db_connection = $GLOBALS['db_connection'];

        $delete_comment_query = "DELETE FROM `comments` WHERE `$where_field` = '$has_this_value'";
        $delete_comment_result = mysqli_query($db_connection, $delete_comment_query);

        if (!$delete_comment_result) {
            return 0;
        }

        return 1;
    }


    /**
     * validates passwords
     * password must be at least greater than or eqaul to eight in size,
     * password must have at least an uppercase character,
     * an lowercase character,
     * a number and
     * a special character.
     * @param $password
     * @return bool
     */
    function validate_password($password)
    {
        $is_pwd_gte_8       = strlen($password) >= 8;
        $has_uppercase_char = preg_match('@[A-Z]@', $password);
        $has_lowercase_char = preg_match('@[a-z]@', $password);
        $has_number         = preg_match('@[0-9]@', $password);
        $has_special_char   = preg_match('@[^\w]@', $password);

        if (!$is_pwd_gte_8 || !$has_uppercase_char || !$has_lowercase_char || !$has_number || !$has_special_char) {
            return 0;
        }

        return 1;
    }


    /**
     * return an array of all the emails in the users table
     */
    function select_user_emails()
    {
        $db_connection = $GLOBALS['db_connection'];

        $select_user_email_query = "SELECT `user_email` FROM `users`";
        $select_user_email_result = mysqli_query($db_connection, $select_user_email_query);
        
        if (!$select_user_email_result) {
            return 0;
        }

        if (mysqli_num_rows($select_user_email_result) < 1) {
            return 0;
        }
        
        return mysqli_fetch_all($select_user_email_result);
    }


    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    /**
     * I intend to use this function to send email to users
     *
    */
    function send_email($receipient_email, $receipient_name, $subject, $content)
    {
        // Load Composer's autoloader
        require_once '../vendor/autoload.php';
        include_once "./gmail_configuration.php";


        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 2;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.googlemail.com';                  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = GUSERNAME;                              // SMTP username
            $mail->Password   = GPASSWORD;                              // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom(GEMAIL, GUSERNAME);
            // $mail->addAddress(GEMAIL, 'Joe Doe');     // Add a recipient
            // $mail->addAddress("popecan1000@gmail.com", 'Otumian-Empire');     // Add a recipient
            $mail->addAddress($receipient_email, $receipient_name);
            // $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo(GEMAIL, GUSERNAME);
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = /* 'Test Case'; */$subject;
            $mail->Body    = /* 'This is the HTML message body <b>in bold!</b>'; */$content;
            $mail->AltBody = /* 'This is the body in plain text for non-HTML mail clients Test Case'; */$subject;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


    /**
     * read the users first name and last name
     */
    function get_user_name($user_email)
    {
        $db_connection = $GLOBALS['db_connection'];

        $sql_select_user_name = "SELECT `user_first_name`, `user_last_name` FROM `users` WHERE `user_email` = '$user_email'";

        $select_user_name_result = mysqli_query($db_connection, $sql_select_user_name);

        if (!$select_user_name_result) {
            return 0;
        }

        $result = mysqli_fetch_array($select_user_name_result);

        return $result['user_first_name'] . " " . $result['user_last_name'];
    }

    
?>