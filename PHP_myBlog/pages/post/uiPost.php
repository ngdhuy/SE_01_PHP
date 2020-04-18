<div class="card">
    <div class="card-header" style="color:brown"><?php echo $post->acc_display_name; ?></div>
    <div class="card-body">
        <p class="card-text">
            <?php echo $post->post_content; ?>
        </p>
        <a href="#" class="btn btn-primary">Go somewhere</a>

        <!-- Comment -->
        <form method="POST" action="index.php?action=6&post_id=<?php echo $post->post_id ?>">
            <div class="form-group">
                <label for="comment" class="cmt">Comment:</label>
                <div class="list-group">
                    <?php
                    $comments = $post->comments();
                    foreach ($comments as $cmt) {
                        $user = $cmt->account_name;
                        $cmt_content = $cmt->comment_content;
                        $time = $cmt->created_at;
                    ?>
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1 txt_font15"><?php echo $user ?></h5>
                                <small class="text-muted"><?php echo $time ?></small>
                            </div>
                            <p class="mb-1 txt_font13"><?php echo $cmt_content; ?></p>
                        </a>
                    <?php } ?>
                </div>
                <textarea class="form-control" rows="5" id="comment" name="cmt_content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Đăng</button>
        </form>
    </div>
</div>
<br />