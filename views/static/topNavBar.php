<nav class="nav bg-light">
    <div class="m-2 d-flex justify-content-center vw-100">
        <?php if (isset($_SESSION['account'])) {?>
            <a class="btn btn-danger" href="<?= SERVER_URL.'/?url=login/logout/'?>">Disconnect</a>
            <a class="nav-link" href="<?= SERVER_URL.'/?url=home/'?>">Home</a>
            <a class="nav-link" href="<?= SERVER_URL.'/?url=discussion/'?>">Discussion</a>
            <a class="nav-link" href="<?= SERVER_URL.'/?url=test/'?>"> Test </a>
            <a class="btn btn-secondary"><?= $accountID ?></a>
        <?php } else { ?>
            <a class="btn btn-primary" href="<?= SERVER_URL.'/?url=login/'?>">Login</a>
            <a class="nav-link" href="<?= SERVER_URL.'/?url=home/'?>">Home</a>
        <?php } ?>
    </div>
</nav>