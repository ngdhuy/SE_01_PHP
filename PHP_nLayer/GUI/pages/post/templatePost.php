<div class="card">
    <div class="card-header bg-primary text-white">
        <div class="float-left"><?php echo $account->display_name; ?></div>
        <div class="float-right"><?php echo $post->created_at; ?></div>
    </div>
    <div class="card-body">
        <p class="card-text">
            <?php echo $post->post_content; ?>
        </p> 
    </div>
</div>
<br />