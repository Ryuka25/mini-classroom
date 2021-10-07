<div class="container m-5 text-center">
    <form method="POST" action="<?= SERVER_URL.'?url=login/grantAccess/'?>">
        <div class="form-group row">
            <label for="accountID" class="col-sm-4 col-form-label">Username</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="accountID" placeholder="*Username" value="<?= $accountID ?>">
                <div class="alert alert-dager" role="alert">
                    <strong><?= $accountIDError ?></strong>
                </div>

            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="password" placeholder="*Password">
                <div class="alert alert-dager" role="alert">
                    <strong><?= $passwordError ?></strong>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-7">
                <button type="submit" class="btn btn-success"> Login </button>
            </div>
        </div>
    </form>
</div>