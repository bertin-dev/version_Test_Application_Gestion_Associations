<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enregistrement membres</title>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Style1 {
	font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std";
	font-weight: bold;
	font-style: italic;
	color: #333333;
}
.Style2 {font-weight: bold}
-->
</style>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Style3 {color: #568975}
.Style5 {font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std"; font-weight: bold; font-style: italic; color: #568975; }
.Style6 {
	color: #FFFFFF;
	font-style: italic;
	font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std";
}
.Style7 {color: #FFFFFF; font-style: italic; font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std"; font-weight: bold; }
-->
</style>
</head>

<body background="fond.jpg">
<p align="center">&nbsp;</p>
<ul id="MenuBar1" class="MenuBarHorizontal">
  <li class="Style2"><a href="acceuil.html" class="Style1">Acceuil</a></li>
  <li class="Style1"><a href="membres.html"><b><i>Membres</i></b></a></li>
  <li><a href="#" class="Style1"><b><i>Factures</i></b></a>
    <ul>
      <li class="Style1"><a href="Facture Depot.php"><i><b>depot</b></i></a> </li>
      <li class="Style1"><a href="facture emprunt.php"><i><b>Emprunt</b></i></a> </li>
      <li class="Style1"><a href="facture remboursement.php"><i><b>Remboursement</b></i></a></li>
    </ul>
  </li>
  <li><a href="#" class="Style1"><b><i>Affiche</i></b></a>
    <ul>
      <li class="Style1"><a href="liste membres.php"><i><b>Liste des membres</b></i></a></li>
      <li><a href="#" class="Style1"><b><i>Factures</i></b></a>
        <ul>
          <li class="Style1"><a href="rechercher depot.html"><b><i>depot</i></b></a></li>
          <li class="Style1"><a href="rechercher emprunt.html"><b><i>Emprunt</i></b></a></li>
          <li class="Style1"><a href="rechercher remboursement.html"><b><i>Remboursement</i></b></a></li>
        </ul>
        </li>
      <li><a href="etat general.html" class="Style1"><i><b>Etat general</b></i></a>
          
      </li>
      <li><a href="etat revenu global.html" class="Style5">Etat revenu global</a></li>
    </ul>
  </li>
</ul>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="290" border="1" align="center" bordercolor="#FFFFFF" bgcolor="#CCCCCC" class="Style1">
  <tr>
    <td align="center" class="Style3"><div align="center" class="Style6"><strong>Enregistrement Membres</strong></div></td>
</table>


<?php
$nom=$_POST['nom'];


$connect= mysql_connect("localhost", "root", "")or die ("Une erreur est apparue lors de la connexion à la base de données");

$select= mysql_select_db("afdc1", $connect) or die("Une erreur est survenue lors de la sélection de la base de données");

$sel="SELECT * FROM adherant WHERE nom='$nom'";
$e=mysql_query($sel);
$z=mysql_fetch_row($e);



?>



<td width="144" align="center" valign="middle">
<form name="login" method="post" action="adherant1.php">

<table width="361" height="158" border="0" align="center" bordercolor="#FFFFFF">
  <tr>
    <td width="174" class="Style1"><div align="center" class="Style6">Matricule</div></td>
    <td width="177"><INPUT name="mat" type=text value="<?php  echo $z[1]; ?>" readonly="readonly">&nbsp;</td>
  </tr>
  <tr>
    <td class="Style1"><div align="center" class="Style6">Nom</div></td>
    <td><INPUT name="nom" type=text value="<?php  echo $z[2]; ?>" readonly="readonly">&nbsp;</td>
  </tr>
  <tr>
    <td class="Style1"><div align="center" class="Style6">Prenom</div></td>
    <td><INPUT name="prenom" type=text value="<?php  echo $z[3]; ?>" readonly="readonly">&nbsp;</td>
  </tr>
</table>
<table width="362" height="104" border="0" align="center">
  <tr>
    <td width="175"><div align="center" class="Style1">
      <div align="center" class="Style6"><em><strong>CNI</strong></em></div>
    </div></td>
    <td width="177"><INPUT name="cni" type=text value="<?php  echo $z[4]; ?>" readonly="readonly">&nbsp;</td>
  </tr>
  <tr>
    <td class="Style1"><div align="center" class="Style6">Telephone</div></td>
    <td><INPUT type=text name="tel" value="<?php  echo $z[7]; ?>">&nbsp;</td>
  </tr>
</table>
<table width="436" height="161" border="0" align="center">
  <tr>
    <td width="210" bordercolor="#CCCCCC" class="Style1"><div align="left" class="Style3">
      <div align="center" class="Style7">Lieu d'appartenance</div>
    </div></td>
    <td width="210"><SELECT name="lieu" size="1" class="Style5">
      <option value="<?php  echo $z[8]; ?>"><?php  echo $z[8]; ?></option>
      <option value="MONATELE">MONATELE</option>
      <option value="EVODOULA">EVODOULA</option>
      <option value="OBALA">OBALA</option>
      <option value="YAOUNDE">YAOUNDE</option>
	</SELECT>
    &nbsp;</td>
  </tr>
  <tr>
    <td bordercolor="#999999" class="Style3"><div align="center" class="Style7">Statut matrimonial</div></td>
    <td><select name="lieu2" size="1" class="Style5">
      <option value="<?php  echo $z[6]; ?>"><?php  echo $z[6]; ?></option>
      <option value="CELIBATAIRE">CELIBATAIRE</option>
      <option value="MARIEE">MARIEE</option>
      <option value="VEUVE">VEUVE</option>
    </select></td>
  </tr>
  <tr>
    <td bordercolor="#999999" class="Style1"><div align="center" class="Style6">Profession</div></td>
    <td><INPUT type=text name="profession" value="<?php  echo $z[5]; ?>">&nbsp;</td>
  </tr>
  <tr>
    <td bordercolor="#999999" class="Style1"><INPUT name="valider" type="submit" class="Style5" id="valider" value="valider">
    &nbsp;</td>
    <td><INPUT name="annuler" type="reset" class="Style5" id="annuler" value="annuler">
    &nbsp;</td>
  </tr>
 </table>
 
 <table width="479" border="0" align="center">
  <p><td width="506" align="center" bordercolor="#999999" class="Style1"><a href="rechercher membre.php" class="Style2">Modifier les informations d'un membre</a></td><td width="10"></p>
  </table>
</form>

<p align="center"><span class="Style1">Bertin Mounok Copyright &copy; 2011</span></p>
<p align="center" class="Style1">Tél: (+237) 694.048.925 / 678.157.705</p>

<p align="center" class="Style2">&nbsp; </p>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>
