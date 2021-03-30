<?php
include('../../connexion.php');


if (isset($_GET['del_id'])) {
    $deletWithId = $_GET['del_id'];
    echo  $deletWithId;
    // $query = "DELETE FROM `etudiant` WHERE ID_etudiant='$deletwithid'";
    $query = "DELETE FROM `compte` WHERE ID = '$deletWithId'";
    mysqli_query($connect, $query);
    header("location:../administrateur-comptes.php");
}
