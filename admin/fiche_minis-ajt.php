<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Fiche mini-séjour - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST['pays'])){
	$afficher = $_POST['afficher'];
	$nom = $_POST['nom'];
	$pays = $_POST['pays'];
	$ville = $_POST['ville'];
	$description = $_POST['description'];	$options_titre = $_POST['options_titre'];	$options = $_POST['options'];	$special_titre = $_POST['special_titre'];	$special = $_POST['special'];
	$soustitre = $_POST['soustitre'];
	$langue = $_POST['langue'];
	$tarif_nbjour_min = $_POST['tarif_nbjour_min'];
	$tarif_nbjour_max = $_POST['tarif_nbjour_max'];
	$formule = $_POST['formule'];
	$hebergement = $_POST['hebergement'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE fiche_minis SET afficher='".addslashes($afficher)."', nom='".addslashes($nom)."', pays='".addslashes($pays)."', ville='".addslashes($ville)."', description='".addslashes($description)."', options_titre='".addslashes($options_titre)."', options='".addslashes($options)."',special_titre='".addslashes($special_titre)."',special='".addslashes($special)."',soustitre='".addslashes($soustitre)."', langue='".addslashes($langue)."', tarif_nbjour_min='".addslashes($tarif_nbjour_min)."', tarif_nbjour_max='".addslashes($tarif_nbjour_max)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO fiche_minis (afficher, nom, pays, ville, description,options_titre,options,special_titre,special, soustitre, langue, tarif_nbjour_min, tarif_nbjour_max) VALUES ('".addslashes($afficher)."', '".addslashes($nom)."', '".addslashes($pays)."', '".addslashes($ville)."', '".addslashes($description)."', '".addslashes($options_titre)."','".addslashes($options)."', '".addslashes($special_titre)."', '".addslashes($special)."', '".addslashes($soustitre)."', '".addslashes($langue)."', '".addslashes($tarif_nbjour_min)."', '".addslashes($tarif_nbjour_max)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	$query = "DELETE FROM fiche_minis_formule WHERE fiche_minis = '".addslashes($_GET['id'])."'";
	mysql_query($query) or die(mysql_error());
	for($i=0 ; $i<count($formule) ; $i++){
		$query = "INSERT INTO fiche_minis_formule VALUES ('".addslashes($_GET['id'])."', '".addslashes($formule[$i])."')";
		mysql_query($query) or die(mysql_error());
	}
	
	$query = "DELETE FROM fiche_minis_hebergement WHERE fiche_minis = '".addslashes($_GET['id'])."'";
	mysql_query($query) or die(mysql_error());
	for($i=0 ; $i<count($hebergement) ; $i++){
		$query = "INSERT INTO fiche_minis_hebergement VALUES ('".addslashes($_GET['id'])."', '".addslashes($hebergement[$i])."')";
		mysql_query($query) or die(mysql_error());
	}
	
	if($_FILES['img']['error'] == 0){
		$tab_extension = array("jpg");
		$extension = mb_strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], ".")+1));
		if(in_array($extension, $tab_extension)){
			move_uploaded_file($_FILES['img']['tmp_name'], "../imagesUp/fiche_minis/".$id."-gen.".$extension);
		}else{
			echo "<script>alert('Le fichier envoyé n\'est pas un fichier valide.')</script>";
		}
	}
	
	echo "<script>document.location.href='admin.php?action=fiche_minis';</script>";
	exit();
}else{ 
	$id = "";
	$afficher = "1";
	$nom = "";
	$pays = "";
	$ville = "";
	$description = "";	$options_titre = "";	$options = "";	$special_titre = "";	$special = "";
	$soustitre = "";
	$langue = "";
	$tarif_nbjour_min = "";
	$tarif_nbjour_max = "";
	
	$formule = array();
	$hebergement = array();
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM fiche_minis WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$afficher = stripslashes($row['afficher']);
		$nom = stripslashes($row['nom']);
		$pays = stripslashes($row['pays']);
		$ville = stripslashes($row['ville']);
		$description = stripslashes($row['description']);		$options_titre= stripslashes($row['options_titre']);		$options= stripslashes($row['options']);		$special_titre = stripslashes($row['special_titre']);		$special = stripslashes($row['special']);
		$soustitre = stripslashes($row['soustitre']);
		$langue = stripslashes($row['langue']);
		$tarif_nbjour_min = stripslashes($row['tarif_nbjour_min']);
		$tarif_nbjour_max = stripslashes($row['tarif_nbjour_max']);
		
		$query2 = "SELECT * FROM fiche_minis_formule WHERE fiche_minis = '".addslashes($_GET['id'])."'";
		$exec2 = mysql_query($query2) or die(mysql_error());
		$i=0;
		while($data2 = mysql_fetch_array($exec2)){
			$formule[$i] = $data2['formule'];
			$i++;
		}
		
		$query2 = "SELECT * FROM fiche_minis_hebergement WHERE fiche_minis = '".addslashes($_GET['id'])."'";
		$exec2 = mysql_query($query2) or die(mysql_error());
		$i=0;
		while($data2 = mysql_fetch_array($exec2)){
			$hebergement[$i] = $data2['hebergement'];
			$i++;
		}
	}
}
?>

