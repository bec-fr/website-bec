<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Devises et taux de change</td><td align="right"><a href="admin.php?action=deviseAjout" style="color:#FFFFFF">Ajouter une monnaie</a></td></tr>
	<tr>
		<td colspan="2">
<br />


<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer cette monnaie ?")) {
  document.location.href='devise-sup.php?n='+id;
 }
}
</script>


<table border="0" align="center" width="95%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Nom</th>
    <th class="cellule_basdroite">Symbole</th>
	<th class="cellule_basdroite">Taux actuel</th>
    <th width="100" colspan="2" class="cellule_basdroite">Action</th>
</tr>


<?
$query = "SELECT * FROM devise";
$exec = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['nom'])?></td>
	<td class="cellule_basdroite"><?=stripslashes($row['symbole'])?>&nbsp;</td>
	<td class="cellule_basdroite"><?=stripslashes($row['taux'])?>&nbsp;</td>
	<td class="cellule_basdroite"><a href="admin.php?action=deviseModif&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
	<td class="cellule_basdroite"><a href="admin.php?action=deviseEvolution&id=<?=$row[0]?>">Evolution</a></td>
	</tr>
	<?
}
?>

</table><br />


		</td>
	</tr>
</table><br>