<?
include ("../inc/conf.php");
include ("../inc/fonctions.php");
verif_session();
connexion();

if(isset($_GET['n']))
{
	$query = "DELETE FROM accreditation WHERE id = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error());
	
	if (file_exists('../imagesUp/accreditations/'.$_GET['n'].'.jpg')){
		unlink('../imagesUp/accreditations/'.$_GET['n'].'.jpg');
		unlink('../imagesUp/accreditations/'.$_GET['n'].'_m.jpg');
	}
}

echo "<script>document.location.href='admin.php?action=accreditation';</script>";
?>