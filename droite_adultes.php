
							<div class="col-md-3"> 
							<aside class="hidden-sm"> 
                            <!-- End Search Advance -->							
							<diV class="button"><a class="bouton" href="devis.php"><i class="fa fa-edit"></i>&nbsp;Etablir un devis</a></div>
							<diV class="button"><a class="bouton" href="brochure.php"><i class="fa fa-book"></i>&nbsp;Télécharg. brochure</a></div>
							<diV class="button"><a class="bouton" href="tel:+33155352500"><i class="fa fa-phone"></i>&nbsp;01 55 35 25 00</a></div>							
						
							</aside>
 								
                            <!-- Search Advance -->
                            <aside>            
													
                                <div class="search_advance">
                                 
                                    
                                    <div class="clearfix"></div>
                                    <div class="switcher-panel"></div> 
									
									
									  <!-- 1-content -->
                                    <div id="3-content" class="switcher-content set2 show">
									 
                                        <div class="search_box calculator">
										<script type="text/javascript" src="./dept_xhr.js" charset="iso_8859-1"></script>
                                             <form name="rech" action="recherche.php" method="get">
                                              <label><B>Trouver un séjour Etudiants/adultes</B></label>						
                                                
                                                <div>
													 <select name="pays" id="pays" class="select" onchange="getAdultes(this.value);" style="width:170px"  >                                               
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
                                                <div>   
													<!--- affichage ajax -->
													<span id="blocDepartements"> 
												
                                                    <select name="ville" id="ville" class="select" style="width:170px">

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

                            </select>
                                               
												
                                                                                         
                                                    <select name="hebergement" onchange="this.form.submit();">

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
                                                </span>
							</div>							
							<!-- fin affichage ajax -->	
																							
                                                 <input type="submit" class="button" value="Rechercher">
                                            </form>   
                                            <div id="result_calculator"></div>    
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
							<option selected value="6">Séjours Etudiants/adultes</option>
							<option value="5">Séjours Juniors 12-17 ans</option>
							<option value="7">Voyages Scolaires</option></select>
   
	<div align="right"><input  align="right" type="submit"  class="button" value="S'inscrire"></div>
    
  </form>
  </div>
							</aside>
							
							 <!-- Accordion -->
							 <!--
                          <aside>
                              <h2>Nos prestations </h2>
                              
                              <div class="accordion-trigger">Pourquoi choisir le bec </div>     
                              <div class="accordion-container">       
                                  <p>Découvrez <a href="avantage_minis.php">tous les avantages</a> à choisir un organisme établi depuis 1967</p>
                              </div>

                              <div class="accordion-trigger">Formules</div>    
                              <div class="accordion-container">                         
                                   <p>Nous avons étudié pour vous <a href="presentation_formules_minis.php">des programmes types qui couvrent les principaux sites d’intérêt</a> autour de nos centres de séjour.</p>                      
                              </div>
                                        
                              <div class="accordion-trigger">Prestations</div>   
                              <div class="accordion-container">
                                   <p><a href="prestation_minis.php">Hebergement, transport confort.</a></p>                             
                              </div>
							   <div class="accordion-trigger">Conditions particulières</div>   
                              <div class="accordion-container">
                                   <p><a href="cgv_minis.php">Informations pratiques et légales pour les minis séjours</a></p>                             
                              </div>
                          </aside>
                         -->
							
                        </div>
                        <!-- End Aside -->
						
						