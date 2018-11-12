<?
include ("../inc/conf.php");
include ("../inc/fonctions.php");
verif_session();

if (isset($_GET['n'])) {
	connexion();
	
	$query = "DELETE FROM fiche_minis WHERE id = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error());
	
	for($i=1 ; $i<=10 ; $i++){
		if (file_exists('../imagesUp/fiche_minis/'.$_GET['n'].'_'.$i.'.jpg')){
			unlink('../imagesUp/fiche_minis/'.$_GET['n'].'_'.$i.'.jpg');
			unlink('../imagesUp/fiche_minis/'.$_GET['n'].'_'.$i.'_m.jpg');
		}
	}
}

echo "<script>document.location.href='admin.php?action=fiche_minis';</script>";
?>