<!DOCTYPE html>
<? include("connect.php"); ?>

<head>        
        <title>Bec séjours linguistiques adultes - Devis pour un séjour étudiant adultes</title>  
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="BEC Séjour linguistiques">
        <meta name="author" content="iwthemes.com">  
        
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
<script>
	function verifForm(){
		a="0";
		
		if (document.form.destination.value.length == 0) {alert('Vous n\'avez pas renseigné votre destination.'); a="1"; document.form.destination.focus();}
		else if (document.form.formule.value.length == 0) {alert('Vous n\'avez pas renseigné votre formule.'); a="1"; document.form.formule.focus();}
		else if (document.form.hebergement.value.length == 0) {alert('Vous n\'avez pas renseigné votre hébergement.'); a="1"; document.form.hebergement.focus();}
		
		if (a == 0) {
			document.form.ok.value = "1";
			document.form.submit();
		}
	}
</script>
</head>
<? include("top_adultes.php"); ?>
 <!-- Section Title -->
            <div class="section_title features">
                <div class="container">
                    <div class="row"> 
						
                        <div class="col-md-10"><br>
                            <h1> Demander un devis pour un séjour étudiant adulte</h1>
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
										<span><a href='sejours-linguistiques-pour-etudiants-adultes.html' class='texteBleu'>Séjour Linguistique Adulte</a>  / Etablir un devis</a></span>			
                                </div>								
                            </div>
                        </div>
                    </div>
                    <!-- End Newsletter Box -->
                                        <section class="row padding_top">
                        <!-- Properties -->
                        <div class="col-md-9">


						
                                  
