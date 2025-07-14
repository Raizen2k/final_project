<?php
    include_once "../inc/function.php";
    session_start();
    $requette = "INSERT INTO obj_objet (nom_objet, id_categorie, id_membre) VALUES ('%s', %s, %s)";
    $requette = sprintf($requette, $_POST['nom_objet'], $_POST['categorie'], $_SESSION['id_membre']);
    mysqli_query(base(), $requette);

    header("Location: ../pages/accueil.php");