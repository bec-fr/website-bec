<?
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=junior_devis.csv");

include ("../inc/conf.php");
include ("../inc/fonctions.php");
connexion();


$query = "SELECT d.*, fj.nom as destination FROM devis_junior d LEFT OUTER JOIN fiche_junior fj ON d.destination = fj.id ORDER BY d.id DESC";

$exec = mysql_query($query) or die(mysql_error());

//Premiere ligne = nom des champs (si on en a besoin)
$csv_output = "Nom;Prénom;Adresse;CP;Ville;Tél;Mail;Destination;Date;Date demande\n";

while($row = mysql_fetch_array($exec))
{
	$csv_output .= stripslashes($row["nom"]).";".stripslashes($row["prenom"]).";".stripslashes($row["adresse"]).";".stripslashes($row["cp"]).";".stripslashes($row["ville"]).";".stripslashes($row["tel"]).";".stripslashes($row["mail"]).";".stripslashes($row["destination"]).";".stripslashes($row["date"]).";".parseDate($row["datetime"])."\n";
}

print $csv_output;
exit;

?>