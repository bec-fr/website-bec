<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Archive des newsletters</td></tr>
	<tr>
		<td>
<br />


<script language="javascript">
function sup(id) {
 if (confirm("Etes-vous sûr de vouloir supprimer cette archive ?")) {
  document.location.href='newsletter_archive-sup.php?n='+id;
 }
}
</script>


<?
if(isset($_POST["ok"]) && $_POST["ok"] == "1")
{
	$nb=0;
	for($i=0 ; $i<count($_POST["lst_id"]) ; $i++)
	{
		$query = "DELETE FROM mailing_archive WHERE id = '".addslashes($_POST["lst_id"][$i])."'";
		//echo $query;
		$rep = mysql_query($query) or die(mysql_error());
		$nb += $rep;
	}
	
	echo "<script>alert('".$nb." newsletters supprimées'); document.location.href='admin.php?action=newsletter_archive';</script>";
}
?>

<form name="form" method="post" action="">
<input type="hidden" name="ok" value="1" />

<table border="0" align="center" width="98%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
	<th class="cellule_basdroite">Sujet</th>
    <th class="cellule_basdroite">Date</th>
    <th width="100" colspan="3" class="cellule_basdroite">Actions</th>
</tr>

<?
$query = "SELECT * FROM mailing_archive ORDER BY datetime DESC";
$exec = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($exec))
{
	?>
	<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite"><a href="admin.php?action=newsletter_archive_voir&mail=<?=$row['id']?>"><?=stripslashes($row['sujet'])?></a>&nbsp;</td>
	<td class="cellule_basdroite"><?=parseDate($row['datetime'])?></td>
	<td class="cellule_basdroite"><input type="checkbox" name="lst_id[]" value="<?=$row[0]?>" /></td>
	<td class="cellule_basdroite"><a href="admin.php?action=newsletterEnv&option=mod&newsletter=<?=$row[0]?>"><img src="../adminImg/crayon.gif" border="0" /></a></td>
	<td class="cellule_basdroite"><a href="javascript:sup('<?=$row[0]?>');"><img src="../adminImg/poubelle.gif" border="0" /></a></td>
	</tr>
	<?
}
?>

<tr><td colspan="2" align="right" class="cellule_basdroite"><b>Pour la sélection : </b></td><td colspan="3" align="center" class="cellule_basdroite"><input type="submit" name="submit" value="Supprimer" class="bouton" /></td></tr>

</table><br />

</form>


		</td>
	</tr>
</table><br>