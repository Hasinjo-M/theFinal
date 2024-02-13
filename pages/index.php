<?php
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : "login";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap-3.3.6-dist/css/bootstrap.css">
    <script src="../assets/bootstrap-3.3.6-dist/js/jquery.js"></script>
    <title>Your Page Title</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Thé</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li <?php echo ($page == 'backoffice/Accueil') ? 'class="active"' : ''; ?>>
                            <a href="index.php?page=backoffice/Accueil">Variete thé</a>
                        </li>
                        <li <?php echo ($page == 'backoffice/Parcelle') ? 'class="active"' : ''; ?>>
                            <a href="index.php?page=backoffice/Parcelle">Parcelle</a>
                        </li>
                        <li <?php echo ($page == 'backoffice/Cueilleur') ? 'class="active"' : ''; ?>>
                            <a href="index.php?page=backoffice/Cueilleur">Cueilleur</a>
                        </li>
                        <li <?php echo ($page == 'backoffice/Depenses') ? 'class="active"' : ''; ?>>
                            <a href="index.php?page=backoffice/Depenses">Catégorie dépense</a>
                        </li>
                        <li <?php echo ($page == 'backoffice/Salaire') ? 'class="active"' : ''; ?>>
                            <a href="index.php?page=backoffice/Salaire">Salaire</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php include($page . '.php') ?>
    </div>
    <script src="../assets/bootstrap-3.3.6-dist/js/jquery.js"></script>
    <script src="../assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>
