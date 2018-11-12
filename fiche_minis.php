<!DOCTYPE html>
<? include("connect.php"); ?>
<? $query_d = "SELECT fm.*, fm.pays as idpays, p.nom as pays, v.nom as ville, v.id as idville FROM fiche_minis fm INNER JOIN minis_pays p ON fm.pays = p.id INNER JOIN minis_ville v ON fm.ville = v.id WHERE fm.id = '".addslashes($_GET["fiche"])."' AND fm.afficher = '1'";
$exec_d = mysql_query($query_d) or die(mysql_error());
if(mysql_num_rows($exec_d) == 0){
	echo "<script>document.location.href='index_minis.php';</script>";
	exit();
}

$data_d = mysql_fetch_assoc($exec_d);

if(strpos($_SERVER['REQUEST_URI'],"fiche_minis")!=false){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: voyage-scolaire-circuit-linguistique-".url_rewrite(trim(strtolower(stripslashes($data_d["nom"])))).",".$data_d["id"].".html");
	exit();

}

$fil_ariane .= "<a href='voyages-scolaires-et-circuits-linguistiques.html' class='texteBleu'>Voyage scolaire</a>";
$fil_ariane .= " / <a href='voyages-scolaires-circuits-linguistiques-".url_rewrite(trim(strtolower(stripslashes($data_d["pays"])))).",".$data_d["idpays"].".html' class='texteBleu'>Voyage scolaire ".stripslashes($data_d["pays"])."</a>";
$fil_ariane .= " / <a href='voyage-scolaire-circuit-linguistique-".url_rewrite(trim(strtolower(stripslashes($data_d["pays"]))))."-".url_rewrite(trim(strtolower(stripslashes($data_d["nom"])))).",".$data_d["id"].".html' class='texteBleu'>".stripslashes($data_d["nom"])."</a>";
$title="Voyage scolaire et sejour linguistique ".stripslashes($data_d["pays"])." ".stripslashes($data_d["nom"]);


if($data_d["idpays"] != "0"){
	$_GET["pays"] = $data_d["idpays"];
}

if($data_d["idville"] != "0"){
	$_GET["ville"] = $data_d["idville"];
}

?>
<html lang="fr">
    <head>  
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Voyage scolaire <?=($data_d["pays"])?> <?=($data_d["nom"])?></title> 
		<meta name="keywords" content="séjours linguistique,voyage scolaire,<?=stripslashes($data_d["nom"])?>,<?=stripslashes($data_d["pays"])?>" />
        <meta name="description" content="Votre voyage scolaire et séjour linguistique <?=stripslashes($data_d["nom"])?> - <?=stripslashes($data_d["pays"])?> ">
        <meta name="author" content="Bec séjours linguistiques">  
        
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
		
		
    </head>
