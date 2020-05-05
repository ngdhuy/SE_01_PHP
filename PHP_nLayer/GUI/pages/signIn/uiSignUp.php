<div class="container">
    <h1 class="display-3">Register</h1>
    <p class="lead">Register new account to MyBlog system</p>
    <hr class="my-2">
    <form class="form-horizontal row" action="index.php?page=2&action=3" method="post">
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
                <label class="col-md-4 control-label" for="pw">Display name</label>
                <div class="col-md-5">
                    <input id="dn" name="dn" type="text" placeholder="Input display name" class="form-control input-md"
                        required="">
                    <span class="help-block">Diplay name is not blank</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="pw">Display name</label>
                <div class="col-md-5">
                    <input id="email" name="email" type="email" placeholder="Input email" class="form-control input-md"
                        required="">
                    <span class="help-block">Email is not blank</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                <div class="col-md-8">
                    <button class="btn btn-primary btn-lg" role="button" type="submit">Register</button>
                    <a href="index.php" class="btn btn-danger btn-lg" role="button">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>