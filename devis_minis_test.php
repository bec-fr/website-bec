<!DOCTYPE html>
<? include("connect.php"); ?>
<html lang="fr">
    <head>        
        <title>Bec séjours linguistiques - Voyages Scolaires - Etablir un devis 1/2</title> 		
        <meta name="keywords" content="Devis voyage scolaire" />
        <meta name="description" content="Etablir un devis pour un voyage scolaire - BEC Séjour linguistiques">
        <meta name="author" content="BEC Séjours linguistiques">  
        
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">
        <!-- Your styles -->
        <link href="css/style.css" rel="stylesheet" media="screen">  

        <!-- Skins Theme -->
        <link href="#" rel="stylesheet" media="screen" class="skin">

        <!-- Favicons -->
        <link rel="shortcut icon" href="img/icons/favicon.ico">
        <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">  

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- styles for IE -->
        <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />
        <![endif]-->
        
        <!-- Skins Changer-->
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>	
		<link rel="stylesheet" type="text/css" href="js/datepicker/datepickr.min.css">
		<script>
		function verifForm(){
		a="0";
		
		if (document.form.destination.value.length == 0) {alert('Vous n\'avez pas renseigné votre destination.'); a="1"; document.form.destination.focus();}	
		else if ((document.form.nb_eleve.value.length == 0) && (document.form.nb_eleve2.value.length == 0) && (document.form.nb_eleve3.value.length == 0)) {alert('Vous n\'avez pas renseigné le nombre d\'eleves.'); a="1"; document.form.nb_eleve.focus();}	
		else if (document.form.nb_adulte.value.length == 0) {alert('Vous n\'avez pas renseigné le nombre d\'encadrants.'); a="1"; document.form.nb_adulte.focus();}		
		else if (document.form.nb_pc.value.length == 0) {alert('Vous n\'avez pas renseigné le nombre de PC.'); a="1"; document.form.nb_pc.focus();}
		else if (document.form.date_debut.value.length == 0) {alert('Vous n\'avez pas renseigné la date de départ.'); a="1"; document.form.date_debut.focus();}
		
		if (a == 0) {
			document.form.ok.value = "1";
			document.form.submit();
		}
	}
</script>

		
    </head>
<? include("top_scolaires.php"); ?>
           <!-- Section Title -->
            <div class="section_title juniors">
                <div class="container">
                    <div class="row"> 
						
                        <div class="col-md-10"><br>
                          
                        </div> 
						<div class="col-md-2"></div>						
                    </div>
                </div>            
            </div>
            <!-- End Section Title -->
			
            <!-- End content info -->
            <section class="content_info">	
                <div class="container">
					<!-- Newsletter Box -->                  
                    <div class="newsletter_box">
                        <div class="container">
                            <div class="row">
                              <div class="col-md-9 titre"> 
										<span><?=($fil_ariane)?></span>				
                                </div>								
                            </div>
                        </div>
                    </div>
                    <!-- End Newsletter Box -->
                                        <section class="row padding_top">
                        <!-- Properties -->
                        <div class="col-md-9">
                            <!-- Contenu-->               
                                  
