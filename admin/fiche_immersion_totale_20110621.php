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
    <th class="cellule_basdroite">Nom</th>
    <th class="cellule_basdroite">Pays</th>
    <th class="cellule_basdroite">Ville</th>
    <th class="cellule_basdroite">Formules</th>
    <th class="cellule_basdroite">Tarifs</th>
    <th class="cellule_basdroite">Sup.</th>
    <th width="100" colspan="3" class="cellule_basdroite">Actions</th>
</tr>


<?
$plus_link = "";

if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 0;

$query = "SELECT fit.*, p.nom as pays, v.nom as ville FROM fiche_immersion_totale fit LEFT OUTER JOIN immersion_totale_pays p ON fit.pays = p.id LEFT OUTER JOIN immersion_totale_ville v ON fit.ville = v.id ORDER BY p.nom, v.nom";
$exec = mysql_query($query) or die(mysql_error());

$nb = mysql_num_rows(mysql_query($query));

while($row = mysql_fetch_array($exec))
{
	$query2 = "SELECT f.nom FROM fiche_immersion_totale_formule fitf, formule_immersion_totale f WHERE fitf.fiche_immersion_totale = '".$row[0]."' AND fitf.formule = f.id";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$tab_formule = array();
	while($data2 = mysql_fetch_row($exec2)){
		$tab_formule[] = $data2[0];
	}
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['nom'])?></td>
    <td class="cellule_basdroite"><?=stripslashes($row['pays'])?></td>
	<td class="cellule_basdroite"><?=stripslashes($row['ville'])?></td>
    <td class="cellule_basdroite"><?=implode(", ", $tab_formule)?></td>
    <td class="cellule_basdroite"><a href="admin.php?action=tarif&fiche=<?=$row[0]?>">Tarifs</a></td>
    <td class="cellule_basdroite"><a href="admin.php?action=supplement&fiche=<?=$row[0]?>">Sup.</a></td>
	<td class="cellule_basdroite"><a href="admin.php?action=imageModif&id=<?=$row[0]?>&url_retour=<?=urlencode("admin.php?action=fiche_immersion_totale&page=".$page.$plus_link)?>"><img src="../adminImg/image.gif" width="25" border="0" /></a></td>
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