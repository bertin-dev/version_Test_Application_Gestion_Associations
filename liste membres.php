<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Liste des membres</title>

<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Style3 {font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std"; font-style: italic; font-weight: bold; color: #568975; }
#apDiv1 {
	position:absolute;
	left:11px;
	top:53px;
	width:110px;
	height:1117px;
	z-index:1;
	background-color: #568975;
}
.Style4 {font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std"; font-style: italic; font-weight: bold; color: #333333; }
.Style5 {
	color: #FFFFFF;
	font-weight: bold;
	font-style: italic;
	font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std";
}
-->
</style>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body background="fond.jpg">
<p align="center">&nbsp;</p>
<td bgcolor="#999999">
  <ul id="MenuBar1" class="MenuBarHorizontal">
  <li class="Style2"> <a href="acceuil.html" class="Style3">Acceuil</a></li>
  <li class="Style3"><a href="membres.html"><b><i>Membres</i></b></a></li>
  <li><a href="#" class="MenuBarItemSubmenu Style3"><b><i>Factures</i></b></a>
      <ul>
        <li class="Style3"><a href="Facture Depot.php"><i><b>depot</b></i></a> </li>
        <li class="Style3"><a href="facture emprunt.php"><i><b>Emprunt</b></i></a> </li>
        <li class="Style3"><a href="remboursement.php"><i><b>Remboursement</b></i></a></li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu Style3"><b><i>Affiche</i></b></a>
      <ul>
        <li><a href="liste membres.php" class="Style3">Liste membres</a></li>
        <li><a href="#" class="MenuBarItemSubmenu Style3"><b><i>Factures</i></b></a>
            <ul>
              <li class="Style3"><a href="rechercher depot.html"><b><i>depot</i></b></a></li>
              <li class="Style3"><a href="rechercher emprunt.html"><b><i>Emprunt</i></b></a></li>
              <li class="Style3"><a href="rechercher remboursement.html"><b><i>Remboursement</i></b></a></li>
            </ul>
        </li>
        <li><a href="etat general.html" class="MenuBarItemSubmenu Style3"><i><b>Etat general</b></i></a>
           
        </li>
        <li><a href="etat revenu global.html" class="Style3">Etat revenu global</a></li>
      </ul>
  </li>
</ul>
<p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="200" border="1" align="center">
  <tr>
    <td bordercolor="#333333" bgcolor="#CCCCCC"><div align="center" class="Style5">Liste des membres</div></td>
    </tr>
</table>

<form method="post" action="liste membres.php">
<?php
$connect= mysql_connect("localhost", "root", "")or die ("Une erreur est apparue lors de la connexion à la base de données");
$select=mysql_select_db('afdc1', $connect) or die("Une erreur est survenue lors de la sélection de la base de données");

$sel="SELECT matricule, nom, prenom, cni, profession, statut, tel, gpe FROM adherant ORDER BY nom";

$result=mysql_query($sel) or die ("ERROR");
$nom_lign=mysql_num_rows($result);
print "<table align=\"center\" class=\"Style4\">";
 print "\t\t<td align=\"center\" bgcolor=\"#EEEEEE\" class=\"Style3\">$nom_lign MEMBRE(S) INSCRIT(S)</td>\n";
 print"<p>&nbsp;</p>";
print "<table align=\"center\" border=1 bgcolor=\"#ffffff\" bordercolor=\"#000000\" width=\"1200\">\n";
print "\t<tr>\n";
             print "\t<th background=\"cofedel/fond.jpg\">MATRICULE</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">NOM</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">PRENOM</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">CNI</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">PROFESSION</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">STATUT MATRIMONIAL</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">TELEPHONE</th>";
			 print "\t<th background=\"cofedel/fond.jpg\">LIEU D'APPARTENANCE</th>";
			 print "\t</tr>\n";
			 
			 
			 for($i=0; $i<$nom_lign; $i++) {
				 $r=mysql_fetch_row($result);
				 print "<tr>";
			     for($j=0; $j<count($r); $j++) {
				     print "\t\t<td align=\"left\" bgcolor=\"#EEEEEE\" class=\"Style4\">$r[$j]</td>\n";
				}
				print "</tr>";
			}
     
	 print "</table>\n";
	 



?>

  
  <p>&nbsp;</p>

<p align="center"><span class="Style4">Bertin Mounok Copyright &copy; 2011</span></p>
<p align="center" class="Style4">Tél: (+237) 694.048.925 / 678.157.705</p>
</form>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>
