<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Archive newsletter</td></tr>
	<tr>
		<td>
<br />

<?
$query = "SELECT * FROM mailing_archive WHERE id = '".addslashes($_GET["mail"])."'";
$exec = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($exec);

echo stripslashes($row["texte"]);
?>
<br />

		</td>
	</tr>
</table><br>