<!DOCTYPE html>
<? include("connect.php"); ?>
<? $query_d = "SELECT fj.*, p.nom as pays, v.nom as ville, p.id as idpays, v.id as idville FROM fiche_junior fj INNER JOIN junior_pays p ON fj.pays = p.id INNER JOIN junior_ville v ON fj.ville = v.id WHERE fj.id = '".addslashes($_GET["fiche"])."'";

$exec_d = mysql_query($query_d) or die(mysql_error());

if(mysql_num_rows($exec_d) == 0){

	echo "<script>document.location.href='index_junior.php';</script>";
	exit();

}

$data_d = mysql_fetch_assoc($exec_d);



/*if(strpos($_SERVER['REQUEST_URI'],"fiche")!=false){

	header("HTTP/1.1 301 Moved Permanently");

	header("Location: sejour-linguistique-adolescent-".url_rewrite(trim(strtolower(stripslashes($data_d["nom"])))).",".$data_d["id"].".html");

	exit();

}*/



//age

$query2 = "SELECT MIN(age_mini),nom  FROM fiche_junior_classe fjc, classe c WHERE fjc.fiche_junior = '".$data_d["id"]."' AND fjc.classe = c.id";

$exec2 = mysql_query($query2) or die(mysql_error());
$data2 = mysql_fetch_row($exec2);
$age = $data2[0];
$tranche = $data2[1];

$query2 = "SELECT MAX(age_maxi),MAX(nom) FROM fiche_junior_classe fjc, classe c WHERE fjc.fiche_junior = '".$data_d["id"]."' AND fjc.classe = c.id";

$exec2 = mysql_query($query2) or die(mysql_error());
$data2 = mysql_fetch_row($exec2);
$age .= "-".$data2[0]." ans";
$tranche.= " à la ".$data2[1];




$fil_ariane .= "<a href='sejours-linguistiques-pour-adolescents.html' class='texteBleu'>Séjour linguistique Juniors 12-19 ans</a>";

$fil_ariane .= " / <a href='sejours-linguistiques-adolescents-".url_rewrite(trim(strtolower(stripslashes($data_d["pays"])))).",".$data_d["idpays"].".html' class='texteBleu'>".stripslashes($data_d["pays"])."</a>";
$fil_ariane .= " / <a href='sejours-linguistiques-adolescents-".url_rewrite(trim(strtolower(stripslashes($data_d["pays"])))).",".$data_d["idpays"].".html' class='texteBleu'>".stripslashes($data_d["ville"])."</a>";
$fil_ariane .= " / <a href='sejour-linguistique-adolescent-".url_rewrite(trim(strtolower(stripslashes($data_d["nom"])))).",".$data_d["id"].".html' class='texteBleu'>".stripslashes($data_d["nom"])."</a>";

$title="Séjour linguistique pour adolescent ".stripslashes($data_d["nom"])." - Stage et job ".stripslashes($data_d["nom"]);



if(file_exists("imagesUp/fiche_junior/".$data_d["id"]."-1_m2.jpg")){

	$image_head = $url_site."/imagesUp/fiche_junior/".$data_d["id"]."-1_m2.jpg";

}



$pays_swf = $data_d["idpays"];


if($data_d["idpays"] != "0"){

	$_GET["pays"] = $data_d["idpays"];
}

if($data_d["idville"] != "0"){

	$_GET["ville"] = $data_d["idville"];

}

?>
<html lang="fr">
    <head>        
        <title>Bec séjours linguistiques Juniors <?=stripslashes($data_d["nom"])?></title>  
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
		
    </head>
