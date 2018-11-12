<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Tarif - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
//Si le formulaire a été envoyé
if(isset($_POST['nom']) && $_POST['nom'] != ""){
	$nom = $_POST['nom'];
	$prix_famille = $_POST['prix_famille'];
	$prix_residence = $_POST['prix_residence'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE fiche_etudiant_adulte_tarif SET nom='".addslashes($nom)."', prix_famille='".addslashes($prix_famille)."', prix_residence='".addslashes($prix_residence)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT fiche_etudiant_adulte_tarif (fiche_etudiant_adulte, nom, prix_famille, prix_residence) VALUES ('".addslashes($_GET["fiche"])."', '".addslashes($nom)."', '".addslashes($prix_famille)."', '".addslashes($prix_residence)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	echo "<script>document.location.href='admin.php?action=tarif&fiche=".$_GET['fiche']."';</script>";
}else{ 
	$id = "";
	$nom = "";
	$prix_famille = "";
	$prix_residence = "";
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM fiche_etudiant_adulte_tarif WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$nom = htmlentities(stripslashes($row['nom']));
		$prix_famille = htmlentities(stripslashes($row['prix_famille']));
		$prix_residence = htmlentities(stripslashes($row['prix_residence']));
	}
}
?>

  <FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE BORDER=0 class=contenu> 
  <TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></b></TD></TR>
  <TR><TD align=right>Prix famille :</TD><TD><INPUT TYPE="text" size="50" name="prix_famille" maxlength="250" value="<?=$prix_famille?>"></TD></TR>
  <TR><TD align=right>Prix résidence :</TD><TD><INPUT TYPE="text" size="50" name="prix_residence" maxlength="250" value="<?=$prix_residence?>"></TD></TR>
  <tr><td>&nbsp;</td></tr>
  <TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  </TABLE>
  </form>


		</td>
	</tr>
</table><br>