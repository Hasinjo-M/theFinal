<?php 
    include('../inc/Fonction.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST["nom"];
        $occupation = $_POST["occupation"];
        $rendement = $_POST["rendement"];
        insert_variete_the($nom, $occupation, $rendement);
        header("Location: index.php?page=backoffice/Accueil");
    }
    $varietes_the = get_varietes_the();
?>
<div class="container mt-5">
        <h2>Nouvelle  Variété de Thé</h2>
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
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Occupation(m2)</th>
                    <th>Rendement</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($varietes_the as $variete) : ?>
                    <tr>
                        <td><?= $variete['nom']; ?></td>
                        <td><?= $variete['occupation']; ?></td>
                        <td><?= $variete['rendement']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>
