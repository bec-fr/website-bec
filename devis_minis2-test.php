<!DOCTYPE html><? include("connect.php"); ?><html lang="fr"> 
   <head>                <title>Bec séjours linguistiques - Voyages Scolaires</title>   
   
   <meta name="description" content="BEC Séjour linguistiques"> 
   <meta name="author" content="BEC Séjour linguistiques">                  <!-- Mobile Metas -->  
   <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">        <!-- Your styles -->  
   <link href="css/style.css" rel="stylesheet" media="screen">  
   <!-- Skins Theme -->        <link href="#" rel="stylesheet" media="screen" class="skin">        <!-- Favicons -->  
   <link rel="shortcut icon" href="img/icons/favicon.ico">  
   <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">    
   <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">          <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->        <!--[if lt IE 9]>     
   <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        <![endif]-->        <!-- styles for IE -->        <!--[if lte IE 8]>        <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />        <![endif]-->                <!-- Skins Changer-->        <script type="text/javascript" src="http://www.google.com/jsapi"></script>		    </head><? include("top_scolaires.php"); ?>           <!-- Section Title -->            <div class="section_title juniors"> 
   <div class="container">                    <div class="row"> 						                        <div class="col-md-10"><br>          
   <title>Bec séjours linguistiques - Voyages Scolaires - Etablir un devis 2/2</title>                          </div> 						<div class="col-md-2"></div>						                    </div>                </div>                        </div>            <!-- End Section Title -->			            <!-- End content info -->            <section class="content_info">	                <div class="container">					<!-- Newsletter Box -->                                      <div class="newsletter_box">            
   <div class="container">                            <div class="row">   
   <div class="col-md-9 titre"> 										<span><?=($fil_ariane)?></span>				                                </div>								                            </div>                        </div>                    </div>                    <!-- End Newsletter Box -->                                        <section class="row padding_top">                        <!-- Properties -->                        <div class="col-md-9">                            <!-- Contenu-->                                               
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
		else if (document.mail.nom_etab.value.length == 0) {alert('Vous n\'avez pas indiqué votre établissement.'); a="1"; document.mail.nom_etab.focus();}
		
		if (a == 0) {
			document.mail.submit();
		}
	}
</script>


					
                                  
