<?php
include("../inc/function.php");
session_start();
$membre = getMembre($_SESSION['id_membre']);
$cat = getListeCategorie();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?= $bootstrap ?>
</head>

<body>
    <?php include("../inc/nav.php"); ?>

    <h1>Fiche de <?= htmlspecialchars($membre['nom']) ?></h1>
    <p>Nom: <?= htmlspecialchars($membre['nom']) ?></p>
    <p>Date de naissance : <?= $membre['date_naissance'] ?></p>
    <p>Email : <?= $membre['email'] ?></p>
    <p>Ville : <?= $membre['ville'] ?></p>

    <a href="accueil.php">Retour</a>
    <h2>Liste des objet par categorie</h2>
    <?php while ($data_cat = mysqli_fetch_assoc($cat)) {
        $objetParCat = getObjetParCategorie( $membre['id_membre'],$data_cat['id_categorie']);
        echo $data_cat['nom_categorie'] . "<br>";
        while ($objetParCat && $data_objet = mysqli_fetch_assoc($objetParCat)) {?>
            <p><?=$data_objet['nom_objet']?></p>

        <?php } ?>
    <?php } ?>
</body>

</html>