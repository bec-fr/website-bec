<div class="zone_contenu">
    <div style="float:left; width:214px;"><img src="images/carte_junior_p_<?=$data_d["idville"]?>.jpg" width="214" height="195" /></div>
    <div style="float:left; width:152px; padding-right:20px;"><span class="txt_20 coul_gris_fonce"><?=mb_strtoupper(stripslashes($data_d["pays"]))?></span><br />
      <span class="texteBleu txt_15"><strong><?=stripslashes($data_d["ville"])?></strong></span><br />
    <br />
    <span class="texteJaune"><strong><?=stripslashes($data_d["niveau"])?></strong></span><span class="titreJaune"><br />
    <?=$age?></span><br />
    </div>
    		<div style="float:left; width:372px; background:#FFF; border:1px solid #f1f1f1; border-radius:8px;">
            	<div class="titre_tableau" style="width:366px;">Mémo Séjour</div><div class="clear"></div>
                <p class="texteGris" style="font-size:12px; font-weight:bold; text-align:left; padding:0 10px 0 10px;"><?=nl2br(stripslashes($data_d["rappel_formule"]))?></p>
            </div>
</div>