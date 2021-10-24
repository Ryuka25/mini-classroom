<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="http://localhost/web-toolkit/bootstrap/4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= SERVER_URL.'/views/static/style/style.css'?>">
    <title><?= $pageTitle ?> - Mini-classroom</title>
</head>
<body>

    <?= $topNavBar ?>

    <?= $content ?>
    

    <!-- Boostrap JS-->
    <script src="http://localhost/web-toolkit/bootstrap/4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>