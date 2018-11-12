<? include("connect.php"); ?>
<? $query_d = "SELECT fj.*, p.nom as pays, v.nom as ville, p.id as idpays, v.id as idville FROM fiche_junior fj INNER JOIN junior_pays p ON fj.pays = p.id INNER JOIN junior_ville v ON fj.ville = v.id WHERE fj.id = '".addslashes($_GET["fiche"])."'";
$exec_d = mysql_query($query_d) or die(mysql_error());
if(mysql_num_rows($exec_d) == 0){
	echo "<script>document.location.href='index_junior.php';</script>";
	exit();
}
$data_d = mysql_fetch_assoc($exec_d);

/*if(strpos($_SERVER['REQUEST_URI'],"fiche")!=false){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: sejour-linguistique-adolescent-".url_rewrite(trim(strtolower(stripslashes($data_d["nom"])))).",".$data_d["id"].".html");
	exit();
}*/

//age
$query2 = "SELECT MIN(age_mini) FROM fiche_junior_classe fjc, classe c WHERE fjc.fiche_junior = '".$data_d["id"]."' AND fjc.classe = c.id";
$exec2 = mysql_query($query2) or die(mysql_error());
$data2 = mysql_fetch_row($exec2);
$age = $data2[0];
$query2 = "SELECT MAX(age_maxi) FROM fiche_junior_classe fjc, classe c WHERE fjc.fiche_junior = '".$data_d["id"]."' AND fjc.classe = c.id";
$exec2 = mysql_query($query2) or die(mysql_error());
$data2 = mysql_fetch_row($exec2);
$age .= "-".$data2[0]." ans";

$fil_ariane .= "<a href='sejours-linguistiques-pour-adolescents.html' class='texteBleu'>Séjour linguistique</a>";
$fil_ariane .= " / <a href='sejours-linguistiques-adolescents-".url_rewrite(trim(strtolower(stripslashes($data_d["pays"])))).",".$data_d["idpays"].".html' class='texteBleu'>".stripslashes($data_d["pays"])."</a>";
$fil_ariane .= " / <a href='sejour-linguistique-adolescent-".url_rewrite(trim(strtolower(stripslashes($data_d["nom"])))).",".$data_d["id"].".html' class='texteBleu'>".stripslashes($data_d["nom"])."</a>";
$title="Séjour linguistique pour adolescent ".stripslashes($data_d["nom"])." - Stage et job ".stripslashes($data_d["nom"]);

if(file_exists("imagesUp/fiche_junior/".$data_d["id"]."-1_m2.jpg")){
	$image_head = $url_site."/imagesUp/fiche_junior/".$data_d["id"]."-1_m2.jpg";
}

$pays_swf = $data_d["idpays"];

if($data_d["idpays"] != "0"){
	$_GET["pays"] = $data_d["idpays"];
}
if($data_d["idville"] != "0"){
	$_GET["ville"] = $data_d["idville"];
}
?>
<? include("haut.php"); ?>

<script type="text/javascript">

//tab_class = ["onglet_sejour", "onglet_hebergement", "onglet_transport", "onglet_programme", "onglet_info_utile", "onglet_info_tarif", "onglet_galerie", "onglet_info_utile", "onglet_info_utile"];

function aff_bloc(num){
	for(i=1 ; i<=9 ; i++){
		if(document.getElementById('bloc_' + i) && document.getElementById('lien_menu_' + i)){
			cache('bloc_' + i);
			document.getElementById("lien_menu_" + i).className = "onglet_defaut";
		}
	}
	aff('bloc_' + num);
	document.getElementById("lien_menu_" + num).className = "onglet_defaut_actif";
	
	barre_onglet();
}


var tab_indice_max;
var tab_indice_cours;

<?
$nb=0;
for($i=1 ; $i<=10 ; $i++){
	if(file_exists("imagesUp/fiche_junior/".$data_d["id"]."-".$i."_m_d.jpg")){
		$nb++;
	}
}
?>
tab_indice_max = <?=$nb?>;
tab_indice_cours = 0;


function move_left(){
	//alert(tab_indice_cours);
	if(tab_indice_cours > 0){
		$("#lesimages").animate({marginLeft: "+=80px"}, "slow", function(){
			tab_indice_cours--;
		});
	}
}
function move_right(){
	//alert(tab_indice_cours + " - " + tab_indice_max);
	if(tab_indice_cours+4 < tab_indice_max){
		$("#lesimages").animate({marginLeft: "-=80px"}, "slow", function(){
			tab_indice_cours++;
		});
	}
}

