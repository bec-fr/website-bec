ai<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Date</td><td align="right"><a href="admin.php?action=fiche_junior" style="color:#FFFFFF">Retour fiche junior</a> - <a href="admin.php?action=junior_dateAjouter&fiche=<?=$_GET["fiche"]?>" style="color:#FFFFFF">Ajouter une date</a></td></tr>
	<tr>
		<td colspan="2">
<br />


<script language="javascript">
function sup(id, url_retour) {
 if (confirm("Etes-vous sûr de vouloir supprimer cette date ?")) {
  document.location.href='junior_date-sup.php?n='+id+'&url_retour='+encodeURIComponent(url_retour);
 }
}
</script>


<table border="0" align="center" width="95%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Nom (date)</th>
    <th class="cellule_basdroite">Tarif</th>
    <th class="cellule_basdroite">Date de début</th>
    <th class="cellule_basdroite">Date de fin</th>
    <th class="cellule_basdroite">Stock initial</th>
    <th class="cellule_basdroite">Stock</th>
    <th class="cellule_basdroite">Résa validées</th>
    <th class="cellule_basdroite">Résa en attentes</th>
    <th class="cellule_basdroite">Afficher</th>
    <th width="100" colspan="2" class="cellule_basdroite">Actions</th>
</tr>


<?
$query = "SELECT * FROM fiche_junior_date WHERE 1";
if(isset($_GET["fiche"]) && $_GET["fiche"] != ""){
	$query .= " AND rid_fiche = '".addslashes($_GET["fiche"])."'";
}
$query .= " ORDER BY id";
$exec = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['nom'])?></td>
    <td class="cellule_basdroite"><?=parsePrix($row['tarif'])?></td>
    <td class="cellule_basdroite"><?=parseDate($row['date_debut'])?></td>
    <td class="cellule_basdroite"><?=parseDate($row['date_fin'])?></td>
    <td class="cellule_basdroite"><?=$row['stock_initial']?></td>
    <td class="cellule_basdroite"><?=$row['stock']?></td>
    <td class="cellule_basdroite"><?=mysql_num_rows(mysql_query("SELECT id FROM reservation_junior WHERE rid_date = '".$row[0]."' AND paiement='1' AND saison = '7'"))?></td>
    <td class="cellule_basdroite"><?=mysql_num_rows(mysql_query("SELECT id FROM reservation_junior WHERE rid_date = '".$row[0]."' AND paiement='0' AND saison = '7'"))?></td>
    <td class="cellule_basdroite"><img src="../adminImg/<?=(($row['afficher'] == "1") ? "true" : "false")?>.gif" border="0" alt="" /></td>
	<td class="cellule_basdroite"><a href="admin.php?action=junior_dateModif&id=<?=$row[0]?>&url_retour=<?=urlencode(basename($_SERVER['REQUEST_URI']))?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
	<td class="cellule_basdroite"><a href="javascript:sup('<?=$row[0]?>', '<?=urlencode(basename($_SERVER['REQUEST_URI']))?>');"><img src="../adminImg/poubelle.gif" border="0" /></a></td>
	</tr>
	<?
}
?>

</table><br />


		</td>
	</tr>
</table><br>