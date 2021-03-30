<?php
include('../../connexion.php');





if (isset($_POST["update"])) {
    $id = $_POST["idGroupe"];
    $nom = $_POST['groupeName'];
    $professeur = $_POST['professeur'];
   
    
    

    echo $nom.' '.$professeur;

    $query = "UPDATE `groupe` SET `groupe_name`='$nom',`professeur`='$professeur' WHERE `ID_groupe`='$id'";
    mysqli_query($connect, $query);
    

       header("location:../administrateur-groupes.php");
}
