<!DOCTYPE html>
<? include("connect.php"); ?>
<?
// if(strpos($_SERVER['REQUEST_URI'],"index_adulte")!=false){
	// header("HTTP/1.1 301 Moved Permanently");
	// header("Location: sejours-linguistiques-pour-etudiants-adultes.html");
	// exit();
// }

$title="Séjours et stages linguistiques pour étudiants et adultes en Angleterre, USA, Irlande, Espagne ...";
?>
<html lang="fr">
    <head>        
        <title>Bec séjours linguistiques Adultes</title>  
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
<? include("top_adultes.php"); ?>
           
             <header> 
                <!-- Filter Search-->
				 <div class="section_title features">
                <div class="container">
                    <div class="row">
                        
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
                                 <form name="rech" action="recherche.php" method="get">
                                    
                                    <div class="col-md-2">                                
                                        <select name="pays" class="select" onchange="document.rech.submit();">
                                                        <option value="">Tous les pays</option>                                  
                                                        <?
							$query_r = "SELECT * FROM pays WHERE afficher ='1' ORDER BY nom";
							$exec_r = mysql_query($query_r) or die(mysql_error());
							while($data_r = mysql_fetch_assoc($exec_r)){
								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["pays"]) && $_GET["pays"] == $data_r["id"])
									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";
							}							?>
							           
                                                    </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="ville" class="select" onchange="document.rech.submit();">
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
                                    <div class="col-md-2">                                   
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
                                    <div class="col-md-2">
                                        <select name="hebergement"  onchange="document.rech.submit();">

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
                                    <div class="col-md-2">                                      
										<input type="submit" class="button" value="Rechercher">
                                    </div> 
                                </form>       
                            </div>
                        </div>
                    </div>
					
                    <!-- End filter-horizontal -->
				
					
                        <section class="row padding_top">
                        <!-- Properties -->
                         <div class="col-md-12">
						 <div class="titles">                              
                              
                                <h1>Séjours linguistiques Etudiants & Adultes</h1>
						 
						</div> 
                            <!-- Contenu-->
                         <div class="row" >
						<div class="col-lg-4">
                      <b>Nos Séjours linguistiques (cours de langues & préparations aux examens), Stages Professionnels non rémunérés & Jobs rémunérés</b> s’adressent aux Etudiants/Adultes de 18 ans et plus. <br><br>Nos partenaires et écoles de langues à l’étranger vous accueillent, individuellement, toute l’année pour des durées allant d’une semaine à plusieurs mois. L’hébergement est proposé, au choix, suivant la destination, en familles, résidences, appartements partagés. Les cours de langues offrent une prise en charge du niveau débutant à avancé. Ils peuvent être associés à la préparation d’un examen. Nous proposons également, dans certains centres, de trouver un Stage Professionnel non rémunéré dans votre domaine d’activités ou d’études, ou un Job rémunéré dans le secteur de l’hôtellerie, la restauration, les bars et la vente.
					  </div>
						<div class="col-lg-8">
						  <h2>Nos promotions et offres spéciales</h2>
					  <?
