<? include("connect.php"); ?>
<?
if(strpos($_SERVER['REQUEST_URI'],"index_minis")!=false){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: voyages-scolaires-et-circuits-linguistiques.html");
	exit();
}
	$site = "minis";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="inc/fonctions.js" type="text/javascript"></script>
<script src="pngfixall.js"></script>
<link media="screen" href="design.css" type="text/css" rel="stylesheet" />
<title>S&eacute;jours linguistiques anglais, voyage linguistique new york</title>
<meta name="robots" content="index, follow" />
<meta name="keywords" content="s&eacute;jours linguistiques anglais, S&eacute;jour Linguistique &agrave; Los Angeles, S&eacute;jour Linguistique &agrave; Dublin, S&eacute;jours Linguistiques Irlande, S&eacute;jours Linguistiques &agrave; Malte, cours de langues Angleterre, cours de langues &eacute;tranger, cours de langues Londres, cours de langues New York, immersion sejour linguistique famille, organisation voyage scolaire, organismes de s&eacute;jours linguistiques, s&eacute;jour linguistique ado, s&eacute;jour linguistique anglais pas cher." />
<meta name="description"  content="Vous cherchez &agrave; faire des s&eacute;jours linguistiques anglais ? Bec France, les sp&eacute;cialistes des s&eacute;jours linguistiques." />
<meta name="google-site-verification" content="qvPWx5epK-HtyqffDAoAjrGzo8j-07ABulbzlRTUtB4" />
<link href="prettyPhoto/prettyPhoto.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="prettyPhoto/swfobject.js"></script>
<script type="text/javascript" src="prettyPhoto/jquery.js"></script>
<script type="text/javascript" src="prettyPhoto/jquery.prettyPhoto.js"></script>
<link href="voyage.css" rel="stylesheet" type="text/css" />
<link rel="canonical" href="http://www.becfrance.com/sejours/sejours-linguistiques-anglais.php" />
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$("a[rel^='prettyPhoto']").prettyPhoto({
			animationSpeed: 'normal', /* fast/slow/normal */
			padding: 40, /* padding for each side of the picture */
			opacity: 0.7, /* Value betwee 0 and 1 */
			showTitle: true, /* true/false */
			allowresize: true, /* true/false */
			counter_separator_label: ' sur ', /* The separator for the gallery counter 1 "of" 2 */
			theme: 'dark_rounded', /* light_rounded / dark_rounded / light_square / dark_square */
			callback: function(){}
		});
	});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23572560-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<div id="haut" style="left:50%; margin-left:-535px;">
  <? include("haut_flash.php");?>
