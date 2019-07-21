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

		include("membres.html");
		
      
	    ?>
        
        <script language="javascript">
		 alert("VEUILLEZ REMPLIR LES CHAMPS MATRICULE, NOM, PRENOM, CNI, TELEPHONE ET LIEU D'APPARTENANCE");
		</script>
        
        <?php
        
}

else 
{
$query="INSERT INTO `afdc1`.`adherant` (`matricule`, `nom`, `prenom`, `cni`, `profession`, `statut`, `tel`, `gpe`) VALUES ('$mat', '$nom', '$prenom', '$cni', '$prof', '$lieu2', '$tel', '$lieu')";
  $exe= mysql_query($query);
     if ($exe) {
	
 include("membres.html");
 
 ?>
        
        <script language="javascript">
		 alert("ENREGISTREMENT EFFECTUE");
		</script>
        
        <?php
 
 }
 
 else {  
 
  include("membres.html");
 
  ?>
        
        <script language="javascript">
		 alert("ERREUR ENREGISTREMENT: MATRICULE OU CNI IDENTIQUE A UN ENREGISTREMENT PRECEDENT");
		</script>
        
        <?php
 
 }
  }
}



?>