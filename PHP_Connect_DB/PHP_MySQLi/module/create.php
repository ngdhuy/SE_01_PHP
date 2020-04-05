<?php
    include_once('../helper/database_01.php');
    $d = new Database();
if(!empty($_POST)){
    $post_name = $_POST['post_name'];
    $comment = $_POST['comment'];
    $id_account = 1;
    $sql = "insert into post (content,account_id) values ('$post_name','$id_account')";
    if($d->executeQuery($sql))
    {
        $id_post = $d->insertID();
        $sql = "insert into comment (content,post_id) values ('$comment','$id_post')";
        $result = $d->executeQuery($sql);
        if($result) 
            header("Location: http://localhost/SE_01_PHP/PHP_Connect_DB/PHP_MySQLi/post_comment_01.php");
        else
            echo 'Insert fail';
            header("Location: http://localhost/SE_01_PHP/PHP_Connect_DB/PHP_MySQLi/post_comment_01.php");
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="inner" style="max-width:1200px; margin:0 auto;">
        <h1>Create Post</h1>
        <form action="create.php" method="post">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Displayname</label>
            <input type="text" class="form-control" readonly name="fname" placeholder="Displayname" value="admin" />
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Post Name</label>
            <input type="text" class="form-control" name="post_name" placeholder="Post Name" />
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Comment</label>
            <input type="text" class="form-control" name="comment" placeholder="comment content" />
        </div>
        <button class="btn btn-primary" type="submit">Save Changes</button>
        <a href="../post_comment_01.php"><button class="btn btn-secondary" type="button">Back</button></a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>