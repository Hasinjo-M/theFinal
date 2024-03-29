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

/**** variete the ****/
function insert_variete_the($nom, $occupation, $rendement) {
    $sql = "INSERT INTO variete_the (nom, occupation, rendement) VALUES ('%s', %f, %f)";
    $sql = sprintf($sql, mysqli_real_escape_string(dbconnect(), $nom), floatval($occupation), floatval($rendement));
    mysqli_query(dbconnect(), $sql);
}
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
function update_variete_the($idvariete_the, $nom, $occupation, $rendement) {
    $sql = "UPDATE variete_the SET nom='%s', occupation=%f, rendement=%f WHERE idvariete_the=%d";
    $sql = sprintf($sql, mysqli_real_escape_string(dbconnect(), $nom), floatval($occupation), floatval($rendement), intval($idvariete_the));
    mysqli_query(dbconnect(), $sql);
}

function delete_variete_the($idvariete_the) {
    $sql = "DELETE FROM variete_the WHERE idvariete_the=%d";
    $sql = sprintf($sql, intval($idvariete_the));
    mysqli_query(dbconnect(), $sql);
}


/**** Parcelle ***/
function get_parcelles() {
    $sql = "SELECT numero, surface, nom_variete, idparcelle
            FROM v_variete_parcelle ";
    $result = mysqli_query(dbconnect(), $sql);
    $parcelles = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $parcelles[] = $row;
    }
    mysqli_free_result($result);
    return $parcelles;
}

function delete_parcelle($idparcelle) {
    $conn = dbconnect();
    $sql = "DELETE FROM parcelle WHERE idparcelle=%d";
    $sql = sprintf($sql, intval($idparcelle));
    mysqli_query($conn, $sql);
    mysqli_close($conn);
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
    $conn = dbconnect();
    $sql = "UPDATE cueilleur SET nom='%s', adresse='%s' WHERE idcueilleur=%d";
    $sql = sprintf($sql, mysqli_real_escape_string($conn, $nom), mysqli_real_escape_string($conn, $adresse), intval($idcueilleur));
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function delete_cueilleur($idcueilleur) {
    $conn = dbconnect();
    $sql = "DELETE FROM cueilleur WHERE idcueilleur=%d";
    $sql = sprintf($sql, intval($idcueilleur));
    mysqli_query($conn, $sql);

    mysqli_close($conn);
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

function update_categorie_depense($idcategorie_depense, $categorie) {
    $conn = dbconnect();
    $sql = "UPDATE categorie_depense SET categorie='%s' WHERE idcategorie_depense=%d";
    $sql = sprintf($sql, mysqli_real_escape_string($conn, $categorie), intval($idcategorie_depense));
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function delete_categorie_depense($idcategorie_depense) {
    $conn = dbconnect();
    $sql = "DELETE FROM categorie_depense WHERE idcategorie_depense=%d";
    $sql = sprintf($sql, intval($idcategorie_depense));
    mysqli_query($conn, $sql);
    mysqli_close($conn);
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

function delete_salaire($idsalaire) {
    $sql = "DELETE FROM salaire WHERE idsalaire = %d";
    $sql = sprintf($sql, $idsalaire);
    mysqli_query(dbconnect(), $sql);
}

/**** Cueillette  */
function insert_cueillette($idcueilleur, $idparcelle, $poids, $date) {
    $query = sprintf("INSERT INTO cueillette (idcueilleur, idparcelle, poids, date) VALUES (%d, %d, %f, '%s')",
                     $idcueilleur, $idparcelle, $poids, $date);
    mysqli_query(dbconnect(), $query);
}

function delete_cueillette($idcueillette) {
    $query = sprintf("DELETE FROM cueillette WHERE idcueillette = %d", $idcueillette); 
    return execute_query($query);
}

function get_cueillettes() {
    $sql = "SELECT *
              FROM  v_cueillette  order by date";  
    $result = mysqli_query(dbconnect(), $sql);
    $cueillettes = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $cueillettes[] = $row;
    }
    mysqli_free_result($result);
    return $cueillettes;
}


/****** poids restant ù */
function check_poids_restant($idparcelle, $poids, $date) {
    $annee = date('Y', strtotime($date));
    $mois = date('m', strtotime($date));
    $query = "SELECT poids_restant FROM v_poids_restant WHERE idparcelle = %d and mois_recolte = %d AND annee_recolte = %d";
    $sql = sprintf($query, $idparcelle, $mois, $annee);
    $result = mysqli_query(dbconnect(), $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $poids_restant = $row['poids_restant'];
            if($poids > $poids_restant) return false;
        } return true;
        mysqli_free_result($result);
    } return false;
}

/***** Delete deponse  ***/
function delete_depense($iddepense) {
    $query = "DELETE FROM depense WHERE iddepense = %d";
    $query = sprintf($query, $iddepense);
    $conn = dbconnect(); 
    mysqli_query($conn, $query);
}

function get_depenses(){
    $sql = "SELECT *
              FROM  v_depense_categorie  order by date";  
    $result = mysqli_query(dbconnect(), $sql);
    $cueillettes = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $cueillettes[] = $row;
    }
    mysqli_free_result($result);
    return $cueillettes;
}

function insert_depense($idcategorie_depense, $montant, $date) {
    $db = dbconnect(); 
     $idcategorie_depense = mysqli_real_escape_string($db, $idcategorie_depense);
    $montant = mysqli_real_escape_string($db, $montant);
    $date = mysqli_real_escape_string($db, $date);
    $query = "INSERT INTO depense (idcategorie_depense, montant, date) VALUES ('$idcategorie_depense', '$montant', '$date')";
     mysqli_query($db, $query);
}

function get_poids_total()
{
    $sql = "SELECT * FROM v_poids_total";
    $res = mysqli_query(dbconnect(), $sql);
    $row = mysqli_fetch_assoc($res); 
    mysqli_free_result($res);
    return $row;
}


function get_poids_restant()
{
    $sql = "SELECT * FROM  v_poids_restant";  
$result = mysqli_query(dbconnect(), $sql);
$cueillettes = array();
while ($row = mysqli_fetch_assoc($result)) {
$cueillettes[] = $row;
}
mysqli_free_result($result);
return $cueillettes;
}



function get_cout_revient()
{
    $sql = "SELECT * FROM  v_cout_revient";  
$result = mysqli_query(dbconnect(), $sql);
$cueillettes = array();
while ($row = mysqli_fetch_assoc($result)) {
$cueillettes[] = $row;
}
mysqli_free_result($result);
return $cueillettes;
}

?>





