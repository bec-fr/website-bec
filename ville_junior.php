<!DOCTYPE html>
<? include("connect.php"); ?>
<?

if(isset($_GET["pays"]) && $_GET["pays"] != ""){

	$pays_swf = $_GET["pays"];
}elseif(isset($_GET["ville"]) && $_GET["ville"] != ""){

	$query2 = "SELECT pays FROM junior_ville WHERE id = '".addslashes($_GET["ville"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_row($exec2);
	$pays_swf = $data2[0];

}



$plus_link = "";

if(isset($_GET["tab"]) && $_GET["tab"] == "1"){
	$plus_link .= "&tab=1";

}


$fil_ariane .= "<a href='recherche_junior.php' class='texteBleu'>S�jour Linguistique Adolescent</a>";
$titre = "S�jour Linguistique Adolescent";

if(isset($_GET["pays"]) && $_GET["pays"] != ""){

	$query2 = "SELECT * FROM junior_pays WHERE id = '".addslashes($_GET["pays"])."'";

	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);

	$fil_ariane .= " / <a href='recherche_junior.php?site=junior&pays=".$data2["id"]."' class='texteBleu'>".stripslashes($data2["nom"])."</a>";
	$titre .= " / ".stripslashes($data2["nom"])."";

}

if(isset($_GET["ville"]) && $_GET["ville"] != ""){

	$query2 = "SELECT v.*, p.id as idpays, p.nom as pays FROM junior_ville v INNER JOIN junior_pays p ON v.pays = p.id WHERE v.id = '".addslashes($_GET["ville"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);
	$fil_ariane .= " / <a href='recherche_junior.php?site=junior&pays=".$data2["idpays"]."&ville=".$data2["id"]."' class='texteBleu'>".stripslashes($data2["nom"])."</a>";
	$titre .= " / ".stripslashes($data2["nom"])."";

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
		<meta charset="ISO-8859-15" />
        <title>Bec s�jours linguistiques ados <?=($data2["nom"])?></title>  
        <meta name="keywords" content="Sejour linguistique junior,<?=stripslashes($data2["nom"])?>" />
        <meta name="description" content="Le BEC vous propose des s�jours linguistiques <?=stripslashes($data2["nom"])?> pour adolescents.">
        <meta name="author" content="bec s�jours linguistiques">  
        
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
                             <h1>S�jours linguistiques ados <?=($data2["nom"])?></h1>
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
										<? $lien = "recherche_junior2.php?".$params;?>									
										
                                            <li data-toggle="tooltip" title data-original-title="Resultats d�taill�s"><a href="<?=$lien?>"><i class="fa fa-th-large"></i></a></li>
                                            <li class="active"  data-toggle="tooltip" title data-original-title="Mode liste"><a href="#"><i class="fa fa-list"></i></a></li> 
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Bar Filter properties-->
				
									
							
							<?

								  $query = "SELECT fj.*, p.nom as pays, v.nom as ville FROM fiche_junior fj INNER JOIN junior_pays p ON fj.pays = p.id INNER JOIN junior_ville v ON fj.ville = v.id LEFT OUTER JOIN fiche_junior_hebergement fjh ON fj.id = fjh.fiche_junior LEFT OUTER JOIN fiche_junior_formule fjf ON fj.id = fjf.fiche_junior WHERE fj.afficher = '1'";

								  if(isset($_GET["pays"]) && $_GET["pays"] != ""){
									  $query .= " AND fj.pays = '".addslashes($_GET["pays"])."'";
									  $plus_link .= "&pays=".$_GET["pays"];
								  }

								  if(isset($_GET["ville"]) && $_GET["ville"] != ""){
									  $query .= " AND fj.ville = '".addslashes($_GET["ville"])."'";
									  $plus_link .= "&ville=".$_GET["ville"];
								  }

								  if(isset($_GET["langue"]) && $_GET["langue"] != ""){
									  $query .= " AND fj.langue = '".addslashes($_GET["langue"])."'";
									  $plus_link .= "&langue=".$_GET["langue"];
								  }

								  if(isset($_GET["hebergement"]) && $_GET["hebergement"] != ""){
									  $query .= " AND fjh.hebergement = '".addslashes($_GET["hebergement"])."'";
									  $plus_link .= "&hebergement=".$_GET["hebergement"];
								  }

								  if(isset($_GET["formule"]) && $_GET["formule"] != ""){
									  $query .= " AND fjf.formule = '".addslashes($_GET["formule"])."'";
									  $plus_link .= "&formule=".$_GET["formule"];
								  }

								  if(isset($_GET["age_mini"]) && $_GET["age_mini"] != ""){
									  $query .= " AND fj.id IN (SELECT fiche_junior FROM fiche_junior_classe fjc, classe c WHERE fjc.classe = c.id AND (age_mini >= '".addslashes($_GET["age_mini"])."' OR age_mini >= '".addslashes($_GET["age_mini"])."'))";
									  $plus_link .= "&age_mini=".$_GET["age_mini"];
								  }

								  if(isset($_GET["age_maxi"]) && $_GET["age_maxi"] != ""){
									  $query .= " AND fj.id IN (SELECT fiche_junior FROM fiche_junior_classe fjc, classe c WHERE fjc.classe = c.id AND (age_maxi <= '".addslashes($_GET["age_mini"])."' OR age_maxi <= '".addslashes($_GET["age_maxi"])."'))";
									  $plus_link .= "&age_maxi=".$_GET["age_maxi"];
								  }

								  if(isset($_GET["date_depart"]) && $_GET["date_depart"] != ""){
									  $query .= " AND fj.id IN (SELECT rid_fiche FROM fiche_junior_date WHERE date_debut >= '".addslashes($_GET["date_depart"])."')";
									  $plus_link .= "&date_depart=".$_GET["date_depart"];

								  }

								  if(isset($_GET["id_date"]) && $_GET["id_date"] != ""){
									  $query2 = "SELECT * FROM fiche_junior_date WHERE id = '".addslashes($_GET["id_date"])."'";
									  $exec2 = mysql_query($query2) or die(mysql_error());
									  $data2 = mysql_fetch_assoc($exec2);

									  

									  //$query .= " AND fj.id IN (SELECT rid_fiche FROM fiche_junior_date WHERE date_debut >= '".addslashes($_GET["date_depart"])."')";
									  $query .= " AND fj.id IN (SELECT rid_fiche FROM fiche_junior_date WHERE date_debut = '".$data2["date_debut"]."' AND date_fin = '".$data2["date_fin"]."')";									  $plus_link .= "&id_date=".$_GET["id_date"];

								  }

								  $query .= " GROUP BY fj.id ORDER BY fj.complet ASC,p.nom, v.nom, fj.nom";
								  //echo $query;

								  $exec = mysql_query($query) or die(mysql_error());
								  $nb = mysql_num_rows($exec);
								  

								  $i=0;

								  while($data = mysql_fetch_assoc($exec))

								  {

									  $url = "sejour-linguistique-adolescent-".url_rewrite(trim(strtolower(stripslashes(stripslashes($data["ville"]." - ".$data["nom"]))))).",".$data["id"].".html";

									  if($i%3 == 0){

											?><tr><?

										}

										$i++;

									  ?>
                            <!-- item_property_h-->
                            <article class="item_property_h"  class="col-md-4">
                                <div class="col-md-4">
                                    <div class="image_property_h">                            
                                        <div class="hover_property_h">
                                           
											<? if(file_exists("imagesUp/fiche_junior/".$data["id"]."-1.jpg")){ ?>											
											
                                          <img src="imagesUp/fiche_junior/<?=$data["id"]?>-1.jpg" border="0">
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
                                        <h4><a href="<?=$url?>"><?=stripslashes($data["nom"])?></a></h4> 
										
										<?
$query2 = "SELECT f.nom FROM fiche_junior_formule fjf, formule_junior f WHERE fiche_junior = '".$data["id"]."' AND fjf.formule = f.id";
$exec2 = mysql_query($query2) or die(mysql_error());
$tab = array();
$i=1;
while($data2 = mysql_fetch_row($exec2)){
    $tab[] = " <strong>".stripslashes($data2[0])."|</strong> ";
    $i++;
}
?>
<?=implode(" ", $tab)?><br>
	<?$query_date = "SELECT * FROM fiche_junior_date WHERE rid_fiche = '".$data["id"]."' AND afficher = '1' ORDER BY date_debut, date_fin";							

									$exec_date = mysql_query($query_date) or die(mysql_error());
									while($data_date = mysql_fetch_assoc($exec_date)){

										?>									
										
									       <i class="fa fa-check"></i>&nbsp;<?=stripslashes($data_date["nom"])?>
												<strong>										
											<?if($data_date["stock"] > 5){
										  $txt_place = '<font style="color:#33b122">disponible</font>';
									  }elseif($data_date["stock"] > 0){
										  $txt_place = '<font style="color:orange">plus que '.$data_date["stock"].' places disponibles</font>';
									  }else{
										  $txt_place = 'complet';
									  }
											
										?>	
											<?=$txt_place?></strong><br>											
										   
										  <? } ?>
										  <? $description_courte=substr($data["description"], 0, 75) ;																

										$position_espace = strrpos($description_courte, " ");    
										$description_courte = substr($description_courte, 0, $position_espace);    
										// Ajout des "..."
										$description_courte = $description_courte."...";
										?>
                                        <!--<p><?=stripslashes($description_courte) ?><a href="<?=$url?>"><i class="fa fa-arrow-right"></i></a></p>-->
										
                                    </div>
                                </div>
                                <div class="line_property">
								
									
							<?
$tab_prix = array();
$tab_prix[] = $data["tarif"];
$query2 = "SELECT tarif FROM fiche_junior_date WHERE rid_fiche = '".$data["id"]."' AND tarif > '0'";
$exec2 = mysql_query($query2) or die(mysql_error());
while($data2 = mysql_fetch_row($exec2)){
	$tab_prix[] = $data2[0];
}
$prix_apartirde = min($tab_prix);
?>											 							 
								
									
								<span>A partir de  <?=parsePrix($prix_apartirde)?> �</span>
								<div align="right"><a style="color:#1E90FF" href="<?=$url?>"><i class="fa fa-arrow-right"></i> <b>D�couvrir le s�jour</b> </a>&nbsp;&nbsp;</div>
								
								</div>
                            </article>
                            <!-- End item_property_h-->
							<?
										
                                    }
									?>
                                                      
                       
                            
                        </div>               
                        <!-- fin contenu -->
						<!-- Aside -->
						<? include("droite_juniors.php"); ?>                        
						
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					
            </section>
            <!-- End content info-->

 <? include("footer_juniors.php"); ?>          
			
