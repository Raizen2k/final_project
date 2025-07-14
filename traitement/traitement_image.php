<?php
include_once "../inc/function.php";
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_GET['operation'] == 0) {
    $query = "DELETE FROM obj_images_obj WHERE id_image = %s ";
    $query = sprintf($query , $querry);
    mysqli_query(base() , $query);
    header("Location:../pages/accueil.php");
} else if ($_GET['operation'] == 1) {

    $uploadDir = __DIR__ . "/uploads/";
    $maxSize = 40000000;
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['media'])) {
        $file = $_FILES['media'];
        if ($file['error'] !== UPLOAD_ERR_OK) {
            die('Erreur lors de l’upload : ' . $file['error']);
        }

        if ($file['size'] > $maxSize) {
            die('Le fichier est trop volumineux.');
            if (!authorized_type($file)) {
                die('Type de fichier non autorisé : ' . $mime);
            }
        }

        $newName = new_name($file);

        if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) {
            $querry = "INSERT INTO obj_images_objet (id_objet , nom_image) VALUES (%s , '%s')";
            $querry = sprintf($querry, $_GET['id_objet'], $newName);
            mysqli_query(base() , $querry);
            echo "Fichier uploadé avec succès : " . $newName;
            var_dump($uploadDir);
            header('Location:../pages/accueil.php');
        } else {
            echo "Échec du déplacement du fichier.";
            var_dump($uploadDir);
            die("ts mety eh");
        }
    }
}
