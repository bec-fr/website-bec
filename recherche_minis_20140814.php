<? include("connect.php"); ?>
<?
if(isset($_GET["pays"]) && $_GET["pays"] != ""){
	$pays_swf = $_GET["pays"];
}elseif(isset($_GET["ville"]) && $_GET["ville"] != ""){
	$query2 = "SELECT pays FROM minis_ville WHERE id = '".addslashes($_GET["ville"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_row($exec2);
	$pays_swf = $data2[0];
}

$plus_link = "";
if(isset($_GET["tab"]) && $_GET["tab"] == "1"){
	$plus_link .= "&tab=1";
}

$fil_ariane .= "<a href='recherche_minis.php' class='texteBleu'>Voyages scolaires</a>";
$titre = "Voyages scolaires";
if(isset($_GET["pays"]) && $_GET["pays"] != ""){
	$query2 = "SELECT * FROM minis_pays WHERE id = '".addslashes($_GET["pays"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);
	$fil_ariane .= " / <a href='recherche_minis.php?site=minis&pays=".$data2["id"]."' class='texteBleu'>".stripslashes($data2["nom"])."</a>";
	$titre .= " / ".stripslashes($data2["nom"])."";
}
if(isset($_GET["ville"]) && $_GET["ville"] != ""){
	$query2 = "SELECT v.*, p.id as idpays, p.nom as pays FROM minis_ville v INNER JOIN minis_pays p ON v.pays = p.id WHERE v.id = '".addslashes($_GET["ville"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);
	$fil_ariane .= " / <a href='recherche_minis.php?site=minis&pays=".$data2["idpays"]."&ville=".$data2["id"]."' class='texteBleu'>".stripslashes($data2["nom"])."</a>";
	$titre .= " / ".stripslashes($data2["nom"])."";
}
?>
<? include("haut.php"); ?>
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
                                  <td><img src="images/crochet_minis.jpg" align="absmiddle" />&nbsp;<span class="titreRouge"><b><?=$titre?></b></span></td>
                                </tr>
                                <tr height="350">
                                  <td valign="top">
                                  <br />
                                  <div align="center"><a href="minis_rechbudget.php"><img src="images/btRecherchesejourbudget_minis.jpg" border="0" /></a></div><br />
                                  
                                  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <?
									$_GET["nb_pc"] = $_GET["nb_pc"]+3;
									
								  $query = "SELECT fm.*, p.nom as pays, v.nom as ville FROM fiche_minis fm INNER JOIN minis_pays p ON fm.pays = p.id INNER JOIN minis_ville v ON fm.ville = v.id LEFT OUTER JOIN fiche_minis_hebergement fmh ON fm.id = fmh.fiche_minis LEFT OUTER JOIN fiche_minis_formule fmf ON fm.id = fmf.fiche_minis WHERE fm.afficher = '1'";
								  if(isset($_GET["pays"]) && $_GET["pays"] != ""){
									  $query .= " AND fm.pays = '".addslashes($_GET["pays"])."'";
								  }
								  if(isset($_GET["ville"]) && $_GET["ville"] != ""){
									  $query .= " AND fm.ville = '".addslashes($_GET["ville"])."'";
								  }
								  if(isset($_GET["langue"]) && $_GET["langue"] != ""){
									  $query .= " AND fm.langue = '".addslashes($_GET["langue"])."'";
								  }
								  if(isset($_GET["hebergement"]) && $_GET["hebergement"] != ""){
									  $query .= " AND fmh.hebergement = '".addslashes($_GET["hebergement"])."'";
								  }
								  if(isset($_GET["formule"]) && $_GET["formule"] != ""){
									  $query .= " AND fmf.formule = '".addslashes($_GET["formule"])."'";
								  }
								  $query .= " GROUP BY fm.id ORDER BY p.nom, v.nom, fm.nom";
								  //echo $query."<br>";
								  $exec = mysql_query($query) or die(mysql_error());
								  $nb = mysql_num_rows($exec);
								  
								  $i=0;
								  while($data = mysql_fetch_assoc($exec))
								  {
									  $url = "voyage-scolaire-circuit-linguistique-".url_rewrite(trim(strtolower(stripslashes(stripslashes($data["pays"]." - ".$data["ville"]))))).",".$data["id"].".html";
									  $aff = true;
									  if(isset($_GET["zone"]) && $_GET["zone"] != ""){
										  $query2 = "SELECT * FROM fiche_minis_tarif WHERE fiche_minis = '".$data["id"]."' AND nom = 'Tarif ".addslashes($_GET["zone"])."' AND duree = '".addslashes($_GET["nb_pc"])."' AND tarif <> '0'";
										  //echo $query2."<br>";
										  $exec2 = mysql_query($query2) or die(mysql_error());
										  if(mysql_num_rows($exec2) > 0){
											  $query3 = "SELECT * FROM fiche_minis_tarif WHERE fiche_minis = '".$data["id"]."' AND nom = 'Tarif ".addslashes($_GET["zone"])."' AND duree = '".addslashes($_GET["nb_pc"])."' AND tarif <> '0' AND tarif <= '".addslashes($_GET["budget_max"])."'";
											  //echo $query3."<br>";
											  $exec3 = mysql_query($query3) or die(mysql_error());
											  if(mysql_num_rows($exec3) > 0){
												  $aff = true;
											  }else{
												  $aff = false;
											  }
										  }else{
											  $query_max = "SELECT * FROM fiche_minis_tarif WHERE fiche_minis = '".$data["id"]."' AND nom = 'Tarif ".addslashes($_GET["zone"])."' AND tarif <> '0' ORDER BY duree DESC LIMIT 0,1";
											  $exec_max = mysql_query($query_max) or die(mysql_error());
											  $data_max = mysql_fetch_assoc($exec_max);
											  $duree_max = $data_max["duree"];
											  $tarif_max = $data_max["tarif"];
											  
											  $query_sup = "SELECT * FROM fiche_minis_tarif WHERE fiche_minis = '".$data["id"]."' AND nom = 'Tarif ".addslashes($_GET["zone"])."' AND duree = '0'";
											  $exec_sup = mysql_query($query_sup) or die(mysql_error());
											  $data_sup = mysql_fetch_assoc($exec_sup);
											  $tarif_sup = $data_sup["tarif"];
											  
											  $tarif_final = $tarif_max + $tarif_sup * ($_GET["nb_pc"]-$duree_max);
											  if($tarif_final <> 0 && $tarif_final <= $_GET["budget_max"]){
												  $aff = true;
											  }else{
												  $aff = false;
											  }
										  }
									  }
									  
									  if($aff == true){
										  if($i%3 == 0){
											?><tr><?
											}
											$i++;
										  ?>
                                          <td align="center" class="<?=(($i%3 != 0) ? "tabCell_gauche" : "tabCell_droite")?>"><table width="158" border="0" cellpadding="2" cellspacing="0" style="margin-bottom:5px; margin-top:5px;">
                                            <tr>
                                              <td width="156" align="center" valign="middle">
                                              <a href="<?=$url?>">
                                              <? if(file_exists("imagesUp/fiche_minis/".$data["id"]."-1_m.jpg")){ ?>
                                              <img src="imagesUp/fiche_minis/<?=$data["id"]?>-1_m.jpg" border="0" style="border:#e8e8e8 1px solid; margin-bottom:5px; padding:2px;"/>
                                              <? }else{ ?>
                                              <img src="images/noimg.jpg" width="150" height="128" border="0" style="border:#e8e8e8 1px solid; margin-bottom:5px; padding:2px;"/>
                                              <? } ?>
                                              </a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td align="left" valign="middle" class="texteJauneClair"><b><a href="<?=$url?>" class="lienRouge"><?=stripslashes($data["pays"])?></a></b></td>
                                            </tr>
                                            <tr>
                                              <td align="left" valign="middle" class="texteGris"><b><?=stripslashes($data["ville"])?></b></td>
                                            </tr>
                                            <!--<tr>
                                              <td align="left" valign="middle" class="texteGris"><?=stripslashes($data["nom"])?> (<?=stripslashes($data["soustitre"])?>)</td>
                                            </tr>-->
                                          </table></td>
										  <?
									  }
									  if($i%3 == 0){
											?></tr><?
										}
								  }
								  ?>
                                  </table>
                                  <br />
                                  
                                  </td>
                                </tr>
                              </table></td>
                            <td width="9">&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
                <td width="195" valign="top"><? include("droite_minis.php"); ?></td>
              </tr>
            </table>

<? include("bas.php"); ?>