<?
if(isset($_POST["ok"]) && $_POST["ok"] == 1){


		
	
	$query = "INSERT INTO devis_minis (destination, nb_adulte, nb_eleve, nb_eleve2,nb_eleve3,nb_pc, age, date_debut, date_fin,depart_nuit,retour_nuit, mode_voyage, mode_voyage2, trav,assurance,ass_complement,classe_etab, date_ca, datetime) VALUES ('".addslashes($_POST["destination"])."', '".addslashes($_POST["nb_adulte"])."', '".addslashes($_POST["nb_eleve"])."', '".addslashes($_POST["nb_eleve2"])."','".addslashes($_POST["nb_eleve3"])."', '".addslashes($_POST["nb_pc"])."', '".addslashes($_POST["age"])."', '".addslashes(date('d-m-y' , strtotime($_POST["date_debut"])))."', '".addslashes(date('d-m-y' , strtotime($_POST["date_fin"])))."','".addslashes($_POST["depart_nuit"])."', '".addslashes($_POST["retour_nuit"])."', '".addslashes($_POST["mode_voyage"])."', '".addslashes($_POST["mode_voyage2"])."', '".addslashes($_POST["trav"])."',  '".addslashes($_POST["assurance"])."','".addslashes($_POST["ass_complement"])."','".addslashes($_POST["classe_etab"])."', '".addslashes($_POST["date_ca"])."', '".date("Y-m-d H:i:s")."')";
	mysql_query($query) or die(mysql_error());
	$id = mysql_insert_id();
	
	
	 $dest =($_POST["destination"]);
	 echo $dest;
	 if (($dest > 1 and $dest < 18 ) or ($dest > 41 and $dest < 49)) {
    echo "angleterre-irlande";
	envoi_mail("gatmanu@hotmail.fr", "Devis Angleterre/Irlande depuis votre site Internet ".$url_site2, "Demande de devis Angleterre/Irlande depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le détail du devis mini-séjour.");
} elseif ($dest > 18 and $dest < 22 ) {
    echo "italie";
} elseif ($dest > 21 and $dest < 36 ) {
    echo "espagne";
	envoi_mail("gatmanu@hotmail.fr", "Devis depuis votre site Internet ".$url_site2, "Demande de devis Espagne depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le détail du devis mini-séjour.");
	
 } elseif ($dest > 36 and $dest < 42 ) {
    echo "Allemagne";	
	
	envoi_mail("gatmanu@hotmail.fr", "Devis depuis votre site Internet ".$url_site2, "Demande de devis Allemagne depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le détail du devis mini-séjour.");

} elseif ($dest > 50 and $dest < 53 ) {
    echo "new york";	
}
	 
	 
	
	
	if($_FILES['fic']['error'] == 0){
		$extension = strtolower(substr($_FILES['fic']['name'], strrpos($_FILES['fic']['name'], ".")+1));
		if($extension == "pdf" || $extension == "doc"){
			move_uploaded_file($_FILES['fic']['tmp_name'], "imagesUp/devis_minis/".$id.".".$extension);
		}else{
			echo "<script>alert('Le fichier envoyé n\'est pas dans un format valide.')</script>";
		}
	}
	
	//echo "<script>document.location.href='devis_minis2.php?id=".$id."';</script>";
}else{

?>
<br />
                                                  
                
                  <form action="" class="form-horizontal" enctype="multipart/form-data" method="post" id="form" name="form">
                    <input type="hidden" value="0" name="ok" />
					<div class="titles">
                                <span>ETAPE 1/2 : votre voyage</span>
                                <br>
                                <h1><i class="fa fa-edit"></i>&nbsp;Etablir un devis pour un mini-séjour scolaire</h1>
                               
						  </div>
                    
                    
					<div class="search_box2">
					
					
					<div class="form-group">
							<label  class="col-sm-3 control-label">Destination*  </label>
							<div class="col-sm-9">	
							 
							<select name="destination" class="select">
							
							<? if(isset($_GET["sejour"]) && $_GET["sejour"] != "")
							{
							$sejour = ($_GET["sejour"]);
							$query = "SELECT fm.*, p.nom as pays, v.nom as ville FROM fiche_minis fm INNER JOIN minis_pays p ON fm.pays = p.id INNER JOIN minis_ville v ON fm.ville = v.id WHERE fm.afficher ='1' and fm.id = $sejour ORDER BY p.nom, v.nom, fm.nom";
						$exec = mysql_query($query) or die(mysql_error());
						while($data = mysql_fetch_assoc($exec))
						{
							echo "<option value='".stripslashes($data["id"])."'>".stripslashes($data["pays"])." - ".stripslashes($data["nom"])."</option>";
						}
							
							}
							?>
							
							<option value="">- - -</option>
                        <?
						$query = "SELECT fm.*, p.nom as pays, v.nom as ville FROM fiche_minis fm INNER JOIN minis_pays p ON fm.pays = p.id INNER JOIN minis_ville v ON fm.ville = v.id WHERE fm.afficher ='1' ORDER BY p.nom, v.nom, fm.nom";
						$exec = mysql_query($query) or die(mysql_error());
						while($data = mysql_fetch_assoc($exec))
						{
							echo "<option value='".stripslashes($data["id"])."'>".stripslashes($data["pays"])." - ".stripslashes($data["nom"])."</option>";
						}
						?>
						</select>
						</div>	
					</div>	
					
					<div class="form-group">
							<label  class="col-sm-3 control-label">Nombre d'élèves*  </label>
							<div class="col-sm-3">								 
							 
							-16 ans <input name="nb_eleve" type="text" value=""   size="2" />
							</div>
							<div class="col-sm-3">								 
								16 /18 ans<input name="nb_eleve2" type="text"  value=""  size="2" />
								</div>
							<div class="col-sm-3">								 	
								+ 18 ans <input name="nb_eleve3" type="text"  value="" size="2" />
						</div>	
					</div>	
					<div class="form-group">
							<label  class="col-sm-3 control-label">Nombre d'encadrants* </label>
							<div class="col-sm-9">								 
							<input name="nb_adulte" mandatory type="text" value="" class="inputtext" size="5" />	
						</div>	
					</div>
                    <div class="form-group">
							<label  class="col-sm-3 control-label">Nombre de PC* </label>
							<div class="col-sm-9">								 
							<select name="nb_pc" class="select"><option value="">- - -</option>
                      <option value="2PC">2PC</option><option value="3PC">3PC</option><option value="4PC">4PC</option><option value="5">5PC</option><option value="+5">+ de 5PC</option>
                      </select> (Nombre de nuits sur place)	<br>
					  (Pensions Complètes: 1 PC = repas du soir, nuit, petit déjeuner et panier repas).<br />En fonction du point de départ et de la durée du trajet,
					le nombre total de jours du voyage peut varier, sans incidence sur le nombre de PC, et donc sur le prix
					<hr>
						</div>	
					</div>
                   <div class="form-group">
							<label  class="col-sm-3"></label>
							<div class="col-sm-9">						 
							  <i>Si vos dates ne sont pas pas encore définies, merci d'inscrire le 1er jour du mois du voyage.</i>
						</div>	
					</div>
                   <div class="form-group">
							<label  class="col-sm-3 control-label">Date de départ de l'établissement*</label>
							<div class="col-sm-4">	
							<input class="datepickr" name="date_debut">


        <script src="js/datepicker/datepickr.min.js"></script>
        <script>
            // Regular datepickr
            datepickr('#datepickr');

            // Custom date format
			datepickr.prototype.l10n.months.shorthand = ['janv', 'févr', 'mars', 'avril', 'mai', 'juin', 'juil', 'août', 'sept', 'oct', 'nov', 'déc'];
            datepickr.prototype.l10n.months.longhand = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
            datepickr.prototype.l10n.weekdays.shorthand = ['dim', 'lun', 'mar', 'mer', 'jeu', 'ven', 'sam'];
            datepickr.prototype.l10n.weekdays.longhand = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
            datepickr('.datepickr', { dateFormat: 'd-m-y'});         
          
        </script>
							</div>
					
						
						<div class="col-sm-5">incluant un départ de nuit à l'aller <INPUT TYPE="checkbox" name="depart_nuit" value="1">	
						</div>
					</div>
					
                   <div class="form-group">
							<label  class="col-sm-3 control-label">Date de retour à l'établissement*</label>
							<div class="col-sm-4">	<input class="datepickr" name="date_fin">							 
							<script src="js/datepicker/datepickr.min.js"></script>
        <script>
            // Regular datepickr
            datepickr('#datepickr');

            // Custom date format
			datepickr.prototype.l10n.months.shorthand = ['janv', 'févr', 'mars', 'avril', 'mai', 'juin', 'juil', 'août', 'sept', 'oct', 'nov', 'déc'];
            datepickr.prototype.l10n.months.longhand = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
            datepickr.prototype.l10n.weekdays.shorthand = ['dim', 'lun', 'mar', 'mer', 'jeu', 'ven', 'sam'];
            datepickr.prototype.l10n.weekdays.longhand = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
            datepickr('.datepickr', { dateFormat: 'd-m-y'});         
          
        </script>
					
						</div>	
						<div class="col-sm-5"> incluant un départ de nuit au retour	 <INPUT TYPE="checkbox" name="retour_nuit" value="1">
						</div>
					</div>
                   
                   <div class="form-group">
							<label  class="col-sm-3 control-label">Mode de voyage </label>
							<div class="col-sm-9">								 
							<select name="mode_voyage" class="select">
                        <option value="1-Autocar">Autocar</option>
                        <option value="5-Autorcar+trarversee">Autocar + traversée</option>
                        <option value="2-Avion">Avion</option>
                        <option value="4-TGV+autocar">TGV + autocar francais</option>
                        <option value="3-Train">Train</option>
                    </select>
						</div>	
					</div>
					<div class="form-group">
							<label  class="col-sm-3 control-label">Traversée maritime </label>
							<div class="col-sm-9">								 
							<select name="trav" class="select">
                        <option value="">- - -</option>
                        <option value="Bateau">Bateau</option>
                        <option value="Eurotunnel">Eurotunnel</option>
                        <option value="Bateau à l'aller - Eurotunnel au retour">Bateau à l'aller - Eurotunnel au retour</option>
                        <option value="Eurotunnel à l'aller - Bateau au retour">Eurotunnel à l'aller - Bateau au retour</option>
                    </select>
						</div>	
					</div>  
					<div class="form-group">
							<label  class="col-sm-3 control-label">Date du CA devant voter le voyage </label>
							<div class="col-sm-9">								 
							<input class="datepickr" name="date_ca">							 
							<script src="js/datepicker/datepickr.min.js"></script>
        <script>
            // Regular datepickr
            datepickr('#datepickr');

            // Custom date format
			datepickr.prototype.l10n.months.shorthand = ['janv', 'févr', 'mars', 'avril', 'mai', 'juin', 'juil', 'août', 'sept', 'oct', 'nov', 'déc'];
            datepickr.prototype.l10n.months.longhand = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
            datepickr.prototype.l10n.weekdays.shorthand = ['dim', 'lun', 'mar', 'mer', 'jeu', 'ven', 'sam'];
            datepickr.prototype.l10n.weekdays.longhand = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
            datepickr('.datepickr', { dateFormat: 'd-m-y'});         
          
        </script>
						</div>	
					</div>

					<div class="form-group">
							<label  class="col-sm-3 control-label">Joindre votre programme<br />(doc ou pdf) :</label>
							<div class="col-sm-9">								 
							<input name="fic" type="file" />
						</div>	
					</div>
					 <div class="form-group">
							<label  class="col-sm-3 control-label">Assurance souhaitée </label>
							<div class="col-sm-9">								 
							<select name="assurance" class="select">
                       
                        <option value="0">Pas d'assurance</option>
						<option value="3-assistance medicale">Assurance Assistance Médicale/Rapatriement</option>
                        <option value="1-annulation">Assurance Annulation</option>						
						<option value="4-multirisque">Le Pack Multirisque</option>
						          

							</select>
							</div>	
					</div>                    
					<div class="form-group">
							<label  class="col-sm-3 control-label">Assurance complémentaire </label>
							<div class="col-sm-9 tooltip_hover"><a  data-toggle="tooltip" href="#" data-original-title="Cette option impose de prendre une assurance au préalable">Annulation Totale Groupe</a>						 
							<INPUT TYPE="checkbox" name="ass_complement" value="1">
							</div>	
					</div>
                  
					
					<div align="right"><input  align="right" type="submit"  onClick="javascript:verifForm()" class="button" value="Passer à l'etape 2"></div>
                   
                <!--  <input type="hidden" name="total" value="<?=$total?>" />-->
                  </form>
                </div>
                <? } ?>
                                  
                                </div>    
   								
                        <!-- fin contenu -->
						<!-- Aside -->
						<? include("droite_scolaires.php"); ?>                        
						
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					
            </section>
            <!-- End content info-->

 <? include("footer_scolaires.php"); ?>          
			