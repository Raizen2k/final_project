<?php 
$id_objet=$_POST['id_objet'];
$etat=$_POST['etat'];
include("../inc/function.php");
session_start();
rendre($id_objet,$etat,$_SESSION["id_membre"]);

?>