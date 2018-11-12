<!DOCTYPE html>
<? include("connect.php"); ?>
<?
if(strpos($_SERVER['REQUEST_URI'],"index_minis")!=false){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: voyages-scolaires-et-circuits-linguistiques.html");
	exit();
}
?>
<html lang="fr">
    <head>        
        <title>Bec séjours linguistiques</title>  
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="BEC Séjour linguistiques">
        <meta name="author" content="iwthemes.com">  
        
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">
        <!-- Your styles -->
        <link href="css/style.css" rel="stylesheet" media="screen"> 
		<link href="css/style-pays.css" rel="stylesheet" media="screen"> 	

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
    <body>    

        <!-- layout-->
        <div id="layout"> 
            
            <div class="line"></div>
            <!-- End Login Client -->

            <!-- Info Head -->
            <section class="info_head">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
						<img src="img/logo.png" height="100" alt="BEC séjours linguistiques">
						</div>
						<address>
						<div class="col-md-4 col-sm-4"><br>
						
                            <ul>
								<li><i class="fa fa-pencil"></i><a href="#"><b>BEC</b> <br>British European Centre<br>99 Rue la Fayette 75010 Paris</a>								
							</ul>								
						</div>	
						<div class="col-md-4 col-sm-4"><br>  
						<ul>							
							<li><i class="fa fa-envelope"></i><a href="#">contact@becfrance.com</a>
								<br><i class="fa fa-headphones"></i><a href="tel:+33155352500">01 55 35 25 00</a></li>
							</ul>							
						</div>	
						</address>							
						<div class="col-md-1 col-sm-1">
						<ul>
								<li><a href="#"><i class="fa fa-twitter"></i></a><br>
								<a href="#"><i class="fa fa-facebook"></i></a><br>
								<a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul> 
                        </div>
                    </div>
                </div>                         
            </section>
            <!-- Info Head -->

            <!-- Nav-->
            <nav>
                <div class="container">
                    <div class="row">
                         <div align="left" class="col-md-4 sf-menu">
                            <span class="titre_juniors">BEC Séjours linguistiques</span>
                        </div>
         <!-- Menu-->
                        <ul id="menu" class="col-md-7 sf-menu">
                            <li>
                                <a href="index.php"><i class="fa fa-home"></i></a>                                								
                            </li>				
							<li>
                                <a href="sejours-linguistiques-pour-etudiants-adultes.html">ETUDIANTS ET ADULTES</a>
                                <ul> 
                                    <li><a href="#">LES DESTINATIONS</a>
                                        <ul>                                  
                                          <li><a href="sejours-linguistiques-etudiants-adultes-angleterre,1.html">Angleterre</a></li>
                                          <li><a href="sejours-linguistiques-etudiants-adultes-australie,10.html">Australie</a></li>
										   <li><a href="sejours-linguistiques-etudiants-adultes-canada,8.html">Canada</a></li>
										   <li><a href="sejours-linguistiques-etudiants-adultes-ecosse,6.html">Ecosse</a></li>
										  <li><a href="sejours-linguistiques-etudiants-adultes-espagne,4.html">Espagne</a></li>
										 <li><a href="sejours-linguistiques-etudiants-adultes-irlande,7.html">Irlande</a></li>
										  <li><a href="sejours-linguistiques-etudiants-adultes-malte,12.html">Malte</a></li>
										  <li><a href="sejours-linguistiques-etudiants-adultes-nouvelle-zelande,11.html">Nouvelle-Zélande</a></li>
										   <li><a href="sejours-linguistiques-etudiants-adultes-usa,3.html">USA</a></li>
										
                                      </ul>
                                    </li>                                 
                                   
									<li><a href="tables_princing.html">LES FORMULES</a>
										<ul>                                  
                                          <li><a href="recherche.php?site=etudiant&pays=&formule=3">Anglais Général ou Intensif</a></li>
										   <li><a href="recherche.php?site=etudiant&pays=&formule=10">Espagnol général ou intensif</a></li>
										  <li><a href="recherche.php?site=etudiant&pays=&formule=4">Business</a></li>
										  <li><a href="recherche.php?site=etudiant&pays=&formule=9">Cours + culture/Sports/Activités.</a></li>
										  <li><a href="recherche.php?site=etudiant&pays=&formule=8">Cours + job rémunéré</a></li>										 
										  <li><a href="recherche.php?site=etudiant&pays=&formule=6">Cours + stage</a></li>
										  <li><a href="recherche.php?site=etudiant&pays=&formule=5">One-to-One</a></li>
										  <li><a href="recherche.php?site=etudiant&pays=&formule=7">Préparation aux examens</a></li>					
                                      </ul>
									</li>
                                 
                                  
                                </ul>
                            </li>  
                           
                             <li>
                                 <a href="index_minis.php">VOYAGES SCOLAIRES</a>
                                <ul> 
                                    <li><a href="#">LES DESTINATIONS</a>
                                        <ul>                                  
                                          <li><a href="voyages-scolaires-circuits-linguistiques-grande-bretagne,1.html">Grande-Bretagne</a></li>
                                          <li><a href="voyages-scolaires-circuits-linguistiques-australie,16.html">Australie</a></li>
										  <li><a href="voyages-scolaires-circuits-linguistiques-autriche,8.html">Autriche</a></li>
										  <li><a href="voyages-scolaires-circuits-linguistiques-espagne,6.html">Espagne</a></li>
										  <li><a href="voyages-scolaires-circuits-linguistiques-france,14.html">France</a></li>
										  <li><a href="voyages-scolaires-circuits-linguistiques-irlande,4.html">Irlande</a></li>
										    <li><a href="voyages-scolaires-circuits-linguistiques-italie,5.html">Italie</a></li>
											 <li><a href="voyages-scolaires-circuits-linguistiques-malte,9.html">Malte</a></li>
											  <li><a href="voyages-scolaires-circuits-linguistiques-usa,10.htmll">USA</a></li>										
											
                                      </ul>
                                    </li>   
										
                                   
								</ul>	
                            </li>
                            <li>
                               <a href="index_junior.php">JUNIORS</a>
								 <ul> 
                                    <li><a href="#">LES DESTINATIONS</a>
									<ul>                                  
										<li><a href="sejours-linguistiques-adolescents-angleterre,1.htmll">Angleterre</a></li>
										<li><a href="sejours-linguistiques-adolescents-australie,9.html">Australie</a></li>
										 <li><a href="sejours-linguistiques-adolescents-canada,12.html">Canada</a></li>
										 <li><a href="sejours-linguistiques-adolescents-chypre,8.html">Chypre</a></li>
										<li><a href="sejours-linguistiques-adolescents-espagne,10.html">Espagne</a></li>	
										<li><a href="sejours-linguistiques-adolescents-irlande,2.html">Irlande</a></li>	
									   <li><a href="sejours-linguistiques-adolescents-malte,7.html">Malte</a></li>										
									   <li><a href="sejours-linguistiques-adolescents-usa,3.html">USA</a></li>	
									  </ul>
                                    </li>  
								
								</ul>	
                            </li>                                                               
                            <li><a href="contact.php">CONTACT</a></li>
                        </ul>
                <!-- End Menu-->
                    </div>
                </div>
            </nav>
            <!-- End Nav-->
           
            
            <!-- Header-->
            <header> 
                <!-- Filter Search-->
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">                        
                            <div class="row bg_header">
                                <ul class="tabs_services">
                                    <li class="etudiants"><a id="1" class="switcher set2">Adultes</a></li>
                                    <li class="juniors"><a id="2" class="switcher set2">Juniors</a></li>          
                                    <li class="scolaires"><a id="3" class="switcher set2">Scolaires</a></li>
                                    <li><a id="4" class="switcher set2">Renting</a></li>                                    
                                </ul>
                                
                                <div class="clearfix"></div>
                                <div class="switcher-panel"></div> 

                                <!-- 1-content -->
                                <div id="1-content" class="switcher-content set2 show">
                                    <div class="search_box calculator">
                                        <form action="php/calculator.php" id="calculator">
                                          <label>Trouvez votre sejour Etudiants Adultes</label>
                                            <div>                                                
                                                <input type="number" required placeholder="Price Propertie" name="price">
                                            </div> 
                                            <div>                                                
                                                <input type="number" required placeholder="Down payment" name="payment">
                                            </div> 
                                            <div>                                                
                                                <select name="interest">
                                                    <option>Pays</option>                                  
                                                    <option value="1.39">1.39 %</option>
                                                    <option value="2">2%</option>
                                                    <option value="3">3%</option>              
                                                </select>
                                            </div> 
                                            <div>                                                
                                                <select name="months">
                                                    <option>Langue</option>                                  
                                                    <option>36</option>
                                                    <option>48</option>
                                                    <option>64</option>  
                                                    <option>180</option>              
                                                </select>
                                            </div>                                                                               
                                            <div>
                                                <input type="submit" class="button" value="Choisir">
                                            </div> 
                                        </form>   
                                        <div id="result_calculator"></div>    
                                     </div>            
                                </div>
                                <!-- End 1-content -->

                                <!-- 2-content -->
                                <div id="2-content" class="switcher-content set2">
                                   <div class="search_box">
                                        <form action="properties.html">
                                            <div class="">
                                                <label>Trouvez votre sejour Juniors</label>
                                                <input type="text" required>
                                            </div>
                                            <div>
                                                <label>Location</label>
                                                <select name="location">
                                                    <option value="">-- Select city --</option>
                                                     <option value="0" selected="selected">New York</option>
                                                     <option value="1">Los Angeles</option>
                                                     <option value="2">Chicago</option>
                                                     <option value="3">Miami</option>
                                                     <option value="4">San Francisco</option>
                                                     <option value="5">Boston</option>
                                                     <option value="6">Philadelphia</option>
                                                     <option value="7">Dallas</option>                    
                                                 </select>
                                            </div>
                                            <div>
                                                <label>Price Range</label>                                     
                                                <select name="pricing">
                                                      <option>View all</option>                                  
                                                    <option value="info_price">0 - 300.000</option>
                                                    <option value="info_price">300.000 - 500.000</option>
                                                    <option value="info_price">500.000 - 800.000</option>
                                                    <option value="info_price">800.000 - 1.000.000</option>
                                                    <option value="info_price">10.000.000 +</option>    
                                                </select>
                                            </div>
                                            <div>
                                                <label>Area</label>
                                                <select name="area">
                                                    <option>View all</option>
                                                    <option value="info_area">0 - 60 m²</option>
                                                    <option value="info_area">60 m² - 90 m²</option>
                                                    <option value="info_area">90 m² - 150 m²</option>
                                                    <option value="info_area">150 m² - 240 m²</option>
                                                    <option value="info_area">240 m² - 360 m²</option>
                                                    <option value="info_area">360 m² - 480 m²</option>
                                                    <option value="info_area">480 m² - 600 m²</option>
                                                    <option value="info_area">More 600 m²</option>
                                                </select>
                                            </div>
                                            <div>
                                                <input type="submit" class="button" value="Search">
                                            </div> 
                                        </form>                               
                                    </div>   
                                </div>
                                <!-- End 1-content -->

                                <!-- 3-content -->
                                <div id="3-content" class="switcher-content set2">
                                   <div class="search_box">
                                        <form action="properties.html">
                                            <div>
                                                <label>Search</label>
                                                <input type="text" required>
                                            </div>
                                            <div>
                                                <label>Location</label>
                                                <select name="location">
                                                    <option value="">-- Select city --</option>
                                                     <option value="0" selected="selected">New York</option>
                                                     <option value="1">Los Angeles</option>
                                                     <option value="2">Chicago</option>
                                                     <option value="3">Miami</option>
                                                     <option value="4">San Francisco</option>
                                                     <option value="5">Boston</option>
                                                     <option value="6">Philadelphia</option>
                                                     <option value="7">Dallas</option>                    
                                                 </select>
                                            </div>
                                            <div>
                                                <label>Price Range</label>                                     
                                                <select name="pricing">
                                                      <option>View all</option>                                  
                                                    <option value="info_price">0 - 300.000</option>
                                                    <option value="info_price">300.000 - 500.000</option>
                                                    <option value="info_price">500.000 - 800.000</option>
                                                    <option value="info_price">800.000 - 1.000.000</option>
                                                    <option value="info_price">10.000.000 +</option>    
                                                </select>
                                            </div>
                                            <div>
                                                <label>Area</label>
                                                <select name="area">
                                                    <option>View all</option>
                                                    <option value="info_area">0 - 60 m²</option>
                                                    <option value="info_area">60 m² - 90 m²</option>
                                                    <option value="info_area">90 m² - 150 m²</option>
                                                    <option value="info_area">150 m² - 240 m²</option>
                                                    <option value="info_area">240 m² - 360 m²</option>
                                                    <option value="info_area">360 m² - 480 m²</option>
                                                    <option value="info_area">480 m² - 600 m²</option>
                                                    <option value="info_area">More 600 m²</option>
                                                </select>
                                            </div>
                                            <div>
                                                <input type="submit" class="button" value="Search">
                                            </div> 
                                        </form>                               
                                    </div>   
                                </div>
                                <!-- End 3-content -->

                                <!-- 4-content -->
                                <div id="4-content" class="switcher-content set2">
                                   <div class="search_box">
                                        <form action="properties.html">
                                            <div>
                                                <label>Search</label>
                                                <input type="text" required>
                                            </div>
                                            <div>
                                                <label>Location</label>
                                                <select name="location">
                                                    <option value="">-- Select city --</option>
                                                     <option value="0" selected="selected">New York</option>
                                                     <option value="1">Los Angeles</option>
                                                     <option value="2">Chicago</option>
                                                     <option value="3">Miami</option>
                                                     <option value="4">San Francisco</option>
                                                     <option value="5">Boston</option>
                                                     <option value="6">Philadelphia</option>
                                                     <option value="7">Dallas</option>                    
                                                 </select>
                                            </div>
                                            <div>
                                                <label>Price Range</label>                                     
                                                <select name="pricing">
                                                      <option>View all</option>                                  
                                                    <option value="info_price">0 - 300.000</option>
                                                    <option value="info_price">300.000 - 500.000</option>
                                                    <option value="info_price">500.000 - 800.000</option>
                                                    <option value="info_price">800.000 - 1.000.000</option>
                                                    <option value="info_price">10.000.000 +</option>    
                                                </select>
                                            </div>
                                            <div>
                                                <label>Area</label>
                                                <select name="area">
                                                    <option>View all</option>
                                                    <option value="info_area">0 - 60 m²</option>
                                                    <option value="info_area">60 m² - 90 m²</option>
                                                    <option value="info_area">90 m² - 150 m²</option>
                                                    <option value="info_area">150 m² - 240 m²</option>
                                                    <option value="info_area">240 m² - 360 m²</option>
                                                    <option value="info_area">360 m² - 480 m²</option>
                                                    <option value="info_area">480 m² - 600 m²</option>
                                                    <option value="info_area">More 600 m²</option>
                                                </select>
                                            </div>
                                            <div>
                                                <input type="submit" class="button" value="Search">
                                            </div> 
                                        </form>                               
                                    </div>   
                                </div>
                                <!-- End 4-content -->
                            </div>       
                        </div>
                    </div>
                </div>  
                <!-- Filter Search-->              
                
                <!-- Slide -->           
                <div class="camera_wrap camera_white_skin" id="slide">
                    <!-- Item Slide -->  
                    <div  data-src="img/slide/slides/2.jpg">
                        <div class="camera_caption fadeFromTop">
                             <div class="container"> 
                                <div class="row">
                                    <div class="col-md-7 col-md-offset-5">
                                        <h1 class="animated fadeInRight delay1">Voyages Scolaires
                                            <span class="arrow_title_slide"></span>
                                        </h1>   
                                        <p class="animated fadeInRight delay2">Pensez à notre assurance <i>Annulation Totale du groupe</i></p> 
                                        <ul class="animated fadeInRight delay3">
                                            <li class="bathrooms"><span>3</span></li>
                                            <li class="bedrooms"><span>5</span></li>
                                            <li class="price">$<span>5000</span></li>
                                        </ul>
                                        <div class="more animated fadeInRight delay4">
                                            <a href="properties.html" class="button">Plus d'info</a>
                                        </div>
                                    </div>    
                                </div>                     
                            </div>      
                        </div>
                     </div>
                    <!-- End Item Slide -->  

                    <!-- Item Slide --> 
                    <div data-src="img/slide/slides/banniere_promotion2015.jpg">
                        <div class="camera_caption fadeFromTop">
                             <div class="container"> 
                                <div class="row">
                                    <div class="col-md-7 col-md-offset-5">
                                        <h1 class="animated fadeInRight delay1">Immersion totale
                                            <span class="arrow_title_slide"></span>
                                        </h1>   
                                        <p class="animated fadeInRight delay2">Programmes saisonniers Noel -Nouvel An plus 10 heures de cours.</p> 
                                        
                                        <div class="more animated fadeInRight delay4">
                                            <a href="properties.html" class="button">Partez à New-york, Malte...</a>
                                        </div>
                                    </div>
                                </div>                         
                            </div>     
                        </div>
                    </div>
                   <!-- End Item Slide -->  

                   <!-- Item Slide --> 
                    <div data-src="img/slide/slides/3.jpg">
                        <div class="camera_caption fadeFromTop">
                             <div class="container"> 
                                <div class="row">
                                    <div class="col-md-7 col-md-offset-5">
                                        <h1 class="animated fadeInRight delay1">Etudiants adultes
                                            <span class="arrow_title_slide"></span>
                                        </h1>   
                                        <p class="animated fadeInRight delay2">Partez travailler un an  en Australie.</p> 
                                        <ul class="animated fadeInRight delay3">
                                           
                                            <li class="price">a partir de<span>3000 €</span></li>
                                           
                                        </ul>
                                        <div class="more animated fadeInRight delay4">
                                            <a href="properties.html" class="button">Je veux partir !</a>
                                        </div>
                                    </div>  
                                </div>                       
                            </div>     
                        </div>
                    </div>
                   <!-- End Item Slide -->  
                </div>  
                <!-- End Slide -->   
            </header>
            <!-- End Header-->
            <!-- End Header-->
			
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
                         <div class="col-md-12">
						 <div class="titles">
                               
                              
                                <h1>&nbsp;BEC Séjours Linguistiques</h1>
								<br><br><br>
							<div ><b>Depuis 1967, le BEC (British European Centre) est spécialisé dans l'organisation de Séjours Linguistiques et Voyages Scolaires Educatifs. <br>Associer l'apprentissage des langues au voyage est notre métier et nous proposons de mettre à votre service notre expérience </b></div>	
						 
						</div> 
                            <!-- Contenu-->
                           
                     

					<div class="row" >
							<!-- Nested grouping -->
						<div class="col-lg-12 col-md-8 col-sm-8 nestedpadding">
							<!-- Project 1 -->
							<div class="col-lg-4 col-md-8 col-sm-6">
							 <a class="homelink" href="">
							   <div class="rollover redroll">
								   <img src="img/pays/5.jpg" class="img-responsive">
								  <div>
									 <div >
										<p class="rollovertitle" >Partez avec votre classe dans 8 pays </p>
									 </div>
									 <p class="rolloverclient" >Nos Minis séjours</p>
									 
									 <div class="divrulehome"></div>
								  </div>
							   
							   </div>
							   </a>
							   <div class="gridpad"></div>
							</div>
							<!-- Project 2-->
							<div class="col-lg-4 col-md-8 col-sm-6">
								<a class="homelink" href="">
							   <div class="rollover pinkroll">
								  <img src="img/pays/2.jpg" class="img-responsive">
									
								  <div>
									 <div >
									   <p class="rollovertitle2" >Partez à Londres, Madrid, Sydney...</p>								   
									
									 </div>
									 <p class="rolloverclient" >Nos Séjours juniors</p>
									
									 <div class="divrulehome"></div>
								  </div>
							   </div>
								</a>
							   <div class="gridpad"></div>
							</div>
							<!-- Project 3 -->
							<div class="col-lg-4 col-md-12 col-sm-12">
								<a class="homelink" href="http://strohlsf.com/projects/googledrive/">
							   <div class="rollover purpleroll">
								  <img src="img/pays/3.jpg" class="img-responsive">
								  <div>
									 <div >
										<p class="rollovertitle" >Partez travailler ou étudier dans 6 pays</p>
									 </div>
									 <p class="rolloverclient" >Etudiants et adultes</p>
									 <div class="divrulehome"></div>
								  </div>
							   </div>
								</a>
							   <div class="gridpadmobilespacer"></div>
							</div>
							
								 
						  </div>
						 </div>
						 
     
							
						 
					</div>	
                        <!-- fin contenu -->
						<!-- Aside -->
						                   
						
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					
            </section>
            <!-- End content info-->

 <? include("footer_scolaires.php"); ?>          
			
