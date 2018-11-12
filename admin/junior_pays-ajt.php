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
	
	if(isset($_GET['id'])){
		$requete = "UPDATE junior_pays SET nom='".addslashes($nom)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO junior_pays (nom) VALUES ('".addslashes($nom)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	echo "<script>document.location.href='admin.php?action=junior_pays';</script>";
}else{ 
	$id = "";
	$nom = "";
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM junior_pays WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$nom = htmlentities(stripslashes($row['nom']));
	}
}
?>

  <FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE BORDER=0 class=contenu> 
  <TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
  <tr><td>&nbsp;</td></tr>
  <TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  </TABLE>
  </form>


		</td>
	</tr>
</table><br>