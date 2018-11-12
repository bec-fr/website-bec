<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Groupe - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST['nom']) && $_POST['nom'] != ""){
	$nom = $_POST['nom'];
	
	if(isset($_GET['id'])){
		$requete = 'UPDATE mailing_groupe SET nom="'.addslashes($nom).'" WHERE id = '.addslashes($_GET['id']);
		mysql_query($requete) or die(mysql_error());
	}else{
		$requete = "INSERT INTO mailing_groupe (nom) VALUES ('".addslashes($nom)."')";
		mysql_query($requete) or die(mysql_error());
	}
	
	//echo $requete;
	
	echo "<script>document.location.href='admin.php?action=newsletter_groupe';</script>";
}else{ 
	$nom = "";
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM mailing_groupe WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$nom = htmlentities(stripslashes($row['nom']));
	}
}
?>

  <FORM ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE BORDER=0 class=contenu> 
  <TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
  <tr><td>&nbsp;</td></tr>
  <TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  </TABLE>
  </form>


		</td>
	</tr>
</table><br>