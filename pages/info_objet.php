<?php 
include("../inc/function.php");
$membre =getMembre($_SESSION['id_membre']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        
<h1>Fiche de  <?= htmlspecialchars($membre['nom']) ?></h1>
<p>Nom: <?= htmlspecialchars($membre['nom']) ?></p>
<p>Date de naissance : <?= $membre['date_naissance'] ?></p>
<p>Email : <?= $membre['email'] ?></p>
<p>Ville : <?= $membre['ville'] ?></p>
</body>
</html>