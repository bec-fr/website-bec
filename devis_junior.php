<!DOCTYPE html>
<? include("connect.php"); ?>
<html lang="fr"> 
<head> 
               <title>Poser une option - Bec s�jours linguistiques</title> 
			  
			   <meta name="description" content="Poser une option pour un s�jour linguistique junior">
			   <meta name="author" content="BEC S�jours linguistiques">  
			   <meta name="robots" content="noindex"> 
			   
<!-- Mobile Metas --> 
       <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">
	   <!-- Your styles -->        <link href="css/style.css" rel="stylesheet" media="screen">          
<!-- Skins Theme -->        <link href="#" rel="stylesheet" media="screen" class="skin">        <!-- Favicons -->        <link rel="shortcut icon" href="img/icons/favicon.ico">        <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">        <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">          <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->        <!--[if lt IE 9]>          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        <![endif]-->        <!-- styles for IE -->        <!--[if lte IE 8]>        <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />        <![endif]-->                <!-- Skins Changer-->        <script type="text/javascript" src="http://www.google.com/jsapi"></script>		    </head><? include("top_juniors.php"); ?><script>	function verifForm(){		a="0";				if (document.form.destination.value.length == 0) {alert('Vous n\'avez pas renseign� votre destination.'); a="1"; document.form.destination.focus();}		else if (document.form.date.value.length == 0) {alert('Vous n\'avez pas renseign� votre date.'); a="1"; document.form.date.focus();}				if (a == 0) {			document.form.ok.value = "1";			document.form.submit();		}	}</script>           <!-- Section Title -->            
<div class="section_title juniors">                <div class="container">                    <div class="row"> 						                        <div class="col-md-10"><br>                            <h1> S�jour Juniors</a>  / Etablir un devis</h1>                        </div> 						<div class="col-md-2"></div>						                    </div>                </div>                        </div>            <!-- End Section Title -->
			            <!-- End content info -->
						<section class="content_info">	
						<div class="container">					<!-- Newsletter Box -->                                      <div class="newsletter_box">                        <div class="container">                            <div class="row">                              
						<div class="col-md-9 titre"> 										<span><?=($fil_ariane)?></span>				                                </div>								                            </div>                        </div>                    </div>                    <!-- End Newsletter Box -->                                        <section class="row padding_top">                        
						<!-- Properties -->                        <div class="col-md-9">                            
						<!-- Contenu-->
						<?if(isset($_POST["ok"]) && $_POST["ok"] == 1){	/*$query = "INSERT INTO devis_junior (destination, date, preacheminement, preacheminement_ville, accueil_paris, gare, ass_annulation, ass_interruption, total, datetime) VALUES ('".addslashes($_POST["destination"])."', '".addslashes($_POST["date"])."', '".addslashes($_POST["preacheminement"])."', '".addslashes($_POST["preacheminement_ville"])."', '".addslashes($_POST["accueil_paris"])."', '".addslashes($_POST["gare"])."', '".addslashes($_POST["ass_annulation"])."', '".addslashes($_POST["ass_interruption"])."', '".addslashes($_POST["total"])."', '".date("Y-m-d H:i:s")."')";	mysql_query($query) or die(mysql_error());*/		$_SESSION["devis_destination"] = $_POST["destination"];	$_SESSION["devis_date"] = $_POST["date"];	$_SESSION["devis_preacheminement"] = $_POST["preacheminement"];	$_SESSION["devis_preacheminement_ville"] = $_POST["preacheminement_ville"];	$_SESSION["devis_accueil_paris"] = $_POST["accueil_paris"];	$_SESSION["devis_gare"] = $_POST["gare"];	$_SESSION["devis_ass_annulation"] = $_POST["ass_annulation"];	$_SESSION["devis_ass_interruption"] = $_POST["ass_interruption"];	$_SESSION["devis_total"] = $_POST["total"];		echo "<script>document.location.href='devis_junior2.php';</script>";}else{		if(isset($_GET["fiche"]) && $_GET["fiche"] != ""){		$_POST["destination"] = $_GET["fiche"];	}	if(isset($_GET["date"]) && $_GET["date"] != ""){		$_POST["date"] = $_GET["date"];	}?><br />                                                                                    
						<form action="" method="post" name="form">
						<input type="hidden" value="0" name="ok" />                   <div class="titles">                                <span>ETAPE 1/2 : Choix du s�jour</span>                                <br>                                <h1><i class="fa fa-edit"></i>&nbsp;Poser une option pour un s�jour junior</h1>                               					</div>                                      <div class="search_box2">						<div class="form-group">							<label class="col-sm-3 control-label">Destination </label>							<div class="col-sm-9"><select name="destination" class="form-control" onchange="document.form.submit()" style="width:450px"><option value="">- - -</option>                        <?                        $query = "SELECT fj.*, p.nom as pays, v.nom as ville FROM fiche_junior fj INNER JOIN junior_pays p ON fj.pays = p.id INNER JOIN junior_ville v ON fj.ville = v.id WHERE 1 ORDER BY p.nom, v.nom, fj.nom";						$exec = mysql_query($query) or die(mysql_error());						while($data = mysql_fetch_assoc($exec))						{							echo "<option value='".$data["id"]."'";							if(isset($_POST["destination"]) && $_POST["destination"] == $data["id"])								echo " selected";							echo ">".stripslashes($data["pays"])." ".stripslashes($data["ville"])." - ".stripslashes($data["nom"])."</option>";						}						?>
						</select>						</div>                    </div>
						<?$total=0;	
						if(isset($_POST["destination"]) && $_POST["destination"] != "")
						{						$query_d = "SELECT * FROM fiche_junior_date WHERE id = '".addslashes($_GET["date"])."'";;	
						$exec_d = mysql_query($query_d) or die(mysql_error());
						$data_d = mysql_fetch_assoc($exec_d);
						$total = $data_d["tarif"];					}					?>					<hr>						<div align="right">
						<label>Tarif: <strong><?=$total?></strong> �</label>													</div>	                                        <div class="form-group">							<label class="col-sm-3 control-label">Date </label>							<div class="col-sm-9"><select name="date" class="select"><option value="">- - -</option>                        <?						$query2 = "SELECT * FROM fiche_junior_date WHERE rid_fiche = '".addslashes($_POST["destination"])."'";						$exec2 = mysql_query($query2) or die(mysql_error());						while($data2 = mysql_fetch_assoc($exec2)){							echo "<option value='".stripslashes($data2["nom"])."'";							if(isset($_POST["date"]) && $_POST["date"] == $data2["id"])								echo " selected";							echo ">".stripslashes($data2["nom"])."</option>";						}												/*if(isset($_POST["destination"]) && $_POST["destination"] != ""){							$tab = split("\r\n", $data_d["dates"]);						}						for($i=0 ; $i<count($tab) ; $i++){							echo "<option value='".stripslashes($tab[$i])."'";							if(isset($_POST["date"]) && $_POST["date"] == $tab[$i])								echo " selected";							echo ">".stripslashes($tab[$i])."</option>";						}*/						?>						</select>						</div>					</div>                    					<br><br>                    <div class="col-sm-12"> <b>Option de transport :</b></div>                    <?                    if(isset($_POST["preacheminement"]) && $_POST["preacheminement"] == "1"){						$total += 150;					}					?>                   <div class="col-sm-12">                      <input type="checkbox" name="preacheminement" value="1" <?=((isset($_POST["preacheminement"]) && $_POST["preacheminement"] == "1") ? " checked" : "")?> onclick="document.form.accueil_paris.checked=false; document.form.accueil_paris_aeroport.checked=false; document.form.submit();" /> &nbsp;Pr�acheminement de Province en Avion/Train depuis                       <select name="preacheminement_ville" class="select"><option value="">- - -</option>                      <?						if(isset($_POST["destination"]) && $_POST["destination"] != ""){							$tab = split("\r\n", $data_d["ville_devis"]);						}						for($i=0 ; $i<count($tab) ; $i++){							if($tab[$i] != ""){								echo "<option value='".stripslashes($tab[$i])."'";								if(isset($_POST["preacheminement_ville"]) && $_POST["preacheminement_ville"] == $tab[$i])									echo " selected";								echo ">".stripslashes($tab[$i])."</option>";							}						}						?>                      </select> &nbsp;&nbsp;<strong>150�</strong>					  					 </div>                    <?                    if(isset($_POST["accueil_paris"]) && $_POST["accueil_paris"] == "1"){						$total += 80;					}					?>                   <div class="col-sm-12">                     <input type="checkbox" name="accueil_paris" value="1" <?=((isset($_POST["accueil_paris"]) && $_POST["accueil_paris"] == "1") ? " checked" : "")?> onclick="document.form.preacheminement.checked=false; document.form.accueil_paris_aeroport.checked=false; document.form.submit();" /> &nbsp;Accueil � Paris en Gare de                       <select name="gare" class="select"><option value="">- - -</option><option value="Gare de Lyon" <?=((isset($_POST["gare"]) && $_POST["gare"] == "Gare de Lyon") ? " selected" : "")?>>Gare de Lyon</option><option value="Gare du Nord" <?=((isset($_POST["gare"]) && $_POST["gare"] == "Gare du Nord") ? " selected" : "")?>>Gare du Nord</option><option value="Gare St Lazare" <?=((isset($_POST["gare"]) && $_POST["gare"] == "Gare St Lazare") ? " selected" : "")?>>Gare St Lazare</option><option value="Gare Montparnasse" <?=((isset($_POST["gare"]) && $_POST["gare"] == "Gare Montparnasse") ? " selected" : "")?>>Gare Montparnasse</option></select> &nbsp;&nbsp;<strong>80�</strong>                    </div>                    <?					if(isset($_POST["accueil_paris_aeroport"]) && $_POST["accueil_paris_aeroport"] == "1"){						$total += 120;					}					?>					<div class="col-sm-12">					  <td colspan="2"><input type="checkbox" name="accueil_paris_aeroport" value="1" <?=((isset($_POST["accueil_paris_aeroport"]) && $_POST["accueil_paris_aeroport"] == "1") ? " checked" : "")?> onclick="document.form.preacheminement.checked=false; document.form.accueil_paris.checked=false; document.form.submit();" /> &nbsp;Accueil � Paris � l'a�roport de 					  <select name="aeroport" class="select"><option value="">- - -</option><option value="Charles de Gaulle / Roissy" <?=((isset($_POST["aeroport"]) && $_POST["aeroport"] == "Charles de Gaulle / Roissy") ? " selected" : "")?>>Charles de Gaulle / Roissy</option><option value="Orly" <?=((isset($_POST["aeroport"]) && $_POST["aeroport"] == "Orly") ? " selected" : "")?>>Orly</option></select> &nbsp;&nbsp;<strong>120�</strong>					</div>					<hr>						<div align="right">				                                       Total : <strong><?=$total?></strong> �                   </div>                    <div class="form-group">					                      <strong>Option d'assurances :</strong>					  					 </div> 					                      <?					$soustotal = $total;                    if(isset($_POST["ass_annulation"]) && $_POST["ass_annulation"] == "1"){						$total += $soustotal*0.03;					}					?>                    <tr>                      <td class="text" colspan="2">Assurance annulation : <input type="checkbox" name="ass_annulation" value="1" <?=((isset($_POST["ass_annulation"]) && $_POST["ass_annulation"] == "1") ? " checked" : "")?> onclick="document.form.submit()" /> &nbsp;&nbsp;<strong>3%</strong></td>                    </tr>                    <?                    if(isset($_POST["ass_interruption"]) && $_POST["ass_interruption"] == "1"){						$total += $soustotal*0.045;					}					?>                    <div>                      Pack multirisques : <input type="checkbox" name="ass_interruption" value="1" <?=((isset($_POST["ass_interruption"]) && $_POST["ass_interruption"] == "1") ? " checked" : "")?> onclick="document.form.submit()" /> &nbsp;&nbsp;<strong>4,5%</strong>                    </div>                    <hr>						<div align="right">				                                       Total : <strong><?=parsePrix($total)?></strong> �                   </div>                                       <div>                      Souhaitez vous faire une pr�-inscription (sans paiement) ?                   </div>					<br>						<div align="right"><input  align="right" type="submit"  onClick="javascript:verifForm()" class="button" value="Passer � l'etape 2"></div>                                    <input type="hidden" name="total" value="<?=$total?>" />                  </form>                 </div>                <? } ?>                                                    </div>
						<!-- fin contenu -->						
						<!-- Aside -->						<? include("droite_juniors.php"); ?>                        												                    </div>                     <!-- contenu bas pages sur toute largeur-->										<div class="container"> 					          					                </div>            </section> 
           <!-- End content info--> <? include("footer_juniors.php"); ?>          			