<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Devis</td></tr>
	<tr>
		<td>
<br />


<div align="center"><input type="button" value="Exporter" onclick="window.open('devis-export.php', '')" class="bouton" /></div><br />


<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer ce devis ?")) {
  document.location.href='devis-sup.php?n='+id;
 }
}
</script>


<table border="0" align="center" width="99%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Nom</th>
    <th class="cellule_basdroite">Adresse</th>
    <th class="cellule_basdroite">Tél</th>
    <th class="cellule_basdroite">Mail</th>
    <th class="cellule_basdroite">Date</th>
    <th class="cellule_basdroite">Vu</th>
    <th width="100" colspan="2" class="cellule_basdroite">Actions</th>
</tr>


<?
$plus_link = "";

if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 0;

$query = "SELECT * FROM devis WHERE 1";
$nb = mysql_num_rows(mysql_query($query));
$query .= " ORDER BY id DESC";
$query .= " LIMIT ".($page*50).",50";
$exec = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['nom'])?> <?=stripslashes($row['prenom'])?></td>
	<td class="cellule_basdroite"><?=stripslashes($row['adresse'])?> <?=stripslashes($row['cp'])?> <?=stripslashes($row['ville'])?></td>
    <td class="cellule_basdroite"><?=stripslashes($row['tel'])?>&nbsp;</td>
    <td class="cellule_basdroite"><a href="mailto:<?=stripslashes($row['mail'])?>"><?=substr(stripslashes($row['mail']), 0, 20)?></a>&nbsp;</td>
    <td class="cellule_basdroite"><?=parseDate($row['datetime'])?>&nbsp;</td>
    <td class="cellule_basdroite"><img src="../adminImg/<?=(($row["vu"] == "1") ? "true" : "false")?>.gif" /></td>
	<td class="cellule_basdroite"><a href="admin.php?action=devisModif&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
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
	echo ($i==$page ? "<b>".($i+1)."</b>" : "<a href='admin.php?action=devis&page=$i".$plus_link."'>".($i+1)."</a>");
}
?>
</p>


		</td>
	</tr>
</table><br>