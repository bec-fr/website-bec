<!DOCTYPE html>
<? include("connect.php"); ?>
<?
if(strpos($_SERVER['REQUEST_URI'],"index_junior")!=false){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: sejours-linguistiques-pour-adolescents.html");
	exit();
}

$title="Séjours et stages linguistiques pour adolescents en Angleterre, USA, Irlande...";
?>
<html lang="fr">
    <head>        
        <title>Bec séjours linguistiques Juniors</title>
		<meta name="description" content="Séjour linguistiques pour adolescents Angleterre,USA,Irlande,Malte...">
        <meta name="author" content="BEC séjours lingustiques"> 
		<meta name="google-site-verification" content="qvPWx5epK-HtyqffDAoAjrGzo8j-07ABulbzlRTUtB4" />
<meta property="og:title" content="séjours linguistiques Juniors" />
<meta property="og:type" content="website" />
<meta property="og:image" content="<?=((isset($image_head) && $image_head != "") ? $image_head : "http://www.becfrance.com/images/logo.jpg")?>" />
<meta property="og:site_name" content="Bec France" />
<meta property="fb:admins" content="646853194" />
<meta itemprop="name" content="séjours linguistiques Juniors">
<meta itemprop="description" content="">
<meta itemprop="image" content="<?=((isset($image_head) && $image_head != "") ? $image_head : "http://www.becfrance.com/images/logo.jpg")?>">
<link rel="Shortcut Icon" href="images/favicon.ico" />	
        
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
<? include("top_juniors.php"); ?>
             <header> 
                <!-- Filter Search-->
				 <div class="section_title juniors">
                <div class="container">
                    <div class="row"><br><br>
                        <h1>Votre séjour linguistique junior en quelques clics</h1>
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
                                 <form action="recherche_junior.php" name="rech2" method="get">
                                    
                                    <div class="col-md-2">                                
                                        <select name="pays" class="select" style="width:150px" onchange="this.form.submit();">
													<option value="">Pays</option>

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
                                    <div class="col-md-2">
                                        <select name="ville" class="select" style="width:160px" onchange="this.form.submit();">
                            <option value="">Ville</option>
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
                                    <div class="col-md-2">                                   
                                         <select name="formule" class="select" style="width:150px" onchange="this.form.submit();">
                            <option value="">Formule</option>

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
                                    <div class="col-md-2">
                                        <select name="hebergement" style="width:160px" class="select" onchange="this.form.submit();">

                            <option value="">Hébergement</option>
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
                                    <div class="col-md-4"> 
										<select name="age_mini" class="select" style="width:85px" >
                            <option value="">Age min</option>
                            <?
							for($i=11 ; $i<=18 ; $i++){
								echo "<option value='".$i."' ".((isset($_GET["age_mini"]) && $_GET["age_mini"] == $i) ? " selected" : "").">".$i."</option>";
							}
							?>
                            </select>
                            à
                            <select name="age_maxi" class="select" style="width:85px" onchange="this.form.submit();">
                            <option value="">Age max</option>
                            <?
							for($i=11 ; $i<=18 ; $i++){
								echo "<option value='".$i."' ".((isset($_GET["age_maxi"]) && $_GET["age_maxi"] == $i) ? " selected" : "").">".$i."</option>";
							}

							?>
                            </select> ans										
											
                                    </div> 
                                </form>       
                            </div>
                        </div>
						
						<!-- Newsletter Box -->                  
                    
                    </div>
					
                    <!-- End filter-horizontal -->
				
					
                        <section class="row padding_top">
                        <!-- Properties -->
                        <!-- Contenu-->
                         <div class="row" >
						<div class="col-lg-4">
						 
                            <!-- Contenu-->
                          <p>
                     Des séjours linguistiques pour vous perfectionner en Anglais , Espagnol ou Allemand, découvrir le monde, échanger avec d'autres Jeunes Européens<br>

Les Séjours Linguistiques Juniors sont destinés aux adolescents de 12 à 17 ans (inclus) et se déroulent durant l'été. 
<br>
Nous proposons :

6 destinations : Angleterre, Irlande, USA, Malte, Australie; Espagne
3 modes d'hébergement : séjour en familles hôtesses, en campus ou en hôtels,
5 formules : Langue & Découverte, Langue & Sports, 100% Anglais, Semi Immersion, Découverte et Intégration scolaire en Australie.
Et pour tous les séjours,

<li>Toutes les activités et excursions mentionnées sont incluses,
<li>Vous choisissez vous-même votre ville de séjour,
<li>Le transport est exclusivement proposé en avion ou Eurostar.
<li>Plusieurs solutions de prise en charge depuis la Province,
<li>L'hébergement en campus est proposé au sein des universités, en chambre individuelle ou double
<li>L’encadrement est assuré par nos moniteurs.
<li>Quotas de Francophones sur tous les centres; échanges avec d'autres Jeunes Européens,
<li>Nous restons disponibles pendant le séjour de votre enfant 7J/7 et 24H/24,</p>

						</div>
						<div class="col-lg-8">
						  <h2>Nos promotions et offres spéciales juniors</h2>
					  <?
