<?php
include("../inc/function.php");
session_start();
$membre = getMembre($_SESSION['id_membre']);
$objets = getToutObjet($membre['id_membre']);
$encours= getObjetsEnCours($_SESSION['id_membre']);
var_dump($encours);

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
    <?php while ($data = mysqli_fetch_assoc($objets)) { ?>
        <p><?= $data['nom_objet']?>________________categorie :  <?= $data['nom_categorie']?></p>
    <?php } ?>

    <h2>Liste des mes emprunt en cours </h2>
    <?php while ($objetEnCours=mysqli_fetch_assoc($encours)) { ?>
            <p><?= $objetEnCours['nom_objet']?>________date_retour : 
            <?= $objetEnCours['date_retour'] ?>________
            <form action="../traitement/traitement_rendre.php" method="post">
                <select name="etat">
                    <option value="0">Ok</option>
                    <option value="1">Abimé</option>
                </select>
                <input type="hidden" name="id_objet" value="<?= $objetEnCours['id_objet']?>">
                <input type="submit" value="Rendre">
            </form>
        </p>
        <?php }?>
</body>

</html>