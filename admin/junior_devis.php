<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Devis</td></tr>
	<tr>
		<td>
<br />


<div align="center"><input type="button" value="Exporter" onclick="window.open('junior_devis-export.php', '')" class="bouton" /></div><br />


<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer ce devis ?")) {
  document.location.href='junior_devis-sup.php?n='+id;
 }
}
</script>


<table border="0" align="center" width="99%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Nom</th>
    <th class="cellule_basdroite">Adresse</th>
    <th class="cellule_basdroite">Tél</th>
    <th class="cellule_basdroite">Séjour</th>
    <th class="cellule_basdroite">Date</th>
    <!--<th class="cellule_basdroite">Mail</th>-->
    <!--<th class="cellule_basdroite">Date</th>-->
    <th class="cellule_basdroite">Vu</th>
    <th width="100" colspan="2" class="cellule_basdroite">Actions</th>
</tr>


<?
$query = "SELECT d.*, fj.nom as destination FROM devis_junior d LEFT OUTER JOIN fiche_junior fj ON d.destination = fj.id ORDER BY id DESC";
$exec = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['nom'])?> <?=stripslashes($row['prenom'])?></td>
	<td class="cellule_basdroite"><?=stripslashes($row['adresse'])?> <?=stripslashes($row['cp'])?> <?=stripslashes($row['ville'])?></td>
    <td class="cellule_basdroite"><?=stripslashes($row['tel'])?>&nbsp;</td>
    <td class="cellule_basdroite"><?=stripslashes($row['destination'])?>&nbsp;</td>
    <td class="cellule_basdroite"><?=stripslashes($row['date'])?>&nbsp;</td>
    <!--<td class="cellule_basdroite"><a href="mailto:<?=stripslashes($row['mail'])?>"><?=substr(stripslashes($row['mail']), 0, 20)?></a>&nbsp;</td>-->
    <!--<td class="cellule_basdroite"><?=parseDate($row['datetime'])?>&nbsp;</td>-->
    <td class="cellule_basdroite"><img src="../adminImg/<?=(($row["vu"] == "1") ? "true" : "false")?>.gif" /></td>
	<td class="cellule_basdroite"><a href="admin.php?action=junior_devisModif&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
	<td class="cellule_basdroite"><a href="javascript:sup('<?=$row[0]?>');"><img src="../adminImg/poubelle.gif" border="0" /></a></td>
	</tr>
	<?
}
?>

</table><br />


		</td>
	</tr>
</table><br>