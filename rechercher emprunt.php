<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Etata Emprunt</title>

<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Style3 {font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std"; font-style: italic; font-weight: bold; color: #333333; }
.Style4 {
	color: #568975;
	font-weight: bold;
	font-style: italic;
	font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std";
}
.Style5 {
	color: #FFFFFF;
	font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std";
	font-style: italic;
	font-weight: bold;
}
-->
</style>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body background="fond.jpg">
<p align="center">&nbsp;</p>
<td bgcolor="#999999">
  <ul id="MenuBar1" class="MenuBarHorizontal">
  <li class="Style2"><a href="acceuil.html" class="Style3">Acceuil</a></li>
  <li class="Style3"><a href="membres.html"><b><i>Membres</i></b></a></li>
  <li><a href="#" class="Style3"><b><i>Factures</i></b></a>
      <ul>
        <li class="Style3"><a href="Facture Depot.html"><i><b>depot</b></i></a> </li>
        <li class="Style3"><a href="facture emprunt.html"><i><b>Emprunt</b></i></a> </li>
        <li class="Style3"><a href="facture remboursement.html"><i><b>Remboursement</b></i></a></li>
    </ul>
  </li>
  <li><a href="#" class="Style3"><b><i>Affiche</i></b></a>
      <ul>
        <li class="Style3"><a href="liste membres.php"><i><b>Liste des membres</b></i></a></li>
        <li><a href="#" class="MenuBarItemSubmenu Style3"><b><i>Factures</i></b></a>
          <ul>
            <li class="Style3"><a href="rechercher depot.html"><b><i>depot</i></b></a></li>
            <li class="Style3"><a href="rechercher emprunt.html"><b><i>Emprunt</i></b></a></li>
            <li class="Style3"><a href="rechercher remboursement.html"><b><i>Remboursement</i></b></a></li>
          </ul>
        </li>
        <li><a href="etat general.html" class="MenuBarItemSubmenu Style3"><i><b>Etat general</b></i></a>
        </li>
        <li><a href="etat revenu global.html" class="Style4">Etat revenu global</a></li>
      </ul>
  </li>
</ul>
<p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="590" border="0" align="center" class="Style3">
<td width="590" bordercolor="#333333"><div align="center" class="Style4">ETAT EMPRUNT</div></td>
</table>
  <form name="login" method="post" action="rechercher depot.php">
  
  <table width="590" border="0" align="center">
  <tr>
    <td width="214" bordercolor="#333333"><div align="center" class="Style4">Inserer nom</div></td>
    <td width="242" bordercolor="#333333"><INPUT type=text name="nom" id="nom">
    &nbsp;</td>
    <td width="120" bordercolor="#333333"><INPUT name="rechercher" type="submit" class="Style4" id="rechercher" value="rechercher">
      &nbsp;</td>
  </tr>
</table>


</form>

<?php

$nom= $_POST['nom'];
//connexion afdc
$connect= mysql_connect("localhost", "root", "")or die("Une erreur est apparue lors de la connexion à la base de données");

$select= mysql_select_db("afdc1", $connect) or die("Une erreur est survenue lors de la sélection de la base de données");


$requete= "SELECT * FROM adherant WHERE nom like '%$nom%'";
$resultat=mysql_query($requete);
//optimise ceci
if ($resultat==NULL) { echo $nom;  echo " n'est pas un membre de COFEDEL";}
else {

while ($rows=mysql_fetch_array($resultat)) {
	$mat=$rows['matricule']; $nom=$rows['nom']; $prenom=$rows['prenom'];

$req= "SELECT emprunt_dm, emprunt_m, interet_a_verser, int_du_mois,`date` FROM compte WHERE matricule= '$mat' AND `type`='emprunt'";
$result=mysql_query($req);
 $num_lign=mysql_num_rows($result);
 print "<table align=\"center\" class=\"Style4\">";
 print "\t\t<td align=\"center\" bgcolor=\"#EEEEEE\" class=\"Style4\">$mat $nom $prenom</td>\n";
 
 
 print "<table align=\"center\" border=1 bgcolor=\"#ffffff\" bordercolor=\"#000000\" width=\"500\">\n";
 
             print "\t<th background=\"cofedel/fond.jpg\">EMPRUNT DEBUT DU MOIS</th>";
             print "\t<th background=\"cofedel/fond.jpg\">EMPRUNT DU MOIS</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">INTERET A VERSER</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">INTERET DU MOIS</th>";
			 print "\t<th background=\"cofedel/fond.jpg\" width=\"100\">DATE</th>";
			 for($i=0; $i<$num_lign; $i++) {
				 $r=mysql_fetch_row($result);
				 print "<tr>";
			     for($j=0; $j<count($r); $j++) {
				     print "\t\t<td align=\"center\" bgcolor=\"#EEEEEE\" class=\"Style4\">$r[$j]</td>\n";
				}
				print "</tr>";
			}
			print "</table>\n";
			print "</table>";
}
}
?>

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<p align="center"><span class="Style3">Bertin Mounok Copyright &copy; 2011</span></p>
<p align="center" class="Style3">Tél: (+237) 694.048.925 / 678.157.705</p>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>
