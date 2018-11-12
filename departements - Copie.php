<? include("connect.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" xml:lang="fr" />
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
	echo"<select name='ville' id='ville' class='select' style='width:170px' onchange='document.rech.id_date.value=''; document.rech.formule.value=''; document.rech.hebergement.value='';'>
		<option value=''>toutes les villes</option>";
	
	$query_r = "SELECT * FROM junior_ville WHERE afficher='1'";

							
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
                                                 <br> <select name='id_date' class='select' style='width:170px'>

                            <br>
							 <option value=''>toutes les dates</option>";

							$query_r = "SELECT fd.id, fd.date_debut, fd.date_fin FROM fiche_junior_date fd INNER JOIN fiche_junior f ON fd.rid_fiche = f.id WHERE f.afficher = '1'";

							if(isset($_GET["pays"]) && $_GET["pays"] != ""){

								$query_r .= " AND fd.id IN (SELECT fd.id FROM fiche_junior_date fd INNER JOIN fiche_junior f ON fd.rid_fiche = f.id WHERE f.pays = '".addslashes($_GET["pays"])."')";
							}

							if(isset($_GET["ville"]) && $_GET["ville"] != ""){

								$query_r .= " AND fd.id IN (SELECT fd.id FROM fiche_junior_date fd INNER JOIN fiche_junior f ON fd.rid_fiche = f.id WHERE f.ville = '".addslashes($_GET["ville"])."')";							}

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
							
					echo "</select>";

					//formules

					echo "<br><br><select name='formule' class='select' style='width:170px'>
                            <option value=''>toutes les formules</option>";

                           

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

							
                            echo "</select>";





					
					
}
/* Sinon on retourne un message d'erreur */
else
{
    echo("<p>Une erreur s'est produite. La région sélectionnée comporte une donnée invalide.</p>\n");
}
?>