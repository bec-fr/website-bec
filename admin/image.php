<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Images fiches</td><td align="right"><a href="<?=((isset($_GET["url_retour"]) && $_GET["url_retour"] != "") ? $_GET["url_retour"] : "admin.php?action=fiche_etudiant_adulte")?>" style="color:#FFFFFF">Listing fiches</a></td></tr>
	<tr>
		<td colspan="2">
<br />


<?
if(isset($_POST["id"]) && $_POST["id"] != "")
{
	$id = $_POST["id"];
	
	include("../inc/upload.php");
	
	// Transfert des images
	for($i=1; $i<=10; $i++){
		$query = "UPDATE fiche_etudiant_adulte SET img_leg".$i." = '".addslashes($_POST["leg".$i])."' WHERE id = '".addslashes($id)."'";
		mysql_query($query) or die(mysql_error());
		if ($_FILES["img".$i]['error'] == 0) {
		 if($_FILES["img".$i]['type']=="image/gif" || $_FILES["img".$i]['type']=="image/jpeg" || $_FILES["img".$i]['type']=="image/pjpeg"){   		
			$size = getimagesize($_FILES["img".$i]['tmp_name']);  
			$src_w = $size[0]; 
			$src_h = $size[1];        
			$image = new image();
			if($src_w>=$src_h){
				if ($src_w>150){
					$image->upload("img".$i,"../imagesUp/fiche_etudiant/".$id."-".$i."_m.jpg",150,"","ffffff");
					$image->upload("img".$i,"../imagesUp/fiche_etudiant/".$id."-".$i."_m2.jpg",250,"","ffffff");
					if ($src_w>750){
						$image->upload("img".$i,"../imagesUp/fiche_etudiant/".$id."-".$i.".jpg",750,"","ffffff");					
					}else{
						$image->upload("img".$i,"../imagesUp/fiche_etudiant/".$id."-".$i.".jpg",$src_w,"","ffffff"); 
					}
				}else{
					$image->upload("img".$i,"../imagesUp/fiche_etudiant/".$id."-".$i."_m.jpg",$src_w,"","ffffff");
					$image->upload("img".$i,"../imagesUp/fiche_etudiant/".$id."-".$i."_m2.jpg",$src_w,"","ffffff");
					$image->upload("img".$i,"../imagesUp/fiche_etudiant/".$id."-".$i.".jpg",$src_w,"","ffffff"); 
				}
			}else{
				if($src_h>150){
					$l=round(($src_w*150)/$src_h);
					$image->upload("img".$i,"../imagesUp/fiche_etudiant/".$id."-".$i."_m.jpg",$l,"","ffffff");
					$l=round(($src_w*250)/$src_h);
					$image->upload("img".$i,"../imagesUp/fiche_etudiant/".$id."-".$i."_m2.jpg",$l,"","ffffff");
					if($src_h>750){
						$l=round(($src_w*750)/$src_h);
						$image->upload("img".$i,"../imagesUp/fiche_etudiant/".$id."-".$i.".jpg",$l,"","ffffff"); 		
					}else{
						$image->upload("img".$i,"../imagesUp/fiche_etudiant/".$id."-".$i.".jpg",$src_w,"","ffffff"); 
					}
				}else{
					$image->upload("img".$i,"../imagesUp/fiche_etudiant/".$id."-".$i."_m.jpg",$src_w,"","ffffff");
					$image->upload("img".$i,"../imagesUp/fiche_etudiant/".$id."-".$i."_m2.jpg",$src_w,"","ffffff");
					$image->upload("img".$i,"../imagesUp/fiche_etudiant/".$id."-".$i.".jpg",$src_w,"","ffffff"); 
				}
			}
		 }else{		
			echo '<script>alert("L\'upload de l\'image n°'.$i.' a échoué : L\'image n\'est peut être pas au format gif ou jpg.");</script>';		
		 }
		}
	}
	
	/*echo "<script>document.location.href='admin.php?action=imageModif&id=".$_GET["id"].((isset($_GET['url_retour']) && $_GET['url_retour'] != "") ? "&url_retour=".urlencode($_GET["url_retour"]) : "")."';</script>";*/
	if(isset($_GET['url_retour']) && $_GET['url_retour']!=""){
		echo "<script>document.location.href='".$_GET['url_retour']."';</script>";
	}else{
		echo "<script>document.location.href='admin.php?action=fiche_etudiant_adulte';</script>";
	}
}
?>


<table border="0" align="center" width="98%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">	
    <th class="cellule_basdroite">Pays</th>
    <th class="cellule_basdroite">Ville</th>
    <th class="cellule_basdroite">Image</th>
    <th colspan="2"class="cellule_basdroite">Actions</th>
</tr>


<?
$query = "SELECT fea.*, p.nom as pays, v.nom as ville FROM fiche_etudiant_adulte fea LEFT OUTER JOIN pays p ON fea.pays = p.id LEFT OUTER JOIN ville v ON fea.ville = v.id WHERE fea.id = '".addslashes($_GET["id"])."'";
$exec = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($exec))
{
  ?>
  <form ENCTYPE="multipart/form-data" name="form_<?=$row['id']?>" method="post" action="">
  <input type="hidden" name="plus_link" value="<?=((isset($_GET["plus_link"]) && $_GET["plus_link"] != "") ? stripslashes($_GET["plus_link"]) : "")?>" />
  <input type="hidden" name="id" value="<?=$row['id']?>" />
  <tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
  <td class="cellule_basdroite"><?=stripslashes($row['pays'])?>&nbsp;</td>
  <td class="cellule_basdroite"><?=stripslashes($row['ville'])?>&nbsp;</td>
  <td class="cellule_basdroite">
  <?
  for($i=1 ; $i<=10 ; $i++){
  	if(file_exists("../imagesUp/fiche_etudiant/".$row['id']."-".$i.".jpg")){
		$size = getimagesize("../imagesUp/fiche_etudiant/".$row["id"]."-".$i.".jpg");
		$src_w = $size[0]+18;
		$src_h = $size[1]+25;
		
		echo "<a href='#' onclick='window.open(\"../imagesUp/fiche_etudiant/".$row["id"]."-".$i.".jpg\",\"\",\"resizable=no,top=200,left=200,height=".$src_h.",width=".$src_w."\"); return false;' title='Cliquez pour agrandir'><img src='../imagesUp/fiche_etudiant/".$row['id']."-".$i."_m.jpg' width='100' border='0' /></a><br /><a href='supp-photo.php?f=".$row["id"]."-".$i."&id=".$_GET["id"].((isset($_GET["url_retour"]) && $_GET["url_retour"] != "") ? "&url_retour=".urlencode($_GET["url_retour"]) : "")."'>supprimer ?</a>";
		if($i!=10){
			echo "<br /><br />";
		}
	}else{
		echo "&nbsp;";
	}
  }
  ?>
  </td>
  <td class="cellule_basdroite" valign="top">
  <?
  for($i=1 ; $i<=10 ; $i++){
	  ?>
      <input type="file" name="img<?=$i?>" /><br />
      légende : <input type="text" name="leg<?=$i?>" value="<?=$row["img_leg".$i]?>" /><br /><br />
      <?
  }
  ?>
  </td>
  <td class="cellule_basdroite"><input type="submit" value="envoyer" class="bouton" /></td>
  </tr>
  </form>
  <?
}
?>

</table><br />


		</td>
	</tr>
</table><br>