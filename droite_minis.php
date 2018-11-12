
<table width="195" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><? include("include/newsletter.php"); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>  </tr>
</table></td>
  </tr>
</table>

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

$(window).scroll(function(){
	var scrolltop = $(document).scrollTop();
	
	if(scrolltop > 254){
		document.getElementById("minis_bloc_rech").style.position = "fixed";
		document.getElementById("minis_bloc_rech").style.top = "10px";
	}else if(scrolltop <= 254){
		document.getElementById("minis_bloc_rech").style.position = "static";
		document.getElementById("minis_bloc_rech").style.top = "auto";
	}
});

</script>

<div id="minis_bloc_rech">
<table border="0" cellpadding="0" cellspacing="0">
                    <form name="rech" action="recherche_minis.php" method="get">
                    <tr>
                      <td><img src="images/degradeMenuDroite.jpg" width="195" height="9" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:10px; padding-top:10px;"><img src="images/titreRecherche<?=$fic_nom?>.jpg" /></td>
                    </tr>
                    <tr>
                      <td><img src="images/degradeMenuDroite.jpg" width="195" height="9" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px;"><img src="images/titreRecherchersejour.jpg" /></td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="site" class="select" style="width:170px" onchange="change_action(this.value); document.rech.submit();">
                            <option value="etudiant">Etudiants / adultes</option>
                            <option value="junior">Juniors 12-17ans</option>
                            <option value="minis" <?=(($nom_fic == "recherche_minis.php" || $nom_fic == "fiche_minis.php" || $nom_fic == "index_minis.php") ? " selected" : "")?>>Voyages scolaires</option>
                            </select>
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="images/separationMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px;"><img src="images/titrePaysB.jpg" /></td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="pays" class="select" style="width:170px" onchange="document.rech.submit();">
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
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="images/separationMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px;"><img src="images/titreVilleB.jpg" /></td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="ville" class="select" style="width:170px" onchange="document.rech.submit();">
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
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="images/separationMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px;"><img src="images/titreFormuleB.jpg" /></td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="formule" class="select" style="width:170px" onchange="document.rech.submit();">
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
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="images/separationMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px;"><img src="images/titreHebergementB.jpg" /></td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="hebergement" class="select" style="width:170px" onchange="document.rech.submit();">
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
<tr>
  <td align="center"><a href="devis_minis.php"><img src="images/btDevis_minis2.jpg" width="188" height="34" border="0" /></a></td>
</tr>
<tr>
  <td align="center" style="padding-top:5px;"><a href="brochure_minis.php"><img src="images/btDemandeBrochure_minis2.jpg" width="188" height="34" border="0" /></a></td>
</tr>
<tr>
  <td height="20"></td>
</tr>
<tr>
    <td align="center"><a href="http://www.loffice.org/doc/contrat_qualite.pdf" target="_blank"><img alt="logo office" title="BEC est membre de l'Office" src="images/logo_office.gif" border="0" width="160" /></a><br><br><img src="images/logo_ancv_cheque_vacances.gif" alt="Chèques vacances" title="BEC accepte les chèques vacances"></td>
</tr>
<!--<tr>
  <td align="center"> <table width="160" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="211" class="texteBleu"><strong class="texteGris">----------------------------------------<br />
        Retrouvez-nous sur le </strong><br />
        <strong>Salon des S&eacute;jours Linguistiques</strong><br />
        <strong>et des Voyages Scolaires</strong><br />
        <strong>Stands 31 &amp; 32</strong></td>
    </tr>
  </table>
    </td>
</tr>-->
</table>
</div>