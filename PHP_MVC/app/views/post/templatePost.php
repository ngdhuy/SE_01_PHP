<div class="card">
    <div class="card-header bg-primary text-white">
        <div class="float-left"><?php echo $item->display_name; ?></div>
        <div class="float-right"><?php echo $item->created_at; ?></div>
    </div>
    <div class="card-body">
        <p class="card-text">
            <?php echo $item->post_content; ?>
        </p>
        <?php include(ROOT."/views/comment/list.php"); ?>
    </div>
</div>
<br />