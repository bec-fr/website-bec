<table cellpadding="0" cellspacing="0">
<tr>
  <td><img src="/images/destinations_minis.jpg" /></td>
</tr>
<?
$query = "SELECT * FROM minis_pays WHERE 1 ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
	?>
	<tr>
	  <td><a href="/voyages-scolaires-circuits-linguistiques-<?=url_rewrite(trim(strtolower(stripslashes($data["nom"]))))?>,<?=$data["id"]?>.html" title="Voyage scolaire <?=stripslashes($data["nom"])?>" class="tabRouge"><strong><span class="texteRougeClair">[ </span></strong><?=stripslashes($data["nom"])?></a></td>
	</tr>
	<?
}
?>
<tr>
  <td><img src="/images/basMenuGauche_minis.jpg" /></td>
</tr>
</table>
<br />

<? include("/include/bloc_photo.php"); ?>