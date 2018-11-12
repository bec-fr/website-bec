<!DOCTYPE html>
<? include("connect.php"); ?>
<html lang="fr">
    <head>    
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />	
        <title>Offres speciales pour des voyages linguistiques à l'etranger pour etudiants - Bec sejours linguistiques</title>  
      
        <meta name="description" content="Promotions, réductions et offres spéciales pour nos voyages linguistiques à l'étranger pour étudiants">
        <meta name="author" content="BEC sejours linguistiques">  
        
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
        
     
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
		
    </head>
<? include("top_adultes.php"); ?>
           <!-- Section Title -->
            <div class="section_title features">
                <div class="container">
                    
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
                                        <section class="row padding_top">
                        <!-- Properties -->
                        <div class="col-md-9">
                            <!-- Contenu-->
							  <h1>OFFRES SPÉCIALES - ECOLES DE LANGUE ETUDIANTS & ADULTES</h1>
								Le BEC vous propose régulièrement des offres spéciales  sur de nombreuses destinations pour étudiants et adultes<br>
								Consultez la liste ci-dessous et préparez votre séjour linguistique au meilleur prix.<br><br>
								
								
								
								<?
														  $query2 = "SELECT * FROM promo_adultes  WHERE afficher ='1' ORDER BY pays";
														  $exec2 = mysql_query($query2) or die(mysql_error());
														  while($data2 = mysql_fetch_assoc($exec2)){
															  ?>
														  
													  <div class="accordion-trigger">


													 <div class="col-md-8">
													  <?=stripslashes($data2["titre"])?>
													  </div>
													  
													  <? $id_reduc = stripslashes($data2["id"]);
													  // on fait une recherche pour faire le lien
														
														  $query4 = "SELECT * FROM reductions_adultes_sejours ras INNER JOIN  promo_adultes pmo ON  ras.reduction_adulte = '".$id_reduc."'  WHERE pmo.afficher ='1' limit 1 ";														  
														 
														  $exec4 = mysql_query($query4) or die(mysql_error());
														  while($data4 = mysql_fetch_assoc($exec4)){
															  ?>
															  
													   <? $id_sejour = stripslashes($data4["sejour"])?>
													  
													  <?
														  }
														  ?>
													  
													  
													  <? $id_pays = stripslashes($data2["pays"])?>
													
													  
													   <? $id_image = stripslashes($data2["id"])?>													 
													  
													  <?$query3 = "SELECT * FROM pays where id = '".$id_pays."'";
														  $exec3 = mysql_query($query3) or die(mysql_error());
														  while($data3 = mysql_fetch_assoc($exec3)){
															  ?>
															  <?=stripslashes($data3["nom"])?>
															   <?
														  }
														  ?>
															  
															 
													</div>
														
														<div class="accordion-container"> 

							<article class="item_property_h"  class="col-md-4 col-sm-5">
                                <div class="col-md-4 hidden-xs">
                                    <div class="image_property_h">                            
                                        <div class="hover_property_h">
                                           
										  <img class="img-responsive" src="imagesUp/promos/<?=$id_image?>_c.jpg" border="0">
                                                                                     
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="info_property_h">
                                        
										                                        <?=stripslashes($data2["description"])?><br> <a href="fiche.php?fiche=<?=$id_sejour?>">En savoir plus sur ce séjour</a></p>
                                    </div>
                                </div>
                                
                            </article>
                            <!-- End item_property_h-->

													
                                 
                              </div>
													   
															
														
														                 
													  
													  <?
														  }
														  ?>
								
								
								
                                  
                                 
                                    
						</div>               
                        <!-- fin contenu -->
						<!-- Aside -->
						<? include("droite_adultes.php"); ?>                        
						
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					
            </section>
            <!-- End content info-->

 <? include("footer.php"); ?>        