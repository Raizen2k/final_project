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
</head>

<body>
    <h1>Formulaire de recherche</h1>
    <form action="recherche.php?oui=1" method="post">
        <p>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom">
        </p>
        <p>
            <label for="categorie">Catégorie :</label>
            <input type="text" name="categorie" id="categorie">
        </p>
        <p>
            <label>
                <input type="checkbox" name="disponible" value="1"> Disponible
            </label>
        </p>
        <input type="submit" value="Rechercher">
    </form>

    <?php
    if (isset($_GET["oui"])) {
        if ($resultat && mysqli_num_rows($resultat) > 0) {
            echo "<h2>Résultats :</h2>";
            while ($data = mysqli_fetch_assoc($resultat)) {
                ?>
                <p><?= $data['nom_objet'] . " - " . $data['nom_categorie'] ?>
                    <?php if (enCours($data['id_objet']) == '0') { ?>
                        <span class="badge bg-success">Disponible</span>
                    <?php } else { ?>
                        <span class="badge bg-warning text-dark">
                            Emprunté - dispo le <?= enCours($data['id_objet']) ?>
                        </span>
                    <?php } ?>
                </p>
            <?php }
        } else {
            echo "<p>Aucun résultat trouvé.</p>";
        }
    }
    ?>
</body>

</html>