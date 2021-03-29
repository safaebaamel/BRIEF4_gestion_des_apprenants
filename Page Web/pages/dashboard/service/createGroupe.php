<?php
include "../../connexion.php";

if (isset($_POST['groupeName'])) {
    $groupeName = $_POST['groupeName'];
    $professeur = $_POST['professeur'];
}
$erreurGroupeName = "";
$erreurProfesseur = "";


if (isset($_POST['Ajouter'])) {
    if (empty($groupeName)) {
        $erreurGroupeName = "impotant groupe name";
    }
    if (empty($professeur)) {
        $erreurProfesseur = "impotant professeur name";
    }

    if ($groupeName != "" && $professeur != "") {
        $query = "INSERT INTO `groupe`(`groupe_name`, `professeur`) VALUES ('$groupeName','$professeur')";
        mysqli_query($connect, $query);
        header("location:../administrateur-groupes.php");
    }
}
