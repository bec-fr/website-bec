<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Devise - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST['nom']) && $_POST['nom'] != ""){
	$nom = $_POST['nom'];
	$symbole = $_POST['symbole'];
	$taux= $_POST['taux'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE devise SET nom='".addslashes($nom)."', symbole='".addslashes($symbole)."',taux='".addslashes($taux)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		// si mise à jour, on change l'historique
		$id = $_GET['id'];
		$date_jour = date("Y-m-d");
		$requete2 = "UPDATE devise_evolution de SET de.date_fin='".addslashes($date_jour)."' WHERE de.id_devise = '".addslashes($_GET['id'])."' and de.date_fin='2035-12-31'";
		mysql_query($requete2) or die(mysql_error());		
		$requete3 = "INSERT INTO devise_evolution (id_devise,taux, date_debut,date_fin) VALUES ('".addslashes($id)."','".addslashes($taux)."', '".addslashes($date_jour)."', '2035-12-31')";
		mysql_query($requete3) or die(mysql_error());
		
	}else{
		$requete = "INSERT INTO devise (nom, symbole,taux) VALUES ('".addslashes($nom)."', '".addslashes($symbole)."', '".addslashes($taux)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	echo "<script>document.location.href='admin.php?action=devise';</script>";
}else{ 
	$id = "";
	$nom = "";
	$symbole = "";
	$taux = "";
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM devise WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$nom = htmlentities(stripslashes($row['nom']));
		$symbole = stripslashes($row['symbole']);
		$taux = stripslashes($row['taux']);
	}
}
?>

  <FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE align="center" BORDER=0 class=contenu> 
  <TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
  <TR><TD align=right valign="top">Symbole :</TD><TD><INPUT TYPE="text" size="10" name="symbole" maxlength="250" value="<?=$symbole?>"></TD></TR>
  <TR><TD align=right valign="top">Taux:</TD><TD><INPUT TYPE="text" size="10" name="taux" maxlength="250" value="<?=$taux?>"></TD></TR>
  <tr><td>&nbsp;</td></tr>
  <TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  <tr>
  <td colspan="2"><br><i>Attention toute mise à jour entraine un changement de l'historique</i> <br></td>
  </tr>
  </TABLE>
  </form>
  <div align="right">
 <br><a href="" onClick="javascript:window.history.go(-1)"> <input value=" Retour" align="right"class="bouton"></a>
</div>
		</td>
	</tr>
</table><br>