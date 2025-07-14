<?php
include '../inc/function.php';
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$idObjet = $_GET['id_objet'];
$img = imageObjet($idObjet);
$stat = statObjet($idObjet);
$obj = getObjet($idObjet);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche de l'objet</title>
    <?= $bootstrap ?>
</head>

<body>
    <h1><?= $obj['nom_objet'] ?></h1>
    <img src="<?= $img ?>" alt="Image de l'objet" style="max-width: 300px; max-height: 300px;">
    <p>Catégorie: <?= htmlspecialchars($obj['nom_categorie']) ?></p>
    <p>Statut: <?= $stat ? 'Emprunté' : 'Disponible' ?></p>

    <?php if (isOwner($idObjet , $_SESSION['id_membre'])) { ?>
        <form action="../traitement/traitement_image.php?operation=1" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="media">ajouter une image</label>
                <input type="file" id="media" name="media" accept="image/*" required>
            </div>
            <button type="submit" class="btn-upload">Publier</button>
        </form>
    <?php } ?>

    <?php if ($stat): ?>
        <p>Disponible le: <?= enCours($idObjet) ?></p>
    <?php endif; ?>

    <p>Statistique d'emprunt de l'objet : </p>
    <table>
        <thead>
            <tr>
                <th>Date de prise</th>
                <th>Date de retour</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data = mysqli_fetch_assoc($stat)) { ?>
                <tr>
                    <td><?= htmlspecialchars($data['date_emprunt']) ?></td>
                    <td><?= htmlspecialchars($data['date_retour']) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="accueil.php">Retour à l'accueil</a>
</body>

</html>