</div>
<table width="100%" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td style="background:url(../images/ciel.jpg); background-repeat:no-repeat; background-position:top center;"><table align="center" width="1050" cellpadding="0" cellspacing="0">
        <tr>
          <td height="20"></td>
        </tr>
        <tr>
          <td colspan="3" align="center"><img src="../images/haut.png" /></td>
        </tr>
        <tr>
          <td style="background:url(../images/ombre_gauche.png); background-position:right; background-repeat:repeat-y;" width="30"></td>
          <td width="990" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" align="center">
              <tr>
                <td width="795"><table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="250"></td>
                    </tr>
                    <tr>
                      <td style="background:url(../images/bandeGris.jpg); background-repeat:no-repeat; background-position:left" height="21" width="100%" class="texteBlanc" align="right">[ <a href="../qui.php" class="lienBlanc">QUI SOMMES-NOUS ?</a> ]&nbsp;&nbsp;&nbsp;[ <a href="../qualite.php" class="lienBlanc">QUALIT&Eacute;</a> ]&nbsp;&nbsp;&nbsp;[ <a href="../cgv_gene.php" class="lienBlanc">CONDITIONS G&Eacute;N&Eacute;RALES</a> ]&nbsp;&nbsp;&nbsp;[ <a href="../contact.php" class="lienBlanc">CONTACT</a> ]<img src="../images/ombreBandeGris.jpg" align="absmiddle" /></td>
                    </tr>
                    <? if($site == "junior"){ ?>
                    <tr>
                      <td style="background:url(../images/bande_junior.jpg); background-repeat:repeat; background-position:left" height="21" width="100%" class="texteBlanc" align="right">[ <a href="../prestation_junior.php" class="lienBlanc">PRESTATIONS</a> ]&nbsp;&nbsp;&nbsp;[ <a href="../reduction_junior.php" class="lienBlanc">REDUCTIONS</a> ]&nbsp;&nbsp;&nbsp;[ <a href="../avantage_junior.php" class="lienBlanc">AVANTAGES</a> ]&nbsp;&nbsp;&nbsp;[ <a href="../cgv_junior.php" class="lienBlanc">CONDITIONS PARTICULI&Egrave;RES</a> ]&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <? }elseif($site == "minis"){ ?>
                    <tr>
                      <td style="background:url(../images/bande_minis.jpg); background-repeat:repeat; background-position:left" height="21" width="100%" class="texteBlanc" align="right">[ <a href="../prestation_minis.php" class="lienBlanc">PRESTATIONS</a> ]&nbsp;&nbsp;&nbsp;[ <a href="../presentation_formules_minis.php" class="lienBlanc">PRESENTATION FORMULES</a> ]&nbsp;&nbsp;&nbsp;[ <a href="../avantage_minis.php" class="lienBlanc">AVANTAGES</a> ]&nbsp;&nbsp;&nbsp;[ <a href="../cgv_minis.php" class="lienBlanc">CONDITIONS PARTICULI&Egrave;RES</a> ]&nbsp;&nbsp;&nbsp;<? //(($site == "minis") ? '[ <a href="infos_tour.php" class="lienBlanc">INFORMATIONS TOURISTIQUES</a> ]&nbsp;&nbsp;&nbsp;' : '')?></td>
                    </tr>
                    <? }else{ ?>
                    <tr>
                      <td style="background:url(../images/bande.jpg); background-repeat:repeat; background-position:left" height="21" width="100%" class="texteBlanc" align="right">[ <a href="../stages_etudiants.php" class="lienBlanc">STAGES</a> ]&nbsp;&nbsp;[ <a href="../jobs_etudiants.php" class="lienBlanc">JOBS</a> ]&nbsp;&nbsp;[ <a href="../hebergement_etudiants.php" class="lienBlanc">HEBERGEMENT</a> ]&nbsp;&nbsp;[ <a href="../examens_etudiants.php" class="lienBlanc">EXAMENS</a> ]&nbsp;&nbsp;[ <a href="../cours_etudiants.php" class="lienBlanc">COURS</a> ]&nbsp;&nbsp;[ <a href="../informations_generales_etudiants.php" class="lienBlanc">INFORMATIONS GENERALES</a> ]&nbsp;&nbsp;[ <a href="../visas.php" class="lienBlanc">VISAS ET PASSEPORTS</a> ]&nbsp;&nbsp;[ <a href="../cgv.php" class="lienBlanc">CONDITIONS PARTICULI&Egrave;RES</a> ]&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <? } ?>
                    <? if(isset($fil_ariane) && $fil_ariane != ""){ ?>
                    <tr><td style="padding-top:5px; padding-left:5px;" class="texteBleu"><?=$fil_ariane?></td></tr>
                    <? } ?>
                    <tr>
                      <td style="background:url(../images/ombre_droite_c.png); background-position:right; background-repeat:repeat-y;">
                        <table width="100%" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="10"></td>
                          </tr>
                          <tr>
                            <td width="9"></td>
                            <td valign="center" width="300" style="margin:auto;">
							
							<div class="bouton_bord_gauche"><img alt="s&eacute;jours linguistiques anglais"  src="images/bouton_bord_gauche_rouge.png" /></div>
									<div class="bouton_centre_rouge"><a onclick="_gaq.push(['_trackPageview', '/track/boutonActionPageRef']);" href="http://www.becfrance.com/recherche_minis.php?site=&pays=1&ville=&formule=&hebergement=">&gt; Voir nos voyages scolaires</a></div>
									<div class="bouton_bord_droit"><img src="images/bouton_bord_droit_rouge.png" /></div>
									<br /><br />
									<div class="bouton_bord_gauche" ><img src="images/bouton_bord_gauche_violet.png" /></div>
									<div class="bouton_centre_violet"><a onclick="_gaq.push(['_trackPageview', '/track/boutonActionPageRef']);" href="http://www.becfrance.com/recherche.php?site=etudiant&pays=1&ville=&formule=&hebergement=&age_mini=&age_maxi=">&gt; Voir nos Stages Linguistiques <br /> pour Etudiants/Adultes</a></div>
									<div class="bouton_bord_droit"><img src="images/bouton_bord_droit_violet.png" /></div>
									<br /><br />
									<div class="bouton_bord_gauche"><img src="images/bouton_bord_gauche_jaune.png" /></div>
									<div class="bouton_centre_jaune"><a onclick="_gaq.push(['_trackPageview', '/track/boutonActionPageRef']);" href="http://www.becfrance.com/recherche_junior.php?site=junior&pays=1&ville=&formule=&hebergement=&age=">&gt; Voir nos S&eacute;jours Linguistiques <br />pour Juniors 12-17 ans</a></div>
									<div class="bouton_bord_droit"><img src="images/bouton_bord_droit_jaune.png" />
							</div><br /><br />
									
							</td>
                            <td width="10"></td>
							
							
							
							
                            <td width="480" valign="top" ><table cellpadding="0" cellspacing="0" width="480" style="margin-top:-25px;">
		                        <tr>
                                  <td style="padding-top:-50px;"><span style="font-size:10px; font-family:Arial,Helvetica,sans-serif;"><a href="http://www.becfrance.com" style="color:#666666; text-decoration:none; font-family:Arial,Helvetica,sans-serif;">Accueil</a> > <h1 class="h1visi">S&eacute;jours linguistiques anglais</h1></span></td>
                                </tr>
                                <tr>
                                  <td><h2 class="accroche">Vous d&eacute;sirez participer &agrave; des S&eacute;jours Linguistiques en anglais ? 
