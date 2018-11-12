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
								
                            <!-- Search Advance -->
                            <? if (isset($hide)) {  
                                    }   
                            else{                                   
                            ?>
                            <aside>            
							<span class="titre">Affinez votre projet</span>							
                                <div class="search_advance">
                                    
                                    <div class="clearfix"></div>
                                    <div class="switcher-panel"></div> 
									
									
									<!-- scolaires -->
                                    <div id="1-content" class="switcher-content set2 show">
                                       <div class="search_box">
                                             <form name="rech" action="recherche_minis_cro.php" method="get">
                                                <div>
                                                    <label>Filtrez nos offres</label>
                                                 
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
                            <? }    ?>

                            
                            <!-- End Search Advance -->
                            
                            <? if (isset($hide)) {  
                                    }   
                            else{                                   
                            ?>
                            <aside class="hidden-sm"> 
                                <diV class="button"><a class="bouton" href="votre-devis-scolaire.php">Votre devis personnalisé</a></div>
                                <diV class="button"><a class="bouton" href="http://www.becfrance.com/wp/voyages-scolaires-contact/">Demandez une brochure</a></div>
                            </aside>  
                            <? }    ?>
                            
                            <!--<diV class="button"><a class="bouton" href="#"><i class="fa fa-phone"></i>&nbsp;01 55 35 25 00</a></div>    -->                 
                        
                                     
							
                        </div>
                        <!-- End Aside -->
						
						