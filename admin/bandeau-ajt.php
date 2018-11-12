

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
	$texte = $_POST['texte'];
	$prix= $_POST['prix'];
	$url = $_POST['url'];
	$afficher = $_POST['afficher'];
	$site = $_POST['site'];
	$home = $_POST['home'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE bandeau SET nom='".addslashes($nom)."', texte='".addslashes($texte)."',prix='".addslashes($prix)."', url='".addslashes($url)."', afficher='".addslashes($afficher)."', site='".addslashes($site)."',home='".addslashes($home)."' WHERE id_bandeau = '".addslashes($_GET['id'])."'";
		$exec = mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$query = "SELECT MAX(ordre) FROM bandeau WHERE site='".addslashes($site)."'";
		$exec = mysql_query($query) or die(mysqli_error());
		$data = mysql_fetch_row($exec);
						
		$requete = "INSERT INTO bandeau (nom, texte,prix, url, ordre, afficher, site,home) VALUES ('".addslashes($nom)."','".addslashes($texte)."','".addslashes($prix)."', '".addslashes($url)."', '".($data[0]+1)."', '".addslashes($afficher)."', '".addslashes($site)."', '".addslashes($home)."')";
		$exec = mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	include("../inc/upload.php");
					
	// Transfert des images
	if($_FILES['img']['error'] == 0){
		$tab_extension = array("jpg");
		$extension = mb_strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], ".")+1));
		if(in_array($extension, $tab_extension)){
			list($width, $height) = getimagesize($_FILES["img"]['tmp_name']); 	
			//if($width==550 && $height==230){
				move_uploaded_file($_FILES["img"]['tmp_name'],"../imagesUp/bandeaux/".$id."_c.jpg");
		//	}else{
		//		upload_decoupe($_FILES["img"]['tmp_name'],"../imagesUp/bandeaux/".$id."_c.jpg",550,230);
		//	}
			
		}else{
			echo "<script>alert('Le fichier envoyé n\'est pas un fichier valide.')</script>";
		}
	}
	
	echo "<script>document.location.href='admin.php?action=bandeau';</script>";
}else{ 
	$id = "";
	$nom = "";
	$texte = "";
	$prix= "";
	$url = "";
	$afficher = 0;
	$site ="";
	$home = 0;
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM bandeau WHERE id_bandeau = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
                        
		$id = $_GET['id'];
		$nom = stripslashes($row['nom']);
		$texte = stripslashes($row['texte']);
		$prix = stripslashes($row['prix']);
		$url = stripslashes($row['url']);
		$afficher = stripslashes($row['afficher']);
		$site = stripslashes($row['site']);
		$home = stripslashes($row['home']);
	}
}
?>

<? if(file_exists("../imagesUp/bandeaux/".$id."_c.jpg")){?>
<table width="100%" border="0">
  <tr>
    <td align="center"><img src="../imagesUp/bandeaux/<?=$id?>_c.jpg" width="300" alt="<?=stripslashes($row['nom'])?>" /></td>
  </tr>
</table>
<br />
<? } ?>

<form name="form" enctype="multipart/form-data" action="" method="POST">
<table border="0" class=contenu> 
<tr>
	<td align="right">Site :</td>
    <td><select name="site">
    <option value="1" <?=($site=='1' ? 'selected="selected"' : '')?>>Etudiants/adultes</option>
    <option value="2" <?=($site=='2' ? 'selected="selected"' : '')?>>Juniors</option>
    <option value="3" <?=($site=='3' ? 'selected="selected"' : '')?>>Voyages scolaires</option>
    </select></td>
</tr> 
<tr>
	<td align="right">surtire (pays...) :</td>
    <td><input type="text" size="50" name="nom" value="<?=$nom?>"></td>
</tr>
<tr>
	<td align="right">Texte :</td>
    <td><input type="text" size="50" name="texte" value="<?=$texte?>"></td>
</tr>
<tr>
	<td align="right">prix :</td>
    <td><input type="text" size="30" name="prix" value="<?=$prix?>"></td>
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
	<td align="right">Visible sur home :</td>
    <td><input type="radio" name="home" value="1" <?=(($home=="1") ? " checked" : "")?> /> oui <input type="radio" name="home" value="0" <?=(($home=="0") ? " checked" : "")?> /> non</td>
</tr>
<tr>
	<td height="5"></td>
</tr>
<tr>
	<td align="right">Image : </td>
    <td><input type="file" name="img" /> (Taille conseillée : 550 x 230px ) </td>
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