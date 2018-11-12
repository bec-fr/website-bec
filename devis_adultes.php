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
	?>
				
				<select name="destination" class="select" style="width:400px;" onchange="devis(this.value);"><option value="">- - -</option>
                        <?
                        $query = "SELECT fea.*, p.nom as pays, v.nom as ville FROM fiche_etudiant_adulte fea INNER JOIN pays p ON fea.pays = p.id INNER JOIN ville v ON fea.ville = v.id WHERE fea.pays = '".addslashes($_GET["pays"])."' ORDER BY p.nom, v.nom, fea.nom";
						$exec = mysql_query($query) or die(mysql_error());
						while($data = mysql_fetch_assoc($exec))
						{
							echo "<option value='".$data["id"]."'";
							if(isset($_GET["destination"]) && $_GET["destination"] == $data["id"])
								echo " selected";
							echo ">".stripslashes($data["ville"])." - ".stripslashes($data["nom"])."</option>";
							
							
						}
						?>
                    </select>
					<?
					if(isset($_GET["destination"])) 
					{
					$voyage= ($_GET["destination"]) ;
					}
					else
					{
					$voyage = 0;
					}
					
					// on recupere le taux et le symbole selon la destination
					$query4 = "SELECT symbole,taux FROM devise dev INNER JOIN fiche_etudiant_adulte fea ON fea.devise = dev.id  WHERE fea.id = '".$voyage."'";
							$exec4 = mysql_query($query4) or die(mysql_error());
							$data4 = mysql_fetch_assoc($exec4);
										{
										$symbole =($data4["symbole"]);
										$taux = ($data4["taux"]);										
										
										// si pas en euro, on ajoute 0.02 centimes
										//if ($symbole !="€")
										//	{											
										//	$taux = $taux + 0.02;	
										//	}
										
										}
									
					?>					
					<div class="form-group">
							<label  class="col-sm-3 control-label">Formule pour ce séjour* </label>
							<div class="col-sm-9"><select name="formule" class="select" style="width:400px;" onchange="document.form.submit()"><option value="">- - -</option>
                        <?
                        $query = "SELECT * FROM fiche_etudiant_adulte_tarif WHERE nom <> ''";
						if(isset($_GET["destination"]) && $_GET["destination"] != ""){
							$query .= " AND fiche_etudiant_adulte = '".addslashes($_GET["destination"])."'";
						}
						$query .= " ORDER BY id";
						$exec = mysql_query($query) or die(mysql_error());
						while($data = mysql_fetch_assoc($exec))
						{
							echo "<option value='".$data["id"]."'";
							if(isset($_POST["formule"]) && $_POST["formule"] == $data["id"])
								echo " selected";
							echo ">".stripslashes($data["nom"])."</option>";
						}
						?>
                    </select></div>
					</div>
							  


						


					
<?php					
}
/* Sinon on retourne un message d'erreur */
else
{
    echo("<p>Une erreur s'est produite. La région sélectionnée comporte une donnée invalide.</p>\n");
}
?>