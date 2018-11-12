<!DOCTYPE html>
<? include("connect.php"); ?>
<html lang="fr">
    <head>        
        <title>Bec séjours linguistiques pour adolescents - nos formules</title>  
        <meta name="keywords" content="voyage linguistique" />
        <meta name="description" content="Nos formules de séjours linguistiques pour adolescents ">
        <meta name="author" content="BEC Séjour linguistiques">  
        
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
<? include("top_juniors.php"); ?>
           <!-- Section Title -->
            <div class="section_title juniors">
                <div class="container">
                    <div class="row"> 
						
                        
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
										<span><a href='sejours-linguistiques-pour-adolescents.html' class='texteBleu'>Séjour Linguistique Adolescents</a>  / Nos formules </a></span>			
                                </div>								
                            </div>
                        </div>
                    </div>
                    <!-- End Newsletter Box -->
                        <section class="row padding_top">
                        <!-- Properties -->
                        <div class="col-md-9">
                            <!-- Contenu-->
							<div class="titles">
                              
                                <br>
                                <h1><i class="fa fa-graduation-cap"></i>&nbsp;Nos formules de séjours linguistiques pour adolescents</h1>
                           <br><br><br>
                    
					  
					   <?
														  $query2 = "SELECT * FROM formule_junior WHERE afficher = '1' ORDER BY nom";
														  $exec2 = mysql_query($query2) or die(mysql_error());
														  while($data2 = mysql_fetch_assoc($exec2)){
															  ?>
														  
													<h2> <?=stripslashes($data2["nom"])?></h2><br><br>
														
													   
															 <?=stripslashes($data2["description"])?><br>
															 <div class="row">
															 <div class="col-md-8 col-sm-1 ">&nbsp;</div>
															 <diV align="right" class="button col-md-4 col-sm-11"><a class="bouton" href="recherche_junior.php?site=etudiant&pays=&ville=&id_date=&formule=<?=$data2["id"]?>"><i class="fa fa-book"></i>&nbsp;Voir la liste des séjours </a></div>
															 
															</div>	
															<hr>
														
														                 
													  
													  <?
														  }
														  ?>
							</div>      
                        </div>               
                        <!-- fin contenu -->
						<!-- Aside -->
						<? include("droite_juniors.php"); ?>                        
						
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					<div class="container"> 
					
          
					
                </div>
            </section>
            <!-- End content info-->

 <? include("footer_juniors.php"); ?>          
			
