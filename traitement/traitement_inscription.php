<?php
include '../inc/function.php';
if (exists($_GET['mail'])) {
    header("Location: ../pages/inscription.php?error=1");
} else {
    insererMembre(
        $_GET['nom'],
        $_GET['anniv'],
        $_GET['genre'],
        $_GET['mail'],
        $_GET['ville'],
        $_GET['mdp']
    );

    session_start();
    $_SESSION['id_membre'] = getId($_GET['mail']);
    header("Location: ../pages/accueil.php");
}
