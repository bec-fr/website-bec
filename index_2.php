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
        <meta name="author" content="BEC Séjour linguistiques">  
        
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
						<div class="col-md-3 col-sm-3"><br>  
						<ul>							
						<li><i class="fa fa-envelope"></i><a href="contact.php">Contact</a>
								<br><i class="fa fa-headphones"></i><a href="tel:+33155352500">01 55 35 25 00</a></li>
							</ul>							
						</div>	
						</address>							
						<div class="col-md-2 col-sm-2">
						<ul>
								<li>  <a target="_blank" href="https://www.facebook.com/becfrance"><i class="fa fa-facebook"></i></a>
								<a target="_blank"  href="https://plus.google.com/116300919714366300750/video"><i class="fa fa-google-plus"></i></a>								
								<a href="https://www.youtube.com/channel/UCdPRRzJ5WCFHC76v7cYeMEA/videos"><i class="fa fa-youtube"></i></a></li>
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
                         <div class="col-md-4 col-lg-4">
                            <span class="titre_juniors">BEC Séjours linguistiques</span>
                        </div>
         <!-- Menu-->
                        <ul id="menu" class="col-md-8 col-lg-8 col-sm-4 sf-menu">
                            <li>
                                <a href="index.php"><i class="fa fa-home"></i></a>                                								
                            </li>				
							<li>
                                <a href="sejours-linguistiques-pour-etudiants-adultes.html">ETUDIANTS & ADULTES</a>
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
                                   
									<li><a href="#">LES FORMULES</a>
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
									 <li><a href="presentation_formules_minis.php">LES FORMULES</a>	
                                   
								</ul>	
                            </li>
                            <li>
                               <a href="index_junior.php">JUNIORS</a>
								 <ul> 
                                    <li><a href="#">LES DESTINATIONS</a>
									<ul>                                  
										<li><a href="sejours-linguistiques-adolescents-angleterre,1.html">Angleterre</a></li>
										<li><a href="sejours-linguistiques-adolescents-australie,9.html">Australie</a></li>									
										<li><a href="sejours-linguistiques-adolescents-irlande,2.html">Irlande</a></li>	
									   <li><a href="sejours-linguistiques-adolescents-malte,7.html">Malte</a></li>										
									   <li><a href="sejours-linguistiques-adolescents-usa,3.html">USA</a></li>	
									  </ul>
                                    </li> 
									<li><a href="formules-sejours-linguistiques-pour-adolescents.php">LES FORMULES</a></li>									
								
								</ul>	
                            </li>                                                               
                         
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
                            <div class="row bg_header"  style="background-color:black">
                                <ul class="tabs_services">&nbsp;
								  <li class="etudiants">&nbsp;<a id="3" class="switcher set2">Adultes</a></li>	
                                  <li class="scolaires"><a id="1" class="switcher set2">Scolaires</a> </li> 	
										<li class="juniors"><a id="2" class="switcher set2">Juniors</a></li>
                                      
                                                                 
                                </ul>
                                
                                <div class="clearfix"></div>
                                <div class="switcher-panel"></div> 


									<!-- adultes -->
                                    <div id="3-content" class="switcher-content set2 show">
                                        <div class="search_box calculator">
                                             <form name="rech" action="recherche.php" method="get">
                                              <label><font color="#8B008B"><b>Trouver un séjour Etudiants/adultes</b></font></label>
						
                                                
                                                <div>                                                
                                                    <select name="pays" class="select"  onchange="document.rech.submit();">
                                                        <option value="">Tous les pays</option>                                  
                                                        <?

							$query_r = "SELECT * FROM pays WHERE afficher ='1' ORDER BY nom";
							$exec_r = mysql_query($query_r) or die(mysql_error());
							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["pays"]) && $_GET["pays"] == $data_r["id"])

									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";

							}
							}
							?>
							          
                                                    </select>
                                                </div> 
                                                <div>                                                
                                                    <select name="ville" class="select" style="width:170px" onchange="document.rech.submit();">

                            <option value="">toutes les villes</option>

                            <?

							$query_r = "SELECT * FROM ville WHERE 1";

							if(isset($_GET["pays"]) && $_GET["pays"] != "")

								$query_r .= " AND pays = '".addslashes($_GET["pays"])."'";
							$query_r .= " ORDER BY nom";
							$exec_r = mysql_query($query_r) or die(mysql_error());

							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["ville"]) && $_GET["ville"] == $data_r["id"])

									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";

							}

							?>

                            </select>
                                                </div> 
												<div>                                                
                                                    <select name="formule" class="select"  onchange="document.rech.submit();">

                            <option value="">toutes les formules</option>

                            <?

							$query_r = "SELECT * FROM formule ORDER BY nom";

							$exec_r = mysql_query($query_r) or die(mysql_error());

							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["formule"]) && $_GET["formule"] == $data_r["id"])

									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";

							}

							?>

                            </select>
                                                </div> 
                                                <div>                                                
                                                    <select name="hebergement" onchange="document.rech.submit();">
                            <option value="">tous les hébergements</option>
                            <?

							$query_r = "SELECT * FROM hebergement ORDER BY nom";

							$exec_r = mysql_query($query_r) or die(mysql_error());
							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["hebergement"]) && $_GET["hebergement"] == $data_r["id"])

									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";
							}

							?>

                            </select>
                                                </div> 
																							
                                                    <input type="submit" class="button" value="Rechercher">
                                            </form>   
                                            <div id="result_calculator"></div>    
                                         </div>            
                                    </div>
                                    <!-- End 1-content -->	
								
									<!-- scolaires -->
                                    <div id="1-content" class="switcher-content set2">
                                       <div class="search_box">
                                             <form name="rech" action="recherche_minis.php" method="get">
                                                <div>
                                                    <label><font color="red"><b>Trouver un voyage scolaire</b></font></label>
                                                 
                                                </div>
                                                <div>
                                                    <label>Pays</label>
                                                    <select name="pays" class="select">

													<option value="">tous les pays</option>

                            <?
							$query_r = "SELECT * FROM minis_pays ORDER BY nom";
							$exec_r = mysql_query($query_r) or die(mysql_error());
							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["pays"]) && $_GET["pays"] == $data_r["id"])
									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";
							}
							?>
                            </select>
                                                </div>
                                                <div>
                                                    <label>Ville</label> 
													<select name="ville">
                            <option value="">toutes les villes</option>
                            <?

							$query_r = "SELECT * FROM minis_ville WHERE 1";

							if(isset($_GET["pays"]) && $_GET["pays"] != "")

								$query_r .= " AND pays = '".addslashes($_GET["pays"])."'";
							$query_r .= " ORDER BY nom";

							$exec_r = mysql_query($query_r) or die(mysql_error());
							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["ville"]) && $_GET["ville"] == $data_r["id"])

									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";

							}
							?>
                            </select>
                                                </div>
                                                <div>
                                                    <label>Formules</label>
                                                    <select name="formule">

                            <option value="">toutes les formules</option>

                            <?

							$query_r = "SELECT * FROM formule_minis ORDER BY nom";

							$exec_r = mysql_query($query_r) or die(mysql_error());

							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["formule"]) && $_GET["formule"] == $data_r["id"])

									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";
							}

							?>

                            </select>
                                                </div>
												
												
												
												 <!--<div>
                                                    <label>Hébgergement</label>
                                                    <select name="hebergement">
                            <option value="">tous les h&eacute;bergements</option>
                            <?
							$query_r = "SELECT * FROM hebergement_minis ORDER BY nom";
							$exec_r = mysql_query($query_r) or die(mysql_error());
							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["hebergement"]) && $_GET["hebergement"] == $data_r["id"])

									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";
							}

							?>

                            </select>
                                                </div>		-->										
                                                <div>
                                                    <input type="submit" class="button" value="Rechercher">
                                                </div> 
                                            </form>                               
                                        </div>   
                                    </div>
                                    <!-- fin scolaires -->
						
									
									
									<!-- 2-content -->
                                    <div id="2-content" class="switcher-content">
                                       <div class="search_box">
                                            <form action="recherche_junior.php">
                                                <div class="">
                                                    <label><font color="#1E90FF"><b>Trouver un séjour Juniors</b></font></label>                                                    
                                                </div>
                                                <div>                                                   
                                                    <select name="pays" class="select" style="width:170px" onchange="document.rech.ville.value=''; document.rech.id_date.value=''; document.rech.formule.value=''; document.rech.hebergement.value=''; document.rech.submit();">
													<option value="">tous les pays</option>

                            <?

							$query_r = "SELECT * FROM junior_pays ORDER BY nom";
							$exec_r = mysql_query($query_r) or die(mysql_error());
							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["pays"]) && $_GET["pays"] == $data_r["id"])

									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";
							}

							?>

                            </select>
													
                                                </div>
                                                <div>
                                                    <br>                                     
                                                   <select name="ville" class="select"  onchange="document.rech.id_date.value=''; document.rech.formule.value=''; document.rech.hebergement.value=''; document.rech.submit();">

                            <option value="">toutes les villes</option>

                            <?

							$query_r = "SELECT * FROM junior_ville WHERE 1";

							if(isset($_GET["pays"]) && $_GET["pays"] != "")

								$query_r .= " AND pays = '".addslashes($_GET["pays"])."'";
							$query_r .= " ORDER BY nom";
							$exec_r = mysql_query($query_r) or die(mysql_error());
							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["ville"]) && $_GET["ville"] == $data_r["id"])

									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";

							}

							?>

                            </select>
                                                </div>
												
                                              
												<div><br>                                                
                                                    <select name="formule">

                            <option value="">toutes les formules</option>

                            <?

							$query_r = "SELECT * FROM formule_junior WHERE 1 AND afficher = '1'";
							if(isset($_GET["pays"]) && $_GET["pays"] != ""){

								$query_r .= " AND id IN (SELECT fjf.formule FROM fiche_junior_formule fjf INNER JOIN fiche_junior fj ON fjf.fiche_junior = fj.id WHERE fj.pays = '".addslashes($_GET["pays"])."' GROUP BY fjf.formule)";
							}

							if(isset($_GET["fiche"]) && $_GET["fiche"] != ""){

								$query_r .= " AND id IN (SELECT formule FROM fiche_junior_formule WHERE fiche_junior = '".addslashes($_GET["fiche"])."')";
							}

							$query_r .= " ORDER BY nom";
							$exec_r = mysql_query($query_r) or die(mysql_error());

							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["formule"]) && $_GET["formule"] == $data_r["id"])

									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";
							}

							?>

                            </select>
                                                </div>
												<div><br>
                                                  
                                                   <select name="hebergement">

                            <option value="">tous les hébergements</option>

                            <?

							$query_r = "SELECT * FROM hebergement_junior WHERE 1";

							if(isset($_GET["pays"]) && $_GET["pays"] != ""){

								$query_r .= " AND id IN (SELECT fjh.hebergement FROM fiche_junior_hebergement fjh INNER JOIN fiche_junior fj ON fjh.fiche_junior = fj.id WHERE fj.pays = '".addslashes($_GET["pays"])."' GROUP BY fjh.hebergement)";

							}

							if(isset($_GET["fiche"]) && $_GET["fiche"] != ""){

								$query_r .= " AND id IN (SELECT hebergement FROM  fiche_junior_hebergement WHERE fiche_junior = '".addslashes($_GET["fiche"])."')";

							}

							$query_r .= " ORDER BY nom";

							$exec_r = mysql_query($query_r) or die(mysql_error());
							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["hebergement"]) && $_GET["hebergement"] == $data_r["id"])

									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";

							}

							?>

                            </select>
                                                </div>
												<div><br>												
												
												<font color="#ffffff">Age: de <select name="age_mini" class="select" style="width:50px" >

                            <option value="">- - -</option>

                            <?

							for($i=11 ; $i<=18 ; $i++){

								echo "<option value='".$i."' ".((isset($_GET["age_mini"]) && $_GET["age_mini"] == $i) ? " selected" : "").">".$i."</option>";

							}

							?>

                            </select>

                            à

                            <select name="age_maxi" class="select" style="width:50px" >

                            <option value="">- - -</option>

                            <?

							for($i=11 ; $i<=18 ; $i++){

								echo "<option value='".$i."' ".((isset($_GET["age_maxi"]) && $_GET["age_maxi"] == $i) ? " selected" : "").">".$i."</option>";

							}

							?>

                            </select> ans</font>
												
												
												</div>
                                                <div>
                                                    <input type="submit" class="button junior" value="Rechercher">
                                                </div> 
                                            </form>                               
                                        </div>   
                                    </div>
                                    <!-- fin juniors -->
                                    
                              
                              
                            </div>       
                        </div>
                    </div>
                </div>  
                <!-- Filter Search-->              
                
                <!-- Slide -->           
                <div class="camera_wrap camera_white_skin" id="slide">
                    <!-- Item Slide -->  
                    <div  data-src="img/slide/slides/banniere_promotion2015.jpg">
                        <div class="camera_caption fadeFromTop">
                             <div class="container"> 
                                <div class="row">
                                    <div class="col-md-7 col-md-offset-5">
                                        <h1 class="animated fadeInRight delay1">Voyages Scolaires </h1>   
                                        <p class="animated fadeInRight delay2">Pensez à notre assurance <i>Annulation Totale du groupe</i></p> 
                                       
                                        <div class="more animated fadeInRight delay4">
                                            <a href="voyages-scolaires-et-circuits-linguistiques.html" class="button">Partez en toute tranquillité</a>
                                        </div>
                                    </div>    
                                </div>                     
                            </div>      
                        </div>
                     </div>
                    <!-- End Item Slide -->  

                    <!-- Item Slide --> 
                    <div data-src="img/slide/slides/5.jpg">
                        <div class="camera_caption fadeFromTop">
                             <div class="container"> 
                                <div class="row">
                                    <div class="col-md-7 col-md-offset-5">
                                        <h1 class="animated fadeInRight delay1">Séjours juniors
                                         
                                        </h1>   
                                        <p class="animated fadeInRight delay2">Profitez d'une réduction de 100€ pour toute réservation avant le 28 Février</p> 
                                       
                                        <div class="more animated fadeInRight delay4">
                                            <a href="sejours-linguistiques-pour-adolescents.html" class="button">Partez à New-york, Malte...</a>
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
                                       
                                        <div class="more animated fadeInRight delay4">
                                            <a href="sejours-linguistiques-pour-etudiants-adultes.html" class="button">Je veux partir !</a>
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
							                        
                            
                            	
							<b>Depuis 1967, le BEC (British European Centre) est spécialisé dans l'organisation de Séjours Linguistiques et Voyages Scolaires Educatifs. <br>Associer l'apprentissage des langues au voyage est notre métier et nous proposons de mettre à votre service notre expérience </b><br><br>
						 
						</div> 
                            <!-- Contenu-->
                           
                     

					<div class="row" >
							<!-- Nested grouping -->
						<div class="col-lg-12 col-md-12 col-sm-8 nestedpadding">
						
						
							<!-- Project 3 -->
							<div class="col-lg-4 col-md-4 col-sm-4">
								<a class="homelink" href="sejours-linguistiques-pour-etudiants-adultes.html">
							   <div class="rollover purpleroll">
								  <img src="img/pays/adultes.jpg" class="img-responsive">
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
							<!-- Project 1 -->
							<div class="col-lg-4 col-md-4 col-sm-4">
							 <a class="homelink" href="index_minis.php">
							   <div class="rollover redroll">
								   <img src="img/pays/scolaires.jpg" class="img-responsive">
								  <div>
									 <div >
										<p class="rollovertitle" >Partez avec votre classe dans 8 pays </p>
									 </div>
									 <p class="rolloverclient" >Nos voyages scolaires</p>
									 
									 <div class="divrulehome"></div>
								  </div>
							   
							   </div>
							   </a>
							   <div class="gridpad"></div>
							</div>
							<!-- Project 2-->
							<div class="col-lg-4 col-md-4 col-sm-4">
								<a class="homelink" href="index_junior.php">
							   <div class="rollover pinkroll">
							   
								  <img src="img/pays/juniors.jpg" class="img-responsive">
									
								  <div>
									 <div >
									   <p class="rollovertitle" >Partez à Londres, New-york, Dublin, Sydney...</p>								   
									
									 </div>
									 <p class="rolloverclient" >Nos Séjours juniors pour les 12-19 ans</p>
									
									 <div class="divrulehome"></div>
								  </div>
							   </div>
								</a>
							   <div class="gridpad"></div>
							</div>
							
							
							<!-- FIN CONTENU -->	 
						  </div>
						 </div>
						 
     
							
						 
					</div>	
                        <!-- fin contenu -->
						<!-- Aside -->
						                   
						
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					
            </section>
            <!-- End content info-->

 <? include("footer_home.php"); ?>          
			
