<!DOCTYPE html>
<? include("connect.php"); ?>
<?
if(strpos($_SERVER['REQUEST_URI'],"index_adulte")!=false){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: sejours-linguistiques-pour-etudiants-adultes.html");
	exit();
}

$title="S�jours et stages linguistiques pour �tudiants et adultes en Angleterre, USA, Irlande,Malte...";
?>
<html lang="fr">
    <head>   
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Bec s�jours linguistiques pour Etudiants et Adultes</title>  
        <meta name="keywords" content="sejours linguistique adulte,stages,jobs � l'�tranger" />
        <meta name="description" content="S�jours et stages linguistiques pour �tudiants et adultes Angleterre,USA,Canada,Irlande,Malte">
        <meta name="author" content="Bec sejours linguistiques">  
        
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
		
		<script type="text/javascript">
		    var callback = function(formatted_number, mobile_number) {
		      // formatted_number: num�ro � afficher, au m�me format
		      //        que le num�ro transmis � _googWcmGet().
		      //        (ici, '1-800-123-4567')
		      // mobile_number: num�ro au format de lien cliquable
		      //        avec tel:-URI (ici, '+18001234567')
		      var e = document.getElementById("number");
		      e.innerHTML = "";
		      e.appendChild(document.createTextNode(formatted_number));
		    };
		  </script>
    </head>
