<?
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=mail_".date("Ymd").".csv");

include ("../inc/conf.php");
include ("../inc/fonctions.php");
connexion();


$query = "SELECT m.*, mg.nom as groupe FROM mailing m LEFT OUTER JOIN mailing_groupe mg ON m.groupe = mg.id WHERE 1";
if(isset($_GET["groupe"]) && $_GET["groupe"] != ""){
	$query .= " AND m.groupe = '".addslashes($_GET["groupe"])."'";
}

$exec = mysql_query($query) or die(mysql_error());

//Premiere ligne = nom des champs (si on en a besoin)
$csv_output = "Mail;Groupe";

while($row = mysql_fetch_array($exec)){
	
	$csv_output .= "\n".stripslashes($row["mail"]).";".stripslashes($row["groupe"]);
}

print $csv_output;
exit;

?>