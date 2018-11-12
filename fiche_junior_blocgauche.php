<?
$tab_prix = array();
$tab_prix[] = $data_d["tarif"];
$query2 = "SELECT tarif FROM fiche_junior_date WHERE rid_fiche = '".$data_d["id"]."' AND tarif > '0'";
$exec2 = mysql_query($query2) or die(mysql_error());
while($data2 = mysql_fetch_row($exec2)){
	$tab_prix[] = $data2[0];
}
$prix_apartirde = min($tab_prix);
?>

<div class="junior_col_gauche">
<? if($nom_fic == "junior_reserver_sejour.php" || $nom_fic == "junior_reserver_sejour2.php"){ ?>
<div align="center">
<span class="txt_20 coul_gris_fonce"><?=mb_strtoupper(stripslashes($data_d["pays"]))?></span><br />
<span class="texteBleu txt_15"><strong><?=stripslashes($data_d["ville"])?></strong></span><br />
</div>
<img src="images/carte_junior_p_<?=$data_d["idville"]?>.jpg" width="214" height="195" />
<? } ?>
<? if($nom_fic == "fiche_junior.php" || $nom_fic == "fiche_junior2.php"){ ?>
<div class="titreJaune junior_col_gauche_contenu"> <div style="width:100px; float:left;"><fb:like send="false" layout="button_count" width="100" show_faces="false"></fb:like></div>
<div style="width:70px; float:right;"><g:plusone size="medium"></g:plusone></div></div>
<? } ?>
<div class="texteBleu txt_15 titre_junior_col_g"><strong>tarif</strong></div>
<div class="titreJaune junior_col_gauche_contenu"><span style="font-size:12px">&agrave; partir de </span><strong><?=parsePrix($prix_apartirde)?> &euro;</strong></div>
<div class="junior_col_gauche_contenu texteGris">
	<a href="#" onclick="return false;" onmouseover="aff('info_tarif<?=$bloc?>');" onmouseout="cache('info_tarif<?=$bloc?>');" class="lienGris2">Le prix comprend</a><div id="info_tarif<?=$bloc?>" align="justify" style="position:absolute; padding:10px; background-color:#FAFAFA; width:400px; margin-left:10px; margin-top:0px; border:#ed7902 2px solid; display:none;" onmouseout="cache('info_tarif');"><?=nl2br(stripslashes($data_d["prix_tout_compris"]))?></div><br />
    <a href="#" onclick="return false;" onmouseover="aff('info_tarif2<?=$bloc?>');" onmouseout="cache('info_tarif2<?=$bloc?>');" class="lienGris2">Le prix ne comprend pas</a><div id="info_tarif2<?=$bloc?>" align="justify" style="position:absolute; padding:10px; background-color:#FAFAFA; width:400px; margin-left:10px; margin-top:0px; border:#ed7902 2px solid; display:none;" onmouseout="cache('info_tarif2');"><?=nl2br(stripslashes($data_d["prix_non_compris"]))?></div>
</div>
<div class="texteBleu txt_15 titre_junior_col_g"><strong>formule</strong></div>
<div class="junior_col_gauche_contenu texteGris">
<?
$query2 = "SELECT f.nom, f.description FROM fiche_junior_formule fjf, formule_junior f WHERE fiche_junior = '".$data_d["id"]."' AND fjf.formule = f.id";
$exec2 = mysql_query($query2) or die(mysql_error());
$tab = array();
$i=1;
while($data2 = mysql_fetch_row($exec2)){
    $tab[] = "<a href='#' onclick='return false;' onmouseover='aff(\"formule_".$i.$bloc."\");' onmouseout='cache(\"formule_".$i.$bloc."\");' class='lienGris2'>".stripslashes($data2[0])."</a><div id='formule_".$i.$bloc."' align='justify' style='position:absolute; padding:10px; background-color:#FAFAFA; width:400px; margin-left:10px; margin-top:0px; border:#ed7902 2px solid; display:none;' onmouseout='cache(\"formule_".$i.$bloc."\");'>".nl2br(stripslashes($data2[1]))."</div>";
    $i++;
}
?>
<?=implode(", ", $tab)?></div>
<div class="texteBleu txt_15 titre_junior_col_g"><strong>h&eacute;bergement</strong></div>
<div class="junior_col_gauche_contenu texteGris">
<?
$query2 = "SELECT h.nom, h.description FROM fiche_junior_hebergement fjh, hebergement_junior h WHERE fiche_junior = '".$data_d["id"]."' AND fjh.hebergement = h.id";
$exec2 = mysql_query($query2) or die(mysql_error());
$tab = array();
$i=1;
while($data2 = mysql_fetch_row($exec2)){
    $tab[] = "<a href='#' onclick='return false;' onmouseover='aff(\"hebergement_".$i.$bloc."\");' onmouseout='cache(\"hebergement_".$i.$bloc."\");' class='lienGris2'>".stripslashes($data2[0])."</a><div id='hebergement_".$i.$bloc."' align='justify' style='position:absolute; padding:10px; background-color:#FAFAFA; width:400px; margin-left:10px; margin-top:0px; border:#ed7902 2px solid; display:none;' onmouseout='cache(\"hebergement_".$i.$bloc."\");'>".nl2br(stripslashes($data2[1]))."</div>";
    $i++;
}
?>
<?=implode(", ", $tab)?></div>
<div class="texteBleu txt_15 titre_junior_col_g"><strong>points forts</strong></div>
<div class="junior_col_gauche_contenu texteGris">
<?
for($i=1 ; $i<=5 ; $i++){
  if($data_d["point_fort".$i] != ""){
      ?>
      <img src="images/fiche_junior_fleche_bleu.png" width="6" height="9" /> <?=stripslashes($data_d["point_fort".$i])?><br />
      <?
  }
}
?>
</div>
</div>