<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Options transport</td><td align="right"><a href="admin.php?action=junior_option_transportAjouter" style="color:#FFFFFF">Ajouter une option de transport</a></td></tr>
	<tr>
		<td colspan="2">
<br />


<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer cette option ?")) {
  document.location.href='junior_option_transport-sup.php?n='+id;
 }
}
</script>


<table border="0" align="center" width="95%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Nom</th>
    <th class="cellule_basdroite">Texte</th>
    <th class="cellule_basdroite">Prix</th>
    <th width="100" colspan="2" class="cellule_basdroite">Actions</th>
</tr>


<?
$plus_link = "";

if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 0;

$query = "SELECT * FROM junior_option_transport WHERE 1";
$query .= " ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());

$nb = mysql_num_rows(mysql_query($query));

while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['nom'])?></td>
	<td class="cellule_basdroite" align="justify"><?=nl2br(stripslashes($row['texte']))?>&nbsp;</td>
    <td class="cellule_basdroite"><?=parsePrix($row['prix'])?>&nbsp;</td>
	<td class="cellule_basdroite"><a href="admin.php?action=junior_option_transportModif&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
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
	echo ($i==$page ? "<b>".($i+1)."</b>" : "<a href='admin.php?action=junior_option_transport&page=$i".$plus_link."'>".($i+1)."</a>");
}
?>
</p>


		</td>
	</tr>
</table><br>