<?php
    $errorContent = $_POST["errorContent"];
    if (empty($errorContent))
        $errorContent = "Error 404";
?>
<h2>
<?php echo $errorContent ?>
</h2>