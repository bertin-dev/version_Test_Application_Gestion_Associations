<?php


$mat= $_POST['mat'];
$date= $_POST['date'];
$mont= $_POST['montant'];
$mois= mois();



if (empty ($mat) or empty($mont)) {
	
 include("Facture Depot.php");

 
 ?>
 <script language="javascript">
		 alert("VEUILLEZ INSERER UN MATRICULE VALIDE ET LE MONTANT DEPOSE");
		</script>
        <?php
 
 }
 
 else {
$mat= trim($mat);
$date= trim($date);
$mont= trim($mont);



$connect= mysql_connect("localhost", "root", "")or die ("Une erreur est apparue lors de la connexion à la base de données");


$select= mysql_select_db("afdc1", $connect) or die("Une erreur est survenue lors de la sélection de la base de données");



depot_m();
 }

 
 
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
 
 
 function depot_m() {
	 
	 global $mat;
	 global $mont;
	 global $mois;
	 global $date;
	 
$in= "INSERT INTO `afdc1`.`compte` (`versement_m`, `type`, `matricule`, `mois`, `date`) VALUES ('$mont', 'depot', '$mat', '$mois', '$date')";
$exe=mysql_query($in);


// la demer

$iv1="SELECT MAX(id_compte) FROM compte WHERE matricule='$mat' AND date='$date'";
$exe= mysql_query($iv1); 
$r=mysql_fetch_row($exe);
$b=(int)$r[0];

$req="SELECT SUM(`versement_m`) FROM compte WHERE matricule='$mat' AND mois='$mois'";
$exe= mysql_query($req); 
$r=mysql_fetch_row($exe);
$a=(int)$r[0];

$req= "UPDATE `afdc1`.`compte` SET `revenu_fm`='$a' WHERE id_compte=$b";

$exe3= mysql_query($req);

if ($exe3) {

 include("facture_depot.php");
 
 ?>
 <script language="javascript">
		 alert("INSERTION REUSSIE");
		</script>
        <?php
 
}
else { 
 include("facture depot.php");
 
 
 ?>
 <script language="javascript">
		 alert("PROBLEME D'ENREGISTREMENT VEUILLEZ CONTACTER LE CONCEPTEUR DE VOTRE APPLICATION");
		</script>
        <?php
 
 }

 }
 ?>