
							<div class="col-md-3"> 
							<aside class="hidden-sm"> 
                            <!-- End Search Advance -->
							
							<diV class="button"><a class="bouton" href="brochure_juniors.php"><i class="fa fa-book"></i>&nbsp;Demande de brochure</a></div>
							<diV class="button"><span class="number"><a class="bouton" href="#"><i class="fa fa-phone"></i>&nbsp;01 55 35 25 00</a></span></div>						
						
							</aside> 
								
                            <!-- Search Advance -->
                            <aside>            
							<!--<span class="titre">Trouver un séjour Juniors</span>-->							
                                <div class="search_advance">
                                    
                                    
                                    <div class="clearfix"></div>
                                    <div class="switcher-panel"></div> 
									<!-- 2-content -->
									
                                    <div id="1-content" class="switcher-content set2 show">
                                       <div class="search_box">
									   <script type="text/javascript" src="./dept_xhr.js" charset="iso_8859-1"></script>
                                            <form name="rech2" action="recherche_junior.php" method="get">
                                                <div class="">
                                                    <label><b>Trouver un séjour Juniors</b></label>                                                    
                                                </div>
                                                <div>                                                   
                                                    <select name="pays" id="pays" class="select" onchange="getDepartements(this.value);" style="width:170px"  >
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
													<!--- affichage ajax -->
													<span id="blocDepartements">                                
                                                   <select name="ville" id="ville" class="select" style="width:170px" onchange="document.rech.id_date.value=''; document.rech.formule.value=''; document.rech.hebergement.value='';">

                            <option value="">toutes les villes</option>

                            <?

							$query_r = "SELECT * FROM junior_ville WHERE afficher='1'";

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
							   
                                              <!--<br>
                                                
												<br><select name="id_date" class="select" style="width:170px">

                            <br>
							 <option value="">toutes les dates</option>
                            // <?

							// $query_r = "SELECT fd.id, fd.date_debut, fd.date_fin FROM fiche_junior_date fd INNER JOIN fiche_junior f ON fd.rid_fiche = f.id WHERE f.afficher = '1'";

							// if(isset($_GET["pays"]) && $_GET["pays"] != ""){

								// $query_r .= " AND fd.id IN (SELECT fd.id FROM fiche_junior_date fd INNER JOIN fiche_junior f ON fd.rid_fiche = f.id WHERE f.pays = '".addslashes($_GET["pays"])."')";
							// }

							// if(isset($_GET["ville"]) && $_GET["ville"] != ""){

								// $query_r .= " AND fd.id IN (SELECT fd.id FROM fiche_junior_date fd INNER JOIN fiche_junior f ON fd.rid_fiche = f.id WHERE f.ville = '".addslashes($_GET["ville"])."')";
							// }

							// if(isset($_GET["fiche"]) && $_GET["fiche"] != ""){

								// $query_r .= " AND fd.id IN (SELECT id FROM fiche_junior_date WHERE rid_fiche = '".addslashes($_GET["fiche"])."')";
							// }

							// $query_r .= " GROUP BY fd.date_debut, fd.date_fin ORDER BY date_debut";
							// $exec_r = mysql_query($query_r) or die(mysql_error());

							// while($data_r = mysql_fetch_assoc($exec_r)){

								// echo "<option value='".$data_r["id"]."'";
								// if(isset($_GET["id_date"]) && $_GET["id_date"] == $data_r["id"])

									// echo " selected";
								// echo ">du ".parseDate($data_r["date_debut"])." au ".parseDate($data_r["date_fin"])."</option>";

							// }

							// ?>

                            </select>-->
							
							
							
							
							<br> <br>                                               
							<select name="formule" class="select" style="width:170px">

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
                                               
							</span>
							</div>							
							<!-- fin affichage ajax -->	
									
												<div>
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
												<select name="tranche" class="select" >
												<option value="">tous les âges</option>
												 <option value="11-13">11 à 13 ans</option>
												 <option value="13-15">13 à 15 ans</option>
												  <option value="14-16">14 à 16 ans</option>
												 <option value="15-17">15 à 17 ans</option>
												 </select>
												
												
												
												
												</div>
                                                <div>
                                                    <input type="submit" class="button junior" value="Rechercher">
                                                </div> 
                                            </form>                               
                                        </div>   
                                    </div>
                                    <!-- End 1-content -->
                                    
                                </div>  
                            </aside>
							<aside>
							 <div class="search_box2">
							 <b>Recevoir notre Newsletter</b>
							<form name="newsletter" method="get" action="newsletter.php"> 
							<input type="email" name="mail"  value="votre e-mail" class="texteGris" onfocus="if(this.value=='votre e-mail'){this.value='';}" />
							<br><input type="radio" checked name="inscription" value="1" /><label>Inscription</label>
							<input type="radio" name="inscription" value="0" />Desinscription<br />
							<label>Choisissez votre centre d'interet</label>
							<select name="groupe">							 
							<option value="1">Tous nos séjours</option>								
							<option value="6">Séjours Etudiants/adultes</option>
							<option selected value="5">Séjours Juniors 12-17 ans</option>
							<option value="7">Voyages Scolaires</option></select>
   
	<div align="right"><input  align="right" type="submit"  class="button" value="S'inscrire"></div>
    
  </form>
  </div>
							</aside>
							 <!-- Accordion -->
                          <aside>
                             <!-- <h2>Nos prestations Juniors</h2>-->
                              
                              <div class="accordion-trigger">Prestations </div>     
                              <div class="accordion-container">       
                                  <p>Transport, hébergement, cours, encadrement et méthode pédagogique: <a href="prestation_junior.php">votre séjour dans les grandes lignes.</a></p>
                              </div>
							  <div class="accordion-trigger">Formules </div>     
                              <div class="accordion-container">       
                                  <p><a href="formules-sejours-linguistiques-pour-adolescents.php">Sport, immersion, intensif, découverte</a> : il y a forcément une formule qui vous convient.</p>
                              </div>
							  
							 
							  
							  

                              <div class="accordion-trigger">Réductions</div>    
                              <div class="accordion-container">                         
                                   <p>Afin de vous permettre de réduire le coût du séjour, le BEC vous propose <a href="reduction_junior.php">différentes réductions</a></p>                      
                              </div>
                                        
                              <div class="accordion-trigger">Avantages</div>   
                              <div class="accordion-container">
                                   <p><a href="avantage_junior.php">6 bonnes raisons de partir avec le BEC.</a></p>                             
                              </div>
							   <div class="accordion-trigger">Conditions particulières</div>   
                              <div class="accordion-container">
                                   <p><a href="cgv_junior.php">Informations pratiques et légales pour les séjours juniors</a></p>                             
                              </div>
                          </aside>
                         
							
                        </div>
                        <!-- End Aside -->
						
						