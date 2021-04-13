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
                                    <th>role</td>
                                    <th>email</td>
                                    <th>password</td>
                                    <th>Status</td>
                                    <th class="operation modaledit">Mod</th>
                                    <th class="operation modalsu">Sup</th>
                                </tr>
                                <?php

                                $query = "SELECT * FROM `compte`";

                                $result = mysqli_query($connect, $query);
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['ID'];
                                    $role = $row['role'];
                                    $email = $row['email'];
                                    $password = $row['passwd'];
                                    $status = $row['Status'];
                                    echo '<tr>
                                    <td>' . $id . '</td><td>' . $role . '</td><td>' . $email . '</td><td>' . $password . '</td><td>' . $status . '</td><td><a class="edit_element" href="administrateur-comptes.php?update_id=' . $id . '"><img src="../../pics/icons/Icon awesome-edit.png" alt=""></a></td>
                                <td><a href="service/deleteCompte.php?del_id=' . $id . '"><img src="../../pics/icons/Icon material-delete.png" alt=""></a></td>
                                </tr>';
                                    // echo '<tr><td>' . $row["ID_etudiant"] . '</td><td>' . $row["nom"] . '</td><td>' . $row["prenom"] . '</td><td>' . $row["date_naissance"] . '</td><td>' . $row["CNE"] . '</td><td>' . $row["CIN"] . '</td><td>' . $row["genre"] . '</td><td>' . $row["ID_grp"] . '</td><td>' . $row["ID_compte"] . '</td><td><img src="/Page Web/pics/icons/Icon awesome-edit.png" alt=""></td>
                                    // <td><img src="/Page Web/pics/icons/Icon material-delete.png" alt=""></td></tr>';
                                }
                                ?>
                            </table>

                        </div>
                        <?php
                        if (isset($_GET['update_id'])) {
                            $id = $_GET['update_id'];
                            // echo $id;
                            $query = "SELECT * FROM `compte` where `ID` = '$id'";
                            $result = mysqli_query($connect, $query);
                            $row = $result->fetch_assoc();
                            // echo $row['role'];
                        }

                        ?>

                        <!-- update -->

                        <div class="popup <?php echo isset($_GET['update_id']) ? "" : "hidden" ?>" id="modal-update">
                            <div class="addEtudiant">
                                <div class="addEtudiant-child">
                                    <span class="close">X</span>
                                    <form action="service/updateCompte.php" method="POST" id="form">
                                        <h2 class="title">
                                            update un compte
                                        </h2>
                                        <input type="text" hidden name="id" value="<?php echo $row['ID'] ?>">
                                        <div class="inputs">
                                            <input type="text" class="input_style" id="role" name="role" value="<?php echo $row['role'] ?>" placeholder="Entrer le nom de role">
                                            <label for="role" class="controler">champ obligatoire</label>
                                        </div>
                                        <div class="inputs">
                                            <input type="email" class="input_style" id="email" name="email" value="<?php echo $row['email'] ?>" placeholder="Entrer le email">
                                            <label for="email" class="controler">champ obligatoire</label>
                                        </div>
                                        <div class="inputs">
                                            <input type="password" class="input_style" id="password" name="password" value="<?php echo $row['passwd'] ?>" placeholder="Entrer le password">
                                            <label for="password" class="controler">champ obligatoire</label>
                                        </div>
                                        <div class="inputs">
                                            <input type="text" class="input_style" id="Status" name="Status" value="<?php echo $row['Status'] ?>" placeholder="Entrer le Status">
                                            <label for="Status" class="controler">champ obligatoire</label>
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
                                            Ajouter un compte
                                        </h2>
                                        <div class="inputs">
                                            <input type="text" class="input_style" id="role" name="role" placeholder="Entrer le nom de role">
                                            <label for="role" class="controler">champ obligatoire</label>
                                        </div>
                                        <div class="inputs">
                                            <input type="text" class="input_style" id="email" name="email" placeholder="Entrer email">
                                            <label for="email" class="controler">champ obligatoire</label>
                                        </div>
                                        <div class="inputs">
                                            <input type="text" class="input_style" id="passwd" name="passwd" placeholder="Entrer password">
                                            <label for="passwd" class="controler">champ obligatoire</label>
                                        </div>
                                        <div class="inputs">
                                            <input type="text" class="input_style" id="Status" name="Status" placeholder="Entrer Status">
                                            <label for="Status" class="controler">champ obligatoire</label>
                                        </div>
                                        <input type="submit" class="btn modalsubmit" value="Ajouter" name="Ajouter">
                                        <div class="error"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
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