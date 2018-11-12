<script>
function change_action(value){

	var page;

	if(value == "minis"){

		page = "index_minis.php";
	}else if(value == "junior"){

		page = "index_junior.php";
	}else{

		page = "index_adulte.php";
	}

	document.rech.action = page;

}

</script>
							<div class="col-md-3"> <br><br>
							<aside class="hidden-sm"> 
                            <!-- End Search Advance -->
							
							<? if (isset($hide)) {	
									}	
							else{									
							?>
							
							<diV class="button"><a class="bouton" href="devis_minis.php"><i class="fa fa-book"></i>&nbsp;Devis personnalisé</a></div>
							<? }	?>
							<diV class="button"><a class="bouton" href="brochure_minis.php"><i class="fa fa-book"></i>&nbsp;Demande de brochure</a></div>
							<!--<diV class="button"><a class="bouton" href="#"><i class="fa fa-phone"></i>&nbsp;01 55 35 25 00</a></div>	-->					
						
							</aside> 
								
                            <!-- Search Advance -->
                            <aside>            
							<span class="titre">Ma recherche</span>							
                                <div class="search_advance">
                                    <ul class="tabs_services">	
										 <li class="scolaires"><a id="1" class="switcher set2">Scolaires</a> </li> 	
										                                             
                                                                   
                                    </ul>
                                    
                                    <div class="clearfix"></div>
                                    <div class="switcher-panel"></div> 
									
									
									<!-- scolaires -->
                                    <div id="1-content" class="switcher-content set2 show">
                                       <div class="search_box">
                                             <form name="rech" action="recherche_minis.php" method="get">
                                                <div>
                                                    <label>Trouver un voyage scolaire</label>
                                                 
                                                </div>
                                                <div>
                                                    <label>Pays</label>
                                                    <select name="pays" class="select" onchange="this.form.ville.value=''; this.form.submit();">

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
												
												
												
												 <div>
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
                                                </div>												
                                                <div>
                                                    <input type="submit" class="button" value="Rechercher">
                                                </div> 
                                            </form>                               
                                        </div>   
                                    </div>
                                    <!-- fin scolaires -->
									

                                    
									
                                    
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
							<option value="5">Séjours Juniors 12-19 ans</option>
							<option selected value="7">Voyages Scolaires</option></select>
   
	<div align="right"><input  align="right" type="submit"  class="button" value="S'inscrire"></div>
    
  </form>
  </div>
							</aside>
							 <!-- Accordion -->
                          <aside>
                            
                              
                              <div class="accordion-trigger">Pourquoi choisir le bec </div>     
                              <div class="accordion-container">       
                                  <p>Découvrez <a href="avantage_minis.php">tous les avantages</a> à choisir un organisme établi depuis 1967</p>
                              </div>

                              <div class="accordion-trigger">Formules</div>    
                              <div class="accordion-container">                         
                                   <p>Nous avons étudié pour vous <a href="presentation_formules_minis.php">des programmes types qui couvrent les principaux sites d’intérêt</a> autour de nos centres de séjour.</p>                      
                              </div>
                                        
                              <div class="accordion-trigger">Nos prestations</div>   
                              <div class="accordion-container">
                                   <p><a href="prestation_minis.php">Hebergement, transport confort.</a></p>                             
                              </div>
							   <div class="accordion-trigger">Conditions particulières</div>   
                              <div class="accordion-container">
                                   <p><a href="cgv_minis.php">Informations pratiques et légales pour les minis séjours</a></p>                             
                              </div>
                          </aside>                        
							
                        </div>
                        <!-- End Aside -->
						
						