<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Supplément - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST['nom']) && $_POST['nom'] != ""){
	$nom = $_POST['nom'];
	$tarif = $_POST['tarif'];
	$obligatoire = $_POST['obligatoire'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE fiche_etudiant_adulte_supplement SET nom='".addslashes($nom)."', tarif='".addslashes($tarif)."',obligatoire='".addslashes($obligatoire)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO fiche_etudiant_adulte_supplement (fiche_etudiant_adulte, nom, tarif,obligatoire) VALUES ('".addslashes($_GET["fiche"])."', '".addslashes($nom)."', '".addslashes($tarif)."',, '".addslashes($obligatoire)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	if(isset($_GET['url_retour']) && $_GET['url_retour']!=""){
		echo "<script>document.location.href='".$_GET['url_retour']."';</script>";
	}else{
		echo "<script>document.location.href='admin.php?action=supplement';</script>";
	}
}else{ 
	$id = "";
	$nom = "";
	$tarif = "";
	$obligatoire = "";
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM fiche_etudiant_adulte_supplement WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$nom = (stripslashes($row['nom']));
		$tarif = stripslashes($row['tarif']);
		$obligatoire = stripslashes($row['obligatoire']);
	}
}
?>

  <FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE BORDER=0 class=contenu> 
  <TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
  <TR><TD align=right>Tarif :</TD><TD><INPUT TYPE="text" size="50" name="tarif" maxlength="250" value="<?=$tarif?>"></TD></TR>
  <tr>
	<td align="right">Obligatoire :</td>
    <td><input type="radio" name="obligatoire" value="1" <?=(($obligatoire=="1") ? " checked" : "")?> /> oui <input type="radio" name="obligatoire" value="0" <?=(($obligatoire=="0") ? " checked" : "")?> /> non</td>
</tr>
  <tr><td>&nbsp;</td></tr>
  <TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  </TABLE>
  </form>


		</td>
	</tr>
</table><br>