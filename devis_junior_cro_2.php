<!DOCTYPE html><? include("connect.php"); ?>
<html lang="fr">    <head>    
            <title>Bec s�jours linguistiques Juniors - Poser une option</title> 
			 
			<meta name="description" content="BEC S�jour linguistiques - poser une option sur un s�jour 12-17 ans">  
			<meta name="author" content="BEC S�jours linguistiques">  
			<!-- Mobile Metas -->        <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1"> 
			<!-- Your styles -->        <link href="css/style.css" rel="stylesheet" media="screen">  
			<!-- Skins Theme -->        <link href="#" rel="stylesheet" media="screen" class="skin">    
			<!-- Favicons -->        <link rel="shortcut icon" href="img/icons/favicon.ico">        <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">    
			<link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">          <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->        <!--[if lt IE 9]>          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        <![endif]-->        <!-- styles for IE -->        <!--[if lte IE 8]>        <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />        <![endif]-->                <!-- Skins Changer-->        <script type="text/javascript" src="http://www.google.com/jsapi"></script>		    </head><? include("top_juniors_cro.php"); ?>
<script>
	function verifForm(){
		testm = false ;
		for (var j=1 ; j<(document.mail.mail.value.length) ; j++) {
			if (document.mail.mail.value.charAt(j)=='@') { 
				if (j<(document.mail.mail.value.length-4)){ 
					for (var k=j ; k<(document.mail.mail.value.length-2) ; k++) { 
						if (document.mail.mail.value.charAt(k)=='.') testm = true;
					} 
				} 
			} 
		}
		a="0";
		
		if (document.mail.nom.value.length == 0) {alert('Vous n\'avez pas indiqu� votre nom.'); a="1"; document.mail.nom.focus();}
		else if (document.mail.prenom.value.length == 0) {alert('Vous n\'avez pas indiqu� votre pr�nom.'); a="1"; document.mail.prenom.focus();}
		else if (document.mail.mail.value.length == 0) {alert('Vous n\'avez pas indiqu� votre adresse e-mail.'); a="1"; document.mail.mail.focus();}
		else if ((testm==false) && (document.mail.mail.value.length != 0)) {alert('Votre adresse e-mail est incorrecte.'); a="1"; document.mail.mail.focus();}
		
		if (a == 0) {
			document.mail.submit();
		}
	}
</script>

<link rel="stylesheet" type="text/css" href="./calendrier/calendrier.css" />
<script language='JavaScript' src='calendrier/browserSniffer.js'></script>
<script language='JavaScript' src='calendrier/dynCalendar.js'></script>
 <!-- Section Title -->            <div class="section_title juniors">                <div class="container">                    <div class="row"> 						                        <div class="col-md-10"><br>                            <h1> S�jour Juniors - Poser une option</h1>                        </div> 						<div class="col-md-2"></div>						                    </div>                </div>                        </div>            <!-- End Section Title -->			            <!-- End content info -->            <section class="content_info">	                <div class="container">					<!-- Newsletter Box -->                                      <div class="newsletter_box">                        <div class="container">                            <div class="row">                              <div class="col-md-9 titre"> 										<span><?=($fil_ariane)?></span>				                                </div>								                            </div>                        </div>                    </div>                    <!-- End Newsletter Box -->                                        <section class="row padding_top">                        <!-- Properties -->                        <div class="col-md-9">                            <!-- Contenu-->
                                  
