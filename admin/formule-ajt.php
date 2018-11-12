<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Formule - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST['nom']) && $_POST['nom'] != ""){
	$nom = $_POST['nom'];
	$description = $_POST['description'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE formule SET nom='".addslashes($nom)."', description='".addslashes($description)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO formule (nom, description) VALUES ('".addslashes($nom)."', '".addslashes($description)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	echo "<script>document.location.href='admin.php?action=formule';</script>";
}else{ 
	$id = "";
	$nom = "";
	$description = "";
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM formule WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$nom = htmlentities(stripslashes($row['nom']));
		$description = stripslashes($row['description']);
	}
}
?>

  <FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE BORDER=0 class=contenu> 
  <TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
  <TR><TD align=right valign="top">Description :</TD><TD><textarea name="description" cols="60" rows="15"><?=$description?></textarea></TD></TR>
  <tr><td>&nbsp;</td></tr>
  <TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  </TABLE>
  </form>


		</td>
	</tr>
</table><br>