<!DOCTYPE html><? include("connect.php"); ?><html lang="fr">    <head>                <title>Bec séjours linguistiques adultes - Etablir un devis - Etape 2</title>          <meta name="keywords" content="HTML5 Template" />        <meta name="description" content="BEC Séjour linguistiques">        <meta name="author" content="iwthemes.com">                  <!-- Mobile Metas -->        <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">        <!-- Your styles -->        <link href="css/style.css" rel="stylesheet" media="screen">          <!-- Skins Theme -->        <link href="#" rel="stylesheet" media="screen" class="skin">        <!-- Favicons -->        <link rel="shortcut icon" href="img/icons/favicon.ico">        <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">        <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">          <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->        <!--[if lt IE 9]>          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        <![endif]-->        <!-- styles for IE -->        <!--[if lte IE 8]>        <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />        <![endif]-->                <!-- Skins Changer-->        <script type="text/javascript" src="http://www.google.com/jsapi"></script>		    </head><? include("top_adultes.php"); ?>
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
		
		if (document.mail.nom.value.length == 0) {alert('Vous n\'avez pas indiqué votre nom.'); a="1"; document.mail.nom.focus();}
		else if (document.mail.prenom.value.length == 0) {alert('Vous n\'avez pas indiqué votre prénom.'); a="1"; document.mail.prenom.focus();}
		else if (document.mail.mail.value.length == 0) {alert('Vous n\'avez pas indiqué votre adresse e-mail.'); a="1"; document.mail.mail.focus();}
		else if ((testm==false) && (document.mail.mail.value.length != 0)) {alert('Votre adresse e-mail est incorrecte.'); a="1"; document.mail.mail.focus();}
		
		if (a == 0) {
			document.mail.submit();
		}
	}
</script>

<link rel="stylesheet" type="text/css" href="./calendrier/calendrier.css" />
<script language='JavaScript' src='calendrier/browserSniffer.js'></script>
<script language='JavaScript' src='calendrier/dynCalendar.js'></script>
 <!-- Section Title -->            <div class="section_title features">                <div class="container">                    <div class="row"> 						                        <div class="col-md-10"><br>                            <h1> Demander un devis pour un séjour étudiant adulte</h1>                        </div> 						<div class="col-md-2"></div>						                    </div>                </div>                        </div>            <!-- End Section Title -->			            <!-- End content info -->            <section class="content_info">	                <div class="container">					<!-- Newsletter Box -->                                      <div class="newsletter_box">                        <div class="container">                            <div class="row">                              <div class="col-md-9 titre"> 										<span><a href='sejours-linguistiques-pour-etudiants-adultes.html' class='texteBleu'>Séjour Linguistique Adulte</a>  / Etablir un devis</a></span>			                                </div>								                            </div>                        </div>                    </div>                    <!-- End Newsletter Box -->                                        <section class="row padding_top">                        <!-- Properties -->                        <div class="col-md-9">						
                                  
