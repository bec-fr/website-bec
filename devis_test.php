<!DOCTYPE html>
<? include("connect.php"); ?>

<head>        
        <title>Bec s�jours linguistiques adultes - Devis pour un s�jour �tudiant adultes</title>  
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="BEC S�jour linguistiques">
        <meta name="author" content="iwthemes.com">  
        
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">
        <!-- Your styles -->
        <link href="css/style.css" rel="stylesheet" media="screen">  

        <!-- Skins Theme -->
        <link href="#" rel="stylesheet" media="screen" class="skin">

        <!-- Favicons -->
        <link rel="shortcut icon" href="img/icons/favicon.ico">
        <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">  

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- styles for IE -->
        <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />
        <![endif]-->
        
        <!-- Skins Changer-->		
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script>
	function verifForm(){
		a="0";
		
		if (document.form.destination.value.length == 0) {alert('Vous n\'avez pas renseign� votre destination.'); a="1"; document.form.destination.focus();}
		else if (document.form.formule.value.length == 0) {alert('Vous n\'avez pas renseign� votre formule.'); a="1"; document.form.formule.focus();}
		else if (document.form.hebergement.value.length == 0) {alert('Vous n\'avez pas renseign� votre h�bergement.'); a="1"; document.form.hebergement.focus();}
		
		if (a == 0) {
			document.form.ok.value = "1";
			document.form.submit();
		}
	}
</script>
</head>
<? include("top_adultes.php"); ?>
 <!-- Section Title -->
            <div class="section_title features">
                <div class="container">
                    <div class="row"> 
						
                        <div class="col-md-10"><br>
                            <h1> Demander un devis pour un s�jour �tudiant adulte</h1>
                        </div> 
						<div class="col-md-2"></div>						
                    </div>
                </div>            
            </div>
            <!-- End Section Title -->
			
            <!-- End content info -->
            <section class="content_info">	
                <div class="container">
					<!-- Newsletter Box -->                  
                    <div class="newsletter_box">
                        <div class="container">
                            <div class="row">
                              <div class="col-md-9 titre"> 
										<span><a href='sejours-linguistiques-pour-etudiants-adultes.html' class='texteBleu'>S�jour Linguistique Adulte</a>  / Etablir un devis</a></span>			
                                </div>								
                            </div>
                        </div>
                    </div>
                    <!-- End Newsletter Box -->
                                        <section class="row padding_top">
                        <!-- Properties -->
                        <div class="col-md-9">


						
                                  
