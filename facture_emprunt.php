<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Facture Emprunt</title>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Style1 {
	font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std";
	font-style: italic;
	font-weight: bold;
}
.Style2 {color: #FFFFFF}
.Style3 {
	color: #568975;
	font-weight: bold;
	font-style: italic;
	font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std";
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
</head>

<body background="fond.jpg">
<p align="center">&nbsp;</p>
<table width="239" height="35" border="1" align="center" bordercolor="#CCCCCC" bgcolor="#CCCCCC">
  <tr>
    <td class="CollapsiblePanelFocused"><div align="center" class="Style5"><a href="facture emprunt.php" class="Style5">Facture emprunt</a></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<?php
$mat=$_POST['matricule'];
$date=$_POST['date'];
$mont=$_POST['montant'];
$jr=$_POST['jour'];


$connect= mysql_connect("localhost", "root", "")or die ("Une erreur est apparue lors de la connexion à la base de données");

$select= mysql_select_db("afdc1", $connect) or die("Une erreur est survenue lors de la sélection de la base de données");

$sel="SELECT nom, prenom FROM adherant WHERE matricule='$mat'";
$e=mysql_query($sel);
$z=mysql_fetch_row($e);

$sel="SELECT MAX(id_compte) FROM compte WHERE matricule='$mat'";
$e=mysql_query($sel);
$num=mysql_fetch_row($e);

$sel1="SELECT nom FROM admin WHERE id_admin='3'";
$f=mysql_query($sel1);
$nom=mysql_fetch_row($f);

?>

<form name="login" method="post" action="emprunt.php">

<table width="952" height="47" border="0" align="center">
  <tr>
    <td width="118" height="43" class="Style1"><div align="center" class="Style5">Matricule</div></td>
    <td width="201"><INPUT name="matricule" type="text" class="Style4" value="<?php  echo $mat; ?>" readonly="readonly">&nbsp;</td>
    <td width="102" class="Style1"><div align="center" class="Style5">Date</div></td>
    <td width="202"><INPUT name="date" type="text" class="Style4" value="<?php  echo $date; ?>" readonly="readonly">&nbsp;</td>
    <td width="110" class="Style1"><div align="center" class="Style5">Numero</div></td>
    <td width="193"><INPUT name="numero" type="text" class="Style4" value="<?php  echo $num[0]; ?>" readonly="readonly"></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>

<table width="373" height="211" border="0" align="center">
  <tr>
    <td width="156" height="49" class="Style1"><div align="center" class="Style5">Montant</div></td>
    <td width="207"><INPUT name="montant" type="text" class="Style4" value="<?php  echo $mont; ?>" readonly="readonly">&nbsp;</td>
  </tr>
  <tr>
    <td height="80" class="Style1"><div align="center" class="Style5">Nombre de jours</div></td>
    <td><input name="nbr de jours" type="text" class="Style4" id="nbr de jours" value="<?php  echo $jr; ?>" readonly="readonly" /></td>
  </tr>
  <tr>
    <td height="74" class="Style1"><div align="center" class="Style5">Interet</div></td>
    <td><input name="interet" type="text" class="Style4" id="interet" value="<?php  echo $int=(($mont*5*$jr)/3000); ?>" readonly="readonly" /></td>
  </tr>
</table>

<table width="624" height="42" border="0" align="center">
  <tr>
    <td width="167" class="Style1"><div align="center" class="Style5">Signature deposant</div></td>
    <td width="166" class="Style5">&nbsp;Signature caissier</td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="680" height="42" border="0" align="center">
  <tr>
    <td width="167" class="Style3"><div align="center" class="Style4"><?php  echo $z[0]; ?></div></td>
    <td width="166" align="center" valign="middle" class="Style4"><?php  echo $nom[0]; ?></td>
  </tr>
</table>

</body>
</html>
