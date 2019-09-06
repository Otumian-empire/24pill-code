<?php
    include_once "controller_preprocessor.php";


    if (isset($_GET['search_button'])) {
        
        if (!isset($_GET['search_query']) || empty($_GET['search_query'])) {
            redirect_to('../index.php?msg=you need to added a query or search item');
        } else {

            $search_request = strtolower(check_data(urlencode($_GET['search_query'])));

            $sql_search_query = "SELECT `articles`.`post_title`, `articles`.`post_date`, `articles`.`user_email`, `articles`.`post_id` FROM `articles` WHERE `articles`.`post_title` LIKE \"%$search_request%\" OR `articles`.`post_content` LIKE \"%$search_request%\" OR `articles`.`post_id` LIKE \"%$search_request%\"";
            
            $search_query_result = mysqli_query($db_connection, $sql_search_query);

            if (!$search_query_result) {
                redirect_to('../index.php?msg=no item found wrt '.$search_request.' in&search_query='.$search_request);
            }

            $search_responds = mysqli_fetch_all($search_query_result);

            if (!$search_responds) {
                redirect_to('../index.php?msg=no item match '.$search_request.' in&search_query='.$search_request);
            }

            // urlencoding each item in the array before passing it on
            foreach($search_responds as &$resp) {
                foreach($resp as &$val) {
                    $val = urlencode($val);
                }
            }   

            // pass the search_responds in a JSON format
            $JSONResponds = json_encode($search_responds);

            if (json_last_error() != JSON_ERROR_NONE) {
        	    // Use json_last_error_msg to display the message only, (not test against it)
                redirect_to("../index.php?msg=couldn't read the search result, JSON error ". json_last_error_msg());
            }

            redirect_to('../search.php?search_query='.$search_request.'&msg=success&search_responds='.$JSONResponds);
            
        }

    } else {
        redirect_to('../index.php?msg=use the search bar please or better login');
    }

?>


<?php
    /* 

                SELECT
                    `articles`.`post_id`
                    FROM
                        `articles`
                    WHERE
                        `articles`.`post_title` LIKE "%a%" OR `articles`.`post_content` LIKE "%a%" OR `articles`.`post_id` IN(
                        SELECT
                            `comments`.`post_id`
                        FROM
                            `comments`
                        WHERE
                            `comments`.`comment_text` LIKE "%a%"
                    );


                SELECT
                    `articles`.`post_id`
                FROM
                    `articles`
                WHERE
                    `articles`.`post_title` LIKE "%a%" OR `articles`.`post_content` LIKE "%a%" OR `articles`.`post_id` LIKE "%a%"
                UNION
                SELECT
                    `comments`.`post_id`
                FROM
                    `comments`
                WHERE
                    `comments`.`comment_text` LIKE "%a%";
            */
            ?>