<table width="100%"><tr><td align="center" valign="middle"><?=(file_exists("../imagesUp/fiche_minis/".$id."-gen.jpg") ? "<img src='../imagesUp/fiche_minis/".$id."-gen.jpg' /><br /><a href='#' onclick='if(confirm(\"Voulez vous supprimer cette photo ?\")) document.location.href=\"fiche_minis-supp_photo.php?f=".$id."-gen\";'>supprimer ?</a>" : "")?></td></tr></table><br />

  <FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE BORDER=0 class=contenu> 
  <TR><TD align="right">Afficher :</TD><TD><INPUT TYPE="radio" name="afficher" value="1" <?=(($afficher == "1") ? " checked" : "")?>> oui &nbsp;&nbsp; <INPUT TYPE="radio" name="afficher" value="0" <?=(($afficher == "0") ? " checked" : "")?>> non</TD></TR>
  <TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
  <TR><TD align=right>Pays :</TD><TD><select name="pays"><option value="- - -"></option>
  <?
  $query = "SELECT * FROM minis_pays ORDER BY nom";
  $exec = mysql_query($query) or die(mysql_error());
  while($data = mysql_fetch_assoc($exec)){
	  echo "<option value='".$data["id"]."'";
	  if($data["id"] == $pays)
	  	echo " selected";
	  echo ">".stripslashes($data["nom"])."</option>";
  }
  ?>
  </select></TD></TR>
  <TR><TD align=right>Ville :</TD><TD><select name="ville"><option value="- - -"></option>
  <?
  $query = "SELECT * FROM minis_ville ORDER BY nom";
  $exec = mysql_query($query) or die(mysql_error());
  while($data = mysql_fetch_assoc($exec)){
	  echo "<option value='".$data["id"]."'";
	  if($data["id"] == $ville)
	  	echo " selected";
	  echo ">".stripslashes($data["nom"])."</option>";
  }
  ?>
  </select></TD></TR>
  <!--<TR><TD align=right valign="top">Description :</TD><TD><textarea name="description" cols="50" rows="8"><?=$description?></textarea></TD></TR>-->
  <TR><TD align=right valign="top">Description :</TD><TD>
  <?
  include_once("../fckeditor/fckeditor.php") ;
  $oFCKeditor = new FCKeditor('description');
  $oFCKeditor->BasePath = '../fckeditor/';
  $oFCKeditor->ToolbarSet = 'Basic4';
  $oFCKeditor->Height = '500';
  $oFCKeditor->Width = '600';
  $oFCKeditor->Value = $description;
  $oFCKeditor->Create();
  ?>
  </TD></TR>   <TR><TD align=right>options titre:</TD><TD><textarea name="options_titre" rows="1" cols="80"><?=$options_titre?></textarea></TD></TR>  <TR><TD align=right>Options</TD><TD><textarea name="options" rows="5" cols="80"><?=$options?></textarea></TD></TR>	  <TR><TD align=right>Special titre:</TD><TD><textarea name="special_titre" rows="1" cols="80"><?=$special_titre?></textarea></TD></TR> <TR><TD align=right>Special</TD><TD><textarea name="special" rows="4" cols="80"><?=$special?></textarea></TD></TR>	  
  <TR><TD align=right>Sous titre :</TD><TD><INPUT TYPE="text" size="80" name="soustitre" maxlength="250" value="<?=$soustitre?>"></TD></TR>
  <TR><TD align=right>Nb PC min :</TD><TD><INPUT TYPE="text" size="10" name="tarif_nbjour_min" maxlength="250" value="<?=$tarif_nbjour_min?>"></TD></TR>
  <TR><TD align=right>Nb PC max :</TD><TD><INPUT TYPE="text" size="10" name="tarif_nbjour_max" maxlength="250" value="<?=$tarif_nbjour_max?>"></TD></TR>
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
  <tr><td colspan="2"><table border="0" width="100%" align="center">
  <TR><TD align=right valign="top">Formules&nbsp;:<br /><br />ctrl + clic</TD><TD><select name="formule[]" size="6" multiple="multiple" style="width:300px">
  <?
  $query = "SELECT * FROM formule_minis ORDER BY nom";
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
  $query = "SELECT * FROM hebergement_minis ORDER BY nom";
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
  <TR><TD align="right">Image : </TD><TD><input type="file" name="img" /> jpg 550*80 px</TD></TR>
  <tr><td>&nbsp;</td></tr>
  <TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  </TABLE>
  </form>


		</td>
	</tr>
</table><br>