function aff_img_l(num){
	//alert("plop" + num);
	for(i=1 ; i<=10 ; i++){
		if(document.getElementById("img_l_" + i)){
			document.getElementById("img_l_" + i).style.display = "none";
		}
	}
	document.getElementById("img_l_" + num).style.display = "";
}
function aff_img_l2(num){
	//alert("plop" + num);
	for(i=1 ; i<=10 ; i++){
		if(document.getElementById("img_l2_" + i)){
			document.getElementById("img_l2_" + i).style.display = "none";
		}
	}
	document.getElementById("img_l2_" + num).style.display = "";
}

function barre_onglet(){
	var scrolltop2 = $(document).scrollTop();
	
	if(scrolltop2 > 416){
		document.getElementById("bloc_onglet_tmp").style.display = "";
		document.getElementById("bloc_onglet").style.position = "fixed";
		document.getElementById("bloc_onglet").style.top = "0px";
	}else if(scrolltop2 <= 416){
		document.getElementById("bloc_onglet_tmp").style.display = "none";
		document.getElementById("bloc_onglet").style.position = "static";
		document.getElementById("bloc_onglet").style.top = "auto";
	}
}

$(window).scroll(function(){
	barre_onglet();
});

</script>


                        <div class="zone_contenu" style="border-bottom:1px solid #f2f2f2; margin-bottom:3px;">
                          <div style="float:left;" class="titreJaune"><strong><?=stripslashes($data_d["nom"])?></strong></div>
                          <div style="float:right;" class="titreJaune"><a href="#" onClick="history.back();"><img src="images/btn_retour_jaune.gif" width="68" height="22" border="0" /></a></div>
                        </div>
                        
                        <div class="clear"></div>
                        
                        <div id="bloc_onglet_tmp" style="height:47px; display:none;"></div>
                        <div class="zone_contenu" id="bloc_onglet" style="position: static; top: auto; display:block;">
                        	<a href="#" id="lien_menu_1" onClick="aff_bloc('1'); return false;" class="onglet_defaut_actif">présentation</a><a href="#" id="lien_menu_3" onClick="aff_bloc('3'); return false;" class="onglet_defaut">Transport</a><a href="#" id="lien_menu_2" onClick="aff_bloc('2'); return false;" class="onglet_defaut">Hébergement</a><a href="#" id="lien_menu_8" onClick="aff_bloc('8'); return false;" class="onglet_defaut">Cours</a><a href="#" id="lien_menu_4" onClick="aff_bloc('4'); return false;" class="onglet_defaut">Programme</a><a href="#" id="lien_menu_6" onClick="aff_bloc('6'); return false;" class="onglet_defaut">Info tarif</a><a href="#" id="lien_menu_9" onClick="aff_bloc('9'); return false;" class="onglet_defaut">Inscription</a><div class="clear"></div>
                        </div>
                        
                        <div class="clear"></div>
                        
                        
                        <!-- bloc séjour -->
                        <div id="bloc_1" style="display:;">
                        
                        <? /*<div class="zone_contenu">
                   	    	<div><img src="images/masque_visu_junior_panorama.png" width="762" height="170" style="position:absolute;" />
                            <?
							for($i=1 ; $i<=10 ; $i++){
								if(file_exists("imagesUp/fiche_junior/".$data_d["id"]."-".$i."_l_d.jpg")){
									?>
                                    <img src="imagesUp/fiche_junior/<?=$data_d["id"]?>-<?=$i?>_l_d.jpg" id="img_l_<?=$i?>" width="762" height="170" style="display:<?=(($i==1) ? "" : "none")?>;" />
                                    <?
								}
							}
							?>
                            </div>
                            <div style="background:url(images/ombre_visu_junior_panorama.png); width:762px; height:18px;"></div>
                            
                            <div>
                            <a href="#" style="float:left;" onclick="move_left(); return false;"><img src="images/visu_junior_panorama_fleche_g.gif" width="17" height="50" border="0" /></a>
                            <div class="lst_images">
                                <div id="lesimages" class="all_images">
                                    <? for($i=1 ; $i<=10 ; $i++){ ?>
                                    <? if(file_exists("imagesUp/fiche_junior/".$data_d["id"]."-".$i."_m_d.jpg")){ ?>
                                    <a href="#" onclick="aff_img_l('<?=$i?>'); return false;"><img src="imagesUp/fiche_junior/<?=$data_d["id"]?>-<?=$i?>_m_d.jpg" width="68" height="50" border="0" class="vignette_diapo" /></a>
                                    <? } ?>
                                    <? } ?>
                                </div>
                            </div>
                            <a href="#" style="float:left;" onclick="move_right(); return false;"><img src="images/visu_junior_panorama_fleche_d.gif" width="17" height="50" border="0" /></a>
                            </div>
                        </div>*/ ?>
                        
                        <? include("fiche_junior_blochaut2_test.php") ?>
                        
                        <div class="zone_contenu" style="margin-top:5px;">
                       	  <? include("fiche_junior_blocgauche_test.php") ?>
                            <div class="junior_col_contenu">
                              <div class="texteGris" style="text-align:justify;"><?=nl2br(stripslashes($data_d["description"]))?></div>
                              <br />
                              <table width="546" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="546"><img src="images/haut_tableau.gif" width="546" height="7" /></td>
                                </tr>
                                <tr>
                                  <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="542" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;"><a name="3" id="32"></a>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="93%"><img src="images/tableau_titre_date.gif" width="160" height="24" /></td>
                                                <td width="7%" align="center" class="texteNoir"></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_ombre_sous_titre.gif" width="542" height="11" /></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="98%" border="0" align="center" cellpadding="4" cellspacing="2" class="texteGris">
                                    <?
									$query_date = "SELECT * FROM fiche_junior_date WHERE rid_fiche = '".addslashes($_GET["fiche"])."' AND afficher = '1' ORDER BY id";
									//echo $query_date."<br>";
									$exec_date = mysql_query($query_date) or die(mysql_error());
									while($data_date = mysql_fetch_assoc($exec_date)){
										?>
										<tr>
										  <td width="141" align="left" valign="top" bgcolor="#edf6fb" class="txt_12" style="padding-top:8px;"><img src="images/fiche_junior_fleche_bleu.png" width="6" height="9" /> <strong>
									      <?=stripslashes($data_date["nom"])?>
                                          
                                          </strong></td>
										  <td width="96" align="left" valign="top" bgcolor="#edf6fb" class="titreJaune"><? if($data_date["tarif"] != "0"){ ?>
                                          <img src="images/fiche_junior_fleche_bleu.png" width="6" height="9" /> <strong>
                                          <?=parsePrix($data_date["tarif"])?> 
                                          €
                                          <? } ?></strong></td>
										  <td width="128" align="center" valign="top" bgcolor="#edf6fb">
                                          <? if($data_date["stock"] > 0){ ?>
                                          <a href="devis_junior.php?fiche=<?=$_GET["fiche"]?>&date=<?=$data_date["id"]?>"><img src="images/btn_mettre_une_option.png" alt="mettre une option" border="0" /></a>
                                          <? } ?>
                                          </td>
                                          <td width="128" align="center" valign="top" bgcolor="#edf6fb">
                                          <? if($data_date["stock"] > 0){ ?>
                                          <a href="junior_reserver_sejour_test.php?fiche=<?=$_GET["fiche"]?>&date=<?=$data_date["id"]?>"><img src="images/fiche_junior_btn_reserver_sejour.png" border="0" /></a>
                                          <? } ?>
                                          <? if($data_date["stock"] <= 0){ ?>
                                          <b>COMPLET</b>
                                          <? }elseif($data_date["stock"] <= 5){ ?>
                                          <br />plus que <?=$data_date["stock"]?> places disponibles
                                          <? } ?>
                                          </td>
										</tr>
										<?
									}
									?>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                </tr>
                              </table>
