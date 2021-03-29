<?php
include('../../connexion.php');


// if (isset($_GET["id"])) {
    
//     $id = $_POST["id"];
//     $query = "SELECT * FROM etudiant WHERE ID_etudiant='$id'";
//     $result = mysqli_query($connect, $query);
//     while ($row = $result->fetch_assoc()) {
//         $id = $row['ID_etudiant'];
//         $nom = $row['nom'];
//         $prenom = $row['prenom'];
//         $dateNaissance = $row['date_naissance'];
//         $cne = $row['CNE'];
//         $cin = $row['CIN'];
//         $genre = $row['genre'];
//         $groupe = $row['ID_grp'];
//         $email = $row['ID_compte'];
//         // $password = $row['password'];
//         echo $id.' '.$nom.' '.$prenom.' '.$dateNaissance.' '.$cne.' '.$cin.' '.$genre.' '.$groupe.' '.$email;
//     }
// }



if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateNaissance = $_POST['date_naissance'];
    $cne = $_POST['cne'];
    $cin = $_POST['cin'];
    $genre = $_POST['genre'];
    $groupe = $_POST['groupe'];
    $email = $_POST['email'];
    $id_compte = $_POST['id_compte'];
    
    

    echo $nom.' '.$prenom.' '.$dateNaissance.' '.$cne.' '.$cin.' '.$genre.' '.$groupe.' '.$email;

    $query = "UPDATE `etudiant` SET `nom`='$nom',`prenom`='$prenom',`date_naissance`='$dateNaissance',`CNE`='$cne',`CIN`='$cin',`genre`='$genre',`ID_grp`='$groupe' WHERE `ID_etudiant`='$id'";

    $query2 = "UPDATE `compte` SET `email`='$email' WHERE `ID`='$id_compte'";
    mysqli_query($connect, $query2);
    mysqli_query($connect, $query);

       header("location:../administrateur-etudiant.php");
}
