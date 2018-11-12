<? if(!isset($title) || $title==""){
	$title="Séjour linguistiques pour adultes, étudiants et adolescents - Voyages scolaires et circuits linguistiques";
}
$title.=" | Bec France";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="inc/fonctions.js" type="text/javascript"></script>
<script src="pngfixall.js"></script>
<title><?=$title?></title>
<meta name="google-site-verification" content="qvPWx5epK-HtyqffDAoAjrGzo8j-07ABulbzlRTUtB4" />
<meta property="og:title" content="<?=$title?>" />
<meta property="og:type" content="website" />
<meta property="og:image" content="<?=((isset($image_head) && $image_head != "") ? $image_head : "http://www.becfrance.com/images/logo.jpg")?>" />
<meta property="og:site_name" content="Bec France" />
<meta property="fb:admins" content="646853194" />
<meta itemprop="name" content="<?=$title?>">
<meta itemprop="description" content="">
<meta itemprop="image" content="<?=((isset($image_head) && $image_head != "") ? $image_head : "http://www.becfrance.com/images/logo.jpg")?>">
<link media="screen" href="design.css" type="text/css" rel="stylesheet">
<link href="prettyPhoto/prettyPhoto.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/jquery.alerts.css" rel="stylesheet" />
<link rel="Shortcut Icon" href="images/favicon.ico" />
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.0.0.js"></script>
<script type="text/javascript" src="prettyPhoto/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/jquery.alerts.js"></script>
<? /*<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$("a[rel^='prettyPhoto']").prettyPhoto({
			animationSpeed: 'normal',
			padding: 40,
			opacity: 0.7,
			showTitle: true,
			allowresize: true,
			counter_separator_label: ' sur ',
			theme: 'dark_rounded',
			callback: function(){}
		});
	});
</script>*/ ?>
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	$("a[rel^='prettyPhoto']").prettyPhoto({
		show_title: false,
		social_tools: false
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
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'fr'}
</script>
<script type="text/javascript">
function surligner(obj){
	obj.style.backgroundColor= "#edf6fb";
}
function desurligner(obj){
	obj.style.backgroundColor= "#ffffff";
}
</script>
</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1&appId=288802601138827";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="haut" style="left:50%; margin-left:-525px;">
<!--******************bandeau etudiant**********************-->
	<div class="bandeau_etudiant" style="display:<?=(($_SESSION["site"] == "etudiant") ? "" : "none")?>;">
	<div style="position:absolute; background:url(images/visu_bandeau_etudiantadultes.png); width:582px; height:320px; top:0; left:50%; margin-left:-169px;"></div>
    <? /*<a href="http://www.salon-office.com/" target="_blank" style="position:absolute; width:120px; height:600px; left:50%; margin-left:628px; margin-top:230px; text-decoration:none; background:#FFFFFF; border-radius:4px; padding:5px;"><span style="color:#0296d6; font-size:13px; font-weight:bold;">Retrouvez-nous au</span><br /><img src="images/banniere_120x600.png" width="120" height="600" /></a>*/ ?>
	<a href="index.php" style="float:left; margin-top:17px;"><img src="images/logo_bandeau.png" alt="Bec sejours linguistiques" width="296" height="222" border="0" /></a>
  	<div class="clear"></div>
  	<div class="menu_bandeau">
   	<a href="index_adulte.php" class="btn_etudiant_bandeau"><img src="images/fleche_menu_bandeau.png" width="12" height="33" border="0" style="margin-bottom:-12px; margin-top:-5px; margin-right:5px;" alt="" />ETUDIANTS/ADULTES</a>
    <a href="index_junior.php" class="btn_juniors_bandeau2">JUNIORS 12/19 ans</a>
    <a href="index_minis.php" class="btn_voyage_bandeau2">VOYAGES SCOLAIRES</a>
	</div>
    </div>
<!--******************bandeau juniors**********************-->
	<div class="bandeau_junior" style="display:<?=(($_SESSION["site"] == "junior") ? "" : "none")?>;">
	<div style="position:absolute; background:url(images/visu_bandeau_junior.png) bottom no-repeat; width:577px; height:320px; top:0; left:50%; margin-left:-164px;"></div>
    <? /*<a href="http://www.salon-office.com/" target="_blank" style="position:absolute; width:120px; height:600px; left:50%; margin-left:628px; margin-top:230px; text-decoration:none; background:#FFFFFF; border-radius:4px; padding:5px;"><span style="color:#0296d6; font-size:13px; font-weight:bold;">Retrouvez-nous au</span><br /><img src="images/banniere_120x600.png" width="120" height="600" /></a>*/ ?>
	<a href="index.php" style="float:left; margin-top:17px;"><img src="images/logo_bandeau.png" alt="Bec sejours linguistiques" width="296" height="222" border="0" /></a>
  	<div class="clear"></div>
  	<div class="menu_bandeau">
   	<a href="index_junior.php" class="btn_juniors_bandeau"><img src="images/fleche_menu_bandeau.png" width="12" height="33" border="0" style="margin-bottom:-12px; margin-top:-5px; margin-right:5px;" alt="" />JUNIORS 12/19 ans</a>
    <a href="index_adulte.php" class="btn_etudiant_bandeau2">ETUDIANTS/ADULTES</a>
    <a href="index_minis.php" class="btn_voyage_bandeau2">VOYAGES SCOLAIRES</a>
	</div>
    </div>
<!--******************bandeau voyage scolaire**********************-->
	<div class="bandeau_voyage" style="display:<?=(($_SESSION["site"] == "minis") ? "" : "none")?>;">
	<div style="position:absolute; background:url(images/visu_bandeau_voyagescolaire.png) bottom no-repeat; width:545px; height:320px; top:0; left:50%; margin-left:-132px;"></div>
    <? /*<a href="http://www.salon-office.com/" target="_blank" style="position:absolute; width:120px; height:600px; left:50%; margin-left:628px; margin-top:230px; text-decoration:none; background:#FFFFFF; border-radius:4px; padding:5px;"><span style="color:#0296d6; font-size:13px; font-weight:bold;">Retrouvez-nous au</span><br /><img src="images/banniere_120x600.png" width="120" height="600" /></a>*/ ?>
	<a href="index.php" style="float:left; margin-top:17px;"><img src="images/logo_bandeau.png" alt="Bec sejours linguistiques" width="296" height="222" border="0" /></a>
  	<div class="clear"></div>
  	<div class="menu_bandeau">
   	<a href="index_minis.php" class="btn_voyage_bandeau"><img src="images/fleche_menu_bandeau.png" width="12" height="33" border="0" style="margin-bottom:-12px; margin-top:-5px; margin-right:5px;" alt="" />VOYAGES SCOLAIRES</a>
    <a href="index_adulte.php" class="btn_etudiant_bandeau2">ETUDIANTS/ADULTES</a>
    <a href="index_junior.php" class="btn_juniors_bandeau2">JUNIORS 12/19 ans</a>
	</div>
    </div>
  <?php /*?><? include("haut_flash.php");?><?php */?>
</div>

<table width="100%" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td style="background:url(images/<?=(($fic_nom == "_junior") ? "ciel_junior" : "ciel")?>.jpg); background-repeat:no-repeat; background-position:top center;"><table align="center" width="1050" cellpadding="0" cellspacing="0">
        <tr>
          <td height="20"></td>
        </tr>
        <tr>
          <td colspan="3" align="center"><img src="images/haut.png" /></td>
        </tr>
        <tr>
          <td style="background:url(images/ombre_gauche.png); background-position:right; background-repeat:repeat-y;" width="30"></td>
          <td width="990" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" align="center">
              <tr>
                <td width="795" valign="top" style="padding-top:250px; background:url(images/ombre_droite_c.png); background-position:right; background-repeat:repeat-y;"><table width="100%" cellpadding="0" cellspacing="0">
                    <!--<tr>
                      <td height="250"></td>
                    </tr>-->
                    <tr>
                      <td style="background:url(images/bandeGris.jpg); background-repeat:no-repeat; background-position:left" height="21" width="100%" class="texteBlanc" align="right" valign="top">[ <a href="qui.php" class="lienBlanc">QUI SOMMES-NOUS ?</a> ]&nbsp;&nbsp;&nbsp;[ <a href="qualite.php" class="lienBlanc">QUALIT&Eacute;</a> ]&nbsp;&nbsp;&nbsp;[ <a href="cgv_gene.php" class="lienBlanc">CONDITIONS G&Eacute;N&Eacute;RALES</a> ]&nbsp;&nbsp;&nbsp;[ <a href="contact.php" class="lienBlanc">CONTACT</a> ]<img src="images/ombreBandeGris.jpg" align="absmiddle" /></td>
                    </tr>
                    <? if($site == "junior"){ ?>
                    <tr>
                      <td style="background:url(images/bande_junior.jpg); background-repeat:repeat; background-position:left" height="21" width="100%" class="texteBlanc" align="right">[ <a href="prestation_junior.php" class="lienBlanc">PRESTATIONS</a> ]&nbsp;&nbsp;&nbsp;[ <a href="reduction_junior.php" class="lienBlanc">REDUCTIONS</a> ]&nbsp;&nbsp;&nbsp;[ <a href="avantage_junior.php" class="lienBlanc">AVANTAGES</a> ]&nbsp;&nbsp;&nbsp;[ <a href="cgv_junior.php" class="lienBlanc">CONDITIONS PARTICULI&Egrave;RES</a> ]&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <? }elseif($site == "minis"){ ?>
                    <tr>
                      <td style="background:url(images/bande_minis.jpg); background-repeat:repeat; background-position:left" height="21" width="100%" class="texteBlanc" align="right">[ <a href="avantage_minis.php" class="lienBlanc">AVANTAGES</a> ]&nbsp;&nbsp;&nbsp;[ <a href="presentation_formules_minis.php" class="lienBlanc">PRESENTATION FORMULES</a> ]&nbsp;&nbsp;&nbsp;[ <a href="prestation_minis.php" class="lienBlanc">PRESTATIONS</a> ]&nbsp;&nbsp;&nbsp;[ <a href="assurance_minis.php" class="lienBlanc">ASSURANCES</a> ]&nbsp;&nbsp;&nbsp;[ <a href="cgv_minis.php" class="lienBlanc">CONDITIONS PARTICULI&Egrave;RES</a> ]&nbsp;&nbsp;&nbsp;<? //(($site == "minis") ? '[ <a href="infos_tour.php" class="lienBlanc">INFORMATIONS TOURISTIQUES</a> ]&nbsp;&nbsp;&nbsp;' : '')?></td>
                    </tr>
                    <? }else{ ?>
                    <tr>
                      <td style="background:url(images/bande.jpg); background-repeat:repeat; background-position:left" height="21" width="100%" class="texteBlanc" align="right">[ <a href="stages_etudiants.php" class="lienBlanc">STAGES</a> ]&nbsp;&nbsp;[ <a href="jobs_etudiants.php" class="lienBlanc">JOBS</a> ]&nbsp;&nbsp;[ <a href="hebergement_etudiants.php" class="lienBlanc">HEBERGEMENT</a> ]&nbsp;&nbsp;[ <a href="examens_etudiants.php" class="lienBlanc">EXAMENS</a> ]&nbsp;&nbsp;[ <a href="cours_etudiants.php" class="lienBlanc">COURS</a> ]&nbsp;&nbsp;[ <a href="informations_generales_etudiants.php" class="lienBlanc">INFOS GENERALES</a> ]&nbsp;&nbsp;[ <a href="visas.php" class="lienBlanc">VISAS ET PASSEPORTS</a> ]&nbsp;&nbsp;[ <a href="cgv.php" class="lienBlanc">CONDITIONS PARTICULI&Egrave;RES</a> ]&nbsp;</td>
                    </tr>
                    <? } ?>
                    <? if(isset($fil_ariane) && $fil_ariane != ""){ ?>
                    <tr><td style="padding-top:5px; padding-left:5px;" class="texteBleu"><?=$fil_ariane?></td></tr>
                    <? } ?>
                    <tr>
                      <td style="background:url(images/ombre_droite_c.png); background-position:right; background-repeat:repeat-y;" valign="top">