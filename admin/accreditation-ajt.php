<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Accréditation - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST['nom']) && $_POST['nom'] != ""){
	$nom = $_POST['nom'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE accreditation SET nom='".addslashes($nom)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO accreditation (nom) VALUES ('".addslashes($nom)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	include("../inc/upload.php");
	
	// Transfert des images
	if ($_FILES["img"]['error'] == 0) {
	 if($_FILES["img"]['type']=="image/gif" || $_FILES["img"]['type']=="image/jpeg" || $_FILES["img"]['type']=="image/pjpeg"){   		
		$size = getimagesize($_FILES["img"]['tmp_name']);  
		$src_w = $size[0]; 
		$src_h = $size[1];        
		$image = new image();
		if($src_w>=$src_h){
			if ($src_w>150){
				$image->upload("img","../imagesUp/accreditations/".$id."_m.jpg",150,"","ffffff");					
				if ($src_w>640){
					$image->upload("img","../imagesUp/accreditations/".$id.".jpg",640,"","ffffff");					
				}else{
					$image->upload("img","../imagesUp/accreditations/".$id.".jpg",$src_w,"","ffffff"); 
				}
			}else{
				$image->upload("img","../imagesUp/accreditations/".$id."_m.jpg",$src_w,"","ffffff");
				$image->upload("img","../imagesUp/accreditations/".$id.".jpg",$src_w,"","ffffff"); 
			}
		}else{
			if($src_h>150){
				$l=round(($src_w*150)/$src_h);						
				$image->upload("img","../imagesUp/accreditations/".$id."_m.jpg",$l,"","ffffff");
				if($src_h>640){
					$l=round(($src_w*640)/$src_h);
					$image->upload("img","../imagesUp/accreditations/".$id.".jpg",$l,"","ffffff"); 		
				}else{
					$image->upload("img","../imagesUp/accreditations/".$id.".jpg",$src_w,"","ffffff"); 
				}
			}else{
				$image->upload("img","../imagesUp/accreditations/".$id."_m.jpg",$src_w,"","ffffff");
				$image->upload("img","../imagesUp/accreditations/".$id.".jpg",$src_w,"","ffffff"); 
			}
		}
	 }
	 else{		
		echo '<script>alert("L\'upload de l\'image a échoué : L\'image n\'est peut être pas au format gif ou jpg.");</script>';		
	 }
	}
	
	echo "<script>document.location.href='admin.php?action=accreditation';</script>";
}else{ 
	$id = "";
	$nom = "";
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM accreditation WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$nom = htmlentities(stripslashes($row['nom']));
	}
}
?>

<table width="100%"><tr><td align="center" valign="middle"><?=(file_exists("../imagesUp/accreditations/".$id.".jpg") ? '<img src="../imagesUp/accreditations/'.$id.'.jpg" width="100" />' : '')?></td></tr></table><br />

  <FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE BORDER=0 class=contenu> 
  <TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
  <TR><TD align="right">Image : </TD><TD><input type="file" name="img" /></TD></TR>
  <tr><td>&nbsp;</td></tr>
  <TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  </TABLE>
  </form>


		</td>
	</tr>
</table><br>