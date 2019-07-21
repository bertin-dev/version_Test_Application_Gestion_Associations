<?php

$nom= $_POST['nom'];
//connexion afdc
$connect= mysql_connect("localhost", "root", "")or die("Une erreur est apparue lors de la connexion à la base de données");

$select= mysql_select_db("afdc1", $connect) or die("Une erreur est survenue lors de la sélection de la base de données");


$requete= "SELECT * FROM adherant WHERE nom like '%$nom%'";
$resultat=mysql_query($requete);
while ($rows=mysql_fetch_array($resultat)) {
	$mat=$rows['matricule']; $nom=$rows['nom']; $prenom=$rows['prenom'];
echo $mat;
echo "<br>";
echo $nom;
echo "<br>";
echo $prenom;
echo "<br>";


$req= "SELECT vesement_m, revenu_m FROM compte WHERE matricule= '$mat'";
$result=mysql_query($req);
echo $result;
 $num_lign=mysql_num_rows($result);
			 for($i=0; $i<$num_lign; $i++) {
				 $r=mysql_fetch_row($result);
				 print "<tr>";
			     for($j=0; $j<count($r); $j++) {
				     print "\t\t<td align=\"center\" bgcolor=\"#EEEEEE\" class=\"Style4\">$r[$j]</td>\n";
				}
				print "</tr>";
			}
}
include("rechercher depot.html");
?>