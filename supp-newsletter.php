<?
include("inc/conf.php");
include("inc/fonctions.php");
connexion();

if(!empty($_GET['to']) && !empty($_GET['n'])){
	$query = "SELECT * FROM mailing WHERE id='".addslashes($_GET['n'])."' AND mail='".addslashes($_GET['to'])."'";
	$exec = mysql_query($query);
	
	if($exec && mysql_num_rows($exec) == 1){
		$query = "DELETE FROM mailing WHERE id='".addslashes($_GET['n'])."'";
		mysql_query($query) or die(mysql_error());
		
		echo "<script>alert('Votre adresse email a été supprimée de la liste de diffusion.');</script>";
	}else{
		echo "<script>alert('Vous ne faites pas partie de la liste de diffusion de ".$url_site2.".');</script>";
	}
}
?>

<script>
  document.location.href="index.php";
</script>