<br />
                            </div>
                        </div>
                        
                        </div>
                        <!-- fin bloc séjour -->
                        
                        <!-- bloc hébergement -->
                        <div id="bloc_2" style="display:none;">
                        
                        <? include("fiche_junior_blochaut_test.php") ?>
                        
                        <div class="zone_contenu" style="margin-top:5px;">
                       	  <? include("fiche_junior_blocgauche_test.php") ?>
                            <div class="junior_col_contenu">
                              <table width="546" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="546"><img src="images/haut_tableau.gif" width="546" height="7" /></td>
                                </tr>
                                <tr>
                                  <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="542" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;"><a name="3" id="3"></a>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="93%"><img src="images/tableau_titre_hebergement.gif" /></td>
                                                <td width="7%" align="center" class="texteNoir"></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_ombre_sous_titre.gif" width="542" height="11" /></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                   
                                    <tr>
                                      <td colspan="2" align="left" class="texteGris">
									  <?
                                      for($i=1 ; $i<=5 ; $i++){
										  if($data_d["hebergement_nom".$i] != ""){
										  ?>
                                          <span class="texteJaune"><strong><?=stripslashes($data_d["hebergement_nom".$i])?> :</strong></span><br /><span class="texteGris"><?=nl2br(stripslashes($data_d["hebergement_texte".$i]))?></span><br /><br />
										  <?
                                          }
                                      }
									  ?>
                                      </td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                </tr>
                              </table>
