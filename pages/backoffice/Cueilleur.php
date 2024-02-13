<?php 
include('../inc/Fonction.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_cueilleur = $_POST["nom_cueilleur"];
    $adresse_cueilleur = $_POST["adresse_cueilleur"];
    insert_cueilleur($nom_cueilleur, $adresse_cueilleur);
    header("Location: index.php?page=backoffice/Cueilleur");
}

$cueilleurs = get_cueilleurs();
?>

<div class="container mt-5">

    <h2>Nouveau Cueilleur</h2>
    <form action="index.php?page=backoffice/Cueilleur" method="post">
        <div class="form-group">
            <label for="nom_cueilleur">Nom du Cueilleur :</label>
            <input type="text" class="form-control" id="nom_cueilleur" name="nom_cueilleur" required>
        </div>
        <div class="form-group">
            <label for="adresse_cueilleur">Adresse du Cueilleur :</label>
            <input type="text" class="form-control" id="adresse_cueilleur" name="adresse_cueilleur" required>
        </div>

        <!-- Add a hidden field to identify which form is submitted -->
        <input type="hidden" name="cueilleur_submit" value="1">

        <button type="submit" class="btn btn-primary">Insérer Cueilleur</button>
    </form>

    <hr>

    <h2>Liste des Cueilleurs</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID Cueilleur</th>
                <th>Nom</th>
                <th>Adresse</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cueilleurs as $cueilleur) : ?>
                <tr>
                    <td><?= $cueilleur['idcueilleur']; ?></td>
                    <td><?= $cueilleur['nom']; ?></td>
                    <td><?= $cueilleur['adresse']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
