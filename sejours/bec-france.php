<? include("connect.php"); ?>
<?
if(strpos($_SERVER['REQUEST_URI'],"index_minis")!=false){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: voyages-scolaires-et-circuits-linguistiques.html");
	exit();
}
	$site = "junior";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="inc/fonctions.js" type="text/javascript"></script>
<script src="pngfixall.js"></script>
<link media="screen" href="design.css" type="text/css" rel="stylesheet">
<title>S&eacute;jours linguistiques > voyages scolaires > stage linguistique ado</title>
<meta name="description"  content="Vous cherchez &agrave; faire des s&eacute;jours et stages linguistiques ? Bec France, les sp&eacute;cialistes des s&eacute;jours linguistiques en immersion totale." />
<meta name="google-site-verification" content="qvPWx5epK-HtyqffDAoAjrGzo8j-07ABulbzlRTUtB4" />
<link href="prettyPhoto/prettyPhoto.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="prettyPhoto/swfobject.js"></script>
<script type="text/javascript" src="prettyPhoto/jquery.js"></script>
<script type="text/javascript" src="prettyPhoto/jquery.prettyPhoto.js"></script>
<link href="voyage.css" rel="stylesheet" type="text/css" />
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
							
							<div class="bouton_bord_gauche"><img src="images/bouton_bord_gauche_rouge.png" /></div>
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
							
							
							
							
                            <td width="480" valign="top" ><table cellpadding="0" cellspacing="0" width="470" style="margin-top:-25px;">
							
							
		                        <tr>
                                  <td style="padding-top:-50px;"><span style="font-size:10px; font-family:Arial,Helvetica,sans-serif;"><a href="http://www.becfrance.com" style="color:#666666; text-decoration:none; font-family:Arial,Helvetica,sans-serif;">Accueil</a> > <h1 class="h1visi">S&eacute;jours linguistiques</h1></span></td>
                                </tr>
                                <tr>
                                  <td><h2 class="accroche">BEC : organisme de r&eacute;f&eacute;rence pour tous s&eacute;jours linguistiques</h2></td>
                                </tr>
								<br /><br />
                                <tr>
									<td height="400" valign="top">
									
									<div class="redac">
                                      
									  
Optez pour le BEC (British European Centre) et d&eacute;couvrez une offre de qualit&eacute; pour vivre des <a href="stage-linguistique-londres.php">voyages linguistiques &agrave; Londres</a>, aux Etats-Unis, en Espagne, au Canada ou encore en Australie... Depuis plus de 40 ans, le BEC est sp&eacute;cialis&eacute; dans l'organisation de s&eacute;jours, <a href="stage-linguistique.php">stages linguistiques</a> et <a href="voyages-scolaires-educatifs-etranger.php">voyages scolaires &eacute;ducatifs &agrave; l'&eacute;tranger</a>, une longue exp&eacute;rience qui a d&eacute;j&agrave; s&eacute;duit des milliers de Français !
<br/><br/>
BEC propose de mettre &agrave; votre service son exp&eacute;rience en proposant 4 formules : <br/>
-	Les S&eacute;jours Linguistiques Juniors : <a href="sejour-linguistique-ado.php">s&eacute;jour linguistique pour ado</a> ( h&eacute;bergement en familles ou campus)<br/>
-	Les S&eacute;jours en Immersion Totale : <a href="sejours-linguistiques-adultes.php">s&eacute;jour linguistique pour adultes</a> et <a href="sejours-linguistiques-etudiants.php">s&eacute;jours linguistiques pour &eacute;tudiants</a> en individuel<br/>
-	Les S&eacute;jours Linguistiques Stages et Jobs Etudiants/Adultes : s&eacute;jours en individuel dans une &eacute;cole de langue partenaire avec possibilit&eacute; de Jobs et Stages en entreprises<br/>
-	Les <a href="voyages-scolaires-educatifs.php">Voyages Scolaires Educatifs</a> : <a href="sejours-scolaires-educatifs.php">s&eacute;jours scolaires &eacute;ducatifs</a> avec les professeurs <br/>
Choisissez par exemple d'effectuer un <a href="voyage-linguistique-londres.php">voyage linguistique &agrave; Londres</a>, un <a href="voyage-linguistique-usa.php">voyage linguistique aux USA</a>, un <a href="voyages-scolaires-berlin.php">voyage scolaire &agrave; Berlin</a>, un <a href="voyages-scolaires-educatifs-barcelone.php">voyage scolaire &eacute;ducatif &agrave; Barcelone</a>... <br/><br/>
<a href="voyage-linguistique-usa-adolescent.php">Voyage linguistique aux USA pour adolescent</a>, <a href="stage-linguistique.php">stage linguistique</a>, voyages scolaires... D&eacute;couvrez toutes les possibilit&eacute;s offertes par le BEC sur notre site Internet www.becfrance.com. 
   
                                        
									</div>
									
									<br /><br />
									
									<div class="liensbas">
									Autres mots cl&eacute;fs associ&eacute;s : <a href="cours-de-langues-angleterre.php">cours de langues angleterre</a>, 