<br />
                            </div>
                            
                            <div class="junior_col_contenu">
                              <table width="546" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="546"><img src="images/haut_tableau.gif" width="546" height="7" /></td>
                                </tr>
                                <tr>
                                  <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="542" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="93%"><img src="images/tableau_titre_options.gif" alt="options" /></td>
                                                <td width="7%" align="center" class="texteNoir"></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_ombre_sous_titre.gif" width="542" height="11" /></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                   
                                    <tr>
                                      <td colspan="2" align="left" class="texteGris">
									  <?
                                      for($i=1 ; $i<=5 ; $i++){
										  if($data_d["option_type".$i] == "hébergement" && $data_d["option_nom".$i] != ""){
											  ?>
                                              <span class="texteJaune"><strong><?=stripslashes($data_d["option_nom".$i])?> :</strong></span><br /><span class="texteGris"><?=nl2br(stripslashes($data_d["option_texte".$i]))?></span><br /><br />
											  <?
                                          }
                                      }
									  ?>
                                      </td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                </tr>
                              </table>
<br />
                            </div>
                            
                        </div>
                        
                        </div>
                        <!-- fin bloc hébergement -->
                        
                        <!-- bloc transport -->
                        <div id="bloc_3" style="display:none;">
                        
                        <? include("fiche_junior_blochaut_test.php") ?>
                        
                        <div class="zone_contenu" style="margin-top:5px;">
                       	  <? include("fiche_junior_blocgauche_test.php") ?>
                            <div class="junior_col_contenu">
                              <table width="546" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="546"><img src="images/haut_tableau.gif" width="546" height="7" /></td>
                                </tr>
                                <tr>
                                  <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="542" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="93%"><img src="images/tableau_titre_transport.gif" alt="transport" /></td>
                                                <td width="7%" align="center" class="texteNoir"></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_ombre_sous_titre.gif" width="542" height="11" /></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                   
                                    <tr>
                                      <td colspan="2" align="left" class="texteGris"><?=nl2br(stripslashes($data_d["transport"]))?></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                </tr>
                              </table>
<br />
                            </div>
                            
                            <div class="junior_col_contenu">
                              <table width="546" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="546"><img src="images/haut_tableau.gif" width="546" height="7" /></td>
                                </tr>
                                <tr>
                                  <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="542" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="93%"><img src="images/tableau_titre_options.gif" alt="options" /></td>
                                                <td width="7%" align="center" class="texteNoir"></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_ombre_sous_titre.gif" width="542" height="11" /></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                   
                                    <tr>
                                      <td colspan="2" align="left" class="texteGris">
									  <?
                                      for($i=1 ; $i<=5 ; $i++){
										  if($data_d["option_type".$i] == "transport" && $data_d["option_nom".$i] != ""){
											  ?>
                                              <span class="texteJaune"><strong><?=stripslashes($data_d["option_nom".$i])?> :</strong></span><br /><span class="texteGris"><?=nl2br(stripslashes($data_d["option_texte".$i]))?></span><br /><br />
											  <?
                                          }
                                      }
									  ?>
                                      </td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                </tr>
                              </table>
