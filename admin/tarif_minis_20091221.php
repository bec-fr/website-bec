<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Tarif</td></tr>
	<tr>
		<td colspan="2">
<br />

<?
$tab_tarif = array("Tarif A", "Tarif B", "Tarif C", "Tarif D", "Tarif E", "Tarif F", "Tarif G", "Tarif ST");

if(isset($_POST["ok"]) && $_POST["ok"] == "1"){
	mysql_query("DELETE FROM fiche_minis_tarif WHERE fiche_minis = '".addslashes($_GET["fiche"])."'") or die(mysql_error());
	
	for($i=0 ; $i<count($tab_tarif) ; $i++){
		$query = "INSERT INTO fiche_minis_tarif (fiche_minis, nom, 5_jour, 6_jour, 7_jour, 8_jour, 9_jour, 10_jour, jour_sup) VALUES ('".addslashes($_GET["fiche"])."', '".addslashes($tab_tarif[$i])."', '".addslashes($_POST["5_jour"][$i])."', '".addslashes($_POST["6_jour"][$i])."', '".addslashes($_POST["7_jour"][$i])."', '".addslashes($_POST["8_jour"][$i])."', '".addslashes($_POST["9_jour"][$i])."', '".addslashes($_POST["10_jour"][$i])."', '".addslashes($_POST["jour_sup"][$i])."')";
		mysql_query($query) or die(mysql_error());
	}
	
	mysql_query("UPDATE fiche_minis SET tarif_nbjour_min = '".addslashes($_POST["tarif_nbjour_min"])."', tarif_nbjour_max = '".addslashes($_POST["tarif_nbjour_max"])."' WHERE id = '".addslashes($_GET["fiche"])."'") or die(mysql_error());
	
	echo "<script>document.location.href='admin.php?action=tarif_minis&fiche=".$_GET["fiche"]."';</script>";
}
?>

<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer ce tarif ?")) {
  document.location.href='tarif_minis-sup.php?n='+id;
 }
}
</script>

<a href="admin.php?action=fiche_minis">Retour fiches</a><br /><br />


<table border="0" align="center" width="98%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Tarifs</th>
    <th class="cellule_basdroite">5 jours</th>
    <th class="cellule_basdroite">6 jours</th>
    <th class="cellule_basdroite">7 jours</th>
    <th class="cellule_basdroite">8 jours</th>
    <th class="cellule_basdroite">9 jours</th>
    <th class="cellule_basdroite">10 jours</th>
    <th class="cellule_basdroite">Journée sup.</th>
</tr>

<?
$query = "SELECT * FROM fiche_minis WHERE id = '".addslashes($_GET["fiche"])."'";
$exec = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_assoc($exec);
?>

<form name="form" action="" method="post">
<input type="hidden" name="ok" value="1" />
<?
for($i=0 ; $i<count($tab_tarif) ; $i++){
	$query2 = "SELECT * FROM fiche_minis_tarif WHERE fiche_minis = '".addslashes($_GET["fiche"])."' AND nom = '".$tab_tarif[$i]."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);
?>
<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=$tab_tarif[$i]?></td>
	<td class="cellule_basdroite"><input type="text" name="5_jour[]" size="5" value="<?=$data2["5_jour"]?>" /> €</td>
    <td class="cellule_basdroite"><input type="text" name="6_jour[]" size="5" value="<?=$data2["6_jour"]?>" /> €</td>
    <td class="cellule_basdroite"><input type="text" name="7_jour[]" size="5" value="<?=$data2["7_jour"]?>" /> €</td>
    <td class="cellule_basdroite"><input type="text" name="8_jour[]" size="5" value="<?=$data2["8_jour"]?>" /> €</td>
    <td class="cellule_basdroite"><input type="text" name="9_jour[]" size="5" value="<?=$data2["9_jour"]?>" /> €</td>
    <td class="cellule_basdroite"><input type="text" name="10_jour[]" size="5" value="<?=$data2["10_jour"]?>" /> €</td>
    <td class="cellule_basdroite"><input type="text" name="jour_sup[]" size="5" value="<?=$data2["jour_sup"]?>" /> €</td>
</tr>
<? } ?>

<tr><td colspan="8" align="center" class="cellule_basdroite">jour minimum : <input type="text" name="tarif_nbjour_min" size="5" value="<?=$data["tarif_nbjour_min"]?>" /><br />jour maximum : <input type="text" name="tarif_nbjour_max" size="5" value="<?=$data["tarif_nbjour_max"]?>" /></td></tr>
<tr><td colspan="8" align="center" class="cellule_basdroite"><br /><input type="submit" value="Modifier" class="bouton" /><br /><br /></td></tr>
</form>

</table><br />

<?
if(isset($_POST["ok_tarif"]) && $_POST["ok_tarif"] == "1"){
	$pourcentage = $_POST["pourcentage"]/100+1;
	$tarif = $_POST["tarif"];
	for($i=5 ; $i<=10 ; $i++){
		$query = "UPDATE fiche_minis_tarif SET ".$i."_jour = ROUND(".$i."_jour*".$pourcentage.") WHERE fiche_minis = '".addslashes($_GET["fiche"])."' AND ".$i."_jour <> 0";
		if($tarif != ""){
			$query .= " AND nom = '".addslashes($_POST["tarif"])."'";
		}
		//echo $query."<br>";
		mysql_query($query) or die(mysql_error());
	}
	
	//jour sup
	$query = "UPDATE fiche_minis_tarif SET jour_sup = ROUND(jour_sup*".$pourcentage.") WHERE fiche_minis = '".addslashes($_GET["fiche"])."' AND jour_sup <> 0";
	if($tarif != ""){
		$query .= " AND nom = '".addslashes($_POST["tarif"])."'";
	}
	mysql_query($query) or die(mysql_error());
	
	echo "<script>document.location.href='admin.php?action=tarif_minis&fiche=".$_GET["fiche"]."';</script>";
}
?>

<form name="form_tarif" method="post" enctype="multipart/form-data" action="">
<input type="hidden" name="ok_tarif" value="1" />
<table align="center" width="98%" style="border:#000 1px solid;">
<tr><td>Modifier les tarifs</td></tr>
<tr><td>Indiquez le pourcentage et cliquez sur "envoyer". Cela modifiera tous les tarifs de la fiche sélectionnée.<br />Si vous sélectionnez un tarif, cela ne modifiera que les tarifs de la zone choisie.</td></tr>
<tr height="5"><td></td></tr>
<tr><td>Pourcentage : <input type="texte" name="pourcentage" size="2" /> %</td></tr>
<tr><td>Zone : <select name="tarif"><option value="">- - -</option>
<?
for($i=0 ; $i<count($tab_tarif) ; $i++){
	echo "<option value='".$tab_tarif[$i]."'>".$tab_tarif[$i]."</option>";
}
?>
</select></td></tr>
<tr><td><input type="submit" value="modifier" /></td></tr>
</table>
</form>
<br />


		</td>
	</tr>
</table><br>