<?
if(isset($_POST["ok"]) && $_POST["ok"] == 1){
	//$query = "UPDATE devis SET nom = '".addslashes($_POST["nom"])."', prenom = '".addslashes($_POST["prenom"])."', datenaiss = '".addslashes($_POST['date_naiss_a']."-".$_POST['date_naiss_m']."-".$_POST['date_naiss_j'])."', adresse = '".addslashes($_POST["adresse"])."', cp = '".addslashes($_POST["cp"])."', ville = '".addslashes($_POST["ville"])."', tel = '".addslashes($_POST["tel"])."', mail = '".addslashes($_POST["mail"])."' WHERE id = '".addslashes($_GET["id"])."'";
	$query = "INSERT INTO devis (destination, formule, hebergement, nb_sem, date_debut, frais_adm, ass_annulation, ass_interruption, total, datetime, nom, prenom, datenaiss, adresse, cp, ville, tel, mail) VALUES ('".addslashes($_SESSION["devis_destination"])."', '".addslashes($_SESSION["devis_formule"])."', '".addslashes($_SESSION["devis_hebergement"])."', '".addslashes($_SESSION["devis_nb_sem"])."', '".addslashes($_SESSION["devis_date_debut"])."', '".addslashes($_SESSION["devis_frais_adm"])."', '".addslashes($_SESSION["devis_ass_annulation"])."', '".addslashes($_SESSION["devis_ass_interruption"])."', '".addslashes($_SESSION["devis_total"])."', '".date("Y-m-d H:i:s")."', '".addslashes($_POST["nom"])."', '".addslashes($_POST["prenom"])."', '".addslashes($_POST['date_naiss_a']."-".$_POST['date_naiss_m']."-".$_POST['date_naiss_j'])."', '".addslashes($_POST["adresse"])."', '".addslashes($_POST["cp"])."', '".addslashes($_POST["ville"])."', '".addslashes($_POST["tel"])."', '".addslashes($_POST["mail"])."')";
	mysql_query($query) or die(mysql_error());
	
	envoi_mail($mail_site, "Devis depuis votre site Internet ".$url_site2, "Demande de devis depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le détail du devis étudiant/adulte.");
	
	if(isset($_POST["newsletter"]) && $_POST["newsletter"]=="1" && trim($_POST["mail"]) != ""){
		mysql_query("INSERT INTO mailing (mail, groupe) VALUES ('".addslashes($_POST["mail"])."', '6')");
	}
	
	?>
    <!-- Google Code for Demande devis etudiant Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1064412344;
var google_conversion_language = "fr";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "1HhdCJCl3QEQuMnG-wM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1064412344/?label=1HhdCJCl3QEQuMnG-wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<!-- Google Code for Devis Etudiant/Adulte Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 971247872;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "JR5ICLituwgQgKKQzwM";
var google_conversion_value = 0;
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/971247872/?value=0&amp;label=JR5ICLituwgQgKKQzwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<script type="text/javascript"> if (!window.mstag) mstag = {loadTag : function(){},time : (new Date()).getTime()};</script> <script id="mstag_tops" type="text/javascript" src="//flex.msn.com/mstag/site/06439453-89a6-4c59-8b71-7f259756792f/mstag.js"></script> <script type="text/javascript"> mstag.loadTag("analytics", {dedup:"1",domainId:"2863895",type:"1",actionid:"227083"})</script> <noscript> <iframe src="//flex.msn.com/mstag/tag/06439453-89a6-4c59-8b71-7f259756792f/analytics.html?dedup=1&domainId=2863895&type=1&actionid=227083" frameborder="0" scrolling="no" width="1" height="1" style="visibility:hidden;display:none"> </iframe> </noscript>

<script type="application/javascript" src="https://s.yimg.com/wi/ytc.js"></script><script type="application/javascript">YAHOO.ywa.I13N.fireBeacon([{"projectId" : "1000179072403","coloId" : "SP","properties" : {/*"documentName" : "",*/"pixelId" : "19691","qstrings" : {}}}]);</script>
<img src="https://sp.analytics.yahoo.com/spp.pl?a=1000179072403&.yp=19691&js=no"/>

    <?
	
	echo "<br><br><div align='center' class='texteBleu'><b>Merci pour votre réservation.<br>Un conseiller va vous contacter afin de finaliser votre demande.</b></div><br><br>";
}else{

?>
<br />
                                                  
             				<div class="titles">                                <span>ETAPE 2/2 : préincription </span>                                <br>                                <h1><i class="fa fa-edit"></i>&nbsp;Etablir un devis pour un séjour étudiant adulte 2/2</h1>                               						  </div>
                 <form class="form-horizontal" action=""  method="post" name="mail" >	  					<input type="hidden" value="1" name="ok" />					 <div class="search_box2">						<div class="form-group">							<label class="col-sm-3 control-label">Nom*</label>							<div class="col-sm-9"><input name="nom" required="required" type="text" value="" class="inputtext" size="40" /></div>						</div>											<div class="form-group">							<label  class="col-sm-3 control-label">Prénom*</label>							<div class="col-sm-9"><input name="prenom" required="required" type="text" value="" class="inputtext" size="40" /></div>						</div>						<div class="form-group">							<label class="col-sm-3 control-label">Date de naissance </label>							<div class="col-sm-9"><select name="date_naiss_j" class="select"><?=sel_date("jour","")?></select> <select name="date_naiss_m" class="select"><?=sel_date("mois","")?></select> <select name="date_naiss_a" class="select"><?=sel_date("annee","",1970)?></select>	</div>						</div>						<div class="form-group">							<label  class="col-sm-3 control-label">Adresse :</label>							<div class="col-sm-9"><input name="adresse" type="text" value="" class="inputtext" size="40" /></div>						</div>						<div class="form-group">							<label  class="col-sm-3 control-label">Code postal:</label>							<div class="col-sm-9"><input name="cp" type="text" value="" class="inputtext" size="10" /></div>						</div>						<div class="form-group">							<label  class="col-sm-3 control-label">Ville:</label>							<div class="col-sm-9"><input name="ville" type="text" value="" class="inputtext" size="40" /></div>						</div>						<div class="form-group">							<label  class="col-sm-3 control-label">Tel. mobile:</label>							<div class="col-sm-9"><input name="tel" type="tel" value="" class="inputtext" size="10" /></div>						</div>												<div class="form-group">							<label  class="col-sm-3 control-label">Mail*:</label>							<div class="col-sm-9"><input name="mail" type="email" required="required" value="" class="inputtext" size="40" /></div>						</div>							<div class="form-group">							<label  class="col-sm-3 control-label">Inscription newsletter :</label>							<div class="col-sm-9"><input name="newsletter" type="checkbox" value="1" checked="checked" /></div>						</div>						<div align="right"><input  align="right" type="submit"  onclick="javascript:verifForm(); _gaq.push(['_trackPageview', '/devis-etudiant-adulte.php']); return false;" class="button" value="Etablir le devis"></div>											  </form>				</div>	
                <? } ?>
                                  <!-- fin formulaire -->																                        </div>                                       <!-- fin contenu -->						<!-- Aside -->						<? include("droite_adultes.php"); ?> 						</div>                     <!-- contenu bas pages sur toute largeur-->					            </section>            <!-- End content info--> <? include("footer.php"); ?>   