<br />
                            </div>
                        </div>
                        
                        </div>
                        <!-- fin bloc transport -->
                        
                        <!-- bloc programme -->
                        <div id="bloc_4" style="display:none;">
                        
                        <? include("fiche_junior_blochaut_test.php") ?>
                        
                        <div class="zone_contenu">
                        <br />
                          <table width="762" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="546"><img src="images/haut_tableau.gif" width="762" height="7" /></td>
                            </tr>
                            <tr>
                              <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="762" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="542" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="93%"><img src="images/tableau_titre_programmetype.gif" /></td>
                                            <td width="7%" align="center" class="texteNoir"></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                                <tr>
                                  <td><img src="images/tableau_ombre_sous_titre.gif" width="762" height="11" /></td>
                                </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td align="center">
                              	<?
								$query2 = "SELECT * FROM junior_programme WHERE fiche_junior = '".$data_d["id"]."'";
								$exec2 = mysql_query($query2) or die(mysql_error());
								$data2 = mysql_fetch_assoc($exec2);
								?>
                                <table width="100%" border="0" cellpadding="3" cellspacing="1">
                                <? for($i=1 ; $i<=3 ; $i++){ ?>
								<? if($i!=3 || $data2["num3_j1_1"] != ""){ ?>
                                    <tr align="center">
                                      <td width="20" class="tabCell_droite">&nbsp;</td>
                                      <td width="185" class="tabCell_droite">&nbsp;</td>
                                      <td bgcolor="#E7F3FA" class="texteGris tabCell_droite_bleu"><?=stripslashes($data2["jour1"])?></td>
                                      <td bgcolor="#E7F3FA" class="texteGris tabCell_droite_bleu"><?=stripslashes($data2["jour2"])?></td>
                                      <td bgcolor="#E7F3FA" class="texteGris tabCell_droite_bleu"><?=stripslashes($data2["jour3"])?></td>
                                      <td bgcolor="#E7F3FA" class="texteGris tabCell_droite_bleu"><?=stripslashes($data2["jour4"])?></td>
                                      <td bgcolor="#E7F3FA" class="texteGris tabCell_droite_bleu"><?=stripslashes($data2["jour5"])?></td>
                                      <td bgcolor="#E7F3FA" class="texteGris tabCell_droite_bleu"><?=stripslashes($data2["jour6"])?></td>
                                      <td bgcolor="#E7F3FA" class="texteGris tabCell_droite_bleu"><?=stripslashes($data2["jour7"])?></td>
                                    </tr>
                                    <tr><td rowspan="3" bgcolor="#E7F3FA" class="tabCell_gauche">
                                      <img src="images/sem<?=$i?>.gif" width="19" height="66" /></td>
                                    <? for($h=1 ; $h<=3 ; $h++){ ?>
                                        <?=(($h!=1) ? "<tr>" : "")?>
                                        <td align="center" height="100" class="tabCell_gauche_bleu texteBleu"><?=(($h==1) ? "MATIN" : (($h==2) ? "APRES<br>MIDI" : "SOIR"))?></td>
                                        <? for($j=1 ; $j<=7 ; $j++){ ?>
                                        <?
										$rowspan = "";
										if($h==1){
											$query_rowspan = "SELECT fiche_junior FROM junior_programme WHERE fiche_junior = '".$data_d["id"]."' AND txt".$i."_j".$j."_".($h+1)." = '' AND txt".$i."_j".$j."_".($h+2)." = ''";
											//echo $query_rowspan;
											$exec_rowspan = mysql_query($query_rowspan) or die(mysql_error());
											if(mysql_num_rows($exec_rowspan) > 0){
												$rowspan = "3";
											}else{
												$query_rowspan = "SELECT fiche_junior FROM junior_programme WHERE fiche_junior = '".$data_d["id"]."' AND txt".$i."_j".$j."_".($h+1)." = ''";
												//echo $query_rowspan;
												$exec_rowspan = mysql_query($query_rowspan) or die(mysql_error());
												if(mysql_num_rows($exec_rowspan) > 0){
													$rowspan = "2";
												}
											}
										}
										$no_col = "";
										if($h==2){
											$query_rowspan = "SELECT fiche_junior FROM junior_programme WHERE fiche_junior = '".$data_d["id"]."' AND txt".$i."_j".$j."_".($h+1)." = ''";
											//echo $query_rowspan;
											$exec_rowspan = mysql_query($query_rowspan) or die(mysql_error());
											if(mysql_num_rows($exec_rowspan) > 0){
												$rowspan = "2";
											}
											
											$query_col = "SELECT fiche_junior FROM junior_programme WHERE fiche_junior = '".$data_d["id"]."' AND (txt".$i."_j".$j."_".($h-1)." <> '' OR txt".$i."_j".$j."_".($h-1)." = '') AND txt".$i."_j".$j."_".$h." = ''";
											//echo $query_col;
											$exec_col = mysql_query($query_col) or die(mysql_error());
											if(mysql_num_rows($exec_col) > 0){
												$no_col = "ok";
											}
										}
										if($h==3){
											$query_col = "SELECT fiche_junior FROM junior_programme WHERE fiche_junior = '".$data_d["id"]."' AND (txt".$i."_j".$j."_".($h-1)." <> '' OR (txt".$i."_j".$j."_".($h-2)." <> '' OR txt".$i."_j".$j."_".($h-2)." = '')) AND txt".$i."_j".$j."_".$h." = ''";
											//echo $query_col;
											$exec_col = mysql_query($query_col) or die(mysql_error());
											if(mysql_num_rows($exec_col) > 0){
												$no_col = "ok";
											}
										}
										$query_picto = "SELECT * FROM picto_programme WHERE id = '".$data2["num".$i."_j".$j."_".$h]."'";
										$exec_picto = mysql_query($query_picto) or die(mysql_error());
										$data_picto = mysql_fetch_assoc($exec_picto);
										
										if($no_col != "ok"){
										?>
                                        <td align="center" <?=(($rowspan != "") ? " rowspan='".$rowspan."'" : "")?> valign="middle" width="100" class="tabCell_gauche_bleu texteGris">
                                        <? if($data2["num".$i."_j".$j."_".$h] != ""){ ?>
                                        <img src="images/picto_programme/<?=$data_picto["fichier"]?>" alt="" title="<?=stripslashes($data_picto["nom"])?>" width="69" height="69" /><br /><?=stripslashes($data2["txt".$i."_j".$j."_".$h])?>
                                        <? } ?>
                                        </td>
                                        <? } ?>
                                        <? } ?>
                                        <?=(($h!=1) ? "</tr>" : "")?>
                                    <? } ?>
                                    </tr>
                                    <tr><td height="20"></td></tr>
                                <? } ?>
                                <? } ?>
                              </table></td>
                            </tr>
                            <tr>
                              <td><img src="images/tableau_bas.gif" width="762" height="7" /></td>
                            </tr>
                          </table>
                          <br />
                        </div>
                        
                        </div>
                        <!-- fin bloc programme -->
                        
                        <!-- bloc infos -->
                        <div id="bloc_5" style="display:none;">
                        
                        <? include("fiche_junior_blochaut_test.php") ?>
                        
                        <div class="zone_contenu" style="margin-top:5px;">
                       	  <? include("fiche_junior_blocgauche_test.php") ?>
                            <div class="junior_col_contenu">
                              <table width="546" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="546"><img src="images/haut_tableau.gif" width="546" height="7" /></td>
                                </tr>
                                <tr>
                                  <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="542" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="93%"><img src="images/tableau_titre_infos_utiles.gif" alt="infos utiles" /></td>
                                                <td width="7%" align="center" class="texteNoir"></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_ombre_sous_titre.gif" width="542" height="11" /></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                   
                                    <tr>
                                      <td colspan="2" align="left" class="texteGris"><?=stripslashes($data_d["infos_utiles"])?></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                </tr>
                              </table>
