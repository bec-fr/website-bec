<?
include("../inc/conf.php");
include("../inc/fonctions.php");
verif_session();

if(isset($_GET['n']))
{
 connexion();
 
 $query = "DELETE FROM avoir WHERE id_avoir = '".addslashes($_GET['n'])."'";
 mysql_query($query); 
}

echo "<script>document.location.href='admin.php?action=avoir';</script>";
?>