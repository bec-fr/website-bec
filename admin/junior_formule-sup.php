<?
include ("../inc/conf.php");
include ("../inc/fonctions.php");
verif_session();
connexion();

if(isset($_GET['n']))
{
	$query = "DELETE FROM formule_junior WHERE id = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error()); 
}

echo "<script>document.location.href='admin.php?action=junior_formule';</script>";
?>