<?php
    include_once "controller_preprocessor.php"
?>

<?php
    if (isset($_POST['add-comment-btn'])) {
        
        if (!isset($_GET['qid']) || !isset($_POST['comment-box'])) {
            redirect_to('../index.php');
        } else {
            
            $user_email = get_user_email();
            $comment_text = $_POST['comment-box'];
            $post_id = $_GET['qid'];

            $insert_comment_query = "INSERT INTO `comments`(`post_id`, `comment_text`, `user_email`) VALUES (\"$post_id\", \"$comment_text\", \"$user_email\")";

            $insert_result = mysqli_query($db_connection, $insert_comment_query);

            if (!$insert_result) {
                redirect_to("../index.php?error_msg=".mysqli_error($db_connection));
            } else {
                redirect_to("../article.php?qid=" . $post_id);
            }
           
        }

    } else {
        redirect_to('../index.php');
    }
?>
