
							<div class="col-md-3"> 
							
 								
                            <!-- Search Advance -->
                            <aside>         
                                <span class="titre">Affinez votre projet</span>   
													
                                <div class="search_box">
                        <script type="text/javascript" src="./dept_xhr.js" charset="iso_8859-1"></script>   
                        
                                 <form name="rech" action="recherche_cro.php" method="get">
                                 
                                  <div>
                                                    <label><b>Trouver un séjour Etudiants & Adultes</b></label>                                                    
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
                            </aside>

                            <aside class="hidden-sm"> 
                            <!-- End Search Advance -->                         
                            <diV class="button"><a class="bouton" href="devis_cro.php">Votre devis personnalisé</a></div>
                            <diV class="button"><a class="bouton" href="http://www.becfrance.com/wp/sejours-adultes-contact/">Demandez une brochure</a></div>
                            
                        
                            </aside>
							
                        </div>
                        <!-- End Aside -->
						
						