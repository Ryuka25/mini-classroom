<nav class="nav justify-content-center mt-2">
    <?php if (isset($_SESSION['account'])) {?>
        <a class="btn btn-success" href="<?= SERVER_URL.'?url=login/logout/'?>">Disconnect</a>
    <?php } else { ?>
        <a class="btn btn-success" href="<?= SERVER_URL.'?url=login/'?>">Login</a>
    <?php } ?>
    <a class="nav-link" href="<?= SERVER_URL.'?url=home/'?>">Home</a>
    <a class="nav-link" href="<?= SERVER_URL.'?url=test/'?>"> Test </a>
</nav>