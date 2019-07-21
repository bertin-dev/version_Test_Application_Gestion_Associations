<?php
$date=  date("d-m-Y");
$mois= mois();


$connect= mysql_connect("localhost", "root", "")or die ("Une erreur est apparue lors de la connexion à la base de données");

$select= mysql_select_db("afdc1", $connect) or die("Une erreur est survenue lors de la sélection de la base de données");



$sql = "SELECT SUM(`revenu_fm`), `matricule` FROM `compte` WHERE `mois`='$mois' GROUP BY `matricule`";
$query=mysql_query($sql);
while($ligne = mysql_fetch_array($query)) {
	 
		 
	   $a="SELECT MAX(id_compte) FROM compte WHERE matricule='$ligne[1]' AND type='depot'";
	   $b=mysql_query($a); 
	  
	   $lig = mysql_fetch_array($b); 
	$u="UPDATE `afdc1`.`compte` SET `revenu_dm`='$ligne[0]' WHERE `compte`.`matricule`= '$ligne[1]' AND `compte`.`id_compte`= '$lig[0]'";
	$b=mysql_query($u);  
	
   
}





	
//$sql = "SELECT SUM(`revenu_fm`), `matricule` FROM `compte` WHERE `mois`='$mois' GROUP BY `matricule`";
//$query=mysql_query($sql);
//$nom_lign=mysql_num_rows($query);
//for($i=0; $i<$nom_lign; $i++) {
//   $r=mysql_fetch_row($query);
 //  for($j=0; $j<count($r); $j++) {
//	   $a="SELECT MAX(id_compte) FROM compte WHERE matricule='$r[1]'";
	//   $b=mysql_query($a); 
//	   if ($b){echo "ok1 $r[0] ";} else {echo "va te faire foutre1";} 
	//$u="UPDATE `afdc1`.`compte` SET `revenu_dm`='$r[0]' WHERE `compte`.`matricule`= '$r[1]' AND //`compte`.`id_compte`= '$b'";
	//$b=mysql_query($u);  
	//if ($b){echo "ok";} else {echo "va te faire foutre";}
  // }
//}


$sql = "SELECT SUM(`emprunt_fm`), `matricule` FROM `compte` WHERE `mois`='$mois' AND type='emprunt' GROUP BY `matricule`";
$query=mysql_query($sql);
while($ligne = mysql_fetch_array($query)) {

		 
	   $a="SELECT MAX(id_compte) FROM compte WHERE matricule='$ligne[1]' AND type='depot'";
	   $b=mysql_query($a); 
	  
	   $lig = mysql_fetch_array($b); 
	$u="UPDATE `afdc1`.`compte` SET `emprunt_dm`='$ligne[0]', interet_a_verser=($ligne[0]*0.05) WHERE `compte`.`matricule`= '$ligne[1]' AND `compte`.`id_compte`= '$lig[0]'";
	$b=mysql_query($u);  
	
   }



$message='MISE A JOUR EFFECTUEE';
 include("etat general.html");
 echo "<p align=center><b><font face=Arial size=2 color=red>".$message."</font></b></p>";




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

   


?>