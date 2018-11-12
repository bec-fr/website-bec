<? include("connect.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
/**
 * Code qui sera aeeplé par un objet XHR et qui
 * retournera la liste déroulante des départements
 * correspondant à la région sélectionnée.
 */

/* On récupère l'identifiant de la région choisie. */
$pays = isset($_GET['pays']) ? $_GET['pays'] : false;
/* Si on a une région, on procède à la requête */
if(false !== $pays)
{
    /* Cération de la requête pour avoir les départements de cette région */
	echo"<select name='ville' id='ville' class='select' style='width:190px' onchange='document.rech.id_date.value=''; document.rech.formule.value=''; document.rech.hebergement.value='';'>
		<option value=''>toutes les villes</option>";
	
	$query_r = "SELECT * FROM ville WHERE 1";

							
							$query_r .= " AND pays = '".addslashes($_GET["pays"])."'";
							$query_r .= " ORDER BY nom";
							$exec_r = mysql_query($query_r) or die(mysql_error());
							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["ville"]) && $_GET["ville"] == $data_r["id"])

									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";
							

						}
				echo"</select>
							   </div>
                                                <div>
                                                 <br><select name='formule' class='select' style='width:190px'><br>
                            <option value=''>toutes les formules</option>";                           

							$query_r = "SELECT * FROM formule WHERE 1";
							if(isset($_GET["pays"]) && $_GET["pays"] != ""){

								$query_r .= " AND id IN (SELECT fjf.formule FROM fiche_etudiant_adulte_formule fjf INNER JOIN fiche_etudiant_adulte fj ON fjf.fiche_etudiant_adulte = fj.id WHERE fj.pays = '".addslashes($_GET["pays"])."' GROUP BY fjf.formule)";
							}

							if(isset($_GET["fiche"]) && $_GET["fiche"] != ""){

								$query_r .= " AND id IN (SELECT formule FROM fiche_etudiant_adulte_formule WHERE fiche_etudiant_adulte = '".addslashes($_GET["fiche"])."')";
							}

							$query_r .= " ORDER BY nom";
							$exec_r = mysql_query($query_r) or die(mysql_error());

							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["formule"]) && $_GET["formule"] == $data_r["id"])

									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";
							}
							
                            echo "</select>";


						//hebergement
						
							echo "<br><br><select name='hebergement' class='select' style='width:190px'> <br>  
                            <option value=''>toutes les hébergements</option>";
						
						$query_r = "SELECT * FROM hebergement WHERE 1";

							if(isset($_GET["pays"]) && $_GET["pays"] != ""){

								$query_r .= " AND id IN (SELECT fjh.hebergement FROM fiche_etudiant_adulte_hebergement fjh INNER JOIN fiche_etudiant_adulte fj ON fjh.fiche_etudiant_adulte = fj.id WHERE fj.pays = '".addslashes($_GET["pays"])."' GROUP BY fjh.hebergement)";

							}

							if(isset($_GET["fiche"]) && $_GET["fiche"] != ""){

								$query_r .= " AND id IN (SELECT hebergement FROM  fiche_etudiant_adulte_hebergement WHERE fiche_etudiant_adulte = '".addslashes($_GET["fiche"])."')";
							}

							$query_r .= " ORDER BY nom";

							$exec_r = mysql_query($query_r) or die(mysql_error());
							while($data_r = mysql_fetch_assoc($exec_r)){

								echo "<option value='".$data_r["id"]."'";
								if(isset($_GET["hebergement"]) && $_GET["hebergement"] == $data_r["id"])

									echo " selected";
								echo ">".stripslashes($data_r["nom"])."</option>";

							}

							echo "</select>";


					
					
}
/* Sinon on retourne un message d'erreur */
else
{
    echo("<p>Une erreur s'est produite. La région sélectionnée comporte une donnée invalide.</p>\n");
}
?>