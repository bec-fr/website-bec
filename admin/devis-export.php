<?
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=devis.csv");

include ("../inc/conf.php");
include ("../inc/fonctions.php");
connexion();


$query = "SELECT d.*, fea.nom as destination, feat.nom as formule FROM devis d LEFT OUTER JOIN fiche_etudiant_adulte fea ON d.destination = fea.id LEFT OUTER JOIN fiche_etudiant_adulte_tarif feat ON d.formule = feat.id ORDER BY id DESC";

$exec = mysql_query($query) or die(mysql_error());

//Premiere ligne = nom des champs (si on en a besoin)
$csv_output = "Nom;Prénom;Adresse;CP;Ville;Tél;Mail;Destination;Formule;Date demande\n";

while($row = mysql_fetch_array($exec))
{
	$csv_output .= stripslashes($row["nom"]).";".stripslashes($row["prenom"]).";".stripslashes($row["adresse"]).";".stripslashes($row["cp"]).";".stripslashes($row["ville"]).";".stripslashes($row["tel"]).";".stripslashes($row["mail"]).";".stripslashes($row["destination"]).";".stripslashes($row["formule"]).";".parseDate($row["datetime"])."\n";
}

print $csv_output;
exit;

?>