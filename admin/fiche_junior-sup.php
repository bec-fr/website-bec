<?
include ("../inc/conf.php");
include ("../inc/fonctions.php");
verif_session();

if (isset($_GET['n'])) {
	connexion();
	
	for($i=1 ; $i<=10 ; $i++){
		if (file_exists('../imagesUp/fiche_junior/'.$_GET['n'].'_'.$i.'.jpg')){
			unlink('../imagesUp/fiche_junior/'.$_GET['n'].'_'.$i.'.jpg');
			unlink('../imagesUp/fiche_junior/'.$_GET['n'].'_'.$i.'_m.jpg');
		}
	}
	
	$query = "DELETE FROM fiche_junior WHERE id = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error());
	
	$query = "DELETE FROM fiche_junior_date WHERE rid_fiche = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error());
	
	$query = "DELETE FROM fiche_junior_classe WHERE fiche_junior = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error());
	
	$query = "DELETE FROM fiche_junior_formule WHERE fiche_junior = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error());
	
	$query = "DELETE FROM fiche_junior_hebergement WHERE fiche_junior = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error());
	
	$query = "DELETE FROM junior_programme WHERE fiche_junior = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error());
}

echo "<script>document.location.href='admin.php?action=fiche_junior';</script>";
?>