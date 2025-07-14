<?php
include("../inc/function.php");
session_start();
$membre = getMembre($_SESSION['id_membre']);
$resultat = getListeObjet();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Bonjour <?= $membre['nom'] ?></h1>
    <?php while ($data = (mysqli_fetch_assoc($resultat))) { ?>
        <p><?= $data['nom_objet'] ?>
            <?php if ( enCours($data['id_objet']) == 0 ) { ?>
            Disponible
        <?php } else { ?>
            Emprunt en cours : dispo le <?= enCours($data['id_objet']) ?> 
        <?php } ?>
        </p>
    <?php } ?>
</body>

</html>