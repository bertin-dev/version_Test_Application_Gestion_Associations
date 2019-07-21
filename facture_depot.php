<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Facture Depot</title>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Style1 {
	font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std";
	font-style: italic;
	font-weight: bold;
}
.Style2 {color: #FFFFFF}
.Style4 {
	font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std";
	font-style: italic;
	font-weight: bold;
	color: #568975;
}
.Style3 {font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std"; font-style: italic; font-weight: bold; color: #333333; }
.Style6 {
	color: #FFFFFF;
	font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std";
	font-style: italic;
	font-weight: bold;
}
-->
</style>
<link rel="stylesheet" type="text/css" />
</head>

<body background="fond.jpg">
<p align="center">&nbsp;</p>
<p>&nbsp;</p>

<table width="239" height="35" border="1" align="center" bordercolor="#CCCCCC" bgcolor="#CCCCCC">
  <tr>
    <td class="CollapsiblePanelFocused"><div align="center"><span class="Style6"><a href="Facture Depot.php" class="Style6"  >Facture Depot</a></span></div></td>
  </tr>
</table>
<p>&nbsp;</p>

<?php
$mat=$_POST['mat'];
$date=$_POST['date'];
$mont=$_POST['montant'];


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

<form name="login" method="post" action="depot.php">

<table width="952" height="47" border="0" align="center">
  <tr>
    <td width="121" height="43" class="Style1"><div align="center" class="Style6">Matricule</div></td>
    <td width="200"><input name="mat" class="Style3" type="text" value="<?php  echo $mat; ?>" readonly="readonly" />&nbsp;</td>
    <td width="100" class="Style1"><div align="center" class="Style6">Date</div></td>
    <td width="213"><INPUT name="date" type="text" class="Style3" value="<?php  echo $date; ?>" readonly="readonly">&nbsp; </td>
    <td width="98" class="Style1"><div align="center" class="Style6">Numero</div></td>
    <td width="194"><INPUT name="numero" type="text" class="Style3" value="<?php  echo $num[0]; ?>" readonly="readonly"></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="390" height="49" border="0" align="center">
  <tr>
    <td width="168" class="Style1"><div align="center" class="Style6">Montant</div></td>
    <td width="182"><INPUT name="montant" type="text " class="Style3" value="<?php  echo $mont; ?>" readonly="readonly">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>

<table width="680" height="42" border="0" align="center">
  <tr>
    <td width="167" class="Style6"><div align="center" class="Style5">Signature deposant</div></td>
    <td width="166" align="center" valign="middle" class="Style6">&nbsp;Signature caissier</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="680" height="42" border="0" align="center">
  <tr>
    <td width="167" class="Style3"><div align="center" class="Style3"><?php  echo $z[0]; ?></div></td>
    <td width="166" align="center" valign="middle" class="Style3"><?php  echo $nom[0]; ?></td>
  </tr>
</table>
</form>

</body>
</html>
