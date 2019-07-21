<?php

$con= mysql_connect("localhost", "root", "") or die ("ERREUR DE CONNEXION AU SERVEUR DE BASE DE DONNEES");
/*--
-- Base de données: `afdc`
--*/
$a="CREATE DATABASE IF NOT EXISTS `afdc1`;";
$req= mysql_query($a, $con);


$h="USE `afdc1`;";
$r= mysql_query($h, $con);

$b="CREATE TABLE IF NOT EXISTS `adherant` (
  `id_adherant` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `matricule` varchar(8) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `cni` varchar(9) NOT NULL,
  `profession` varchar(45) NOT NULL,
  `statut` varchar(15) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `gpe` varchar(15) NOT NULL,
  PRIMARY KEY (`id_adherant`),
  UNIQUE KEY `cni` (`cni`),
  UNIQUE KEY `matricule` (`matricule`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;";

$req= mysql_query($b, $con);


$d="CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;";

$req= mysql_query($d, $con);



$f="CREATE TABLE IF NOT EXISTS `compte` (
  `id_compte` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `revenu_dm` bigint(20) unsigned NOT NULL,
  `versement_m` bigint(20) unsigned NOT NULL,
  `revenu_fm` bigint(20) unsigned NOT NULL,
  `emprunt_dm` bigint(20) unsigned NOT NULL,
  `emprunt_m` bigint(20) unsigned NOT NULL,
  `interet_a_verser` float unsigned NOT NULL,
  `int_du_mois` float unsigned NOT NULL,
  `int_total` float unsigned NOT NULL,
  `amort` float unsigned NOT NULL,
  `emprunt_fm` bigint(20) unsigned NOT NULL,
  `type` varchar(20) NOT NULL,
  `mois` varchar(15) NOT NULL,
  `date` varchar(10) NOT NULL,
  `nb_jour` tinyint(2) NOT NULL,
  `matricule` varchar(8) NOT NULL,
  PRIMARY KEY (`id_compte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;";

$req= mysql_query($f, $con);


		include("pas.html");

?>