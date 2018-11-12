<? include("connect.php"); ?>
<? include("haut.php"); ?>
<script>
	function verifForm(){
		a="0";
		
		if (document.form.destination.value.length == 0) {alert('Vous n\'avez pas renseigné votre destination.'); a="1"; document.form.destination.focus();}
		else if (document.form.date.value.length == 0) {alert('Vous n\'avez pas renseigné votre date.'); a="1"; document.form.date.focus();}
		
		if (a == 0) {
			document.form.ok.value = "1";
			document.form.submit();
		}
	}
</script>

						<table width="100%" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="10"></td>
                          </tr>
                          <tr>
                            <td width="9"></td>
                            <td valign="top" width="203"><? include("include/menu".$fic_nom.".php"); ?></td>
                            <td width="10"></td>
                            <td width="555" align="left" valign="top"><table cellpadding="0" cellspacing="0" width="550">
                                <tr>
                                  <td><img src="images/crochet<?=$fic_nom?>.jpg" align="absmiddle" />&nbsp;<span class="<?=$class_titre?>"><b>Devis</b></span></td>
                                </tr>
                                <tr height="350">
                                  <td valign="top" class="texteGris">
                                  <br />
                                  
                                  <table border="0" align="center" class="texteGris">
                                      <tr>
                                        <td align="left">Vous pouvez télécharger <a href="doc/inscription<?=$fic_nom?>.pdf" target="_blank" class="<?=$class_lien?>" style="font-size:11px">le bulletin d'inscription au format PDF</a>.</td>
                                    </tr>
                                  </table>
                                  