<?
if(isset($_POST["ok"]) && $_POST["ok"] == 1){
	$date_debut = ($_POST["annee"])."-".($_POST["mois"])."-".($_POST["jour"]);
	
	
	/*$query = "INSERT INTO devis (destination, formule, hebergement, nb_sem, date_debut, frais_adm, ass_annulation, ass_interruption, total, datetime) VALUES ('".addslashes($_POST["destination"])."', '".addslashes($_POST["formule"])."', '".addslashes($_POST["hebergement"])."', '".addslashes($_POST["nb_sem"])."', '".addslashes($date_debut)."', '1', '".addslashes($_POST["ass_annulation"])."', '".addslashes($_POST["ass_interruption"])."', '".addslashes($_POST["total"])."', '".date("Y-m-d H:i:s")."')";
	mysql_query($query) or die(mysql_error());*/
	
	$_SESSION["devis_destination"] = $_POST["destination"];
	$_SESSION["devis_formule"] = $_POST["formule"];
	$_SESSION["devis_hebergement"] = $_POST["hebergement"];
	$_SESSION["devis_nb_sem"] = $_POST["nb_sem"];
	$_SESSION["devis_date_debut"] = $date_debut;
	$_SESSION["devis_frais_adm"] = "1";
	$_SESSION["devis_ass_annulation"] = $_POST["ass_annulation"];
	$_SESSION["devis_ass_interruption"] = $_POST["ass_interruption"];
	$_SESSION["devis_ass_assistance"] = $_POST["ass_assistance"];
	$_SESSION["devis_total"] = $_POST["total"];
	
	echo "<script>document.location.href='devis2.php';</script>";
}else{

?>
<br />
                                                  
              
                  <form class="form-horizontal" action="" method="post" name="form">
                    <input type="hidden" value="0" name="ok" />
					
					 <div class="titles">
                        <h2>&nbsp;Etablir un devis pour un s�jour �tudiant adulte 1/2</h2>
                               
					</div>
					<div class="search_box2">
					<h3>1- Choisissez votre destination, une formule et un mode d'h�bergement</h3>
					<div class="form-group">
							<label class="col-sm-3 control-label">Destination/Ecole* </label>
							<div class="col-sm-9">
							<select name="destination" class="select" style="width:400px;" onchange="document.form.submit()"><option value="">- - -</option>
                        <?
                        $query = "SELECT fea.*, p.nom as pays, v.nom as ville FROM fiche_etudiant_adulte fea INNER JOIN pays p ON fea.pays = p.id INNER JOIN ville v ON fea.ville = v.id WHERE 1 ORDER BY p.nom, v.nom, fea.nom";
						$exec = mysql_query($query) or die(mysql_error());
						while($data = mysql_fetch_assoc($exec))
						{
							echo "<option value='".$data["id"]."'";
							if(isset($_POST["destination"]) && $_POST["destination"] == $data["id"])
								echo " selected";
							echo ">".stripslashes($data["pays"])." ".stripslashes($data["ville"])." - ".stripslashes($data["nom"])."</option>";
							
							
						}
						?>
                    </select>
							</div>
					</div>
					<?
					if(isset($_POST["destination"])) 
					{
					$voyage= ($_POST["destination"]) ;
					}
					else
					{
					$voyage = 0;
					}
					
					// on recupere le taux et le symbole selon la destination
					$query4 = "SELECT symbole,taux FROM devise dev INNER JOIN fiche_etudiant_adulte fea ON fea.devise = dev.id  WHERE fea.id = '".$voyage."'";
							$exec4 = mysql_query($query4) or die(mysql_error());
							$data4 = mysql_fetch_assoc($exec4);
										{
										$symbole =($data4["symbole"]);
										$taux = ($data4["taux"]);										
										
										// si pas en euro, on ajoute 0.2 centimes
										if ($symbole !="�")
											{											
											$taux = $taux + 0.02;	
											}
										
										}
									
					?>					
					<div class="form-group">
							<label  class="col-sm-3 control-label">Formule* </label>
							<div class="col-sm-9"><select name="formule" class="select" style="width:400px;" onchange="document.form.submit()"><option value="">- - -</option>
                        <?
                        $query = "SELECT * FROM fiche_etudiant_adulte_tarif WHERE nom <> ''";
						if(isset($_POST["destination"]) && $_POST["destination"] != ""){
							$query .= " AND fiche_etudiant_adulte = '".addslashes($_POST["destination"])."'";
						}
						$query .= " ORDER BY id";
						$exec = mysql_query($query) or die(mysql_error());
						while($data = mysql_fetch_assoc($exec))
						{
							echo "<option value='".$data["id"]."'";
							if(isset($_POST["formule"]) && $_POST["formule"] == $data["id"])
								echo " selected";
							echo ">".stripslashes($data["nom"])."</option>";
						}
						?>
                    </select></div>
					</div>
					<div class="form-group">
							<label  class="col-sm-3 control-label">H�bergement* </label>
							<div class="col-sm-9"><select name="hebergement" class="select" onchange="document.form.submit()"><option value="">- - -</option><option value="famille" <?=((isset($_POST["hebergement"]) && $_POST["hebergement"] == "famille") ? " selected" : "")?>>En famille 1/2 pension ch.indiv.</option><option value="residence" <?=((isset($_POST["hebergement"]) && $_POST["hebergement"] == "residence") ? " selected" : "")?>>En r�sidence sans repas ch.indiv.</option></select>
							</div>
						</div>
						
						
					 <?
					$total=0;
					if(isset($_POST["destination"]) && $_POST["destination"] != "" && $_POST["formule"] != "" && $_POST["hebergement"] != ""){
						$query_d = "SELECT * FROM fiche_etudiant_adulte_tarif WHERE id = '".addslashes($_POST["formule"])."'";
						$exec_d = mysql_query($query_d) or die(mysql_error());
						$data_d = mysql_fetch_assoc($exec_d);
						if($_POST["hebergement"] == "residence")
							$total = $data_d["prix_residence"];
						else
							$total = $data_d["prix_famille"];
					}
					?>
					<hr>
					<?if(isset($_POST["destination"]) && $_POST["destination"] != "" && $_POST["formule"] != "" && $_POST["hebergement"] != ""){?>
						<div align="right">Tarif/semaine : <strong><?=parsePrix(round($total, 2))?> <?=$symbole ?></strong> </div><br>
						<h3>2- Indiquez une date de d�part et le nombre de semaines de votre s�jour</b><br><br></h3>
						<div class="form-group">
								
								<label  class="col-sm-3 control-label">Date de d�but :</label>
								<div class="col-sm-4"><select name="jour">
								  <?
							for($i=1 ; $i<=31 ; $i++)
							{
								echo "<option value='".$i."'";
								if(isset($_POST["jour"]) && $_POST["jour"] == $i)
									echo " selected";
								echo ">".$i."</option>";
							}
							?>
								</select>								 
								 <select name="mois" size="1">
								 <?
							for($i=1 ; $i<=12 ; $i++)
							{
								echo "<option value='".$i."'";
								if(isset($_POST["mois"]) && $_POST["mois"] == $i)
									echo " selected";
								echo ">".$i."</option>";
							}
							?>
								</select>								 
								<select name="annee">
								 <?
							for($i=2015 ; $i<=2018 ; $i++)
							{
								echo "<option value='".$i."'";
								if(isset($_POST["annee"]) && $_POST["annee"] == $i)
									echo " selected";
								echo ">".$i."</option>";
							}
							?>
							
								</select></div>	
								
								<label  class="col-sm-2 control-label">Nb semaines </label>
								<div class="col-sm-3"><select name="nb_sem" class="select" onchange="document.form.submit()">
								
							<?
							for($i=0 ; $i<=12 ; $i++)
							{
								echo "<option value='".$i."'";
								if(isset($_POST["nb_sem"]) && $_POST["nb_sem"] == $i)
									echo " selected";
								echo ">".$i."</option>";
							}
							?>
						</select></div>							
								
						</div>
					<?}?>

							
					<?if(isset($_POST["destination"]) && $_POST["destination"] != "" && $_POST["formule"] != "" && (isset($_POST["nb_sem"]) && $_POST["nb_sem"] != "") && $_POST["hebergement"] != "")
					{?>
					<br><b>Suppl�ments obligatoires</b><br>
					<table width="100%" border="0" cellpadding="1" cellspacing="0">
											
				 <?
														  $query = "SELECT * FROM fiche_etudiant_adulte_supplement WHERE 1 AND obligatoire = '1' ";
						if(isset($_POST["destination"]) && $_POST["destination"] != ""){
							$query .= " AND fiche_etudiant_adulte = '".addslashes($_POST["destination"])."'";
						}
						$query .= " ORDER BY nom";
						$exec = mysql_query($query) or die(mysql_error());
														
														  while($data2 = mysql_fetch_assoc($exec)){
															  ?>
													  <tr>
														<td align="left">
														  <?=stripslashes($data2["nom"])?>
													   </td>
														
															<td  align="right">
															
															 <? $prix_supp = stripslashes($data2["tarif"]);
																//echo $prix_supp;
																
																// on prend les caract�res apres l'espace pour le libelle
																if( ($x_pos = strpos($prix_supp, ' ')) !== FALSE )
																{
																$libelle = substr($prix_supp, $x_pos + 1);
																// le prix est donc avant l'espace
																$prix_supp = substr($prix_supp, 0, strpos($prix_supp, " "));
																$total += $prix_supp;
																 $prix_devises = number_format($prix_supp * $taux,0);		
																}
																else
																{
																echo $prix_supp;
																$libelle = "";
																$prix_supp = substr($prix_supp, 0, strpos($prix_supp, " "));
																$total += $prix_supp;
																 $prix_devises = number_format($prix_supp * $taux,0);
																}
																// on supprime la reference � l'euro pour le libelle - � changer
																//if ($symbole =="�")
																//{
																//$x_pos = strpos($libelle, '�');
																//$libelle = substr($libelle, $x_pos);
																//}
																// le prix est donc avant l'espace
																																
																																
																?>
																
																<? if ($prix_supp!='0'){?>
																	<?=$prix_supp?>&nbsp;<?=$symbole ?>	
																	<strong>
																	<? // on affiche eventuelement la conversion en euros
																	if ($symbole !="�"){?>
																	 (<?=$prix_devises ?>&nbsp;�)
																	</strong>
																	 <?}?>
																 <?}?>
																 
															   <strong> <?=$libelle ?> </strong>
															  </td>
														  </tr>                                                                                                      
													  <?
													  $libelle='';
														  }
														  ?>	

				</table>	
							
					
					<?
					if(isset($_POST["nb_sem"])){
						$total = $total*$_POST["nb_sem"];
						$total -= $total*0.0;
					}
					?>
					<hr>
                    <div class="form-group">
							<div  class="col-sm-8"><b>Total en <?=$symbole ?></b><br>Total en � (hors assurances - cours du change: <?= $taux;?>)</div>
							<div align="right" class="col-sm-4">
							 <?=parsePrix(round($total, 2))?> <?=$symbole ?>
					 <br><? if ($symbole !="�"){
					  $prix_devises = parsePrix(round($total*$taux, 2));
					  $total= $prix_devises;
						echo $prix_devises;		
					  }
					  else 
					  {
					  echo parsePrix(round($total, 2));
					  }
					 ?>
					 
						 �&nbsp;
							</div>
					</div>
                  	<div class="form-group">							
					</div>                  
                    
                   
                                                           
                    <? if(isset($_POST["destination"]) && $_POST["destination"] != ""){ ?>
					
                    Pour info, des suppl�ments/r�ductions sont disponibles pour ce s�jour, merci de prendre en consid�ration ceux applicables pour votre choix.
                   
                    <table class="table table-striped" width="100%" border="0" cellpadding="1" cellspacing="0">
											
				 <?
														  $query = "SELECT * FROM fiche_etudiant_adulte_supplement WHERE 1 AND obligatoire = '0' ";
						if(isset($_POST["destination"]) && $_POST["destination"] != ""){
							$query .= " AND fiche_etudiant_adulte = '".addslashes($_POST["destination"])."'";
						}
						$query .= " ORDER BY nom";
						$exec = mysql_query($query) or die(mysql_error());
														
														  while($data2 = mysql_fetch_assoc($exec)){
															  ?>
													  <tr>
														<td align="left">
														  <?=stripslashes($data2["nom"])?>
													   </td>
														
															<td width="200"  align="right">
															
															 <? $prix_supp = stripslashes($data2["tarif"]);
																//echo $prix_supp;
																
																// on prend les caract�res apres l'espace pour le libelle
																if( ($x_pos = strpos($prix_supp, ' ')) !== FALSE )
																{
																$libelle = substr($prix_supp, $x_pos + 1);
																// le prix est donc avant l'espace
																$prix_supp = substr($prix_supp, 0, strpos($prix_supp, " "));
																
																 $prix_devises = number_format($prix_supp * $taux,0);		
																}
																else
																{
																echo $prix_supp;
																$libelle = "";
																$prix_supp = substr($prix_supp, 0, strpos($prix_supp, " "));																
																 $prix_devises = number_format($prix_supp * $taux,0);
																}
																?>
																
																<? if ($prix_supp!='0'){?>
																	<?=$prix_supp?>&nbsp;<?=$symbole ?>	
																	<strong>
																	<? // on affiche eventuelement la conversion en euros
																	if ($symbole !="�"){?>
																	 (<?=$prix_devises ?>&nbsp;�)
																	</strong>
																	 <?}?>
																 <?}?>
																 
															   <strong> <?=$libelle ?> </strong>
															  </td>
														  </tr>                                                                                                      
													  <?
													  $libelle='';
														  }
														  ?>	

				</table>	
                  
                    <? } ?>
					
					                    
					<hr>					
					          
					<h3>3 - Choisissez vos options d'assurance</h3>
					
					 <?
					 
					 //	$soustotal = $total;
                    //if(isset($_POST["ass_interruption"]) && $_POST["ass_interruption"] == "1"){
					//	$total += $soustotal*0.02;}
					?>
					
					
					 <div  align="left" class="form-group">
							<label  class="col-sm-5 control-label">Assurance Medicale/Rapatriement(1)</label>
							<div class="col-sm-4"><input type="checkbox" name="ass_interruption" value="1" <?=((isset($_POST["ass_interruption"]) && $_POST["ass_interruption"] == "1") ? " checked" : "")?> onclick="document.form.ass_annulation.checked = false;document.form.ass_assistance.checked = false;document.form.submit()" /> &nbsp;&nbsp;<strong>2% du total</strong></div>
							<div class="col-sm-3" align="right">
							 <?
							 $soustotal = $total;
							 if(isset($_POST["ass_interruption"]) && $_POST["ass_interruption"] == "1"){
						$assurance =  parsePrix(round($total*0.02,2));
						echo $assurance.' �';
						$total += $soustotal*0.02;
						}
							?> 
							</div>
					</div>   
					
					
					 <div class="form-group">
							<label  class="col-sm-5 control-label">Assurance annulation (2) </label>
							<div class="col-sm-4"><input type="checkbox" name="ass_annulation" value="1" <?=((isset($_POST["ass_annulation"]) && $_POST["ass_annulation"] == "1") ? " checked" : "")?> onclick="document.form.ass_interruption.checked = false;document.form.ass_assistance.checked = false;document.form.submit()" /> &nbsp;&nbsp;<strong>3% du toal</strong></div>
							<div class="col-sm-3" align="right">
							 <?
							 $soustotal = $total;
							 if(isset($_POST["ass_annulation"]) && $_POST["ass_annulation"] == "1"){
						$assurance =  parsePrix(round($total*0.03,2));
						echo $assurance.' �';
						$total += $soustotal*0.03;
						}
							?> 
							</div>
					</div>
										
					 
					 <div class="form-group">
							<label  class="col-sm-5 control-label">Assurance Pack Multirisque (1+2) </label>
							<div class="col-sm-4"><input type="checkbox" name="ass_assistance" value="1" <?=((isset($_POST["ass_assistance"]) && $_POST["ass_assistance"] == "1") ? " checked" : "")?> onclick="document.form.ass_interruption.checked = false;document.form.ass_annulation.checked = false;document.form.submit()" /> &nbsp;&nbsp;<strong>4,5% du total</strong></div>
							<div class="col-sm-3" align="right">
							 <?
							 $soustotal = $total;
							 if(isset($_POST["ass_assistance"]) && $_POST["ass_assistance"] == "1"){
						$assurance =  parsePrix(round($total*0.045,2));
						echo $assurance.' �';
						$total += $soustotal*0.045;
						}
							?> 
							</div>
					</div>
					
					<div class="form-group">
							<div  class="col-sm-8"><b>Frais administratifs du BEC :</b></div>
							<div align="right" class="col-sm-4">							
							<? if ($_POST["nb_sem"] >= 5)
							{
							echo "Offerts";
							}
							else{
							echo "30 �";
							$total += 30;}
							?>
							
							<input type="checkbox" hidden name="frais_adm" value="1" checked="checked" disabled="disabled" /></div>
					</div> 
					
                   <hr>
				   
					 <div align="right"> Total en � (assurances comprises) : <strong><?=parsePrix(round($total, 2))?> �</strong> </div><br>
				   <div><i><font size="-1">Sous r�serve de modifications du programme des cours, du prix et de la disponibilit� - base tarifaire 2015. Les devises �trang�res, selon les CCG (Conditions commerciales g�n�rales), seront converties en euros au cours du jour de la date de l'inscription et peuvent varier, selon les fluctuations du march� des devises, par rapport au cours de change utilis� dans le devis. Le taux de change appliqu� est donc celui de la date d'inscription et BEC S�jours Linguistiques vous garantit un prix fixe qui ne sera pas r�vis� en cas d'augmentation du taux de change. Les devis qui sont manifestement en pr�sence d'une erreur de calcul ne peuvent �tre valables (base des prix: Prix originaux de l'�cole).</font></i></div>
				   <div align="right"><input  align="right" type="submit"  onclick="javascript:verifForm();" class="button" value="Passez � l'�tape 2 (coordonn�es)"></div>	
                 
                  
                  <input type="hidden" name="total" value="<?=$total?>" />
				   <? }
					// si on a choisi une destination
					?>
                  </form>
               
                <? } ?>
                                  
                                
						</div>
                   </div>               
                        <!-- fin contenu -->
						<!-- Aside -->
						<? include("droite_adultes.php"); ?>                        
						
						
                    </div>
                     
            </section>
            <!-- End content info-->

 <? include("footer.php"); ?>          
			
