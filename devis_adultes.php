<? include("connect.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
/**
 * Code qui sera aeepl� par un objet XHR et qui
 * retournera la liste d�roulante des d�partements
 * correspondant � la r�gion s�lectionn�e.
 */

/* On r�cup�re l'identifiant de la r�gion choisie. */
$pays = isset($_GET['pays']) ? $_GET['pays'] : false;
/* Si on a une r�gion, on proc�de � la requ�te */
if(false !== $pays)
{
    /* C�ration de la requ�te pour avoir les d�partements de cette r�gion */
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
										//if ($symbole !="�")
										//	{											
										//	$taux = $taux + 0.02;	
										//	}
										
										}
									
					?>					
					<div class="form-group">
							<label  class="col-sm-3 control-label">Formule pour ce s�jour* </label>
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
    echo("<p>Une erreur s'est produite. La r�gion s�lectionn�e comporte une donn�e invalide.</p>\n");
}
?>