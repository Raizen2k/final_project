<?php
include_once "../inc/function.php";
session_start();
$newDate = sumDate($_GET['interval']);
var_dump($newDate);
$querry = "INSERT INTO obj_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES (%s, %s, NOW(), '%s')";
$querry = sprintf($querry, $newDate, $_SESSION['id_membre'], $newDate);
