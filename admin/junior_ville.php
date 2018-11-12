<form action="admin.php" method="get" name="tri">
<input type="hidden" name="action" value="junior_ville" />

<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td colspan="2">Recherche</td></tr>
	<tr><td valign="top">
    
	<table>
        <tr>
			<td>Pays :</td>
			<td>
				<select name="pays" onchange="document.tri.submit()" class="contenu">
					<option value="">- - -</option>
					<?
					$query = "SELECT * FROM junior_pays ORDER BY nom";
					$exec = mysql_query($query) or die(mysql_error());
					while($row = mysql_fetch_array($exec)) {
						echo "<option value='".$row['id']."'";
						if(isset($_GET["pays"]) && $_GET["pays"] == $row['id'])
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
	<tr class="titre2"><td>Villes</td><td align="right"><a href="admin.php?action=junior_villeAjouter" style="color:#FFFFFF">Ajouter une ville</a></td></tr>
	<tr>
		<td colspan="2">
<br />


<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer cette ville ?")) {
  document.location.href='junior_ville-sup.php?n='+id;
 }
}
</script>


<table border="0" align="center" width="95%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">Nom</th>
    <th class="cellule_basdroite">Pays</th>
    <th width="100" colspan="2" class="cellule_basdroite">Actions</th>
</tr>


<?
$plus_link = "";

if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 0;

$query = "SELECT v.*, p.nom as pays FROM junior_ville v LEFT OUTER JOIN junior_pays p ON v.pays = p.id WHERE 1";
if(isset($_GET["pays"]) && $_GET["pays"] != ""){
	$query .= " AND v.pays = '".addslashes($_GET["pays"])."'";
	$plus_link .= "&pays=".$_GET["pays"];
}
$query .= " ORDER BY v.nom";
$exec = mysql_query($query) or die(mysql_error());

$nb = mysql_num_rows(mysql_query($query));

while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><?=stripslashes($row['nom'])?></td>
	<td class="cellule_basdroite"><?=stripslashes($row['pays'])?>&nbsp;</td>
	<td class="cellule_basdroite"><a href="admin.php?action=junior_villeModif&id=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
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
	echo ($i==$page ? "<b>".($i+1)."</b>" : "<a href='admin.php?action=junior_ville&page=$i".$plus_link."'>".($i+1)."</a>");
}
?>
</p>


		</td>
	</tr>
</table><br>