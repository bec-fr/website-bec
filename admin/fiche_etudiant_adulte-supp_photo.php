<?
	include ("../inc/conf.php");
	include ("../inc/fonctions.php");
	verif_session();
	
	if(isset($_GET['f'])){
		 if(file_exists("../imagesUp/fiche_etudiant/".$_GET['f'].".jpg")){
			unlink("../imagesUp/fiche_etudiant/".$_GET['f'].'.jpg');
		 }
		 $id=explode("-",$_GET['f']);
?>
		<script>
			document.location.href='admin.php?action=fiche_etudiant_adulteModif&id=<?=$id[0]?>';
		</script>
<?		 
	}else{
?>	
		<script>
			document.location.href='admin.php?action=fiche_etudiant_adulte';
		</script>
<?		
	}
	
?>	
