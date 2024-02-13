<?php
include('../inc/Fonction.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_depense"])) {
        $iddepense_to_delete = $_POST["delete_depense"];
        delete_depense($iddepense_to_delete);
        header("Location: indexFront.php?page=frontoffice/Depense");
    } elseif (isset($_POST["edit_depense"])) {
        $iddepense_to_edit = $_POST["edit_depense"];
    } else {
        $idcategorie_depense = $_POST["idcategorie_depense"];
        $montant = $_POST["montant"];
        $date = $_POST["date"];
        insert_depense($idcategorie_depense, $montant, $date);
        header("Location: indexFront.php?page=frontoffice/Depense");
    }
}

$categories_depense = get_categories_depense();
$depenses = get_depenses();
?>

<div class="container mt-5">

    <h2>Nouvelle Dépense</h2>
    <form action="indexFront.php?page=frontoffice/Depense" method="post">
        <div class="form-group">
            <label for="idcategorie_depense">Catégorie de Dépense :</label>
            <select class="form-control" id="idcategorie_depense" name="idcategorie_depense" required>
                <?php foreach ($categories_depense as $categorie) : ?>
                    <option value="<?= $categorie['idcategorie_depense']; ?>"><?= $categorie['categorie']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="montant">Montant :</label>
            <input type="number" class="form-control" id="montant" name="montant" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="date">Date :</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <input type="hidden" name="depense_submit" value="1">

        <button type="submit" class="btn btn-primary">Insérer Dépense</button>
    </form>

    <hr>

    <h2>Liste des Dépenses</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID Dépense</th>
                <th>Catégorie</th>
                <th>Montant</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($depenses as $depense) : ?>
                <tr>
                    <td><?= $depense['iddepense']; ?></td>
                    <td><?= $depense['categorie']; ?></td>
                    <td><?= $depense['montant']; ?></td>
                    <td><?= $depense['date']; ?></td>
                    <td>
                        <a href="depenses.php?edit_depense=<?= $depense['iddepense']; ?>">Modifier</a>

                        <form action="indexFront.php?page=frontoffice/Depense" method="post" style="display:inline-block;">
                            <input type="hidden" name="delete_depense" value="<?= $depense['iddepense']; ?>">
                            <button type="submit" class="btn btn-link">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
