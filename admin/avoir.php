<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Avoir / réduc</td><td align="right"><a href="admin.php?action=avoirAjouter" style="color:#FFFFFF">Ajouter un avoir</a></td></tr>
	<tr>
		<td colspan="2">
<br />


<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer cet avoir ?")) {
  document.location.href='avoir-sup.php?n='+id;
 }
}
</script>


<table border="0" align="center" width="98%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Code</th>
    <th class="cellule_basdroite">Avoir</th>
    <th class="cellule_basdroite">Période</th>
    <th class="cellule_basdroite">Séjour</th>
    <th width="100" colspan="2" class="cellule_basdroite">Actions</th>
</tr>


<?

$query = "SELECT a.*, fj.nom as fiche FROM avoir a LEFT OUTER JOIN fiche_junior fj ON a.rid_fiche = fj.id ORDER BY date_fin desc";
$req = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($req)){
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['code'])?></td>
	<td class="cellule_basdroite"><?=(stripslashes($row['avoir'])==0 ? stripslashes($row['pourc'])." %" : stripslashes($row['avoir'])." €")?></td>
	<td class="cellule_basdroite"><?=parseDate($row['date_debut'])." au ".parseDate($row['date_fin'])?></td>
    <td class="cellule_basdroite"><?=stripslashes($row['fiche'])?></td>
	<td class="cellule_basdroite"><a href="admin.php?action=avoirModif&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
	<td class="cellule_basdroite"><a href="javascript:sup('<?=$row[0]?>');"><img src="../adminImg/poubelle.gif" border="0" /></a></td>
	</tr>
	<?
}
?>

</table><br />


		</td>
	</tr>
</table><br>