<? include("top_adultes.php"); ?>           
          <!-- Section Title -->
            <div class="section_title features">
                <div class="container">
                    <div class="row"> 
						
                        <div class="col-md-10 "><br>
                          
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
                              <div align="right" class="col-md-12 titre"> 
												
                                </div>								
                            </div>
                        </div>
                    </div>
                    <!-- End Newsletter Box -->
					
					<div class="row" >
					<div class="titles">						 
							<h1>Nos s�jours linguistiques �tudiants et adultes</h1>
					</div>	
					<div class="col-lg-4 col-md-4">		
						<!-- formulaire de recherche -->
						
						
						<div class="search_box">
						<script type="text/javascript" src="./dept_xhr.js" charset="iso_8859-1"></script>	
                        
                                 <form name="rech" action="recherche.php" method="get">
								 
								  <div>
                                                    <label><b>Trouver un s�jour Etudiants & Adultes</b></label>                                                    
                                     </div>
								 <div>
													 <select name="pays" id="pays" class="select" onchange="getAdultes(this.value);" style="width:190px"  >                                               
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

							?>        
                                                    </select>
                                                </div> 
                                                <div> <br>	  
													<!--- affichage ajax -->
													<span id="blocDepartements"> 											
                                                    <select name="ville" id="ville" class="select" style="width:190px">
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
                            </select><br> <br> 
                                                                                            
                                                    <select name="formule" class="select"  onchange="this.form.submit();">

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
                            </select> <br>  <br>                                             
												
                                                                                         
                                                    <select name="hebergement" onchange="this.form.submit();">
                            <option value="">tous les h�bergements</option>
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
                                                </span>
							</div>							
							<!-- fin affichage ajax -->	
																							
                                                 <input type="submit" class="button" value="Rechercher">
                                            </form>   
                                            <div id="result_calculator"></div>    
                                         </div>            
                                    </div>
					
						
						<!-- Newsletter Box -->                  
						<div class="col-lg-8 col-md-8"><h2><i class ="fa fa-globe"></i> Etudier - Voyager - Explorer </h2><p> Vous r�vez de partir �tudier � l'�tranger ? Depuis 49 ans, le BEC, membre et signataire du � Contrat Qualit� � de l�Office National de Garantie des S�jours et Stages Linguistiques, <b>accompagne les �tudiants dans le choix de leurs s�jours linguistiques</b> en s�lectionnant des �coles partenaires respectant les standards de qualit� requis pour l�enseignement d�une langue � des �tudiants �trangers et pour la s�lection des familles h�tesses et r�sidences.<br> Nos centres et �coles partenaires vous accueillent <b>individuellement toute l�ann�e</b> et proposent <b>des cours de langue, des pr�parations aux examens officiels, des stages professionnels non r�mun�r�s ainsi que des jobs r�mun�r�s.</b> Elles vous proposent �galement d'�tudier pendant <b>un semestre � l'�tranger ou une ann�e acad�mique (Gap Year) </b> </p>
						<div align="right">
						<diV align="right" style="width:265px" class="button"><a class="bouton" href="brochure.php"><i class="fa fa-book"></i>&nbsp;T�l�charger la brochure</a></div>
						<diV align="left" style="width:265px" class="button"><a class="bouton" href="tel:+33155352500"><i class="fa fa-phone"></i>&nbsp;01 55 35 25 00</a></div>
						</div>
						
						</div>	
                    </div>
					
                    <!-- End filter-horizontal -->
				
					
                        <section class="row padding_top">					
                        
                         <div class="col-md-12">
						
                            <!-- Contenu-->
    
						
						<!-- destinations --> 
					<div class="row" >
						
						
						<div class="titles">                                
                                <br><br>
                                <h2>NOS DESTINATIONS ETUDIANTS & ADULTES</h2>
                         </div>
			
	     
    	
			<div class="col-lg-12 nestedpadding">
			<!-- Project 1 -->
            <div class="col-lg-4 col-md-4 col-sm-6">
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
            <div class="col-lg-4 col-md-4 col-sm-6">
				<a class="homelink" href="sejours-linguistiques-etudiants-adultes-usa,3.html">
              <div class="rollover purpleroll">
                  <img src="img/pays/usa_san_francisco.jpg" alt="s�jours USA" class="img-responsive">
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
             <div class="col-lg-4 col-md-4 col-sm-6">
				<a class="homelink" href="sejours-linguistiques-etudiants-adultes-irlande,7.html">
               <div class="rollover purpleroll">
                  <img src="img/pays/irlande.jpg"  alt="irlande" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Irlande</p>
                     </div>
                     <p class="rolloverclient" >Dublin,Cork,Galway...</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpad"></div>
            </div>
			
		
		<div class="col-lg-12 nestedpadding">
			<!-- Project 4 -->
            <div class="col-lg-4 col-md-4 col-sm-6">
				<a class="homelink" href="sejours-linguistiques-etudiants-adultes-espagne,4.html">
               <div class="rollover purpleroll">
                 <img src="img/pays/espagne.jpg" alt ="espagne" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Espagne</p>
                     </div>
                     <p class="rolloverclient" >Madrid,Barcelone...</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpad"></div>
            </div>       
		 
		  <!-- Project 5 -->
            <div class="col-lg-4 col-md-4 col-sm-6">
              <a class="homelink" href="sejours-linguistiques-etudiants-adultes-australie,10.html">
                  <div class="rollover purpleroll">
                    <img src="img/pays/australie.jpg" alt ="Asutralie" class="img-responsive">
                     <div>
                        <div >
                           <p class="rollovertitle" >Travaillez et �tudiez en Australie</p>
                        </div>
                        <p class="rolloverclient" >Sydney, Melbourne...</p>
                        <div class="divrulehome"></div>
                     </div>
                  </div>
               </a>
              <div class="gridpad"></div>
            </div> 
				
			
			<!-- Project 2-->
             <div class="col-lg-4 col-md-4 col-sm-6">
				<a class="homelink" href="sejours-linguistiques-etudiants-adultes-malte,12.html">
                  <div class="rollover purpleroll">
                   <img alt="Malte" src="img/pays/malte2.jpg" alt="malte" class="img-responsive">
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
            </div>
		</div>	
		<div class="col-lg-12 nestedpadding">
            <div class="col-lg-4 col-md-4 col-sm-6">
			 <a class="homelink" href="sejours-linguistiques-etudiants-adultes-ecosse,6.html">
               <div class="rollover purpleroll">
                  <img src="img/pays/ecosse.jpg" alt="Ecosse" alt="Ecosse" class="img-responsive">
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
            </div>
			
			<!-- Project 3 -->
            <div class="col-lg-4 col-md-4 col-sm-6">
				<a class="homelink" href="sejours-linguistiques-etudiants-adultes-nouvelle-zelande,11.html">
              <div class="rollover purpleroll">
                   <img src="img/pays/nouvelle-zelande.jpg" alt="Nouvelle Z�lande" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Nouvelle Z�lande</p>
                     </div>
                     <p class="rolloverclient" >Auckland</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpad"></div>
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
             <div class="gridpad"></div>
            </div>
			</div>
		 

		
			
		 <!-- Spacer Row -->
         <div class="row" >
            <div class="col-lg-12">
               <div class="gridpadcrop"></div>
            </div>
         </div>
		 
		                      <div class="row" >
						
						 <div class="col-lg-7">
						  <h2>Nos promotions et offres sp�ciales adultes</h2>
					  <?
