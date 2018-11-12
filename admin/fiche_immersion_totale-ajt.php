<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Fiche immersion totale - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST['nom']) && $_POST['nom'] != ""){
	$nom = $_POST['nom'];
	$rid_pays = $_POST['rid_pays'];
	$rid_cat2 = $_POST['rid_cat2'];
	$description = $_POST['description'];
	$prix = $_POST['prix'];
	$monnaie = $_POST['monnaie'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE fiche_immersion_totale SET nom='".addslashes($nom)."', rid_pays='".addslashes($rid_pays)."', rid_cat2='".addslashes($rid_cat2)."', description='".addslashes($description)."', prix='".addslashes($prix)."', monnaie='".addslashes($monnaie)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO fiche_immersion_totale (nom, rid_pays, rid_cat2, description, prix, monnaie) VALUES ('".addslashes($nom)."', '".addslashes($rid_pays)."', '".addslashes($rid_cat2)."', '".addslashes($description)."', '".addslashes($prix)."', '".addslashes($monnaie)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	echo "<script>document.location.href='admin.php?action=fiche_immersion_totale';</script>";
}else{ 
	$id = "";
	$nom = "";
	$rid_pays = "";
	$rid_cat2 = "";
	$description = "";
	$prix = "";
	$monnaie = "";
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM fiche_immersion_totale WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$nom = stripslashes($row['nom']);
		$rid_pays = stripslashes($row['rid_pays']);
		$rid_cat2 = stripslashes($row['rid_cat2']);
		$description = stripslashes($row['description']);
		$prix = stripslashes($row['prix']);
		$monnaie = stripslashes($row['monnaie']);
	}
}
?>

<FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
<TABLE BORDER=0 class=contenu> 
<TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
<TR><TD align=right>Destination :</TD><TD><select name="rid_pays"><option value="">- - -</option>
<?
$query = "SELECT * FROM immersion_totale_pays ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  if($data["id"] == $rid_pays)
    echo " selected";
  echo ">".stripslashes($data["nom"])."</option>";
}
?>
</select></TD></TR>
<TR><TD align=right>Catégorie :</TD><TD><select name="rid_cat2"><option value="">- - -</option>
<?
$query = "SELECT c2.*, c.nom as cat FROM immersion_totale_cat2 c2 INNER JOIN immersion_totale_cat c ON c2.rid_cat = c.id ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
  echo "<option value='".$data["id"]."'";
  if($data["id"] == $rid_cat2)
    echo " selected";
  echo ">".stripslashes($data["cat"])." - ".stripslashes($data["nom"])."</option>";
}
?>
</select></TD></TR>
<TR><TD align=right>Prix :</TD><TD><INPUT TYPE="text" size="10" name="prix" maxlength="250" value="<?=$prix?>"> &nbsp;&nbsp;<INPUT TYPE="text" size="2" name="monnaie" maxlength="250" value="<?=$monnaie?>"></TD></TR>
<TR><TD align=right valign="top">Description :</TD><TD><textarea name="description" cols="50" rows="8"><?=$description?></textarea></TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
</TABLE>
</form>


		</td>
	</tr>
</table><br>