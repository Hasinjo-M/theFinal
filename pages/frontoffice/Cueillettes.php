<?php
include('../inc/Fonction.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_cueillette"])) {
        $idcueillette_to_delete = $_POST["delete_cueillette"];
        delete_cueillette($idcueillette_to_delete);
        header("Location: indexFront.php?page=frontoffice/Cueillettes");
    } elseif (isset($_POST["edit_cueillette"])) {
        $idcueillette_to_edit = $_POST["edit_cueillette"];
    } else {
        $idcueilleur = $_POST["idcueilleur"];
        $idparcelle = $_POST["idparcelle"];
        $poids = $_POST["poids"];
        $date = $_POST["date"];
        echo $date;
        insert_cueillette($idcueilleur, $idparcelle, $poids, $date);
        header("Location: indexFront.php?page=frontoffice/Cueillettes");
    }
}

$cueillettes = get_cueillettes();
$cueilleurs = get_cueilleurs();
$parcelles = get_parcelles();
?>

<div class="container mt-5">

    <h2>Nouvelle Cueillette </h2>
    <div id="error_message" style="color: red;"></div>
    <form action="indexFront.php?page=frontoffice/Cueillettes" method="post">
        <div class="form-group">
            <label for="idcueilleur">Cueilleur :</label>
            <select class="form-control" id="idcueilleur" name="idcueilleur" required>
                <?php foreach ($cueilleurs as $cueilleur) : ?>
                    <option value="<?= $cueilleur['idcueilleur']; ?>"><?= $cueilleur['nom']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="idparcelle">Parcelle :</label>
            <select class="form-control" id="idparcelle" name="idparcelle" required>
                <?php foreach ($parcelles as $parcelle) : ?>
                    <option value="<?= $parcelle['idparcelle']; ?>"><?= $parcelle['numero']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="date">Date :</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="poids">Poids :</label>
            <input type="number" class="form-control" id="poids" name="poids" required>
        </div>

        <input type="hidden" name="cueillette_submit" value="1">

        <button id="submit_button" type="submit" class="btn btn-primary">Insérer Cueillette</button>
    </form>

    <hr>

    <h2>Liste des Cueillettes</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID Cueillette</th>
                <th>Cueilleur</th>
                <th>Parcelle</th>
                <th>Poids</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cueillettes as $cueillette) : ?>
                <tr>
                    <td><?= $cueillette['idcueillette']; ?></td>
                    <td><?= $cueillette['nom_cueilleur']; ?></td>
                    <td><?= $cueillette['numero_parcelle']; ?></td>
                    <td><?= $cueillette['poids']; ?></td>
                    <td><?= $cueillette['date']; ?></td>
                    <td>
                         <form action="cueillette.php" method="post" style="display:inline-block;">
                            <input type="hidden" name="delete_cueillette" value="<?= $cueillette['idcueillette']; ?>">
                            <button type="submit" class="btn btn-link">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<script>
    $(document).ready(function () {
        $("#poids").on("input", function () {
            var poids = $(this).val();
            var idparcelle = $("#idparcelle").val();
            var date = $("#date").val();
            console.log(date + "   "+poids+ "   "+ idparcelle);
            $.ajax({
                type: "POST",
                url: "check_poids.php", 
                data: { poids: poids, idparcelle: idparcelle, date: date },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if (response.error) {
                        $("#submit_button").hide();
                        $("#error_message").text(response.error);
                    } else {
                        $("#error_message").text("");
                        $("#submit_button").show();
                    }
                }
            });
        });
    });
</script>