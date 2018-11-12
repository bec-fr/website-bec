<!DOCTYPE html>
<? include("connect.php"); ?>
<?
if(isset($_GET["pays"]) && $_GET["pays"] != ""){
	$pays_swf = $_GET["pays"];
}elseif(isset($_GET["ville"]) && $_GET["ville"] != ""){
	$query2 = "SELECT pays FROM ville WHERE id = '".addslashes($_GET["ville"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_row($exec2);
	$pays_swf = $data2[0];
}

$plus_link = "";
if(isset($_GET["tab"]) && $_GET["tab"] == "1"){
	$plus_link .= "&tab=1";
}

$fil_ariane .= "<a href='sejours-linguistiques-pour-etudiants-adultes.html' class='texteBleu'>Séjour Linguistique Adulte</a>";
$titre = "Séjour Linguistique Adulte";
if(isset($_GET["pays"]) && $_GET["pays"] != ""){
	$query2 = "SELECT * FROM pays WHERE id = '".addslashes($_GET["pays"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);
	$fil_ariane .= "  / <a href='recherche.php?site=etudiant&pays=".$data2["id"]."' class='texteBleu'>".stripslashes($data2["nom"])."</a>";
	$titre .= " / ".stripslashes($data2["nom"])."";
	$texte = ($data2["texte"]);
	$image = ($data2["image"]);
	$description = ($data2["description"]);
	$visas = ($data2["visas"]);
	$lat = ($data2["lat"]);
	$lng = ($data2["lng"]);
}
?>

<script>
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
<html lang="fr">
    <head>   
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
        <title>Séjours linguistiques <?=stripslashes($data2["nom"])?> - BEC Séjours linguistiques</title> 
        
        <meta name="description" content="<?=($description)?>">
        <meta name="author" content="BEC Séjours linguistiques">  
        
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">
        <!-- Your styles -->
        <link href="css/style.css" rel="stylesheet" media="screen"> 
		<style type="text/css">  
   #map{
  display: block;
  width: 95%;
  height: 350px;
  margin: 0 auto;
  -moz-box-shadow: 0px 5px 20px #ccc;
  -webkit-box-shadow: 0px 5px 20px #ccc;
  box-shadow: 0px 5px 20px #ccc;
}
 </style>	

        <!-- Skins Theme -->
        <link href="#" rel="stylesheet" media="screen" class="skin">

        <!-- Favicons -->
        <link rel="shortcut icon" href="img/icons/favicon.ico">       

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
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<script type="text/javascript" src="js/gmaps.min.js"></script>		
		
    </head>
<? include("top_adultes.php"); ?>
           <!-- Section Title -->
            <div class="section_title features">
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
						<h1>Séjours linguistiques <?=stripslashes($data2["nom"])?></h1>
							  <div class="row">
                              <div class="col-md-5"> 
										<img class="img-responsive" align="right" hspace="5" alt="<?=stripslashes($data2["nom"])?>" src="img/pays/<?=stripslashes($data2["image"])?>">		
                                </div>
								<div class="col-md-7"><?=stripslashes($data2["texte"])?></div>								
                            </div>
                            <br><br>
							<ul class="tabs"> 
                                <li><a href="#tab1">Ecoles partenaires <?=stripslashes($data2["nom"])?></a></li> 
								
								<? if($visas!= "") {?>								
								<li><a href="#tab2">Visas</a></li>
								<?}?>
                                                                        
                            </ul>    
							 <!--CONTAINER TABS-->   
                            <div class="tab_container"> 
                                <!--Tab1 Genral info-->      
                                <div id="tab1" class="tab_content">	
							
                            <!-- End Bar Filter properties-->							
							
							<div class="row">
														<?
									$query = "SELECT fea.*, p.nom as pays, v.nom as ville FROM fiche_etudiant_adulte fea INNER JOIN pays p ON fea.pays = p.id INNER JOIN ville v ON fea.ville = v.id LEFT OUTER JOIN fiche_etudiant_adulte_hebergement feah ON fea.id = feah.fiche_etudiant_adulte LEFT OUTER JOIN fiche_etudiant_adulte_formule feaf ON fea.id = feaf.fiche_etudiant_adulte WHERE 1";
									if(isset($_GET["pays"]) && $_GET["pays"] != ""){
										$query .= " AND fea.pays = '".addslashes($_GET["pays"])."'";
									}
									if(isset($_GET["ville"]) && $_GET["ville"] != ""){
										$query .= " AND fea.ville = '".addslashes($_GET["ville"])."'";
									}
									
									
									$query .= " GROUP BY fea.id ORDER BY p.nom, v.nom, fea.nom";
									//echo $query;
									$exec = mysql_query($query) or die(mysql_error());
									$nb = mysql_num_rows($exec);
									if ($nb > 0)
									{ 
									$i=0;
									while($data = mysql_fetch_assoc($exec))
									{
										$url = "sejour-linguistique-etudiant-adulte-".url_rewrite(trim(strtolower(stripslashes(stripslashes($data["nom"]))))).",".$data["id"].".html";
										if($i%3 == 0){
											?>
											<?
										}
										$i++;
									?>
                            <!-- item_property_h-->
							
							
							
							
                        <!-- Item Property-->
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="item_property">
                                <div class="head_property">
                                    <a href="properties.html">                                     
                                      <? if(file_exists("imagesUp/fiche_etudiant/".$data["id"]."-1.jpg")){ ?>
                                          <img src="imagesUp/fiche_etudiant/<?=$data["id"]?>-1.jpg" border="0">
                                          <? }else{ ?>
                                          <img src="img/noimg.jpg"  height="180" border="0" >
                                          <? } ?> <h3><?=stripslashes($data["ville"])?></h3>        
                                            <a href="<?=$url?>" class="info_hover_property_h">
                                    
                                    </a>
                                </div>                        
                                <div class="info_property">                                  
                                    <ul>
										<li> <h4><a href="<?=$url?>"><?=stripslashes($data["nom"])?></a></h4></li>
                                        <li>
                                        <?
														  $query2 = "SELECT * FROM fiche_etudiant_adulte_tarif WHERE fiche_etudiant_adulte = '".$data["id"]."' ORDER BY prix_famille ASC LIMIT 1";
														  $exec2 = mysql_query($query2) or die(mysql_error());
														  while($data2 = mysql_fetch_assoc($exec2)){
															 // recupération de la devise
								$query4 = "SELECT symbole,taux FROM devise dev INNER JOIN fiche_etudiant_adulte fea ON fea.devise = dev.id  WHERE fea.id = '".$data["id"]."'";
								$exec4 = mysql_query($query4) or die(mysql_error());
								$data4 = mysql_fetch_assoc($exec4);
										{
										$symbole =($data4["symbole"]);
										$taux = ($data4["taux"]);
										/* if ($symbole !="€")
											{											
											$taux = $taux + 0.02;	
											} */
										}
								 ?>	
								Cours + hébergement  <b><br>à partir de 
								<? $prix_devises = stripslashes($data2["prix_famille"]);
								 $prix_devises = round($prix_devises * $taux,0) ;														
								 ?>
									  <?=$prix_devises ?>€ par semaine</b><?
                                          }                                      
									  ?> 	
</li>									  
                                    </ul>                                 
                                </div>
                            </div>
                        </div>
                        <!-- Item Property-->
	
                            
                            <!-- End item_property_h-->
							<?
										
                                    }
									?>
                                                      
                        <?}else{ 
echo 'Aucun résultat ne correspond à votre recherche avec ces critères.<br> Nous vous invitons à effectuer une autre recherche de séjour ' ;
} ?>
							
							</div>						
								
							<h2>Offres spéciales <?=stripslashes($data2["nom"])?></h2>
							
							<!-- offres speciales par pays --> 
                        <?
														  $query3 = "SELECT * FROM promo_adultes  WHERE afficher ='1' AND pays= '".($_GET["pays"])."' ";
														  $exec3 = mysql_query($query3) or die(mysql_error());
														  while($data3 = mysql_fetch_assoc($exec3)){
															  ?>
														  
													  <div class="accordion-trigger">
													 	<?=stripslashes($data3["titre"])?>												 			 
													</div>	  <? $id_image = stripslashes($data3["id"])?>															
														<div class="accordion-container">
							<article class="item_property_h"  class="col-md-4 col-sm-5">
                                <div class="col-md-4 hidden-xs">
                                    <div class="image_property_h">                            
                                        <div class="hover_property_h">                                           
										  <img class="img-responsive" src="imagesUp/promos/<?=$id_image?>_c.jpg" border="0">						                                                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="info_property_h"><?=stripslashes($data3["description"])?></p></div>
                                </div>                                
                            </article>
                            <!-- End item_property_h-->	
                              </div>														                 
													  
													  <?
														  }
														  ?>	
								
							
							
						<h2>Carte des écoles <?=stripslashes($data2["nom"])?></h2>
						 <script type="text/javascript" src="js/jquery.min.js"></script>
						<script type="text/javascript">
    var map;
    $(document).ready(function(){
      map = new GMaps({
        el: '#map',
		zoom : 4,
        lat: <?=($lat)?>,
        lng: <?=($lng)?>
      });  	  
	  
	  <?
									$query = "SELECT fea.*, p.nom as pays, v.nom as ville FROM fiche_etudiant_adulte fea INNER JOIN pays p ON fea.pays = p.id INNER JOIN ville v ON fea.ville = v.id LEFT OUTER JOIN fiche_etudiant_adulte_hebergement feah ON fea.id = feah.fiche_etudiant_adulte LEFT OUTER JOIN fiche_etudiant_adulte_formule feaf ON fea.id = feaf.fiche_etudiant_adulte WHERE 1";									
									$query .= " AND fea.pays = '".addslashes($_GET["pays"])."'";															
									$query .= " GROUP BY fea.id ORDER BY p.nom, v.nom, fea.nom";
									//echo $query;
									$exec = mysql_query($query) or die(mysql_error());
									$nb = mysql_num_rows($exec);
									if ($nb > 0)
									{ 
									$i=0;
									while($data = mysql_fetch_assoc($exec))
									{
										$url = "sejour-linguistique-etudiant-adulte-".url_rewrite(trim(strtolower(stripslashes(stripslashes($data["nom"]))))).",".$data["id"].".html";
										$lat = ($data["lat"]);
										$lng = ($data["lng"]);
										if($i%3 == 0){
											?>
											<?
										}
										$i++;
									?>
	  
      map.addMarker({
        lat: <?=($lat)?>,
        lng: <?=$lng?>,
        title: '<?=$data["nom"]?>',
        infoWindow: {
          content: '<p><b><?=$data["nom"]?></b><br><a href="<?=$url?>">Découvrir cette école</a></p>'
        }
      });
	   <?
														  }
														  }
														  //fin ecole;
														  ?>
	  
    });
  </script>	
						  <div id="map"></div>
						  
						  
						</div>
                                                                                                   
									 
                             
                          
								 <!--Tab2 Jobs-->      
                                <div id="tab2" class="tab_content">                                                             
                                  
								<?=stripslashes($visas)?>
								
							</div>	
						  
						  </div>
						  
						  
						  
						  
						  
						  
						</div>  
                        <!-- fin contenu -->
						<!-- Aside -->
						<? include("droite_adultes.php"); ?>                        
						
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					
            </section>
            <!-- End content info-->

 <? include("footer.php"); ?>          
			
