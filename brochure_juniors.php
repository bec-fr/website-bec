<!DOCTYPE html><? include("connect.php"); ?>
<? $site = "junior"; ?><html lang="fr">   
 <head>
 <title>Bec séjours linguistiques Juniors - Demande de brochure</title>    
 <meta name="keywords" content="sejour linguistique,juniors,usa,angleterre,irlande" /> 
 <meta name="description" content="Consultez Recevez notre brochure séjour linguistique pour ados 12-17 ans">  
 <meta name="author" content="becfrance">   
 
 <!-- Mobile Metas -->        <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">  
 <!-- Your styles -->      
 <link href="css/style.css" rel="stylesheet" media="screen">          <!-- Skins Theme -->   
 <link href="#" rel="stylesheet" media="screen" class="skin">        <!-- Favicons -->   
 <link rel="shortcut icon" href="img/icons/favicon.ico"> 
 <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">        <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">          <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->        <!--[if lt IE 9]>          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        <![endif]-->        <!-- styles for IE -->        <!--[if lte IE 8]>        <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />        <![endif]-->                <!-- Skins Changer-->        <script type="text/javascript" src="http://www.google.com/jsapi"></script>	
 </head><? include("top_juniors.php"); ?>  
 <!-- Section Title -->            <div class="section_title juniors">     
 
 <div class="container">                    <div class="row"> 						                
 <div class="col-md-10"><br>  
 <h1>Demande de Brochure Juniors</h1>                        </div> 	
 <div class="col-md-2"></div>						                    </div>                </div>                        </div>            <!-- End Section Title -->			            <!-- End content info -->            <section class="content_info">	               
 <div class="container">					<!-- Newsletter Box -->                                      <div class="newsletter_box">                        <div class="container">                            <div class="row">                              <div class="col-md-9 titre"> 										<span><?=($fil_ariane)?></span>				                                </div>								                            </div>    
 </div>                    </div>                    <!-- End Newsletter Box -->                                        <section class="row padding_top">                   
 <!-- Properties -->                        
 <div class="col-md-9">
 <div class="row">
 <h2>Consulter La brochure séjour juniors 12-17 ans été 2018</h2>
 <p> <img src="img/brochure_ados_2018.png" width="110" hspace="6" align="left">
 <b>5 destinations</b> : Angleterre, Irlande, USA, Malte, Australie<br>
<b>3 modes d'hébergement</b> : séjour en familles hôtesses, en campus ou en hôtels<br>
<b>4 formules</b> : Anglais & Découverte, Anglais & sport, Anglais Intensif, Immersion & Decouverte<br>
</p>
<br>
</div>


															 <!--<div class="row">
															 <div class="col-md-8 ">&nbsp;</div>
															 <diV align="right" class="button col-md-4"><a class="bouton" href="http://fr.calameo.com/read/004641751b086b5858894" target="_blank"><i class="fa fa-book"></i><b>&nbsp;Consulter en ligne</b></a></div>
															 
															</div>-->
 <div class="row">
															 <div class="col-md-8  ">&nbsp;</div>
															 <diV align="right" class="button col-md-4"><a class="bouton" href="doc/BEC-Brochure-Sejours-Linguistiques-Juniors-2018.pdf" target="_blank"  onclick="_gaq.push(['_trackPageview', '/telechargement-brochure.pdf']);"><i class="fa fa-file-pdf-o"></i><b>&nbsp;Télécharger au format PDF</b></a></div>
															 
															</div>																
																														

<hr>
<div>
<h2>Recevoir La brochure séjour juniors 12-17 ans été 2018</h2>
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
					_gaq.push(['_trackPageview', '/formulaire-brochure.php']);
					document.mail.submit();
				}
			}
