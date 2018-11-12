<?
include ("../inc/conf.php");
include ("../inc/fonctions.php");
verif_session();
connexion();

if(isset($_GET['n']))
{
	$query = "DELETE FROM immersion_totale_pays WHERE id = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error()); 
}

echo "<script>document.location.href='admin.php?action=immersion_totale_pays';</script>";
?>