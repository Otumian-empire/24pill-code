<?php
    include_once "controller_preprocessor.php"
?>

<?php
    if (isset($_POST['add-comment-btn'])) {

        // user can only added comment when they are logged in or have signed up
        if (!check_session()) {
            redirect_to('../login.php?error_msg=you must loggin or sign up to added a comment');
        }
        
        if (!isset($_GET['qid']) || !isset($_POST['comment-box'])) {
            redirect_to('../index.php');
        } else {
            
            
            if (strlen($_POST['comment-box']) > 5) {

                $user_email = get_user_email();
                // $comment_text = check_data(encode_data($_POST['comment-box']));
                $comment_text = encode_data($_POST['comment-box']);
                // requiring a lot of input to acchieve a little
                $post_id = $_GET['qid'];

                $insert_comment_query = "INSERT INTO `comments`(`post_id`, `comment_text`, `user_email`) VALUES ($post_id, \"$comment_text\", \"$user_email\")";

                $insert_result = mysqli_query($db_connection, $insert_comment_query);

                if (!$insert_result) {
                    redirect_to("../index.php?error_msg=".mysqli_error($db_connection));
                } else {
                    redirect_to("../article.php?qid=" . $post_id . "&error_msg=comment was added successfully");
                }

            } else {
                redirect_to("../article.php?qid=" . $post_id . "&error_msg=a minimum of 5 characters is required to be a valid comment");
            }
            
           
        }

    } else {
        redirect_to('../index.php');
    }
?>