<a href="cours-de-langues-etranger.php">cours de langues &eacute;tranger</a>, 
<a href="cours-de-langues-londres.php">cours de langues londres</a>, 
<a href="cours-de-langues-new-york.php">cours de langues new york</a>, 
<a href="immersion-sejour-linguistique-famille.php">immersion sejour linguistique famille</a>, 
<a href="organisation-voyage-scolaire.php">organisation voyage scolaire</a>, 
<a href="organismes-de-sejours-linguistiques.php">organismes de s&eacute;jours linguistiques</a>, 
<a href="sejour-linguistique-ado.php">s&eacute;jour linguistique ado</a>, 
<a href="sejour-linguistique-anglais-pas-cher.php">s&eacute;jour linguistique anglais pas cher</a>, 
<a href="sejours-linguistiques.php">s&eacute;jours linguistiques</a>, 
<a href="sejours-linguistiques-adultes.php">s&eacute;jours linguistiques adultes</a>, 
<a href="sejours-linguistiques-anglais.php">s&eacute;jours linguistiques anglais</a>, 
<a href="sejours-linguistiques-angleterre.php">s&eacute;jours linguistiques angleterre</a>, 
<a href="sejours-linguistiques-etudiants.php">s&eacute;jours linguistiques &eacute;tudiants</a>, 
<a href="sejours-linguistiques-immersion-totale.php">s&eacute;jours linguistiques immersion totale</a>, 
<a href="sejours-linguistiques-londres.php">s&eacute;jours linguistiques londres</a>, 
<a href="sejours-linguistiques-pas-cher.php">s&eacute;jours linguistiques pas cher</a>, 
<a href="sejours-linguistiques-professionnels.php">s&eacute;jours linguistiques professionnels</a>, 
<a href="sejours-linguistiques-usa.php">s&eacute;jours linguistiques usa</a>, 
<a href="sejours-scolaires-educatifs.php">s&eacute;jours scolaires &eacute;ducatifs</a>, 
<a href="sejours-scolaires-educatifs-angleterre.php">s&eacute;jours scolaires &eacute;ducatifs angleterre</a>, 
<a href="sejours-scolaires-educatifs-barcelone.php">s&eacute;jours scolaires &eacute;ducatifs barcelone</a>, 
<a href="sejours-scolaires-educatifs-berlin.php">s&eacute;jours scolaires &eacute;ducatifs berlin</a>, 
<a href="sejours-scolaires-educatifs-new-york.php">s&eacute;jours scolaires &eacute;ducatifs new york</a>, 
<a href="sejours-scolaires-educatifs-rome.php">s&eacute;jours scolaires &eacute;ducatifs rome</a>, 
<a href="sejours-scolaires-etranger.php">s&eacute;jours scolaires &eacute;tranger</a>, 
<a href="sejours-scolaires-londres.php">s&eacute;jours scolaires londres</a>, 

