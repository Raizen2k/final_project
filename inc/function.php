<?php
include 'base.php';

$css='<link rel="stylesheet" href="../assets/css/style.css">';
$bootstrap="<link rel='stylesheet' href='../assets/bootstrap/css/bootstrap.min.css'>";


function login($mail, $mdp)
{
    $connexion = base();

    $query = "SELECT * FROM obj_membres WHERE email='%s' AND mdp='%s'";
    $query = sprintf($query, $mail, $mdp);
    $result = mysqli_query(base(), $query);

    if (mysqli_num_rows($result) == 1) {
        return true;
    } else {
        return false;
    }
}

function getId($mail)
{
    $querry = "SELECT * FROM obj_membres WHERE email = '%s'";
    $querry = sprintf($querry, $mail);
    return mysqli_fetch_assoc(mysqli_query(base(), $querry))["id_membre"];
}

function exists($mail)
{
    $querry = "SELECT * FROM obj_membres WHERE email = '%s'";
    $querry = sprintf($querry, $mail);
    return mysqli_num_rows(mysqli_query(base(), $querry)) > 0;
}

function insererMembre($nom, $anniv, $genre, $mail, $ville, $mdp)
{
    $querry = "INSERT INTO obj_membres (nom , date_naissance , genre , email , ville , mdp ) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')";
    $querry = sprintf($querry, $nom, $anniv, $genre, $mail, $ville, $mdp);
    mysqli_query(base(), $querry);
}

function getMembre($id_membre)
{
    $querry = "SELECT * FROM obj_membres WHERE id_membre = '%s'";
    $querry = sprintf($querry, $id_membre);
    return mysqli_fetch_assoc(mysqli_query(base(), $querry));
}

function getListeObjet()
{
    $requette = "SELECT id_objet,nom_objet FROM obj_objet";
    return mysqli_query(base(), $requette);
}

function enCours($id_objet)
{
    $requette = "SELECT * FROM obj_emprunt WHERE id_objet = %s ";
    $requette = sprintf($requette, $id_objet);
    $resultat = mysqli_query(base(), $requette);
    if ((mysqli_num_rows($resultat)) == 0) {
        return 0;
    } else {
        echo mysqli_fetch_assoc($resultat)['date_retour'];
        return mysqli_fetch_assoc($resultat)['date_retour'];
    }
}

function filtreParCategorie($categorie)
{
    $requette = "SELECT * FROM obj_objet WHERE id_categorie = '%s'";
    $requette = sprintf($requette, $categorie);
    return mysqli_query(base(), $requette);
}

function getListeCategorie()
{
    $requette = "SELECT * FROM obj_categorie_objet";
    return mysqli_query(base(), $requette);
}