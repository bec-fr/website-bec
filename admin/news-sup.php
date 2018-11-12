<?
include ("../inc/conf.php");
include ("../inc/fonctions.php");
verif_session();

if (isset($_GET['n'])) {
	connexion();
	
	$query = "DELETE FROM news WHERE id_news = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error());
	
	if (file_exists('../imagesUp/news/'.$_GET['n'].'.jpg')){
		unlink('../imagesUp/news/'.$_GET['n'].'.jpg');
	}
}

echo "<script>document.location.href='admin.php?action=news';</script>";
?>