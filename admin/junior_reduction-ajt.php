<link rel="stylesheet" type="text/css" href="./calendrier/calendrier.css" />
<script language='JavaScript' src='calendrier/browserSniffer.js'></script>
<script language='JavaScript' src='calendrier/dynCalendar.js'></script>

<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Réduction - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST['nom']) && $_POST['nom'] != ""){
	$nom = $_POST['nom'];
	$texte = $_POST['texte'];
	$prix = $_POST['prix'];
	$date_debut = explode("/", $_POST['date_debut']);
	$date_debut = $date_debut[2]."-".$date_debut[1]."-".$date_debut[0];
	$date_fin = explode("/", $_POST['date_fin']);
	$date_fin = $date_fin[2]."-".$date_fin[1]."-".$date_fin[0];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE junior_reduction SET nom='".addslashes($nom)."', texte='".addslashes($texte)."', prix='".addslashes($prix)."', date_debut='".addslashes($date_debut)."', date_fin='".addslashes($date_fin)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO junior_reduction (nom, texte, prix, date_debut, date_fin) VALUES ('".addslashes($nom)."', '".addslashes($texte)."', '".addslashes($prix)."', '".addslashes($date_debut)."', '".addslashes($date_fin)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	echo "<script>document.location.href='admin.php?action=junior_reduction';</script>";
}else{ 
	$id = "";
	$nom = "";
	$texte = "";
	$prix = "";
	$date_debut = "";
	$date_fin = "";
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM junior_reduction WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$nom = htmlentities(stripslashes($row['nom']));
		$texte = stripslashes($row['texte']);
		$prix = stripslashes($row['prix']);
		$date_debut = parseDate($row['date_debut']);
		$date_fin = parseDate($row['date_fin']);
	}
}
?>

  <FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <TABLE BORDER=0 class=contenu> 
  <TR><TD align=right>Nom :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
  <TR><TD align=right>Prix :</TD><TD><INPUT TYPE="text" size="10" name="prix" maxlength="250" value="<?=$prix?>"> €</TD></TR>
  <TR><TD align=right valign="top">Texte :</TD><TD><textarea name="texte" rows="6" cols="50"><?=$texte?></textarea></TD></TR>
  <TR><TD align=right>Date de début :</TD><TD><table cellpadding="0" cellspacing="0" align="left"><tr><td valign="middle"><INPUT TYPE="text" size="10" name="date_debut" maxlength="250" value="<?=$date_debut?>" readonly="readonly">
<script language="JavaScript" type="text/javascript">
function exampleCallback_ISO1(date, month, year){
    if (String(month).length == 1) {
        month = '0' + month;
    }
    if (String(date).length == 1) {
        date = '0' + date;
    }
    document.form.date_debut.value = date + '/' + month + '/' + year;
}
calendar1 = new dynCalendar('calendar1', 'exampleCallback_ISO1', 'calendrier/');
calendar1.setMonthCombo(true);
calendar1.setYearCombo(true);  
</script>
</td></tr></table></TD></TR>
  <TR><TD align=right>Date de fin :</TD><TD><table cellpadding="0" cellspacing="0" align="left"><tr><td valign="middle"><INPUT TYPE="text" size="10" name="date_fin" maxlength="250" value="<?=$date_fin?>" readonly="readonly">
<script language="JavaScript" type="text/javascript">
function exampleCallback_ISO2(date, month, year){
    if (String(month).length == 1) {
        month = '0' + month;
    }
    if (String(date).length == 1) {
        date = '0' + date;
    }
    document.form.date_fin.value = date + '/' + month + '/' + year;
}
calendar2 = new dynCalendar('calendar2', 'exampleCallback_ISO2', 'calendrier/');
calendar2.setMonthCombo(true);
calendar2.setYearCombo(true);  
</script>
</td></tr></table></TD></TR>
  <tr><td>&nbsp;</td></tr>
  <TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  </TABLE>
  </form>


		</td>
	</tr>
</table><br>