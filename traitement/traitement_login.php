<?php
include '../inc/function.php';

if (login($_GET['mail'], $_GET['mdp'])) {
    session_start();
    $_SESSION['id_membre'] = getId($_GET['mail']);
    header("Location: ../pages/accueil.php");
} else {
    header("Location: ../pages/index.php?error=1");
}