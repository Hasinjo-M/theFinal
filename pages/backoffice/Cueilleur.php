<?php 
include('../inc/Fonction.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_cueilleur"])) {
        $idcueilleur_to_delete = $_POST["delete_cueilleur"];
        delete_cueilleur($idcueilleur_to_delete);
        header("Location: index.php?page=backoffice/Cueilleur");
    } elseif (isset($_POST["edit_cueilleur"])) {
        $idcueilleur_to_edit = $_POST["edit_cueilleur"];
    } else {
        $nom_cueilleur = $_POST["nom_cueilleur"];
        $adresse_cueilleur = $_POST["adresse_cueilleur"];
        insert_cueilleur($nom_cueilleur, $adresse_cueilleur);
        header("Location: index.php?page=backoffice/Cueilleur");
    }
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
                <th>Actions</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cueilleurs as $cueilleur) : ?>
                <tr>
                    <td><?= $cueilleur['idcueilleur']; ?></td>
                    <td><?= $cueilleur['nom']; ?></td>
                    <td><?= $cueilleur['adresse']; ?></td>
                    <td>
                        <a href="index.php?page=backoffice/Cueilleur&edit_cueilleur=<?= $cueilleur['idcueilleur']; ?>">Modifier</a>

                        <form action="index.php?page=backoffice/Cueilleur" method="post" style="display:inline-block;">
                            <input type="hidden" name="delete_cueilleur" value="<?= $cueilleur['idcueilleur']; ?>">
                            <button type="submit" class="btn btn-link">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
