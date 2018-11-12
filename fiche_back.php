<!DOCTYPE html>
<? include("connect.php"); ?>
<? $query_d = "SELECT fea.*, p.nom as pays, v.nom as ville, p.id as idpays, v.id as idville FROM fiche_etudiant_adulte fea INNER JOIN pays p ON fea.pays = p.id INNER JOIN ville v ON fea.ville = v.id WHERE fea.id = '".addslashes($_GET["fiche"])."'";
$exec_d = mysql_query($query_d) or die(mysql_error());
if(mysql_num_rows($exec_d) == 0){
	echo "<script>document.location.href='index.php';</script>";
	exit();
}

$data_d = mysql_fetch_assoc($exec_d);

if(strpos($_SERVER['REQUEST_URI'],"fiche")!=false){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: sejour-linguistique-etudiant-adulte-".url_rewrite(trim(strtolower(stripslashes($data_d["nom"])))).",".$data_d["id"].".html");
	exit();
}

$fil_ariane .= "<a href='sejours-linguistiques-pour-etudiants-adultes.html' class='texteBleu'>Séjour linguistique</a>&nbsp;/&nbsp;";
$fil_ariane .= "<a href='sejours-linguistiques-etudiants-adultes-".url_rewrite(trim(strtolower(stripslashes($data_d["pays"])))).",".$data_d["idpays"].".html'>".stripslashes($data_d["pays"])."</a>&nbsp;/&nbsp;";
$fil_ariane .= "<a href='sejour-linguistique-etudiant-adulte-".url_rewrite(trim(strtolower(stripslashes($data_d["nom"])))).",".$data_d["id"].".html'>".stripslashes($data_d["ville"])."</a>&nbsp;/&nbsp;<b>".stripslashes($data_d["nom"])."</b>";

$title="Séjour linguistique ".stripslashes($data_d["nom"])." - Stage et job ".stripslashes($data_d["nom"]);

