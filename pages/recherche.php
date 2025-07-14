<?php
include("../inc/function.php");

$nom = NULL;
$categorie = NULL;
$disponible = 0;

if (isset($_POST["nom"])) {
    $nom = $_POST["nom"];
}
if (isset($_POST["categorie"])) {
    $categorie = $_POST["categorie"];
}
if (isset($_POST["disponible"])) {
    $disponible = 1;
}

$resultat = null;
if (isset($_GET["oui"])) {
    $resultat = recherche($nom, $categorie, $disponible);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'objets</title>
    <?= $bootstrap ?>
</head>

<body class="bg-light">
    <?php include("../inc/nav.php");?>

    <div class="container mt-5">
        <h1 class="mb-4">Formulaire de recherche</h1>
        <form action="recherche.php?oui=1" method="post" class="border p-4 rounded shadow-sm bg-white">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" name="nom" id="nom" class="form-control">
            </div>

            <div class="mb-3">
                <label for="categorie" class="form-label">Catégorie :</label>
                <input type="text" name="categorie" id="categorie" class="form-control">
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="disponible" value="1" id="disponible">
                <label class="form-check-label" for="disponible">
                    Disponible
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>

        <?php
        if (isset($_GET["oui"])) {
            echo "<div class='mt-5'>";
            if ($resultat && mysqli_num_rows($resultat) > 0) {
                echo "<h2 class='mb-4'>Résultats :</h2>";
                echo "<div class='row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4'>";
                while ($data = mysqli_fetch_assoc($resultat)) { ?>
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?= $data['nom_objet'] ?></h5>
                                <p class="card-text"><?= $data['nom_categorie'] ?></p>
                                <?php if (enCours($data['id_objet']) == '0') { ?>
                                    <span class="badge bg-success">Disponible</span>
                                <?php } else { ?>
                                    <span class="badge bg-warning text-dark">
                                        Emprunté - dispo le <?= enCours($data['id_objet']) ?>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php }
                echo "</div>"; 
            } else {
                echo "<p class='mt-4 alert alert-info'>Aucun résultat trouvé.</p>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>
