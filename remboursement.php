<?php
$mat= $_POST['matricule'];
$date= $_POST['date'];
$mont= $_POST['montant'];
$num= $_POST['numero'];
$mois= mois();


//connexion
$connect= mysql_connect("localhost", "root", "")or die ("Une erreur est apparue lors de la connexion à la base de données");

$select= mysql_select_db("afdc1", $connect) or die("Une erreur est survenue lors de la sélection de la base de données");



function mois(){
	$d= date("n");

$tab_m[1]="janvier";
$tab_m[2]="fevreir";
$tab_m[3]="mars";
$tab_m[4]="avril";
$tab_m[5]="mai";
$tab_m[6]="juin";
$tab_m[7]="juillet";
$tab_m[8]="aout";
$tab_m[9]="septembre";
$tab_m[10]="octobre";
$tab_m[11]="novembre";
$tab_m[12]="decembre";

for ($x =1; $x <13; $x++) {
	if($x== $d)
return $tab_m["$x"];
}
	
	}
	


if (empty ($mat) or empty($mont)) {
	
 include("facture remboursement.php");

 
 ?>
 <script language="javascript">
		 alert("VEUILLEZ INSERER UN MATRICULE VALIDE ET LE MONTANT DEPOSE");
		</script>
        <?php
 
 }
 
 else {	
	
	$select= "SELECT MAX(`int_total`) FROM compte WHERE mois='$mois' AND matricule='$mat'";
	$req= mysql_query($select);
	
	$r=mysql_fetch_row($req);
        $a=(float)$r[0];
	
	if ($mont>=$a){
		$amort=($mont-$a);
		
		
		$select="SELECT SUM(emprunt_dm) + SUM(emprunt_m) FROM compte WHERE mois='$mois' AND matricule='$mat'";
		$req=mysql_query($select);
		$r=mysql_fetch_row($req);
        $a=(float)$r[0];
		$efm=($a-$amort);
		
		$in="INSERT INTO `afdc1`.`compte` (`amort`, `emprunt_fm`, `type`, `matricule`, `mois`, `date`) VALUES ('$amort', '$efm', 'remboursement', '$mat', '$mois', '$date')";
		$exe=mysql_query($in);	
		
 include("facture_remboursement.php");
 
 
 ?>
 <script language="javascript">
		 alert("INSERTION REUSSIE");
		</script>
        <?php
		
	}
	else {
		
 include("facture Remboursement.php");

		
		
		?>
 <script language="javascript">
		 alert("ERREUR CE MONTANT DE REMBOURSEMENT EST INFERIEUR A L'INTERET A REMBOUSER!!!!");
		</script>
        <?php
	}
 }
	
?>