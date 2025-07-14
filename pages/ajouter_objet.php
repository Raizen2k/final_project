<?php
session_start();
include '../inc/function.php';
$categories = getListeCategorie();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un objet</title>
</head>

<body>
    <h1>Ajouter un objet</h1>
    <form action="../traitement/traitement_ajout_objet.php" method="post">
        <div>
            <label for="nom_objet">Nom de l'objet:</label>
            <input type="text" id="nom_objet" name="nom_objet" required>
        </div>
        <div>
            <label for="categorie">Catégorie:</label>
            <select id="categorie" name="categorie" required>
                <?php while ($row = mysqli_fetch_assoc($categories)) { ?>
                    <option value='<?=$row['id_categorie']?>'><?= $row['nom_categorie'] ?></option>";
                <?php } ?>
            </select>
        </div>
        <button type="submit">Ajouter</button>
    </form>
</body>

</html>