if($data_d["idpays"] != "0"){
	$_GET["pays"] = $data_d["idpays"];
}
if($data_d["idville"] != "0"){
	$_GET["ville"] = $data_d["idville"];
}
?>
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
<script>

	function checkmail(){

		
			


			document.ami.submit();

		

</script>
<html lang="fr">
    <head>        
        <title>Bec sejours linguistiques adultes - Ecole de Langue <?=stripslashes($data_d["ville"])?>,&nbsp;<?=stripslashes($data_d["nom"])?> </title>  
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="BEC Sejours linguistiques">
        <meta name="author" content="BEC Sejours linguistiques">  
        
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
<style type="text/css">
    .videoWrapper {
    	position: relative;
    	padding-bottom: 56.25%;
    	padding-top: 25px;
    	height: 0;
    }
    .videoWrapper iframe,
    .videoWrapper object,
    .videoWrapper embed {
    	position: absolute;
    	top: 0;
    	left: 0;
    	width: 100%;
    	height: 100%;
    }
    video {
	  width: 100%    !important;
	  height: auto   !important;
	}
    
 </style>
  
  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>		
</head>
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
		
    </head>
<? include("top_adultes.php"); ?>

           <!-- Section Title -->
            <div class="section_title features">
                <div class="container">
                    <div class="row"> 
						
                        <div class="col-md-10"><br>
                            <h1> Ecole de Langue <?=stripslashes($data_d["ville"])?>,&nbsp;<?=stripslashes($data_d["nom"])?></h1>
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
								<div class="col-md-3 titre" >
								 <!-- envoi de mail si on envoie à un ami -->
 <?

if(isset($_POST["ok"]) && $_POST["ok"] == 1){
		 $url_fiche = "http://www.becfrance.com".$_SERVER['REQUEST_URI'];
		//envoi_mail($_POST["$email_ami"], "un ami vous recommande un séjour linguistique ".$url_site2, "Bonjour. Un(e) ami(e) vous recommande un séjour proposé par le BEC séjour linguistiques ".$url_site2."<br><br>Cliquez <a href='".$url_fiche."'>sur ce lien</a> pour découvrir ce séjour.");
		$name = $_POST["name"];
$email = $_POST["email_ami"];
$sejour = ($data_d["nom"]);
$sub ="$name vous recommande un séjour linguistique du BEC: $sejour";
$mes = "Bonjour <br><br> $name vous recommande un séjour linguistique Etudiant/Adulte proposé par le BEC : $sejour <p><br>Cliquez <a href='".$url_fiche."'>sur ce lien</a> pour découvrir ce séjour.<br><br>Cordialement.<br><br>BEC séjours linguistiques<br>www.becfrance.com</p>";
 $entete='From: "BEC sejours linguistiques"<info@becfrance.com>'."\n";
     $entete.='Reply-To: info@becfrance.com'."\n";
     $entete.='Content-Type: text/html; charset="iso-8859-1"'."\n";
     $entete.='Content-Transfer-Encoding: 8bit'; 
$verify = mail ($email,$sub,$mes,$entete); 
		echo "<span>Votre recommandation a été envoyée</span>";

}

	?>
								</div>
								
                            </div>
                        </div>
                    </div>					 
                    <!-- End Newsletter Box -->
					<!-- contenu-->
                    <div class="row padding_top">
                        <div class="col-md-8">
                            <div class="more_slide tooltip_hover">							     
                                <ul>
																	
                                    <li title="Demander un devis en ligne" data-toggle="tooltip"><i class="fa fa-pencil"></i><a href="devis.php">Devis en ligne</a></li>
									<li title="Contacter un conseiller" data-toggle="tooltip"><i class="fa fa-phone"></i><a href="contact.php">Contact</a></li>
								
                                    <li title="partager sur facebook" data-toggle="tooltip"><i class="fa fa-facebook"></i><a target ="_blank" href="http://www.facebook.com/sharer.php?u=<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>">Partager</a></li>   
									<li title="Envoyer à  un ami par email" data-toggle="tooltip"><i class="fa fa-envelope"></i><a href="#postModal" role="button" data-toggle="modal">Envoyer à un ami</a></li>								
                                </ul>
                            </div>
							
							
							
                            <!-- Slide photos-->  
							
							
							
							
							<?
							if(isset($_GET["fiche"]) && $_GET["fiche"] != "")
							{
							$query2 = "SELECT fea.* FROM fiche_etudiant_adulte fea WHERE fea.id = '".addslashes($_GET["fiche"])."'";
							}
							//echo $query2;
							$exec2 = mysql_query($query2) or die(mysql_error());
							$data2 = mysql_fetch_assoc($exec2);
							?>							
                            <div class="camera_wrap" id="slide_details">
						<?

	for($i=0 ; $i<10 ; $i++){	

		if(file_exists("imagesUp/".$rep_image."/".$data2["id"]."-".($i+1).".jpg")){

			$size = getimagesize("imagesUp/".$rep_image."/".$data2["id"]."-".($i+1).".jpg");

			  $width = $size[0];
			  $height = $size[1];

			  ?>
							
							
                                <!-- Item Slide -->  
								
								 <div data-src="imagesUp/<?=$rep_image?>/<?=$data2["id"]?>-<?=($i+1)?>.jpg"  border="0" alt=""  />
								
                               
                                   <!-- <div class="camera_property fadeFromBottom">
                                        <a href="#"><h4>Légende photo</h4></a>                                            
                                    </div>-->
                                </div>
                                <!-- End Item Slide -->  
                                 <?
									}							
								}
								?>   
                            </div>
                            <!-- End Slide-->  
                        </div>
                        <div class="col-md-4">
                            <div class="description">   
								<span class="titre">
								
								<?
														  $query2 = "SELECT * FROM fiche_etudiant_adulte_tarif WHERE fiche_etudiant_adulte = '".$data_d["id"]."' ORDER BY prix_famille ASC LIMIT 1";
														  $exec2 = mysql_query($query2) or die(mysql_error());
														  while($data2 = mysql_fetch_assoc($exec2)){
														  // on recupere la devise et le taux pour cette destination
														  $query4 = "SELECT symbole,taux FROM devise dev INNER JOIN fiche_etudiant_adulte fea ON fea.devise = dev.id  WHERE fea.id = '".$data_d["id"]."'";
							$exec4 = mysql_query($query4) or die(mysql_error());
							$data4 = mysql_fetch_assoc($exec4);
										{										
										$symbole =($data4["symbole"]);
										$taux = ($data4["taux"]);										
										
										// si pas en euro, on ajoute 0.2 centimes
										/* if ($symbole !="€")
											{											
											$taux = $taux + 0.02;	
											} */
										}
														  
															  ?>													 
							
								
								
								&nbsp;A partir de	<? $prix_devises = stripslashes($data2["prix_famille"]);
														 $prix_devises = round($prix_devises * $taux,0) ;
														
														 ?>
														  <?=$prix_devises ?>€ par semaine</span><?
                                          }
                                      
									  ?> <br><br>			
                               
                               <span class="titre"><i class="fa fa-plus"></i>&nbsp;Points forts</span> 
							   <ul> 
							   <?
                                      for($i=1 ; $i<=5 ; $i++){
										  if($data_d["point_fort".$i] != ""){
										  ?>                                       
                                          <li><?=stripslashes($data_d["point_fort".$i])?>                                        
                                        <?
                                          }
                                      }
									  ?>
                                </ul>
                                           
								
                                           <span class="titre"> <i class="fa fa-graduation-cap"></i>&nbsp;Examens préparés</span>  
											<ul>
											<?
                                        $query2 = "SELECT e.nom, e.description FROM fiche_etudiant_adulte_examen feae, examen e WHERE fiche_etudiant_adulte = '".$data_d["id"]."' AND feae.examen = e.id";
										$exec2 = mysql_query($query2) or die(mysql_error());
										
										while($data2 = mysql_fetch_row($exec2)){
										?>
										<li> <?=nl2br(stripslashes($data2[0]));?>   
											
										<?											 
										  }
										  ?>	

										</ul>										 
										  <span class="titre"><i class="fa fa-home"></i>&nbsp;Hébergements proposés</span>                                 
											<ul>  
<?
										  for($i=1 ; $i<=5 ; $i++){
											  if($data_d["hebergement_nom".$i] != ""){
											  ?>
											  <li> <?=stripslashes($data_d["hebergement_nom".$i])?>                                                                  
											<?
											  }
										  }
										  ?>	
											</ul>
												
								
								<!-- fin colonne -->
								</div>
								
							
                        </div> 
                    </div><br>

                      <!-- Tabs Detail Properties -->
                    <div class="row padding_top">
                        <div class="col-md-9">
                            <!--NAV TABS-->
                            <ul class="tabs"> 
                                <li><a href="#tab1">Ecole</a></li> 
								<li><a href="#tab3">Cours</a></li>
								<li><a href="#tab6">Stages-Jobs</a></li>	
								<li><a href="#tab4">Hébergement</a></li>
								<li><a href="#tab2">Activités</a></li> 								
								<li><a href="#tab5">Tarif</a></li>	
													
                                                                        
                            </ul>                       
                                        
                            <!--CONTAINER TABS-->   
                            <div class="tab_container"> 
                                <!--Tab1 Genral info-->      
                                <div id="tab1" class="tab_content">
                                    <div class="row">                                        
                                        <div class="col-md-6">
                                            <p><?=nl2br(stripslashes($data_d["description"]))?></p>
                                        </div>
										<div class="col-md-6">									
                                          	                     
											<h4> <img src="img/wifi.png" width="24">&nbsp;Wifi gratuit</h4>   
											<span class="titre"><i class="fa fa-male"></i>&nbsp;Age Minimum 	</span> <?=nl2br(stripslashes($data_d["age_mini"]))?> ans<br>	<br>
											 
											<span class="titre"> <i class="fa fa-calendar"></i>&nbsp;Fermetures de l'école</span>  <br>                                         
											
                                                     <?=nl2br(stripslashes($data_d["fermeture_centre"]))?> <br><br>
											<span class="titre"> <i class="fa fa-institution"></i>&nbsp;Accréditations</span><br>
  <?
                                        $query2 = "SELECT a.nom FROM fiche_etudiant_adulte_accreditation feaa, accreditation a WHERE fiche_etudiant_adulte = '".$data_d["id"]."' AND feaa.accreditation = a.id";
										$exec2 = mysql_query($query2) or die(mysql_error());
										$tab = array();
										while($data2 = mysql_fetch_row($exec2)){
											$tab[] = stripslashes($data2[0]);
										}
										?>
                                           
                                              <?=implode("<br> ", $tab)?>
										 
                                <br><br>																	  
											
                                        </div>
                                    </div>   
									<?
									 if($data_d["video"] != ""){
									
									?>
									<!-- video -->          
                                    <div class="row">   
                                      <div class="col-md-12" align="center">
                                               
                                         <iframe height="315" width="560" src="https://www.youtube.com/embed/<?=nl2br(stripslashes($data_d["video"]))?>" frameborder="0" allowfullscreen></iframe>
                                      </div>
                                    </div>									    
									
                                    <div class="divisor">
                                        <div class="circle_left"></div>
                                        <div class="circle_right"></div>
                                    </div>									 
                                 <?} ?>
						             <!--   map google                  
                                    <div class="row">   
                                      <div class="col-md-12">
                                          <h4>Carte école</h4>             
                                          <div class="map_area">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10082.380430710715!2d-0.136492!3d50.82014!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x57ad4501bb2e0944!2sBrighton+Language+College!5e0!3m2!1sfr!2sfr!4v1417789355335" width="600" height="450" frameborder="0" style="border:0"></iframe>
                                          </div>
                                      </div>
                                    </div>						    
									
                                    <div class="divisor">
                                        <div class="circle_left"></div>
                                        <div class="circle_right"></div>
                                    </div>									 
                                     End Divisor-->
												
														
                                               
                                </div>
                                <!--End Tab1 Genral info-->      

                                <!--Tab2 Contact Agent-->      
                                <div id="tab2" class="tab_content">                                                             
                                   <div class="row">
										<div class="titles">
                                      <h2> <i class="fa fa-suitcase"></i>&nbsp;Activités proposées </h2><br><br>
                                                  
                                     <p><?=nl2br(stripslashes($data_d["les_activites"]))?></p>                      
                                
										</div>   
								   </div>        
                                </div>
                                <!--End Tab2 Contact Agent-->      

                                <!--Tab3 Enseignements-->      
                                <div id="tab3" class="tab_content">	
									<div class="titles">			
								<h2><i class="fa fa-graduation-cap"></i>&nbsp;Enseignements proposés </h2><br><br><p>L'ecole <?=stripslashes($data_d["nom"])?> à <?=stripslashes($data_d["ville"])?> vous propose les cours suivants :<br></p>
								
								<?
								 for($i=1 ; $i<=8 ; $i++){
								if($data_d["enseignement_nom".$i] != ""){
								 ?>
								
									<h3><?=stripslashes($data_d["enseignement_nom".$i])?></h3>
									<br><br>
									<?=nl2br(stripslashes($data_d["enseignement_texte".$i]))?><br>
									
								
							<?
								  }
							 }
							 ?>	
														
									</div>	
                                </div>
                                <!--hébergements--> 
								<div id="tab4" class="tab_content"> 
									<div class="titles">	
									<h2><i class="fa fa-home"></i></i>&nbsp;Hébergements proposés</h2><br><br>
								
								<?
										  for($i=1 ; $i<=5 ; $i++){
											  if($data_d["hebergement_nom".$i] != ""){
											  ?>
											  
										 
						<h3><?=stripslashes($data_d["hebergement_nom".$i])?></h3><br><br>		
						<?=nl2br(stripslashes($data_d["hebergement_texte".$i]))?><br>
						
							
											
											<?
											  }
										  }
										  ?>
									</div>
								</div>
								<!--Tab3 commnets-->      
                                <div id="tab5" class="tab_content">  
                                    
									<div class="panel">
						<div class="panel-heading">
						
						 <?
								$query = "SELECT lib_tarif_1, lib_tarif_2, lib_tarif_3 FROM fiche_etudiant_adulte WHERE id = '".addslashes($_GET["fiche"])."'";
								$exec = mysql_query($query) or die(mysql_error());
								$data = mysql_fetch_assoc($exec);
								$col1 = stripslashes($data["lib_tarif_1"]);
								$col2 = stripslashes($data["lib_tarif_2"]);
								$col3 = stripslashes($data["lib_tarif_3"]);
								?>							
								
						<table width="100%" border="0" cellpadding="1" cellspacing="0" class="table table-striped">
												  
													  <tr>
														<th width="30%" align="left"  ><b>
														  <?=$col1?>
														</b></th>
														<th width="35%" align="center" ><b>														
														  <?=$col2?>
														</b></th>
														<th width="35%" align="center"><b>
														  <?=$col3?>
														</b></th>
													  </tr>
													  <?
														  $query2 = "SELECT * FROM fiche_etudiant_adulte_tarif WHERE fiche_etudiant_adulte = '".$data_d["id"]."' ORDER BY id";
														  $exec2 = mysql_query($query2) or die(mysql_error());
														  while($data2 = mysql_fetch_assoc($exec2)){
															  ?>
													  <tr>
													  <td align="left">
														  <span ><?=stripslashes($data2["nom"])?></span>
														</td>
														
													   <td align="center">
															
															<?=stripslashes($data2["prix_famille"])?>												
															
														  <?=$symbole ?>&nbsp;
														   <? if ($symbole !="€")
														   {
														 $prix_devises = stripslashes($data2["prix_famille"]);
														  $prix_devises = number_format($prix_devises * $taux,0) ;
														 ?><strong>
														  (<?=$prix_devises ?>&nbsp;€)
														  <?}?>
														  </strong></td>
														  
															<td align="center ">
															 <?=stripslashes($data2["prix_residence"])?> 
															  <?=$symbole ?>&nbsp;
															 <? if ($symbole !="€")
														   {
														 $prix_devises = stripslashes($data2["prix_famille"]);
														  $prix_devises = number_format($prix_devises * $taux,0) ;
														 ?><strong>(<?=$prix_devises ?>&nbsp;€)
														  <?}?></strong></td>
														  </tr>                                                  
													  
													  <?
														  }
														  ?>
													</table>				
						
					
										<br><span class="titre">Suppléments</span><br>

											<table width="100%" border="1" cellpadding="1" cellspacing="0" class="table table-striped">
											<tr>
											<th width="70%" align="center" bgcolor="#67093e"><b>Rubriques</b></th>
											<td width="30%"  align="center" bgcolor="#67093e"><b>Tarifs</b></td>
											</tr>
				 <?
														  $query2 = "SELECT * FROM fiche_etudiant_adulte_supplement WHERE fiche_etudiant_adulte = '".$data_d["id"]."' ORDER BY id";
														  $exec2 = mysql_query($query2) or die(mysql_error());
														  while($data2 = mysql_fetch_assoc($exec2)){
															  ?>
													  <tr>
														<td align="left">
														  <?=stripslashes($data2["nom"])?>
													   </td>
														
															<td align="center">
															
															 <? $prix_supp = stripslashes($data2["tarif"]);
																//echo $prix_supp;
																
																// on prend les caractères apres l'espace pour le libelle
																if( ($x_pos = strpos($prix_supp, ' ')) !== FALSE )
																{
																$libelle = substr($prix_supp, $x_pos + 1);
																// le prix est donc avant l'espace
																$prix_supp = substr($prix_supp, 0, strpos($prix_supp, " "));
																 $prix_devises = number_format($prix_supp * $taux,0);		
																}
																else
																{
																echo $prix_supp;
																$libelle = "";
																$prix_supp = substr($prix_supp, 0, strpos($prix_supp, " "));
																 $prix_devises = number_format($prix_supp * $taux,0);
																}
																// on supprime la reference à l'euro pour le libelle - à changer
																//if ($symbole =="€")
																//{
																//$x_pos = strpos($libelle, '€');
																//$libelle = substr($libelle, $x_pos);
																//}
																// le prix est donc avant l'espace
																																
																																
																?>
																
																<? if ($prix_supp!='0'){?>
																	<?=$prix_supp?>&nbsp;<?=$symbole ?>	
																	<strong>
																	<? // on affiche eventuelement la conversion en euros
																	if ($symbole !="€"){?>
																	 (<?=$prix_devises ?>&nbsp;€)
																	</strong>
																	 <?}?>
																 <?}?>
																 
															   <strong> <?=$libelle ?> </strong>
															  </td>
														  </tr>                                                                                                      
													  <?
													  $libelle='';
														  }
														  ?>	

				</table>	
									
									</div>							
								</div>
                                                                                                   
									 
                                </div>
                                <!--End Tab3 commnets--> 
								 <!--Tab6 Jobs-->      
                                <div id="tab6" class="tab_content">                                                             
                                   <div class="row">
									<div class="titles">
										<h2><i class="fa fa-suitcase"></i>&nbsp;Stages et jobs</h2><br><br><br>
										
										  	 <?
										  for($i=1 ; $i<=5 ; $i++){
											  if($data_d["job_nom".$i] != ""){
											  ?>
											  <h3><?=stripslashes($data_d["job_nom".$i])?></h3><br><br>
										   <?=nl2br(stripslashes($data_d["job_texte".$i]))?><br><br>
											<?
											  }
										  }
										  ?>	
										
										
										
										</div>   
								   </div>        
                                </div>
                                <!--End Tab2 Contact Agent-->  
                            </div> 
                            <!--END CONTAINER TABS-->
											
						
                        
						
						<!-- call to action bas --><br>
						<div class="row text-center">
                        <!-- Step 1 -->
                        <a  href="tel:+33155352500">
                          <div class="col-md-4 col-sm-4">
                              <div class="thumbnail-process">
                                <div class="caption-head">
                                  <em class="caption-icon fa fa-phone icon-big"></em>                            
                                  <span class="titre caption-title">01 55 35 25 00</span>
                                </div>
                              </div>							  
                          </div>
                        </a>

                        <!-- Step 2 -->
                        <a href="devis.php">
                          <div class="col-md-4 col-sm-4">
                              <div class="thumbnail-process">
                                <div class="caption-head">
                                  <em class="caption-icon fa fa-edit icon-big"></em>
                                   <span class="titre caption-title">Devis</span>
                                </div>
                              </div>
                          </div>
                        </a>

                        <!-- Step 3 -->
						 <a href="brochure.php">
                        <div class="col-md-4 col-sm-4">
                            <div class="thumbnail-process">
                              <div class="caption-head">
                                <em class="caption-icon fa fa-book icon-big"></em>
                                   <span class="titre caption-title">Brochure</span>
                              </div>
                            </div>
                        </div>
						</a>
						</div>
						<!-- fin call to action bas -->
						
						
						</div>
						<!-- Aside -->
						<? include("droite_adultes.php"); ?>                        
						
						
                    </div>
                     <!-- Tabs Detail Properties -->

					
					<div class="container"> 
					 <div class="titles">
                                      <h2>5 raisons de choisir BEC pour étudier à <?=stripslashes($data_d["nom"])?> </h2>
                                </div>                  
                    <p>
			<i class="fa fa-star"></i>&nbsp;Vous payez exactement le même tarif qu'en reservant directement à l'école.
			<br><i class="fa fa-star"></i>&nbsp;Vous bénéficiez de notre assurance Responsabilité Civile Professionnelle souscrite auprès de MMA ansi que de la garantie des fonds déposés auprès de l'APST
			<br><i class="fa fa-star"></i>&nbsp;Vous profitez de promotions exceptionnelles.
			<br><i class="fa fa-star"></i>&nbsp;Nos conseillers spécialisés sont disponibles pour vous aiguiller dans le choix du séjour le mieux adapté à  votre niveau et vos objectifs. 
			<br><i class="fa fa-star"></i>&nbsp;Spécialiste du séjour linguistique depuis 1967</p>  
                </div>
          
					
                    <!-- Content Carousel Properties -->
                    <div class="content-carousel">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Title-->
                                <div class="titles">
                                    <h1>D'autres écoles pour la destination <?=stripslashes($data_d["pays"])?></h1>
                                </div>
                                <!-- End Title-->
                            </div>
                        </div>

                        <!-- Carousel ecoles -->
                        <div id="properties-carousel" class="properties-carousel">
                           <?
									$query = "SELECT fea.*, p.nom as pays, v.nom as ville FROM fiche_etudiant_adulte fea INNER JOIN pays p ON fea.pays = p.id INNER JOIN ville v ON fea.ville = v.id LEFT OUTER JOIN fiche_etudiant_adulte_hebergement feah ON fea.id = feah.fiche_etudiant_adulte LEFT OUTER JOIN fiche_etudiant_adulte_formule feaf ON fea.id = feaf.fiche_etudiant_adulte WHERE 1";
									if(isset($_GET["pays"]) && $_GET["pays"] != ""){
										$query .= " AND fea.pays = '".addslashes($_GET["pays"])."'";
									}
									
									$query .= " GROUP BY fea.id ORDER BY p.nom, v.nom, fea.nom";
									//echo $query;
									$exec = mysql_query($query) or die(mysql_error());
									$nb = mysql_num_rows($exec);
									
									$i=0;
									while($data = mysql_fetch_assoc($exec))
									{
										$url = "sejour-linguistique-etudiant-adulte-".url_rewrite(trim(strtolower(stripslashes(stripslashes($data["nom"]))))).",".$data["id"].".html";
										if($i%3 == 0){
											?><tr><?
										}
										$i++;
									?>
									

                           
							<!-- Item Property-->
                             <div class="item_property">
                                <div class="head_property">
                                  <a href="<?=$url?>">
                                    
                                    <img width="200" height="160" src="imagesUp/fiche_etudiant/<?=$data["id"]?>-1.jpg" alt="Image">
                                    <h5><?=stripslashes($data["nom"])?></h5>
                                  </a>
                                </div>                        
                                <div class="info_property">                                  
                                    <ul>
                                        <li><strong>Ville </strong><span><?=stripslashes($data["ville"])?></span></li>
										
										<?
														  $query2 = "SELECT * FROM fiche_etudiant_adulte_tarif WHERE fiche_etudiant_adulte = '".$data["id"]."' ORDER BY prix_famille ASC LIMIT 1";
														  $exec2 = mysql_query($query2) or die(mysql_error());
														  while($data2 = mysql_fetch_assoc($exec2)){
															  												 
								
								$query4 = "SELECT symbole,taux FROM devise dev INNER JOIN fiche_etudiant_adulte fea ON fea.devise = dev.id  WHERE fea.id = '".$data["id"]."'";
							$exec4 = mysql_query($query4) or die(mysql_error());
							$data4 = mysql_fetch_assoc($exec4);
										{
										$symbole =($data4["symbole"]);
										$taux = ($data4["taux"]);										
										}
								?>	
								<li><strong>A partir de</strong><span>
								
								<? $prix_devises = stripslashes($data2["prix_famille"]);
														 $prix_devises = number_format($prix_devises * $taux,0) ;
														 ?>
														  <?=$prix_devises ?>&nbsp;€/semaine</span></li>
								
								
								<?
                                          }
                                      
									  ?> 									
                                       
                                    </ul>                                 
                                </div>
                            </div>
                            <!-- End Item Property-->
                           
								<?
										
                                    }
									?>
                         

                          
                        </div>
                        <!-- End Carousel Properties -->
                    </div>
                    <!-- End Content Carousel Properties -->
                </div>
            </section>
            <!-- End content info-->
<!-- envoyer a un ami -->
							<div id="postModal"  class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog">
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								  Recommander à un(e) ami(e) ce séjour
								</div>
								<div class="modal-body">
							<!-- form -->          
								  <form name="ami" action="" method="post" onSubmit="return checkmail()">
								  <input type="hidden" value="1" name="ok" />
									<div class="input-group">
									  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									  <input name="name" type="text" class="form-control" placeholder="Votre nom" required="required">
									</div>            
									<div class="input-group">
									  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
									  <input name="email_ami" type="email" class="form-control" placeholder="L'email de votre ami(e)" required="required">
									</div>
									<div class="modal-footer">
								  <button type="submit" name="submit" class="btn btn-sm" >Envoyer</button> 
								  </form>
								<!-- end form -->  
							</div>
							</div>  
							</div>
						</div>
						</div>
 <? include("footer.php"); ?>          
			
