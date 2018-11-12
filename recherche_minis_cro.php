<!DOCTYPE html>
<? include("connect.php"); ?>
<?
if(isset($_GET["pays"]) && $_GET["pays"] != ""){
	$pays_swf = $_GET["pays"];
}elseif(isset($_GET["ville"]) && $_GET["ville"] != ""){
	$query2 = "SELECT pays FROM minis_ville WHERE id = '".addslashes($_GET["ville"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_row($exec2);
	$pays_swf = $data2[0];
}

$plus_link = "";
if(isset($_GET["tab"]) && $_GET["tab"] == "1"){
	$plus_link .= "&tab=1";
}

$fil_ariane .= "<a href='recherche_minis.php' class='texteBleu'>Voyages scolaires</a>";
$titre = "Voyages scolaires";
if(isset($_GET["pays"]) && $_GET["pays"] != ""){
	$query2 = "SELECT * FROM minis_pays WHERE id = '".addslashes($_GET["pays"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);
	$fil_ariane .= " / <a href='recherche_minis.php?site=minis&pays=".$data2["id"]."' class='texteBleu'>".stripslashes($data2["nom"])."</a>";
	$titre .= " / ".stripslashes($data2["nom"])."";
	$resultat_recherche = stripslashes($data2["nom"]);
}

if(isset($_GET["ville"]) && $_GET["ville"] != ""){
	$query2 = "SELECT v.*, p.id as idpays, p.nom as pays FROM minis_ville v INNER JOIN minis_pays p ON v.pays = p.id WHERE v.id = '".addslashes($_GET["ville"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);
	$fil_ariane .= " / <a href='recherche_minis.php?site=minis&pays=".$data2["idpays"]."&ville=".$data2["id"]."' class='texteBleu'>".stripslashes($data2["nom"])."</a>";
	$titre .= " / ".stripslashes($data2["nom"])."";
	$resultat_recherche = stripslashes($data2["nom"]);
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
        <title>Voyages Scolaires <?=$resultat_recherche ?> - Bec séjours linguistiques </title>  
        <meta name="keywords" content="voyage scolaire linguistique,<?=$resultat_recherche ?>" />
        <meta name="description" content="Notre offre de voyages scolaires <?=$resultat_recherche ?>">
        <meta name="author" content="BEC séjours linguistiques"> 
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
<? include("top_scolaires_cro.php"); ?>
           <!-- Section Title -->
            <div class="section_title scolaires">
                <div class="container">
                    <div class="row"> 
						
                        <div class="col-md-10"><br>
                            <h1> Nos offres de voyages scolaires - <?=$resultat_recherche ?></h1>
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
                                  
                                  
							
							  
							   <!-- End Bar Filter properties-->
				
							<?

                                   if(isset($_GET["nb_pc"]))
								   {
								   $duree = $_GET["nb_pc"];//+3
									}
									
								  $query = "SELECT fm.*, p.nom as pays, v.nom as ville FROM fiche_minis fm INNER JOIN minis_pays p ON fm.pays = p.id INNER JOIN minis_ville v ON fm.ville = v.id LEFT OUTER JOIN fiche_minis_hebergement fmh ON fm.id = fmh.fiche_minis LEFT OUTER JOIN fiche_minis_formule fmf ON fm.id = fmf.fiche_minis WHERE fm.afficher = '1'";

								  if(isset($_GET["pays"]) && $_GET["pays"] != ""){

									  $query .= " AND fm.pays = '".addslashes($_GET["pays"])."'";
								  }

								  if(isset($_GET["ville"]) && $_GET["ville"] != ""){

									  $query .= " AND fm.ville = '".addslashes($_GET["ville"])."'";
								  }

								  if(isset($_GET["langue"]) && $_GET["langue"] != ""){

									  $query .= " AND fm.langue = '".addslashes($_GET["langue"])."'";
								  }

								  if(isset($_GET["hebergement"]) && $_GET["hebergement"] != ""){

									  $query .= " AND fmh.hebergement = '".addslashes($_GET["hebergement"])."'";
								  }

								  if(isset($_GET["formule"]) && $_GET["formule"] != ""){

									  $query .= " AND fmf.formule = '".addslashes($_GET["formule"])."'";
								  }

								  $query .= " GROUP BY fm.id ORDER BY p.nom, v.nom, fm.nom";

								  //echo $query."<br>";

								  $exec = mysql_query($query) or die(mysql_error());
								  $nb = mysql_num_rows($exec);

                                  if($nb == 0)
                                  {
                                    echo "Désolé, nous ne trouvons pas d'offre correspondant à tous vos critères. <br>
                                            Veuillez retirer des filtres et relancer une recherche";
                                  }

								  

								  $i=0;

								  while($data = mysql_fetch_assoc($exec))

								  {

									  $url = "voyage-scolaire-circuit-linguistique-cro-".url_rewrite(trim(strtolower(stripslashes(stripslashes($data["pays"]." - ".$data["ville"]))))).",".$data["id"].".html";

									  $aff = true;

									  if(isset($_GET["zone"]) && $_GET["zone"] != ""){

										  $query2 = "SELECT * FROM fiche_minis_tarif WHERE rid_fiche_minis = '".$data["id"]."' AND rid_zone = '".addslashes($_GET["zone"])."'";

										  if(isset($_GET["heb"]) && $_GET["heb"] != ""){

											  $query2 .= " AND rid_hebergement = '".addslashes($_GET["heb"])."'";

										  }

										  //echo $query2."<br>";

										  $exec2 = mysql_query($query2) or die(mysql_error());
										  if(mysql_num_rows($exec2) > 0){

											  $data2 = mysql_fetch_assoc($exec2);

											  

											  $query3 = "SELECT tarif FROM fiche_minis_tarif WHERE rid_fiche_minis = '".$data["id"]."' AND rid_zone = '25'";

											  if(isset($_GET["heb"]) && $_GET["heb"] != ""){

												  $query2 .= " AND rid_hebergement = '".addslashes($_GET["heb"])."'";

											  }

											  //echo $query3."<br>";

											  $exec3 = mysql_query($query3) or die(mysql_error());

											  $data3 = mysql_fetch_row($exec3);

											  

											  $total = $data2["tarif"] + $data3[0]*($duree-$data["tarif_nbjour_min"]);

											  //echo $total."<br>";

											  

											  if($total <= $_GET["budget_max"]){

												  $aff = true;

											  }else{

												  $aff = false;

											  }

											  

											  /*$query3 = "SELECT * FROM fiche_minis_tarif WHERE rid_fiche_minis = '".$data["id"]."' AND rid_zone = '".addslashes($_GET["zone"])."' AND tarif <> '0' AND tarif <= '".addslashes($_GET["budget_max"])."'";

											  echo $query3."<br>";

											  $exec3 = mysql_query($query3) or die(mysql_error());

											  if(mysql_num_rows($exec3) > 0){

												  $aff = true;

											  }else{

												  $aff = false;

											  }*/

										  }else{

											  $aff = true;

											 

										  }

									  }

									  

									  if($aff == true){

										  

										  ?>

                                         


							
							
							
							<!-- item_property_h-->
                            <article class="item_property_h"  class="col-md-4">
                                <div class="col-md-4">
                                    <div class="image_property_h">                            
                                        <div class="hover_property_h">
                                           
											<? if(file_exists("imagesUp/fiche_minis/".$data["id"]."-1.jpg")){ ?>
											
											
                                          <img src="imagesUp/fiche_minis/<?=$data["id"]?>-1.jpg" border="0">
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
                                        <h4><a href="<?=$url?>"><?=stripslashes($data["nom"])?></a><span> <?=stripslashes($data["pays"])?></span></h4> 
										
											
											<?=stripslashes($data["soustitre"])?>	<br><b>Formule(s) :</b>
											<?

                                        $query2 = "SELECT f.nom, f.description FROM fiche_minis_formule fmf, formule_minis f WHERE fiche_minis = '".$data["id"]."' AND fmf.formule = f.id";
										$exec2 = mysql_query($query2) or die(mysql_error());
										$tab = array();
										$i=1;

										while($data2 = mysql_fetch_row($exec2)){

											$tab[] = "$data2[0]";

											$i++;

										}

										?>
							
									<?=implode(", ", $tab)?>								
										
									
										<br><b>Hébergement :</b>
									<?

									  $query2 = "SELECT * FROM hebergement_minis WHERE id IN (SELECT hebergement FROM fiche_minis_hebergement fmh WHERE fmh.fiche_minis = '".$data["id"]."') ORDER BY nom";	

									  //echo $query2."<br>";

									  $exec2 = mysql_query($query2) or die(mysql_error());
									  if(mysql_num_rows($exec2) > 0){

									  ?>
									  
									  <?
									  while($data2 = mysql_fetch_assoc($exec2)){
									 ?>

										  <?=stripslashes($data2["nom"])?>
                                     
											<?
											}
											?>
										
										<?

									  }

									  ?>
										
										
                                    </div>
                                </div>
                                <div class="line_property">															
								
								<span>Séjour à partir de <?=minis_prix_a_partir_de($data["id"])?> €</span><a style="color:red" href="<?=$url?>"><i class="fa fa-arrow-right"></i> <b>Découvrir le séjour</b></a>
								 
								
								</div>
                            </article>
							 <? } ?> 	
                            <!-- End item_property_h-->
							<?
										
                                    }
									?>
                                                      
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  </div>               
                        <!-- fin contenu -->
						<!-- Aside -->
						<? include("droite_scolaires_cro.php"); ?>                        
						
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					
            </section>
            <!-- End content info-->

 <? include("footer_scolaires.php"); ?>     