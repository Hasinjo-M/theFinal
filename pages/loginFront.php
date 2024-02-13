<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include('../inc/Fonction.php');
        session_start();
        $email = $_POST['email'];
        $mdp = $_POST['pwd'];
        $login = login($email,$mdp);
        if(Count($login) == 1){
            foreach ($login as $adm) {
                $_SESSION['role'] = $adm['role'];
                $_SESSION['id'] = $adm['idadmin'];
            } 
            header("Location: indexFront.php?page=frontoffice/Accueil");
        }else{
            header("location: indexFront.php?page=loginFront&erreur=Il y a une erreur");
        }
       
        exit;    
    }
    if(isset($_GET['erreur'])){
        $erreur = " il y une erreur";
    }

?>
<link rel="stylesheet" href="../assets/style/login.css">

<div class="corps col-md-12">
    <div class="background col-md-4 ">
        <div class="shape col-md-6"></div>
        <div class="shape col-md-6"></div>
    </div>
    <form  class="col-md-4" action="login.php" method="POST" >
        <h3>Login Administateur</h3>
        <label for="#" style="Color :RED;" ><?php
            if(isset($_GET['erreur'])){echo $erreur;}
        ?></label>
        <label for="username">Email</label>
        <input type="text" name="email" placeholder="Email " value="admin@gmail.com" id="username" required>

        <label for="password">Password</label>
        <input type="password" name="pwd" placeholder="Password" value="admin123" id="password" required>

        <input class="button" type="submit" value="Log In">
        
        
    </form>
</div> 