<?php 

$nom= $_POST['nom'];
$pwd= $_POST['pwd'];
$t=0;

$con= mysql_connect("localhost", "root", "") or die ("ERREUR DE CONNEXION AU SERVEUR DE BASE DE DONNEES");
$sel= mysql_select_db("afdc1", $con) or die ("ERREUR DE SELECXION DE LA BASE DE DONNEES");

if (empty($nom) or empty($pwd)) {
	$mes="VEUILLEZ INSERER UN NOM ET UN MOT DE PASSE";
	include("index.html");
	echo "<p align=center><b><font face=Arial size=5 color=red>".$mes."</font></b></p>";}
	
	else {
		
		$request="SELECT * FROM admin WHERE nom like '%$nom%' AND pwd like '%pwd%'";
		$req= mysql_query($request, $con);
		$num_lign=mysql_num_rows($req);
		for ($i=0; $i<$num_lign; $i++){
			$r= mysql_fetch_row($req);
			for ($j=0; $j<count($r); $j++) {
				if ($nom==$r[$j] and $pwd==$r[$j]){
				$t=1;
				return $t;
			}
			
			else {
				$t=0;
				return $t;
			}
		}
	}
	
	if ($t==0) {
		include("acceuil.html");
		echo"<p align=center><b><font face=Arial size=4 color=#568975>SALUT $nom<br> BIENVENU SUR AFDC</br></font></b></p>";
	}
	else {
		include("index.html");
		echo "<p align=center><b><font face=Arial size=4 color=RED>NOM ET OU MOT DE PASSE INCORRECT(S)</br></font></b></p>";
	}
	}

?>