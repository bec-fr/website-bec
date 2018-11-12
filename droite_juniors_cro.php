
							<div class="col-md-3"> 
															
                            <!-- Search Advance -->
                            <aside>            
							<span class="titre">Affinez votre projet</span>							
                                <div class="search_advance">
                                    
                                    
                                    <div class="clearfix"></div>
                                    <div class="switcher-panel"></div> 
									<!-- 2-content -->
									
                                    <div id="1-content" class="switcher-content set2 show">
                                       <div class="search_box">
									   <script type="text/javascript" src="./dept_xhr.js" charset="iso_8859-1"></script>
                                            <form name="rech2" action="recherche_junior_cro.php" method="get">
                                                <div class="">
                                                    <label><b>Trouver un séjour adolescent</b></label>                                                    
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
							
                         
                            <aside class="hidden-sm"> 
                            <!-- End Search Advance -->
                            
                            <diV class="button"><a class="bouton" href="http://www.becfrance.com/wp/sejours-adolescent-contact/">Contactez un conseiller</a></div>
                            <diV class="button"><a class="bouton" href="http://www.becfrance.com/wp/sejours-adolescent-contact/">Demandez une brochure</a></div>
                        
                            </aside> 
							
                        </div>
                        <!-- End Aside -->
						
						