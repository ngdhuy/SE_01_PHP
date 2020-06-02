<div class="container">
    <h1 class="display-3">Login</h1>
    <p class="lead">Login to MyBlog system</p>
    <hr class="my-2">
    <form class="form-horizontal row" action="<?php echo Helpers::redirect("account/exSignIn"); ?>" method="post">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-4 control-label" for="us">Username</label>
                <div class="col-md-5">
                    <input id="us" name="us" type="text" placeholder="Input username" class="form-control input-md"
                        required="">
                    <span class="help-block">Username is not blank</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="pw">Password</label>
                <div class="col-md-5">
                    <input id="pw" name="pw" type="password" placeholder="Input password" class="form-control input-md"
                        required="">
                    <span class="help-block">Password is not blank</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                <div class="col-md-8">
                    <button class="btn btn-primary btn-lg" role="button" type="submit">Login</button>
                    <a href="<?php echo Helpers::redirect("home") ?>" class="btn btn-danger btn-lg" role="button">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>