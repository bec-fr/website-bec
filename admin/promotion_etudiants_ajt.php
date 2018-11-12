<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Promotions etudiants/adultes - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST['titre']) && $_POST['titre'] != ""){
	$afficher = $_POST['afficher'];
	$titre = $_POST['titre'];
	$pays = $_POST['pays'];
	$description = $_POST['description'];
	$sejour = $_POST['sejour'];
	
	
	if(isset($_GET['id'])){
		$requete = "UPDATE promo_adultes SET afficher='".addslashes($afficher)."', titre='".addslashes($titre)."',pays='".addslashes($pays)."', description='".addslashes($description)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO promo_adultes (afficher,titre,pays,description) VALUES ('".addslashes($afficher)."','".addslashes($titre)."', '".addslashes($pays)."','".addslashes($description)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	//on associe aux séjours
	$query = "DELETE FROM reductions_adultes_sejours WHERE reduction_adulte = '".addslashes($_GET['id'])."'";
	mysql_query($query) or die(mysql_error());
	for($i=0 ; $i<count($sejour) ; $i++){
		$query = "INSERT INTO reductions_adultes_sejours VALUES ('".addslashes($_GET['id'])."', '".addslashes($sejour[$i])."')";
		mysql_query($query) or die(mysql_error());
	}
	
	
	
	include("../inc/upload.php");
					
	// Transfert des images
	if($_FILES['img']['error'] == 0){
		$tab_extension = array("jpg");
		$extension = mb_strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], ".")+1));
		if(in_array($extension, $tab_extension)){
			list($width, $height) = getimagesize($_FILES["img"]['tmp_name']); 	
			//if($width==550 && $height==230){
				move_uploaded_file($_FILES["img"]['tmp_name'],"../imagesUp/promos/".$id."_c.jpg");
		//	}else{
		//		upload_decoupe($_FILES["img"]['tmp_name'],"../imagesUp/bandeaux/".$id."_c.jpg",550,230);
		//	}
			
		}else{
			echo "<script>alert('Le fichier envoyé n\'est pas un fichier valide.')</script>";
		}
	}
	
	echo "<script>document.location.href='admin.php?action=reductions_etudiants';</script>";
}else{ 
	$id = "";
	$titre = "";
	$pays = "";
	$description = "";
	$afficher = "1";
	$sejour = array();
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM promo_adultes WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$afficher = stripslashes($row['afficher']);
		$titre = (stripslashes($row['titre']));
		$pays = (stripslashes($row['pays']));
		$description = stripslashes($row['description']);
		
		$query2 = "SELECT * FROM reductions_adultes_sejours WHERE reduction_adulte = '".addslashes($_GET['id'])."'";
		$exec2 = mysql_query($query2) or die(mysql_error());
		$i=0;
		while($data2 = mysql_fetch_array($exec2)){
			$sejour[$i] = $data2['sejour'];
			$i++;
		}
		
		
	}
}
?>

  <FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE BORDER=0 class=contenu> 
  <TR><TD align=right>Titre :</TD><TD><INPUT TYPE="text" size="50" name="titre" maxlength="250" value="<?=$titre?>"></TD></TR>
  <TR><TD align=right>Afficher :</TD>
<td><INPUT TYPE="radio" name="afficher" value="1" <?=(($afficher == "1") ? " checked" : "")?>> oui &nbsp;&nbsp; <INPUT TYPE="radio" name="afficher" value="0" <?=(($afficher == "0") ? " checked" : "")?>> non</td></tr>
  
  <TR><TD align=right>Pays :</TD><TD><select name="pays"><option value="- - -"></option>
<?
$query = "SELECT * FROM pays ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  if($data["id"] == $pays)
    echo " selected";
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select></tr>

  
  <TR><TD align=right valign="top">Description :</TD><TD><textarea name="description" cols="60" rows="15"><?=$description?></textarea></TD></TR>
  <tr><td>&nbsp;</td></tr>
  
  
  
<TR><TD align=right valign="top">Séjours associés&nbsp;:<br /><br />ctrl + clic</TD><TD><select name="sejour[]" size="8" multiple="multiple">
<?
$query = "SELECT * FROM fiche_etudiant_adulte ORDER BY pays";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  for($i=0 ; $i<count($sejour) ; $i++){
      if($data["id"] == $sejour[$i]){
          echo " selected";
      }
  }
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select></TD><td width="20"></td>
<tr>
	<td align="right">Image : </td>
    <td><input type="file" name="img" /> (Taille conseillée : 550 x 230px ) </td>
</tr>
<TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  
  
  </TABLE>
  </form>


		</td>
	</tr>
</table><br>