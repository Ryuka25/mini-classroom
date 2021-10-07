<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="http://localhost/web-toolkit/bootstrap/4.6.0/dist/css/bootstrap.min.css">

    <title><?= $pageTitle ?> - MINI_CLASSROOM</title>
</head>
<body>
    <nav class="nav justify-content-center mt-2">
        <?php if (isset($_SESSION['account'])) {?>
            <a class="btn btn-success" href="<?= SERVER_URL.'?url=login/logout/'?>">Disconnect</a>
        <?php } else { ?>
            <a class="btn btn-success" href="<?= SERVER_URL.'?url=login/'?>">Login</a>
        <?php } ?>
        <a class="nav-link" href="<?= SERVER_URL.'?url=home/'?>">Home</a>
        <a class="nav-link" href="<?= SERVER_URL.'?url=schoolClass/'?>">School Class</a>
        <a class="nav-link" href="<?= SERVER_URL.'?url=module/'?>">Module</a>
        <a class="nav-link" href="<?= SERVER_URL.'?url=moduleCategory/'?>">Module Category</a>
        <a class="nav-link" href="<?= SERVER_URL.'?url=test/'?>"> Test </a>
        <a class="nav-link" href="<?= SERVER_URL.'?url=discussion/'?>"> Discussion </a>
    </nav>

    <div class="container">
        <?= $content ?>
    </div>
    
    <!-- Boostrap JS-->
    <script src="http://localhost/web-toolkit/bootstrap/4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>