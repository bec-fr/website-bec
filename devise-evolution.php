<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Devises et taux de change - evolution</td><td align="right"><a href="" onClick="javascript:window.history.go(-1)"> <input value=" Retour" align="right"class="bouton"></a></td></tr>
	<tr>
		<td colspan="2">
<br />
<? setlocale(LC_ALL, 'fr');
?>

<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer cette monnaie ?")) {
  document.location.href='devise-sup.php?n='+id;
 }
}
</script>


<table border="0" align="center" width="95%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Date debut</th>
    <th class="cellule_basdroite">Date fin</th>
	<th class="cellule_basdroite">Taux </th>
 
</tr>


<?

$query = "SELECT * FROM devise_evolution de WHERE de.id_devise = '".addslashes($_GET['id'])."' ORDER BY de.date_fin DESC LIMIT 20";
$exec = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td align="right" class="cellule_basdroite"><? echo strftime('%a %d %b %Y',  strtotime($row['date_debut']));?></td>	
	<td align="right" class="cellule_basdroite"> <? echo strftime('%a %d %b %Y',  strtotime($row['date_fin']));?></td>
	<td class="cellule_basdroite"><?=stripslashes($row['taux'])?>&nbsp;</td>
	
	</tr>
	<?
}
?>

</table><br />


		</td>
	</tr>
</table><br>