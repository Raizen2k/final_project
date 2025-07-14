<?php
include("../inc/function.php");
session_start();
$membre = getMembre($_SESSION['id_membre']);
$resultat = ($_SERVER['REQUEST_METHOD'] == 'POST') ? 
    filtreParCategorie($_POST['categorie']) : getListeObjet();
$liste = getListeCategorie();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <?= $bootstrap ?>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg bg-white shadow-sm mb-4">
        <div class="container">
            <span class="navbar-brand">Bienvenue, <?= htmlspecialchars($membre['nom']) ?></span>

            <form class="d-flex" action="accueil.php" method="post">
                <select class="form-select me-2" name="categorie" required>
                    <option value="0" disabled selected>Choisir une catégorie</option>
                    <?php while ($res = mysqli_fetch_assoc($liste)) { ?>
                        <option value="<?= $res['id_categorie'] ?>">
                            <?= htmlspecialchars($res['nom_categorie']) ?>
                        </option>
                    <?php } ?>
                </select>
                <button type="submit" class="btn btn-outline-primary">Filtrer</button>
            </form>
            <a href="ajouter_objet.php">Ajouter un objet</a>
            <a href="recherche.php">Rechercher</a>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center g-4">
            <?php while ($data = mysqli_fetch_assoc($resultat)) { ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <article class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title"><?= htmlspecialchars($data['nom_objet']) ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <?php if (enCours($data['id_objet']) == '0') { ?>
                                    <span class="badge bg-success">Disponible</span>
                                <?php } else { ?>
                                    <span class="badge bg-warning text-dark">
                                        Emprunté - dispo le <?= enCours($data['id_objet']) ?>
                                    </span>
                                <?php } ?>
                            </h6>
                        </div>
                    </article>
                </div>
            <?php } ?>
        </div>
    </div>

</body>
</html>
