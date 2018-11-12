<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Tarif</td></tr>
	<tr>
		<td colspan="2">
<br />

<?
$id_fiche = $_GET["fiche"];

$query_d = "SELECT * FROM fiche_minis WHERE id = '".addslashes($id_fiche)."'";
$exec_d = mysql_query($query_d) or die(mysql_error());
$data_d = mysql_fetch_assoc($exec_d);
?>

<?
/*if(isset($_POST["ok"]) && $_POST["ok"] == "1"){
	mysql_query("DELETE FROM fiche_minis_tarif WHERE fiche_minis = '".addslashes($id_fiche)."'") or die(mysql_error());
	
	for($i=0 ; $i<count($tab_tarif) ; $i++){
		for($j=5 ; $j<=10 ; $j++){
			$query = "INSERT INTO fiche_minis_tarif (fiche_minis, nom, duree, tarif) VALUES ('".addslashes($id_fiche)."', '".addslashes($tab_tarif[$i])."', '".$j."', '".addslashes($_POST[$i."_".$j."_tarif"])."')";
			mysql_query($query) or die(mysql_error());
		}
		$query = "INSERT INTO fiche_minis_tarif (fiche_minis, nom, duree, tarif) VALUES ('".addslashes($id_fiche)."', '".addslashes($tab_tarif[$i])."', '0', '".addslashes($_POST[$i."_joursup"])."')";
		mysql_query($query) or die(mysql_error());
	}
	
	mysql_query("UPDATE fiche_minis SET tarif_nbjour_min = '".addslashes($_POST["tarif_nbjour_min"])."', tarif_nbjour_max = '".addslashes($_POST["tarif_nbjour_max"])."' WHERE id = '".addslashes($id_fiche)."'") or die(mysql_error());
	
	echo "<script>document.location.href='admin.php?action=tarif_minis&fiche=".$id_fiche."';</script>";
	exit();
}*/
?>

<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer ce tarif ?")) {
  document.location.href='tarif_minis-sup.php?n='+id;
 }
}
</script>

<a href="admin.php?action=fiche_minis">Retour fiches</a><br /><br />
<?=stripslashes($data_d["nom"])?> - <?=stripslashes($data_d["soustitre"])?><br /><br />


<table border="0" align="center" width="98%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Zone</th>
    <th class="cellule_basdroite">Hébergement</th>
    <th class="cellule_basdroite">Tarif</th>
</tr>

<form name="form" action="" method="post">
<input type="hidden" name="ok" value="1" />
<?
$query = "SELECT fmt.*, z.nom as zone, hm.nom as hebergement FROM fiche_minis_tarif fmt INNER JOIN zone z ON fmt.rid_zone = z.id_zone INNER JOIN hebergement_minis2 hm ON fmt.rid_hebergement = hm.id WHERE 1";
if($id_fiche != ""){
	$query .= " AND rid_fiche_minis = '".addslashes($id_fiche)."'";
}
$query .= " ORDER BY fmt.rid_zone, fmt.rid_hebergement";
//echo $query."<br>";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
	$tarif_jour = $data["tarif"];
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
		<td class="cellule_basdroite"><?=stripslashes($data["zone"])?></td>
		<td class="cellule_basdroite"><?=stripslashes($data["hebergement"])?></td>
		<td class="cellule_basdroite"><b><?=$tarif_jour?></b> €</td>
	</tr>
	<?
}
?>

<? /*<tr><td colspan="8" align="center" class="cellule_basdroite">nb PC minimum : <input type="text" name="tarif_nbjour_min" size="5" value="<?=$data["tarif_nbjour_min"]?>" /><br />nb PC maximum : <input type="text" name="tarif_nbjour_max" size="5" value="<?=$data["tarif_nbjour_max"]?>" /></td></tr>
<tr><td colspan="8" align="center" class="cellule_basdroite"><br /><input type="submit" value="Modifier" class="bouton" /><br /><br /></td></tr>*/ ?>
</form>

</table><br />


		</td>
	</tr>
</table><br>