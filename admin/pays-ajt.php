<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Pays - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST['nom']) && $_POST['nom'] != ""){
	$nom = $_POST['nom'];
	$afficher = $_POST['afficher'];
	$description= $_POST['description'];
	$texte = $_POST['texte'];
	$visas = $_POST['visas'];
	$image = $_POST['image'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	
	
	if(isset($_GET['id'])){
		$requete = "UPDATE pays SET nom='".addslashes($nom)."',texte='".addslashes($texte)."' ,description='".addslashes($description)."',visas='".addslashes($visas)."',afficher='".addslashes($afficher)."',image='".addslashes($image)."',lat='".addslashes($lat)."',lng='".addslashes($lng)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO pays (nom,afficher,description,texte,visas,image,lat,lng) VALUES ('".addslashes($nom)."','".addslashes($description)."',,'".addslashes($description)."','".addslashes($afficher)."','".addslashes($texte)."','".addslashes($visas)."','".addslashes($image).",'".addslashes($lat).",'".addslashes($lng)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	echo "<script>document.location.href='admin.php?action=pays';</script>";
}else{ 
	$id = "";
	$nom = "";
	$texte = "";
	$visas = "";
	$description = "";
	$image = "";
	$lat = "";
	$lng = "";
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM pays WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$nom = htmlentities(stripslashes($row['nom']));
		$texte = (stripslashes($row['texte']));
		$image = ($row['image']);
		$description = (stripslashes($row['description']));
		$visas = (stripslashes($row['visas']));
		$afficher = $row['afficher'];
		$lat = $row['lat'];
		$lng = $row['lng'];
	}
}
?>

  <FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE BORDER=0 class=contenu> 
  <TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
<TR><TD align=right>Afficher :</TD>
<td><INPUT TYPE="radio" name="afficher" value="1" <?=(($afficher == "1") ? " checked" : "")?>> oui &nbsp;&nbsp; <INPUT TYPE="radio" name="afficher" value="0" <?=(($afficher == "0") ? " checked" : "")?>> non</td></tr>
 <tr><td>Description <br>(160 caractères max) </td><td><textarea name="description" cols="60" rows="4"><?=$description?></textarea></td></tr>	
  <tr><td>Texte </td><td><textarea name="texte" cols="60" rows="8"><?=$texte?></textarea></td></tr>
  <tr><td>Visas </td><td><textarea name="visas" cols="60" rows="8"><?=$visas?></textarea></td></tr>
  <tr><td>image </td><td><INPUT TYPE="text" size="60" name="image" maxlength="60" value="<?=$image?>"></tr>
   <TR><TD align=right>Latitude :</TD><TD><INPUT TYPE="text" size="20" name="lat" maxlength="20" value="<?=$lat?>"></TD></TR>
   <TR><TD align=right>Longitude :</TD><TD><INPUT TYPE="text" size="20" name="lng" maxlength="20" value="<?=$lng?>"></TD></TR>
  <TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  </TABLE>
  </form>


		</td>
	</tr>
</table><br>