<!DOCTYPE html>
<? include("connect.php"); ?>
<html lang="fr">
    <head>        
        <title>Bec séjours linguistiques Juniors - Réserver séjour - Erreur</title>  
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="BEC Séjour linguistiques - reserver un séjour junior">
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

<?
$requete = "SELECT r.*, d.nom as date, d.date_debut FROM reservation_junior r INNER JOIN fiche_junior_date d ON r.rid_date = d.id WHERE r.id = '".addslashes($_GET['id_reservation'])."'";
$result = mysql_query($requete) or die(mysql_error());
$row = mysql_fetch_array($result);

$id_reservation = $_GET['id_reservation'];

$query_dd = "SELECT * FROM fiche_junior_date WHERE id = '".$row['rid_date']."'";
$exec_dd = mysql_query($query_dd) or die(mysql_error());
$data_dd = mysql_fetch_assoc($exec_dd);
?>
<? include("top_juniors_cro.php"); ?>
<!-- Section Title -->
            <div class="section_title juniors">
                <div class="container">
                    <div class="row"> 
						
                        <div class="col-md-10"><br>
                            <h1> Réservation séjour juniors </h1>
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
                     <section class="row padding_top">
                        <!-- Properties -->
                        <div class="col-md-9">    


				
							
							
							<table cellpadding="0" cellspacing="0" width="100%">
                               
                                <tr height="350">
                                  <td valign="top" class="texteGris" align="left" style="text-align:justify">
                               
                                  La transaction a été annulée suite à un problème avec votre établissement bancaire ou vous n'êtes pas allé jusqu'à la fin de la procédure de paiement.<br /><br />
                                  <b>Votre compte n'a pas été débité.</b>
                                  <br /><br />
                                  <a href="junior_reserver_sejour.php?fiche=<?=$row["rid_fiche"]?>&date=<?=$row["rid_date"]?>&id_reservation=<?=$id_reservation?>" class="lienJaune">Cliquez ici</a> si vous souhaitez retourner à votre sélection pour choisir un autre mode de paiement ou utiliser une autre carte. 
                                  
                                  </td>
                                </tr>
                            </table></td>
                      	<!-- fin contenu -->
				   </div>              
						<!-- Aside -->
						<? include("droite_juniors_cro.php"); ?> 
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->				
					
            </section>
            <!-- End content info-->

 <? include("footer_juniors.php"); ?>          
			