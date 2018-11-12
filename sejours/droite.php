
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
		document.getElementById("adulte_bloc_rech").style.position = "fixed";
		document.getElementById("adulte_bloc_rech").style.top = "10px";
	}else if(scrolltop <= 254){
		document.getElementById("adulte_bloc_rech").style.position = "static";
		document.getElementById("adulte_bloc_rech").style.top = "auto";
	}
});

</script>

<div id="adulte_bloc_rech">
<table border="0" cellpadding="0" cellspacing="0">
                    <form name="rech" action="http://www.becfrance.com/recherche.php" method="get">
                    <tr>
                      <td><img src="http://www.becfrance.com/images/degradeMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:10px; padding-top:10px;"><img src="http://www.becfrance.com/images/titreRecherche.jpg" /></td>
                    </tr>
                    <tr>
                      <td><img src="http://www.becfrance.com/images/degradeMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px;"><img src="http://www.becfrance.com/images/titreRecherchersejour.jpg" /></td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="site" class="select" style="width:170px" onchange="change_action(this.value); document.rech.submit();">
                            <option value="etudiant" <?=(($nom_fic == "recherche.php" || $nom_fic == "fiche.php" || $nom_fic == "index.php") ? " selected" : "")?>>Etudiants / adultes</option>
                            <option value="junior">Juniors 12-17ans</option>
                            <option value="minis">Voyages scolaires</option>
                            </select>
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="http://www.becfrance.com/images/separationMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px;"><img src="http://www.becfrance.com/images/titrePaysB.jpg" /></td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="pays" class="select" style="width:170px" onchange="document.rech.submit();">
                            <option value="">tous les pays</option>
                            <?
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
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="http://www.becfrance.com/images/separationMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px;"><img src="http://www.becfrance.com/images/titreVilleB.jpg" /></td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="ville" class="select" style="width:170px" onchange="document.rech.submit();">
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
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="http://www.becfrance.com/images/separationMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px;"><img src="http://www.becfrance.com/images/titreFormuleB.jpg" /></td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="formule" class="select" style="width:170px" onchange="document.rech.submit();">
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
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="http://www.becfrance.com/images/separationMenuDroite.jpg" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px;"><img src="http://www.becfrance.com/images/titreHebergementB.jpg" /></td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="hebergement" class="select" style="width:170px" onchange="document.rech.submit();">
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
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="http://www.becfrance.com/images/separationMenuDroite.jpg" width="195" height="3" /></td>
                    </tr>
                    <tr>
                      <td style="padding-left:10px; padding-bottom:5px; padding-top:5px;"><img src="http://www.becfrance.com/images/titreAgeB.jpg" /></td>
                    </tr>
                    <tr>
                      <td><table align="center">
                          <tr>
                            <td><select name="age" class="select" style="width:170px" onchange="document.rech.submit();">
                            <option value="">tous les âges</option>
                            <option value="16" <?=((isset($_GET["age"]) && $_GET["age"] == "16") ? " selected" : "")?>>16 ans</option>
                            <option value="17" <?=((isset($_GET["age"]) && $_GET["age"] == "17") ? " selected" : "")?>>17 ans</option>
                            <option value="18" <?=((isset($_GET["age"]) && $_GET["age"] == "18") ? " selected" : "")?>>18 ans ou plus</option>
                            </select>
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="padding-top:5px;padding-bottom:5px;"><img src="http://www.becfrance.com/images/separationMenuDroite.jpg" /></td>
                    </tr>
                    </form>
                    
                  </table>

<table border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
  <td align="center"><a href="http://www.becfrance.com/devis.php"><img src="http://www.becfrance.com/images/btDevis2.jpg" width="188" height="34" border="0" /></a></td>
</tr>
<tr>
  <td align="center" style="padding-top:5px;"><a href="http://www.becfrance.com/brochure.php"><img src="http://www.becfrance.com/images/btDemandeBrochure2.jpg" width="188" height="34" border="0" /></a></td>
</tr>
<tr>
  <td height="20"></td>
</tr>
<tr>
  <td align="center"><a href="http://www.loffice.org/" target="_blank"><img src="http://www.becfrance.com/images/logo_office.gif" border="0" width="160" /></a></td>
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
</tr>
--><!--<tr>
  <td height="20"></td>
</tr>
<tr>
  <td align="center"><a href="http://www.facebook.com/pages/BEC-France/337382016279632" target="_blank"><img src="http://www.becfrance.com/images/picto_facebook.png" border="0" /></a></td>
</tr>-->
</table>
</div>