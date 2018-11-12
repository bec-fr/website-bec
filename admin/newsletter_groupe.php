<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Groupes</td><td align="right"><a href="admin.php?action=newsletter_groupeAjouter" style="color:#FFFFFF">Ajouter un groupe</a></td></tr>
	<tr>
		<td colspan="2">
<br />


<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer ce groupe ?")) {
  document.location.href='newsletter_groupe-sup.php?n='+id;
 }
}
</script>


Ne pas supprimer les groupes que sont "Inscrits Admin", "Inscrits Site" et "Test".<br /><br />


<table border="0" align="center" width="98%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Nom</th>
    <th width="100" colspan="2" class="cellule_basdroite">Actions</th>
</tr>


<?
$query = "SELECT * FROM mailing_groupe ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['nom'])?></td>
	<td class="cellule_basdroite"><a href="admin.php?action=newsletter_groupeModif&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
	<td class="cellule_basdroite"><a href="javascript:sup('<?=$row[0]?>');"><img src="../adminImg/poubelle.gif" border="0" /></a></td>
	</tr>
	<?
}
?>

</table><br />


		</td>
	</tr>
</table><br>