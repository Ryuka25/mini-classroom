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
    <nav class="nav justify-content-center">
        <a class="nav-link" href="<?= SERVER_URL.'?url=Home/'?>">Home</a>
        <a class="nav-link" href="<?= SERVER_URL.'?url=SchoolClass/'?>">School Class</a>
        <a class="nav-link" href="<?= SERVER_URL.'?url=Module/'?>">Module</a>
        <a class="nav-link" href="<?= SERVER_URL.'?url=ModuleCategory/'?>">Module Category</a>

    </nav>

    <div class="container">
        <?= $content ?>
    </div>
    
    <!-- Boostrap JS-->
    <script src="http://localhost/web-toolkit/bootstrap/4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>