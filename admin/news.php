<table align="center" border="0" cellpadding="2" cellspacing="0" width="95%" class="tableau">
	<tr class="titre2"><td>Actualités</td><td align="right"><a href="admin.php?action=newsAjouter" style="color:#FFFFFF">Ajouter une news</a></td></tr>
	<tr>
		<td colspan="2">
<br />


<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer cette actualité ?")) {
  document.location.href='news-sup.php?n='+id;
 }
}
</script>


<table border="0" align="center" width="95%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
	<th class="cellule_basdroite">Titre</th>
    <th class="cellule_basdroite">Contenu</th>
    <th class="cellule_basdroite">Date</th>
    <th class="cellule_basdroite">A la une</th>
    <th class="cellule_basdroite">PDF</th>
    <th width="100" colspan="2" class="cellule_basdroite">Actions</th>
</tr>


<?
$plus_link="";

if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 0;

$query = "SELECT * FROM news ORDER BY date_debut DESC";

$nb = mysql_num_rows(mysql_query($query));
$query .= " LIMIT ".($page*20).",20";

$req = mysql_query($query);

while($row = mysql_fetch_array($req))
{
  ?>
  <tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
  <td class="cellule_basdroite"><?=stripslashes($row['titre'])?></td>
  <td class="cellule_basdroite"><?=substr(stripslashes($row['des_court']), 0, 100)?></td>
  <td class="cellule_basdroite"><?=(($row['date_debut'] == $row['date_fin']) ? "le ".parseDate($row['date_debut']) : "du ".parseDate($row['date_debut'])." au ".parseDate($row['date_fin']))?></td>
  <td class="cellule_basdroite"><img src="../adminImg/<?=(($row["alaune"] == "1") ? "true" : "false")?>.gif" /></td>
  <td class="cellule_basdroite"><?=((file_exists("../imagesUp/news/".$row[0].".pdf")) ? "<a href='../imagesUp/news/".$row[0].".pdf' target='_blank'><img src='../adminImg/icone-pdf.gif' border='0' /></a>" : "&nbsp;")?></td>
  <td class="cellule_basdroite"><a href="admin.php?action=newsModif&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
  <td class="cellule_basdroite"><a href="javascript:sup('<?=$row[0]?>');"><img src="../adminImg/poubelle.gif" border="0" /></a></td>
  </tr>
  <?
}
?>

</table><br />

<p align="center">
<?
for($i=0 ; $i<ceil($nb/20) ; $i++)
{
	if($i!=0)
	{
		echo " - ";
	}
	echo ($i==$page ? "<b>".($i+1)."</b>" : "<a href='admin.php?action=news&page=$i".$plus_link."'>".($i+1)."</a>");
}
?>
</p>


		</td>
	</tr>
</table><br>