<!DOCTYPE html><? include("connect.php"); ?><html lang="fr">    <head>                <title>Bec s�jours linguistiques Juniors - R�server s�jour - Merci pour votre r�servation</title>          <meta name="keywords" content="sejour linguistique" />        <meta name="description" content="BEC S�jour linguistiques - reserver un s�jour junior - merci d'avoir r�serv�">        <meta name="author" content="BEC sejours linguistiques">                  <!-- Mobile Metas -->        <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">        <!-- Your styles -->        <link href="css/style.css" rel="stylesheet" media="screen">          <!-- Skins Theme -->        <link href="#" rel="stylesheet" media="screen" class="skin">        <!-- Favicons -->        <link rel="shortcut icon" href="img/icons/favicon.ico">        <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">        <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">          <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->        <!--[if lt IE 9]>          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        <![endif]-->        <!-- styles for IE -->        <!--[if lte IE 8]>        <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />        <![endif]-->                <!-- Skins Changer-->        <script type="text/javascript" src="http://www.google.com/jsapi"></script>		    </head>

<?
$requete = "SELECT r.*, d.nom as date, d.date_debut FROM reservation_junior r INNER JOIN fiche_junior_date d ON r.rid_date = d.id WHERE r.id = '".addslashes($_GET['id_reservation'])."'";
$result = mysql_query($requete) or die(mysql_error());
$row = mysql_fetch_array($result);

$id_reservation = $_GET['id_reservation'];

$query_dd = "SELECT * FROM fiche_junior_date WHERE id = '".$row['rid_date']."'";
$exec_dd = mysql_query($query_dd) or die(mysql_error());
$data_dd = mysql_fetch_assoc($exec_dd);
?>

<? include("top_juniors_cro.php"); ?><!-- Section Title -->            <div class="section_title juniors">                <div class="container">                    <div class="row"> 						                        <div class="col-md-10"><br>                            <h1> R�servation s�jour juniors - merci pour votre r�servation </h1>                        </div> 						<div class="col-md-2"></div>						                    </div>                </div>                        </div>            <!-- End Section Title -->			<!-- End content info -->            <section class="content_info">	                <div class="container">					<!-- Newsletter Box -->                                      <div class="newsletter_box">                        <div class="container">                            <div class="row">                              <div class="col-md-9 titre"> 										<span><?=($fil_ariane)?></span>				                                </div>								                            </div>                        </div>                    </div>                     <section class="row padding_top">                        <!-- Properties -->                        <div class="col-md-9">    
                                    
                                    <? if($row["type_paiement"] == "5"){ ?>
                                    
                                    <?
                                    $limite = 30;
                                    $nb_jour = diff_date($data_dd["date_fin"], date("Y-m-d"));
                                    if($nb_jour < 30){
                                        $limite = $nb_jour-2;
                                    }
									?>
                                    
                                    Votre r�servation a bien &eacute;t&eacute; enregistr&eacute;e ce jour et le paiement de <?=parsePrix($row['acompte'])?> &euro; a bien &eacute;t&eacute; accept&eacute;.<br /><br />
                                    Nous vous remercions pour votre confiance et l�int�r�t port� � notre organisme.<br /><br />
                                    Pour valider d�finitivement cette inscription, nous vous prions de bien vouloir nous adresser, sous 7 jours par courrier ou par mail, un exemplaire du Bulletin d'inscription pr�-rempli, d�ment sign� par vos soins.<br /><br />
                                    <center><a href='bulletin-pdf.php?id=<?=$id_reservation?>' target='_blank'><img src='images/btn_telecharger_bulletin_inscription.png' border='0' alt='bulletin' /></a></center><br /><br />
                                    Nous vous rappelons que vous avez choisi de r�gler le solde de votre s�jour par CB. Ainsi, le solde de votre s�jour, soit <?=parsePrix($row['total']-$row['acompte'])?> �, sera automatiquement pr�lev� sur votre carte bancaire <?=$limite?> jours avant le d�part.<br /><br />
                                    Nous vous remercions de votre confiance et restons � votre disposition pour toute information compl�mentaire.
                                    <br /><br /><br />
                                    <center><strong>
                                    <?=$nom_site?>
                                    <br />
                                    <?=$adresse_site1?>
                                    <br />
                                    <?=$adresse_site2?>
                                    <br />
                                    <?=$pays_site?>
                                    <br />
                                    <?=$tel_site?>
                                    <br />
                                    </strong></center>
                                    <? }else{ ?>
                                    Votre r�servation a bien &eacute;t&eacute; enregistr&eacute;e ce jour et le paiement de <?=parsePrix($row['acompte'])?> &euro; a bien &eacute;t&eacute; accept&eacute;.<br /><br />
                                    Nous vous remercions pour votre confiance et l�int�r�t port� � notre organisme.<br /><br />
                                    <b>Pour valider d�finitivement cette inscription, nous vous prions de bien vouloir nous adresser, sous 7 jours par courrier ou par mail, un exemplaire du Bulletin d'inscription pr�-rempli, d�ment sign� par vos soins.</b><br /><br />
                                    <center><a href='bulletin-pdf.php?id=<?=$id_reservation?>' target='_blank'><img src='images/btn_telecharger_bulletin_inscription.png' border='0' alt='bulletin' /></a></center><br /><br />
                                    Nous vous rappelons que vous avez choisi de r�gler le solde de votre s�jour par ch�que. Ainsi, le ch�que de r�glement du solde de <?=parsePrix($row['total']-$row['acompte'])?> � doit nous parvenir au plus tard 45 jours avant le d�part.<br /><br />
                                    Dans cette attente, nous restons � votre disposition et vous prions d'agr�er, Madame, Monsieur, l'expression de nos sentiments les meilleurs.
                                    <br /><br /><br />
                                    <center><strong>
                                    <?=$nom_site?>
                                    <br />
                                    <?=$adresse_site1?>
                                    <br />
                                    <?=$adresse_site2?>
                                    <br />
                                    <?=$pays_site?>
                                    <br />
                                    <?=$tel_site?>
                                    <br />
                                    </strong></center>
                                    <? } ?>
                         <!-- fin contenu -->				   </div>              						<!-- Aside -->						<? //include("droite_juniors.php"); ?> 						                    </div>                     <!-- contenu bas pages sur toute largeur-->									            </section>            <!-- End content info--> <? include("footer_juniors.php"); ?>          			