<?
if(isset($_POST["ok"]) && $_POST["ok"] == 1){
	$date_debut = ($_POST["annee"])."-".($_POST["mois"])."-".($_POST["jour"]);
	
	
	/*$query = "INSERT INTO devis (destination, formule, hebergement, nb_sem, date_debut, frais_adm, ass_annulation, ass_interruption, total, datetime) VALUES ('".addslashes($_POST["destination"])."', '".addslashes($_POST["formule"])."', '".addslashes($_POST["hebergement"])."', '".addslashes($_POST["nb_sem"])."', '".addslashes($date_debut)."', '1', '".addslashes($_POST["ass_annulation"])."', '".addslashes($_POST["ass_interruption"])."', '".addslashes($_POST["total"])."', '".date("Y-m-d H:i:s")."')";
	mysql_query($query) or die(mysql_error());*/
	
	$_SESSION["devis_destination"] = $_POST["destination"];
	$_SESSION["devis_formule"] = $_POST["formule"];
	$_SESSION["devis_hebergement"] = $_POST["hebergement"];
	$_SESSION["devis_nb_sem"] = $_POST["nb_sem"];
	$_SESSION["devis_date_debut"] = $date_debut;
	$_SESSION["devis_frais_adm"] = "1";
	$_SESSION["devis_ass_annulation"] = $_POST["ass_annulation"];
	$_SESSION["devis_ass_interruption"] = $_POST["ass_interruption"];
	$_SESSION["devis_total"] = $_POST["total"];

echo "<script>document.location.href='devis2.php';</script>";
}else{

?>
<br />
                                                  
              
                  <form class="form-horizontal" action="" method="post" name="form">
                    <input type="hidden" value="0" name="ok" />
					
					 <div class="titles">
                        <h2>&nbsp;Etablir un devis pour un séjour étudiant adulte 1/2</h2>
                               
					</div>
					<div class="search_box2">
					
					<div class="form-group">
							<label class="col-sm-3 control-label">Destination/Ecole* </label>
							<div class="col-sm-9">
							<select name="destination" class="select" style="width:400px;" onchange="document.form.submit()"><option value="">- - -</option>
                        <?
                        $query = "SELECT fea.*, p.nom as pays, v.nom as ville FROM fiche_etudiant_adulte fea INNER JOIN pays p ON fea.pays = p.id INNER JOIN ville v ON fea.ville = v.id WHERE 1 ORDER BY p.nom, v.nom, fea.nom";
						$exec = mysql_query($query) or die(mysql_error());
						while($data = mysql_fetch_assoc($exec))
						{
							echo "<option value='".$data["id"]."'";
							if(isset($_POST["destination"]) && $_POST["destination"] == $data["id"])
								echo " selected";
							echo ">".stripslashes($data["pays"])." ".stripslashes($data["ville"])." - ".stripslashes($data["nom"])."</option>";
						}
						?>
                    </select>
							</div>
					</div>
					<div class="form-group">
							<label  class="col-sm-3 control-label">Formule* </label>
							<div class="col-sm-9"><select name="formule" class="select" style="width:400px;" onchange="document.form.submit()"><option value="">- - -</option>
                        <?
                        $query = "SELECT * FROM fiche_etudiant_adulte_tarif WHERE nom <> ''";
						if(isset($_POST["destination"]) && $_POST["destination"] != ""){
							$query .= " AND fiche_etudiant_adulte = '".addslashes($_POST["destination"])."'";
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
					<div class="form-group">
							<label  class="col-sm-3 control-label">Hébergement* </label>
							<div class="col-sm-9"><select name="hebergement" class="select" onchange="document.form.submit()"><option value="">- - -</option><option value="famille" <?=((isset($_POST["hebergement"]) && $_POST["hebergement"] == "famille") ? " selected" : "")?>>En famille 1/2 pension ch.indiv.</option><option value="residence" <?=((isset($_POST["hebergement"]) && $_POST["hebergement"] == "residence") ? " selected" : "")?>>En résidence sans repas ch.indiv.</option></select>
							</div>
						</div>
						
						
					 <?
					$total=0;
					if(isset($_POST["destination"]) && $_POST["destination"] != "" && $_POST["formule"] != "" && $_POST["hebergement"] != ""){
						$query_d = "SELECT * FROM fiche_etudiant_adulte_tarif WHERE id = '".addslashes($_POST["formule"])."'";
						$exec_d = mysql_query($query_d) or die(mysql_error());
						$data_d = mysql_fetch_assoc($exec_d);
						if($_POST["hebergement"] == "residence")
							$total = $data_d["prix_residence"];
						else
							$total = $data_d["prix_famille"];
					}
					?>
					<hr>
                    <div align="right">Tarif : <strong><?=$total?></strong> €</div>
					<div class="form-group">
							<label  class="col-sm-3 control-label">Nb semaines </label>
							<div class="col-sm-9"><select name="nb_sem" class="select" onchange="document.form.submit()">
                        <?
                        for($i=1 ; $i<=12 ; $i++)
						{
							echo "<option value='".$i."'";
							if(isset($_POST["nb_sem"]) && $_POST["nb_sem"] == $i)
								echo " selected";
							echo ">".$i."</option>";
						}
						?>
                    </select></div>
					</div>	
					 <?
					if(isset($_POST["nb_sem"])){
						$total = $total*$_POST["nb_sem"];
						$total -= $total*0.0;
					}
					?>
					<hr>
                   <div align="right"> Tarif : <strong><?=parsePrix($total)?></strong> €</div>
                  	<div class="form-group">
							<label  class="col-sm-3 control-label">Date de début :</label>
							<div class="col-sm-9"><select name="jour">
							  <option value="0">Jour</option>
								<?php
								  for ($i = 1; $i <= 31; $i++)
								  {
									echo '<option value="' . $i . '">' . $i . '</option>';
								  }
								?>
							</select>
							 
							 <select name="mois" size="1">
							<option value="01">Janvier</option><option value="02">Février</option><option value="03">Mars</option><option value="04">Avril</option><option value="05">Mai</option><option value="06">Juin</option><option value="07">Juillet</option><option value="08">Août</option><option value="09">Septembre</option><option value="10">Octobre</option><option value="11">Novembre</option><option value="12">Décembre</option></select>
							 
							<select name="annee">
							 
							  <option value="2015">Année</option>
								
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2017">2018</option>
						
							</select></div>
					</div>
                   
                    
                   
                                                           
                    <? if(isset($_POST["destination"]) && $_POST["destination"] != ""){ ?>
                    <strong>Pour infos, voici les suppléments disponibles pour ce séjour, merci de prendre en considération les suppléments applicables pour votre choix.</strong></td>
                   
                    <table border="0">
                        <?
                        $query = "SELECT * FROM fiche_etudiant_adulte_supplement WHERE 1";
						if(isset($_POST["destination"]) && $_POST["destination"] != ""){
							$query .= " AND fiche_etudiant_adulte = '".addslashes($_POST["destination"])."'";
						}
						$query .= " ORDER BY nom";
						$exec = mysql_query($query) or die(mysql_error());
						while($data = mysql_fetch_assoc($exec))
						{
							echo "<tr><td><i>".stripslashes($data["nom"])."</i></td><td width='20'></td><td>".stripslashes($data["tarif"])."</td></tr>";
						}
						?>
                        </table>
                   
                    <? } ?>
					
					 <div class="form-group">
							<label  class="col-sm-4 control-label">Frais administratifs du BEC :</label>
							<div class="col-sm-8"><input type="checkbox" name="frais_adm" value="1" checked="checked" disabled="disabled" /></div>
					</div>
					
                   
                    <?
					$total += 30;
					?>
					<hr>
					 <div align="right"> Tarif : <strong><?=parsePrix($total)?></strong> €</div>
					
                
					<h3>Options d'assurance</h3>
					 <?
					$soustotal = $total;
                    if(isset($_POST["ass_annulation"]) && $_POST["ass_annulation"] == "1"){
						$total += $soustotal*0.03;
					}
					?>
					 <div class="form-group">
							<label  class="col-sm-3 control-label">Assurance annulation :</label>
							<div class="col-sm-9"><input type="checkbox" name="ass_annulation" value="1" <?=((isset($_POST["ass_annulation"]) && $_POST["ass_annulation"] == "1") ? " checked" : "")?> onclick="document.form.submit()" /> &nbsp;&nbsp;<strong>3%</strong></div>
					</div>
					
					
                                 
                  
                    <?
                    if(isset($_POST["ass_interruption"]) && $_POST["ass_interruption"] == "1"){
						$total += $soustotal*0.015;
					}
					?>
					
					
					 <div class="form-group">
							<label  class="col-sm-3 control-label">Assurance Interruption</label>
							<div class="col-sm-9"><input type="checkbox" name="ass_interruption" value="1" <?=((isset($_POST["ass_interruption"]) && $_POST["ass_interruption"] == "1") ? " checked" : "")?> onclick="document.form.submit()" /> &nbsp;&nbsp;<strong>1,5%</strong></div>
					</div>
					
                   <hr>
					 <div align="right"> Tarif : <strong><?=parsePrix(round($total, 2))?></strong> €</div>
				   
				   <div align="right"><input  align="right" type="submit"  onclick="javascript:verifForm();" class="button" value="Passez à l'étape 2"></div>	
                 
                  
                  <input type="hidden" name="total" value="<?=$total?>" />
                  </form>
               
                <? } ?>
                                  
                                 
						</div>
                   </div>               
                        <!-- fin contenu -->
						<!-- Aside -->
						<? include("droite_adultes.php"); ?>                        
						
						
                    </div>
                     
            </section>
            <!-- End content info-->

 <? include("footer.php"); ?>          
			