</h2></td>
                                </tr>
								<br /><br />
                                <tr>
									<td height="400" valign="top">
									
									<div class="redac">
                                      
									  
Depuis 1967, le BEC (British European Centre) est sp&eacute;cialis&eacute; dans l'organisation de <strong>S&eacute;jours Linguistiques en anglais</strong> (et autres langues) et Voyages Scolaires Educatifs. Notre m&eacute;tier, depuis de nombreuses ann&eacute;es maintenant, est d'associer l'apprentissages des langues au voyage.
<br /><br />
En nous choisissant, vous aurez le choix entre des S&eacute;jours Linguistiques Juniors, des S&eacute;jours en Immersion Totale, des <em>S&eacute;jours Linguistiques en anglais</em> par exemple avec Stages et Jobs &eacute;tudiants / adultes, et des voyages scolaires &eacute;ducatifs. Optez pour la qualit&eacute; ! Le BEC est membre de l'Office National de Garantie des S&eacute;jours et Stages Linguistiques. De plus, il s'engage sur les termes du Contrat Qualit&eacute; &eacute;labor&eacute; en collaboration avec des f&eacute;d&eacute;rations de parents d'&eacute;l&egrave;ves et des associations de consommateurs agr&eacute;&eacute;es.
<br /><br />
L'immersion dans un pays &eacute;tranger est le meilleur moyen d'apprendre une langue &eacute;trang&egrave;re. En proposant des s&eacute;jours linguistiques, le BEC vous permet d'am&eacute;liorer votre niveau d'anglais tout en d&eacute;couvrant la culture, les habitudes culinaires et les coutumes de ce pays. 
<br /><br />
Quels que soient votre &acirc;ge, vos besoins et objectifs, si vous recherchez un <a href="sejour-linguistique-anglais-pas-cher.php">s&eacute;jour linguistique en anglais pas cher</a>, des <a href="cours-de-langues-angleterre.php">cours de langues en Angleterre</a>, des <a href="sejours-scolaires-educatifs.php">s&eacute;jours scolaires &eacute;ducatifs</a>..., faites appel au BEC ! Le BEC est la solution qu'il vous faut ! D&eacute;couvrez sur notre site Internet toutes nos offres et pays de destination pour que votre d&eacute;sir d'apprendre et de voyager se r&eacute;alise !
   
                                        
									</div>
									
									<br /><br />
									
									<div class="liensbas">Sujets similaires : 
<a href="voyages-scolaires-italie.php">voyages scolaires italie</a>, 
<a href="voyages-scolaires-educatifs.php">voyages scolaires &eacute;ducatifs</a>, 
<a href="stage-linguistique.php">stage linguistique</a>, 
<a href="voyage-linguistique-usa-famille.php">voyage linguistique USA famille</a>, 
<a href="sejours-scolaires-educatifs-new-york.php">s&eacute;jours scolaires &eacute;ducatifs New York</a>, 
<a href="sejours-scolaires-londres.php">s&eacute;jours scolaires Londres</a>, 
<a href="voyages-scolaires-new-york.php">voyages scolaires New York</a>, 
<a href="stage-linguistique-usa.php">stage linguistique usa</a>, 
<a href="voyages-scolaires-educatifs-berlin.php">voyages scolaires &eacute;ducatifs berlin</a>.</div>
									</td>
                                </tr>
                              </table></td>
							  
							  
							  
                            <td width="9">&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
                <td width="195" valign="top"><? include("droite_".$site.".php"); ?></td>
              </tr>
            </table>
            <? include("bas.php"); ?>
