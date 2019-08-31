<?php
    include_once "controller_preprocessor.php"
?>


<?php
    if (isset($_GET['search_button'])) {

        if (!isset($_GET['search_query']) || empty($_GET['search_query'])) {
            redirect_to('../?msg=you need to added a query or search item');
        } else {
            $search_request = encode_data($_GET['search_query']);

            // we'd search both the articles and comments for the match and return the post_id just like
            // it has been implemented on the all_articles.php

            $sql = 'SELECT `articles`.`post_id` 
                        FROM `articles` 
                        WHERE `articles`.`post_title` LIKE "%$search_request%" 
                        OR `articles`.`post_content` LIKE "%$search_request%" 
                        OR `articles`.`post_id` IN (
                                SELECT `comments`.`post_id`
                                FROM `comments`
                                WHERE `comments`.`comment_text` LIKE "%$search_request%"
                            );';

            $result = mysqli_query($db_connection, $sql);

            if (!$result) {
                redirect_to('../?msg=no+item+found+wrt+'.$search_request.'+in&search_query='.$search_request);
            }

            $search_responds = mysqli_fetch_assoc($result);

            redirect_to('../search.php?search_responds='.encode_data($search_responds).'&msg=success');

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