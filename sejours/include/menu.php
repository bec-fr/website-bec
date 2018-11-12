<table cellpadding="0" cellspacing="0">
<tr>
  <td><img src="/images/destinations.jpg" /></td>
</tr>
<?
$query = "SELECT * FROM pays WHERE 1 ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
	?>
	<tr>
	  <td><a href="/sejours-linguistiques-etudiants-adultes-<?=url_rewrite(trim(strtolower(stripslashes($data["nom"]))))?>,<?=$data["id"]?>.html" class="tabViolet" title="Séjours linguistiques <?=stripslashes($data["nom"])?>"><strong><span class="texteRose">[ </span></strong><?=stripslashes($data["nom"])?></a></td>
	</tr>
	<?
}
?>
<tr>
  <td><img src="/images/basMenuGauche.jpg" /></td>
</tr>
</table>
<br />

<? include("/include/bloc_photo.php"); ?>