<br />
                            </div>
                        </div>
                        
                        </div>
                        <!-- fin bloc infos -->
                        
                        <!-- bloc tarif -->
                        <div id="bloc_6" style="display:none;">
                        
                        <? include("fiche_junior_blochaut_test.php") ?>
                        
                        <div class="zone_contenu" style="margin-top:5px;">
                       	  <? include("fiche_junior_blocgauche_test.php") ?>
                            <div class="junior_col_contenu">
                              <table width="546" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="546"><img src="images/haut_tableau.gif" width="546" height="7" /></td>
                                </tr>
                                <tr>
                                  <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="542" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="93%"><img src="images/tableau_titre_info_tarifs.gif" alt="info tarif" /></td>
                                                <td width="7%" align="center" class="texteNoir"></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_ombre_sous_titre.gif" width="542" height="11" /></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                   
                                    <tr>
                                      <td colspan="2" align="left" class="texteGris">Le prix comprend :<br /><?=nl2br(stripslashes($data_d["prix_tout_compris"]))?></td>
                                    </tr>
                                    <tr><td height="10"></td></tr>
                                    <tr>
                                      <td colspan="2" align="left" class="texteGris">Le prix ne comprend pas :<br /><?=nl2br(stripslashes($data_d["prix_non_compris"]))?></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                </tr>
                              </table>
