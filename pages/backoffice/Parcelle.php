<?php 
include('../inc/Fonction.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_parcelle"])) {
        $idparcelle_to_delete = $_POST["delete_parcelle"];
        delete_parcelle($idparcelle_to_delete);
        header("Location: index.php?page=backoffice/Parcelle");
    } else {
        $numero = $_POST["numero"];
        $surface = $_POST["surface"];
        $idvariete_the = $_POST["idvariete_the"]; 
        insert_parcelle($numero, $surface, $idvariete_the);
        header("Location: index.php?page=backoffice/Parcelle");
    }
}

$varietes_the = get_varietes_the();
$parcelles = get_parcelles();
?>

<div class="container mt-5">
    <h2>Nouvelle Parcelle</h2>
    <form action="index.php?page=backoffice/Parcelle" method="post">
        <div class="form-group">
            <label for="numero">Numéro :</label>
            <input type="text" class="form-control" id="numero" name="numero" required>
        </div>
        <div class="form-group">
            <label for="surface">Surface (m2) :</label>
            <input type="number" class="form-control" id="surface" name="surface" required>
        </div>
        <div class="form-group">
            <label for="idvariete_the">Variété de Thé :</label>
            <select class="form-control" id="idvariete_the" name="idvariete_the" required>
                <?php foreach ($varietes_the as $variete) : ?>
                    <option value="<?= $variete['idvariete_the']; ?>"><?= $variete['nom']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Insérer</button>
    </form>

    <hr>
    
    <h2>Liste des Parcelles</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Surface (m2)</th>
                <th>Variété de Thé</th>
                <th>Actions</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parcelles as $parcelle) : ?>
                <tr>
                    <td><?= $parcelle['numero']; ?></td>
                    <td><?= $parcelle['surface']; ?></td>
                    <td><?= $parcelle['nom_variete']; ?></td>
                    <td>
                        <form action="index.php?page=backoffice/Parcelle" method="post" style="display:inline-block;">
                            <input type="hidden" name="delete_parcelle" value="<?= $parcelle['idparcelle']; ?>">
                            <button type="submit" class="btn btn-link">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
