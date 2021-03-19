<?php
include('../../connexion.php');
if (isset($_GET['id'])) {
    $id = $_GET["id"];
}
if (isset($id)) {
    $query = "SELECT * FROM etudiant WHERE ID_etudiant='$id'";
    $result = mysqli_query($connect, $query);
    while ($row = $result->fetch_assoc()) {
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $dateNaissance = $row['date_naissance'];
        $cne = $row['cne'];
        $cin = $row['cin'];
        $genre = $row['genre'];
        $groupe = $row['groupe'];
        $email = $row['email'];
        $password = $row['password'];
    }
}



if (isset($_POST["update"])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateNaissance = $_POST['date_naissance'];
    $cne = $_POST['cne'];
    $cin = $_POST['cin'];
    $genre = $_POST['genre'];
    $groupe = $_POST['groupe'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "UPDATE `etudiant` SET `nom`='$nom',`prenom`='$prenom',`date_naissance`='$dateNaissance',`CNE`='$cne',`CIN`='$cin',`genre`='$genre',`ID_grp`='$groupe',`ID_compte`='$id_compte' WHERE `etudiant`='$id'";

    $query2 = "UPDATE `compte` SET `email`='$email',`passwd`='$password' WHERE `ID`='$id'";

    //    header("location:../administrateur-etudiant.php");
}