//les slides
$queryB = "SELECT * FROM bandeau WHERE afficher = '1' AND site='1' ORDER BY ordre";
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
                                       <p><?=stripslashes($tab_slide[$i]["texte"])?>
                                        <font size="+2"><b><?=($tab_slide[$i]["prix"])?> </b> </font>   </p>   </div>    
                                               
                                    </div>
                                </div>
                                <!-- End Item Slide -->  
                                         <?
	}
	?>                      
                            </div>
                            <!-- End Slide-->  
								  
						</div>
						<div class="col-lg-5">						
                       <h2><i class="fa fa-star"></i>&nbsp;5 raisons de choisir BEC pour votre s�jour</h2>                                           
                   <ul>
			<li>Nous sommes <b>sp�cialistes du s�jour linguistique depuis 1967.</b>	   
			<li>Vous payez exactement <b>le m�me tarif qu'en reservant directement � l'�cole, l'assistance et le service en plus.</b>
			<li>Vous profitez de <b>promotions et d'offres sp�ciales</b> sur les s�jours.
			<li>Nos conseillers sp�cialis�s sont <b>disponibles pour vous aiguiller dans le choix du s�jour le mieux adapt�</b> �  votre niveau et vos objectifs. 
			<li>Vous b�n�ficiez de notre <b>assurance Responsabilit� Civile Professionnelle</b> souscrite aupr�s de MMA ansi que de la garantie des fonds d�pos�s aupr�s de l'APST.			
					
			</ul>			
			
                </div>
          
					  </div>
		 
		 
		 
         <div class="gridpadspacer"><br></div>
			
			<div class="titles">                                
                              
                     <h2>NOS PRESTATIONS ETUDIANTS ET ADULTES</h2>
            </div>
			
			
			<!-- Project 2-->
			   <div class="col-lg-4 col-md-4 col-sm-6">
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
			<div class="col-lg-4 col-md-4 col-sm-6">
			 <a class="homelink" href="examens_etudiants.php">
               <div class="rollover purpleroll">
                  <img src="img/pays/examens.jpg" alt="pr�parez les examens avec BEC" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Examens</p>
                     </div>
                     <p class="rolloverclient" >Pr�parez en toute s�r�nit� TOEIC, IELTS, TOEFL...</p>
                     
                     <div class="divrulehome"></div>
                  </div>
               
               </div>
			   </a>
               <div class="gridpad"></div>
            </div>
			<!-- Project 2-->
            <div class="col-lg-4 col-md-4 col-sm-6">
				<a class="homelink" href="jobs_etudiants.php">
               <div class="rollover purpleroll">
                  <img src="img/pays/jobs.jpg" alt="jobs" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Jobs</p>
                     </div>
                     <p class="rolloverclient" >Pour d�couvrir un pays en travaillant</p>
                    
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpad"></div>
            </div>
			<!-- Project 3 -->
           <div class="col-lg-4 col-md-4 col-sm-6">
				<a class="homelink" href="stages_etudiants.php">
               <div class="rollover purpleroll">
                 <img src="img/pays/stages.jpg" alt="stages non r�mun�r�s" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Stages</p>
                     </div>
                     <p class="rolloverclient" >Des opportunit�s uniques d'�tendre vos objectifs personnels et vos objectifs de carri�re</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
              <div class="divrulehome"></div>
            </div>
			
			
		 
		 <!-- Project 1 -->
            <!-- Project 1 -->
            <div class="col-lg-4 col-md-4 col-sm-6">
			 <a class="homelink" href="informations_generales_etudiants.php">
               <div class="rollover purpleroll">
                  <img src="img/pays/infos_pratiques.jpg"  class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Infos pratiques</p>
                     </div>
                     <p class="rolloverclient" >Transports, s�lection des �coles, r�servation...</p>
                     
                     <div class="divrulehome"></div>
                  </div>               
               </div>
			   </a>
               <div class="divrulehome"></div>
            </div>
		
			<!-- Project 3 -->
            <div class="col-lg-4 col-md-4 col-sm-6">
				<a class="homelink" href="hebergement_etudiants.php">
               <div class="rollover purpleroll">
                 <img src="img/pays/hebergement.jpg" alt="hebergement" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Hebergement</p>
                     </div>
                     <p class="rolloverclient" >Immersion, Ind�pendance ou d�couverte</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
              <div class="divrulehome"></div>
            </div>
			<!-- Project 4 -->
           <div class="col-lg-4 col-md-4 col-sm-6">
				<a class="homelink" href="cgv.php">
               <div class="rollover purpleroll">
                  <img src="img/pays/conditions-particulieres.jpg" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Conditions particuli�res</p>
                     </div>
                     <p class="rolloverclient" >Assurances, questions l�gales...</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpadmobilespacer"></div>
            </div>
			<!-- Project 4 -->
            <div class="col-lg-4 col-md-4 col-sm-6">
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
			
