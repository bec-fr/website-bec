<?
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=brochure.csv");

include ("../inc/conf.php");
include ("../inc/fonctions.php");
connexion();

function replace($texte){
	$texte = str_replace(array("\n", "\r", ";"), "", $texte);
	
	return $texte;
}


$query = "SELECT * FROM brochure_minis WHERE 1";
if(isset($_GET["site"]) && $_GET["site"] != ""){
	$query .= " AND site = '".addslashes($_GET["site"])."'";
}
$query .= " ORDER BY id DESC";
$exec = mysql_query($query) or die(mysql_error());

//Premiere ligne = nom des champs (si on en a besoin)
$csv_output = "Num demande;Nom du professeur;Prénom;Nom établissement;Adresse;CP;Ville;Tél établissement;Tél personnel;Mail;Date demande;Connu BEC;Message\n";
while($row = mysql_fetch_array($exec)){
	
	
	$csv_output .= stripslashes($row["id"]).";".stripslashes($row["nom"]).";".stripslashes($row["prenom"]).";".replace(stripslashes($row["nom_etab"])).";".replace(stripslashes($row["adresse"])).";".stripslashes($row["cp"]).";".stripslashes($row["ville"]).";".stripslashes($row["tel_etab"]).";".stripslashes($row["tel"]).";".stripslashes($row["mail"]).";".parseDate($row["datetime"]).";".replace(stripslashes($row['connu'])).";".str_replace(array("\n", "\r"), "", stripslashes($row['message']))."\n";
}

print $csv_output;
exit;

?>