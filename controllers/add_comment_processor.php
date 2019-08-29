<?php
    include_once "controller_preprocessor.php"
?>

<?php
    if (isset($_POST['add-comment-btn'])) {
        
        if (!isset($_GET['qid']) || !isset($_POST['comment-box'])) {
            echo "qid is not set or the comment is not set";
            exit;
        } else {
            
            $user_email = get_user_email();
            $comment_text = $_POST['comment-box'];
            $post_id = $_GET['qid'];

            $insert_comment_query = "INSERT INTO `comments`(`post_id`, `comment_text`, `user_email`) VALUES (\"$post_id\", \"$comment_text\", \"$user_email\")";

            $insert_result = mysqli_query($db_connection, $insert_comment_query);

            if (!$insert_result) {
                echo "add comment: unsuccessful, try again later";
                echo "<br>";
                echo mysqli_error($db_connection);
                exit;
            } else {
                echo "add comment: successful";
                exit;
            }
           
        }

    } else {
        echo "add-comment-btn is not clicked, please click";
        exit;
    }
?>

<?php
    // if (isset($_POST['comment-btn']) && isset($_POST['comment-box'])) {

    //     echo "comment btn, comment box is checked"; 
    //     if (!isset($_GET['qid'])) {
    //         echo "<br> qid is not set";
    //     } else {
    //         echo $_GET['qid'];
    //     }
        
        // // the minimun number for a valid comment is two
        // if (!empty($_POST['comment-box']) && strlen($_POST['comment-box']) >= 2) {
        //     // comment_id, post_id, comment_text, comment_date, user_email
        //     // default  ,$_POST['qid'], $user_comment, default, $user_email

        //     $post_id = $_POST['qid'];
        //     echo $_POST['qid'];
        //     // $comment_text = check_data($_POST['comment-box']);
        //     // $user_email = get_user_email();

        //     // $insert_comment_query = "INSERT INTO `comments`(`post_id`, `comment_text`, `user_email`) VALUES ({$post_id}, {$comment_text}, {$user_email})";

        //     // echo "{$post_id}, {$comment_text}, {$user_email}";

        // } else {
        //     // redirect_to("article.php?qid=" . $_POST['qid'] . "&error_msg=you can reply with an empty comment");
        //     echo "you can reply with an empty comment";
        //     // exit;
        // }
    // } else {
    //     // redirect_to("article.php?qid=" . $_POST['qid'] . "&error_msg=you have to sign in or up ...");
    //     echo "comment btn, comment box and qid not checked checked".mysqli_error($db_connection);
    //     // exit;
    // }
?>