<a href="sejour-linguistique-a-dublin.php">s&eacute;jours linguistique &agrave; Dublin</a>, 
<a href="sejour-linguistique-a-los-angeles.php">s&eacute;jours linguistique &agrave; Los Angeles</a>, 
<a href="sejour-linguistique-a-new-york.php">s&eacute;jours linguistique &agrave; New York</a>, 
<a href="sejours-linguistiques-a-malte.php">s&eacute;jours linguistiques &agrave; Malte</a>, 
<a href="sejours-linguistiques-irlande.php">s&eacute;jours linguistiques Irlande</a>,

<a href="stage-linguistique.php">stage linguistique</a>, 
<a href="stage-linguistique-anglais.php">stage linguistique anglais</a>, 
<a href="stage-linguistique-londres.php">stage linguistique londres</a>, 
<a href="stage-linguistique-malte.php">stage linguistique malte</a>, 
<a href="stage-linguistique-new-york.php">stage linguistique new york</a>, 
<a href="stage-linguistique-pas-cher.php">stage linguistique pas cher</a>, 
<a href="stage-linguistique-usa.php">stage linguistique usa</a>, 
<a href="voyage-linguistique-angleterre.php">voyage linguistique angleterre</a>, 
<a href="voyage-linguistique-europe.php">voyage linguistique europe</a>, 
<a href="voyage-linguistique-londres.php">voyage linguistique londres</a>, 
<a href="voyage-linguistique-new-york.php">voyage linguistique new york</a>, 
<a href="voyage-linguistique-usa.php">voyage linguistique usa</a>, 
<a href="voyage-linguistique-usa-adolescent.php">voyage linguistique usa adolescent</a>, 
<a href="voyage-linguistique-usa-famille.php">voyage linguistique usa famille</a>, 
<a href="voyages-scolaires.php">voyages scolaires</a>, 
<a href="voyages-scolaires-angleterre.php">voyages scolaires angleterre</a>, 
<a href="voyages-scolaires-berlin.php">voyages scolaires berlin</a>, 
<a href="voyages-scolaires-educatifs.php">voyages scolaires &eacute;ducatifs</a>, 
<a href="voyages-scolaires-educatifs-angleterre.php">voyages scolaires &eacute;ducatifs angleterre</a>, 
<a href="voyages-scolaires-educatifs-barcelone.php">voyages scolaires &eacute;ducatifs barcelone</a>, 
<a href="voyages-scolaires-educatifs-berlin.php">voyages scolaires &eacute;ducatifs berlin</a>, 
<a href="voyages-scolaires-educatifs-etranger.php">voyages scolaires &eacute;ducatifs &eacute;tranger</a>, 
<a href="voyages-scolaires-educatifs-londres.php">voyages scolaires &eacute;ducatifs londres</a>, 
<a href="voyages-scolaires-educatifs-new-york.php">voyages scolaires &eacute;ducatifs new york</a>, 
<a href="voyages-scolaires-educatifs-paris.php">voyages scolaires &eacute;ducatifs paris</a>, 
<a href="voyages-scolaires-educatifs-rome.php">voyages scolaires &eacute;ducatifs rome</a>, 
<a href="voyages-scolaires-en-europe.php">voyages scolaires en europe</a>, 
<a href="voyages-scolaires-espagne.php">voyages scolaires espagne</a>, 
<a href="voyages-scolaires-etranger.php">voyages scolaires &eacute;tranger</a>, 
<a href="voyages-scolaires-italie.php">voyages scolaires italie</a>, 
<a href="voyages-scolaires-londres.php">voyages scolaires londres</a>, 
<a href="voyages-scolaires-new-york.php">voyages scolaires new york</a>, 
<a href="voyages-scolaires-usa.php">voyages scolaires usa</a>, <?php include ('include/view_back.php'); ?>
<div style="text-align:center;">
		<a style="text-decoration:none;" target="blank" href="https://fr-fr.facebook.com/becfrance">
			<img src="../img/facebook.png" />
		</a>
</div>
									</div>
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