</script>
								<div class="form-group">
                                  <table border="0"  class="texteGris">
                                      <tr>
                                        <td align="left">	
										<b>Merci de remplir ce formulaire pour recevoir gratuitement notre brochure papier été 2018</b><br><br><i>Attention les tarifs de cette brochure sont établis au 01/01/2018. Merci de consulter le site et nos <a href="http://www.becfrance.com/offres-speciales-sejours-linguistiques-ados.php">offres spéciales</a> pour obtenir les tarifs les plus à jour ou de contacter un conseiller au 01 55 35 25 00</i>		
										<br /></b>
                          		
                                        </td>
                                    </tr>
                                  </table>
							  
                                  
                                  <?
            if(isset($_POST["ok"]) && $_POST["ok"] == 1){
				
				$query = "INSERT INTO brochure (site, nom, prenom, adresse, cp, ville, tel, mail, message, connu, datetime) VALUES ('".$site."', '".addslashes($_POST["nom"])."', '".addslashes($_POST["prenom"])."', '".addslashes($_POST["adresse"])."', '".addslashes($_POST["cp"])."', '".addslashes($_POST["ville"])."', '".addslashes($_POST["tel"])."', '".addslashes($_POST["mail"])."', '".addslashes($_POST["message"])."', '".addslashes($_POST["connu"])."', NOW())";
	mysql_query($query) or die(mysql_error());
				
	//$mail_site = "mael@amenothes.fr";
	if(envoi_mail($mail_site, "Demande de brochure depuis votre site Internet ".$url_site2, "Demande de brochure depuis votre site Internet ".$url_site2."<br><br>

Nom : ".htmlentities($_POST["nom"])."<br>
Pr&eacute;nom : ".htmlentities($_POST["prenom"])."<br>
Adresse : ".htmlentities($_POST["adresse"]." ".$_POST["cp"]." ".$_POST["ville"])."<br>
T&eacute;l : ".htmlentities($_POST["tel"])."<br>
Mail : ".htmlentities($_POST["mail"])."<br>
Brochure : ".(($site=="minis") ? "mini-s&eacute;jours" : (($site=="junior") ? "junior" : "&eacute;tudiant-adulte"))."<br><br>
Connu BEC : ".nl2br(htmlentities($_POST["connu"]))."<br><br>
Message : ".nl2br(htmlentities($_POST["message"]))."<br>

")){
		// envoi expediteur		$format = $_POST["format"]; 		if ($format ==  "pdf") {		$sujet = 'Sujet de l\'email';$message = "Bonjour,<br /><strong>Nous vous remercions pour l’intérêt porté à nos programmes de séjours linguistiques.</strong><br />Vous pouvez téléchercharger la brochure juniors en cliquant sur le lien suivant";$destinataire = 'htmlentities($_POST["mail"])';$headers = "From: \"expediteur moi\"<contact@becvoyages.com>\n";$headers .= "Reply-To: contact@becvoyages.com\n";$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";		}				
		if(isset($_POST["newsletter"]) && $_POST["newsletter"]=="1" && trim($_POST["mail"]) != ""){
			mysql_query("INSERT INTO mailing (mail, groupe) VALUES ('".addslashes($_POST["mail"])."', '".(($site=="minis") ? "7" : (($site=="junior") ? "5" : "6"))."')");
		}
		
		if($site=="minis"){
			?>
            <!-- Google Code for Demande de brochure mini s&eacute;jours Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1064412344;
var google_conversion_language = "fr";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "JFEoCNjJ3QEQuMnG-wM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1064412344/?label=JFEoCNjJ3QEQuMnG-wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

            <?
		}elseif($site=="junior"){
			?>
            <!-- Google Code for Demande de brochure junior Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1064412344;
var google_conversion_language = "fr";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "vg-HCODI3QEQuMnG-wM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1064412344/?label=vg-HCODI3QEQuMnG-wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

            <?
		}else{
			?>
            <!-- Google Code for Demande de brochure Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1064412344;
var google_conversion_language = "fr";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "k0L4CPin3QEQuMnG-wM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1064412344/?label=k0L4CPin3QEQuMnG-wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

            <?
		}
		
		echo "<br><br><div align='center' class='texteBleu'><b>Merci, votre demande a bien été envoyée !</b></div><br><br>";
	}else{
		echo "<br><br><div align='center' class='texteBleu'><b>Votre demande n'a pas pu être envoyée.</b></div><br><br>";
	}
}else{

?>
<br />
                                                  
                <table border="0" cellspacing="5" cellpadding="5" >
                  <form action="" method="post" name="mail" id="mail">
                    <input type="hidden" value="1" name="ok" />					
                    <tr>
                      <td  class="text">Nom* :</td>
                      <td><input name="nom" type="text" id="nom" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td class="text">Pr&eacute;nom* :</td>
                      <td><input name="prenom" type="text" id="prenom" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td  class="text">Adresse :</td>
                      <td><input name="adresse" type="text" id="adresse" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td  class="text">Code postal :</td>
                      <td><input name="cp" type="text" id="cp" value="" class="inputtext" size="10" /></td>
                    </tr>
                    <tr>
                      <td  class="text">Ville :</td>
                      <td><input name="ville" type="text" id="ville" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td  class="text">T&eacute;l :</td>
                      <td><input name="tel" type="text" id="tel" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td class="text">Mail* :</td>
                      <td><input name="mail" type="text" id="mail" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td  class="text">Inscription newsletter :</td>
                      <td><input name="newsletter" type="checkbox" value="1" checked="checked" /></td>
                    </tr>
                    <!--<tr>
                      <td align="right" valign="top" class="text">Comment avez-vous connu le BEC ?</td>
                      <td><textarea name="connu" cols="40" rows="4" id="connu" class="textarea"></textarea></td>
                    </tr>-->
                    <tr>
                      <td  valign="top" class="text">Comment avez-vous connu le BEC ?</td>
                      <td><select name="connu" class="select"><option value="">- - -</option><option value="moteurs de recherche">moteurs de recherche</option><option value="l'Office">l'Office</option><option value="mon professeur">mon professeur</option><option value="un ami / ma famille">un ami / ma famille</option><option value="tract sur le salon Expolangues">tract sur le salon Expolangues</option><option value="tract devant ma fac / mon lycée">tract devant ma fac / mon lycée</option></select></td>
                    </tr>
                    <tr>
                      <td  valign="top" class="text">Message :</td>
                      <td><textarea name="message" cols="50" rows="8" id="message" class="textarea"></textarea></td>
                    </tr>
                    <tr>
                      <td align="center" valign="bottom"></td>
                      <td align="right" valign="bottom">					  					  <input class="button"  onClick="javascript:verifForm()" class="button"  value="Recevoir votre brochure">					 </td>
                    </tr>
                  </form>
                </table>
                <? } ?>		
				</div>	

				</div>	
                          </div>                                <!-- fin contenu -->						<!-- Aside -->						<? include("droite_juniors.php"); ?>                        												                    </div>                     <!-- contenu bas pages sur toute largeur-->										            </section>            <!-- End content info--> <? include("footer_juniors.php"); ?>          			