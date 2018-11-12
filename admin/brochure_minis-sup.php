<?
include("../inc/conf.php");
include("../inc/fonctions.php");
verif_session();

if(isset($_GET['n']))
{
	connexion();
	
	$query = "DELETE FROM brochure_minis WHERE id = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error()); 
}

if(isset($_GET['url_retour']) && $_GET['url_retour']!=""){	
	echo "<script>document.location.href='".$_GET['url_retour']."';</script>";
}else{
	echo "<script>document.location.href='admin.php?action=brochure_minis';</script>";
}
?>