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
<link media="screen" href="design.css" type="text/css" rel="stylesheet" />
<title>Voyage linguistique europe | organisation voyage scolaire</title>
<meta name="robots" content="index, follow" />
<meta name="keywords" content="voyage linguistique europe, S&eacute;jour Linguistique &agrave; Los Angeles, S&eacute;jour Linguistique &agrave; Dublin, S&eacute;jours Linguistiques Irlande, S&eacute;jours Linguistiques &agrave; Malte, cours de langues Angleterre, cours de langues &eacute;tranger, cours de langues Londres, cours de langues New York, immersion sejour linguistique famille, organisation voyage scolaire, organismes de s&eacute;jours linguistiques, s&eacute;jour linguistique ado, s&eacute;jour linguistique anglais pas cher, s&eacute;jours linguistiques." />
<meta name="description"  content="Vous cherchez &agrave; faire un voyage linguistique en Europe ? Bec France, les sp&eacute;cialistes des s&eacute;jours linguistiques." />
<meta name="google-site-verification" content="qvPWx5epK-HtyqffDAoAjrGzo8j-07ABulbzlRTUtB4" />
<link href="prettyPhoto/prettyPhoto.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="prettyPhoto/swfobject.js"></script>
<script type="text/javascript" src="prettyPhoto/jquery.js"></script>
<script type="text/javascript" src="prettyPhoto/jquery.prettyPhoto.js"></script>
<link href="voyage.css" rel="stylesheet" type="text/css" />
<link rel="canonical" href="http://www.becfrance.com/sejours/voyage-linguistique-europe.php" />
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
							
							<div class="bouton_bord_gauche"><img alt="voyage linguistique europe"  src="images/bouton_bord_gauche_rouge.png" /></div>
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
                                  <td style="padding-top:-50px;"><span style="font-size:10px; font-family:Arial,Helvetica,sans-serif;"><a href="http://www.becfrance.com" style="color:#666666; text-decoration:none; font-family:Arial,Helvetica,sans-serif;">Accueil</a> > <h1 class="h1visi">Voyage linguistique europe</h1></span></td>
                                </tr>
                                <tr>
                                  <td><h2 class="accroche">Faites un Voyage Linguistique en Europe avec le BEC
</h2></td>
                                </tr>
								<br /><br />
                                <tr>
									<td height="400" valign="top">
									
									<div class="redac">
                                      
									  
Allemagne, Italie, Espagne, Angleterre, Irlande, Malte... D&eacute;couvrez les diff&eacute;rentes destinations que propose le BEC pour effectuer votre <strong>Voyage Linguistique en Europe</strong>. Depuis plus de quarante ans, le British European Centre organise des s&eacute;jours linguistiques pour toutes les personnes souhaitant am&eacute;liorer leur niveau de langue. 
<br /><br />
Vivez un <em>Voyage Linguistique en Europe</em> avec le BEC ! Vous souhaitez organiser un <a href="sejours-scolaires-educatifs-rome.php">S&eacute;jour Scolaire Educatif &agrave; Rome</a> avec votre classe, faire un <a href="stage-linguistique-anglais.php">Stage Linguistique d'anglais</a> &agrave; Malte, am&eacute;liorer votre niveau d'espagnol en partant &agrave; Madrid ? D&eacute;couvrez toutes les possibilit&eacute;s qui vous sont offertes sur notre site Internet.
<br /><br />
Vous avez plus de 16 ans et souhaitez vivre une exp&eacute;rience professionnelle &agrave; l'&eacute;tranger ? Le BEC permet &agrave; toute personne d&eacute;sireuse d'apprendre une langue &eacute;trang&egrave;re d'effectuer un <strong>Voyage Linguistique en Europe</strong> de plusieurs semaines dans de nombreux secteurs d'activit&eacute; : tourisme, h&ocirc;tellerie, marketing, journalisme... Vous suivrez &eacute;galement des cours de langues personnalis&eacute;s pour &eacute;voluer rapidement et communiquer ais&eacute;ment avec votre entourage sur place...
<br /><br />
Nos &eacute;coles partenaires pour vos <a href="cours-de-langues-etranger.php">cours de langues &agrave; l'&eacute;tranger</a> sont situ&eacute;es dans des villes de grande ou moyenne taille, en Europe, aux Etats-Unis et sur des destinations plus lointaines. Cet &eacute;ventail de destinations, de par sa diversit&eacute;, pourra satisfaire les aspirations et int&eacute;r&ecirc;ts culturels de tout un chacun !
   
                                        
									</div>
									
									<br /><br />
									
									<div class="liensbas">Trouvez nous sur internet &agrave; partir de : 
<a href="sejours-scolaires-educatifs-angleterre.php">s&eacute;jours scolaires &eacute;ducatifs Angleterre</a>, 
<a href="voyage-linguistique-angleterre.php">voyage linguistique Angleterre</a>, 
<a href="sejour-linguistique-ado.php">s&eacute;jour linguistique ado</a>, 
<a href="sejours-linguistiques-anglais.php">s&eacute;jours linguistiques anglais</a>, 
<a href="stage-linguistique.php">stage linguistique</a>, 
<a href="sejours-scolaires-etranger.php">s&eacute;jours scolaires &eacute;tranger</a>, 
<a href="voyages-scolaires-londres.php">voyages scolaires Londres</a>, 
<a href="cours-de-langues-angleterre.php">cours de langues Angleterre</a>, 
<a href="sejours-linguistiques-adultes.php">s&eacute;jours linguistiques adultes</a>.</div>
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
