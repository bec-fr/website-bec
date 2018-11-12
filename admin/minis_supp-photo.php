<?
	include ("../inc/conf.php");
	include ("../inc/fonctions.php");
	verif_session();
	
	if(isset($_GET['f']))
	{
		 if(file_exists("../imagesUp/fiche_minis/".$_GET['f'].".jpg"))
		 {
			unlink("../imagesUp/fiche_minis/".$_GET['f'].'.jpg');
			unlink("../imagesUp/fiche_minis/".$_GET['f'].'_m.jpg');
		 }
?>
		<script>
			document.location.href='admin.php?action=image_minisModif&id=<?=$_GET['id']?><?=((isset($_GET["url_retour"]) && $_GET["url_retour"] != "") ? "&url_retour=".urlencode($_GET["url_retour"]) : "")?>';
		</script>
<?		 
	}else{
?>	
		<script>
			document.location.href='admin.php?action=fiche_minis';
		</script>
<?		
	}
	
?>	
