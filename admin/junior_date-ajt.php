<link rel="stylesheet" type="text/css" href="./calendrier/calendrier.css" />
<script language='JavaScript' src='calendrier/browserSniffer.js'></script>
<script language='JavaScript' src='calendrier/dynCalendar.js'></script>

<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr>
		<td class="titre2">Date - <? echo (isset($_GET['id'])? "Modification" : "Ajout"); ?></td>
	</tr>
	<tr>
		<td>
<br>

<?
// Si le formulaire a été envoyé
if(isset($_POST['nom']) && $_POST['nom'] != ""){
	$nom = $_POST['nom'];
	$stock = $_POST['stock'];
	$stock_initial = $_POST['stock_initial'];
	//$stock_initial_old = $_POST['stock_initial_old'];
	$date_debut = explode("/", $_POST['date_debut']);
	$date_debut = $date_debut[2]."-".$date_debut[1]."-".$date_debut[0];
	$date_fin = explode("/", $_POST['date_fin']);
	$date_fin = $date_fin[2]."-".$date_fin[1]."-".$date_fin[0];
	$afficher = $_POST['afficher'];
	$tarif = $_POST['tarif'];
	$rid_option_transport = $_POST['rid_option_transport'];
	$avion_tarif2 = $_POST['avion_tarif2'];
	
	if(isset($_GET['id'])){
		$requete = "UPDATE fiche_junior_date SET nom='".addslashes($nom)."', stock='".addslashes($stock)."', stock_initial='".addslashes($stock_initial)."', date_debut='".addslashes($date_debut)."', date_fin='".addslashes($date_fin)."', afficher='".addslashes($afficher)."', tarif='".addslashes($tarif)."', rid_option_transport1='".addslashes($rid_option_transport[0])."', rid_option_transport2='".addslashes($rid_option_transport[1])."', rid_option_transport3='".addslashes($rid_option_transport[2])."', avion_tarif2='".addslashes($avion_tarif2)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
		$id = $_GET['id'];
	}else{
		$requete = "INSERT INTO fiche_junior_date (rid_fiche, nom, stock, stock_initial, date_debut, date_fin, afficher, tarif, rid_option_transport1, rid_option_transport2, rid_option_transport3, avion_tarif2) VALUES ('".addslashes($_GET['fiche'])."', '".addslashes($nom)."', '".addslashes($stock)."', '".addslashes($stock_initial)."', '".addslashes($date_debut)."', '".addslashes($date_fin)."', '".addslashes($afficher)."', '".addslashes($tarif)."', '".addslashes($rid_option_transport1)."', '".addslashes($rid_option_transport2)."', '".addslashes($rid_option_transport3)."', '".addslashes($avion_tarif2)."')";
		mysql_query($requete) or die(mysql_error());
		$id = mysql_insert_id();
	}
	
	//echo $requete;
	
	mysql_query("DELETE FROM junior_date_transport WHERE rid_date = '".addslashes($id)."'") or die(mysql_error());
	for($i=1 ; $i<=3 ; $i++){
		$rid_option = $_POST["option_transport_liste_".$i];
		for($j=0 ; $j<count($rid_option) ; $j++){
			$query2 = "INSERT INTO junior_date_transport (rid_date, num_transport, rid_option) VALUES ('".addslashes($id)."', '".$i."', '".addslashes($rid_option[$j])."')";
			mysql_query($query2) or die(mysql_error());
		}
	}
	
	//mis à jour du stock si changement du stock initial
	/*if($stock_initial != $stock_initial_old){
		$requete = "UPDATE fiche_junior_date SET stock='".addslashes($stock_initial)."' WHERE id = '".addslashes($_GET['id'])."'";
		mysql_query($requete) or die(mysql_error());
	}*/
	
	if(isset($_GET['url_retour']) && $_GET['url_retour']!=""){
		echo "<script>document.location.href='".$_GET['url_retour']."';</script>";
	}else{
		echo "<script>document.location.href='admin.php?action=junior_date&fiche=".$_GET['fiche']."';</script>";
	}
}else{ 
	$id = "";
	$nom = "";
	$stock = "";
	$stock_initial = "";
	$date_debut = "";
	$date_fin = "";
	$afficher = "1";
	$tarif = "";
	$avion_tarif2 = "";
	
	$rid_option_transport = array();
	
	if(isset($_GET['id'])){
		$requete = "SELECT * FROM fiche_junior_date WHERE id = '".addslashes($_GET['id'])."'";
		$result = mysql_query($requete) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		$id = $_GET['id'];
		$nom = htmlentities(stripslashes($row['nom']));
		$stock = stripslashes($row['stock']);
		$stock_initial = stripslashes($row['stock_initial']);
		$date_debut = parseDate($row['date_debut']);
		$date_fin = parseDate($row['date_fin']);
		$afficher = stripslashes($row['afficher']);
		$tarif = stripslashes($row['tarif']);
		$avion_tarif2 = stripslashes($row['avion_tarif2']);
		
		for($i=1 ; $i<=3 ; $i++){
			$rid_option_transport[$i] = stripslashes($row['rid_option_transport'.$i]);
		}
	}
}
?>

  <FORM name="form" ENCTYPE="multipart/form-data" ACTION="" METHOD="POST">
  <input type="hidden" name="stock_initial_old" value="<?=$stock_initial?>" />
  <TABLE BORDER=0 class=contenu> 
  <TR><TD align=right>Nom (date) :</TD><TD><INPUT TYPE="text" size="50" name="nom" maxlength="250" value="<?=$nom?>"></TD></TR>
  <TR><TD align=right>Tarif :</TD><TD><INPUT TYPE="text" size="10" name="tarif" maxlength="250" value="<?=$tarif?>"> €</TD></TR>
  <TR><TD align="right">Taxe d'aéroport :</TD><TD><INPUT TYPE="text" size="5" name="avion_tarif2" maxlength="250" value="<?=$avion_tarif2?>"> € &nbsp;&nbsp; taxes d'aéroports et surcharge carburant</TD></TR>
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
  <TR><TD align=right>Stock :</TD><TD><INPUT TYPE="text" size="5" name="stock" maxlength="250" value="<?=$stock?>"></TD></TR>
  <TR><TD align=right>Stock initial :</TD><TD><INPUT TYPE="text" size="5" name="stock_initial" maxlength="250" value="<?=$stock_initial?>"></TD></TR>
  <tr align=right><td>Afficher :</td><td align="left"><INPUT TYPE="radio" name="afficher" value="1" <?=(($afficher == "1") ? " checked" : "")?>> oui <INPUT TYPE="radio" name="afficher" value="0" <?=(($afficher == "0") ? " checked" : "")?>> non</td></tr>
  <tr><td>&nbsp;</td></tr>
  <TR><TD align=right>Option transport :</TD><TD></TD></TR>
  <? for($i=1 ; $i<=3 ; $i++){ ?>
  <TR><TD align=right valign="top">Transport N°<?=$i?> :</TD><TD><select name="rid_option_transport[]" style="width:500px;"><option value="">- - -</option>
  <?
  $query2 = "SELECT * FROM junior_option_transport ORDER BY nom";
  $exec2 = mysql_query($query2) or die(mysql_error());
  while($data2 = mysql_fetch_assoc($exec2)){
	  ?>
      <option value="<?=$data2["id"]?>" <?=((isset($rid_option_transport[$i]) && $rid_option_transport[$i] == $data2["id"]) ? " selected" : "")?>><?=stripslashes($data2["nom"])?> - <?=parsePrix($data2["prix"])?> €</option>
      <?
  }
  ?>
  </select>
  <br />
  <select name="option_transport_liste_<?=$i?>[]" multiple="multiple" size="6">
  <?
  $query2 = "SELECT * FROM option_transport_liste ORDER BY id";
  $exec2 = mysql_query($query2) or die(mysql_error());
  while($data2 = mysql_fetch_assoc($exec2)){
	  ?>
      <option value="<?=$data2["id"]?>" <?=((mysql_num_rows(mysql_query("SELECT * FROM junior_date_transport WHERE rid_date = '".$id."' AND num_transport = '".$i."' AND rid_option = '".$data2["id"]."'")) > 0) ? " selected" : "")?>><?=stripslashes($data2["nom_admin"])?> | <?=stripslashes($data2["nom"])?></option>
      <?
  }
  ?>
  <option value=""></option></select>
  </TD></TR>
  <? } ?>
  <tr><td>&nbsp;</td></tr>
  <TR><TD></TD><TD><INPUT TYPE="submit" value=<? echo (isset($_GET['id'])? "Modifier" : "Ajouter"); ?> class="bouton"></TD></TR>
  </TABLE>
  </form>


		</td>
	</tr>
</table><br>