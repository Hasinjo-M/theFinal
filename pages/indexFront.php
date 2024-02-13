<?php
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : "login";

if ((!isset($_SESSION['role']) || !isset($_SESSION['idUtilisateur'])) && $page != 'loginFront') {
    header("Location: loginFront.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap-3.3.6-dist/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Thé</title>
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
                        <li <?php echo ($page == 'frontoffice/Cueillettes') ? 'class="active"' : ''; ?>>
                            <a href="indexFront.php?page=frontoffice/Cueillettes">Cueillettes</a>
                        </li>
                        <li <?php echo ($page == 'frontoffice/Depense') ? 'class="active"' : ''; ?>>
                            <a href="indexFront.php?page=frontoffice/Depense">Depense</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <?php include($page . '.php') ?>
    </div>
</body>
</html>
