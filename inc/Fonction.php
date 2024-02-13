<?php
include_once('Connexion.php');

/**** Fonction logintt ***/
function login($mail, $mdp){
    $sql = "select * from utilisateur where mail='%s' and mdp ='%s'";
    $sql = sprintf($sql,$mail,$mdp);
    $res = mysqli_query(dbconnect(),$sql);
    $result = array();
    while($row = mysqli_fetch_array($res)) {
        $result[] = $row;
    }
    mysqli_free_result($res);
    return $result; 
}

/**** Insert variete the ****/
function insert_variete_the($nom, $occupation, $rendement) {
    $sql = "INSERT INTO variete_the (nom, occupation, rendement) VALUES ('%s', %f, %f)";
    $sql = sprintf($sql, mysqli_real_escape_string(dbconnect(), $nom), floatval($occupation), floatval($rendement));
    mysqli_query(dbconnect(), $sql);
}


/***** liste variete the  */
function get_varietes_the() {
    $sql = "SELECT idvariete_the, nom, occupation, rendement FROM variete_the";
    $result = mysqli_query(dbconnect(), $sql);
    $varietes_the = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $varietes_the[] = $row;
    }
    mysqli_free_result($result);
    return $varietes_the;
}


/**** Parcelle ***/
function get_parcelles() {
    $sql = "SELECT numero, surface, nom_variete
            FROM v_variete_parcelle ";
    $result = mysqli_query(dbconnect(), $sql);
    $parcelles = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $parcelles[] = $row;
    }
    mysqli_free_result($result);
    return $parcelles;
}


function insert_parcelle($numero, $surface, $idvariete_the) {
    $sql = "INSERT INTO parcelle (numero, surface, idvariete_the) VALUES (%d, %f, %d)";
    $sql = sprintf($sql, intval($numero), floatval($surface), intval($idvariete_the));
    mysqli_query(dbconnect(), $sql);
}

?>


