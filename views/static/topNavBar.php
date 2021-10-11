<nav class="nav justify-content-center mt-2">
    <?php if (isset($_SESSION['account'])) {?>
        <a class="btn btn-danger" href="<?= SERVER_URL.'/?url=login/logout/'?>">Disconnect</a>
        <a class="nav-link" href="<?= SERVER_URL.'/?url=home/'?>">Home</a>
        <a class="nav-link" href="<?= SERVER_URL.'/?url=test/'?>"> Test </a>
        <button class="btn text-light"><?= $accountID ?></button>
    <?php } else { ?>
        <a class="btn btn-primary" href="<?= SERVER_URL.'/?url=login/'?>">Login</a>
        <a class="nav-link" href="<?= SERVER_URL.'/?url=home/'?>">Home</a>
    <?php } ?>
</nav>