<?php
    $account = unserialize($_SESSION['account']);
    $cmt = new Comment();
    $cmt->comment_content = $_POST['cmt_content'];
    $cmt->post_id = $_GET['post_id'];
    $cmt->acc_id = $account->acc_id;
    $cmt->save();

    header("Location: index.php?action=5");
    die();

?>