<?
if(isset($_POST["ok"]) && $_POST["ok"] == 1){
	$query = "UPDATE devis_minis SET nom = '".addslashes($_POST["nom"])."', prenom = '".addslashes($_POST["prenom"])."', adresse = '".addslashes($_POST["adresse"])."', cp = '".addslashes($_POST["cp"])."', ville = '".addslashes($_POST["ville"])."', tel_etab = '".addslashes($_POST["tel_etab"])."', tel = '".addslashes($_POST["tel"])."', mail = '".addslashes($_POST["mail"])."', nom_etab = '".addslashes($_POST["nom_etab"])."', message = '".addslashes($_POST["message"])."', connu = '".addslashes($_POST["connu"])."' WHERE id = '".addslashes($_GET["id"])."'";
	mysql_query($query) or die(mysql_error());
	$id = mysql_insert_id();
	
	envoi_mail($mail_site, "Devis depuis votre site Internet ".$url_site2, "Demande de devis depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le détail du devis mini-séjour.");
	
	if
	
	if(isset($_POST["newsletter"]) && $_POST["newsletter"]=="1" && trim($_POST["mail"]) != ""){
		mysql_query("INSERT INTO mailing (mail, groupe) VALUES ('".addslashes($_POST["mail"])."', '7')");
	}
	
	?>
    <!-- Google Code for Demande devis mini s&eacute;jour Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1064412344;
var google_conversion_language = "fr";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "dEJeCJik3QEQuMnG-wM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1064412344/?label=dEJeCJik3QEQuMnG-wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<!-- Google Code for Devis Voyage Scolaire Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 971247872;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "tyhlCLCuuwgQgKKQzwM";
var google_conversion_value = 0;
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/971247872/?value=0&amp;label=tyhlCLCuuwgQgKKQzwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<script type="text/javascript"> if (!window.mstag) mstag = {loadTag : function(){},time : (new Date()).getTime()};</script> <script id="mstag_tops" type="text/javascript" src="//flex.msn.com/mstag/site/06439453-89a6-4c59-8b71-7f259756792f/mstag.js"></script> <script type="text/javascript"> mstag.loadTag("analytics", {dedup:"1",domainId:"2863895",type:"1",actionid:"227085"})</script> <noscript> <iframe src="//flex.msn.com/mstag/tag/06439453-89a6-4c59-8b71-7f259756792f/analytics.html?dedup=1&domainId=2863895&type=1&actionid=227085" frameborder="0" scrolling="no" width="1" height="1" style="visibility:hidden;display:none"> </iframe> </noscript>

<script type="application/javascript" src="https://s.yimg.com/wi/ytc.js"></script><script type="application/javascript">YAHOO.ywa.I13N.fireBeacon([{"projectId" : "1000179072403","coloId" : "SP","properties" : {/*"documentName" : "",*/"pixelId" : "19691","qstrings" : {}}}]);</script>
<img src="https://sp.analytics.yahoo.com/spp.pl?a=1000179072403&.yp=19691&js=no"/>

    <?
	
	echo "<br><br><div align='center' class='texteBleu'><b>Merci pour votre demande.<br>Nous allons vous adresser une proposition dans les plus brefs délais.<br>Si des informations manquaient, un conseiller prendra contact avec vous afin d'affiner votre demande.</b></div><br><br>";
}else{

?>
<br />
                                                  
                <table width="100%" border="0" align="center" cellpadding="3">
                  <form action="" method="post" name="mail">
                    <input type="hidden" value="1" name="ok" />
                    <tr>										<td colspan="2">					 <div class="titles">                                <span>ETAPE 2/2 : Vos coordonnées</span>                                <br>                                <h1><i class="fa fa-edit"></i>&nbsp;Etablir un devis pour un mini-séjour scolaire</h1>                               						  </div>															</td>
                    <tr height="10"><td></td></tr>
                    <tr>
                      <td width="37%" align="right" class="text">Nom du professeur* :</td>
                      <td width="63%"><input name="nom" type="text" id="nom" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Pr&eacute;nom* :</td>
                      <td><input name="prenom" type="text" id="prenom" value="" class="inputtext" size="40" /></td>
                    </tr>					                    <tr>                      <td align="right" class="text">Tél mobile* :</td>                      <td><input name="tel" type="text" id="tel" value="" class="inputtext" size="40" /></td>                    </tr>                    <tr>                      <td align="right" class="text">Mail* :</td>                      <td><input name="mail" type="text" id="mail" value="" class="inputtext" size="40" /></td>                    </tr>
                    <tr>
                      <td align="right" class="text">Nom de l'établissement* :</td>
                      <td><input name="nom_etab" type="text" id="nom_etab" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Adresse de l'établissement* :</td>
                      <td><input name="adresse" type="text" id="adresse" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Code postal* :</td>
                      <td><input name="cp" type="text" id="cp" value="" class="inputtext" size="10" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Ville* :</td>
                      <td><input name="ville" type="text" id="ville" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Tél établissement* :</td>
                      <td><input name="tel_etab" type="text" id="tel_etab" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Inscription newsletter :</td>
                      <td><input name="newsletter" type="checkbox" value="1" checked="checked" /></td>
                    </tr>
                    <tr>
                      <td align="right" valign="top" class="text">Comment avez-vous connu le BEC ?</td>
                      <td><select name="connu" class="select"><option value="">- - -</option><option value="moteurs de recherche">moteurs de recherche</option><option value="l'Office">l'Office</option><option value="mon professeur">mon professeur</option><option value="un ami / ma famille">un ami / ma famille</option><option value="tract sur le salon Expolangues">tract sur le salon Expolangues</option><option value="tract devant ma fac / mon lycée">tract devant ma fac / mon lycée</option></select></td>
                    </tr>
                    <tr>
                      <td align="right" valign="top" class="text">Message :</td>
                      <td><textarea name="message" cols="50" rows="8" id="message" class="textarea"></textarea></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                      <td colspan="2" align="center" valign="bottom">					  					  <input align="right" type="submit"  onClick="javascript:verifForm(); _gaq.push(['_trackPageview', '/devis-voyage-scolaire.php']); return false;" class="button" value="ok">					  					 </td>
                    </tr>
                  </form>
                </table>
                <? } ?>
                                  
                               </div>                                       <!-- fin contenu -->						<!-- Aside -->						<? include("droite_scolaires.php"); ?>                        												                    </div>                     <!-- contenu bas pages sur toute largeur-->										<div class="container"> 
							            					                </div>      
							   </section>            <!-- End content info--> <? include("footer_scolaires.php"); ?>          			