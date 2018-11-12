<?
include ("../inc/conf.php");
include ("../inc/fonctions.php");
verif_session();
connexion();

if(isset($_GET['n']))
{
	$query = "DELETE FROM fiche_junior_date WHERE id = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error()); 
}

if(isset($_GET['url_retour']) && $_GET['url_retour']!=""){	
	echo "<script>document.location.href='".$_GET['url_retour']."';</script>";
}else{
	echo "<script>document.location.href='admin.php?action=junior_date';</script>";
}
?>