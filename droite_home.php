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
							<div class="col-md-3"> 
							<aside class="hidden-sm"> 
                            <!-- End Search Advance -->							
							<diV class="button"><a class="bouton" href="#"><i class="fa fa-phone"></i>&nbsp;01 55 35 25 00</a></div>						
						
							</aside> 
								
                            <!-- Search Advance -->
                            <aside>            
							<span class="titre">Ma recherche</span>							
                                <div class="search_advance">
                                    <ul class="tabs_services">	
										 <li class="scolaires"><a id="1" class="switcher set2">Scolaires</a> </li> 	
										<li class="juniors"><a id="2" class="switcher set2">Juniors</a></li>
                                        <li class="etudiants"><a id="3" class="switcher set2">Adultes</a></li>
                                                                   
                                    </ul>
                                    
                                    <div class="clearfix"></div>
                                    <div class="switcher-panel"></div> 
									
									
									<!-- scolaires -->
                                    <div id="1-content" class="switcher-content set2 show">
                                       <div class="search_box">
                                             <form name="rech" action="recherche_minis.php" method="get">
                                                <div>
                                                    <label>Trouver minis séjours</label>
                                                 
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
									
									
									
									<!-- 2-content -->
                                    <div id="2-content" class="switcher-content">
                                       <div class="search_box">
                                            <form action="recherche_junior.php">
                                                <div class="">
                                                    <label>Trouver un séjour Juniors</label>                                                    
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
                                                <div>
                                                 <br> <select name="id_date">

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
												
												de <select name="age_mini" class="select" style="width:50px" >

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

                            </select> ans
												
												
												</div>
                                                <div>
                                                    <input type="submit" class="button junior" value="Rechercher">
                                                </div> 
                                            </form>                               
                                        </div>   
                                    </div>
                                    <!-- End 1-content -->
                                    <!-- 1-content -->
                                    <div id="3-content" class="switcher-content set2">
                                        <div class="search_box calculator">
                                             <form name="rech" action="recherche.php" method="get">
                                              <label>Trouver un séjour Etudiants/adultes</label>
						
                                                
                                                <div>                                                
                                                    <select name="pays" class="select"  onchange="document.rech.submit();">
                                                        <option value="">Tous les pays</option>                                  
                                                        <?

							$query_r = "SELECT * FROM pays ORDER BY nom";

							$exec_r = mysql_query($query_r) or die(mysql_error());

							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["pays"]) && $_GET["pays"] == $data_r["id"])

									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";

							}

							?><?

							$query_r = "SELECT * FROM pays ORDER BY nom";
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
							<option selected value="1">Tous nos séjours</option>								
							<option value="6">Séjours Etudiants/adultes</option>
							<option value="5">Séjours Juniors 12-19 ans</option>
							<option value="7">Voyages Scolaires</option></select>
   
	<div align="right"><input  align="right" type="submit"  class="button" value="S'inscrire"></div>
    
  </form>
  </div>
							</aside>
                         
                         
							
                        </div>
                        <!-- End Aside -->
						
						