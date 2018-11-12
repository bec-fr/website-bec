
<table width="195" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><? include("include/newsletter.php"); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>  </tr>
</table></td>
  </tr>
</table>

<script type="text/javascript">

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


$(window).scroll(function(){
	var scrolltop = $(document).scrollTop();
	
	if(scrolltop > 254){
		document.getElementById("junior_bloc_rech").style.position = "fixed";
		document.getElementById("junior_bloc_rech").style.top = "10px";
	}else if(scrolltop <= 254){
		document.getElementById("junior_bloc_rech").style.position = "static";
		document.getElementById("junior_bloc_rech").style.top = "auto";
	}
});

</script>


<div id="junior_bloc_rech">
<table border="0" cellpadding="0" cellspacing="0">
                    <form name="rech" action="recherche_junior.php" method="get">
                    <tr>
                      <td><img src="images/degradeMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:10px; padding-top:10px;"><img src="images/titreRecherche_junior.jpg" /></td>
                    </tr>
                    <tr>
                      <td><img src="images/degradeMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px; font-size:14px" class="texteBleu">Vous recherchez un séjour</td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="site" class="select" style="width:170px" onchange="change_action(this.value); document.rech.submit();">
                            <option value="etudiant">Etudiants / adultes</option>
                            <option value="junior" <?=(($nom_fic == "recherche_junior.php" || $nom_fic == "fiche_junior.php" || $nom_fic == "junior_reserver_sejour.php" || $nom_fic == "junior_reserver_sejour2.php" || $nom_fic == "fiche_junior_test.php" || $nom_fic == "junior_reserver_sejour_test.php" || $nom_fic == "junior_reserver_sejour2_test.php" || $nom_fic == "index_junior.php") ? " selected" : "")?>>Juniors 12-19ans</option>
                            <option value="minis">Voyages scolaires</option>
                            </select>
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="images/separationMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px; font-size:14px" class="texteBleu">Pays</td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="pays" class="select" style="width:170px" onchange="document.rech.ville.value=''; document.rech.id_date.value=''; document.rech.formule.value=''; document.rech.hebergement.value=''; document.rech.submit();">
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
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="images/separationMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px; font-size:14px" class="texteBleu">Ville</td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="ville" class="select" style="width:170px" onchange="document.rech.id_date.value=''; document.rech.formule.value=''; document.rech.hebergement.value=''; document.rech.submit();">
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
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="images/separationMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px; font-size:14px" class="texteBleu">Dates de séjour</td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="id_date" class="select" style="width:170px" onchange="document.rech.formule.value=''; document.rech.hebergement.value=''; document.rech.submit();">
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
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="images/separationMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px; font-size:14px" class="texteBleu">Formules</td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="formule" class="select" style="width:170px" onchange="document.rech.submit();">
                            <option value="">toutes les formules</option>
                            <?
							$query_r = "SELECT * FROM formule_junior WHERE afficher = '1' ";
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
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="images/separationMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px; font-size:14px" class="texteBleu">Hébergement</td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="hebergement" class="select" style="width:170px" onchange="document.rech.submit();">
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
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="images/separationMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px; font-size:14px" class="texteBleu">Age</td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td class="texteNoir">de <select name="age_mini" class="select" style="width:50px" onchange="document.rech.submit();">
                            <option value="">- - -</option>
                            <?
							for($i=11 ; $i<=18 ; $i++){
								echo "<option value='".$i."' ".((isset($_GET["age_mini"]) && $_GET["age_mini"] == $i) ? " selected" : "").">".$i."</option>";
							}
							?>
                            </select>
                            à
                            <select name="age_maxi" class="select" style="width:50px" onchange="document.rech.submit();">
                            <option value="">- - -</option>
                            <?
							for($i=11 ; $i<=18 ; $i++){
								echo "<option value='".$i."' ".((isset($_GET["age_maxi"]) && $_GET["age_maxi"] == $i) ? " selected" : "").">".$i."</option>";
							}
							?>
                            </select> ans
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="images/separationMenuDroite.jpg" /></td>
                    </tr>
                    </form>
                  </table>


<table border="0" align="center" cellpadding="0" cellspacing="0">
  <td style="padding-top:5px;"><a href="brochure.php"><img src="images/btDemandeBrochure_junior2.jpg" width="188" height="34" border="0" /></a></td>
</tr>
<tr>
  <td height="20"></td>
</tr>
<tr>
    <td align="center"><a href="http://www.loffice.org/doc/contrat_qualite.pdf" target="_blank"><img alt="logo office" title="BEC est membre de l'Office" src="images/logo_office.gif" border="0" width="160" /></a><br><br><img src="images/logo_ancv_cheque_vacances.gif" alt="Chèques vacances" title="BEC accepte les chèques vacances"></td>
</tr>
</table>
</div>