<?
include("../inc/conf.php");
include("../inc/fonctions.php");
verif_session();

if(isset($_GET['n']))
{
	connexion();
	
	$query = "DELETE FROM devis WHERE id = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error());
}

echo "<script>document.location.href='admin.php?action=devis';</script>";
?>