<?php
    session_start();
    $idObjet = $_GET['id_objet'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprunter un objet</title>
</head>

<body>
    <p>Emprunter pour combien de jour ? </p>
    <form action="../traitement/traitement_emprunt.php?id_objet=<?= $idObjet ?>" method="GET">
        <input type="hidden" name="id_objet" value="<?= $idObjet ?>">
        <input type="number" name="interval" id="">
        <input type="submit" value="Emprunter">
    </form>
</body>

</html>