<?
if(isset($_POST["ok"]) && $_POST["ok"] == 1){
	//$query = "UPDATE devis_junior SET nom = '".addslashes($_POST["nom"])."', prenom = '".addslashes($_POST["prenom"])."', datenaiss = '".addslashes($_POST['date_naiss_a']."-".$_POST['date_naiss_m']."-".$_POST['date_naiss_j'])."', adresse = '".addslashes($_POST["adresse"])."', cp = '".addslashes($_POST["cp"])."', ville = '".addslashes($_POST["ville"])."', tel = '".addslashes($_POST["tel"])."', mail = '".addslashes($_POST["mail"])."' WHERE id = '".addslashes($_GET["id"])."'";
	$query = "INSERT INTO devis_junior (destination, date, preacheminement, preacheminement_ville, accueil_paris, gare, ass_annulation, ass_interruption, total, datetime, nom, prenom, datenaiss, adresse, cp, ville, tel, mail) VALUES ('".addslashes($_SESSION["devis_destination"])."', '".addslashes($_SESSION["devis_date"])."', '".addslashes($_SESSION["devis_preacheminement"])."', '".addslashes($_SESSION["devis_preacheminement_ville"])."', '".addslashes($_SESSION["devis_accueil_paris"])."', '".addslashes($_SESSION["devis_gare"])."', '".addslashes($_SESSION["devis_ass_annulation"])."', '".addslashes($_SESSION["devis_ass_interruption"])."', '".addslashes($_SESSION["devis_total"])."', '".date("Y-m-d H:i:s")."', '".addslashes($_POST["nom"])."', '".addslashes($_POST["prenom"])."', '".addslashes($_POST['date_naiss_a']."-".$_POST['date_naiss_m']."-".$_POST['date_naiss_j'])."', '".addslashes($_POST["adresse"])."', '".addslashes($_POST["cp"])."', '".addslashes($_POST["ville"])."', '".addslashes($_POST["tel"])."', '".addslashes($_POST["mail"])."')";
	mysql_query($query) or die(mysql_error());
	
	envoi_mail($mail_site, "Devis depuis votre site Internet ".$url_site2, "Demande de devis depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le d�tail du devis junior.");
	
	if(isset($_POST["newsletter"]) && $_POST["newsletter"]=="1" && trim($_POST["mail"]) != ""){
		mysql_query("INSERT INTO mailing (mail, groupe) VALUES ('".addslashes($_POST["mail"])."', '5')");
	}
	
	?>


<!-- Google Code for Options Jeunes Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 971247872;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "GdnnCM6f_WQQgKKQzwM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/971247872/?label=GdnnCM6f_WQQgKKQzwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<script type="text/javascript"> if (!window.mstag) mstag = {loadTag : function(){},time : (new Date()).getTime()};</script> <script id="mstag_tops" type="text/javascript" src="//flex.msn.com/mstag/site/06439453-89a6-4c59-8b71-7f259756792f/mstag.js"></script> <script type="text/javascript"> mstag.loadTag("analytics", {dedup:"1",domainId:"2863895",type:"1",actionid:"227086"})</script> <noscript> <iframe src="//flex.msn.com/mstag/tag/06439453-89a6-4c59-8b71-7f259756792f/analytics.html?dedup=1&domainId=2863895&type=1&actionid=227086" frameborder="0" scrolling="no" width="1" height="1" style="visibility:hidden;display:none"> </iframe> </noscript>

    <?
	
	echo "<br><br><div align='justify' class='texteBleu'><b>Merci pour votre devis.<br>Un conseiller va vous contacter afin de finaliser votre inscription.</b><br>Remarque : votre prise d'option nous informe que vous �tes interess�s par ce s�jour mais ne garantit pas une place disponible. Seule une inscription confirme et r�serve directement votre place.</div><br><br>";
}else{

?>
<br />
                                                  
                <table width="100%" border="0" align="center" cellpadding="3" class="texteGris">
                  <form action="" method="post" name="mail">
                    <input type="hidden" value="1" name="ok" />
                     <div class="titles">                                <span>ETAPE 2/2 : Pr�-inscription</span>                                <br>                                <h1><i class="fa fa-edit"></i>&nbsp;Poser une option pour un s�jour junior</h1>                               					</div> 
                    <tr height="10"><td></td></tr>
                    <tr>
                      <td width="37%" align="right" class="text">Nom du jeune* :</td>
                      <td width="63%"><input name="nom" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Pr&eacute;nom* :</td>
                      <td><input name="prenom" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Date de naissance :</td>
                      <td><select name="date_naiss_j" class="select"><?=sel_date("jour","")?></select> <select name="date_naiss_m" class="select"><?=sel_date("mois","")?></select> <select name="date_naiss_a" class="select"><?=sel_date("annee","",1990)?></select></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Adresse :</td>
                      <td><input name="adresse" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Code postal :</td>
                      <td><input name="cp" type="text" value="" class="inputtext" size="10" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Ville :</td>
                      <td><input name="ville" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">T�l :</td>
                      <td><input name="tel" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Mail* :</td>
                      <td><input name="mail" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Inscription newsletter :</td>
                      <td><input name="newsletter" type="checkbox" value="1" checked="checked" /></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                     					  					   <td colspan="2" align="center" valign="bottom">
															   
															   <input  align="right" type="submit"  onclick="javascript:verifForm(); _gaq.push(['_trackPageview', '/options-jeunes.php']); return false;" class="button" value="Posez une option">
															   
															   
															   </td>					  										  </td>
                    </tr>
                  </form>
                </table>
                <? } ?>
                                  </div>	                                                         <!-- fin contenu -->						<!-- Aside -->						<? //include("droite_juniors.php"); ?>                        												                    </div>                     <!-- contenu bas pages sur toute largeur-->										            </section>            <!-- End content info-->

 <? include("footer_juniors.php"); ?>   