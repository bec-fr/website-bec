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
		<meta name="description" content="BEC propose des sejours linguistiques pour adolescents 12-17 ans : Angleterre,USA,Irlande,Asutralie,Espagne,Malte">
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
              <!-- Section Title -->
            <div class="section_title juniors">
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
							<h1>Nos séjours linguistiques pour adolescents 12-17 ans</h1>
					</div>	
					<div class="col-lg-4 col-md-4">					  					

					<!-- formulaire de recherche -->
						<div class="search_box">	
                         <form name="rech2" action="recherche_junior.php" method="get">
                                                <div class="">
                                                    <label><b>Trouver un séjour Juniors 12/17 ans</b></label><br><br>                                                    
                                                </div>
                                                <div>                                                   
                                                    <select name="pays" class="select">
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
                                                   <select name="ville" class="select"  onchange="document.rech.id_date.value=''; document.rech.formule.value=''; document.rech.hebergement.value='';" onchange="this.form.submit();">

                            <option value="">toutes les villes</option>

                            <?

							$query_r = "SELECT * FROM junior_ville WHERE afficher ='1'";

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
                                                <!--<div>
                                                 <br> <select name="id_date" class="select">

                            <br>
							 <option value="">toutes les dates</option>
                            <?

							$query_r = "SELECT fd.id, fd.date_debut, fd.date_fin FROM fiche_junior_date fd INNER JOIN fiche_junior f ON fd.rid_fiche = f.id WHERE 1";//f.afficher = '1'

							if(isset($_GET["pays"]) && $_GET["pays"] != ""){

								$query_r .= " AND fd.id IN (SELECT fd.id FROM fiche_junior_date fd INNER JOIN fiche_junior f ON fd.rid_fiche = f.id WHERE f.pays = '".addslashes($_GET["pays"])."')";
							}

							if(isset($_GET["ville"]) && $_GET["ville"] != ""){

								$query_r .= " AND fd.id IN (SELECT fd.id FROM fiche_junior_date fd INNER JOIN fiche_junior f ON fd.rid_fiche = f.id WHERE f.ville = '".addslashes($_GET["ville"])."')";
							}

							if(isset($_GET["fiche"]) && $_GET["fiche"] != ""){

								$query_r .= " AND fd.id IN (SELECT id FROM fiche_junior_date WHERE rid_fiche = '".addslashes($_GET["fiche"])."')";
							}

							$query_r .= " GROUP BY fd.date_debut, fd.date_fin ORDER BY date_debut";
							$exec_r = mysql_query($query_r) or die(mysql_error());

							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["id_date"]) && $_GET["id_date"] == $data_r["id"])

									echo " selected";
								echo ">du ".parseDate($data_r["date_debut"])." au ".parseDate($data_r["date_fin"])."</option>";

							}

							?>

                            </select>
                                                </div>-->    
												<div><br>                                            
                                                    <select name="formule" class="select"  onchange="document.rech.submit();">

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
                                                  
                                                   <select name="hebergement" class="select" onchange="document.rech.submit();">

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
												<select name="tranche" class="select"  >
												<option value="">tous les âges</option>
												 <option value="12-14">12 à 14 ans</option>
												 <option value="13-15">13 à 15 ans</option>
												 <option value="14-16">14 à 16 ans</option>
												 <option value="15-17">15 à 17 ans</option>
												 </select>		
												
												</div>
                                                <div align="right">
                                                    <input type="submit" class="button junior" value="Rechercher">
                                                </div> 
                                            </form>
											</div>


					
					
					</div>	
					<div class="col-lg-8 col-md-8"><h2><i class ="fa fa-globe"></i> Le BEC est spécialiste du séjour linguistique depuis 1967</h2><p> <b>Depuis 49 ans, le BEC organise des séjours linguistiques</b> pour vous perfectionner en Anglais ou en Espagnol, découvrir le monde, échanger avec d'autres Jeunes Européens<br>
					Les Séjours Linguistiques Juniors sont <b>destinés aux adolescents de 12 à 17 ans</b> (inclus) et se déroulent durant l'été. Soucieux de proposer des séjours de qualité, BEC s'engage à respecter les termes du <b>Contrat Qualité de l’Office National de Garantie des Séjours et Stages Linguistiques</B>, elaboré en collaboration avec des fédérations de parents d'élèves et des associations de consommateurs agrées.L'Office bénéfice du soutien du Ministère chargé de la Jeunesse.<br></p>
					<p><b>Nous proposons pour votre enfant</b>: <br>
					<b>6 destinations</b> : <a href ="sejours-linguistiques-adolescents-angleterre,1.html">Angleterre</a>, <a href="sejours-linguistiques-adolescents-irlande,2.html">Irlande</a>, <a href="sejours-linguistiques-adolescents-usa,3.html">USA</a>, <a href="sejours-linguistiques-adolescents-malte,7.html">Malte</a>, <a href="sejours-linguistiques-adolescents-australie,9.html">Australie</a>, <a href="sejours-linguistiques-adolescents-espagne,14.html">Espagne</a> <br>
					<b>3 modes d'hébergement</b> : <a href="recherche_junior.php?pays=&ville=&formule=&hebergement=1&tranche=">séjour en familles hôtesses</a>, <a href="recherche_junior.php?pays=&ville=&formule=&hebergement=2&tranche=">en campus</a> ou <a href="recherche_junior.php?pays=&ville=&formule=&hebergement=14&tranche=">en hôtels</a><br>
					<b>6 formules</b> : <a href="recherche_junior.php?site=etudiant&pays=&ville=&id_date=&formule=1">Anglais & Découverte</a>, <a href="recherche_junior.php?site=etudiant&pays=&ville=&id_date=&formule=25">Espagnol & Découverte</a>, <a href="http://www.becfrance.com/formules-sejours-linguistiques-pour-adolescents.php">Anglais & sport</a>, <a href="/recherche_junior.php?site=etudiant&pays=&ville=&id_date=&formule=26">Espagnol & sport</a>, <a href="recherche_junior.php?site=etudiant&pays=&ville=&id_date=&formule=21">Anglais Intensif</a>, <a href="http://www.becfrance.com/recherche_junior.php?site=etudiant&pays=&ville=&id_date=&formule=22">Immersion & Decouverte</a>
					</p>
					
					</div>	
				
				
				</div>
				
					
                        <section class="row padding_top">
                        <!-- Properties -->
                        <!-- Contenu-->
                         <div class="row" >
						  <div class="divisor">
                                        <div class="circle_left"></div>
                                        <div class="circle_right"></div>
                                    </div>			

						<div class="col-lg-8 col-md-8">
						  <h2><i class ="fa fa-gift"></i> Nos promotions et offres spéciales juniors</h2>
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
												<div class="col-lg-4 col-md-4">
						 
					 <p><h2><i class ="fa fa-plus"></i> Les plus de nos séjours</h2>
					<li>Toutes les <b>activités et excursions mentionnées sont incluses</b>,					
					<li>Le transport est <b>exclusivement proposé en avion ou Eurostar</b>.
					<li><b>Plusieurs solutions de prise en charge</b> depuis la Province,
					<li>L'hébergement en campus est proposé au sein des universités, <b>en chambre individuelle ou double</b>
					<li>L’encadrement est assuré par nos moniteurs.
					<li><b>Quotas de Francophones</b> sur tous les centres; échanges avec d'autres Jeunes Européens,
					<li>Nous restons <b>disponibles pendant le séjour de votre enfant 7J/7 et 24H/24,</b></p>
                            
						<diV class="button"><a class="bouton" href="brochure_juniors.php"><i class="fa fa-book"></i>&nbsp;Recevoir notre brochure 2016</a></div>					

						</div>
					</div>						
					<div class="row" >					
						
						<div class="titles">                                
                                <br>
                                <h2><i class ="fa fa-globe"></i> NOS DESTINATIONS POUR LES JUNIORS</h2>
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
                     <p class="rolloverclient" >Londres,Brighton,Cambridge,Ramsgate...</p>
                     
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
                     <p class="rolloverclient" >New-york, Miami, Los Angeles, Washington...</p>
                    
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
                     <p class="rolloverclient" >Dublin,Gurteen,Westport</p>
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
                        <p class="rolloverclient" >Sydney</p>
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
                                <h2><i class ="fa fa-plus"></i> TOUTES NOS PRESTATIONS</h2>
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
			
