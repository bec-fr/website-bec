<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Fiches junior</td><td align="right"><a href="admin.php?action=fiche_juniorAjouter" style="color:#FFFFFF">Ajouter une fiche</a></td></tr>
	<tr>
		<td colspan="2">
<br />


<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer cette fiche ?")) {
  document.location.href='fiche_junior-sup.php?n='+id;
 }
}
function dupliquer(id, url_retour) {
 if (confirm("Etes-vous sûr de vouloir dupliquer cette fiche ?")) {
  document.location.href='fiche_junior-dupliquer.php?n='+id+'&url_retour='+encodeURIComponent(url_retour);
 }
}
</script>


<table border="0" align="center" width="98%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Nom</th>
    <th class="cellule_basdroite">Pays</th>
    <th class="cellule_basdroite">Ville</th>
    <th class="cellule_basdroite">Date</th>
    <th class="cellule_basdroite">Programme</th>
    <th class="cellule_basdroite">Aff</th>
    <th width="100" colspan="4" class="cellule_basdroite">Actions</th>
</tr>


<?
$plus_link = "";

if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 0;

$query = "SELECT fj.*, p.nom as pays, v.nom as ville FROM fiche_junior fj LEFT OUTER JOIN junior_pays p ON fj.pays = p.id LEFT OUTER JOIN junior_ville v ON fj.ville = v.id ORDER BY p.nom, v.nom";

$nb = mysql_num_rows(mysql_query($query));
$query .= " LIMIT ".($page*50).",50";

$exec = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['nom'])?></td>
    <td class="cellule_basdroite"><?=stripslashes($row['pays'])?></td>
	<td class="cellule_basdroite"><?=stripslashes($row['ville'])?></td>
    <td class="cellule_basdroite"><a href="admin.php?action=junior_date&fiche=<?=$row[0]?>">gérer</a></td>
    <td class="cellule_basdroite"><a href="admin.php?action=programme_juniorModif&id=<?=$row[0]?>">gérer</a></td>
    <td class="cellule_basdroite"><img src="../adminImg/<?=(($row["afficher"] == "1") ? "true" : "false")?>.gif" border="0" /></td>
	<td class="cellule_basdroite"><a href="admin.php?action=image_juniorModif&id=<?=$row[0]?>&url_retour=<?=urlencode("admin.php?action=fiche_junior&page=".$page.$plus_link)?>"><img src="../adminImg/image.gif" width="25" border="0" /></a></td>
    <td class="cellule_basdroite"><a href="admin.php?action=fiche_juniorModif&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
    <td class="cellule_basdroite"><a href="javascript:dupliquer('<?=$row[0]?>', '<?=urlencode(basename($_SERVER['REQUEST_URI']))?>');" title="Dupliquer"><img src="../adminImg/dupliquer.gif" border="0" /></a></td>
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
	echo ($i==$page ? "<b>".($i+1)."</b>" : "<a href='admin.php?action=fiche_junior&page=$i".$plus_link."'>".($i+1)."</a>");
}
?>
</p>


		</td>
	</tr>
</table><br>