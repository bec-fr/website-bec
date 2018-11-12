<? include("connect.php"); ?>
<? $query_d = "SELECT fj.*, p.nom as pays, v.nom as ville, p.id as idpays FROM fiche_junior fj INNER JOIN junior_pays p ON fj.pays = p.id INNER JOIN junior_ville v ON fj.ville = v.id WHERE fj.id = '".addslashes($_GET["fiche"])."'";
$exec_d = mysql_query($query_d) or die(mysql_error());
if(mysql_num_rows($exec_d) == 0){
	echo "<script>document.location.href='index_junior.php';</script>";
	exit();
}
$data_d = mysql_fetch_assoc($exec_d);

$query_dd = "SELECT * FROM fiche_junior_date WHERE id = '".addslashes($_GET["date"])."'";
$exec_dd = mysql_query($query_dd) or die(mysql_error());
$data_dd = mysql_fetch_assoc($exec_dd);


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
?>
<? include("haut.php"); ?>

<script type="text/javascript">
function verifForm(){
	testm = false ;
	for (var j=1 ; j<(document.form.mail.value.length) ; j++) {
		if (document.form.mail.value.charAt(j)=='@') { 
			if (j<(document.form.mail.value.length-4)){ 
				for (var k=j ; k<(document.form.mail.value.length-2) ; k++) { 
					if (document.form.mail.value.charAt(k)=='.') testm = true;
				} 
			} 
		} 
	}
	a="0";
	
	if (document.form.nom.value.length == 0) {alert('Vous n\'avez pas indiqué votre nom.'); a="1"; document.form.nom.focus();}
	else if (document.form.prenom.value.length == 0) {alert('Vous n\'avez pas indiqué votre prénom.'); a="1"; document.form.prenom.focus();}
	else if (document.form.mail.value.length == 0) {alert('Vous n\'avez pas indiqué votre adresse e-mail.'); a="1"; document.form.mail.focus();}
	else if ((testm==false) && (document.form.mail.value.length != 0)) {alert('Votre adresse e-mail est incorrecte.'); a="1"; document.form.mail.focus();}
	else if(!document.getElementById('valider').checked) {alert('Veuillez accepter les conditions générales et les conditions particulières.'); a="1"; document.form.mail.focus();}
	
	if (a == 0) {
		document.form.action = 'junior_reserver_sejour2.php?fiche=<?=$_GET["fiche"]?>&date=<?=$_GET["date"]?>';
		document.form.submit();
	}
}
</script>


						<link href="design.css" rel="stylesheet" type="text/css" />
                        <div class="zone_contenu" style="border-bottom:1px solid #f2f2f2; margin-bottom:8px;">
                          <div style="float:left;" class="titreJaune"><strong><?=stripslashes($data_d["nom"])?></strong></div>
                          <div style="float:right;" class="titreJaune"><a href="#" onClick="history.back();"><img src="images/btn_retour_jaune.gif" width="68" height="22" border="0" /></a></div>
                        </div>
                        
                        
                        <div class="zone_contenu" style="margin-top:5px;">
                       	  <? include("fiche_junior_blocgauche.php") ?>
                            
                            <form action="" method="post" name="form">
                            <input type="hidden" name="ok" value="1" />
                            <!--<input type="hidden" name="fiche" value="<?=$_GET["fiche"]?>" />
                            <input type="hidden" name="date" value="<?=$_GET["date"]?>" />-->
                            
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
									  $total = $data_d["tarif"];
									  ?>
                                      <table border="0">
                                      <tr>
                                          <td align="right" style="font-size:14px"><b>Date :</b></td>
                                          <td style="font-size:14px"><?=stripslashes($data_dd["nom"])?></td>
                                        </tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr>
                                          <td colspan="2"><strong>Option de transport :</strong></td>
                                        </tr>
                                        <? if($data_d["preacheminement_train"] == "1"){ ?>
                                        <?
                                        if(isset($_POST["preacheminement"]) && $_POST["preacheminement"] == "1"){
                                            $total += 150;
                                        }
                                        ?>
                                        <tr>
                                          <td colspan="2"><input type="checkbox" name="preacheminement" value="1" <?=((isset($_POST["preacheminement"]) && $_POST["preacheminement"] == "1") ? " checked" : "")?> onclick="document.form.accueil_paris.checked=false; document.form.accueil_paris_aeroport.checked=false; document.form.submit();" /> &nbsp;Préacheminement de Province en Train depuis 
                                          <select name="preacheminement_ville" class="select"><option value="">- - -</option>
                                          <?
										  $query2 = "SELECT * FROM junior_devis_ville WHERE 1";
										  $exec2 = mysql_query($query2) or die(mysql_error());
                                            while($data2 = mysql_fetch_assoc($exec2)){
												echo "<option value='".$data2["id"]."'";
												if(isset($_POST["preacheminement"]) && $_POST["preacheminement"] == $data2["id"])
													echo " selected";
												echo ">".stripslashes($data2["nom"])."</option>";
                                            }
                                            ?>
                                          </select> &nbsp;&nbsp;<strong>150€</strong></td>
                                        </tr>
                                        <? } ?>
                                        <? if($data_d["preacheminement_avion"] == "1"){ ?>
                                        <?
                                        if(isset($_POST["preacheminement_avion"]) && $_POST["preacheminement_avion"] == "1"){
                                            $total += 150;
                                        }
                                        ?>
                                        <tr>
                                          <td colspan="2"><input type="checkbox" name="preacheminement_avion" value="1" <?=((isset($_POST["preacheminement_avion"]) && $_POST["preacheminement_avion"] == "1") ? " checked" : "")?> onclick="document.form.accueil_paris.checked=false; document.form.accueil_paris_aeroport.checked=false; document.form.submit();" /> &nbsp;Préacheminement de Province en Avion depuis 
                                          <select name="preacheminement_ville" class="select"><option value="">- - -</option>
                                          <?
										  $query2 = "SELECT * FROM junior_devis_ville WHERE avion='1'";
										  $exec2 = mysql_query($query2) or die(mysql_error());
                                            while($data2 = mysql_fetch_assoc($exec2)){
												echo "<option value='".$data2["id"]."'";
												if(isset($_POST["preacheminement_ville"]) && $_POST["preacheminement_ville"] == $data2["id"])
													echo " selected";
												echo ">".stripslashes($data2["nom"])."</option>";
                                            }
                                            ?>
                                          </select> &nbsp;&nbsp;<strong>150€</strong></td>
                                        </tr>
                                        <? } ?>
                                        <?
                                        if(isset($_POST["accueil_paris"]) && $_POST["accueil_paris"] == "1"){
                                            $total += 80;
                                        }
                                        ?>
                                        <tr>
                                          <td colspan="2"><input type="checkbox" name="accueil_paris" value="1" <?=((isset($_POST["accueil_paris"]) && $_POST["accueil_paris"] == "1") ? " checked" : "")?> onclick="document.form.preacheminement.checked=false; document.form.accueil_paris_aeroport.checked=false; document.form.submit();" /> &nbsp;Accueil à Paris en Gare de 
                                          <select name="gare" class="select"><option value="">- - -</option><option value="Gare de Lyon" <?=((isset($_POST["gare"]) && $_POST["gare"] == "Gare de Lyon") ? " selected" : "")?>>Gare de Lyon</option><option value="Gare du Nord" <?=((isset($_POST["gare"]) && $_POST["gare"] == "Gare du Nord") ? " selected" : "")?>>Gare du Nord</option><option value="Gare St Lazare" <?=((isset($_POST["gare"]) && $_POST["gare"] == "Gare St Lazare") ? " selected" : "")?>>Gare St Lazare</option><option value="Gare Montparnasse" <?=((isset($_POST["gare"]) && $_POST["gare"] == "Gare Montparnasse") ? " selected" : "")?>>Gare Montparnasse</option></select> &nbsp;&nbsp;<strong>80€</strong></td>
                                        </tr>
                                        <?
                                        if(isset($_POST["accueil_paris_aeroport"]) && $_POST["accueil_paris_aeroport"] == "1"){
                                            $total += 120;
                                        }
                                        ?>
                                        <tr>
                                          <td colspan="2"><input type="checkbox" name="accueil_paris_aeroport" value="1" <?=((isset($_POST["accueil_paris_aeroport"]) && $_POST["accueil_paris_aeroport"] == "1") ? " checked" : "")?> onclick="document.form.preacheminement.checked=false; document.form.accueil_paris.checked=false; document.form.submit();" /> &nbsp;Accueil à Paris à l'aéroport de 
                                          <select name="aeroport" class="select"><option value="">- - -</option><option value="Charles de Gaulle / Roissy" <?=((isset($_POST["aeroport"]) && $_POST["aeroport"] == "Charles de Gaulle / Roissy") ? " selected" : "")?>>Charles de Gaulle / Roissy</option><option value="Orly" <?=((isset($_POST["aeroport"]) && $_POST["aeroport"] == "Orly") ? " selected" : "")?>>Orly</option></select> &nbsp;&nbsp;<strong>120€</strong></td>
                                        </tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr><td></td><td style="font-size:12px">Total : <strong><?=$total?></strong> €</td></tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr>
                                          <td colspan="2"><strong>Option d'assurances :</strong></td>
                                        </tr>
                                        <?
                                        $soustotal = $total;
										$tot_assurance = 0;
                                        if(isset($_POST["ass_annulation"]) && $_POST["ass_annulation"] == "1"){
                                            $total += $soustotal*0.03;
											$tot_assurance += $soustotal*0.03;
                                        }
                                        ?>
                                        <tr>
                                          <td colspan="2">Assurance annulation : <input type="checkbox" name="ass_annulation" value="1" <?=((isset($_POST["ass_annulation"]) && $_POST["ass_annulation"] == "1") ? " checked" : "")?> onclick="document.form.submit()" /> &nbsp;&nbsp;<strong>3%</strong></td>
                                        </tr>
                                        <?
                                        if(isset($_POST["ass_interruption"]) && $_POST["ass_interruption"] == "1"){
                                            $total += $soustotal*0.015;
											$tot_assurance += $soustotal*0.015;
                                        }
										$acompte = 400+$tot_assurance;
                                        ?>
                                        <tr>
                                          <td colspan="2">Assurance Interruption : <input type="checkbox" name="ass_interruption" value="1" <?=((isset($_POST["ass_interruption"]) && $_POST["ass_interruption"] == "1") ? " checked" : "")?> onclick="document.form.submit()" /> &nbsp;&nbsp;<strong>1,5%</strong></td>
                                        </tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr><td></td><td style="font-size:14px">Total : <strong><?=parsePrix($total)?></strong> €</td></tr>
                                      </table>
                                      
                                      </td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                </tr>
                              </table><br />
                              
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
                                                <td width="93%"><img src="images/tableau_titre_coordonnee.gif" alt="coordonnées" /></td>
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
                                      
                                      <table width="100%" border="0" align="center" cellpadding="3" class="texteGris">
                                        <tr>
                                          <td align="right" class="text">Sexe :</td>
                                          <td><input name="sexe" type="radio" value="0" checked /> masculin &nbsp;&nbsp;&nbsp; <input name="sexe" type="radio" value="1" /> féminin</td>
                                        </tr>
                                        <tr>
                                          <td width="37%" align="right" class="text">Nom du jeune* :</td>
                                          <td width="63%"><input name="nom" type="text" value="" class="inputtext" size="40" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="text">Pr&eacute;nom* :</td>
                                          <td><input name="prenom" type="text" value="" class="inputtext" size="40" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="text">Date de naissance :</td>
                                          <td><select name="date_naiss_j" class="select"><?=sel_date("jour","")?></select> <select name="date_naiss_m" class="select"><?=sel_date("mois","")?></select> <select name="date_naiss_a" class="select"><?=sel_date("annee","",1930)?></select></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="text">Adresse :</td>
                                          <td><input name="adresse" type="text" value="" class="inputtext" size="40" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="text">Code postal :</td>
                                          <td><input name="cp" type="text" value="" class="inputtext" size="10" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="text">Ville :</td>
                                          <td><input name="ville" type="text" value="" class="inputtext" size="40" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="text">Tél :</td>
                                          <td><input name="tel" type="text" value="" class="inputtext" size="40" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="text">Mail* :</td>
                                          <td><input name="mail" type="text" value="" class="inputtext" size="40" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="text">Inscription newsletter :</td>
                                          <td><input name="newsletter" type="checkbox" value="1" checked="checked" /></td>
                                        </tr>
                                    </table>
                                      
                                      </td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                </tr>
                              </table><br />
                              
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
                                                <td width="93%"><img src="images/tableau_titre_mode_de_paiement.gif" alt="mode de paiement" /></td>
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
									  
                                      <table width="100%" border="0" align="center" cellpadding="3" class="texteGris">
                                        <tr>
                                        <!--<td align="center">
                                            <table cellpadding="0" cellspacing="0"><tr><td align="center"><input type="radio" name="paiement" value="1" checked="checked" /></td></tr><tr><td align="center" height="65"><img src="images/logo_cb.gif" width="120" /></td></tr><tr><td align="center"><b>par CB</b></td></tr></table>
                                        </td>-->
                                        <!--<td align="center">
                                            <table cellpadding="0" cellspacing="0"><tr><td align="center"><input type="radio" name="paiement" value="4" checked="checked" /></td></tr><tr><td align="center" height="65"><img src="images/logo_paypal.gif" /></td></tr><tr><td align="center"><b>par Paypal</b></td></tr></table>
                                        </td>-->
                                        <td>
                                            <table align="center" cellpadding="0" cellspacing="0"><tr><td align="center"><input type="radio" name="paiement" value="2" checked="checked" /></td></tr><tr><td align="center" height="65"><img src="images/logo_cheque.jpg" /></td></tr><tr><td align="center"><b>par chèque</b></td></tr></table>
                                            <br />
                                            Un acompte de 400€ majoré des assurances souscrites, soit un montant total de <?=parsePrix($acompte)?>€ doit être envoyé par chèque sous 7 jours. Le solde de <?=parsePrix($total-$acompte)?> € devra être versé 6 semaines                                        <tr><td><input type="checkbox" name="valider" id="valider"> &nbsp;&nbsp;&nbsp; J'accepte sans réserve les modalités d'inscription et les conditions <a href="cgv_gene.php" target="_blank" class="lienGris2" style="font-weight:bold"> générales</a> et <a href="cgv_junior.php" target="_blank" class="lienGris2" style="font-weight:bold">particulières</a> de vente.</td></tr>
                                    </table>
                                      
                                      </td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td><img src="images/tableau_bas.gif" width="546" height="7" /></td>
                                </tr>
                              </table><br />
                              
                              <div align="center"><a href="javascript:verifForm();"><img src="images/btValider<?=$fic_nom?>.jpg" border="0" alt="Valider" /></a></div>
                              
                            </div>
                            </form>
                            
                        </div>
                        
                      </td>
                    </tr>
                  </table></td>
                <td width="195" valign="top"><? include("droite_junior.php"); ?></td>
              </tr>
            </table>

<? include("bas.php"); ?>