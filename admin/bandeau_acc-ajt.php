

<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Bandeau - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
//Si le formulaire a été envoyé
if(isset($_POST['nom']) && $_POST['nom'] != ""){
	$nom = $_POST['nom'];
	$url = $_POST['url'];
	$afficher = $_POST['afficher'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE bandeau SET nom='".addslashes($nom)."', url='".addslashes($url)."', afficher='".addslashes($afficher)."' WHERE id_bandeau = '".addslashes($_GET['id'])."'";
		$exec = mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$query = "SELECT MAX(ordre) FROM bandeau WHERE site='4'";
		$exec = mysql_query($query) or die(mysqli_error());
		$data = mysql_fetch_row($exec);
						
		$requete = "INSERT INTO bandeau (nom, url, ordre, afficher, site) VALUES ('".addslashes($nom)."', '".addslashes($url)."', '".($data[0]+1)."', '".addslashes($afficher)."', '4')";
		$exec = mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	include("../inc/upload.php");
					
	// Transfert des images
	if($_FILES['img']['error'] == 0){
		$tab_extension = array("jpg");
		$extension = mb_strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], ".")+1));
		if(in_array($extension, $tab_extension)){
			upload2($_FILES["img"]['tmp_name'],"../imagesUp/bandeaux/".$id.".jpg",1024,"");
			upload_decoupe($_FILES["img"]['tmp_name'],"../imagesUp/bandeaux/".$id."_c.jpg",700,400);
		}else{
			echo "<script>alert('Le fichier envoyé n\'est pas un fichier valide.')</script>";
		}
	}
	
	echo "<script>document.location.href='admin.php?action=bandeau_acc';</script>";
}else{ 
	$id = "";
	$nom = "";
	$url = "";
	$afficher = 0;
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM bandeau WHERE id_bandeau = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
                        
		$id = $_GET['id'];
		$nom = stripslashes($row['nom']);
		$url = stripslashes($row['url']);
		$afficher = stripslashes($row['afficher']);
	}
}
?>

<? if(file_exists("../imagesUp/bandeaux/".$id."_c.jpg")){?>
<table width="100%" border="0">
  <tr>
    <td align="center"><img src="../imagesUp/bandeaux/<?=$id?>.jpg" width="300" alt="<?=stripslashes($row['nom'])?>" /></td>
  </tr>
</table>
<br />
<? } ?>

<form name="form" enctype="multipart/form-data" action="" method="POST">
<table border="0" class=contenu> 
<tr>
	<td align="right">Nom :</td>
    <td><input type="text" size="50" name="nom" value="<?=$nom?>"></td>
</tr>
<tr>
	<td align="right">Lien :</td>
    <td><input type="text" size="50" name="url" value="<?=$url?>"></td>
</tr>
<tr>
	<td align="right">Afficher :</td>
    <td><input type="radio" name="afficher" value="1" <?=(($afficher=="1") ? " checked" : "")?> /> oui <input type="radio" name="afficher" value="0" <?=(($afficher=="0") ? " checked" : "")?> /> non</td>
</tr>
<tr>
	<td height="5"></td>
</tr>
<tr>
	<td align="right">Image : </td>
    <td><input type="file" name="img" /> </td>
</tr>
<tr>
	<td height="5"></td>
</tr>
<tr>
	<td></td>
    <td><input type="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></td>
</tr>
</table>
</form>
  		</td>
	</tr>
</table><br>