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

$fil_ariane .= "<a href='recherche.php' class='texteBleu'>Séjour Linguistique Adulte</a>";
$titre = "Séjour Linguistique Adulte";
if(isset($_GET["pays"]) && $_GET["pays"] != ""){
	$query2 = "SELECT * FROM pays WHERE id = '".addslashes($_GET["pays"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);
	$fil_ariane .= " / <a href='recherche.php?site=etudiant&pays=".$data2["id"]."' class='texteBleu'>".stripslashes($data2["nom"])."</a>";
	$titre .= " / ".stripslashes($data2["nom"])."";
}
if(isset($_GET["ville"]) && $_GET["ville"] != ""){
	$query2 = "SELECT v.*, p.id as idpays, p.nom as pays FROM ville v INNER JOIN pays p ON v.pays = p.id WHERE v.id = '".addslashes($_GET["ville"])."'";
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_assoc($exec2);
	$fil_ariane .= " / <a href='recherche.php?site=etudiant&pays=".$data2["idpays"]."&ville=".$data2["id"]."' class='texteBleu'>".stripslashes($data2["nom"])."</a>";
	$titre .= " / ".stripslashes($data2["nom"])."";
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
<? include("top_adultes.php"); ?>
           <!-- Section Title -->
            <div class="section_title features">
                <div class="container">
                    <div class="row"> 
						
                        <div class="col-md-10"><br>
                            <h1> Résultat de recherche</h1>
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
                                        <strong>Order By:</strong>
                                        <ul class="tooltip_hover">                            
                                            <li>
                                                <a href="#">Recent ads</a>
                                                <a href="#" data-toggle="tooltip" title data-original-title="Sort Ascending"><i class="fa fa-caret-up"></i></a>
                                                <a href="#" data-toggle="tooltip" title data-original-title="Sort Descending"><i class="fa fa-caret-down"></i></a>
                                            </li>
                                            <li>
                                              <a href="#">Price</a>
                                              <a href="#" data-toggle="tooltip" title data-original-title="Sort Ascending"><i class="fa fa-caret-up"></i></a>
                                              <a href="#" data-toggle="tooltip" title data-original-title="Sort Ascending"><i class="fa fa-caret-down"></i></a>
                                            </li>                            
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="text_right tooltip_hover">
										<!-- on prend les paramatres de l'url pour faire une autre recherche-->
										<?$params = $_SERVER['QUERY_STRING'];?>										
										<?$lien = "recherche.php?".$params;?>	
                                            <li class="active" data-toggle="tooltip" title data-original-title="Box"><a href="#"><i class="fa fa-th-large"></i></a></li>
                                            <li  data-toggle="tooltip" title data-original-title="Vue en liste"><a href="<?=$lien?>"><i class="fa fa-list"></i></a></li> 
                                        </ul>
                                    </div>
                                </div>
                            </div>
							<div class="row">
                            <!-- End Bar Filter properties-->
							<?
									$query = "SELECT fea.*, p.nom as pays, v.nom as ville FROM fiche_etudiant_adulte fea INNER JOIN pays p ON fea.pays = p.id INNER JOIN ville v ON fea.ville = v.id LEFT OUTER JOIN fiche_etudiant_adulte_hebergement feah ON fea.id = feah.fiche_etudiant_adulte LEFT OUTER JOIN fiche_etudiant_adulte_formule feaf ON fea.id = feaf.fiche_etudiant_adulte WHERE 1";
									if(isset($_GET["pays"]) && $_GET["pays"] != ""){
										$query .= " AND fea.pays = '".addslashes($_GET["pays"])."'";
									}
									if(isset($_GET["ville"]) && $_GET["ville"] != ""){
										$query .= " AND fea.ville = '".addslashes($_GET["ville"])."'";
									}
									if(isset($_GET["hebergement"]) && $_GET["hebergement"] != ""){
										$query .= " AND feah.hebergement = '".addslashes($_GET["hebergement"])."'";
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
									
									$i=0;
									while($data = mysql_fetch_assoc($exec))
									{
										$url = "sejour-linguistique-etudiant-adulte-".url_rewrite(trim(strtolower(stripslashes(stripslashes($data["nom"]))))).",".$data["id"].".html";
										if($i%3 == 0){
											?><tr><?
										}
										$i++;
									?>
                            <!-- item_property_h-->
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                  <div class="item_property">
                                      <div class="head_property">
                                        <a href="<?=$url?>">
                                         <? if(file_exists("imagesUp/fiche_etudiant/".$data["id"]."-1.jpg")){ ?>
                                          <img src="imagesUp/fiche_etudiant/<?=$data["id"]?>-1.jpg" border="0">
                                          <? }else{ ?>
                                          <img src="img/noimg.jpg"  height="180" border="0" >
                                          <? } ?>
                                          </a>
                                      </div>                        
                                      <div class="info_property">                                    
                                          <ul>
												 <li><strong><?=stripslashes($data["nom"])?></strong></li>
                                              <li class="resalt"><strong>Pays</strong><span><?=stripslashes($data["pays"])?></span></li>
                                              <li><strong>Ville  </strong><span><?=stripslashes($data["ville"])?></span></li>
											  <!-- recherche du prix famille le moins cher -->
											  <?
														  $query2 = "SELECT * FROM fiche_etudiant_adulte_tarif WHERE fiche_etudiant_adulte = '".$data["id"]."' ORDER BY prix_famille ASC LIMIT 1";
														  $exec2 = mysql_query($query2) or die(mysql_error());
														  while($data2 = mysql_fetch_assoc($exec2)){
															  ?>	
								
								 <li class="resalt">A partir de <?=stripslashes($data2["prix_famille"])?>€/semaine</li><?
                                          }
                                      
									  ?> 		
                                             
                                             
                                          </ul>                                    
                                      </div>
                                  </div>
                              </div>

                            <!-- End item_property_h-->
							<?
										
                                    }
									?>
                                                      
                        </div>
                            
                        </div>               
                        <!-- fin contenu -->
						<!-- Aside -->
						<? include("droite_adultes.php"); ?>                        
						
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					<div class="container"> 
					contenu bas pages sur toute largeur
          
					
                </div>
            </section>
            <!-- End content info-->

 <? include("footer.php"); ?>          
			