<? include("top_scolaires.php"); ?>
           <!-- Section Title -->
            <div class="section_title scolaires">
                <div class="container">
                    <div class="row"> 
						
                        <div class="col-md-10"><br>
                           
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
										<span><?=($fil_ariane)?></span>				
                                </div>								
                            </div>
                        </div>
                    </div>
                  <!-- End Newsletter Box -->
					<!-- contenu-->
                    <div class="row padding_top">
						<div class="col-md-8">
							<div class="row">                                        
                                        <div class="col-md-12">  
											<div class="more_slide tooltip_hover">							     
									<ul>
									<li title="Contacter un conseiller" data-toggle="tooltip"><i class="fa fa-phone"></i><a href="contact.php">Contact</a></li>
                                   
											</div>                           
											
                                        </div>										
                              </div>   	
                          <!-- Slide photos-->  
							<?
							if(isset($_GET["fiche"]) && $_GET["fiche"] != "")
							{
							$query2 = "SELECT fm.* FROM fiche_minis fm WHERE fm.id = '".addslashes($_GET["fiche"])."'";
							}
							//echo $query2;
							$exec2 = mysql_query($query2) or die(mysql_error());
							$data2 = mysql_fetch_assoc($exec2);
							?>							
                            <div class="camera_wrap" id="slide_details">
							<?
							for($i=0 ; $i<10 ; $i++){	
								if(file_exists("imagesUp/".$rep_image."/".$data2["id"]."-".($i+1)."_m.jpg")){	
									  ?>
							
							
                                <!-- image -->  								
								 <div data-src="imagesUp/<?=$rep_image?>/<?=$data2["id"]?>-<?=($i+1)?>.jpg"  border="0" alt=""  />						
								
                                    <div class="camera_property fadeFromBottom">
										
                                        <a href="#"><h4><?=$data2["img_leg".($i+1).""]?></h4></a>                                            
                                    </div>
                                </div>
                                <!-- fin image -->  
                                 <?
									}							
								}
								?>   
                            </div>
                            <!-- End Slide-->  
                         </div>
					
                        <div class="col-md-4">
						
							 <div class="description">   
								<span class="titre">							
						
						 <h1> <?=stripslashes($data_d["pays"])?> - <?=stripslashes($data_d["nom"])?></h1>														
								
							</span>  
							<div class="info_team">
                                    <h4><?=stripslashes($data_d["soustitre"])?></h4>														   
                                </div>  
								<span class="titre"><i class="fa fa-calendar"></i>&nbsp;Formule</span>
							 <?

                                        $query2 = "SELECT f.nom, f.description FROM fiche_minis_formule fmf, formule_minis f WHERE fiche_minis = '".$data_d["id"]."' AND fmf.formule = f.id";
										$exec2 = mysql_query($query2) or die(mysql_error());
										$tab = array();
										$i=1;

										while($data2 = mysql_fetch_row($exec2)){

											$tab[] = "<li><a href='#' onclick='return false;' onmouseover='aff(\"formule_".$i."\");' onmouseout='cache(\"formule_".$i."\");' class='lienGris2'>".stripslashes($data2[0])."</a></li>";										

											$i++;

										}

										?>
							
									<ul><?=implode(", ", $tab)?></ul>	
								<br>
							  <span class="titre"><i class="fa fa-home"></i>&nbsp;Hébergements proposés</span>
							  <ul>  
							
										<?

									  // selction pour les tarifs saisis $query2 = "SELECT * FROM hebergement_minis WHERE id IN (SELECT rid_hebergement FROM fiche_minis_tarif WHERE rid_fiche_minis = '".$data_d["id"]."') ORDER BY nom";
									$query2 = "SELECT * FROM hebergement_minis WHERE id IN (SELECT hebergement FROM fiche_minis_hebergement fmh WHERE fmh.fiche_minis = '".$data_d["id"]."') ORDER BY nom";	
									  //echo $query2."<br>";
									  $exec2 = mysql_query($query2) or die(mysql_error());
									  if(mysql_num_rows($exec2) > 0){

									  ?>                                       

                                      <?

									  while($data2 = mysql_fetch_assoc($exec2)){

										  ?>
										 <li><?=stripslashes($data2["nom"])?></li>
										 
										 
																		 
										 
										  <?
		
									  }

									  ?>
										</ul> 		 
										<span class="titre">	 <b>A partir de:</b> 							 
										 <?=minis_prix_a_partir_de($data_d["id"], $data2["id"])?> €
										 </span>		
                                         
									  <br>
										<i><?=$data_d["tarif_nbjour_min"]?>PC dans la région de <?=stripslashes($data_d["ville"])?></i>
                                 <? } ?>
									<br><br>
					<diV class="button"><a class="bouton" href="devis_minis.php?sejour=<?=$data_d["id"]?>"><i class="fa fa-book"></i>&nbsp;Mon devis personnalisé</a></div>										  
									
									 </div>
									  
							
							</div>	
						 
                       
                    </div><br>

                      <!-- Tabs Detail Properties -->
                    <div class="row padding_top">
                        <div class="col-md-9">
                            <!--NAV TABS-->
                            <ul class="tabs"> 
                                <li><a href="#tab1">Suggestion de programme</a></li>
								<? if ($data_d["options"] !=""){?>	
								
								<li><a href="#tab3">
									<? if ($data_d["options_titre"] !="")
									{									
									echo stripslashes($data_d["options_titre"]);
									}
									else
									{ 
									echo "Options"; 
									} ?>
									
									
									</a>
									</li>
									
								<? } ?>
									
								<? if ($data_d["special"] !=""){?>	
								<li><a href="#tab4"><?=stripslashes($data_d["special_titre"])?></a></li>
								<? } ?>
								<li><a href="#tab2"><i class="fa fa-book"></i> Estimation Tarifaire</a></li>		

								
								
                            </ul>                       
                                        
                            <!--CONTAINER TABS-->   
                            <div class="tab_container"> 
                                <!--Tab1 Genral info-->    
								<div id="tab1" class="tab_content">
                                    <div class="row">                                        
                                        <div class="col-md-12">  	
								  <p><?=(stripslashes($data_d["description"]))?></p>
										</div>
								  </div>
								</div>
							 <!--Tab2 Genral info-->    
								<div id="tab2" class="tab_content">
                                    <div class="row">                                        
                                        <div class="col-md-12 embed-responsive embed-responsive-16by9"> 
									<iframe class="embed-responsive-item" src="estimation_minis.php?fiche=<?=$data_d["id"]?>"></iframe>	
										</div>
								  </div>
								</div>						  
								<div id="tab3" class="tab_content">
                                    <div class="row">                                        
                                        <div class="col-md-12"> 
									 <p><?=(stripslashes($data_d["options"]))?></p>
										</div>
									</div>
								</div>
								
								<? if ($data_d["special"] !=""){?>	
								<div id="tab4" class="tab_content">
                                    <div class="row">                                        
                                        <div class="col-md-12"> 
									 <p><?=(stripslashes($data_d["special"]))?></p>
										</div>
									</div>
								</div>
								<? } ?>



								
                             
                             </div>
                             
						
                        
						
						<!-- call to action bas -->
						<br>
						
						<!-- fin call to action bas -->
						
						
						</div>
					
						<!-- Aside -->
						<? $hide = '1';?>
						<? include("droite_scolaires.php"); ?>    
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->
		
					
            </section>
            <!-- End content info-->
 <? include("footer_scolaires.php"); ?>          
			
