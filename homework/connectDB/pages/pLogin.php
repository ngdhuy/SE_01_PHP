<?php
    $error = "";
    if(isset($_SESSION["error"]))
        $error = $_SESSION["error"];
?>

<div class="row justify-content-md-center">
    <div class="col align-self-center col-6">
        <form action="controller/eLogin.php" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1">ID</label>
              <input id="yourID" name="yourID" type="text" class="form-control" placeholder="Enter your id">
              <small class="form-text text-muted"><?php echo $error ?></small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php
    if(isset($_SESSION["error"]))
        unset($_SESSION["error"]);
?>
