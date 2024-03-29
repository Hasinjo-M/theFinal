<?php
include('../inc/Fonction.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_salaire"])) {
        $idsalaire_to_delete = $_POST["delete_salaire"];
        delete_salaire($idsalaire_to_delete);
    } else {
        $kgmin = $_POST["kgmin"];
        $kgmax = $_POST["kgmax"];
        $montant = $_POST["montant"];
        insert_salaire($kgmin, $kgmax, $montant);
        header("Location: index.php?page=backoffice/Salaire");
    }
}

$salaires = get_salaires();
?>

<div class="container mt-5">
    <h2>Nouveau Salaire</h2>
    <form action="index.php?page=backoffice/Salaire" method="post">
        <div class="form-group">
            <label for="kgmin">Kg Min :</label>
            <input type="number" class="form-control" id="kgmin" name="kgmin" required>
        </div>
        <div class="form-group">
            <label for="kgmax">Kg Max :</label>
            <input type="number" class="form-control" id="kgmax" name="kgmax" required>
        </div>
        <div class="form-group">
            <label for="montant">Montant :</label>
            <input type="number" class="form-control" id="montant" name="montant" required>
        </div>

        <input type="hidden" name="salaire_submit" value="1">

        <button type="submit" class="btn btn-primary">Insérer Salaire</button>
    </form>

    <hr>

    <h2>Liste des Salaires</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Kg Min</th>
                <th>Kg Max</th>
                <th>Montant</th>
                <th>Actions</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salaires as $salaire) : ?>
                <tr>
                    <td><?= $salaire['kgmin']; ?></td>
                    <td><?= $salaire['kgmax']; ?></td>
                    <td><?= $salaire['montant']; ?></td>
                    <td>
                       <form action="index.php?page=backoffice/Salaire" method="post" style="display:inline-block;">
                            <input type="hidden" name="delete_salaire" value="<?= $salaire['idsalaire']; ?>">
                            <button type="submit" class="btn btn-link">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
