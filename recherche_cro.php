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
$titre = " ";
if(isset($_GET["pays"]) && $_GET["pays"] != ""){
	$query2 = "SELECT * FROM pays WHERE id = '".addslashes($_GET["pays"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);
	$fil_ariane .= "  / <a href='recherche.php?site=etudiant&pays=".$data2["id"]."' class='texteBleu'>".stripslashes($data2["nom"])."</a>";
	$titre .= "  ".stripslashes($data2["nom"])."";
}
if(isset($_GET["ville"]) && $_GET["ville"] != ""){
	$query2 = "SELECT v.*, p.id as idpays, p.nom as pays FROM ville v INNER JOIN pays p ON v.pays = p.id WHERE v.id = '".addslashes($_GET["ville"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);
	$fil_ariane .= " / <a href='recherche.php?site=etudiant&pays=".$data2["idpays"]."&ville=".$data2["id"]."' class='texteBleu'>".stripslashes($data2["nom"])."</a>";
	$titre .= "  ".stripslashes($data2["nom"])."";
}

if(isset($_GET["examen"]) && $_GET["examen"] != ""){
	$query2 = "SELECT * FROM examen exa  WHERE exa.id = '".addslashes($_GET["examen"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);	
	$titre .= " Préparation examen ".stripslashes($data2["nom"])."";
}

if(isset($_GET["formule"]) && $_GET["formule"] != ""){
	$query2 = "SELECT * FROM formule formu WHERE formu.id = '".addslashes($_GET["formule"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);	
	$titre .= " Formule ".stripslashes($data2["nom"])."";
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
        <title>Bec Séjours étudiants et adultes - trouver un séjour<?=($titre)?></title> 
       
        <meta name="description" content="Découvrez notre offres de séjours linguistiques pour adultes et étudiants en Angleterre, Etats Unis, Espagne, Australie ...<?=($titre)?>">
        <meta name="author" content="BEC Séjours linguistiques">
		<meta name="robots" content="noindex, follow">	
        
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
<? include("top_adultes_cro.php"); ?>
           <!-- Section Title -->
            <div class="section_title features">
                <div class="container">
                    <div class="row"> 
						
                        <div class="col-md-10"><br>
                            <h1>Nos Séjours linguistiques pour Adultes et Etudiants <? if(($titre != " ")) echo ' : '.$titre ?></h1>
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
                            <!-- Bar Filter properties-->
                            <div class="bar_properties">
                                <div class="row">
                                    <div class="col-md-8">
                                       
                                       
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="text_right tooltip_hover">
										<!-- on prend les paramatres de l'url pour faire une autre recherche-->
										<?$params = $_SERVER['QUERY_STRING'];?>										
										<? $lien = "recherche2.php?".$params;?>									
										
                                          
                                            <li class="active"  data-toggle="tooltip" title data-original-title="Liste"><a href="#"><i class="fa fa-list"></i></a></li> 
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Bar Filter properties-->
							<?
							
							// recupereation de la monnnaie
							

							
									$query = "SELECT fea.*, p.nom as pays, v.nom as ville FROM fiche_etudiant_adulte fea INNER JOIN pays p ON fea.pays = p.id INNER JOIN ville v ON fea.ville = v.id LEFT OUTER JOIN fiche_etudiant_adulte_hebergement feah ON fea.id = feah.fiche_etudiant_adulte LEFT OUTER JOIN fiche_etudiant_adulte_examen feae ON fea.id = feae.fiche_etudiant_adulte LEFT OUTER JOIN fiche_etudiant_adulte_formule feaf ON fea.id = feaf.fiche_etudiant_adulte WHERE 1";
									if(isset($_GET["pays"]) && $_GET["pays"] != ""){
										$query .= " AND fea.pays = '".addslashes($_GET["pays"])."'";
									}
									if(isset($_GET["ville"]) && $_GET["ville"] != ""){
										$query .= " AND fea.ville = '".addslashes($_GET["ville"])."'";
									}
									if(isset($_GET["hebergement"]) && $_GET["hebergement"] != ""){
										$query .= " AND feah.hebergement = '".addslashes($_GET["hebergement"])."'";
									}
									if(isset($_GET["examen"]) && $_GET["examen"] != ""){
										$query .= " AND feae.examen = '".addslashes($_GET["examen"])."'";
									}
									if(isset($_GET["formule"]) && $_GET["formule"] != ""){
										$query .= " AND feaf.formule = '".addslashes($_GET["formule"])."'";
									}
									if(isset($_GET["age"]) && $_GET["age"] != ""){
										$query .= " AND ((fea.age_mini <= '".addslashes($_GET["age"])."' AND age_mini2 = '1') OR age_mini2 = '0')";
									}
									if(isset($_GET["langue"]) && $_GET["langue"] != ""){
										$query .= " AND fea.langue = '".addslashes($_GET["langue"])."'";
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
										$url = "sejour-linguistique-etudiant-adulte-cro-".url_rewrite(trim(strtolower(stripslashes(stripslashes($data["nom"]))))).",".$data["id"].".html";
										if($i%3 == 0){
											?>
											<?
										}
										$i++;
									?>
                            <!-- item_property_h-->
                            <article class="item_property_h"  class="col-md-4">
                                <div class="col-md-4">
                                    <div class="image_property_h">                            
                                        <div class="hover_property_h">
                                           
											<? if(file_exists("imagesUp/fiche_etudiant/".$data["id"]."-1.jpg")){ ?>
                                          <img src="imagesUp/fiche_etudiant/<?=$data["id"]?>-1.jpg" border="0">
                                          <? }else{ ?>
                                          <img src="img/noimg.jpg"  height="180" border="0" >
                                          <? } ?>
                                            <a href="<?=$url?>" class="info_hover_property_h">
                                                <span class="listing-cover-plus">+</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="info_property_h">
                                        <h4><a href="<?=$url?>"><?=stripslashes($data["nom"])?></a><span> <?=stripslashes($data["ville"])?></span></h4> 
										<? $description_courte=substr($data["description"], 0, 240) ;																

										$position_espace = strrpos($description_courte, " ");    
										$description_courte = substr($description_courte, 0, $position_espace);    
										// Ajout des "..."
										$description_courte = $description_courte."...";
										?>
                                        <p><?=stripslashes($description_courte) ?><a href="<?=$url?>"><i class="fa fa-arrow-right"></i></a></p>
                                    </div>
                                </div>
                                <div class="line_property">
								
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
								<span>Cours + héberg. à partir de
								<? $prix_devises = stripslashes($data2["prix_famille"]);
								 $prix_devises = round($prix_devises * $taux,0) ;														
								 ?>
									  <?=$prix_devises ?>€ par semaine</span>
									  <div align="right"><a style="color:#c33de0" href="<?=$url?>"><i class="fa fa-arrow-right"></i><b>En Savoir plus </b>&nbsp;</a></div>
									  
									  <?
                                          }                                      
									  ?> 					
								
								
								</div>
                            </article>
                            <!-- End item_property_h-->
							<?
										
                                    }
									?>
                                                      
                        <?}else{ 
echo 'Aucun résultat ne correspond à votre recherche avec ces critères.<br> Nous vous invitons à effectuer une autre recherche de séjour ' ;
} ?>
                            
                        </div>               
                        <!-- fin contenu -->
						<!-- Aside -->
						<? include("droite_adultes_cro.php"); ?>                        
						
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					
            </section>
            <!-- End content info-->

 <? include("footer.php"); ?>          
			
