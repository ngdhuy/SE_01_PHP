<div class="card bg-light">
    <div class="card-header text-white bg-info">
        <div class="">Create new Comment</div>
    </div>
    <div class="card-body">
        <form action="<?php echo Helpers::redirect("comment/exCreate"); ?>" method="post">
            <div class="input-group mb-3">
                <input type="hidden" name="post_id" value="<?php echo $item->post_id; ?>" />
                <input type="text" name="comment_content" class="form-control" placeholder="Comment here" aria-label="Comment here"
                    aria-describedby="button-addon2" required>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Submit comment</button>
                </div>
            </div>
        </form>
    </div>
</div>