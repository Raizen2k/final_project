<?php 
include("../inc/function.php");
$resultat = getListeEmprunt();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des emprunts</title>
    <?= $bootstrap ?>
</head>
<body class="bg-light">

    <?php include("../inc/nav.php"); ?>

    <div class="container mt-5">
        <h1 class="mb-4">Statistiques des emprunts par état</h1>

        <table class="table table-bordered table-hover bg-white shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>État</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php while($data = mysqli_fetch_assoc($resultat)) { 
                    $etatLibelle = $data['etat'] == 0 ? ' OK' : ' Abîmé';
                ?>
                    <tr>
                        <td><?= $etatLibelle ?></td>
                        <td><?= htmlspecialchars($data['nb']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>
