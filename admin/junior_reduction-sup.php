<?
include ("../inc/conf.php");
include ("../inc/fonctions.php");
verif_session();
connexion();

if(isset($_GET['n'])){
	$query = "DELETE FROM junior_reduction WHERE id = '".addslashes($_GET['n'])."'";
	mysql_query($query) or die(mysql_error()); 
}

echo "<script>document.location.href='admin.php?action=junior_reduction';</script>";
?>