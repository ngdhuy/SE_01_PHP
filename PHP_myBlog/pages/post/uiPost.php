<div class="card">
    <div class="card-header bg-primary text-white">
        <div class="float-left"><?php echo $post->acc_display_name; ?></div>
        <div class="float-right"><?php echo $post->created_at; ?></div>
    </div>
    <div class="card-body">
        <p class="card-text">
            <?php echo $post->post_content; ?>
        </p>  
        <?php include "./pages/comment/index.php"; ?>
    </div>
</div>
<br />