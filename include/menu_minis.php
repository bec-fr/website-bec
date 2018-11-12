<table cellpadding="0" cellspacing="0">
<tr>
  <td><img src="images/destinations_minis.jpg" /></td>
</tr>
<?
$query = "SELECT * FROM minis_pays WHERE 1 AND afficher='1' ORDER BY nom";
$exec = mysql_query($query) or die(mysql_error());
while($data = mysql_fetch_assoc($exec)){
	?>
	<tr>
	  <td><a href="voyages-scolaires-circuits-linguistiques-<?=url_rewrite(trim(strtolower(stripslashes($data["nom"]))))?>,<?=$data["id"]?>.html" title="Voyage scolaire <?=stripslashes($data["nom"])?>" class="tabRouge"><strong><span class="texteRougeClair">[ </span></strong><?=stripslashes($data["nom"])?></a></td>
	</tr>
	<?
}
?>
<tr>
  <td><img src="images/basMenuGauche_minis.jpg" /></td>
</tr>
</table>
<br />

<? include("include/bloc_photo.php"); ?>
<div style="text-align:center;"><?php /*?><span class="texteBleu">Retrouvez-nous aux stands 32 & 33<br />
au Salon de l’Office.</span><br />
<br />
<a href="http://www.salon-office.com/" target="_blank"><img src="images/banniere3.jpg" width="126" height="606" border="0" /></a><br /><?php */?>
<div class="fb-like-box" data-href="http://www.facebook.com/becfrance" data-width="200" data-height="380" data-show-faces="false" data-stream="false" data-header="false"></div></div>