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
	$afficher = $_POST['afficher'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE formule_junior SET nom='".addslashes($nom)."', description='".addslashes($description)."', afficher='".addslashes($afficher)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO formule_junior (nom, description,afficher) VALUES ('".addslashes($nom)."', '".addslashes($description)."','".addslashes($afficher)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	echo "<script>document.location.href='admin.php?action=junior_formule';</script>";
}else{ 
	$id = "";
	$nom = "";
	$description = "";
	$afficher = "1";
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM formule_junior WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		
		$nom = htmlentities(stripslashes($row['nom']));
		$description = stripslashes($row['description']);
		$afficher = stripslashes($row['afficher']);
	}
}
?>

<FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
<TABLE BORDER=0 class=contenu> 
<TR><TD align=right>Afficher :</TD>
<td><INPUT TYPE="radio" name="afficher" value="1" <?=(($afficher == "1") ? " checked" : "")?>> oui &nbsp;&nbsp; <INPUT TYPE="radio" name="afficher" value="0" <?=(($afficher == "0") ? " checked" : "")?>> non</td></tr>
<TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
<TR><TD align=right valign="top">Description :</TD><TD><textarea name="description" cols="60" rows="15"><?=$description?></textarea></TD></TR>
<tr><td>&nbsp;</td></tr>
<TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
</TABLE>
</form>


		</td>
	</tr>
</table><br>