<br />
                            </div>
                            
                            <?
							$aff_option = false;
                            for($i=1 ; $i<=5 ; $i++){
								if($data_d["option_type".$i] == "activité" && $data_d["option_nom".$i] != "" && $data_d["option_prix".$i] != "0"){
									$aff_option = true;
								}
							}
							?>
                            <? if($aff_option == true){ ?>
                            <div class="junior_col_contenu">
                              <table width="546" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="546"><img src="images/haut_tableau.gif" width="546" height="7" /></td>
                                </tr>
                                <tr>
                                  <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="542" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="93%"><img src="images/tableau_titre_options.gif" alt="options" /></td>
                                                <td width="7%" align="center" class="texteNoir"></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_ombre_sous_titre.gif" width="542" height="11" /></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                   
                                    <tr>
                                      <td colspan="2" align="left" class="texteGris">
									  <?
                                      for($i=1 ; $i<=5 ; $i++){
										  if($data_d["option_type".$i] == "activité" && $data_d["option_nom".$i] != "" && $data_d["option_prix".$i] != "0"){
											  ?>
                                              <span class="texteJaune"><strong><?=stripslashes($data_d["option_nom".$i])?></strong> (<?=stripslashes($data_d["option_type".$i])?>) : </span><br /><span class="texteGris"><?=nl2br(stripslashes($data_d["option_texte".$i]))?></span><br /><br />
											  <?
                                          }
                                      }
									  ?>
                                      </td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                </tr>
                              </table>
<br />
                            </div>
                            <? } ?>
                        </div>
                        
                        </div>
                        <!-- fin bloc tarif -->
                        
                        <!-- bloc galerie -->
                        <div id="bloc_7" style="display:none;">
                        
                        <? include("fiche_junior_blochaut_test.php") ?>
                        
                        <div class="zone_contenu" style="margin-top:5px;">
                       	  <table width="760" height="700" align="center" border="0">
                          <tr>
                          <td width="760" height="510" align="center" valign="top">
                          <?
							for($i=1 ; $i<=10 ; $i++){
								if(file_exists("imagesUp/fiche_junior/".$data_d["id"]."-".$i.".jpg")){
									$size = getimagesize("imagesUp/fiche_junior/".$data_d['id']."-".$i.".jpg");  
									$diff = "";
									$width = $size[0];
									$height = $size[1];
									if($width > 760){
										$diff = $size[0] / 760;
										$width = $size[0] / $diff;
										$height = $size[1] / $diff;
									}
									if($height > 500){
										$diff = $height / 500;
										$height = $height / $diff;
										$width = $width / $diff;
									}
									?>
                                    <img src="imagesUp/fiche_junior/<?=$data_d["id"]?>-<?=$i?>.jpg" id="img_l2_<?=$i?>" width="<?=$width?>" height="<?=$height?>" style="display:<?=(($i==1) ? "" : "none")?>;" />
                                    <?
								}
							}
							?>
                          </td>
                          </tr>
                          <tr><td height="15"></td></tr>
                          <tr><td>
                          	<table border="0" cellpadding="0" cellspacing="0">
                            
							<? for($i=1 ; $i<=10 ; $i++){ ?>
                            <?
							if(($i-1)%5 == 0){
								?><tr><?
							}
							?>
							<? if(file_exists("imagesUp/fiche_junior/".$data_d["id"]."-".$i."_m.jpg")){ ?>
                            <td valign="bottom"><a href="#" onClick="aff_img_l2('<?=$i?>'); return false;"><img src="imagesUp/fiche_junior/<?=$data_d["id"]?>-<?=$i?>_m.jpg" width="140" border="0" class="vignette_diapo" style="margin-bottom:10px;" /></a></td>
                            <? } ?>
                            <?
							if(($i)%5 == 0){
								?></tr><?
							}
							?>
                            <? } ?>
                            </table>
                          </td></tr>
                          </table>
                        </div>
                        
                        </div>
                        <!-- fin bloc galerie -->
                        
                        <!-- bloc infos -->
                        <div id="bloc_8" style="display:none;">
                        
                        <? include("fiche_junior_blochaut_test.php") ?>
                        
                        <div class="zone_contenu" style="margin-top:5px;">
                       	  <? include("fiche_junior_blocgauche_test.php") ?>
                            <div class="junior_col_contenu">
                              <table width="546" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="546"><img src="images/haut_tableau.gif" width="546" height="7" /></td>
                                </tr>
                                <tr>
                                  <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="542" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="93%" style="padding-left:10px; font-size:18px" class="texteBleu">Cours</td>
                                                <td width="7%" align="center" class="texteNoir"></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_ombre_sous_titre.gif" width="542" height="11" /></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                   
                                    <tr>
                                      <td colspan="2" align="left" class="texteGris"><?=nl2br(stripslashes($data_d["cours"]))?></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                </tr>
                              </table>
