<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Option transport - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a �t� envoy�
if(isset($_POST['nom']) && $_POST['nom'] != ""){
	$nom = $_POST['nom'];
	$texte = $_POST['texte'];
	$prix = $_POST['prix'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE junior_option_transport SET nom='".addslashes($nom)."', texte='".addslashes($texte)."', prix='".addslashes($prix)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO junior_option_transport (nom, texte, prix) VALUES ('".addslashes($nom)."', '".addslashes($texte)."', '".addslashes($prix)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	echo "<script>document.location.href='admin.php?action=junior_option_transport';</script>";
}else{ 
	$id = "";
	$nom = "";
	$texte = "";
	$prix = "";
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM junior_option_transport WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$nom = htmlentities(stripslashes($row['nom']));
		$texte = stripslashes($row['texte']);
		$prix = stripslashes($row['prix']);
	}
}
?>

  <FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE BORDER=0 class=contenu> 
  <TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
  <TR><TD align=right>Prix :</TD><TD><INPUT TYPE="text" size="10" name="prix" maxlength="250" value="<?=$prix?>"> �</TD></TR>
  <TR><TD align=right valign="top">Texte :</TD><TD><textarea name="texte" rows="6" cols="50"><?=$texte?></textarea></TD></TR>
  <tr><td>&nbsp;</td></tr>
  <TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  </TABLE>
  </form>


		</td>
	</tr>
</table><br>