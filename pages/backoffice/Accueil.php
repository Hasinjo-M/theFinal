<?php 
include('../inc/Fonction.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_variete_the"])) {
        $idvariete_the_to_delete = $_POST["delete_variete_the"];
        delete_variete_the($idvariete_the_to_delete);
        header("Location: index.php?page=backoffice/Accueil");
    } elseif (isset($_POST["edit_variete_the"])) {
        $idvariete_the_to_edit = $_POST["edit_variete_the"];
    } else {
        $nom = $_POST["nom"];
        $occupation = $_POST["occupation"];
        $rendement = $_POST["rendement"];
        insert_variete_the($nom, $occupation, $rendement);
        header("Location: index.php?page=backoffice/Accueil");
    }
}

$varietes_the = get_varietes_the();
?>

<div class="container mt-5">
    <h2>Nouvelle Variété de Thé</h2>
    <form action="index.php?page=backoffice/Accueil" method="post">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="occupation">Occupation :</label>
                <input type="number" class="form-control" id="occupation" name="occupation" required>
            </div>
            <div class="form-group">
                <label for="rendement">Rendement :</label>
                <input type="number" class="form-control" id="rendement" name="rendement" required>
            </div>
            <button type="submit" class="btn btn-primary">Insérer</button>
        </form>

    <hr>
    
    <h2>Liste des Variétés de Thé</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Occupation(m2)</th>
                <th>Rendement</th>
                <th>Actions</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($varietes_the as $variete) : ?>
                <tr>
                    <td><?= $variete['nom']; ?></td>
                    <td><?= $variete['occupation']; ?></td>
                    <td><?= $variete['rendement']; ?></td>
                    <td>
                        <a href="index.php?page=backoffice/Accueil&edit_variete_the=<?= $variete['idvariete_the']; ?>">Modifier</a>
                        <form action="index.php?page=backoffice/Accueil" method="post" style="display:inline-block;">
                            <input type="hidden" name="delete_variete_the" value="<?= $variete['idvariete_the']; ?>">
                            <button type="submit" class="btn btn-link">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
