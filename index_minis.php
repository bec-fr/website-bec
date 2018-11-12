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
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Voyages scolaires éducatifs - Séjours et circuits linguistiques - BEC</title>  
        <meta name="keywords" content="voyage linguistique scolaire,angleterre,espagne,usa" />
        <meta name="description" content="Le BEC accompagne les professeurs et chefs d’établissements dans leurs projets de voyages scolaires et propose de nombreuses destinations">
        <meta name="author" content="BEC Séjours linguistiques">  
        
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">
        <!-- Your styles -->
        <link href="css/style.css" rel="stylesheet" media="screen"> 
		
        <!-- Skins Theme -->
        <link href="#" rel="stylesheet" media="screen" class="skin">

       

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
           
             <header> 
                <!-- Filter Search-->
				 <div class="section_title scolaires">
                <div class="container">
                    <div class="row"><br><br>
                        <h1>Votre voyage scolaire en quelques clics</h1>
                    </div>
                </div>  
               
                 </div> 
            </header>
            <!-- End Header-->
			
            <!-- End content info -->
            <section class="content_info">	
                <div class="container">
					<!-- filter-horizontal -->                  
                    <div class="filter_horizontal">
                        <div class="container">
						
                            <div class="row">
                                 <form name="rech" action="recherche_minis.php" method="get">
                                    
                                    <div class="col-md-3">                                
                                        <select name="pays" class="select" onchange="this.form.submit();">

													<option value="">Pays</option>

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
                                    <div class="col-md-3">
                                        <select name="ville" class="select" onchange="this.form.submit();">
                            <option value="">Ville</option>
                            <?

							$query_r = "SELECT * FROM minis_ville WHERE afficher ='1'";

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
                                    <div class="col-md-3">                                   
                                         <select name="formule" onchange="this.form.submit();">

                            <option value="">Formule</option>
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
                                    <div class="col-md-3">
                                        <select name="hebergement" onchange="this.form.submit();">
                            <option value="">Type d'h&eacute;bergement</option>
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
                                    </div>
                                    
                                </form>       
                            </div>
                        </div>
						
						<!-- Newsletter Box -->                  
                    
                    </div>
                        <section class="row padding_top">
                        <!-- Properties -->
                        <div class="col-lg-4">
						 
                            <!-- Contenu-->
                           
             
								  <p>Le BEC accompagne, depuis de nombreuses années, les professeurs et chefs d’établissements dans leurs projets de voyages scolaires : hébergements en familles hôtesses ou en auberges, transport en autocar, avion ou train, choisissez un de nos programmes types ou adressez-nous votre propre programme de visites. Nous nous chargeons de toutes les réservations.<br> Sur certaines destinations, nous proposons également des séjours, entrant dans le cadre des programmes des « Classes Européennes » au cours desquels vos élèves partagent cours et activités avec d’autres élèves Européens.   								   </p>
								  Et pour chaque destination, nos conseillers spécialisés sont à votre écoute pour vous <a href="devis_minis.php">établir un devis personnalisé.</a><br>
								  <diV class="button"><a class="bouton" href="devis_minis.php"><i class="fa fa-book"></i>&nbsp;Devis personnalisé</a></div>							
							<diV class="button"><a class="bouton" href="brochure_minis.php"><i class="fa fa-book"></i>&nbsp;Demande de brochure</a></div>								  
								 
							</div>	  
							<div class="col-lg-8">						  <h2>Nos promotions et offres spéciales voyages scolaires</h2>
					  <?
