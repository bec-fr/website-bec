<?
include("connect.php");

$texte_fil = "";
if(isset($_GET["p"]) && $_GET["p"] != "")
{
	$query_fil = "SELECT p.id_prod, p.nom, m.nom as marque, c.nom as collection, c3.*, c2.*, c1.*, c3.titre as cat3, c2.titre as cat2, c1.titre as cat, ca.nom as capacite, cou.nom as couleur FROM produits p LEFT OUTER JOIN marque m ON p.rid_marque = m.id LEFT OUTER JOIN collection c ON p.rid_collection = c.id, produits_capacite pc LEFT OUTER JOIN capacite ca ON pc.rid_capacite = ca.id, produits_capacite_couleur pcc LEFT OUTER JOIN couleur cou ON pcc.couleur = cou.id, categories3 c3, categories2 c2, categories c1 WHERE p.id_prod = '".addslashes($_GET["p"])."' AND p.id_prod = pc.rid_prod AND pc.id = pcc.produits_capacite AND p.rid_cat = c3.id_cat3 AND c3.rid_cat2 = c2.id_cat2 AND c2.rid_cat = c1.id_cat";
	if(isset($_GET["pcc"]) && $_GET["pcc"] != "")
		$query_fil .= " AND pcc.id = '".addslashes($_GET["pcc"])."'";
	//echo $query_fil;
	$exec_fil = mysql_query($query_fil) or die(mysql_error());
	$data_fil = mysql_fetch_assoc($exec_fil);
	
	$query3 = "SELECT id_cat3 FROM categories3 WHERE rid_cat2 = '".$data_fil["id_cat2"]."'";
	$exec3 = mysql_query($query3) or die(mysql_error());
	$nb3 = mysql_num_rows($exec3);
	if($nb3>1){
		$texte_fil .= " &gt; <a href='produits-scat-".strtolower(url_rewrite(stripslashes($data_fil["titre"]))).",".$data_fil["id_cat"].".html' class='text'>".stripslashes($data_fil["cat"])."</a> &gt; <a href='produits-sscat-".strtolower(url_rewrite(stripslashes($data_fil["cat2"])))."-".strtolower(url_rewrite(stripslashes($data_fil["cat"]))).",".$data_fil["id_cat2"].".html' class='text'>".stripslashes($data_fil["cat2"])."</a> &gt; <a href='liste-produits-sscat-".strtolower(url_rewrite(stripslashes($data_fil["cat3"]))).",".$data_fil["id_cat3"].".html' class='text'>".stripslashes($data_fil["cat3"])."</a> &gt; <a href='produit-".strtolower(url_rewrite(stripslashes($data_fil["nom"]))).",".$data_fil["id_prod"].".html' class='text'>".stripslashes($data_fil["nom"])."</a>";
	}else{
		$texte_fil .= " &gt; <a href='produits-scat-".strtolower(url_rewrite(stripslashes($data_fil["titre"]))).",".$data_fil["id_cat"].".html' class='text'>".stripslashes($data_fil["cat"])."</a> &gt; <a href='liste-produits-scat-".strtolower(url_rewrite(stripslashes($data_fil["cat2"]))).",".$data_fil["id_cat2"].".html' class='text'>".stripslashes($data_fil["cat2"])."</a> &gt; <a href='produit-".strtolower(url_rewrite(stripslashes($data_fil["nom"]))).",".$data_fil["id_prod"].".html' class='text'>".stripslashes($data_fil["nom"])."</a>";
	}
	$title=stripslashes($data_fil["nom"]).", ".(($data_fil["capacite"] != "") ? strtolower(stripslashes($data_fil["capacite"])).", " : "").(($data_fil["couleur"] != "") ? strtolower(stripslashes($data_fil["couleur"])).", " : "").(($data_fil["collection"] != "") ? stripslashes($data_fil["collection"]).", " : "").(($data_fil["marque"] != "") ? stripslashes($data_fil["marque"]).", " : "")."achat/vente produits ".strtolower(stripslashes($data_fil["cat"]))."";
}

include("haut.php");
?>
<link href="font.css" rel="stylesheet" type="text/css" />

		
        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="26%" valign="top"><? include("include/menugauche_cat.php") ?></td>
          <td width="74%" height="153" valign="top"><table width="74%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td width="100%" height="273" valign="top">
              
              <?

