<? include("connect.php"); ?>
<? $query_d = "SELECT fj.*, p.nom as pays, v.nom as ville, p.id as idpays FROM fiche_junior fj INNER JOIN junior_pays p ON fj.pays = p.id INNER JOIN junior_ville v ON fj.ville = v.id WHERE fj.id = '".addslashes($_GET["fiche"])."'";
$exec_d = mysql_query($query_d) or die(mysql_error());
if(mysql_num_rows($exec_d) == 0){
	echo "<script>document.location.href='index_junior.php';</script>";
	exit();
}
$data_d = mysql_fetch_assoc($exec_d);

if(strpos($_SERVER['REQUEST_URI'],"fiche")!=false){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: sejour-linguistique-adolescent-".url_rewrite(trim(strtolower(stripslashes($data_d["nom"])))).",".$data_d["id"].".html");
	exit();
}

//age
$query2 = "SELECT MIN(age_mini) FROM fiche_junior_classe fjc, classe c WHERE fjc.fiche_junior = '".$data_d["id"]."' AND fjc.classe = c.id";
$exec2 = mysql_query($query2) or die(mysql_error());
$data2 = mysql_fetch_row($exec2);
$age = "(".$data2[0];
$query2 = "SELECT MAX(age_maxi) FROM fiche_junior_classe fjc, classe c WHERE fjc.fiche_junior = '".$data_d["id"]."' AND fjc.classe = c.id";
$exec2 = mysql_query($query2) or die(mysql_error());
$data2 = mysql_fetch_row($exec2);
$age .= "-".$data2[0]." ans)";

$fil_ariane .= "<a href='sejours-linguistiques-pour-adolescents.html' class='texteBleu'>Séjour linguistique</a>";
$fil_ariane .= " / <a href='sejours-linguistiques-adolescents-".url_rewrite(trim(strtolower(stripslashes($data_d["pays"])))).",".$data_d["idpays"].".html' class='texteBleu'>".stripslashes($data_d["pays"])."</a>";
$fil_ariane .= " / <a href='sejour-linguistique-adolescent-".url_rewrite(trim(strtolower(stripslashes($data_d["nom"])))).",".$data_d["id"].".html' class='texteBleu'>".stripslashes($data_d["nom"])."</a>";
$title="Séjour linguistique pour adolescent ".stripslashes($data_d["nom"])." - Stage et job ".stripslashes($data_d["nom"]);
?>

<? include("haut.php"); ?>

						<link href="design.css" rel="stylesheet" type="text/css" />
