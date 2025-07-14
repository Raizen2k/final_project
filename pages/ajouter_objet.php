<?php
session_start();
include '../inc/function.php';
$categories = getListeCategorie();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un objet</title>
    <?= $bootstrap ?>
</head>

<body class="bg-light">
    <?php include("../inc/nav.php"); ?>

    <div class="container mt-5">
        <h1 class="mb-4">Ajouter un objet</h1>

        <form action="../traitement/traitement_ajout.php" method="post" class="border p-4 rounded bg-white shadow-sm">
            <div class="mb-3">
                <label for="nom_objet" class="form-label">Nom de l'objet :</label>
                <input type="text" id="nom_objet" name="nom_objet" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="categorie" class="form-label">Catégorie :</label>
                <select id="categorie" name="categorie" class="form-select" required>
                    <?php while ($row = mysqli_fetch_assoc($categories)) { ?>
                        <option value="<?= $row['id_categorie'] ?>"><?= $row['nom_categorie'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

</body>

</html>
