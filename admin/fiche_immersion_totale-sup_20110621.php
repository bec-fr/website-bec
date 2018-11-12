<?
include ("../inc/conf.php");
include ("../inc/fonctions.php");
verif_session();

if (isset($_GET['n'])) {
	connexion();
	
	for($i=1 ; $i<=10 ; $i++){
		if (file_exists('../imagesUp/fiche_immersion_totale/'.$_GET['n'].'_'.$i.'.jpg')){
			unlink('../imagesUp/fiche_immersion_totale/'.$_GET['n'].'_'.$i.'.jpg');
			unlink('../imagesUp/fiche_immersion_totale/'.$_GET['n'].'_'.$i.'_m.jpg');
		}
	}
	
	$query = "DELETE FROM fiche_immersion_totale WHERE id = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error());
	/*$query = "DELETE FROM fiche_etudiant_adulte_accreditation WHERE fiche_immersion_totale = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error());*/
	/*ery = "DELETE FROM fiche_etudiant_adulte_examen WHERE fiche_immersion_totale = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error());*/
	$query = "DELETE FROM fiche_etudiant_adulte_formule WHERE fiche_immersion_totale = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error());
	$query = "DELETE FROM fiche_immersion_totale_tarif WHERE fiche_immersion_totale = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error());
}

echo "<script>document.location.href='admin.php?action=fiche_immersion_totale';</script>";
?>