<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Facture Remboursement</title>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
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
	font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std";
	font-weight: bold;
	font-style: italic;
}
.Style4 {font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std"; font-style: italic; font-weight: bold; color: #333333; }
.Style5 {color: #FFFFFF; font-family: "Futura Bk", "Futura Hv", "Euro Sign", "Franklin Gothic Medium", "Garamond Premr Pro Smbd", "Futura Md", "Giddyup Std"; font-weight: bold; font-style: italic; }
-->
</style>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
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
      <li><a href="etat revenu global.html" class="Style3">Etat revenu global</a></li>
    </ul>
  </li>
</ul>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="239" height="35" border="1" align="center" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
  <tr>
    <td class="CollapsiblePanelFocused"><div align="center" class="Style5">Facture remboursement</div></td>
  </tr>
</table>
<p>&nbsp;</p>
<form name="login" method="post" action="remboursement.php">
<table width="952" height="47" border="0" align="center">
  <tr>
    <td width="129" height="43" class="Style1"><div align="center" class="Style5">Matricule</div></td>
    <td width="185"><INPUT type=text name="matricule">&nbsp;</td>
    <td width="127" class="Style1"><div align="center" class="Style5">Date</div></td>
    <td width="186"><INPUT name="date" type="text" value="<?php
echo date("d-m-Y");

?>" readonly="readonly">&nbsp;</td>
    <td width="129" class="Style1"><div align="center" class="Style5">Numero</div></td>
    <td width="170"><INPUT name="numero" type=text readonly="readonly"></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="360" height="49" border="0" align="center">
  <tr>
    <td width="157" class="Style1"><div align="center" class="Style5">Montant</div></td>
    <td width="193"><INPUT type=text name="montant">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="235" height="45" border="0" align="center">
  <tr>
    <td width="113"><INPUT name="valider" type="submit" class="Style3" id="valider" value="valider">
    &nbsp;</td>
    <td width="112"><INPUT name="annuler" type="reset" class="Style3" id="annuler" value="annuler">
    &nbsp;</td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center"><span class="Style4">Bertin Mounok Copyright &copy; 2011</span></p>
<p align="center" class="Style4">Tél: (+237) 694.048.925 / 678.157.705</p>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>
