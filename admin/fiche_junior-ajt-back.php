<?
include_once("../fckeditor/fckeditor.php");
?>

<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Fiche junior - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST['pays'])){
	$afficher = $_POST['afficher'];
	$complet = $_POST['complet'];
	$nom = $_POST['nom'];
	$pays = $_POST['pays'];
	$ville = $_POST['ville'];
	$description = $_POST['description'];
	$rappel_formule = $_POST['rappel_formule'];
	$prix_tout_compris = $_POST['prix_tout_compris'];
	$prix_non_compris = $_POST['prix_non_compris'];
	$niveau = $_POST['niveau'];
	$video = $_POST['video'];
	//$dates = $_POST['dates'];
	$tarif = $_POST['tarif'];
	$langue = $_POST['langue'];
	$classe = $_POST['classe'];
	//$ville_devis = $_POST['ville_devis'];
	$transport = $_POST['transport'];
	//$infos_utiles = $_POST['infos_utiles'];
	$cours = $_POST['cours'];
	//$preacheminement_train = $_POST['preacheminement_train'];
	//$preacheminement_avion = $_POST['preacheminement_avion'];
	$avion = $_POST['avion'];
	$avion_tarif = $_POST['avion_tarif'];
	
	$formule = $_POST['formule'];
	$hebergement = $_POST['hebergement'];
	$classe = $_POST['classe'];
	
	$point_fort1 = $_POST['point_fort1'];
	$point_fort2 = $_POST['point_fort2'];
	$point_fort3 = $_POST['point_fort3'];
	$point_fort4 = $_POST['point_fort4'];
	$point_fort5 = $_POST['point_fort5'];
	
	$option_nom1 = $_POST['option_nom1']; $option_prix1 = $_POST['option_prix1']; $option_texte1 = $_POST['option_texte1']; $option_type1 = $_POST['option_type1'];
	$option_nom2 = $_POST['option_nom2']; $option_prix2 = $_POST['option_prix2']; $option_texte2 = $_POST['option_texte2']; $option_type2 = $_POST['option_type2'];
	$option_nom3 = $_POST['option_nom3']; $option_prix3 = $_POST['option_prix3']; $option_texte3 = $_POST['option_texte3']; $option_type3 = $_POST['option_type3'];
	$option_nom4 = $_POST['option_nom4']; $option_prix4 = $_POST['option_prix4']; $option_texte4 = $_POST['option_texte4']; $option_type4 = $_POST['option_type4'];
	$option_nom5 = $_POST['option_nom5']; $option_prix5 = $_POST['option_prix5']; $option_texte5 = $_POST['option_texte5']; $option_type5 = $_POST['option_type5'];
	
	$hebergement_nom1 = $_POST['hebergement_nom1']; $hebergement_texte1 = $_POST['hebergement_texte1'];
	$hebergement_nom2 = $_POST['hebergement_nom2']; $hebergement_texte2 = $_POST['hebergement_texte2'];
	$hebergement_nom3 = $_POST['hebergement_nom3']; $hebergement_texte3 = $_POST['hebergement_texte3'];
	$hebergement_nom4 = $_POST['hebergement_nom4']; $hebergement_texte4 = $_POST['hebergement_texte4'];
	$hebergement_nom5 = $_POST['hebergement_nom5']; $hebergement_texte5 = $_POST['hebergement_texte5'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE fiche_junior SET afficher='".addslashes($afficher)."',complet='".addslashes($complet)."', nom='".addslashes($nom)."', pays='".addslashes($pays)."', ville='".addslashes($ville)."', description='".addslashes($description)."', rappel_formule='".addslashes($rappel_formule)."', prix_tout_compris='".addslashes($prix_tout_compris)."', prix_non_compris='".addslashes($prix_non_compris)."', niveau='".addslashes($niveau)."', video='".addslashes($video)."', tarif='".addslashes($tarif)."', point_fort1='".addslashes($point_fort1)."', point_fort2='".addslashes($point_fort2)."', point_fort3='".addslashes($point_fort3)."', point_fort4='".addslashes($point_fort4)."', point_fort5='".addslashes($point_fort5)."', langue='".addslashes($langue)."', option_nom1='".addslashes($option_nom1)."', option_type1='".addslashes($option_type1)."', option_texte1='".addslashes($option_texte1)."', option_nom2='".addslashes($option_nom2)."', option_type2='".addslashes($option_type2)."', option_texte2='".addslashes($option_texte2)."', option_nom3='".addslashes($option_nom3)."', option_type3='".addslashes($option_type3)."', option_texte3='".addslashes($option_texte3)."', option_nom4='".addslashes($option_nom4)."', option_type4='".addslashes($option_type4)."', option_texte4='".addslashes($option_texte4)."', option_nom5='".addslashes($option_nom5)."', option_type5='".addslashes($option_type5)."', option_texte5='".addslashes($option_texte5)."', hebergement_nom1='".addslashes($hebergement_nom1)."', hebergement_texte1='".addslashes($hebergement_texte1)."', hebergement_nom2='".addslashes($hebergement_nom2)."', hebergement_texte2='".addslashes($hebergement_texte2)."', hebergement_nom3='".addslashes($hebergement_nom3)."', hebergement_texte3='".addslashes($hebergement_texte3)."', hebergement_nom4='".addslashes($hebergement_nom4)."', hebergement_texte4='".addslashes($hebergement_texte4)."', hebergement_nom5='".addslashes($hebergement_nom5)."', hebergement_texte5='".addslashes($hebergement_texte5)."', transport='".addslashes($transport)."', cours='".addslashes($cours)."', avion='".addslashes($avion)."', avion_tarif='".addslashes($avion_tarif)."', option_prix1='".addslashes($option_prix1)."', option_prix2='".addslashes($option_prix2)."', option_prix3='".addslashes($option_prix3)."', option_prix4='".addslashes($option_prix4)."', option_prix5='".addslashes($option_prix5)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO fiche_junior (afficher,complet, nom, pays, ville, description, rappel_formule, prix_tout_compris, prix_non_compris, niveau,video, tarif, point_fort1, point_fort2, point_fort3, point_fort4, point_fort5, langue, option_nom1, option_type1, option_texte1, option_nom2, option_type2, option_texte2, option_nom3, option_type3, option_texte3, option_nom4, option_type4, option_texte4, option_nom5, option_type5, option_texte5, hebergement_nom1, hebergement_texte1, hebergement_nom2, hebergement_texte2, hebergement_nom3, hebergement_texte3, hebergement_nom4, hebergement_texte4, hebergement_nom5, hebergement_texte5, transport, cours, avion, avion_tarif, option_prix1, option_prix2, option_prix3, option_prix4, option_prix5) VALUES ('".addslashes($afficher)."', '".addslashes($complet)."', '".addslashes($nom)."', '".addslashes($pays)."', '".addslashes($ville)."', '".addslashes($description)."', '".addslashes($rappel_formule)."', '".addslashes($prix_tout_compris)."', '".addslashes($prix_non_compris)."', '".addslashes($niveau)."', '".addslashes($video)."', '".addslashes($tarif)."', '".addslashes($point_fort1)."', '".addslashes($point_fort2)."', '".addslashes($point_fort3)."', '".addslashes($point_fort4)."', '".addslashes($point_fort5)."', '".addslashes($langue)."', '".addslashes($option_nom1)."', '".addslashes($option_type1)."', '".addslashes($option_texte1)."', '".addslashes($option_nom2)."', '".addslashes($option_type2)."', '".addslashes($option_texte2)."', '".addslashes($option_nom3)."', '".addslashes($option_type3)."', '".addslashes($option_texte3)."', '".addslashes($option_nom4)."', '".addslashes($option_type4)."', '".addslashes($option_texte4)."', '".addslashes($option_nom5)."', '".addslashes($option_type5)."', '".addslashes($option_texte5)."', '".addslashes($hebergement_nom1)."', '".addslashes($hebergement_texte1)."', '".addslashes($hebergement_nom2)."', '".addslashes($hebergement_texte2)."', '".addslashes($hebergement_nom3)."', '".addslashes($hebergement_texte3)."', '".addslashes($hebergement_nom4)."', '".addslashes($hebergement_texte4)."', '".addslashes($hebergement_nom5)."', '".addslashes($hebergement_texte5)."', '".addslashes($transport)."', '".addslashes($cours)."', '".addslashes($avion)."', '".addslashes($avion_tarif)."', '".addslashes($option_prix1)."', '".addslashes($option_prix2)."', '".addslashes($option_prix3)."', '".addslashes($option_prix4)."', '".addslashes($option_prix5)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	$query = "DELETE FROM fiche_junior_formule WHERE fiche_junior = '".addslashes($_GET['id'])."'";
	mysql_query($query) or die(mysql_error());
	for($i=0 ; $i<count($formule) ; $i++){
		$query = "INSERT INTO fiche_junior_formule VALUES ('".addslashes($_GET['id'])."', '".addslashes($formule[$i])."')";
		mysql_query($query) or die(mysql_error());
	}
	
	$query = "DELETE FROM fiche_junior_hebergement WHERE fiche_junior = '".addslashes($_GET['id'])."'";
	mysql_query($query) or die(mysql_error());
	for($i=0 ; $i<count($hebergement) ; $i++){
		$query = "INSERT INTO fiche_junior_hebergement VALUES ('".addslashes($_GET['id'])."', '".addslashes($hebergement[$i])."')";
		mysql_query($query) or die(mysql_error());
	}
	
	$query = "DELETE FROM fiche_junior_classe WHERE fiche_junior = '".addslashes($_GET['id'])."'";
	mysql_query($query) or die(mysql_error());
	for($i=0 ; $i<count($classe) ; $i++){
		$query = "INSERT INTO fiche_junior_classe VALUES ('".addslashes($_GET['id'])."', '".addslashes($classe[$i])."')";
		mysql_query($query) or die(mysql_error());
	}
	
	/*if($_FILES['pdf']['error'] == 0){
		if($_FILES['pdf']['type'] == "application/pdf" || $_FILES['pdf']['type'] == "application/force-download"){
			move_uploaded_file($_FILES['pdf']['tmp_name'], "../imagesUp/fiche_junior/".$id.".pdf");
		}else{
			echo "<script>alert('Le fichier envoyé n\'est pas un PDF.')</script>";
		}
	}*/
	if($_FILES['img']['error'] == 0){
		$tab_extension = array("jpg");
		$extension = mb_strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], ".")+1));
		if(in_array($extension, $tab_extension)){
			move_uploaded_file($_FILES['img']['tmp_name'], "../imagesUp/fiche_junior/".$id."-gen.".$extension);
		}else{
			echo "<script>alert('Le fichier envoyé n\'est pas un fichier valide.')</script>";
		}
	}
	
	echo "<script>document.location.href='admin.php?action=fiche_junior';</script>";
}else{ 
	$id = "";
	$afficher = "1";
	$complet = "0";
	$nom = "";
	$pays = "";
	$ville = "";
	$description = "";
	$rappel_formule = "";
	$prix_tout_compris = "";
	$prix_non_compris = "";
	$niveau = "";
	$video = "";
	//$dates = "";
	$tarif = "";
	$langue = "";
	//$ville_devis = "";
	$transport = "";
	//$infos_utiles = "";
	$cours = "";
	//$preacheminement_train = "0";
	//$preacheminement_avion = "0";
	$avion = "0";
	$avion_tarif = "";
	
	$point_fort1 = "";
	$point_fort2 = "";
	$point_fort3 = "";
	$point_fort4 = "";
	$point_fort5 = "";
	
	$option_nom1 = ""; $option_prix1 = ""; $option_texte1 = ""; $option_type1 = "";
	$option_nom2 = ""; $option_prix2 = ""; $option_texte2 = ""; $option_type2 = "";
	$option_nom3 = ""; $option_prix3 = ""; $option_texte3 = ""; $option_type3 = "";
	$option_nom4 = ""; $option_prix4 = ""; $option_texte4 = ""; $option_type4 = "";
	$option_nom5 = ""; $option_prix5 = ""; $option_texte5 = ""; $option_type5 = "";
	
	$hebergement_nom1 = ""; $hebergement_texte1 = "";
	$hebergement_nom2 = ""; $hebergement_texte2 = "";
	$hebergement_nom3 = ""; $hebergement_texte3 = "";
	$hebergement_nom4 = ""; $hebergement_texte4 = "";
	$hebergement_nom5 = ""; $hebergement_texte5 = "";
	
	$formule = array();
	$hebergement = array();
	$classe = array();
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM fiche_junior WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$afficher = stripslashes($row['afficher']);
		$complet = stripslashes($row['complet']);
		$nom = stripslashes($row['nom']);
		$pays = stripslashes($row['pays']);
		$ville = stripslashes($row['ville']);
		$description = stripslashes($row['description']);
		$rappel_formule = stripslashes($row['rappel_formule']);
		$prix_tout_compris = stripslashes($row['prix_tout_compris']);
		$prix_non_compris = stripslashes($row['prix_non_compris']);
		$niveau = stripslashes($row['niveau']);
		$video = stripslashes($row['video']);
		//$dates = stripslashes($row['dates']);
		$tarif = stripslashes($row['tarif']);
		$langue = stripslashes($row['langue']);
		//$ville_devis = stripslashes($row['ville_devis']);
		$transport = stripslashes($row['transport']);
		//$infos_utiles = stripslashes($row['infos_utiles']);
		$cours = stripslashes($row['cours']);
		//$preacheminement_train = stripslashes($row['preacheminement_train']);
		//$preacheminement_avion = stripslashes($row['preacheminement_avion']);
		$avion = stripslashes($row['avion']);
		$avion_tarif = stripslashes($row['avion_tarif']);
		
		$point_fort1 = stripslashes($row['point_fort1']);
		$point_fort2 = stripslashes($row['point_fort2']);
		$point_fort3 = stripslashes($row['point_fort3']);
		$point_fort4 = stripslashes($row['point_fort4']);
		$point_fort5 = stripslashes($row['point_fort5']);
		
		$option_nom1 = stripslashes($row['option_nom1']); $option_prix1 = stripslashes($row['option_prix1']); $option_texte1 = stripslashes($row['option_texte1']); $option_type1 = stripslashes($row['option_type1']);
		$option_nom2 = stripslashes($row['option_nom2']); $option_prix2 = stripslashes($row['option_prix2']); $option_texte2 = stripslashes($row['option_texte2']); $option_type2 = stripslashes($row['option_type2']);
		$option_nom3 = stripslashes($row['option_nom3']); $option_prix3 = stripslashes($row['option_prix3']); $option_texte3 = stripslashes($row['option_texte3']); $option_type3 = stripslashes($row['option_type3']);
		$option_nom4 = stripslashes($row['option_nom4']); $option_prix4 = stripslashes($row['option_prix4']); $option_texte4 = stripslashes($row['option_texte4']); $option_type4 = stripslashes($row['option_type4']);
		$option_nom5 = stripslashes($row['option_nom5']); $option_prix5 = stripslashes($row['option_prix5']); $option_texte5 = stripslashes($row['option_texte5']); $option_type5 = stripslashes($row['option_type5']);
		
		$hebergement_nom1 = stripslashes($row['hebergement_nom1']); $hebergement_texte1 = stripslashes($row['hebergement_texte1']);
		$hebergement_nom2 = stripslashes($row['hebergement_nom2']); $hebergement_texte2 = stripslashes($row['hebergement_texte2']);
		$hebergement_nom3 = stripslashes($row['hebergement_nom3']); $hebergement_texte3 = stripslashes($row['hebergement_texte3']);
		$hebergement_nom4 = stripslashes($row['hebergement_nom4']); $hebergement_texte4 = stripslashes($row['hebergement_texte4']);
		$hebergement_nom5 = stripslashes($row['hebergement_nom5']); $hebergement_texte5 = stripslashes($row['hebergement_texte5']);
		
		$query2 = "SELECT * FROM fiche_junior_formule WHERE fiche_junior = '".addslashes($_GET['id'])."'";
		$exec2 = mysql_query($query2) or die(mysql_error());
		$i=0;
		while($data2 = mysql_fetch_array($exec2)){
			$formule[$i] = $data2['formule'];
			$i++;
		}
		
		$query2 = "SELECT * FROM fiche_junior_hebergement WHERE fiche_junior = '".addslashes($_GET['id'])."'";
		$exec2 = mysql_query($query2) or die(mysql_error());
		$i=0;
		while($data2 = mysql_fetch_array($exec2)){
			$hebergement[$i] = $data2['hebergement'];
			$i++;
		}
		
		$query2 = "SELECT * FROM fiche_junior_classe WHERE fiche_junior = '".addslashes($_GET['id'])."'";
		$exec2 = mysql_query($query2) or die(mysql_error());
		$i=0;
		while($data2 = mysql_fetch_array($exec2)){
			$classe[$i] = $data2['classe'];
			$i++;
		}
	}
}
?>

