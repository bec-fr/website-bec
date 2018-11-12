<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>FAQ</td><td align="right"><a href="admin.php?action=faqAjouter" style="color:#FFFFFF">Ajouter une question</a></td></tr>
	<tr>
		<td colspan="2">
<br />


<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer cette question ?")) {
  document.location.href='faq-sup.php?n='+id;
 }
}
</script>


<table border="0" align="center" width="95%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Question</th>
    <th class="cellule_basdroite">Réponse</th>
    <th width="100" colspan="2" class="cellule_basdroite">Actions</th>
</tr>


<?
$query = "SELECT * FROM faq ORDER BY id";
$exec = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['question'])?></td>
	<td class="cellule_basdroite"><?=substr(stripslashes($row['reponse']), 0, 300)?></td>
	<td class="cellule_basdroite"><a href="admin.php?action=faqModif&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
	<td class="cellule_basdroite"><a href="javascript:sup('<?=$row[0]?>');"><img src="../adminImg/poubelle.gif" border="0" /></a></td>
	</tr>
	<?
}
?>

</table><br />


		</td>
	</tr>
</table><br>