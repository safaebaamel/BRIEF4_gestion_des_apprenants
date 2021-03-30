<?php
include "../../connexion.php";

if (isset($_POST['role'])) {
    $role = $_POST['role'];
    $email = $_POST['email'];
    $password = $_POST['passwd'];
    $status = $_POST['Status'];
}
$erreurRole = "";
$erreurEmail = "";
$erreurPasswd = "";
$erreurStatus = "";

if (isset($_POST['Ajouter'])) {
    if (empty($role)) {
        $erreurRole = "impotant role name";
    }
    if (empty($email)) {
        $erreurEmail = "impotant email name";
    }
    if (empty($password)) {
        $erreurPasswd = "impotant Password";
    }
    if (empty($status)) {
        $erreurStatus = "impotant status";
    }
    if ($role != "" && $email != "" && $password != "" && $status != "") {
        $query = "INSERT INTO `compte`(`role`, `email`, `passwd`, `Status`) VALUES ('$role','$email','$password','$status')";
        mysqli_query($connect, $query);
        header("location:../administrateur-comptes.php");
    }
}
