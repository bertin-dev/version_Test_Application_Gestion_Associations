<?php


$mat= $_POST['matricule'];
$date= $_POST['date'];
$mont= $_POST['montant'];

$iv1= 0;
global $efm;
$mois= mois();


 //connexion
$connect= mysql_connect("localhost", "root", "")or die ("Une erreur est apparue lors de la connexion à la base de données");

$select= mysql_select_db("afdc1", $connect) or die("Une erreur est survenue lors de la sélection de la base de données");


if($mat==NULL or $mont==NULL){
	
	include("facture emprunt.php");
	
	?>
 <script language="javascript">
		 alert("VEULLEZ REMPLIR TOUS LES CHAMPS");
		</script>
        <?php
}
else {



emprunt_m();
}

//recuperation mois
function mois(){
	$d= date("n");

$tab_m[1]="JANVIER";
$tab_m[2]="FEVRIER";
$tab_m[3]="MARS";
$tab_m[4]="AVRIL";
$tab_m[5]="MAI";
$tab_m[6]="JUIN";
$tab_m[7]="JUILLET";
$tab_m[8]="AOUT";
$tab_m[9]="SEPTEMBRE";
$tab_m[10]="OCTOBRE";
$tab_m[11]="NOVEMBRE";
$tab_m[12]="DECEMBRE";

for ($x =1; $x <13; $x++) {
	if($x== $d)
return $tab_m["$x"];
}}





//fonction emprunt debut du mois
function emprunt_dm()
{
	global $mat;
	global $date;
	global $mont;
	global $iv1;
	global $exe;
	global $mois;
	
if ($exe != NULL) {
	$iv1=($mont*0.05);
	
	$in= "INSERT INTO `afdc1`.`compte` (`emprunt_dm`, `interet_a_verser`, `type`, `mois`, `date`, `matricule`) VALUES ('$mont', '$iv1', 'emprunt', '$mois', '$date', '$mat')";
}
	else
	{
		
		$in="INSERT INTO `afdc1`.`compte` (`emprunt_dm`, `interet_a_verser`, `type`, `mois`, `date`, `matricule`) VALUES ('$efm', '$iv1', 'emprunt', '$mois', '$date', '$mat')";
	}
	$exe= mysql_query($in);
	
}


//emprunt du mois
function emprunt_m()
{
	$n= $_POST['jour'];
	$iv2= 0;
	global $mat;
	global $date;
	global $mont;
	global $int;
	global $mois;


if($n==NULL){
	
	include("facture emprunt.php");
	
	?>
 <script language="javascript">
		 alert("INSERER UN NOMBRE DE JOUR");
		</script>
        <?php
}
else {
$iv2= (($mont*5*$n)/3000);

$i= "SELECT SUM(`emprunt_m`)+SUM(`emprunt_dm`) FROM `afdc1`.`compte` WHERE `mois`='$mois' AND `matricule`='$mat'";
$i1=mysql_query($i);
$r=mysql_fetch_row($i1);
$a1=(float)$r[0];


$in= "INSERT INTO `afdc1`.`compte` (`emprunt_m`, `int_du_mois`, `date`, `type`, `mois`, `nb_jour`, `matricule`) VALUES ('$mont', '$iv2', '$date', 'emprunt', '$mois', '$n', '$mat')";
	
$exe= mysql_query($in);



//calcul de l'interêt total

$iv1= "SELECT SUM(interet_a_verser) + SUM(int_du_mois) FROM compte WHERE matricule= '$mat' AND mois='$mois'";
$exe= mysql_query($iv1); 
$r=mysql_fetch_row($exe);
$a=(float)$r[0];

$iv1="SELECT MAX(id_compte) FROM compte WHERE matricule='$mat' AND date='$date'";
$exe= mysql_query($iv1); 
$r=mysql_fetch_row($exe);
$b=(int)$r[0];



$req= "UPDATE `afdc1`.`compte` SET `int_total`='$a', `emprunt_fm`='$a1'  WHERE `compte`.`matricule`= '$mat' AND `compte`.`id_compte`= '$b'";

$exe3= mysql_query($req);

if ($exe3) {

 include("facture_emprunt.php");
 
 ?>
        
        <script language="javascript">
		 alert("ENREGISTREMENT EFFECTUE");
		</script>
        
        <?php
 
}
else { 
 include("facture emprunt.php");
 
 
 ?>
        
        <script language="javascript">
		 alert("PROBLEME D'ENREGISTREMENT VEUILLEZ CONTACTER LE CONCEPTEUR DE VOTRE APPLICATION");
		</script>
        
        <?php
 
 }

}
}

?>