<?php

//reporte toutes les ERREURS


error_reporting(E_ALL);

$mat= $_POST['mat'];
$nom= $_POST['nom'];
$prenom= $_POST['prenom'];
$cni= $_POST['cni'];
$prof= $_POST['profession'];
$tel= $_POST['tel'];
$lieu= $_POST['lieu'];
$lieu2= $_POST['lieu2'];


//suppression des espaces de saisie inutiles
$mat= trim($mat);
$nom= trim($nom);
$prenom= trim($prenom);
$cni= trim($cni);
$prof= trim($prof);
$tel= trim($tel);

//majuscules
$nom= strtoupper($nom);




//connexion afdc
$connect= mysql_connect("localhost", "root", "")or die("Une erreur est apparue lors de la connexion à la base de données");


$select= mysql_select_db("afdc1", $connect) or die("Une erreur est survenue lors de la sélection de la base de données");
	
	inserer();
//insere un nouvel adherant

function inserer() {

global $mat; 
global $nom;
global $prenom;
global $cni;
global $prof;
global $tel;
global $lieu;
global $lieu2;


if (empty ($mat) or $nom== NULL or $cni== NULL or $tel== NULL or $lieu== NULL) 
{
 $message="VEUILLEZ REMPLIR LES CHAMPS MATRICULE, NOM, PRENOM, CNI, TELEPHONE ET LIEU D'APPARTENANCE";
 
                
		include("membres.html");
		echo "<p align=center><b><font face=Arial size=5 color=red>".$message."</font></b></p>";
}

else 
{
	$sel="SELECT id_adherant FROM adherant WHERE nom='$nom'";
$e=mysql_query($sel);
$b=mysql_fetch_row($e);

$query="UPDATE `adherant` SET profession='$prof', statut='$lieu2', tel='$lieu'  WHERE `compte`.`matricule`= '$mat' AND `compte`.`id_compte`= '$b[0]'";
  $exe= mysql_query($query);
     if ($exe) {
	 $message='ENREGISTREMENT EFFECTUE';
 include("membres.html");
 echo "<p align=center><b><font face=Arial size=4 color=#568975>".$message."</font></b></p>";
 }
 
 else {  
 $message='ERREUR ENREGISTREMENT: MATRICULE OU CNI IDENTIQUE A UN ENREGISTREMENT PRECEDENT';
  include("membres.html");
 echo "<p align=center><b><font face=Arial size=4 color=red>".$message."</font></b></p>";
 }
  }
}



?>