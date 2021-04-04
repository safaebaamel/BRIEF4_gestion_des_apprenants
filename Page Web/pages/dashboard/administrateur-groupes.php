<?php
include('../connexion.php');

session_start();
if (isset($_GET['deconnect'])) {
    unset($_SESSION['idadmin']);
    header("Location: ../Se_connecter.php");
}
if (!empty($_SESSION['idadmin'])) {


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <title>gestion des groupes</title>
        <link rel="stylesheet" href="../../css/index.css">

        <link rel="icon" href="../images/icons/baby-car.png" type="image/icon type">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body>
        <!-- header -->
        <header>

            <nav>
                <ul>
                    <li class="logo">Schol<span>ariz</span></li>
                    <li class="nav_links"><a href="../../../index.html">Accueil</a></li>
                    <!-- <li class="nav_links"><a href="../Notre_Ecole.html">Notre Ecole</a></li> -->
                    <!-- <li class="nav_links"><a href="../Contactez_Nous.html">Contactez Nous</a></li>
                    <li class="nav_links li_btn"><a href="../Se_connecter.php">Se connecter</a></li> -->
                    <li class="btn"><a href="#"><i class="fa fa-bars"></i></a></li>
                </ul>
            </nav>
        </header>
        <!-- end header -->
        <!-- main -->
        <!-- end main -->

        <div class="container">

            <div class="sidebar">
                <a class="menu" href="administrateur-home.php">home</a>
                <a class="menu" href="administrateur-groupes.php">Gestion des groupes</a>
                <a class="menu" href="administrateur-comptes.php">Gestion des comptes</a>
                <a class="menu" href="administrateur-etudiant.php">Gestion des Etudiants</a>
            </div>
            <div class="right_centent">
                <div class="hori_sidebar">
                    <p>administrateur</p>
                    <a href="../../pages/dashboard/administrateur-home.php?deconnect">Deconnexion</a>
                </div>
                <div class="centnet">
                    <div class="gestion">
                        <div class="add">
                            <a href="#"><img src="../../pics/icons/plus.png" alt=""></a>
                        </div>
                        <div class="table-etudiant">
                            <table>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</td>
                                    <th>professeur</td>
                                    <th class="operation modaledit">Mod</th>
                                    <th class="operation modalsu">Sup</th>
                                </tr>
                                <?php

                                $query = "SELECT * FROM `groupe`";

                                $result = mysqli_query($connect, $query);
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['ID_groupe'];
                                    $nom = $row['groupe_name'];
                                    $professeur = $row['professeur'];

                                    echo '<tr>
                                    <td>' . $id . '</td><td>' . $nom . '</td><td>' . $professeur . '</td><td><a class="edit_element" href="administrateur-groupes.php?update_id=' . $id . '"><img src="../../pics/icons/Icon awesome-edit.png" alt=""></a></td>
                                <td><a href="service/deletegroupe.php?del_id=' . $id . '"><img src="../../pics/icons/Icon material-delete.png" alt=""></a></td>
                                </tr>';
                                    // echo '<tr><td>' . $row["ID_etudiant"] . '</td><td>' . $row["nom"] . '</td><td>' . $row["prenom"] . '</td><td>' . $row["date_naissance"] . '</td><td>' . $row["CNE"] . '</td><td>' . $row["CIN"] . '</td><td>' . $row["genre"] . '</td><td>' . $row["ID_grp"] . '</td><td>' . $row["ID_compte"] . '</td><td><img src="/Page Web/pics/icons/Icon awesome-edit.png" alt=""></td>
                                    // <td><img src="/Page Web/pics/icons/Icon material-delete.png" alt=""></td></tr>';
                                }
                                ?>
                            </table>

                        </div>
                        <?php
                        if (isset($_GET['update_id'])) {
                            $idGroupe = $_GET['update_id'];
                            // echo $idGroupe;
                            $query = "SELECT * FROM `groupe` where `ID_groupe` = '$idGroupe'";
                            $result = mysqli_query($connect, $query);
                            $row = $result->fetch_assoc();
                            // echo $row['groupe_name'];
                        }

                        ?>

                        <!-- update -->

                        <div class="popup <?php echo isset($_GET['update_id']) ? "" : "hidden" ?>" id="modal-update">
                            <div class="addEtudiant">
                                <div class="addEtudiant-child">
                                    <span class="close">X</span>
                                    <form action="service/updateGroupe.php" method="POST" id="form">
                                        <h2 class="title">
                                            update un groupe
                                        </h2>
                                        <input type="text" hidden name="idGroupe" value="<?php echo $row['ID_groupe'] ?>">
                                        <div class="inputs">
                                            <input type="text" class="input_style" id="nom" name="groupeName" value="<?php echo $row['groupe_name'] ?>" placeholder="Entrer le nom de groupe">
                                            <label for="nom" class="controler">champ obligatoire</label>
                                        </div>
                                        <div class="inputs">
                                            <input type="text" class="input_style" id="professeur" name="professeur" value="<?php echo $row['professeur'] ?>" placeholder="Entrer le nom de professeur">
                                            <label for="professeur" class="controler">champ obligatoire</label>
                                        </div>
                                        <input type="submit" class="btn modalsubmit" value="modifier" name="update">
                                        <div class="error"></div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <!-- add -->
                        <div class="popup hidden" id="modal">
                            <div class="addEtudiant">
                                <div class="addEtudiant-child">
                                    <span class="close">X</span>
                                    <form action="service/createGroupe.php" method="POST" id="form">
                                        <h2 class="title">
                                            Ajouter un groupe
                                        </h2>
                                        <div id="error" style="color: red; text-align: center; margin-bottom:10px;"></div>
                                        <div class="inputs">
                                            <input type="text" onkeyup="requiredFieldlName()" class="input_style" id="prenom" name="groupeName" placeholder="Entrer le nom de groupe">
                                            <label for="nom" class="controler"></label>
                                        </div>
                                        <div class="inputs">
                                            <input type="text" onkeyup="requiredFieldlProf()" class="input_style" id="professeur" name="professeur" placeholder="Entrer le nom de professeur">
                                            <label for="professeur" class="controler"></label>
                                        </div>
                                        <input type="submit" class="btn modalsubmit" value="Ajouter" name="Ajouter">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- delete -->
                        <!-- <div class="popup" id="modal-confirmation">
                            <div class="deleteEtudiant">
                                <div class="deleteChild">
                                    <span class="close">X</span>
                                    <form action="service/deleteGroupe.php" method="POST" id="form">
                                        <h2 class="title">
                                            Voulez-vous vraiment supprimer ce groupe?
                                        </h2>
                                        <div class="confirmation">
                                            <input type="submit" class="btn modalsubmit" value="oui" name="oui">
                                            <input type="submit" class="btn modalsubmit" value="oui" name="oui">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->


                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- footer  -->
        <footer>
            <div class="footer ">
                <div class="row ">
                    <ul>
                        <li><a href="# ">Contact us</a></li>
                        <li><a href="# ">Our Services</a></li>
                        <li><a href="# ">Privacy Policy</a></li>
                        <li><a href="# ">Terms & Conditions</a></li>
                    </ul>
                </div>

                <div class="row ">
                    Copyright © 2021 Scholariz - All rights reserved
                </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="../../scripts/script.js"></script>
        <!-- end footer -->
    </body>

    </html>
<?php } else {
    header("Location: ../Se_connecter.php");
} ?>