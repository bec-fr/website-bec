<?
include("../inc/conf.php");
include("../inc/fonctions.php");
verif_session();

if(isset($_GET['n']))
{
	connexion();
	
	$query = "DELETE FROM bandeau WHERE id_bandeau = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error()); 
	
	if(file_exists('../imagesUp/bandeaux/'.$_GET['n'].'.jpg')){
		unlink('../imagesUp/bandeaux/'.$_GET['n'].'.jpg');
		unlink('../imagesUp/bandeaux/'.$_GET['n'].'_c.jpg');
	}
}

echo "<script>document.location.href='admin.php?action=bandeau_acc';</script>";
?>