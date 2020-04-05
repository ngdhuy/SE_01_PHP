<?php 
    include_once('./helper/database_01.php');
    $d = new Database();
    $sql = "select p.id as id,a.display_name, p.content as noidung_post, c.content as noidung_comment from account as a, comment as c, post as p where a.id = p.account_id and p.id = c.post_id ";
    $result = $d->executeQuery($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="inner" style="max-width:1200px; margin:0 auto;">
<h1 class="text-center">Demo database 01</h1>
<a href="module/create.php"><button class="btn btn-primary" style="margin:15px 0;" type="button">create</button></a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="row">Displayname</th>
                    <th scope="row">Post Name</th>
                    <th scope="row">Comment</th>
                    <th scope="row">Action</th>
                </tr>
            </thead>
            <tbody>
            
            <?php while($row = mysqli_fetch_array($result)) {    extract($row);   ?>
                <tr>
                    <td><?= $display_name ?></td>
                    <td><?= $noidung_post ?></td>
                    <td><?= $noidung_comment ?></td>
                    <td><a style="margin-right:10px;" href="module/update.php?id=<?=$id?>"><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></a><a href="module/remove.php?id=<?=$id?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>