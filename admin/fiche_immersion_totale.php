<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Fiches immersion totale</td><td align="right"><a href="admin.php?action=fiche_immersion_totaleAjouter" style="color:#FFFFFF">Ajouter une fiche</a></td></tr>
	<tr>
		<td colspan="2">
<br />


<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer cette fiche ?")) {
  document.location.href='fiche_immersion_totale-sup.php?n='+id;
 }
}
</script>


<table border="0" align="center" width="98%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Cat</th>
    <th class="cellule_basdroite">Sous-cat</th>
    <th class="cellule_basdroite">Destination</th>
    <th class="cellule_basdroite">Nom</th>
    <th class="cellule_basdroite">Prix</th>
    <th width="100" colspan="2" class="cellule_basdroite">Actions</th>
</tr>


<?
$plus_link = "";

if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 0;

$query = "SELECT fit.*, p.nom as pays, c2.nom as cat2, c.nom as cat FROM fiche_immersion_totale fit LEFT OUTER JOIN immersion_totale_pays p ON fit.rid_pays = p.id LEFT OUTER JOIN immersion_totale_cat2 c2 ON fit.rid_cat2 = c2.id LEFT OUTER JOIN immersion_totale_cat c ON c2.rid_cat = c.id ORDER BY fit.nom";
$exec = mysql_query($query) or die(mysql_error());

$nb = mysql_num_rows(mysql_query($query));

while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['cat'])?></td>
    <td class="cellule_basdroite"><?=stripslashes($row['cat2'])?></td>
	<td class="cellule_basdroite"><?=stripslashes($row['pays'])?></td>
    <td class="cellule_basdroite"><?=stripslashes($row['nom'])?></td>
    <td class="cellule_basdroite"><?=stripslashes($row['prix'])?> <?=stripslashes($row['monnaie'])?></td>
    <td class="cellule_basdroite"><a href="admin.php?action=fiche_immersion_totaleModif&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
	<td class="cellule_basdroite"><a href="javascript:sup('<?=$row[0]?>');"><img src="../adminImg/poubelle.gif" border="0" /></a></td>
	</tr>
	<?
}
?>

</table><br />

<p align="center">
<?
for($i=0 ; $i<ceil($nb/50) ; $i++)
{
	if($i!=0)
	{
		echo " - ";
	}
	echo ($i==$page ? "<b>".($i+1)."</b>" : "<a href='admin.php?action=fiche_immersion_totale&page=$i".$plus_link."'>".($i+1)."</a>");
}
?>
</p>


		</td>
	</tr>
</table><br>