//les slides
$queryB = "SELECT * FROM bandeau WHERE afficher = '1' AND site='2' ORDER BY ordre";
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
					</div>						
					<div class="row" >					
						
						<div class="titles">                                
                                <br>
                                <h2>NOS DESTINATIONS POUR LES JUNIORS</h2>
                         </div>
			<!-- Nested grouping -->
		<div class="col-lg-12 col-md-12 col-sm-12 nestedpadding">	
			
			
			<div class="row" >
			<!-- Nested grouping -->
		<div class="col-lg-12  nestedpadding">
           <div class="col-lg-4 col-md-4 col-sm-4">
			 <a class="homelink" href="sejours-linguistiques-adolescents-angleterre,1.html">
               <div class="rollover pinkroll">
                  <img src="img/pays/angleterre.jpg" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Grande-Bretagne</p>
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
				<a class="homelink" href="sejours-linguistiques-adolescents-usa,3.html">
              <div class="rollover pinkroll">
                  <img src="img/pays/usa.jpg" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >USA</p>
                     </div>
                     <p class="rolloverclient" >New-york, Washington, Virgine, Floride...</p>
                    
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpad"></div>
            </div>
			
			<div class="col-lg-4 col-md-4 col-sm-4">
				<a class="homelink" href="sejours-linguistiques-adolescents-irlande,2.html">
               <div class="rollover pinkroll">
                  <img src="img/pays/irlande.jpg" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Irlande</p>
                     </div>
                     <p class="rolloverclient" >Dublin,Gurtin,Wesport</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpadmobilespacer"></div>
            </div>
			
			
			
			</div>
		<div class="col-lg-12 col-md-12 col-sm-12 nestedpadding">	
			<!-- Project 3 -->
            
			
		
			<!-- Project 4 -->
            <div class="col-lg-4 col-md-4 col-sm-4">
				<a class="homelink" href="sejours-linguistiques-adolescents-malte,7.html">
               <div class="rollover pinkroll">
                 <img src="img/pays/malte2.jpg" class="img-responsive">
                  <div>
                     <div >
                        <p class="rollovertitle" >Malte</p>
                     </div>
                     <p class="rolloverclient" >Malte</p>
                     <div class="divrulehome"></div>
                  </div>
               </div>
				</a>
               <div class="gridpadmobilespacer"></div>
            </div>
				 
		  <!-- Project 5 -->
            <div class="col-lg-4 col-md-4 col-sm-4">
              <a class="homelink" href="sejours-linguistiques-adolescents-australie,9.html">
                  <div class="rollover pinkroll">
                    <img src="img/pays/australie.jpg" class="img-responsive">
                     <div>
                        <div >
                           <p class="rollovertitle" >Australie</p>
                        </div>
                        <p class="rolloverclient" >Queensland</p>
                        <div class="divrulehome"></div>
                     </div>
                  </div>
               </a>
               <div class="gridpadmobilespacer"></div>
            </div>
			<!-- Project 5 -->
         <div class="col-lg-4 col-md-4 col-sm-4">
              <a class="homelink" href="sejours-linguistiques-adolescents-espagne,14.html">
                  <div class="rollover pinkroll">
                    <img src="img/pays/espagne.jpg" class="img-responsive">
                     <div>
                        <div >
                           <p class="rollovertitle">Espagne</p>
                        </div>
                        <p class="rolloverclient" >Barcelone, Madrid</p>
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
         </div>
		 </div>

				<div class="row" >
			
						
						
						<div class="titles">                                
                                <br>
                                <h2>TOUTES NOS PRESTATIONS</h2>
                         </div>
			<!-- Nested grouping -->
					<div class="col-lg-12 col-md-12 col-sm-12 nestedpadding">
						<!-- Project 1 -->
						<div class="col-lg-3 col-md-6 col-sm-6">
						 <a class="homelink" href="prestation_junior.php">
						   <div class="rollover pinkroll">
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
						<div class="col-lg-3 col-md-6 col-sm-6">
							<a class="homelink" href="formules-sejours-linguistiques-pour-adolescents.php">
						   <div class="rollover pinkroll">
							  <img src="img/pays/formules.jpg" alt="nos formules" class="img-responsive">
							  <div>
								 <div >
									<p class="rollovertitle" >Nos formules</p>
								 </div>
								 <p class="rolloverclient" >Toutes nos formules pour les Juniors</p>
								
								 <div class="divrulehome"></div>
							  </div>
						   </div>
							</a>
						   <div class="gridpad"></div>
						</div>
						<!-- Project 3 -->
						<div class="col-lg-3 col-md-6 col-sm-6">
							<a class="homelink" href="avantage_junior.php">
						   <div class="rollover pinkroll">
							 <img src="img/pays/avantages.jpg" class="img-responsive">
							  <div>
								 <div >
									<p class="rollovertitle">Avantages</p>
								 </div>
								 <p class="rolloverclient" >Tous les avantages à partir avec le BEC</p>
								 <div class="divrulehome"></div>
							  </div>
						   </div>
							</a>
						   <div class="gridpadmobilespacer"></div>
						</div>
						<!-- Project 4 -->
						<div class="col-lg-3 col-md-6 col-sm-6">
							<a class="homelink" href="cgv_junior.php">
						   <div class="rollover pinkroll">
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
					
              </div>	</div>	     
					
					</div>	
                        <!-- fin contenu -->
						<!-- Aside -->
						                   
						
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					
            </section>
            <!-- End content info-->

 <? include("footer_juniors.php"); ?>          
			