<table width="100%"><tr><td align="center" valign="middle"><?=(file_exists("../imagesUp/fiche_junior/".$id."-gen.jpg") ? "<img src='../imagesUp/fiche_junior/".$id."-gen.jpg' /><br /><a href='#' onclick='if(confirm(\"Voulez vous supprimer cette photo ?\")) document.location.href=\"fiche_junior-supp_photo.php?f=".$id."-gen\";'>supprimer ?</a>" : "")?></td></tr></table><br />

<FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
<TABLE BORDER=0 class=contenu>
<TR><TD align="right">Afficher :</TD><TD><INPUT TYPE="radio" name="afficher" value="1" <?=(($afficher == "1") ? " checked" : "")?>> oui &nbsp;&nbsp; <INPUT TYPE="radio" name="afficher" value="0" <?=(($afficher == "0") ? " checked" : "")?>> non</TD></TR>
<TR><TD align="right">complet :</TD><TD><INPUT TYPE="radio" name="complet" value="1" <?=(($complet== "1") ? " checked" : "")?>> oui &nbsp;&nbsp; <INPUT TYPE="radio" name="complet" value="0" <?=(($complet == "0") ? " checked" : "")?>> non</TD></TR>
<TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
<TR><TD align=right>Pays :</TD><TD><select name="pays"><option value="">- - -</option>
<?
$query = "SELECT * FROM junior_pays ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  if($data["id"] == $pays)
    echo " selected";
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select></TD></TR>
<TR><TD align=right>Ville :</TD><TD><select name="ville"><option value="">- - -</option>
<?
$query = "SELECT * FROM junior_ville ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  if($data["id"] == $ville)
    echo " selected";
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select></TD></TR>
<TR><TD align=right valign="top">Description :</TD><TD><textarea name="description" cols="50" rows="8"><?=$description?></textarea></TD></TR>
<TR><TD align=right valign="top">Rappel formule :</TD><TD><textarea name="rappel_formule" cols="50" rows="6"><?=$rappel_formule?></textarea></TD></TR>
<TR><TD align=right valign="top">Le prix comprend :</TD><TD><textarea name="prix_tout_compris" cols="40" rows="4"><?=$prix_tout_compris?></textarea></TD></TR>
<TR><TD align=right valign="top">Le prix ne comprend pas :</TD><TD><textarea name="prix_non_compris" cols="40" rows="4"><?=$prix_non_compris?></textarea></TD></TR>
<TR><TD align=right valign="top">Transport :</TD><TD><textarea name="transport" cols="50" rows="8"><?=$transport?></textarea></TD></TR>
<tr><td>&nbsp;</td></tr>
<tr><td colspan="2"><table align="center" border="0" style="border-style:solid; border-color:#666666; border-width:1px;">
<tr><th colspan="3">Hébergements</th></tr>
<tr><th>Num</th><th>Nom</th><th>Description</th></tr>
<tr align="center"><td>1</td><td><INPUT TYPE="text" size="20" name="hebergement_nom1" maxlength="255" value="<?=$hebergement_nom1?>"></td><td>
<?
$oFCKeditor = new FCKeditor('hebergement_texte1');
$oFCKeditor->BasePath = '../fckeditor/';
$oFCKeditor->Height = '200';
$oFCKeditor->Width = '300';
$oFCKeditor->Value = $hebergement_texte1;
$oFCKeditor->ToolbarSet = 'Basic';
$oFCKeditor->Create();
?>
</td></tr>
<tr align="center"><td>2</td><td><INPUT TYPE="text" size="20" name="hebergement_nom2" maxlength="255" value="<?=$hebergement_nom2?>"></td><td><textarea name="hebergement_texte2" cols="40" rows="4"><?=$hebergement_texte2?></textarea></td></tr>
<tr align="center"><td>3</td><td><INPUT TYPE="text" size="20" name="hebergement_nom3" maxlength="255" value="<?=$hebergement_nom3?>"></td><td><textarea name="hebergement_texte3" cols="40" rows="4"><?=$hebergement_texte3?></textarea></td></tr>
<tr align="center"><td>4</td><td><INPUT TYPE="text" size="20" name="hebergement_nom4" maxlength="255" value="<?=$hebergement_nom4?>"></td><td><textarea name="hebergement_texte4" cols="40" rows="4"><?=$hebergement_texte4?></textarea></td></tr>
<tr align="center"><td>5</td><td><INPUT TYPE="text" size="20" name="hebergement_nom5" maxlength="255" value="<?=$hebergement_nom5?>"></td><td><textarea name="hebergement_texte5" cols="40" rows="4"><?=$hebergement_texte5?></textarea></td></tr>
</table></td></tr>
<tr><td>&nbsp;</td></tr>
<TR><TD align=right valign="top">Cours :</TD><TD><textarea name="cours" cols="50" rows="8"><?=$cours?></textarea></TD></TR>
<TR><TD align=right>Niveau :</TD><TD><INPUT TYPE="text" size="50" name="niveau" maxlength="250" value="<?=$niveau?>"></TD></TR>
<TR><TD align=right>video :</TD><TD><INPUT TYPE="text" size="50" name="video" maxlength="250" value="<?=$video?>"></TD></TR>
<TR><TD align=right valign="top">Classe&nbsp;:<br /><br />ctrl + clic</TD><TD><select name="classe[]" size="6" multiple="multiple">
<?
$query = "SELECT * FROM classe ORDER BY id";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  for($i=0 ; $i<count($classe) ; $i++){
      if($data["id"] == $classe[$i]){
          echo " selected";
      }
  }
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select></TD></TR>
<!--<TR><TD align=right>Dates :</TD><TD><textarea name="dates" cols="30" rows="3"><?=$dates?></textarea></TD></TR>-->
<!--<TR><TD align=right>Villes devis :</TD><TD><textarea name="ville_devis" cols="30" rows="3"><?=$ville_devis?></textarea></TD></TR>-->
<TR><TD align=right>Tarif :</TD><TD><INPUT TYPE="text" size="5" name="tarif" maxlength="250" value="<?=$tarif?>"> €</TD></TR>
<TR><TD align=right>Langues&nbsp;:</TD><TD><select name="langue"><option value="">- - -</option>
<?
$query = "SELECT * FROM langue ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  if($data["id"] == $langue){
      echo " selected";
  }
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select></TD></TR>
<? /*<TR><TD align="right">Préacheminement train :</TD><TD><INPUT TYPE="radio" name="preacheminement_train" value="1" <?=(($preacheminement_train == "1") ? " checked" : "")?>> oui &nbsp;&nbsp; <INPUT TYPE="radio" name="preacheminement_train" value="0" <?=(($preacheminement_train == "0") ? " checked" : "")?>> non</TD></TR>
<TR><TD align="right">Préacheminement avion :</TD><TD><INPUT TYPE="radio" name="preacheminement_avion" value="1" <?=(($preacheminement_avion == "1") ? " checked" : "")?>> oui &nbsp;&nbsp; <INPUT TYPE="radio" name="preacheminement_avion" value="0" <?=(($preacheminement_avion == "0") ? " checked" : "")?>> non</TD></TR>*/ ?>
<TR><TD align="right">Séjour avion :</TD><TD><INPUT TYPE="radio" name="avion" value="1" <?=(($avion == "1") ? " checked" : "")?>> oui &nbsp;&nbsp; <INPUT TYPE="radio" name="avion" value="0" <?=(($avion == "0") ? " checked" : "")?>> non</TD></TR>
<TR><TD align="right">Tarif :</TD><TD><INPUT TYPE="text" size="5" name="avion_tarif" maxlength="250" value="<?=$avion_tarif?>"> € &nbsp;&nbsp; taxes d'aéroports et surcharge carburant</TD></TR>
<tr><td>&nbsp;</td></tr>
<tr><td colspan="2"><table border="0" width="100%" align="center">
<TR><TD align=right valign="top">Formules&nbsp;:<br /><br />ctrl + clic</TD><TD><select name="formule[]" size="6" multiple="multiple">
<?
$query = "SELECT * FROM formule_junior ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  for($i=0 ; $i<count($formule) ; $i++){
      if($data["id"] == $formule[$i]){
          echo " selected";
      }
  }
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select></TD><td width="20"></td><TD align=right valign="top">Hébergements&nbsp;:<br /><br />ctrl + clic</TD><TD><select name="hebergement[]" size="6" multiple="multiple">
<?
$query = "SELECT * FROM hebergement_junior ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  for($i=0 ; $i<count($hebergement) ; $i++){
      if($data["id"] == $hebergement[$i]){
          echo " selected";
      }
  }
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select></TD></TR>
</table></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td colspan="2"><table align="center" width="100%" border="0" style="border-style:solid; border-color:#666666; border-width:1px;">
<tr><th colspan="3">Options</th></tr>
<tr><th>Num</th><th>Nom</th><th>Description</th><th>Type et prix</th></tr>
<tr align="center"><td>1</td><td><INPUT TYPE="text" size="20" name="option_nom1" maxlength="255" value="<?=$option_nom1?>"></td><td><textarea name="option_texte1" cols="40" rows="4"><?=$option_texte1?></textarea></td><td><select name="option_type1"><option value="">- - -</option><option value="hébergement" <?=(($option_type1 == "hébergement") ? " selected" : "")?>>hébergement</option><option value="activité" <?=(($option_type1 == "activité") ? " selected" : "")?>>activité</option></select><br /><INPUT TYPE="text" size="6" name="option_prix1" maxlength="255" value="<?=$option_prix1?>"> €</td></tr>
<tr align="center"><td>2</td><td><INPUT TYPE="text" size="20" name="option_nom2" maxlength="255" value="<?=$option_nom2?>"></td><td><textarea name="option_texte2" cols="40" rows="4"><?=$option_texte2?></textarea></td><td><select name="option_type2"><option value="">- - -</option><option value="hébergement" <?=(($option_type2 == "hébergement") ? " selected" : "")?>>hébergement</option><option value="activité" <?=(($option_type2 == "activité") ? " selected" : "")?>>activité</option></select><br /><INPUT TYPE="text" size="6" name="option_prix2" maxlength="255" value="<?=$option_prix2?>"> €</td></tr>
<tr align="center"><td>3</td><td><INPUT TYPE="text" size="20" name="option_nom3" maxlength="255" value="<?=$option_nom3?>"></td><td><textarea name="option_texte3" cols="40" rows="4"><?=$option_texte3?></textarea></td><td><select name="option_type3"><option value="">- - -</option><option value="hébergement" <?=(($option_type3 == "hébergement") ? " selected" : "")?>>hébergement</option><option value="activité" <?=(($option_type3 == "activité") ? " selected" : "")?>>activité</option></select><br /><INPUT TYPE="text" size="6" name="option_prix3" maxlength="255" value="<?=$option_prix3?>"> €</td></tr>
<tr align="center"><td>4</td><td><INPUT TYPE="text" size="20" name="option_nom4" maxlength="255" value="<?=$option_nom4?>"></td><td><textarea name="option_texte4" cols="40" rows="4"><?=$option_texte4?></textarea></td><td><select name="option_type4"><option value="">- - -</option><option value="hébergement" <?=(($option_type4 == "hébergement") ? " selected" : "")?>>hébergement</option><option value="activité" <?=(($option_type4 == "activité") ? " selected" : "")?>>activité</option></select><br /><INPUT TYPE="text" size="6" name="option_prix4" maxlength="255" value="<?=$option_prix4?>"> €</td></tr>
<tr align="center"><td>5</td><td><INPUT TYPE="text" size="20" name="option_nom5" maxlength="255" value="<?=$option_nom5?>"></td><td><textarea name="option_texte5" cols="40" rows="4"><?=$option_texte5?></textarea></td><td><select name="option_type5"><option value="">- - -</option><option value="hébergement" <?=(($option_type5 == "hébergement") ? " selected" : "")?>>hébergement</option><option value="activité" <?=(($option_type5 == "activité") ? " selected" : "")?>>activité</option></select><br /><INPUT TYPE="text" size="6" name="option_prix5" maxlength="255" value="<?=$option_prix5?>"> €</td></tr>
</table></td></tr>
<tr><td>&nbsp;</td></tr>
<TR><TD align=right>Point fort 1 :</TD><TD><INPUT TYPE="text" size="50" name="point_fort1" maxlength="250" value="<?=$point_fort1?>"></TD></TR>
<TR><TD align=right>Point fort 2 :</TD><TD><INPUT TYPE="text" size="50" name="point_fort2" maxlength="250" value="<?=$point_fort2?>"></TD></TR>
<TR><TD align=right>Point fort 3 :</TD><TD><INPUT TYPE="text" size="50" name="point_fort3" maxlength="250" value="<?=$point_fort3?>"></TD></TR>
<TR><TD align=right>Point fort 4 :</TD><TD><INPUT TYPE="text" size="50" name="point_fort4" maxlength="250" value="<?=$point_fort4?>"></TD></TR>
<TR><TD align=right>Point fort 5 :</TD><TD><INPUT TYPE="text" size="50" name="point_fort5" maxlength="250" value="<?=$point_fort5?>"></TD></TR>
<tr><td>&nbsp;</td></tr>
<? /*<TR><TD align=right valign="top">Infos utiles :</TD><TD>
<?
$oFCKeditor = new FCKeditor('infos_utiles');
$oFCKeditor->BasePath = '../fckeditor/';
$oFCKeditor->Height = '500';
$oFCKeditor->Width = '600';
$oFCKeditor->Value = $infos_utiles;
$oFCKeditor->Create();
?>
</TD></TR>*/ ?>
<tr><td>&nbsp;</td></tr>
<!--<TR><TD align="right">PDF : </TD><TD><input type="file" name="pdf" /></TD></TR>-->
<TR><TD align="right">Image : </TD><TD><input type="file" name="img" /> jpg 550*80 px</TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
</TABLE>
</form>


		</td>
	</tr>
</table><br>