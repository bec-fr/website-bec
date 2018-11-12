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
	$texte = $_POST['texte'];
	$description = $_POST['description'];
	$image = $_POST['image'];
	$afficher = $_POST['afficher'];
	
	
	if(isset($_GET['id'])){
		$requete = "UPDATE minis_pays SET nom='".addslashes($nom)."',description='".addslashes($description)."',texte='".addslashes($texte)."',image='".addslashes($image)."',afficher='".addslashes($afficher)."'  WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO minis_pays (nom,description,texte,image,afficher) VALUES ('".addslashes($nom)."', '".addslashes($description)."', '".addslashes($texte)."', '".addslashes($image)."', '".addslashes($afficher)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	echo "<script>document.location.href='admin.php?action=minis_pays';</script>";
}else{ 
	$id = "";
	$nom = "";
	$description = "";
	$texte = "";
	$image="";
	$afficher = "";
	
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM minis_pays WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$nom = htmlentities(stripslashes($row['nom']));
		$description = stripslashes($row['description']);
		$texte = stripslashes($row['texte']);
		$image = ($row['image']);
		$afficher = stripslashes($row['afficher']);
	}
}
?>

  <FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE BORDER=0 class=contenu> 
  <TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
  <tr><td>&nbsp;</td></tr>
  <TR><TD align="right">Afficher :</TD><TD><INPUT TYPE="radio" name="afficher" value="1" <?=(($afficher == "1") ? " checked" : "")?>> oui &nbsp;&nbsp; <INPUT TYPE="radio" name="afficher" value="0" <?=(($afficher == "0") ? " checked" : "")?>> non</TD></TR>
  <tr><td>Description <br>(160 caractères max) </td><td><textarea name="description" cols="60" rows="4"><?=$description?></textarea></td></tr>	
  <tr><td>Texte </td><td><textarea name="texte" cols="60" rows="8"><?=$texte?></textarea></td></tr>
  <tr><td>image </td><td><INPUT TYPE="text" size="60" name="image" maxlength="60" value="<?=$image?>"></tr>
  <TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  </TABLE>
  </form>


		</td>
	</tr>
</table><br>