<table width="100%" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="10"></td>
                          </tr>
                          <tr>
                            <td width="10"></td>
                            <td valign="top" width="203"><? include("include/menu_junior.php"); ?></td>
                            <td width="10"></td>
                            <td valign="top"><table cellpadding="0" cellspacing="0" width="560">
                                <tr>
                                  <td><img src="images/crochet_junior.jpg" align="absmiddle" />&nbsp;<span class="titreJaune"><b><?=stripslashes($data_d["nom"])?></b></span></td>
                                </tr>
                                <tr>
                                  <td>
                                  <br />
                                  
                                  <? if(file_exists("imagesUp/fiche_junior/".$data_d["id"]."-gen.jpg")){ ?>
                                  <div align="center"><img src="imagesUp/fiche_junior/<?=$data_d["id"]?>-gen.jpg" border="0" width="550" height="80" /></div><br />
                                  <? } ?>
                                  
                                  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="100%" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabCell_droite">
                                            <tr>
                                              <td width="70%" align="left"><img src="images/tableau_titre_sommaire.gif" /></td>
                                              <td width="30%" align="center" class="texteNoir">&nbsp;</td>
                                            </tr>
                                          </table></td>
                                        </tr>
                                      </table>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="1" style="margin-top:3px;">
                                          <tr>
                                            <td align="center" bgcolor="#EEEEEE"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                                              <tr>
                                                <td height="24" align="center" valign="middle" bgcolor="#DFFBFF" class="texteGris"><span style="color:#8dbcd5; font-size:8px;"><a href="#1" class="lienSommaire"><strong>Pays/Ville</strong></a>&#9660;&nbsp;&nbsp; <a href="#2" class="lienSommaire"><strong>Options</strong></a>&#9660;&nbsp;&nbsp; <a href="#3" class="lienSommaire"><strong>Points forts</strong></a>&#9660;&nbsp;&nbsp; <a href="#4" class="lienSommaire"><strong>Programme</strong></a>&#9660;&nbsp;&nbsp; <a href="#5" class="lienSommaire"><strong>Photos</strong></a>&#9660;</span></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_ombre_sous_titre.gif" width="542" height="11" /></td>
                                    </tr>
                                  </table>
                                  
                                  <table width="98%" align="center">
                                  <tr><td align="justify" class="texteGris" style="text-align:justify">
								  <?
                                  if(file_exists("imagesUp/fiche_junior/".$data_d["id"]."-1_m.jpg")){
									  ?>
                                      <img src="imagesUp/fiche_junior/<?=$data_d["id"]?>-1_m.jpg" border="0" align="left" style="border:#e8e8e8 1px solid; margin-bottom:8px; margin-right:10px; padding:2px;" />
                                      <?
								  }
								  ?>
								  <?=nl2br(stripslashes($data_d["description"]))?></td></tr>
                                  </table>
                                  <br />
                                  
                                  <table width="546" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="546"><img src="images/haut_tableau.gif" width="546" height="7" /></td>
                                    </tr>
                                    <tr>
                                      <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="542" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;"><a name="1" id="1"></a>
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="50%"><table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td><img src="images/tableau_titre_pays.gif" width="44" height="24" /></td>
                                                  <td class="texteNoir"><strong> <?=stripslashes($data_d["pays"])?></strong></td>
                                                </tr>
                                              </table></td>
                                              <td width="2%" align="center"><img src="images/tableau_sep.gif" width="1" height="24" /></td>
                                              <td width="48%"><table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td><img src="images/tableau_titre_ville.gif" width="44" height="24" /></td>
                                                  <td class="texteNoir"><strong> <?=stripslashes($data_d["ville"])?></strong></td>
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
                                      <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteGris">
                                        <tr>
                                          <td align="left" valign="top" class="tabCell_gauche"><span class="texteJaune"><strong>Tarif :</strong></span> <strong><span style="font-size:16px"><?=parsePrix($data_d["tarif"])?> €</span></strong></td>
                                          <td align="left" valign="top" class="tabCell_droite"><strong><span class="texteJaune">Niveau :</span></strong> <?=stripslashes($data_d["niveau"])?> <?=$age?></td>
                                        </tr>
                                        <tr>
                                          <td width="51%" align="left" valign="top" class="tabCell_gauche">
										  <?
                                        $query2 = "SELECT f.nom, f.description FROM fiche_junior_formule fjf, formule_junior f WHERE fiche_junior = '".$data_d["id"]."' AND fjf.formule = f.id";
										$exec2 = mysql_query($query2) or die(mysql_error());
										$tab = array();
										$i=1;
										while($data2 = mysql_fetch_row($exec2)){
											$tab[] = "<a href='#' onclick='return false;' onmouseover='aff(\"formule_".$i."\");' onmouseout='cache(\"formule_".$i."\");' class='lienGris2'>".stripslashes($data2[0])."</a><div id='formule_".$i."' align='justify' style='position:absolute; padding:10px; background-color:#FAFAFA; width:300px; margin-left:10px; margin-top:0px; border:#ed7902 2px solid; display:none;' onmouseout='cache(\"formule_".$i."\");'>".nl2br(stripslashes($data2[1]))."</div>";
											$i++;
										}
										?>
                                            <span class="texteJaune"><strong>Formules :</strong></span>
                                              <?=implode(", ", $tab)?></td>
                                          <td width="49%" align="left" valign="top" class="tabCell_droite"><?
                                        $query2 = "SELECT h.nom, h.description FROM fiche_junior_hebergement fjh, hebergement_junior h WHERE fiche_junior = '".$data_d["id"]."' AND fjh.hebergement = h.id";
										$exec2 = mysql_query($query2) or die(mysql_error());
										$tab = array();
										$i=1;
										while($data2 = mysql_fetch_row($exec2)){
											$tab[] = "<a href='#' onclick='return false;' onmouseover='aff(\"hebergement_".$i."\");' onmouseout='cache(\"hebergement_".$i."\");' class='lienGris2'>".stripslashes($data2[0])."</a><div id='hebergement_".$i."' align='justify' style='position:absolute; padding:10px; background-color:#FAFAFA; width:300px; margin-left:10px; margin-top:0px; border:#ed7902 2px solid; display:none;' onmouseout='cache(\"hebergement_".$i."\");'>".nl2br(stripslashes($data2[1]))."</div>";
											$i++;
										}
										?>
                                            <strong><span class="texteJaune">H&eacute;bergements :</span></strong>
                                              <?=implode(", ", $tab)?></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" align="left" class="tabCell_droite"><strong><span class="texteJaune">Dates :</span></strong> <?=nl2br(stripslashes($data_d["dates"]))?></td>
                                        </tr>
                                        <tr>
                                          <td align="left" valign="top" class="tabCell_gauchebas"><strong><span class="texteJaune">Rappel de la formule :</span></strong><br /><?=nl2br(stripslashes($data_d["rappel_formule"]))?></td>
                                          <td align="left" valign="top"></td>
                                        </tr>
                                    </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                    </tr>
                                  </table>
                                  <br />
                                  
                                  <table width="546" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="546"><img src="images/haut_tableau.gif" width="546" height="7" /></td>
                                    </tr>
                                    <tr>
                                      <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="542" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;"><a name="6" id="6"></a>
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td width="93%"><img src="images/tableau_titre_hebergement.gif" /></td>
                                                  <td width="7%" align="center" class="texteNoir"><a href="#" onclick="aff_cache('bloc_hebergement'); return false;"><img src="images/tableau_fleche_titre.gif" width="22" height="8" border="0" /></a></td>
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
                                      <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table id="bloc_hebergement" width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                        <?
                                      for($i=1 ; $i<=5 ; $i++){
										  if($data_d["hebergement_nom".$i] != ""){
										  ?>
                                        <tr><td colspan="2" align="left" class="<?=(($data_d["hebergement_nom".($i+1)] != "") ? "tabCell_droite" : "")?>"><span class="texteJaune"><strong><?=stripslashes($data_d["hebergement_nom".$i])?> :</strong></span><br /><span class="texteGris"><?=nl2br(stripslashes($data_d["hebergement_texte".$i]))?></span></td></tr>
                                        <?
                                          }
                                      }
									  ?>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                    </tr>
                                  </table>
                                  <br />
                                  
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
                                                  <td width="93%"><img src="images/tableau_titre_point_fort.gif" width="160" height="24" /></td>
                                                  <td width="7%" align="center" class="texteNoir"><a href="#" onclick="aff_cache('bloc_ptfort'); return false;"><img src="images/tableau_fleche_titre.gif" width="22" height="8" border="0" /></a></td>
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
                                      <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table id="bloc_ptfort" width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                        <?
                                      for($i=1 ; $i<=5 ; $i++){
										  if($data_d["point_fort".$i] != ""){
										  ?>
                                        <tr>
                                          <td colspan="2" align="left" class="<?=(($data_d["point_fort".($i+1)] != "") ? "tabCell_droite" : "")?>"><span class="texteGris"><?=stripslashes($data_d["point_fort".$i])?></span></td>
                                        </tr>
                                        <?
                                          }
                                      }
									  ?>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                    </tr>
                                  </table>
                                  <br />
                                  
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
                                                  <td width="93%"><img src="images/tableau_titre_prixtoutcompris.gif" width="160" height="24" /></td>
                                                  <td width="7%" align="center" class="texteNoir"><a href="#" onclick="aff_cache('bloc_prixtoutcompris'); return false;"><img src="images/tableau_fleche_titre.gif" width="22" height="8" border="0" /></a></td>
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
                                      <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table id="bloc_prixtoutcompris" width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                        <tr>
                                          <td colspan="2" align="left"><span class="texteGris"><?=nl2br(stripslashes($data_d["prix_tout_compris"]))?></span></td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                    </tr>
                                  </table>
                                  <br />
                                  
                                  <table width="546" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="546"><img src="images/haut_tableau.gif" width="546" height="7" /></td>
                                    </tr>
                                    <tr>
                                      <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="542" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;"><a name="4" id="4"></a>
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
                                          <td><img src="images/tableau_ombre_sous_titre.gif" width="542" height="11" /></td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td><?
										$query2 = "SELECT * FROM junior_programme WHERE fiche_junior = '".$data_d["id"]."'";
										$exec2 = mysql_query($query2) or die(mysql_error());
										$data2 = mysql_fetch_assoc($exec2);
										?>
                                        <table width="100%" border="0" cellpadding="3" cellspacing="1">
                                        <tr align="center"><td class="tabCell_droite">&nbsp;</td><td class="tabCell_droite">&nbsp;</td><td bgcolor="#E7F3FA" class="texteGris tabCell_droite"><?=stripslashes($data2["jour1"])?></td><td bgcolor="#E7F3FA" class="texteGris tabCell_droite"><?=stripslashes($data2["jour2"])?></td><td bgcolor="#E7F3FA" class="texteGris"><?=stripslashes($data2["jour3"])?></td><td bgcolor="#E7F3FA" class="texteGris tabCell_droite"><?=stripslashes($data2["jour4"])?></td><td bgcolor="#E7F3FA" class="texteGris tabCell_droite"><?=stripslashes($data2["jour5"])?></td><td bgcolor="#E7F3FA" class="texteGris tabCell_droite"><?=stripslashes($data2["jour6"])?></td><td bgcolor="#E7F3FA" class="texteGris tabCell_droite"><?=stripslashes($data2["jour7"])?></td></tr>
										<? for($i=1 ; $i<=3 ; $i++){ ?>
                                        <? if($i!=3 || $data2["s3_j1_1"] != ""){ ?>
                                            <tr><td rowspan="3" bgcolor="#E7F3FA" class="tabCell_gauche">
                                              <img src="images/sem<?=$i?>.gif" width="19" height="66" /></td>
                                            <? for($h=1 ; $h<=3 ; $h++){ ?>
												<?=(($h!=1) ? "<tr>" : "")?>
                                                <td align="center" class="tabCell_gauche texteBleu"><?=(($h==1) ? "MATIN" : (($h==2) ? "APRES<br>MIDI" : "SOIR"))?></td>
                                                <? for($j=1 ; $j<=7 ; $j++){ ?>
                                                	<td width="100" bgcolor="#<?=(($data2["c".$i."_j".$j."_".$h] == "1") ? "cee9ed" : (($data2["c".$i."_j".$j."_".$h] == "2") ? "94d2db" : (($data2["c".$i."_j".$j."_".$h] == "3") ? "b1b1d6" : "FFFFFF")))?>" class="tabCell_gauche texteGris"><?=stripslashes($data2["s".$i."_j".$j."_".$h])?></td>
                                                <? } ?>
                                                <?=(($h!=1) ? "</tr>" : "")?>
                                            <? } ?>
                                            </tr>
                                        <? } ?>
                                        <? } ?>
                                        </table></td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                    </tr>
                                  </table>
                                  <br />
                                  
                                  <table width="546" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="546"><img src="images/haut_tableau.gif" width="546" height="7" /></td>
                                    </tr>
                                    <tr>
                                      <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="542" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;"><a name="2" id="2"></a>
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td width="93%"><img src="images/tableau_titre_option.gif" /></td>
                                                  <td width="7%" align="center" class="texteNoir"><a href="#" onclick="aff_cache('bloc_option'); return false;"><img src="images/tableau_fleche_titre.gif" width="22" height="8" border="0" /></a></td>
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
                                      <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table id="bloc_option" width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                        <?
                                      for($i=1 ; $i<=5 ; $i++){
										  if($data_d["option_nom".$i] != ""){
										  ?>
                                        <tr><td colspan="2" align="left" class="<?=(($data_d["option_nom".($i+1)] != "") ? "tabCell_droite" : "")?>"><span class="texteJaune"><strong><?=stripslashes($data_d["option_nom".$i])?> :</strong></span><br /><span class="texteGris"><?=nl2br(stripslashes($data_d["option_texte".$i]))?></span></td></tr>
                                        <?
                                          }
                                      }
									  ?>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                    </tr>
                                  </table>
                                  <br />
                            
                            <? /*if(file_exists("imagesUp/fiche_junior/".$data_d["id"]."-2_m.jpg")){ ?>
                            <table width="546" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="546"><img src="images/haut_tableau.gif" width="546" height="7" /></td>
                                    </tr>
                                    <tr>
                                      <td style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table width="542" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="542" height="25" style="background-image:url(images/tableau_fond_titre.gif); background-position:top; background-repeat:repeat-x; background-color:#FFF;"><a name="5" id="5"></a>
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td width="93%"><img src="images/tableau_titre_photo.gif" /></td>
                                                  <td width="7%" align="center" class="texteNoir"><a href="#" onclick="aff_cache('bloc_photo'); return false;"><img src="images/tableau_fleche_titre.gif" width="22" height="8" border="0" /></a></td>
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
                                      <td align="center" style="background-image:url(images/tableau_fond.gif); background-repeat:repeat-y;"><table id="bloc_photo" width="98%" border="0" align="center" cellpadding="5" cellspacing="0" class="texteBlanc">
                                        <tr><td>
                                            <table align="center" width="98%" border="0" cellpadding="3" cellspacing="10">
										  	<?
                                            for($i=0 ; $i<9 ; $i++){
                                                if($i%3 == 0){
                                                    ?><tr><?
                                                }
                                                if(file_exists("imagesUp/fiche_junior/".$data_d["id"]."-".($i+2)."_m.jpg")){
                                                    $size = getimagesize("imagesUp/fiche_junior/".$data_d["id"]."-".($i+2)."_m.jpg");
                                                      $width = $size[0];
                                                      $height = $size[1];
                                                      ?>
                                                      <td align="center" width="130" height="130" bgcolor="#EEEEEE" style="border:#CCC 1px solid">
                                                      <a href="imagesUp/fiche_junior/<?=$data_d["id"]?>-<?=($i+2)?>.jpg" rel="prettyPhoto[gallery]">
                                                      <?
                                                      if($height > $width){
                                                          ?><img src="imagesUp/fiche_junior/<?=$data_d["id"]?>-<?=($i+2)?>_m.jpg" height="110" border="0" style="border:#000 1px solid"><?
                                                      }else{
                                                          ?><img src="imagesUp/fiche_junior/<?=$data_d["id"]?>-<?=($i+2)?>_m.jpg" width="110" border="0" style="border:#000 1px solid"><?
                                                      }
                                                      ?>
                                                      </a>
                                                      </td>
                                                    <?
                                                }
                                                if(($i+1)%3 == 0){
                                                    ?></tr><?
                                                }
                                            }
                                            ?>
                                            </table>
                                        </td></tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                    </tr>
                                  </table>
                            <br />
                            <? }*/ ?>
                            
                            <br />
                                  
                                  </td>
                                </tr>
                              </table></td>
                            <td width="9"></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
                <td width="195" valign="top"><? include("droite_junior.php"); ?></td>
              </tr>
            </table>

<? include("bas.php"); ?>