$query = "SELECT p.*, pc.*, pcc.*, p.id_prod as id_prod, pc.id as pc_id, pcc.id as pcc_id, m.nom as marque, m.description as des_marque, m.aff_img, c.nom as collection, c.description as des_collection, ca.nom as capacite, cou.nom as couleur, cou.code as code_couleur FROM produits p LEFT OUTER JOIN marque m ON p.rid_marque = m.id LEFT OUTER JOIN collection c ON p.rid_collection = c.id, produits_capacite pc LEFT OUTER JOIN capacite ca ON pc.rid_capacite = ca.id, produits_capacite_couleur pcc LEFT OUTER JOIN couleur cou ON pcc.couleur = cou.id WHERE p.id_prod = '".addslashes($_GET["p"])."' AND p.afficher = '1' AND (c.afficher = '1' OR p.rid_collection = '0')";
if(isset($_GET["pcc"]) && $_GET["pcc"] != "")
	$query .= " AND pcc.id = '".addslashes($_GET["pcc"])."'";
$query .= " AND p.id_prod = pc.rid_prod AND pc.id = pcc.produits_capacite";
//echo $query;
$exec = mysql_query($query) or die(mysql_error());

//si produit existe
if(mysql_num_rows($exec) == 0){
	echo "<script>document.location.href='index.php';</script>";
	exit();
}else{
	$data = mysql_fetch_assoc($exec);
			  ?>

<link type="text/css" rel="stylesheet" href="font.css">
<script type="text/javascript" src="include/function_panier.js"></script>
<script type="text/javascript">
	var GB_ROOT_DIR = "./greybox/";
</script>
<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />

        	  <table width="100%" border="0" cellpadding="3" cellspacing="0" style="background:url(images/fond_detail.gif) repeat-x">
                <tr>
                  <td align="left"><img src="images/titre_fiche_produit.gif" /></td>
                </tr>
                <tr>
                  <td align="left" class="text">&nbsp;&nbsp;<a href="index.php" class="text">Accueil</a><?=$texte_fil?></td>
                </tr>
                <tr>
                  <td><table align="center" height="273" width="756" border="0" cellspacing="0" cellpadding="0" class="text">
                    <tr>
                      <td valign="top">
                      
                      	<table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" class="text">
                        <tr valign="top">
                          <td align="center">&nbsp;</td>
                          <td></td>
                          <td align="center" valign="top">&nbsp;</td>
                        </tr>
                        <tr valign="top">
                        <td width="300" align="center">
                        	<p><span class="titre_18">
                        	  <?=stripslashes($data["nom"])?></span></p>
                        	<table width="41" border="0" cellpadding="0" cellspacing="0">
                        	  <tr>
                        	    <td width="9"><img src="images/fiche_ombre_coin_g_h.png" width="9" height="9" /></td>
                        	    <td width="23" background="images/fiche_ombre_h.png"></td>
                        	    <td width="10"><img src="images/fiche_ombre_coin_d_h.png" width="9" height="9" /></td>
                        	    </tr>
                        	  <tr>
                        	    <td background="images/fiche_ombre_g.png"></td>
                        	    <td><table width="85%" border="0" align="center" cellpadding="3" cellspacing="0">
                        	      <tr>
                        	        <td bgcolor="#FFFFFF"><table align="center" border="0" class="text">
                        	          <tr>
                        	            <td align="center" colspan="3"><table align="center" width="260" height="260" cellpadding="0" cellspacing="0" border="0" style="border-color:#540000; border-width:2px; border-style:solid;">
                        	              <tr>
                        	                <td align="center" bgcolor="#FFFFFF"><a href="imagesUp/produits/<?=$data["pcc_id"]?>-1.jpg" rel="gb_imageset[nice_pics]" title="<?=stripslashes($data["nom"])?>">
                        	                  <?
                                    if(file_exists("imagesUp/produits/".$data["pcc_id"]."-1_m2.jpg")){
                                        $size = getimagesize("imagesUp/produits/".$data["pcc_id"]."-1_m2.jpg");
                                        $width = $size[0];
                                        $height = $size[1];
                                        
                                        if($height > $width){
                                            echo '<img src="imagesUp/produits/'.$data["pcc_id"].'-1_m2.jpg" border="0" height="220" />';
                                        }else{
                                            echo '<img src="imagesUp/produits/'.$data["pcc_id"].'-1_m2.jpg" border="0" width="250" />';
                                        }
                                      }else{
                                        echo '<img src="images/img_affaires.jpg" border="0" width="100" />';
                                      }
                                      ?>
                        	                  </a></td>
                        	                </tr>
                        	              </table></td>
                        	            </tr>
                                        
                                        <? if(file_exists("imagesUp/produits/".$data["pcc_id"]."-2_m.jpg") || file_exists("imagesUp/produits/".$data["pcc_id"]."-3_m.jpg")){ ?>
                                        <tr valign="bottom"><td colspan="3"><table width="100%" cellpadding="0" cellspacing="0" align="center"><tr valign="bottom">
                                          <? if(file_exists("imagesUp/produits/".$data["pcc_id"]."-2_m.jpg")){ ?>
                                          <td align="center" class="textrouge"><table align="center" width="85" height="85" cellpadding="0" cellspacing="0" border="0" style="border-color:#540000; border-width:2px; border-style:solid;">
                        	              <tr>
                        	                <td align="center" bgcolor="#FFFFFF"><a href="imagesUp/produits/<?=$data["pcc_id"]?>-2.jpg" rel="gb_imageset[nice_pics]" title="<?=stripslashes($data["nom"])?>">
                        	                  <?
                                                $size = getimagesize("imagesUp/produits/".$data["pcc_id"]."-2_m.jpg");
                                                $width = $size[0];
                                                $height = $size[1];
                                                
                                                if($height > $width){
													echo '<img src="imagesUp/produits/'.$data["pcc_id"].'-2_m.jpg" border="0" height="75" />';
                                                }else{
													echo '<img src="imagesUp/produits/'.$data["pcc_id"].'-2_m.jpg" border="0" width="75" />';
                                                }
                                            ?>
                        	                  </a></td>
                        	                </tr>
                        	              </table></td>
                                          <? } ?>
                                          <? if(file_exists("imagesUp/produits/".$data["pcc_id"]."-3_m.jpg")){ ?>
                                          <td align="center" class="textrouge"><table align="center" width="85" height="85" cellpadding="0" cellspacing="0" border="0" style="border-color:#540000; border-width:2px; border-style:solid;">
                        	              <tr>
                        	                <td align="center" bgcolor="#FFFFFF"><a href="imagesUp/produits/<?=$data["pcc_id"]?>-3.jpg" rel="gb_imageset[nice_pics]" title="<?=stripslashes($data["nom"])?>">
                        	                  <?
                                                $size = getimagesize("imagesUp/produits/".$data["pcc_id"]."-3_m.jpg");
                                                $width = $size[0];
                                                $height = $size[1];
                                                
                                                if($height > $width){
													echo '<img src="imagesUp/produits/'.$data["pcc_id"].'-3_m.jpg" border="0" height="75" />';
                                                }else{
													echo '<img src="imagesUp/produits/'.$data["pcc_id"].'-3_m.jpg" border="0" width="75" />';
                                                }
                                            ?>
                        	                  </a></td>
                        	                </tr>
                        	              </table></td>
                                          <? } ?>
                                          </tr></table></td></tr>
                                          <? } ?>
                        	          <?
								$query2 = "SELECT pc.id, ca.nom FROM produits_capacite pc LEFT OUTER JOIN capacite ca ON pc.rid_capacite = ca.id WHERE pc.rid_prod = '".addslashes($_GET["p"])."' ORDER BY ca.nom";
								$exec2 = mysql_query($query2) or die(mysql_error());
								
								$j=0;
								while($data2 = mysql_fetch_row($exec2))
								{
									$query3 = "SELECT id FROM produits_capacite_couleur WHERE produits_capacite = '".$data2[0]."' AND id <> '".$data["pcc_id"]."'";
									//echo $query3."<br>";
									$exec3 = mysql_query($query3) or die(mysql_error());
									while($data3 = mysql_fetch_row($exec3))
									{
										if($j%3 == 0){
											?><tr valign="top"><?
										}
										?>
                        	            <td align="center" class="textrouge"><table align="center" width="72" height="72" cellpadding="0" cellspacing="0" border="0" style="border-color:#540000; border-width:2px; border-style:solid;">
                        	              <tr>
                        	                <td align="center" bgcolor="#FFFFFF"><a href="produit-<?=strtolower(url_rewrite(stripslashes($data["nom"])))?>,<?=$_GET["p"]?>,<?=$data3[0]?>.html">
                        	                  <?
											if(file_exists("imagesUp/produits/".$data3[0]."-1_m.jpg")){
                                                $size = getimagesize("imagesUp/produits/".$data3[0]."-1_m.jpg");
                                                $width = $size[0];
                                                $height = $size[1];
                                                
                                                if($height > $width){
													echo '<img src="imagesUp/produits/'.$data3[0].'-1_m.jpg" border="0" height="60" />';
                                                }else{
													echo '<img src="imagesUp/produits/'.$data3[0].'-1_m.jpg" border="0" width="60" />';
                                                }
                                              }else{
                                                echo '<img src="images/img_affaires.jpg" border="0" width="60" />';
                                              }
                                            ?>
                        	                  </a></td>
                        	                </tr>
                        	              </table>
                        	              <?=stripslashes($data2[1])?></td>
                        	            <?
										$j++;
										if($j%3 == 0){
											?></tr><?
										}
									}
								}
								?>
                        	          </table></td>
                        	        </tr>
                        	      </table></td>
                        	    <td background="images/fiche_ombre_d.png"></td>
                        	    </tr>
                        	  <tr>
                        	    <td><img src="images/fiche_ombre_coin_g_b.png" width="9" height="9" /></td>
                        	    <td background="images/fiche_ombre_b.png"></td>
                        	    <td><img src="images/fiche_ombre_coin_d_b.png" width="9" height="9" /></td>
                        	    </tr>
                      	  </table>
                        	<p>
                            <table align="center" class="text">
                            <tr><td><a href="produit_envoi.php?p=<?=$data["id_prod"]?>&pcc=<?=$data["pcc_id"]?>"><img src="images/picto_envoyer_ami.png" title="Recommander à un ami" alt="Recommander à un ami" border="0" /></a></td><td><iframe src="http://www.facebook.com/plugins/like.php?href=http://www.leplaisirdoffrir.fr/produit-<?=strtolower(url_rewrite(stripslashes($data["nom"])))?>,<?=$data["id_prod"]?>,<?=$data["pcc_id"]?>.html&amp;layout=button_count&amp;show_faces=true&amp;width=100&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></td><td><a href="#" onClick="return fbs_click()"><img src="images/picto_fb.png" title="Partager le produit sur Facebook" width="32" border="0" /></a></td><td><img src="images/picto_livraison.png" width="56" height="56" title="Délai de livraison" align="absmiddle"/></td><td><?=stripslashes($data["delai_livraison"])?></td></tr>
                            </table>
                            
                        	  <br />
                              <?
                              $query2 = "SELECT c.* FROM produits_carac pc, caracteristique c WHERE pc.rid_prod = '".addslashes($_GET["p"])."' AND pc.rid_carac = c.id";
							//echo $query2;
							$exec2 = mysql_query($query2) or die(mysql_error());
							
							if(mysql_num_rows($exec2) > 0)
							{
								$j=1;
								while($data2 = mysql_fetch_row($exec2))
								{
									$tab_carac["id"] = stripslashes($data2[0]);
									$tab_carac["nom"] = stripslashes($data2[1]);
									echo "<img src='imagesUp/caracteristiques/".$data2[0].".jpg' title='".stripslashes($data2[1])."' />";
									if($j==5){
										echo "<br>";
									}else{
										echo " &nbsp;&nbsp;";
									}
									$j++;
								}
							}
							?>
                        	  <br />
                      	  <? if($data["ecologique"] == "1"){ ?>
                            <br /><img src="images/ecolo.png" />
                            <? } ?>
                            <? if($data["offre5_6"] == "1"){ ?>
                            <img src="images/5_6.png" />
                            <? } ?>
                            <? if($data["offre10_12"] == "1"){ ?>
                            <img src="images/10_12.png" />
                            <? } ?>
                        	</p>
                            
                            <?
                            if($data["prod_asso"] != "")
							{
								$tab_prodasso = split(";", $data["prod_asso"]);
								?>
                                <table width="85%" border="0" align="center" cellpadding="3" cellspacing="0">
                                  <tr>
                                    <td align="center" colspan="3" style="font-size:14px"><b class="titre"><img src="images/titre_pdts_associes.png" width="163" height="27" /></b></td>
                                  </tr>
                                  <tr height="8">
                                    <td></td>
                                  </tr>
                                  <?
								for($i=0 ; $i<count($tab_prodasso) ; $i++)
								{
                                	$query_pa = "SELECT p.*, pc.*, pcc.*, p.id_prod as id_prod, pc.id as pc_id, pcc.id as pcc_id, ca.nom as capacite FROM produits p, produits_capacite pc LEFT OUTER JOIN capacite ca ON pc.rid_capacite = ca.id, produits_capacite_couleur pcc WHERE p.afficher = '1' AND pcc.ref = '".addslashes($tab_prodasso[$i])."' AND p.id_prod = pc.rid_prod AND pc.id = pcc.produits_capacite";
									//echo $query_pa;
									$exec_pa = mysql_query($query_pa) or die(mysql_error());
									$data_pa = mysql_fetch_assoc($exec_pa);
									
									if($i%3 == 0){
										?>
                                  <tr valign="top">
                                    <?
                                    }
									?>
                                    <td width="33%" height="216" align="center" class="textrouge" style="font-size:10px"><table height="229" width="110" border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td width="9" height="9"><img src="images/fiche_ombre_coin_g_h.png" width="9" height="9" /></td>
                                        <td width="92" background="images/fiche_ombre_h.png"></td>
                                        <td width="9"><img src="images/fiche_ombre_coin_d_h.png" width="9" height="9" /></td>
                                      </tr>
                                      <tr>
                                        <td rowspan="2" background="images/fiche_ombre_g.png"></td>
                                        <td align="center" valign="top" bgcolor="#C12A2C"><br />
                                          <table align="center" width="72" height="72" cellpadding="0" cellspacing="0" border="0" style="border-color:#540000; border-width:2px; border-style:solid;">
                                            <tr>
                                              <td align="center" bgcolor="#FFFFFF"><a href="produit-<?=strtolower(url_rewrite(stripslashes($data_pa["nom"])))?>,<?=$data_pa["id_prod"]?>,<?=$data_pa["pcc_id"]?>.html">
                                                <?
                                        if(file_exists("imagesUp/produits/".$data_pa["pcc_id"]."-1_m.jpg")){
                                            $size = getimagesize("imagesUp/produits/".$data_pa["pcc_id"]."-1_m.jpg");
                                            $width = $size[0];
                                            $height = $size[1];
                                            
                                            if($height > $width){
                                                echo '<img src="imagesUp/produits/'.$data_pa["pcc_id"].'-1_m.jpg" border="0" height="60" />';
                                            }else{
                                                echo '<img src="imagesUp/produits/'.$data_pa["pcc_id"].'-1_m.jpg" border="0" width="60" />';
                                            }
                                          }else{
                                            echo '<img src="images/img_affaires.jpg" border="0" width="60" />';
                                          }
                                        ?>
                                              </a></td>
                                            </tr>
                                          </table>
                                          <span class="textsimple">
                                            <?=stripslashes($data_pa["nom"])?>
                                            <br />
                                            <?=(($data_pa["capacite"]!="") ? stripslashes($data_pa["capacite"])."" : "")?>
                                            
                                          </span></td>
                                        <td width="9" rowspan="2" background="images/fiche_ombre_d.png"></td>
                                      </tr>
                                      <tr>
                                        <td height="64" align="center" valign="bottom" bgcolor="#C12A2C">
                                        <? if($data_pa["prix_solde"] != 0 || $data_pa["prix_promo"] != 0){ ?>
                                        <span class="titre_orange"><strike><?=parsePrix($data_pa["prix"])?>  &euro;</strike></span><br />
                                        <? } ?>
                                        
                                        <table border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td height="19" align="right"><img src="images/produits_g.gif" width="5" height="19" /></td>
                                            <td align="center" class="textrouge" style="background:url(images/produits_fond.gif) repeat-x"><?=(($data_pa["prix_solde"] != 0) ? parsePrix($data_pa["prix_solde"]) : (($data_pa["prix_promo"] != 0) ? parsePrix($data_pa["prix_promo"]) : parsePrix($data_pa["prix"])))?>
                                              &euro; </td>
                                            <td><img src="images/produits_d.gif" width="5" height="19" /></td>
                                          </tr>
                                        </table>
                                        <br /></td>
                                      </tr>
                                      <tr>
                                        <td height="9"><img src="images/fiche_ombre_coin_g_b.png" width="9" height="9" /></td>
                                        <td background="images/fiche_ombre_b.png"></td>
                                        <td><img src="images/fiche_ombre_coin_d_b.png" width="9" height="9" /></td>
                                      </tr>
                                    </table></td>
                                    <?
                                    if(($i+1)%3 == 0){
										?>
                                  </tr>
                                  <?
                                    }
								}
								?>
                                </table>
                              <?
                            }
							?>
                            
                            </td>
                        <td width="5"></td>
                        <td width="451" align="center" valign="top">
                          <table align="center" border="0" width="98%" cellpadding="0" cellspacing="0" class="text">
                            <tr><td>
                            	<table border="0" width="100%" class="text">
                                <tr>
                                  <td width="50%" valign="top"><p><span class="titre_orange_18"><b>
                                    <?=(($data["prix_solde"] != 0) ? "<sup><strike>".parsePrix($data["prix"])."€</strike></sup>&nbsp;&nbsp;&nbsp;".parsePrix($data["prix_solde"])."€" : (($data["prix_promo"] != 0) ? "<sup><strike>".parsePrix($data["prix"])."€</strike></sup>&nbsp;&nbsp;&nbsp;".parsePrix($data["prix_promo"])."€" : parsePrix($data["prix"])."€"))?></b></span></p>
                                      <? if($data["eco_taxe"] != 0){ ?>
                                      <p>+
                                      <?=parsePrix($data["eco_taxe"])?>
                                      d'&eacute;co-participation</p>
                                      <? } ?>
                                    </td>
                                    <td align="center" rowspan="6">
									<?=(($data["aff_img"]=="1" && file_exists("imagesUp/marques/".$data["rid_marque"]."_m.jpg")) ? "<img src='imagesUp/marques/".$data["rid_marque"]."_m.jpg' border='0'>" : "")?>
                                    </td>
                                </tr>
                                <tr>
                                  <td><table width="47%" border="0" cellspacing="0" cellpadding="0">
                                    <? if($data["prix_solde"] != 0){ ?>
                                        <tr>
                                          <td width="51%" align="center"><img src="images/solde.gif" align="absmiddle" /></td>
                                          <td width="49%" align="center"><table width="62" border="0" cellspacing="0" cellpadding="0" style="background:url(images/fond_promo.png) no-repeat">
                                            <tr>
                                              <td width="62" height="58" align="center"><span class="textrouge"><b><?=reduc_pourcent($data["prix"], $data["prix_solde"])?> %</b></span></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        <? }elseif($data["prix_promo"] != 0){ ?>
                                        <tr>
                                          <td align="center"><img src="images/promo.gif" align="absmiddle" /></td>
                                          <td align="center"><table width="62" border="0" cellspacing="0" cellpadding="0" style="background:url(images/fond_promo.png) no-repeat">
                                            <tr>
                                              <td width="62" height="60" align="center" valign="middle"><span class="textrouge"><b><?=reduc_pourcent($data["prix"], $data["prix_promo"])?>%</b></span></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        <? } ?>
                                    </table>
                                    </td>
                                </tr>
                                <? if($data["rid_marque"] != "0"){ ?>
                                <tr>
                                  <td><span class="titre_orange"><b>&bull;</b></span><b> Marque : </b><?=stripslashes($data["marque"])?></td>
                                </tr>
                                <tr height="5"><td></td></tr>
                                <? if(trim($data["des_marque"]) != ""){ ?>
                                <tr>
                                  <td><?=nl2br(stripslashes($data["des_marque"]))?></td>
                                </tr>
                                <tr height="5"><td></td></tr>
                                <? } ?>
                                <? } ?>
                                </table>
                            </td></tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <? if($data["collection"] != ""){ ?>
                            <tr>
                              <td><b><span class="titre_orange"><b>&bull;</b></span><b> </b>Collection : </b><?=stripslashes($data["collection"])?></td>
                            </tr>
                            <tr height="5"><td></td></tr>
                            <? } ?>
                            <? if($data["rid_collection"] != "0"){ ?>
                            <tr>
                              <td><?=nl2br(stripslashes($data["des_collection"]))?></td></tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <? } ?>
                            <tr>
                              <td height="1" bgcolor="#B72436"></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><span class="titre_orange"><b>&bull;</b></span><b> R&eacute;f : </b><?=stripslashes($data["ref"])?></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <? if($data["code_couleur"] != ""){ ?>
                            <tr><td><b><span class="titre_orange"><b>&bull;</b></span><b> </b>Couleur : </b><input type="text" size="2" style="background-color:<?=$data["code_couleur"]?>; border-style:none;" />&nbsp;&nbsp;<?=stripslashes($data["couleur"])?></td></tr>
                            <tr height="10"><td></td></tr>
                            <? } ?>
                            <? if($data["capacite"] != ""){ ?>
                            <tr><td><b><span class="titre_orange"><b>&bull;</b></span><b> </b>Capacité : </b><?=stripslashes($data["capacite"])?></td></tr>
                            <tr height="10"><td></td></tr>
                            <? } ?>
                            <tr><td><b><span class="titre_orange"><b>&bull;</b></span><b> </b>Détail du produit : </b><br /><?=nl2br(html_off(stripslashes($data["des"])))?><br /></td></tr>
                            <? if($data["stock"] == "0"){ ?>
                            <tr><td>&nbsp;</td></tr>
                            <tr><td align="center"><b><i>Le produit est en rupture de stock.</i></b></td></tr>
                            <? }else{ ?>
                            <? } ?>
                            <tr><td>&nbsp;</td></tr>
                            <!--<input type="hidden" name="url" id="url" value="produit_fiche.php?p=<?=$_GET["p"]?><?=((isset($_GET["pcc"]) && $_GET["pcc"] != "") ? "&pcc=".$_GET["pcc"] : "")?>" /> -->
                            <input type="hidden" name="url" id="url" value="voir_panier.php?p=<?=$_GET["p"]?>" />
                            <? if($data["stock"] == "1"){ ?>
                            <? } ?>
                            </table>
                        	<table width="279" border="0" cellspacing="0" cellpadding="0">
                        	  <tr class="text">
                        	    <? if($data["rid_marque"] != "0"){ ?>
                                <td width="141" align="center"><a href="collections-marque-<?=strtolower(url_rewrite(stripslashes($data["marque"])))?>,<?=$data["rid_marque"]?>.html" class="text2"><img src="images/collections.png" width="98" height="98" border="0" alt="<?=stripslashes($data["marque"])?>" /></a></td>
                                <? } ?>
                        	    <td width="138"><table align="center" border="0">
                        	      <tr align="center">
                        	        <td><a href="#" onclick="enlever('qte_<?=$data['pcc_id']?>'); return false;"><img src="images/moins.png" border="0" /></a></td>
                        	        <td><input type="text" name="qte_<?=$data['pcc_id']?>" id="qte_<?=$data['pcc_id']?>" value="1" class="inputtext" size="1" disabled="disabled" /></td>
                        	        <td><a href="#" onclick="ajouter('qte_<?=$data['pcc_id']?>'); return false;"><img src="images/plus.png" border="0" /></a></td>
                      	        </tr>
                        	      <tr height="5">
                        	        <td></td>
                      	        </tr>
                        	      <tr align="center">
                        	        <td colspan="3"><a href="#" onclick="ajoutPanier('<?=$data['pcc_id']?>', 'normal')"><img border="0" src="images/ajout_panier.png"  /></a></td>
                      	        </tr>
                      	      </table></td>
                      	    </tr>
                      	    </table>
                        	<p>&nbsp;</p></td>
                        </tr>
                        </table>
                        <br />
                        
                        <?
						if($data["rid_collection"] != "0")
						{
							$query_col = "SELECT p.*, pc.*, pcc.*, p.id_prod as id_prod, pc.id as pc_id, pcc.id as pcc_id, ca.nom as capacite FROM produits p, produits_capacite pc LEFT OUTER JOIN capacite ca ON pc.rid_capacite = ca.id, produits_capacite_couleur pcc WHERE p.afficher = '1' AND p.rid_collection = '".$data["rid_collection"]."' AND p.id_prod = pc.rid_prod AND pc.id = pcc.produits_capacite ORDER BY p.nom";
							//echo $query_col;
							$exec_col = mysql_query($query_col) or die(mysql_error());
							?>
                            <form name="form_col" action="include/ajout_panier_multiple.php" method="post">
                            <input type="hidden" name="panier_col" value="1" />
                            <input type="hidden" name="url_retour" value="voir_panier.php?p=<?=$_GET["p"]?>" />
                            <table width="95%" align="center" border="0" cellpadding="3" cellspacing="0" class="text">
                            <tr><td align="right"><input type="image" src="images/bton_panier3.gif" /></td></tr>
                            </table>
							<table width="95%" align="center" border="0" cellpadding="3" cellspacing="0" class="text" style="border-color:#000000; border-width:1px; border-style:solid; background:url(images/fond_collection.gif) repeat-x">
							<tr><td colspan="3" align="center" bgcolor="#C1272D" style="padding:5px;"><b class="titre">L'ensemble de la collection &laquo; <?=$data["collection"]?> &raquo;</b></td></tr>
                            <tr height="5"><td></td></tr>
							<?
							while($data_col = mysql_fetch_assoc($exec_col))
							{
								?>
								<tr height="100">
                                <td align="center">
                                	<table border="0" align="center" width="95%" height="100" class="text" style="border-width:1px; border-color:#000000; border-style:solid;">
                                	<tr>
                                        <td width="120" align="center">
                                            <? if($data_col["prix_solde"] != 0){ ?>
                                            <div style="position:absolute; margin-left:8px; margin-top:5px; background-image:url(images/solde.png); width:85px; height:50px;"></div>
                                            <? }elseif($data_col["prix_promo"] != 0){ ?>
                                            <div style="position:absolute; margin-left:8px; margin-top:5px; background-image:url(images/promotion.png); width:85px; height:50px;"></div>
                                            <? } ?>
                                            <table align="center" width="110" height="110" cellpadding="0" cellspacing="0" border="1" style="border-color:#540000; border-width:2px; border-style:solid;">
                                            <tr><td align="center" bgcolor="#FFFFFF">
                                            <a href="produit-<?=strtolower(url_rewrite(stripslashes($data_col["nom"])))?>,<?=$data_col["id_prod"]?>,<?=$data_col["pcc_id"]?>.html" title="<?=stripslashes($data_col["nom"])?>">
                                           <?
                                            if(file_exists("imagesUp/produits/".$data_col["pcc_id"]."-1_m.jpg")){
                                                $size = getimagesize("imagesUp/produits/".$data_col["pcc_id"]."-1_m.jpg");
                                                $width = $size[0];
                                                $height = $size[1];
                                                
                                                if($height > $width){
                                                    echo '<img src="imagesUp/produits/'.$data_col["pcc_id"].'-1_m.jpg" border="0" height="100" />';
                                                }else{
                                                    echo '<img src="imagesUp/produits/'.$data_col["pcc_id"].'-1_m.jpg" border="0" width="100" />';
                                                }
                                              }else{
                                                echo '<img src="images/img_affaires.jpg" border="0" width="100" />';
                                              }
                                              ?>
                                            </a>
                                            </td></tr>
                                            </table>
                                        </td>
                                    	<td>
                                        	<table align="center" border="0" width="100%" class="text">
                                            <tr>
                                            	<td width="43%">
                                                <table align="center" border="0" width="100%" class="text">
                                                <tr><td><a href="produit-<?=strtolower(url_rewrite(stripslashes($data_col["nom"])))?>,<?=$data_col["id_prod"]?>,<?=$data_col["pcc_id"]?>.html" title="<?=stripslashes($data_col["nom"])?>" class="textgris" style="font-weight:bold"><?=stripslashes($data_col["nom"])?></a></td></tr>
                                                <tr><td>Réf : <?=$data_col["ref"]?></td></tr>
                                                <? if($data_col["capacite"] != ""){ ?>
                                                <tr><td><?=$data_col["capacite"]?></td></tr>
                                                <? } ?>
                                                <tr><td>Délai de livraison : <?=$data_col["delai_livraison"]?></td></tr>
                                                </table>
                                                </td>
                                                <td width="33%">
                                                <table align="center" border="0" width="100%" class="text">
                                                <tr>
                                                  <td align="center" class="titre_orange"><span class="textgris"><b>Prix le plaisir d'offrir :<br />
                                                  </b></span><b><?=(($data_col["prix_solde"] != 0) ? "<sup><strike>".parsePrix($data_col["prix"])."€</strike></sup>&nbsp;&nbsp;".parsePrix($data_col["prix_solde"])."€" : (($data_col["prix_promo"] != 0) ? "<sup><strike>".parsePrix($data_col["prix"])."€</strike></sup>&nbsp;&nbsp;".parsePrix($data_col["prix_promo"])."€" : parsePrix($data_col["prix"])."€"))?></b></td></tr>
                                                </table>
                                                </td>
                                                <td width="24%"><table align="center" border="0" width="100%" class="text">
                                                  <? if($data_col["prix_solde"] != 0){ ?>
                                                  <tr>
                                                    <td align="center" class="titre_orange"><img src="images/solde.gif" align="absmiddle" /></td>
                                                  </tr>
                                                  <tr>
                                                    <td height="60" align="center" class="titre_orange"><table width="62" border="0" cellspacing="0" cellpadding="0" style="background:url(images/fond_promo.png) no-repeat">
                                                      <tr>
                                                        <td width="62" height="58" align="center"><span class="textrouge"><b><?=reduc_pourcent($data_col["prix"], $data_col["prix_solde"])?> %</b></span></td>
                                                      </tr>
                                                    </table></td>
                                                  </tr>
                                                  <? }elseif($data_col["prix_promo"] != 0){ ?>
                                                  <tr>
                                                    <td align="center" class="titre_orange"><img src="images/promo.gif" align="absmiddle" /><br />
                                                      <table width="62" border="0" cellspacing="0" cellpadding="0" style="background:url(images/fond_promo.png) no-repeat">
                                                        <tr>
                                                          <td width="62" height="60" align="center" valign="middle"><span class="textrouge"><b><?=reduc_pourcent($data_col["prix"], $data_col["prix_promo"])?>%</b></span></td>
                                                        </tr>
                                                      </table></td>
                                                  </tr>
                                                  <? } ?>
                                                </table></td>
                                            </tr>
                                            </table>
                                      </td>
                                        <td width="120" align="center">
                                        	<? if($data_col["stock"] == "1"){ ?>
                                            <input type="hidden" name="lst_produits[]" value="<?=$data_col["pcc_id"]?>" />
                                            <table align="center" border="0" class="text">
                                            <tr align="center"><td><a href="#" onclick="enlever2('qte_col_<?=$data_col['pcc_id']?>'); return false;"><img src="images/moins.png" border="0" /></a></td><td><input type="text" name="qte_col[]" id="qte_col_<?=$data_col['pcc_id']?>" value="0" class="inputtext" size="1" readonly="readonly" /></td><td><a href="#" onclick="ajouter('qte_col_<?=$data_col['pcc_id']?>'); return false;"><img src="images/plus.png" border="0" /></a></td></tr>
                                            <tr height="5"><td></td></tr>
                                            <tr align="center"><td colspan="3"><input type="image" src="images/ajout_panier.png" onclick="ajoutPanier('<?=$data_col['pcc_id']?>')" /></td></tr>
                                            </table>
                                            <?
                                            }else{
                                            echo "Rupture de stock";
											}
                                            ?>
                                        </td>
                                    </tr>
                                    </table>
                                </td>
                                </tr>
								<?
							}
							?>
                            <tr><td>&nbsp;</td></tr>
							</table>
                            <table width="95%" align="center" border="0" cellpadding="3" cellspacing="0" class="text">
                            <tr><td align="right"><input type="image" src="images/bton_panier3.gif" /></td></tr>
                            </table>
                            </form>
                            <br />
							<?
						}
						else
						{//pas de collection, on affiche le top des ventes
							$cat = $data_fil["id_cat"];
							require("include/top_vente.php");
						}
						?>
                      
                      </td>
                    </tr>
                  </table></td>
                  </tr>
              </table>
              <? }//fin si produit existe ?>
              
              </td>
            </tr>
          </table></td>
        </tr>
        </table>
        
      </td>

<?
include('bas.php');
?>