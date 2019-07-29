<?php
    /** 
     * this takes a string message as parameter and echos an error message,
     */
    function error_message($error_message) {

        $db_connection = $GLOBALS['db_connection'];
        return "{$error_message}" . mysqli_error($db_connection) . "<br/>";

    }


    /** 
     * Thie will MRES, trim, striplashes and htmlspecialchars on the args given to it
     */
    function check_data($data) {

        $db_connection = $GLOBALS['db_connection'];

        $data = mysqli_real_escape_string($db_connection, strip_tags($data));
        $data = trim($data);
        $data = stripslashes($data);
        $data = strtolower(htmlspecialchars($data));

        return $data;

    }


    /**
     * This redirects to the page provided as an arg, $where
     */
    function redirect_to($where) {

        header("Location: {$where}");

        // reload the $where page
        // echo "<script> document.location.reload(); </script>";
        exit();

    }

    
    /**
     * To check if the server is online
     */
    function ping_server() {

        $db_connection = $GLOBALS['db_connection'];
        return mysqli_ping($db_connection);

    }


    /**
     * updates the database with respect to the parameters given
     * @param $table_name
     * @param $field
     * @param $fields_value
     * @param $token
     * 
     */
    function update_tb($table_name, $field, $to, $token) {
        
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
    function insert_into_users_tb($values_in_array) {
        
        $db_connection = $GLOBALS['db_connection'];

        $sql = "INSERT INTO `users`(`user_first_name`,`user_last_name`,`user_email`,`user_password`,`user_bio`) VALUES(\"$values_in_array[0]\",\"$values_in_array[1]\",\"$values_in_array[2]\",\"$values_in_array[3]\",\"$values_in_array[4]\");";

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
    function insert_into_articles_tb($values_in_array) {
        
        $db_connection = $GLOBALS['db_connection'];

        $sql = "INSERT INTO `articles`(`user_email`, `post_title`, `post_content`)
        VALUES(\"$values_in_array[0]\",\"$values_in_array[1]\",\"$values_in_array[2]\");";

        $query = mysqli_query($db_connection, $sql);

        if (!$query) {

            echo "Either there is an issue with your input or just that our servers may be down.<br>Reload in a second.. " . mysqli_error($db_connection);
            return 0;

        }

        return 1;

    }


    /**
     * select email and password from table with respect to the parameters given
     * @param $values
     * values is an array of email and password
     */
    function select_from_tb($values) {

        $db_connection = $GLOBALS['db_connection'];

        $sql = "SELECT `user_email`, `user_password` FROM `users` WHERE `user_email` = " . "\"$values[0]\"" . "AND `user_password` = " . "\"$values[1]\"" . "LIMIT 1";

        $query = mysqli_query($db_connection, $sql);

        if (!$query) {

            echo "Check your email and password, and try again..." . mysqli_error($db_connection);
            return 0;

        }

        return 1;

    }


    /**
     * This function was intended to create a directory with the name (or username of the user)
     */
    function create_dir($dir_name) {
        
        if (!is_dir($dir_name)) {

            mkdir($dir_name);
            echo "dir created..";

        }

    }


    /**
     * check if session has been started
     * check if a user session is set return 1 else 0
     * 
     */
    function check_session() {
    
        if(!$GLOBALS['db_connection'] || !isset($_SESSION['token'])) {
            return 0;
        }

        return 1;

    }


    /**
     * check if session isn't started and start a new session
     * else, set session to @param $data
     */
    function set_session($data) {
        
        session_destroy();
        session_start();
        $_SESSION['token'] = $data;
        
    }


    /**
     * generate a token for the session
     */
    function generate_session_token($data) {

        // delimiter '____' was intensionally used
        return sha1($data) . "____" . $data;
        
    }

?>
