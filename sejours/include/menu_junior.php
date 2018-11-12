<table cellpadding="0" cellspacing="0">
<tr>
  <td><img src="/images/destinations_junior.jpg" /></td>
</tr>
<?
$query = "SELECT * FROM junior_pays WHERE 1 ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
	?>
	<tr>
	  <td><a href="/sejours-linguistiques-adolescents-<?=url_rewrite(trim(strtolower(stripslashes($data["nom"]))))?>,<?=$data["id"]?>.html" title="Séjours linguistiques <?=stripslashes($data["nom"])?>" class="tabJaune"><strong><span class="texteJauneClair">[ </span></strong><?=stripslashes($data["nom"])?></a></td>
	</tr>
	<?
}
?>
<tr>
  <td><img src="/images/basMenuGauche_junior.jpg" /></td>
</tr>
</table>
<br />

<? include("/include/bloc_photo.php"); ?>