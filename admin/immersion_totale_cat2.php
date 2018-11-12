<form action="admin.php" method="get" name="tri">
<input type="hidden" name="action" value="<?=$_GET["action"]?>" />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td colspan="2">Recherche</td></tr>
	<tr><td valign="top">
    
	<table>
        <tr>
			<td>Catégorie :</td>
			<td>
				<select name="rid_cat" onchange="document.tri.submit()" class="contenu">
					<option value="">- - -</option>
					<?
					$query = "SELECT * FROM immersion_totale_cat ORDER BY nom";
					$exec = mysql_query($query) or die(mysql_error());
					while($row = mysql_fetch_array($exec)) {
						echo "<option value='".$row['id']."'";
						if(isset($_GET["rid_cat"]) && $_GET["rid_cat"] == $row['id'])
							echo " selected";
						echo ">".stripslashes($row['nom'])."</option>";
					}
					?>
				</select>
			</td>
		</tr>
        <tr><td></td><td><input type="submit" value="OK" class="bouton" /></td></tr>
	</table>
    
	</td></tr>
</table>
</form><br />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Sous-catégories</td><td align="right"><a href="admin.php?action=immersion_totale_cat2Ajouter" style="color:#FFFFFF">Ajouter une sous-catégorie</a></td></tr>
	<tr>
		<td colspan="2">
<br />


<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer cette sous-catégorie ?")) {
  document.location.href='immersion_totale_cat2-sup.php?n='+id;
 }
}
</script>


<table border="0" align="center" width="95%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Nom</th>
    <th class="cellule_basdroite">Catégorie</th>
    <th width="100" colspan="2" class="cellule_basdroite">Actions</th>
</tr>


<?
$plus_link = "";

if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 0;

$query = "SELECT v.*, p.nom as cat FROM immersion_totale_cat2 v LEFT OUTER JOIN immersion_totale_cat p ON v.rid_cat = p.id WHERE 1";
if(isset($_GET["rid_cat"]) && $_GET["rid_cat"] != ""){
	$query .= " AND v.rid_cat = '".addslashes($_GET["rid_cat"])."'";
	$plus_link .= "&rid_cat=".$_GET["rid_cat"];
}
$query .= " ORDER BY v.nom";
$exec = mysql_query($query) or die(mysql_error());

$nb = mysql_num_rows(mysql_query($query));

while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['nom'])?></td>
	<td class="cellule_basdroite"><?=stripslashes($row['cat'])?>&nbsp;</td>
	<td class="cellule_basdroite"><a href="admin.php?action=immersion_totale_cat2Modif&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
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
	echo ($i==$page ? "<b>".($i+1)."</b>" : "<a href='admin.php?action=immersion_totale_ville&page=$i".$plus_link."'>".($i+1)."</a>");
}
?>
</p>


		</td>
	</tr>
</table><br>