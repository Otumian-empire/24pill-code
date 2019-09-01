<?php
    include_once "controller_preprocessor.php"
?>


<?php
    if (isset($_GET['search_button'])) {
        
        if (!isset($_GET['search_query']) || empty($_GET['search_query'])) {
            redirect_to('../?msg=you need to added a query or search item');
        } else {

            $search_request = check_data($_GET['search_query']);

            $sql = "SELECT `articles`.`post_title`, `articles`.`post_date`, `articles`.`user_email`, `articles`.`post_id` FROM `articles` WHERE `articles`.`post_title` LIKE \"%$search_request%\" OR `articles`.`post_content` LIKE \"%$search_request%\" OR `articles`.`post_id` LIKE \"%$search_request%\"";
            $result = mysqli_query($db_connection, $sql);

            if (!$result) {
                redirect_to('../?msg=no+item+found+wrt+'.$search_request.'+in&search_query='.$search_request);
            }

            $search_responds = mysqli_fetch_all($result);

            if (!$search_responds) {
                redirect_to('../?msg=no+item+match+'.$search_request.'+in&search_query='.$search_request);
            }

            $JSONResponds = json_encode($search_responds);
            
            redirect_to('../search.php?search_query='.$search_request.'&msg=success&search_responds='.$JSONResponds);
        }

    } else {
        redirect_to('../?msg=use+the+search+bar+please+or+better+login');
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