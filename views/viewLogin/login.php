<!-- Begin Login Page -->
<div class="col-xl-4 float-right d-flex">
    <div class="card col-12 vh-100 rounded-0">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="text-center">
                        <h1 class="h4 mb-4">Login now!</h1>
                    </div>
                    <form class="user small" method="POST" action="<?= SERVER_URL.'/?url=login/'?>">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                id="accountID" name="accountID" 
                                placeholder="Enter Username ..." value="<?= $accountID ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user"
                                name="password" 
                                placeholder="Password">
                            <div class="text-danger text-center" id="passwordError">
                                <p class="loginError"><?=$error?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-user btn-block"> Login </button>
                        </div>
                    </form>
                    <hr>
                    <div class="text-center"><a href="#createAccount" class="small">Create an Account!</a></div>
                    <div class="text-center"><a href="<?= SERVER_URL."/?url=home/"?>" class="small">Login as Guest</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= SERVER_URL.'/views/viewLogin/script/loginScript.js' ?>"></script>
<!-- End Login page -->