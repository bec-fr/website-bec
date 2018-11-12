<div class="zone_contenu">
    <div style="float:left; width:346px; padding-right:14px;">
        <div style="float:left; width:214px;"><img src="images/carte_junior_p_<?=$data_d["idville"]?>.jpg" width="214" height="195" /></div>
        <div style="float:left; width:132px;">
            <span class="txt_20 coul_gris_fonce"><?=mb_strtoupper(stripslashes($data_d["pays"]))?></span><br />
              <span class="texteBleu txt_15"><strong><?=stripslashes($data_d["ville"])?></strong></span><br />
            <br />
            <span class="texteJaune"><strong><?=stripslashes($data_d["niveau"])?></strong></span><br /><span class="titreJaune"><?=$age?></span><br />
        </div>
        <div class="clear"></div>
        <br />
        
        	<div style="float:left; width:340px; background:#FFF; border:1px solid #f1f1f1; border-radius:8px;">
            	<div class="titre_tableau" style="width:334px;">Mémo Séjour</div><div class="clear"></div>
                <p class="texteGris" style="font-size:12px; font-weight:bold; text-align:left; padding:0 10px 0 10px;"><?=nl2br(stripslashes($data_d["rappel_formule"]))?></p>
            </div>
        
    </div>
    
    <div class="texteGris" style="float:left; width:398px; margin-top:30px;">
        <?
		for($i=1 ; $i<=10 ; $i++){
			if(file_exists("imagesUp/fiche_junior/".$data_d["id"]."-".$i.".jpg")){
				?>
				<img src="imagesUp/fiche_junior/<?=$data_d["id"]?>-<?=$i?>.jpg" id="img_l_<?=$i?>" width="398" height="298" style="display:<?=(($i==1) ? "" : "none")?>;" />
				<?
			}
		}
		?>
        <div style="height:20px"></div>
        <div>
        <a href="#" style="float:left; margin-right:20px;" onclick="move_left(); return false;"><img src="images/visu_junior_panorama_fleche_g.gif" width="17" height="50" border="0" /></a>
        <div class="lst_images">
            <div id="lesimages" class="all_images">
                <? for($i=1 ; $i<=10 ; $i++){ ?>
                <? if(file_exists("imagesUp/fiche_junior/".$data_d["id"]."-".$i."_m_d.jpg")){ ?>
                <a href="#" onclick="aff_img_l('<?=$i?>'); return false;"><img src="imagesUp/fiche_junior/<?=$data_d["id"]?>-<?=$i?>_m_d.jpg" width="68" height="50" border="0" class="vignette_diapo" /></a>
                <? } ?>
                <? } ?>
            </div>
        </div>
        <a href="#" style="float:left; margin-left:20px;" onclick="move_right(); return false;"><img src="images/visu_junior_panorama_fleche_d.gif" width="17" height="50" border="0" /></a>
        </div>
    </div>
    
</div>