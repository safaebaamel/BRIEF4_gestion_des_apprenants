<div id="modal-<?php echo $id; ?>" class="popup hidden">
    <div class="addEtudiant">
        <div class="addEtudiant-child">
            <span class="close">X</span>
            <form action="service/updateetudiant.php" method="POST">
                <h2 class="title">
                    modifier l'etudiant
                </h2>
                    <input type="text" name="id" hidden value="<?php echo $id; ?>">
                    <input type="text" name="id_compte" hidden value="<?php echo $id_compte; ?>">
                <div class="inputs">
                    <input type="text" class="input_style" name="nom" placeholder="Entrer le nom" value="<?php echo $nom; ?>">
                    <label for="nom" class="controler">champ obligatoire</label>
                </div>
                <div class="inputs">
                    <input type="text" class="input_style" name="prenom" placeholder="Entrer le prénom" value="<?php echo $prenom; ?>">
                    <label for="prenom" class="controler">champ obligatoire</label>
                </div>
                <div class="inputs">
                    <input type="date" class="input_style" name="date_naissance" placeholder="Entrer la date_naissance" value="<?php echo $dateDeNaissance; ?>">
                    <label for="date_naissance" class="controler">champ obligatoire</label>
                </div>
                <div class="inputs">
                    <input type="text" class="input_style" name="cne" placeholder="Entrer CNE" value="<?php echo $cNE; ?>">
                    <label for="cne" class="controler">champ obligatoire</label>
                </div>
                <div class="inputs">
                    <input type="text" class="input_style"  name="cin" placeholder="Entrer cin" value="<?php echo $cIN; ?>">
                    <label for="cin" class="controler">champ obligatoire</label>
                </div>
                <div class="inputs">
                    <select name="genre" class="select" >
                        <option value="">choisier le genre</option>
                        <option value="male" <?php echo $genre=="male" ? 'selected':''; ?>>Male</option>
                        <option value="female"  <?php echo $genre=="female" ? 'selected':''; ?> >famale</option>
                    </select>
                    <label for="genre" class="controler">champ obligatoire</label>
                </div>
                <div class="inputs">
                    <select name="groupe" class="select">
                        <option value="">choisier le groupe</option>
                        <?php
                        $query = "SELECT * FROM `groupe`";

                        $result = mysqli_query($connect, $query);

                        while ($row = mysqli_fetch_array($result)) { ?>
                            <option <?php echo $Groupe==$row['groupe_name'] ? 'selected':''; ?> value="<?php echo $row['ID_groupe']; ?>"><?php echo $row['groupe_name']; ?></option>
                        <?php } ?>
                    </select>
                    <label for="groupe" class="controler">champ obligatoire</label>
                </div>

                <div class="inputs">
                    <input type="email" class="input_style" name="email" placeholder="Entrer email" value="<?php echo $email; ?>">
                    <label for="email" class="controler">champ obligatoire</label>
                </div>
               
               
                <input type="submit" class="btn" value="modifier" name="update">
            </form>
        </div>
    </div>
</div>