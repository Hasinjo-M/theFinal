<?php 
include('../inc/Fonction.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categorie_depense = $_POST["categorie_depense"];
    insert_categorie_depense($categorie_depense);
    header("Location: index.php?page=backoffice/Depenses");
}

$cueilleurs = get_cueilleurs();
$categories_depense = get_categories_depense();
?>

<div class="container mt-5">
    
    <h2>Nouvelle Catégorie de Dépense</h2>
    <form action="index.php?page=backoffice/Depenses" method="post">
        <div class="form-group">
            <label for="categorie_depense">Catégorie de Dépense :</label>
            <input type="text" class="form-control" id="categorie_depense" name="categorie_depense" required>
        </div>

        <!-- Add a hidden field to identify which form is submitted -->
        <input type="hidden" name="categorie_depense_submit" value="1">

        <button type="submit" class="btn btn-primary">Insérer Catégorie de Dépense</button>
    </form>

    <hr>

    <h2>Liste des Catégories de Dépense</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID Catégorie</th>
                <th>Catégorie</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories_depense as $categorie_depense) : ?>
                <tr>
                    <td><?= $categorie_depense['idcategorie_depense']; ?></td>
                    <td><?= $categorie_depense['categorie']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