<? include("top_juniors.php"); ?>
           <!-- Section Title -->
            <div class="section_title juniors">
                <div class="container">
                    <div class="row"> 
						
                        <div class="col-md-10"><br>
                            <h1> <?=stripslashes($data_d["nom"])?></h1>
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
					<!-- contenu-->
                    <div class="row padding_top">
                        <div class="col-md-7">
                            <div class="more_slide tooltip_hover">							     
                                <ul>
																	
                                    <li title="Réserver le voyage en ligne" data-toggle="tooltip"><i class="fa fa-pencil"></i><a href="#reservation">Réserver</a></li>
									<!--<li title="Contacter un conseiller" data-toggle="tooltip"><i class="fa fa-phone"></i><a href="#">Contact</a></li>
                                    <li title="partager sur facebook" data-toggle="tooltip"><i class="fa fa-facebook"></i><a href="#">Partager</a></li>   
									<li title="Envoyer à  un ami par email" data-toggle="tooltip"><i class="fa fa-envelope"></i><a href="#">Envoyer à un ami</a></li>-->									
                                </ul>
                            </div>
                            <!-- Slide photos-->  
							<?
							if(isset($_GET["fiche"]) && $_GET["fiche"] != "")
							{
							$query2 = "SELECT fj.* FROM fiche_junior fj WHERE fj.id = '".addslashes($_GET["fiche"])."'";
							}
							//echo $query2;
							$exec2 = mysql_query($query2) or die(mysql_error());
							$data2 = mysql_fetch_assoc($exec2);
							?>							
                            <div class="camera_wrap" id="slide_details">
						<?

	for($i=0 ; $i<10 ; $i++){	

		if(file_exists("imagesUp/".$rep_image."/".$data2["id"]."-".($i+1)."_m.jpg")){

			$size = getimagesize("imagesUp/".$rep_image."/".$data2["id"]."-".($i+1)."_m.jpg");

			  $width = $size[0];
			  $height = $size[1];

			  ?>
							
							
                                <!-- Item Slide -->  
								
								 <div data-src="imagesUp/<?=$rep_image?>/<?=$data2["id"]?>-<?=($i+1)?>.jpg"  border="0" alt=""  />
								
                               
                                    <!--<div class="camera_property fadeFromBottom">
                                      legende photo                                      
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
                        <div class="col-md-5">
						
                            <div class="description">

								
								 
								 <div>
								
							<?
$tab_prix = array();
$tab_prix[] = $data_d["tarif"];
$query2 = "SELECT tarif FROM fiche_junior_date WHERE rid_fiche = '".$data_d["id"]."' AND tarif > '0'";
$exec2 = mysql_query($query2) or die(mysql_error());
while($data2 = mysql_fetch_row($exec2)){
	$tab_prix[] = $data2[0];
}
$prix_apartirde = min($tab_prix);
?>											 
								
								
								 <span class="titre"><i class="fa fa-calendar-o"></i>&nbsp;Mémo séjour</span>
								<span class="titre" align="right">&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   A partir de : <b><?=parsePrix($prix_apartirde)?></b> &euro;</span>
								
								</div> 
								 <br>
						
							<b> <?=stripslashes($data_d["nom"])?></b><br>
									<!-- dates du séjour -->
									<?$query_date = "SELECT * FROM fiche_junior_date WHERE rid_fiche = '".addslashes($_GET["fiche"])."' AND afficher = '1' ORDER BY date_debut, date_fin";							

									$exec_date = mysql_query($query_date) or die(mysql_error());
									while($data_date = mysql_fetch_assoc($exec_date)){

										?>									
										
									       <i class="fa fa-check"></i>&nbsp;<?=stripslashes($data_date["nom"])?><br>										  
										  <? } ?><br>
										  
										  
										 <!-- <i class="fa fa-user"></i>&nbsp;<?=$age?> (
										
										  <?$query4 = "SELECT nom  FROM fiche_junior_classe fjc, classe c WHERE fjc.fiche_junior = '".$data_d["id"]."' AND fjc.classe = c.id";						

									$exec_date = mysql_query($query4) or die(mysql_error());
									while($data_date = mysql_fetch_assoc($exec_date)){

										?>						
											
									      <?=stripslashes($data_date["nom"])?>									  
										  <? } ?>)<br>	
										  
										  -->		
										  
								 <!--<br><?=stripslashes($data_d["niveau"])?><br>-->
								
							 
							  
							  <?
$query2 = "SELECT f.nom,f.id FROM fiche_junior_formule fjf, formule_junior f WHERE fiche_junior = '".$data_d["id"]."' AND fjf.formule = f.id";
$exec2 = mysql_query($query2) or die(mysql_error());
$tab = array();
$i=1;
while($data2 = mysql_fetch_row($exec2)){
    $tab[] = "<strong>".stripslashes($data2[0])."</strong>";
	$theme = $data2[1];
    $i++;
}
?><i class="fa fa-list-alt"></i>
<?=implode(" / ", $tab)?>
<!-- theme du séjour facultatif <?=$theme?>-->
							  
							  
							 <br><br>			
                               <?=nl2br(stripslashes($data_d["rappel_formule"]))?>	
								
								<!-- fin colonne -->
								</div>
								
							
                        </div> 
                    </div><br>

                      <!-- Tabs Detail Properties -->
                    <div class="row padding_top">
                        <div class="col-md-9">
                            <!--NAV TABS-->
                            <ul class="tabs"> 
                                <li><a href="#tab1">PRESENTATION</a></li> 
								<li><a href="#tab3">TRANSPORTS</a></li>
								<li><a href="#tab4">HEBERGEMENT</a></li>
								<li><a href="#tab6">COURS</a></li>								
																
								<li><a href="#tab2">ACTIVITES</a></li> 								
								<li><a href="#tab5">INFOS TARIF</a></li>	
													
                                                                        
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
                                          	                     
											  
											<span class="titre"><i class="fa fa-user"></i>&nbsp;Age 	</span> <?=$age?><br>	<br>
											 
											<span class="titre"><i class="fa fa-plus"></i>&nbsp;Les plus du séjour</span> 
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
 
                                           
                                            
										 
                                <br><br>																	  
											
                                        </div>
                                    </div>   
									<?
									 if($data_d["video"] != ""){
									
									?>
									<!-- video -->          
                                    <div class="row">   
                                      <div class="col-md-12">
                                               
                                         <iframe align="center" width="560" height="315" src="https://www.youtube.com/embed/<?=nl2br(stripslashes($data_d["video"]))?>" frameborder="0" allowfullscreen></iframe>
                                      </div>
                                    </div>									    
									
                                    <div class="divisor">
                                        <div class="circle_left"></div>
                                        <div class="circle_right"></div>
                                    </div>									 
                                 <?} ?>
						             <!-- carte                
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
                                    <!-- End Divisor-->
									
														
                                               
                                </div>
                                <!--End Tab1 Genral info-->      

                                <!--Tab2 Contact Agent-->      
                                <div id="tab2" class="tab_content">                                                             
                                   <div class="row">
										<div class="titles">
                                      <h2> <i class="fa fa-suitcase"></i>&nbsp;PROGRAMME</h2><br><br>
                                  <!--  bloc programme -->                 
                                  <?
								$query2 = "SELECT * FROM junior_programme WHERE fiche_junior = '".$data_d["id"]."'";
								$exec2 = mysql_query($query2) or die(mysql_error());
								$data2 = mysql_fetch_assoc($exec2);

								?>

                                <table width="100%" border="0" cellpadding="3" cellspacing="1">

                                <? for($i=1 ; $i<=3 ; $i++){ ?>

								<? if($i!=3 || $data2["num3_j1_1"] != ""){ ?>

                                    <tr align="center">

                                      <td width="20" class="tabCell_droite">&nbsp;</td>
                                      <td width="120" class="tabCell_droite">&nbsp;</td>
                                      <td bgcolor="#E7F3FA" ><?=stripslashes($data2["jour1"])?></td>
                                      <td bgcolor="#E7F3FA" ><?=stripslashes($data2["jour2"])?></td>
                                      <td bgcolor="#E7F3FA"><?=stripslashes($data2["jour3"])?></td>
                                      <td bgcolor="#E7F3FA"><?=stripslashes($data2["jour4"])?></td>
                                      <td bgcolor="#E7F3FA" ><?=stripslashes($data2["jour5"])?></td>
                                      <td bgcolor="#E7F3FA" ><?=stripslashes($data2["jour6"])?></td>

                                      <td bgcolor="#E7F3FA"><?=stripslashes($data2["jour7"])?></td>

                                    </tr>

                                    <tr><td rowspan="3" bgcolor="#E7F3FA">

                                      <img src="images/sem<?=$i?>.gif" width="19" height="66" /></td>

                                    <? for($h=1 ; $h<=3 ; $h++){ ?>

                                        <?=(($h!=1) ? "<tr>" : "")?>
                                        <td align="center" height="100" class="tabCell_gauche_bleu texteBleu"><?=(($h==1) ? "MATIN" : (($h==2) ? "APRES<br>MIDI" : "SOIR"))?></td>

                                        <? for($j=1 ; $j<=7 ; $j++){ ?>
                                        <?

										$rowspan = "";

										if($h==1){

											$query_rowspan = "SELECT fiche_junior FROM junior_programme WHERE fiche_junior = '".$data_d["id"]."' AND txt".$i."_j".$j."_".($h+1)." = '' AND txt".$i."_j".$j."_".($h+2)." = ''";

											//echo $query_rowspan;
											$exec_rowspan = mysql_query($query_rowspan) or die(mysql_error());
											if(mysql_num_rows($exec_rowspan) > 0){

												$rowspan = "3";

											}else{

												$query_rowspan = "SELECT fiche_junior FROM junior_programme WHERE fiche_junior = '".$data_d["id"]."' AND txt".$i."_j".$j."_".($h+1)." = ''";
												//echo $query_rowspan;

												$exec_rowspan = mysql_query($query_rowspan) or die(mysql_error());
												if(mysql_num_rows($exec_rowspan) > 0){

													$rowspan = "2";

												}

											}

										}

										$no_col = "";

										if($h==2){

											$query_rowspan = "SELECT fiche_junior FROM junior_programme WHERE fiche_junior = '".$data_d["id"]."' AND txt".$i."_j".$j."_".($h+1)." = ''";

											//echo $query_rowspan;
											$exec_rowspan = mysql_query($query_rowspan) or die(mysql_error());
											if(mysql_num_rows($exec_rowspan) > 0){

												$rowspan = "2";
											}
											

											$query_col = "SELECT fiche_junior FROM junior_programme WHERE fiche_junior = '".$data_d["id"]."' AND (txt".$i."_j".$j."_".($h-1)." <> '' OR txt".$i."_j".$j."_".($h-1)." = '') AND txt".$i."_j".$j."_".$h." = ''";
											//echo $query_col;

											$exec_col = mysql_query($query_col) or die(mysql_error());
											if(mysql_num_rows($exec_col) > 0){

												$no_col = "ok";

											}

										}

										if($h==3){

											$query_col = "SELECT fiche_junior FROM junior_programme WHERE fiche_junior = '".$data_d["id"]."' AND (txt".$i."_j".$j."_".($h-1)." <> '' OR (txt".$i."_j".$j."_".($h-2)." <> '' OR txt".$i."_j".$j."_".($h-2)." = '')) AND txt".$i."_j".$j."_".$h." = ''";

											//echo $query_col;

											$exec_col = mysql_query($query_col) or die(mysql_error());
											if(mysql_num_rows($exec_col) > 0){

												$no_col = "ok";

											}

										}

										$query_picto = "SELECT * FROM picto_programme WHERE id = '".$data2["num".$i."_j".$j."_".$h]."'";
										$exec_picto = mysql_query($query_picto) or die(mysql_error());
										$data_picto = mysql_fetch_assoc($exec_picto);

										

										if($no_col != "ok"){

										?>

                                        <td align="center" class="programme<?=$data2["num".$i."_j".$j."_".$h]?>-1" <?=(($rowspan != "") ? " rowspan='".$rowspan."'" : "")?> valign="middle" width="100">

                                        <? if($data2["num".$i."_j".$j."_".$h] != ""){ ?>

                                        <?=stripslashes($data2["txt".$i."_j".$j."_".$h])?>

                                        <? } ?>

                                        </td>

                                        <? } ?>

                                        <? } ?>

                                        <?=(($h!=1) ? "</tr>" : "")?>

                                    <? } ?>

                                    </tr>

                                    <tr><td height="20"></td></tr>

                                <? } ?>

                                <? } ?>

                              </table></td>

                            </tr>

                            <tr>

                              <td><img src="images/tableau_bas.gif" width="762" height="7" /></td>

                            </tr>

                          </table>

                          <br />

                     

                        <!-- fin bloc programme -->                  
                                
										</div>   
								   </div>        
                                </div>
                                <!--End Tab2 Contact Agent-->      

                                <!--Tab3 Enseignements-->      
                                <div id="tab3" class="tab_content">	
									<div class="titles">			
								<h2><i class="fa fa-graduation-cap"></i>&nbsp;Transports </h2><br><br><p> 
								<?=nl2br(stripslashes($data_d["transport"]))?>
								<h3> <i class="fa fa-suitcase"></i>&nbsp;Options </h3>
								<?

									  $query2 = "SELECT * FROM fiche_junior_date WHERE rid_fiche = '".$data_d["id"]."' ORDER BY date_debut, date_fin";

									  $exec2 = mysql_query($query2) or die(mysql_error());
									  $tab_option = array();

									  while($data2 = mysql_fetch_assoc($exec2)){

										  if(!in_array($data2["rid_option_transport1"], $tab_option)){

											  $tab_option[] = $data2["rid_option_transport1"];

										  }

										  if(!in_array($data2["rid_option_transport2"], $tab_option)){

											  $tab_option[] = $data2["rid_option_transport2"];
										  }

										  if(!in_array($data2["rid_option_transport3"], $tab_option)){

											  $tab_option[] = $data2["rid_option_transport3"];
										  }

									  }

									  

									  for($i=0 ; $i<count($tab_option) ; $i++){

										  $query3 = "SELECT * FROM junior_option_transport WHERE id = '".$tab_option[$i]."'";
										  $exec3 = mysql_query($query3) or die(mysql_error());
										  $data3 = mysql_fetch_assoc($exec3);
										  ?>
										  
										  
										  <? if (($data3["id"]) != 0 ) 
										 {?>										  
										  
										 <div class="accordion-trigger"><?=stripslashes($data3["nom"])?>
										 <? if (($data3["id"]) == 5 ) 
										 {
										  echo "une gare parisienne";
										  }
										  
										  else if (($data3["id"]) == 1 )
										  {
											 echo "Lyon ou Marseille";
										  }
										  
										  else if (($data3["id"]) == 3 )
										  {
											 echo "une gare parisienne";
										  }
										  
										  else if (($data3["id"]) == 4 )
										  {
											 echo "Roissy CDG ou Orly";
										  }
										  
										   else if (($data3["id"]) == 2 )
										  {
											 echo "la province";
										  }
										  
										  ?>
										  <span><?=parsePrix($data3["prix"])?> €</span></div>
										 
										<div class="accordion-container">   
										  <p>
                                          <?=nl2br(stripslashes($data3["texte"]))?>
										  
										  </p></div>
										  
										 <? }  ?>
                                         

										  <?

									  }

									  ?>

														
									</div>	
                                </div>
                                <!--hébergements--> 
								<div id="tab4" class="tab_content"> 
									<div class="titles">	
									<h2><i class="fa fa-home"></i></i>&nbsp;Hébergements </h2><br><br>
								
								<?
										  for($i=1 ; $i<=5 ; $i++){
											  if($data_d["hebergement_nom".$i] != ""){
											  ?>
											  
										 
						<b><?=stripslashes($data_d["hebergement_nom".$i])?></b><br><br>		
						<?=nl2br(stripslashes($data_d["hebergement_texte".$i]))?><br>
						
							
											
											<?
											  }
										  }
										  ?>
									</div>
								</div>
								<!--Tab3 commnets-->      
                                <div id="tab5" class="tab_content">  
                                  
									<div class="titles">	
											
								   <h3>Le prix comprend </h3><br><br /><?=nl2br(stripslashes($data_d["prix_tout_compris"]))?>
<br>
                                   <h3>Le prix ne comprend pas </h3><br><br /><?=nl2br(stripslashes($data_d["prix_non_compris"]))?>
								   </div>
								</div>
                                                                                                   
									 
                              
                                <!--End Tab3 commnets--> 
								 <!--Tab6 Jobs-->      
                                <div id="tab6" class="tab_content">                                                            
                                  
									<div class="titles">					
								
									
										<h2><i class="fa fa-suitcase"></i>&nbsp;Cours</h2><br><br>
										
										  	<p><?=(stripslashes($data_d["cours"]))?></p>
										
										
										
										</div>   
								    </div>   
                                </div>
                                <!--End Tab2 Contact Agent--> 
								<!-- bloc reservation -->
								<div id="reservation">
								<h2>Inscription</h2>
								<table width="100%" border="0" cellpadding="1" cellspacing="0" class="table table-striped">
<?

									$query_date = "SELECT * FROM fiche_junior_date WHERE rid_fiche = '".addslashes($_GET["fiche"])."' AND afficher = '1' ORDER BY date_debut, date_fin";

									//echo $query_date."<br>";

									$exec_date = mysql_query($query_date) or die(mysql_error());

									while($data_date = mysql_fetch_assoc($exec_date)){

										?>

										<tr>

										  <td align="left" valign="top"> <strong>

									      <?=stripslashes($data_date["nom"])?>

                                          

                                          </strong></td>

										  <td align="left" valign="top"><? if($data_date["tarif"] != "0"){ ?>

                                          <strong> <?=parsePrix($data_date["tarif"])?>      €

                                          <? } ?></strong></td>

										  <td align="center" valign="top">

                                          <? if($data_date["stock"] > 0){ ?>

                                          <a href="devis_junior.php?fiche=<?=$_GET["fiche"]?>&date=<?=$data_date["id"]?>"><img src="images/btn_mettre_une_option.png" alt="mettre une option" border="0" /></a>

                                          <? } ?>

                                          </td>

                                          <td  align="center" valign="top">
                                          <? if($data_date["stock"] > 0){ ?>
                                          <a href="junior_reserver_sejour.php?fiche=<?=$_GET["fiche"]?>&date=<?=$data_date["id"]?>"><img src="images/fiche_junior_btn_reserver_sejour.png" border="0" /></a>
                                          <? } ?>

                                          <? if($data_date["stock"] <= 0){ ?>
                                          <b>COMPLET</b>
                                          <? }elseif($data_date["stock"] <= 5){ ?>

                                          <br />plus que <?=$data_date["stock"]?> place(s) disponible(s)
                                          <? } ?>

                                          </td>

										</tr>

										<?

									}

									?>
									</table>
								
                            </div> 
                            <!--END CONTAINER TABS-->
											
						
                        
						
						<!-- call to action bas --><br>
						<div class="row text-center">
                        <!-- Step 1 -->
                        <a href="step_1.html">
                          <div class="col-md-6 col-sm-3 col-xs-3">
                              <div class="thumbnail-process">
                                <div class="caption-head">
                                  <em class="caption-icon fa fa-phone icon-big"></em>                            
                                  <span class="titre caption-title">01 55 35 25 00</span>
                                </div>
                              </div>
                          </div>
                        </a>

                       

                        <!-- Step 3 -->
                        <div class="col-md-4 col-sm-3 col-xs-3">
                            <div class="thumbnail-process">
                              <div class="caption-head">
                                <a href="brochure_juniors.php"> <em class="caption-icon fa fa-book icon-big"></em>
                                   <span class="titre caption-title">Brochure</span></a>
                              </div>
                            </div>
                        </div>
						</div>
						<!-- fin call to action bas -->
						
						
						</div>
					
						<!-- Aside -->
						<? include("droite_juniors.php"); ?>                        
						
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					
            </section>
            <!-- End content info-->

 <? include("footer_juniors.php"); ?>          
			
