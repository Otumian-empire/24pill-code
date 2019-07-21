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
     * @param $values
     */
    function insert_into_tb($values) {
        
        $db_connection = $GLOBALS['db_connection'];

        $sql = "INSERT INTO `users`(`user_first_name`,`user_last_name`,`user_email`,`user_password`,`user_bio`) VALUES(\"$values[0]\",\"$values[1]\",\"$values[2]\",\"$values[3]\",\"$values[4]\");";

        $query = mysqli_query($db_connection, $sql);

        if (!$query) {

            echo "I am not sure of what is going on there.. " . mysqli_error($db_connection);
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

        $sql = "SELECT `users`.`user_email`, `users`.`user_password` FROM `users` WHERE `users`.`user_email` = " . "\"$values[0]\"" . "AND `users`.`user_password` = " . "\"$values[1]\"" . "LIMIT 1";

        $query = mysqli_query($db_connection, $sql);

        if (!$query) {

            echo "I am not sure of what is going on there.. " . mysqli_error($db_connection);
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
        
        $db_connection = $GLOBALS['db_connection'];

        if($db_connection && isset($_SESSION['token'])) {
            return 1;
        }

        return 0;

    }

    /**
     * check if session isn't started and start a new session
     * else, set session to @param $data
     */
    function set_session($data) {
        
        if (!session_start()) {
            session_start();
        }

        $_SESSION['token'] = $data;
        
    }


    /**
     * generate a token for the session
     */
    function generate_session_token($data) {
        return sha1($data);
    }

?>
