<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Etat General</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Style2 {
	color: #FFFFFF;
	font-weight: bold;
	font-style: italic;
}
.Style3 {font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std"}
.Style4 {
	color: #568975;
	font-weight: bold;
	font-style: italic;
	font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std";
}
.Style5 {font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std"; font-style: italic; font-weight: bold; color: #333333; }
-->
</style>
</head>

<body background="fond.jpg">
<p align="center">&nbsp;</p>
<ul id="MenuBar2" class="MenuBarHorizontal">
  <li class="Style2"><a href="acceuil.html" class="Style3">Acceuil</a></li>
  <li class="Style3"><a href="membres.html"><b><i>Membres</i></b></a></li>
  <li><a href="#" class="MenuBarItemSubmenu Style3"><b><i>Factures</i></b></a>
      <ul>
        <li class="Style3"><a href="Facture Depot.php"><i><b>depot</b></i></a> </li>
        <li class="Style3"><a href="facture emprunt.php"><i><b>Emprunt</b></i></a> </li>
        <li class="Style3"><a href="facture remboursement.php"><i><b>Remboursement</b></i></a></li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu Style3"><b><i>Affiche</i></b></a>
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
<p>&nbsp;</p>
<table width="263" height="38" border="0" align="center" bgcolor="#CCCCCC">
  <tr>
    <td class="Style3"><div align="center" class="Style2"><em><strong>Etat General</strong></em></div></td>
  </tr>
</table>
<table width="590" border="0" align="center">
<td width="214" bordercolor="#333333"><div align="center" class="Style4">Selectionner un mois</div></td>
<td width="242" bordercolor="#333333">
<form method="post" action="etat general.php">

<select name="mois" size="1" class="Style4" id="mois">
      <option selected="selected"></option>
      <option value="Janvier">Janvier</option>
      <option value="Fevrier">Février</option>
      <option value="Mars">Mars</option>
      <option value="Avril">Avril</option>
      <option value="Mai">Mai</option>
      <option value="Juin">Juin</option>
      <option value="Juillet">Juillet</option>
      <option value="Aout">Août</option>
      <option value="Septembre">Septembre</option>
      <option value="Octobre">Octobre</option>
      <option value="Novembre">Novembre</option>
      <option value="Decembre">Décembre</option>
    </select>
    <INPUT name="valider" type="submit" class="Style4" id="valider" value="valider">
</form>
</td>
</table>
<p>&nbsp;</p>

<?php
$mois= $_POST['mois'];

//connexion afdc
$connect= mysql_connect("localhost", "root", "")or die ("Une erreur est apparue lors de la connexion à la base de données");


$select= mysql_select_db("afdc1", $connect) or die("Une erreur est survenue lors de la sélection de la base de données");

//select sur la bdd
$sel= "SELECT `matricule`, `date`, `revenu_dm`, `versement_m`, `revenu_fm`, `emprunt_dm`, `emprunt_m`, `interet_a_verser`, `int_du_mois`, `int_total`, `amort`, `emprunt_fm` FROM `compte` WHERE `mois`='$mois'";
$exe=mysql_query($sel) or die("ERROR");
$mois=strtoupper($mois);

print "<table align=\"center\" class=\"Style4\">";
 print "\t\t<td align=\"center\" bgcolor=\"#EEEEEE\" class=\"Style4\">ETAT GENERAL DU MOIS DE $mois</td>\n";

print "<table align=\"center\" border=1 bgcolor=\"#ffffff\" bordercolor=\"#000000\" width=\"1350\">\n";
print "\t<tr>\n";
             
             print "\t<th background=\"cofedel/fond.jpg\">MATRICULE</th>";
			 print "\t<th background=\"cofedel/fond.jpg\" width=\"100\">DATE</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">REVENU DEBUT DU MOIS</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">VERSEMENT DU MOIS</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">REVENU FIN DU MOIS</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">EMPRUNT DEBUT DU MOIS</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">EMPRUNT DU MOIS</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">INTERET A VERSER</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">INTERET DU MOIS</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">INTERET TOTAL</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">AMORTISSEMENT</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">EMPRUNT FIN DU MOIS</th>";
			 print "\t</tr>\n";
			 
			 $nom_lign=mysql_num_rows($exe);
			 for($i=0; $i<$nom_lign; $i++) {
				 $r=mysql_fetch_row($exe);
				 print "<tr>";
			     for($j=0; $j<count($r); $j++) {
				     print "\t\t<td align=\"center\" bgcolor=\"#EEEEEE\" class=\"Style4\">$r[$j]</td>\n";
				}
				print "</tr>";
			}
     
	 print "</table>\n";
?>
<p>&nbsp;</p>
<table width="50" border="0" align="center">
<td width="50" align="center" valign="middle" bordercolor="#333333">
<form method="post" action="maj.php">

    <INPUT align="middle" name="update" type="submit" class="Style4" id="update" value="Mettre à jour">
</form>
</td>
</td>
</table>

<p>&nbsp;</p>

<p align="center"><span class="Style5">Bertin Mounok Copyright &copy; 2011</span></p>
<p align="center" class="Style5">Tél: (+237) 694.048.925 / 678.157.705</p>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
  </script>
</body>
</html>
