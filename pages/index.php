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
</head>

<body>
    <div>
        <a href="index.php?page=backoffice/Accueil">variete the</a>
        <a href="index.php?page=backoffice/Parcelle"> parcelle</a>
        
        <?php include($page . '.php') ?>
    </div>
    <script src=".../assets/bootstrap-3.3.6-dist/js/jquery.js"></script>
    <script src="../assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>

</html>