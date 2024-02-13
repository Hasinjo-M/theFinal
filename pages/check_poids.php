<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["poids"])) {
    include('../inc/Fonction.php');
    
    $idparcelle = $_POST["idparcelle"];
    $date = $_POST["date"];
    $poids = $_POST["poids"];
    
    $reponse = check_poids_restant($idparcelle, $poids, $date);
    
    if ($reponse == false) {
        echo json_encode(array('error' => 'Le poids est supérieur au poids restant.'));
    } else {
        echo json_encode(array('success' => true));
    }
    exit();
} else {
    echo json_encode(array('error' => 'Requête invalide.'));
}
?>
