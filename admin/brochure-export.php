<?
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=brochure.csv");

include ("../inc/conf.php");
include ("../inc/fonctions.php");
connexion();


$query = "SELECT * FROM brochure WHERE 1";
if(isset($_GET["site"]) && $_GET["site"] != ""){
	$query .= " AND site = '".addslashes($_GET["site"])."'";
}
$query .= " ORDER BY id DESC";

$exec = mysql_query($query) or die(mysql_error());

//Premiere ligne = nom des champs (si on en a besoin)
$csv_output = "Nom;Prénom;Adresse;CP;Ville;Tél;Mail;Connu BEC;Message\n";

while($row = mysql_fetch_array($exec))
{
	$csv_output .= stripslashes($row["nom"]).";".stripslashes($row["prenom"]).";".stripslashes($row["adresse"]).";".stripslashes($row["cp"]).";".stripslashes($row["ville"]).";".stripslashes($row["tel"]).";".stripslashes($row["mail"]).";".str_replace(array("\n", "\r"), "", stripslashes($row['connu'])).";".str_replace(array("\n", "\r"), "", stripslashes($row['message']))."\n";
}

print $csv_output;
exit;

?>