//les slides
$queryB = "SELECT * FROM bandeau WHERE afficher = '1' AND home='1' ORDER BY ordre";
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
                                <h2>NOS DESTINATIONS ETUDIANTS & ADULTES</h2>
                         </div>
			<!-- Nested grouping -->
		<div class="col-lg-12 col-md-12 col-sm-12 nestedpadding">
		
			
			
			<div class="row" >
			<!-- Nested grouping -->
		<div class="col-lg-8 col-md-8 col-sm-8 nestedpadding">
			<!-- Project 1 -->
            <div class="col-lg-6 col-md-6 col-sm-6">
			 <a class="homelink" href="sejours-linguistiques-etudiants-adultes-angleterre,1.html">
               <div class="rollover purpleroll">
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
            <div class="col-lg-6 col-md-6 col-sm-6">
				<a class="homelink" href="sejours-linguistiques-etudiants-adultes-usa,3.html">
              <div class="rollover purpleroll">
                  <img src="img/pays/usa_san_francisco.jpg" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >USA</p>
                     </div>
                     <p class="rolloverclient" >New-york, Washington, Los Angeles, Miami...</p>
                    
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpad"></div>
            </div>
			<!-- Project 3 -->
            <div class="col-lg-6 col-md-6 col-sm-6">
				<a class="homelink" href="sejours-linguistiques-etudiants-adultes-irlande,7.html">
               <div class="rollover purpleroll">
                  <img src="img/pays/irlande.jpg" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Irlande</p>
                     </div>
                     <p class="rolloverclient" >Dublin,Cork,Galway...</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpadmobilespacer"></div>
            </div>
			<!-- Project 4 -->
            <div class="col-lg-6 col-md-6 col-sm-6">
				<a class="homelink" href="sejours-linguistiques-etudiants-adultes-espagne,4.html">
               <div class="rollover purpleroll">
                 <img src="img/pays/espagne.jpg" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Espagne</p>
                     </div>
                     <p class="rolloverclient" >Madrid,Barcelone...</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpadmobilespacer"></div>
            </div>
         </div>
		 
		  <!-- Project 5 -->
            <div class="col-lg-4 col-md-4 col-sm-4">
              <a class="homelink" href="sejours-linguistiques-etudiants-adultes-australie,10.html">
                  <div class="rollover purpleroll">
                    <img src="img/pays/australie.jpg" class="img-responsive">
                     <div>
                        <div >
                           <p class="rollovertitle" >Travaillez et étudiez en Australie</p>
                        </div>
                        <p class="rolloverclient" >Sydney, Melbourne...</p>
                        <div class="divrulehome"></div>
                     </div>
                  </div>
               </a>
               <div class="gridpadmobilespacer"></div>
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
			
			
			<!-- Project 2-->
            <div class="col-lg-4 col-md-4 col-sm-4">
				<a class="homelink" href="sejours-linguistiques-etudiants-adultes-malte,12.html">
                  <div class="rollover purpleroll">
                   <img src="img/pays/malte2.jpg" alt="malte" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Malte</p>
                     </div>
                     <p class="rolloverclient" >St Julian's, St Paul's Bay</p>
                    
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpad"></div>
            </div><!--
            <div class="col-lg-6 col-md-6 col-sm-6">
			 <a class="homelink" href="sejours-linguistiques-etudiants-adultes-ecosse,6.html">
               <div class="rollover purpleroll">
                  <img src="img/pays/ecosse.jpg" alt="Ecosse" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Ecosse</p>
                     </div>
                     <p class="rolloverclient" >Edimbourg</p>
                     
                     <div class="divrulehome"></div>
                  </div>
               
               </div>
			   </a>
               <div class="gridpad"></div>
            </div>-->
			
			<!-- Project 3 -->
            <div class="col-lg-4 col-md-4 col-sm-6">
				<a class="homelink" href="sejours-linguistiques-etudiants-adultes-nouvelle-zelande,11.html">
              <div class="rollover purpleroll">
                   <img src="img/pays/nouvelle-zelande.jpg" alt="Nouvelle Zélande" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Nouvelle Zélande</p>
                     </div>
                     <p class="rolloverclient" >Auckland</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpadmobilespacer"></div>
            </div>
			<!-- Project 4 -->
            <div class="col-lg-4 col-md-4 col-sm-6">
				<a class="homelink" href="sejours-linguistiques-etudiants-adultes-canada,8.html">
               <div class="rollover purpleroll">
                  <img src="img/pays/canada.jpg" alt="Canada" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Canada</p>
                     </div>
                     <p class="rolloverclient" >Vancouver, Toronto...</p>
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
         <div class="gridpadspacer"><br></div>
			
			<div class="titles">                                
                              
                     <h2>NOS PRESTATIONS ETUDIANTS ET ADULTES</h2>
            </div>
			
			
			<!-- Project 2-->
			   <div class="col-lg-6  col-md-6 col-sm-6">
				<a class="homelink" href="cours_etudiants.php">
               <div class="rollover purpleroll">
                  <img src="img/pays/formules_cours.jpg" alt="nos formules" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Formules de cours</p>
                     </div>
                     <p class="rolloverclient" >One to one, cours + sport, Business, immersion totale...</p>
                    
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpad"></div>
            </div>
			<!-- Project 2-->
			<div class="col-lg-6 col-md-6 col-sm-6">
			 <a class="homelink" href="examens_etudiants.php">
               <div class="rollover purpleroll">
                  <img src="img/pays/examens.jpg" alt="préparez les examens avec BEC" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Examens</p>
                     </div>
                     <p class="rolloverclient" >Préparez en toute sérénité TOEIC, IELTS, TOEFL...</p>
                     
                     <div class="divrulehome"></div>
                  </div>
               
               </div>
			   </a>
               <div class="gridpad"></div>
            </div>
			<!-- Project 2-->
            <div class="col-lg-6  col-md-6 col-sm-6">
				<a class="homelink" href="jobs_etudiants.php">
               <div class="rollover purpleroll">
                  <img src="img/pays/jobs.jpg" alt="jobs" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Jobs</p>
                     </div>
                     <p class="rolloverclient" >Pour découvrir un pays en travaillant</p>
                    
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpad"></div>
            </div>
			<!-- Project 3 -->
            <div class="col-lg-6  col-md-6 col-sm-6">
				<a class="homelink" href="stages_etudiants.php">
               <div class="rollover purpleroll">
                 <img src="img/pays/stages.jpg" alt="stages non rémunérés" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Stages</p>
                     </div>
                     <p class="rolloverclient" >Des opportunités uniques d'étendre vos objectifs personnels et vos objectifs de carrière</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
              <div class="divrulehome"></div>
            </div>
			
						
			<div class="row" >
            <div class="col-lg-12">
               <div class="gridpadcrop"></div>
            </div>
         </div>
		 
		 <!-- Project 1 -->
            <!-- Project 1 -->
            <div class="col-lg-6 col-md-6 col-sm-6">
			 <a class="homelink" href="informations_generales_etudiants.php">
               <div class="rollover purpleroll">
                  <img src="img/pays/infos_pratiques.jpg"  class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Infos pratiques</p>
                     </div>
                     <p class="rolloverclient" >Transports, sélection des écoles, réservation...</p>
                     
                     <div class="divrulehome"></div>
                  </div>               
               </div>
			   </a>
               <div class="divrulehome"></div>
            </div>
		
			<!-- Project 3 -->
            <div class="col-lg-6  col-md-6 col-sm-6">
				<a class="homelink" href="hebergement_etudiants.php">
               <div class="rollover purpleroll">
                 <img src="img/pays/hebergement.jpg" alt="hebergement" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Hebergement</p>
                     </div>
                     <p class="rolloverclient" >Immersion, Indépendance ou découverte</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
              <div class="divrulehome"></div>
            </div>
			<!-- Project 4 -->
            <div class="col-lg-6 col-md-6 col-sm-6">
				<a class="homelink" href="cgv.php">
               <div class="rollover purpleroll">
                  <img src="img/pays/conditions-particulieres.jpg" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Conditions particulières</p>
                     </div>
                     <p class="rolloverclient" >Assurances, questions légales...</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpadmobilespacer"></div>
            </div>
			<!-- Project 4 -->
            <div class="col-lg-6 col-md-6 col-sm-6">
				<a class="homelink" href="visas.php">
               <div class="rollover purpleroll">
                  <img src="img/pays/visas.jpg" alt ="visas & passeports" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Visas & passeports</p>
                     </div>
                     <p class="rolloverclient" >Les documents de voyage indispensables</p>
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
				
                    </div>
                     <!-- contenu bas pages sur toute largeur-->
				
					
            </section>
            <!-- End content info-->

 <? include("footer.php"); ?>          
			
