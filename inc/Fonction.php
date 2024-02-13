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

/***** Cueilleur */

function insert_cueilleur($nom, $adresse) {
    $sql = "INSERT INTO cueilleur (nom, adresse) VALUES ('%s', '%s')";
    $sql = sprintf($sql, mysqli_real_escape_string(dbconnect(), $nom), mysqli_real_escape_string(dbconnect(), $adresse));
    mysqli_query(dbconnect(), $sql);
}

function get_cueilleurs() {
    $sql = "SELECT * FROM cueilleur";
    $result = mysqli_query(dbconnect(), $sql);
    $cueilleurs = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $cueilleurs[] = $row;
    }
    mysqli_free_result($result);
    return $cueilleurs;
}

function update_cueilleur($idcueilleur, $nom, $adresse) {
    $sql = "UPDATE cueilleur SET nom='%s', adresse='%s' WHERE idcueilleur=%d";
    $sql = sprintf($sql, mysqli_real_escape_string(dbconnect(), $nom), mysqli_real_escape_string(dbconnect(), $adresse), intval($idcueilleur));
    mysqli_query(dbconnect(), $sql);
}

function delete_cueilleur($idcueilleur) {
    $sql = "DELETE FROM cueilleur WHERE idcueilleur=%d";
    $sql = sprintf($sql, intval($idcueilleur));
    mysqli_query(dbconnect(), $sql);
}

/**** categories depenses */

function insert_categorie_depense($categorie) {
    $sql = "INSERT INTO categorie_depense (categorie) VALUES ('%s')";
    $sql = sprintf($sql, mysqli_real_escape_string(dbconnect(), $categorie));
    mysqli_query(dbconnect(), $sql);
}

function get_categories_depense() {
    $sql = "SELECT * FROM categorie_depense";
    $result = mysqli_query(dbconnect(), $sql);
    $categories_depense = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $categories_depense[] = $row;
    }
    mysqli_free_result($result);
    return $categories_depense;
}


/**** Salaire ***/
function insert_salaire($kgmin, $kgmax, $montant) {
    $sql = "INSERT INTO salaire (kgmin, kgmax, montant) VALUES (%f, %f, %s)";
    $sql = sprintf($sql, floatval($kgmin), floatval($kgmax), mysqli_real_escape_string(dbconnect(), $montant));
    mysqli_query(dbconnect(), $sql);
}

function get_salaires() {
    $sql = "SELECT * FROM salaire";
    $result = mysqli_query(dbconnect(), $sql);
    $salaires = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $salaires[] = $row;
    }
    mysqli_free_result($result);
    return $salaires;
}
?>





