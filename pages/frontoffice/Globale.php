<?php
include('../inc/Fonction.php');

$poids_total = get_poids_total();

$poids_restant = get_poids_restant();

$cout_revient = get_cout_revient();

?>

<div class="container mt-5">

    <h2>Poids total cueillette : <?= $poids_total['poids_total'];  ?></h2>
    <br>

    <h2>Poids restant sur les parcelles : </h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID Parcelle</th>
                <th>Mois de Récolte</th>
                <th>Année de Récolte</th>
                <th>Poids restant</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($poids_restant as $rows) : ?>
                <tr>
                    <td><?= $rows['idparcelle']; ?></td>
                    <td><?= $rows['mois_recolte']; ?></td>
                    <td><?= $rows['annee_recolte']; ?></td>
                    <td><?= $rows['poids_restant']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>

    <h2>Coût de revient / kg : </h2>

    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Cout de Revient</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cout_revient as $rows) : ?>
                <tr>
                    <td><?= $rows['date']; ?></td>
                    <td><?= $rows['cout_revient_par_kg']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