<?
if(isset($_POST["ok"]) && $_POST["ok"] == 1){
	/*$query = "INSERT INTO devis_junior (destination, date, preacheminement, preacheminement_ville, accueil_paris, gare, ass_annulation, ass_interruption, total, datetime) VALUES ('".addslashes($_POST["destination"])."', '".addslashes($_POST["date"])."', '".addslashes($_POST["preacheminement"])."', '".addslashes($_POST["preacheminement_ville"])."', '".addslashes($_POST["accueil_paris"])."', '".addslashes($_POST["gare"])."', '".addslashes($_POST["ass_annulation"])."', '".addslashes($_POST["ass_interruption"])."', '".addslashes($_POST["total"])."', '".date("Y-m-d H:i:s")."')";
	mysql_query($query) or die(mysql_error());*/
	
	$_SESSION["devis_destination"] = $_POST["destination"];
	$_SESSION["devis_date"] = $_POST["date"];
	$_SESSION["devis_preacheminement"] = $_POST["preacheminement"];
	$_SESSION["devis_preacheminement_ville"] = $_POST["preacheminement_ville"];
	$_SESSION["devis_accueil_paris"] = $_POST["accueil_paris"];
	$_SESSION["devis_gare"] = $_POST["gare"];
	$_SESSION["devis_ass_annulation"] = $_POST["ass_annulation"];
	$_SESSION["devis_ass_interruption"] = $_POST["ass_interruption"];
	$_SESSION["devis_total"] = $_POST["total"];
	
	echo "<script>document.location.href='devis_junior2_test.php';</script>";
}else{
	
	if(isset($_GET["fiche"]) && $_GET["fiche"] != ""){
		$_POST["destination"] = $_GET["fiche"];
	}
	if(isset($_GET["date"]) && $_GET["date"] != ""){
		$_POST["date"] = $_GET["date"];
	}

?>
<br />
                                                  
                <table width="100%" border="0" align="center" cellpadding="3" class="texteGris">
                  <form action="" method="post" name="form">
                    <input type="hidden" value="0" name="ok" />
                    <tr><td colspan="2" bgcolor="<?=$bgcolor?>" class="texteBlanc"><b>ETAPE 1/2 : Choix du séjour</b></td></tr>
                    <tr height="10"><td></td></tr>
                    <tr>
                      <td width="20%" align="right" class="text">Destination* :</td>
                      <td width="80%"><select name="destination" class="select" onchange="document.form.submit()" style="width:450px"><option value="">- - -</option>
                        <?
                        $query = "SELECT fj.*, p.nom as pays, v.nom as ville FROM fiche_junior fj INNER JOIN junior_pays p ON fj.pays = p.id INNER JOIN junior_ville v ON fj.ville = v.id WHERE 1 ORDER BY p.nom, v.nom, fj.nom";
						$exec = mysql_query($query) or die(mysql_error());
						while($data = mysql_fetch_assoc($exec))
						{
							echo "<option value='".$data["id"]."'";
							if(isset($_POST["destination"]) && $_POST["destination"] == $data["id"])
								echo " selected";
							echo ">".stripslashes($data["pays"])." ".stripslashes($data["ville"])." - ".stripslashes($data["nom"])."</option>";
						}
						?>
                    </select></td>
                    </tr>
                    <?
					$total=0;
					if(isset($_POST["destination"]) && $_POST["destination"] != ""){
						$query_d = "SELECT * FROM fiche_junior WHERE id = '".addslashes($_POST["destination"])."'";
						$exec_d = mysql_query($query_d) or die(mysql_error());
						$data_d = mysql_fetch_assoc($exec_d);
						$total = $data_d["tarif"];
					}
					?>
                    <tr><td></td><td>Tarif : <strong><?=$total?></strong> €</td></tr>
                    <tr>
                      <td align="right" class="text">Date* :</td>
                      <td><select name="date" class="select"><option value="">- - -</option>
                        <?
						$query2 = "SELECT * FROM fiche_junior_date WHERE rid_fiche = '".addslashes($_POST["destination"])."'";
						$exec2 = mysql_query($query2) or die(mysql_error());
						while($data2 = mysql_fetch_assoc($exec2)){
							echo "<option value='".stripslashes($data2["nom"])."'";
							if(isset($_POST["date"]) && $_POST["date"] == $data2["id"])
								echo " selected";
							echo ">".stripslashes($data2["nom"])."</option>";
						}
						
						/*if(isset($_POST["destination"]) && $_POST["destination"] != ""){
							$tab = split("\r\n", $data_d["dates"]);
						}
						for($i=0 ; $i<count($tab) ; $i++){
							echo "<option value='".stripslashes($tab[$i])."'";
							if(isset($_POST["date"]) && $_POST["date"] == $tab[$i])
								echo " selected";
							echo ">".stripslashes($tab[$i])."</option>";
						}*/
						?>
                    </select></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                      <td class="text" colspan="2"><strong>Option de transport :</strong></td>
                    </tr>
                    <?
                    if(isset($_POST["preacheminement"]) && $_POST["preacheminement"] == "1"){
						$total += 150;
					}
					?>
                    <tr>
                      <td class="text" colspan="2"><input type="checkbox" name="preacheminement" value="1" <?=((isset($_POST["preacheminement"]) && $_POST["preacheminement"] == "1") ? " checked" : "")?> onclick="document.form.accueil_paris.checked=false; document.form.accueil_paris_aeroport.checked=false; document.form.submit();" /> &nbsp;Préacheminement de Province en Avion/Train depuis 
                      <select name="preacheminement_ville" class="select"><option value="">- - -</option>
                      <?
						if(isset($_POST["destination"]) && $_POST["destination"] != ""){
							$tab = split("\r\n", $data_d["ville_devis"]);
						}
						for($i=0 ; $i<count($tab) ; $i++){
							if($tab[$i] != ""){
								echo "<option value='".stripslashes($tab[$i])."'";
								if(isset($_POST["preacheminement_ville"]) && $_POST["preacheminement_ville"] == $tab[$i])
									echo " selected";
								echo ">".stripslashes($tab[$i])."</option>";
							}
						}
						?>
                      </select> &nbsp;&nbsp;<strong>150€</strong></td>
                    </tr>
                    <?
                    if(isset($_POST["accueil_paris"]) && $_POST["accueil_paris"] == "1"){
						$total += 80;
					}
					?>
                    <tr>
                      <td class="text" colspan="2"><input type="checkbox" name="accueil_paris" value="1" <?=((isset($_POST["accueil_paris"]) && $_POST["accueil_paris"] == "1") ? " checked" : "")?> onclick="document.form.preacheminement.checked=false; document.form.accueil_paris_aeroport.checked=false; document.form.submit();" /> &nbsp;Accueil à Paris en Gare de 
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
                    <tr><td></td><td>Total : <strong><?=$total?></strong> €</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                      <td class="text" colspan="2"><strong>Option d'assurances :</strong></td>
                    </tr>
                    <?
					$soustotal = $total;
                    if(isset($_POST["ass_annulation"]) && $_POST["ass_annulation"] == "1"){
						$total += $soustotal*0.03;
					}
					?>
                    <tr>
                      <td class="text" colspan="2">Assurance annulation : <input type="checkbox" name="ass_annulation" value="1" <?=((isset($_POST["ass_annulation"]) && $_POST["ass_annulation"] == "1") ? " checked" : "")?> onclick="document.form.submit()" /> &nbsp;&nbsp;<strong>3%</strong></td>
                    </tr>
                    <?
                    if(isset($_POST["ass_interruption"]) && $_POST["ass_interruption"] == "1"){
						$total += $soustotal*0.045;
					}
					?>
                    <tr>
                      <td class="text" colspan="2">Pack multirisques : <input type="checkbox" name="ass_interruption" value="1" <?=((isset($_POST["ass_interruption"]) && $_POST["ass_interruption"] == "1") ? " checked" : "")?> onclick="document.form.submit()" /> &nbsp;&nbsp;<strong>4,5%</strong></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td></td><td>Total : <strong><?=parsePrix($total)?></strong> €</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                      <td colspan="2" align="center" valign="bottom">Souhaitez vous faire une pré-inscription (sans paiement) ?</td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" valign="bottom"><a href="javascript:verifForm();"><img src="images/btEtape2<?=$fic_nom?>.jpg" border="0" /></a></td>
                    </tr>
                  <input type="hidden" name="total" value="<?=$total?>" />
                  </form>
                </table>
                <? } ?>
                                  
                                  </td>
                                </tr>
                              </table></td>
                            <td width="9">&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
                <td width="195" valign="top"><? include("droite".$fic_nom.".php"); ?></td>
              </tr>
            </table>

<? include("bas.php"); ?>