<br />
                            </div>
                        </div>
                        
                        </div>
                        <!-- fin bloc infos -->
                        
                        <!-- bloc inscription -->
                        <div id="bloc_9" style="display:none;">
                        
                        <? include("fiche_junior_blochaut_test.php") ?>
                        
                        <div class="zone_contenu" style="margin-top:5px;">
                       	  <? include("fiche_junior_blocgauche_test.php") ?>
                            <div class="junior_col_contenu">
                              <table width="546" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="546"><img src="images/haut_tableau.gif" width="546" height="7" /></td>
                                </tr>
                                <tr>
                                  <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="542" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;"><a name="3" id="32"></a>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="93%"><img src="images/tableau_titre_date.gif" width="160" height="24" /></td>
                                                <td width="7%" align="center" class="texteNoir"></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_ombre_sous_titre.gif" width="542" height="11" /></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="98%" border="0" align="center" cellpadding="4" cellspacing="2" class="texteGris">
                                    <?
									$query_date = "SELECT * FROM fiche_junior_date WHERE rid_fiche = '".addslashes($_GET["fiche"])."' AND afficher = '1' ORDER BY id";
									//echo $query_date."<br>";
									$exec_date = mysql_query($query_date) or die(mysql_error());
									while($data_date = mysql_fetch_assoc($exec_date)){
										?>
										<tr>
										  <td width="141" align="left" valign="top" bgcolor="#edf6fb" class="txt_12" style="padding-top:8px;"><img src="images/fiche_junior_fleche_bleu.png" width="6" height="9" /> <strong>
									      <?=stripslashes($data_date["nom"])?>
                                          
                                          </strong></td>
										  <td width="96" align="left" valign="top" bgcolor="#edf6fb" class="titreJaune"><? if($data_date["tarif"] != "0"){ ?>
                                          <img src="images/fiche_junior_fleche_bleu.png" width="6" height="9" /> <strong>
                                          <?=parsePrix($data_date["tarif"])?> 
                                          €
                                          <? } ?></strong></td>
										  <td width="128" align="center" valign="top" bgcolor="#edf6fb">
                                          <? if($data_date["stock"] > 0){ ?>
                                          <a href="devis_junior.php?fiche=<?=$_GET["fiche"]?>&date=<?=$data_date["id"]?>"><img src="images/btn_mettre_une_option.png" alt="mettre une option" border="0" /></a>
                                          <? } ?>
                                          </td>
                                          <td width="128" align="center" valign="top" bgcolor="#edf6fb">
                                          <? if($data_date["stock"] > 0){ ?>
                                          <a href="junior_reserver_sejour_test.php?fiche=<?=$_GET["fiche"]?>&date=<?=$data_date["id"]?>"><img src="images/fiche_junior_btn_reserver_sejour.png" border="0" /></a>
                                          <? } ?>
                                          <? if($data_date["stock"] <= 0){ ?>
                                          <b>COMPLET</b>
                                          <? }elseif($data_date["stock"] <= 5){ ?>
                                          <br />plus que <?=$data_date["stock"]?> places disponibles
                                          <? } ?>
                                          </td>
										</tr>
										<?
									}
									?>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                </tr>
                              </table>
<br />
                            </div>
                        </div>
                        
                        </div>
                        <!-- fin bloc inscription -->
                        
                      </td>
                    </tr>
                  </table></td>
                <td width="195" valign="top"><? include("droite_junior.php"); ?></td>
              </tr>
            </table>

<? include("bas.php"); ?>