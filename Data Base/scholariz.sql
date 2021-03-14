

/* Create DATABASE */

CREATE DATABASE SCHOLARIZ

/* -------------------- Create Tables -------------- */

-- Table Admin

CREATE TABLE `admin` (
  `ID_a` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `ID_p` int(11) DEFAULT NULL
);


-- Table personne

CREATE TABLE `personne` (
  `ID_per` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT ,
  `name` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `date_n` datetime DEFAULT NULL,
  `genre` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `pass` varchar(254) DEFAULT NULL,
  `ID_rolle` int(11) DEFAULT NULL
);

-- Table Student

CREATE TABLE `etudiant` (
  `ID_e` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `CIN` int(11) DEFAULT NULL,
  `CNE` int(11) DEFAULT NULL,
  `ID_p` int(11) DEFAULT NULL
);

-- Table prof

CREATE TABLE `professeur` (
  `ID_p` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `date_emb` datetime DEFAULT NULL
);

-- Table Groupe


CREATE TABLE `groupe` (
  `ID_g` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `labelle` varchar(245) DEFAULT NULL,
  `ID_p` int(11) DEFAULT NULL,
  `ID_pg` int(11) DEFAULT NULL
);

-- Table role

CREATE TABLE `role` (
  `ID_rol` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `status` varchar(254) DEFAULT NULL,
  `ID_pr` int(11) DEFAULT NULL
);

/*------------------- END CREATING TABLES ------------------*/

------------------ ADD FOREIGN KEYS TO ALL TABLES -----------------------------

ALTER TABLE `admin`
ADD CONSTRAINT `ID_pers` FOREIGN KEY (`ID_p`) REFERENCES `personne` (`ID_per`);


ALTER TABLE `etudiant`
ADD CONSTRAINT `ID_p` FOREIGN KEY (`ID_p`) REFERENCES `personne` (`ID_per`);


ALTER TABLE `groupe`
ADD CONSTRAINT `ID_personne` FOREIGN KEY (`ID_p`) REFERENCES `personne` (`ID_per`);

ALTER TABLE `personne`
ADD CONSTRAINT `ID_rolle` FOREIGN KEY (`ID_rolle`) REFERENCES `role` (`ID_rol`);


ALTER TABLE `professeur`
ADD CONSTRAINT `ID_Prsonne` FOREIGN KEY (`ID_p`) REFERENCES `personne` (`ID_per`);


ALTER TABLE `role`
ADD CONSTRAINT `ID_prs` FOREIGN KEY (`ID_pr`) REFERENCES `personne` (`ID_per`);