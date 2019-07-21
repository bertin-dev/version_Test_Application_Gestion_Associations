-- ----------------------------------------------------------------------
-- MySQL Migration Toolkit
-- SQL Create Script
-- ----------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;

CREATE DATABASE IF NOT EXISTS `tontine`
  CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tontine`;
-- -------------------------------------
-- Tables

DROP TABLE IF EXISTS `tontine`.`adherant`;
CREATE TABLE `tontine`.`adherant` (
  `id_adherant` MEDIUMINT(8) unsigned NOT NULL AUTO_INCREMENT,
  `matricule` VARCHAR(8) NOT NULL,
  `nom` VARCHAR(20) NOT NULL,
  `prenom` VARCHAR(30) NOT NULL,
  `cni` VARCHAR(9) NOT NULL,
  `date_naiss` DATE NOT NULL,
  `profession` VARCHAR(45) NOT NULL,
  `id_statut` SMALLINT(5) unsigned NOT NULL,
  `annee_adh` DATE NOT NULL,
  `tel` VARCHAR(11) NOT NULL,
  `id_compte` MEDIUMINT(8) unsigned NOT NULL,
  `id_gpe` TINYINT(3) unsigned NOT NULL,
  PRIMARY KEY (`id_adherant`) ,
  UNIQUE (`cni`),
  UNIQUE (`tel`),
  UNIQUE (`matricule`)
)
ENGINE = INNODB;

DROP TABLE IF EXISTS `tontine`.`compte`;
CREATE TABLE `tontine`.`compte` (
  `id_compte` MEDIUMINT(8) unsigned NOT NULL,
  `depot_dm` INT(10) unsigned NOT NULL,
  `depot_m` INT(10) unsigned NOT NULL,
  `revenu_fm` INT(10) unsigned NOT NULL,
  `emprunt_dm` INT(10) unsigned NOT NULL,
  `emprunt_m` INT(10) unsigned NOT NULL,
  `interet_à_verser` INT(10) unsigned NOT NULL,
  `int_du_mois` INT(10) unsigned NOT NULL,
  `int_total` INT(10) unsigned NOT NULL,
  `amort` INT(10) unsigned NOT NULL,
  `emprunt_fm` INT(10) unsigned NOT NULL,
  `id_adh` MEDIUMINT(8) unsigned NOT NULL,
  `id_fact` INT(10) unsigned NOT NULL,
  PRIMARY KEY (`id_compte`)
)
ENGINE = INNODB;

DROP TABLE IF EXISTS `tontine`.`detient`;
CREATE TABLE `tontine`.`detient` (
  `id_detient` MEDIUMINT(8) unsigned NOT NULL AUTO_INCREMENT,
  `id_adh` MEDIUMINT(8) unsigned NOT NULL,
  `id_compte` MEDIUMINT(8) unsigned NOT NULL,
  PRIMARY KEY (`id_detient`)
)
ENGINE = INNODB;

DROP TABLE IF EXISTS `tontine`.`facture`;
CREATE TABLE `tontine`.`facture` (
  `id_fact` INT(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_type` SMALLINT(5) unsigned NOT NULL,
  `date` DATETIME NOT NULL,
  `montant` INT(10) unsigned NOT NULL,
  `interet` MEDIUMINT(8) unsigned NOT NULL,
  `total` INT(10) unsigned NOT NULL,
  `nb_jour` MEDIUMINT(8) unsigned NOT NULL,
  PRIMARY KEY (`id_fact`)
)
ENGINE = INNODB;

DROP TABLE IF EXISTS `tontine`.`groupe`;
CREATE TABLE `tontine`.`groupe` (
  `id_gpe` TINYINT(3) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id_gpe`)
)
ENGINE = INNODB;

DROP TABLE IF EXISTS `tontine`.`mois`;
CREATE TABLE `tontine`.`mois` (
  `id_mois` SMALLINT(5) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` VARCHAR(10) NOT NULL,
  `id_fact` INT(10) unsigned NOT NULL,
  PRIMARY KEY (`id_mois`)
)
ENGINE = INNODB;

DROP TABLE IF EXISTS `tontine`.`statut_matri`;
CREATE TABLE `tontine`.`statut_matri` (
  `id_statut` SMALLINT(5) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` VARCHAR(12) NOT NULL,
  PRIMARY KEY (`id_statut`)
)
ENGINE = INNODB;

DROP TABLE IF EXISTS `tontine`.`type`;
CREATE TABLE `tontine`.`type` (
  `id_type` SMALLINT(5) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` VARCHAR(13) NOT NULL,
  PRIMARY KEY (`id_type`)
)
ENGINE = INNODB;



SET FOREIGN_KEY_CHECKS = 1;

-- ----------------------------------------------------------------------
-- EOF