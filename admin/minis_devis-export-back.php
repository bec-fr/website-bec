<?
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=minis_devis.csv");

include ("../inc/conf.php");
include ("../inc/fonctions.php");
connexion();

function replace($texte){
	$texte = str_replace(array("\n", "\r", ";"), "", $texte);
	
	return $texte;
}


$query = "SELECT d.*, fm.nom as destination, mp.nom as pays FROM devis_minis d LEFT OUTER JOIN fiche_minis fm ON d.destination = fm.id LEFT OUTER JOIN minis_pays mp ON fm.pays = mp.id WHERE 1";
if(isset($_GET['num_dem']) && $_GET['num_dem'] != ""){
	$query .= " AND d.id >= '".addslashes($_GET['num_dem'])."'";
}
if(isset($_GET['date_dem']) && $_GET['date_dem'] != ""){
	$date_dem = explode("/", $_GET['date_dem']);
	$date_dem = $date_dem[2]."-".$date_dem[1]."-".$date_dem[0];
	
	$query .= " AND DATE(d.datetime) >= '".addslashes($date_dem)."'";
}
$query .= " ORDER BY d.id DESC";
$exec = mysql_query($query) or die(mysql_error());

//Premiere ligne = nom des champs (si on en a besoin)
$csv_output = "Num devis;Nom du professeur;Pr�nom;Nom �tablissement;Adresse;CP;Ville;T�l �tablissement;T�l personnel;Mail;Date demande;Connu BEC;Message;Destination pays;Destination ville;Classe concern�e;Nb �l�ves;Nb encadrants;Nb PC;Age;Date d�part;Date retour;Mode de voyage;Travers�e maritime;Date CA vote voyage;Programme\n";

while($row = mysql_fetch_array($exec)){
	
	
	$csv_output .= stripslashes($row["id"]).";".stripslashes($row["nom"]).";".stripslashes($row["prenom"]).";".stripslashes($row["nom_etab"]).";".stripslashes($row["adresse"]).";".stripslashes($row["cp"]).";".stripslashes($row["ville"]).";".stripslashes($row["tel_etab"]).";".stripslashes($row["tel"]).";".stripslashes($row["mail"]).";".parseDate($row["datetime"]).";".replace(stripslashes($row['connu'])).";".replace(stripslashes($row['message'])).";".stripslashes($row["pays"]).";".stripslashes($row["destination"]).";".stripslashes($row["classe_etab"]).";".stripslashes($row["nb_eleve"]).";".stripslashes($row["nb_adulte"]).";".stripslashes($row["nb_pc"]).";".stripslashes($row["age"]).";".parseDate($row["date_debut"]).";".parseDate($row["date_fin"]).";".stripslashes($row["mode_voyage"])." ".stripslashes($row["mode_voyage2"]).";".stripslashes($row["trav"]).";".stripslashes($row["date_ca"]).";".((file_exists("../imagesUp/devis_minis/".$row["id"].".pdf") || file_exists("../imagesUp/devis_minis/".$row["id"].".doc")) ? "oui" : "non")."\n";
}

print $csv_output;
exit;

?>