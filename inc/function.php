<?php
include 'base.php';

$css = '<link rel="stylesheet" href="../assets/css/style.css">';
$bootstrap = "<link rel='stylesheet' href='../assets/bootstrap/css/bootstrap.min.css'>";


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
    $requette = "SELECT * FROM obj_emprunt WHERE id_objet = %s AND date_retour > NOW()";
    $requette = sprintf($requette, $id_objet);
    $resultat = mysqli_query(base(), $requette);
    if ((mysqli_num_rows($resultat)) == 0) {
        return 0;
    } else {
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

function recherche($nom, $categorie, $disponible)
{

    $requette = "SELECT * FROM obj_objet o 
    JOIN obj_categorie_objet c ON o.id_categorie = c.id_categorie 
    WHERE 1=1";
    if ($nom != NULL) {
        $requette .= " AND nom_objet LIKE '%$nom%'";
    }
    if ($categorie != NULL) {
        $requette .= " AND nom_categorie = '$categorie'";
    }
    if ($disponible == 1 )
    {
        $requette2=rechercherParDisponible($nom, $categorie);
        return mysqli_query(base(), $requette2);
    }
    return mysqli_query(base(), $requette);
}

function rechercherParDisponible($nom, $categorie)
{
     $requette = "SELECT * FROM obj_objet o 
    JOIN obj_categorie_objet c ON o.id_categorie = c.id_categorie 
    JOIN obj_emprunt e ON o.id_objet = e.id_objet 
    WHERE 1=1";
     if ($nom != NULL) {
        $requette .= " AND nom_objet LIKE '%$nom%'";
    }
    if ($categorie != NULL) {
        $requette .= " AND nom_categorie = '$categorie'";
    }
    return $requette;
    
}


function authorized_type($file)
{
    $allowedMimeTypes = ['video/mp4', 'video/hvec', 'video/mov'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mime, $allowedMimeTypes)) {
        die('Type de fichier non autorisé : ' . $mime);
    }

    return true;
}

function isOwner($idMembre , $idObjet){
    $requette = "SELECT * FROM obj_objet WHERE id_membre = %s AND id_objet = %s";
    $requette = sprintf($requette, $idMembre , $idObjet);
    $resultat = mysqli_query(base(), $requette);
    if (mysqli_num_rows($resultat) > 0) {
        return true;
    } else return false;
}

function imageObjet($id_objet){
    $requette = "SELECT * FROM obj_images_objet WHERE id_objet = %s";
    $requette = sprintf($requette, $id_objet);
    return mysqli_query(base(), $requette);
}

function statObjet($id_objet){
    $requette = "SELECT * FROM obj_emprunt WHERE id_objet = %s";
    $requette = sprintf($requette, $id_objet);
    return mysqli_query(base(), $requette);
}

function getObjet($id_objet){
    $requette = "SELECT * FROM v_obj_objet WHERE id_objet = %s";
    $requette = sprintf($requette, $id_objet);
    $resultat = mysqli_query(base(), $requette);
    if (mysqli_num_rows($resultat) > 0) {
        return mysqli_fetch_assoc($resultat);
    } else return false;
}


function new_name($file)
{
    $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    return $originalName . '_' . uniqid() . '.' . $extension;
}

function getToutObjet($id_membre)
{
    $requette = "SELECT o.nom_objet,c.nom_categorie FROM obj_objet o 
    JOIN obj_categorie_objet c ON o.id_categorie = c.id_categorie
     WHERE o.id_membre = '%s' GROUP BY o.id_categorie ";

    $requette = sprintf($requette, $id_membre);
    return mysqli_query(base(), $requette);
}   



function getLastImg($idImg){
    $querry = "SELECT * FROM obj_images_objet WHERE id_objet = %s LIMIT 1";
    $querry = sprintf($querry , $idImg );
    $result = mysqli_query(base() , $querry );
    if ( mysqli_num_rows($result) == 0 ) {
        return "default.png";
    } else return mysqli_fetch_assoc($result)['nom_image'];
}

function sumDate( $intervalle){
    var_dump($intervalle);
    $querry = "SELECT DATE_ADD( NOW() , INTERVAL $intervalle  DAY ) AS new_date ";
    var_dump($querry);
    $result = mysqli_query(base(), $querry);
    return mysqli_fetch_assoc($result)['new_date'];
}

function getObjetsEnCours($id_membre)
{
    $requette="SELECT * FROM obj_emprunt e
    JOIN  obj_objet o ON o.id_objet=e.id_objet  
    WHERE e.date_retour IS NULL AND e.id_membre='$id_membre'";
    echo $requette;
    return mysqli_query(base() , $requette);

}
function rendre($id_objet,$etat,$id_membre)
{
    $requette = "UPDATE obj_emprunt 
             SET date_retour = NOW(), etat_retour = $etat 
             WHERE id_objet = $id_objet AND id_membre = $id_membre AND date_retour IS NULL";

    mysqli__query(base() , $requette);
}