//les slides
$queryB = "SELECT * FROM bandeau WHERE afficher = '1' AND site='3' ORDER BY ordre";
$execB = mysql_query($queryB) or die(mysql_error());
$tab_slide = array(); 
$nb_slide = mysql_num_rows($execB);
while($data = mysql_fetch_assoc($execB)){
	array_push($tab_slide, $data);
}
?>
                            <!-- Slide News-->           
                            <div class="camera_wrap" id="slide_details">
                                <!-- Item Slide -->  
								 <? for($i=0 ; $i<$nb_slide ; $i++){?>
                               <div data-src="imagesUp/bandeaux/<?=$tab_slide[$i]["id_bandeau"]?>_c.jpg">
                                    <div class="camera_property fadeFromBottom">
										<div><a href="<?=$tab_slide[$i]["url"]?>"><h3><?=stripslashes($tab_slide[$i]["nom"])?></h3></a>
                                       <p><?=stripslashes($tab_slide[$i]["texte"])?></p>   </div>
                                        <div class="prix"><?=($tab_slide[$i]["prix"])?></div>           
                                    </div>
                                </div>
                                <!-- End Item Slide -->  
                                         <?
	}
	?>                      
                            </div>
                            <!-- End Slide-->  
								  
						</div>	  
								  

			<div class="row" >
						
						
						<div class="titles">                                
                                <br>
                                <h2>NOS DESTINATIONS VOYAGES SCOLAIRES</h2>
                         </div>
			<!-- Nested grouping -->
		<div class="col-lg-12 col-md-12 col-sm-12 nestedpadding">
		
			
			
			<div class="row" >
			<!-- Nested grouping -->
		<div class="col-lg-12  nestedpadding">
			<!-- Project 1 -->
           <div class="col-lg-4 col-md-4 col-sm-4">
			 <a class="homelink" href="voyages-scolaires-circuits-linguistiques-grande-bretagne,1.html">
               <div class="rollover redroll">
                  <img src="img/pays/angleterre.jpg" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Angleterre</p>
                     </div>
                     <p class="rolloverclient" >Londres,Oxford,Brighton,Cambridge...</p>
                     
                     <div class="divrulehome"></div>
                  </div>
               
               </div>
			   </a>
               <div class="gridpad"></div>
            </div>
			<!-- Project 2-->
            <div class="col-lg-4 col-md-4 col-sm-4">
				<a class="homelink" href="voyages-scolaires-circuits-linguistiques-usa,10.html">
              <div class="rollover redroll">
                  <img src="img/pays/usa.jpg" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >USA</p>
                     </div>
                     <p class="rolloverclient" >New-york, Washington, Vrigine, Floride...</p>
                    
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpad"></div>
            </div>
			<!-- Project 3 -->
           <div class="col-lg-4 col-md-4 col-sm-4">
				<a class="homelink" href="voyages-scolaires-circuits-linguistiques-irlande,4.html">
               <div class="rollover redroll">
                  <img src="img/pays/irlande.jpg" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Irlande</p>
                     </div>
                     <p class="rolloverclient" >Dublin,Corl,Galway...</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpadmobilespacer"></div>
            </div>
			
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 nestedpadding">	
			<!-- Project 4 -->
           <div class="col-lg-4 col-md-4 col-sm-4">
				<a class="homelink" href="voyages-scolaires-circuits-linguistiques-espagne,6.html">
               <div class="rollover redroll">
                 <img src="img/pays/espagne.jpg" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Espagne</p>
                     </div>
                     <p class="rolloverclient" >Madrid,Barcelone, Salamanque...</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpadmobilespacer"></div>
            </div>
         
		 
		  <!-- Project 5 -->
            <div class="col-lg-4 col-md-4 col-sm-4">
              <a class="homelink" href="voyages-scolaires-circuits-linguistiques-malte,9.html">
                  <div class="rollover redroll">
                    <img src="img/pays/malte2.jpg" class="img-responsive">
                     <div>
                        <div >
                           <p class="rollovertitle" >Malte</p>
                        </div>
                        <p class="rolloverclient" ></p>
                        <div class="divrulehome"></div>
                     </div>
                  </div>
               </a>
               <div class="gridpadmobilespacer"></div>
            </div>
			<!-- Project 5 -->
            <div class="col-lg-4 col-md-4 col-sm-4">
              <a class="homelink" href="voyages-scolaires-circuits-linguistiques-pays-galles,3.html">
                  <div class="rollover redroll">
                    <img src="img/pays/pays-galles.jpg" class="img-responsive">
                     <div>
                        <div >
                           <p class="rollovertitle" >Pays de Galles</p>
                        </div>
                        <p class="rolloverclient" ></p>
                        <div class="divrulehome"></div>
                     </div>
                  </div>
               </a>
               <div class="gridpadmobilespacer"></div>
            </div>
		</div>
		 </div>
			
		 <!-- Spacer Row -->
         <div class="row" >
            <div class="col-lg-12">
               <div class="gridpadcrop"></div>
            </div>
         </div>
         <div class="gridpadspacer"></div>
         

				<div class="row" >
			<!-- Nested grouping -->
		<div>
			<!-- Project 1 -->
			
			 <!-- Project 5 -->
            <div class="col-lg-4 col-md-4 col-sm-4">
             <a class="homelink" href="voyages-scolaires-circuits-linguistiques-australie,16.html">
                  <div class="rollover redroll">
                     <img src="img/pays/australie.jpg" alt="Australie" class="img-responsive">
                     <div>
                        <div >
                           <p class="rollovertitle" >Asutralie</p>
                        </div>
                        <p class="rolloverclient" >Sidney,Melbourne,Adelaide...</p>
                        <div class="divrulehome"></div>
                     </div>
                  </div>
               </a>
               <div class="gridpadmobilespacer"></div>
            </div>
			
			
			<!-- Project 2-->
            <div class="col-lg-4 col-md-4 col-sm-4">
				<a class="homelink" href="voyages-scolaires-circuits-linguistiques-allemagne,7.html">
                  <div class="rollover redroll">
                   <img src="img/pays/allemagne.jpg" alt="allemagne" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Allemagne.</p>
                     </div>
                     <p class="rolloverclient" >Berling,Cologne,Augsburg...</p>
                    
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpad"></div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
			 <a class="homelink" href="voyages-scolaires-circuits-linguistiques-italie,5.html">
               <div class="rollover redroll">
                  <img src="img/pays/italie.jpg" alt="Italie" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >ITALIE</p>
                     </div>
                     <p class="rolloverclient" >Rome,Venise, Florence</p>
                     
                     <div class="divrulehome"></div>
                  </div>
               
               </div>
			   </a>
               <div class="gridpad"></div>
            </div>
			
			<!-- Project 3 -->
            <div class="col-lg-4 col-md-4 col-sm-4">
				<a class="homelink" href="voyages-scolaires-circuits-linguistiques-autriche,8.html">
              <div class="rollover redroll">
                   <img src="img/pays/autriche.jpg" alt="Autriche" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Autriche</p>
                     </div>
                     <p class="rolloverclient" >Vienne, Tyrol...</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpadmobilespacer"></div>
            </div>
			<!-- Project 4 -->
            <div class="col-lg-4 col-md-4 col-sm-4">
				<a class="homelink" href="voyages-scolaires-circuits-linguistiques-france,14.html">
               <div class="rollover redroll">
                  <img src="img/pays/france.jpg" alt="France" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >France</p>
                     </div>
                     <p class="rolloverclient" >Paris, Normandie, Chateaux de la Loire, Futuroscope...</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpadmobilespacer"></div>
            </div>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<a class="homelink" href="voyages-scolaires-circuits-linguistiques-grece,17.html">
               <div class="rollover redroll">
                  <img src="img/pays/grece.jpg" alt="grece" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Grèce</p>
                     </div>
                     <p class="rolloverclient" >Athènes, Delphes, Olympie...</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpadmobilespacer"></div>
            </div>
         </div>
		 
		 

		 </div>
			
		 <!-- Spacer Row -->
         <div class="row" >
            <div class="col-lg-12">
               <div class="gridpadcrop"></div>
            </div>
         </div>
         <div class="gridpadspacer"><br><br></div>
			
			<div class="titles">                                
                                <br>
                                <h2>NOS PRESTATIONS VOYAGES SCOLAIRES</h2>
                         </div>
			
			
			<!-- Project 1 -->
            <div class="col-lg-3 col-md-6 col-sm-6">
			 <a class="homelink" href="prestation_minis.php">
               <div class="rollover redroll">
                  <img src="img/pays/prestations-detaillees.jpg"  class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Prestations détaillées</p>
                     </div>
                     <p class="rolloverclient" >Transports,securité, hébergement, encadrement et activités</p>
                     
                     <div class="divrulehome"></div>
                  </div>
               
               </div>
			   </a>
               <div class="gridpad"></div>
            </div>
			<!-- Project 2-->
            <div class="col-lg-3  col-md-6 col-sm-6">
				<a class="homelink" href="presentation_formules_minis.php">
               <div class="rollover redroll">
                  <img src="img/pays/formules.jpg" alt="nos formules" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Nos formules</p>
                     </div>
                     <p class="rolloverclient" >Toutes nos formules pour les groupes scolaires</p>
                    
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpad"></div>
            </div>
			<!-- Project 3 -->
            <div class="col-lg-3  col-md-6 col-sm-6">
				<a class="homelink" href="avantage_minis.php">
               <div class="rollover redroll">
                 <img src="img/pays/avantages.jpg" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Avantages</p>
                     </div>
                     <p class="rolloverclient" >Tous les avantages à partir avec le BEC - A votre service depuis 1967</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpadmobilespacer"></div>
            </div>
			<!-- Project 4 -->
            <div class="col-lg-3  col-md-6 col-sm-6">
				<a class="homelink" href="cgv_minis.php">
               <div class="rollover redroll">
                  <img src="img/pays/conditions-particulieres.jpg" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Conditions particulières.</p>
                     </div>
                     <p class="rolloverclient" >Voyage, sorties, assurances, santé...</p>
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
			
