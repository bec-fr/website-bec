<!DOCTYPE html>
<? include("connect.php"); ?>
<html lang="fr"> 
   <head>                <title>Notre brochure Voyages Scolaires - Bec séjours linguistiques</title>   
    
       <meta name="description" content="Recevoir ou télécharger notre brochure voyages scolaires ">  
      <meta name="author" content="BEC séjours linguistiques">     
	  <!-- Mobile Metas -->        <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">  
      <!-- Your styles -->        <link href="css/style.css" rel="stylesheet" media="screen">          <!-- Skins Theme -->        <link href="#" rel="stylesheet" media="screen" class="skin">        <!-- Favicons -->        <link rel="shortcut icon" href="img/icons/favicon.ico"> 
	  <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png"> 
	  <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">          <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->        <!--[if lt IE 9]>          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        <![endif]-->        <!-- styles for IE -->        <!--[if lte IE 8]>        <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />        <![endif]-->                <!-- Skins Changer-->        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
	  <script>	function verifForm(){		a="0";				if (document.form.destination.value.length == 0) {alert('Vous n\'avez pas renseigné votre destination.'); a="1"; document.form.destination.focus();}				else if (document.form.nb_adulte.value.length == 0) {alert('Vous n\'avez pas renseigné le nombre d\'encadrants.'); a="1"; document.form.nb_adulte.focus();}				else if (document.form.nb_pc.value.length == 0) {alert('Vous n\'avez pas renseigné le nombre de PC.'); a="1"; document.form.nb_pc.focus();}		else if (document.form.date_debut.value.length == 0) {alert('Vous n\'avez pas renseigné la date de départ.'); a="1"; document.form.date_debut.focus();}				if (a == 0) {			document.form.ok.value = "1";			document.form.submit();		}	}</script>	
	  </head>
	  <? include("top_scolaires.php"); ?> 
	  <!-- Section Title -->   
	  <div class="section_title juniors"> 
	  <div class="container">     
	  <div class="row"> 						                        <div class="col-md-10"><br> 
	  <h1> Notre brochure voyages scolaires</h1>                        </div> 
	  
	  <div class="col-md-2"></div>						                    </div>               
	  </div>                        </div>            <!-- End Section Title -->			      
      <!-- End content info -->        
	  <section class="content_info">	                <div class="container">					
	  <!-- Newsletter Box -->
	  
	  <div class="newsletter_box">      
	  <div class="container">   
	  
	  <div class="row"> 
	  <div class="col-md-9 titre"> 										<span><?=($fil_ariane)?></span>				                                </div>								                            </div>                        </div>                    </div>                    <!-- End Newsletter Box -->                                        <section class="row padding_top">                      
	  <!-- Properties -->                        <div class="col-md-9">                         
	  <!-- Contenu-->
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
				
				if (document.mail.nom.value.length == 0) {alert('Vous n\'avez pas renseigné votre nom.'); a="1"; document.mail.nom.focus();}
				else if (document.mail.prenom.value.length == 0) {alert('Vous n\'avez pas renseigné votre prénom.'); a="1"; document.mail.prenom.focus();}
				else if (document.mail.nom_etab.value.length == 0) {alert('Vous n\'avez pas renseigné le nom de l\'établissement.'); a="1"; document.mail.nom_etab.focus();}
				else if (document.mail.adresse.value.length == 0) {alert('Vous n\'avez pas renseigné l\'adresse.'); a="1"; document.mail.adresse.focus();}
				else if (document.mail.cp.value.length == 0) {alert('Vous n\'avez pas renseigné le code postal.'); a="1"; document.mail.cp.focus();}
				else if (document.mail.ville.value.length == 0) {alert('Vous n\'avez pas renseigné la ville.'); a="1"; document.mail.ville.focus();}				
				else if (document.mail.mail.value.length == 0) {alert('Vous n\'avez pas renseigné votre adresse e-mail.'); a="1"; document.mail.mail.focus();}
				else if ((testm==false) && (document.mail.mail.value.length != 0)) {alert('Votre adresse e-mail est incorrecte.'); a="1"; document.mail.mail.focus();}
				
				if (a == 0) {
					_gaq.push(['_trackPageview', '/brochure_minis.php']);
					document.mail.submit();
				}
			}
</script>

	
                                   <div class="titles">  <br>                       
								   <h1><i class="fa fa-book"></i>&nbsp;Demande de brochure mini séjours 2017</h1>          
								   </div>
                                 
                                  
                                  <?
            if(isset($_POST["ok"]) && $_POST["ok"] == 1){
				
				$query = "INSERT INTO brochure_minis (site, nom, prenom, nom_etab, adresse, cp, ville, tel_etab, tel, mail, message, connu, datetime) VALUES ('".$site."', '".addslashes($_POST["nom"])."', '".addslashes($_POST["prenom"])."', '".addslashes($_POST["nom_etab"])."', '".addslashes($_POST["adresse"])."', '".addslashes($_POST["cp"])."', '".addslashes($_POST["ville"])."', '".addslashes($_POST["tel_etab"])."', '".addslashes($_POST["tel"])."', '".addslashes($_POST["mail"])."', '".addslashes($_POST["message"])."', '".addslashes($_POST["connu"])."', NOW())";
	mysql_query($query) or die(mysql_error());
				
	//$mail_site = "mael@amenothes.fr";
	if(envoi_mail($mail_site, "Demande de brochure ".$url_site2, "Demande de brochure depuis votre site Internet ".$url_site2."<br><br>

Brochure : mini-s&eacute;jours<br><br>
Nom du professeur : ".htmlentities($_POST["nom"])."<br>
Pr&eacute;nom : ".htmlentities($_POST["prenom"])."<br>
Nom de l'établissement : ".htmlentities($_POST["nom_etab"])."<br>
Adresse de l'établissement : ".htmlentities($_POST["adresse"]." ".$_POST["cp"]." ".$_POST["ville"])."<br>
T&eacute;l de l'établissement : ".htmlentities($_POST["tel_etab"])."<br>
T&eacute;l personnel : ".htmlentities($_POST["tel"])."<br>
Mail : ".htmlentities($_POST["mail"])."<br><br>

Connu BEC : ".nl2br(htmlentities($_POST["connu"]))."<br><br>
Message : ".nl2br(htmlentities($_POST["message"]))."<br>

")){
		
		if(isset($_POST["newsletter"]) && $_POST["newsletter"]=="1" && trim($_POST["mail"]) != ""){
			mysql_query("INSERT INTO mailing (mail, groupe) VALUES ('".addslashes($_POST["mail"])."', '7')");
		}
		
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
		
		echo "<br><br><div class='row'><div class='col-md-7'><b>Merci pour votre demande et bonne lecture.<br> N hésitez pas à nous contacter au 01 55 35 25 00</b></div><div align='right'><div class='button' style='width:295px' ><a class='bouton' href='http://fr.calameo.com/read/00464175198dca8f8d954' target='_blank'><i class='fa fa-book'></i><b>&nbsp;Consulter en ligne</b></a></div><div class='button' style='width:295px'><a class='bouton' href='doc/brochures-scolaires-2017.pdf' target='_blank' onclick='_gaq.push(['_trackPageview', '/brochure_minis.php']);'><i class='fa fa-file-pdf-o'></i><b>&nbsp;Télécharger au format PDF</b></a></div></div></div>";
	}else{
		echo "<br><br><div class='row'><div class='col-md-7'><b>Merci pour votre demande et bonne lecture.<br> Vous pouvez également nous contacter au 01 55 35 25 00</b></div><div align='right'><div class='button' style='width:295px'><a class='bouton' href='http://fr.calameo.com/read/00464175198dca8f8d954' target='_blank'><i class='fa fa-book'></i><b>&nbsp;Consulter en ligne</b></a></div><div class='button' style='width:295px'><a class='bouton' href='doc/brochures-scolaires-2017.pdf' target='_blank' onclick='_gaq.push(['_trackPageview', '/brochure_minis.php']);'><i class='fa fa-file-pdf-o'></i><b>&nbsp;Télécharger au format PDF</b></a></div></div></div>";
	}
}else{

?>
<br />
                  <div class="row">
               <div class="col-sm-8" > 
				Merci de remplir ce formulaire pour télécharger notre brochure voyages scolaires 2017
                <table width="100%" align="center" cellpadding="3" class="texteGris">
                  <form class="form-horizontal" action=""  method="post" name="mail" id="mail">
				 
                    <input type="hidden" value="1" name="ok" />
                    <tr>
                      <td width="40%" align="right" class="text">Nom du professeur* :</td>
                      <td width="60%"><input name="nom" type="text" id="nom" value="" class="inputtext" size="30" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Pr&eacute;nom* :</td>
                      <td><input name="prenom" type="text" id="prenom" value="" class="inputtext" size="30" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Nom de l'établissement* :</td>
                      <td><input name="nom_etab" type="text" id="nom_etab" value="" class="inputtext" size="30" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Adresse de l'établissement* :</td>
                      <td><input name="adresse" type="text" id="adresse" value="" class="inputtext" size="30" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Code postal* :</td>
                      <td><input name="cp" type="text" id="cp" value="" class="inputtext" size="10" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Ville* :</td>
                      <td><input name="ville" type="text" id="ville" value="" class="inputtext" size="30" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Tél établissement :</td>
                      <td><input name="tel_etab" type="text" id="tel_etab" value="" class="inputtext" size="30" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Tél personnel :</td>
                      <td><input name="tel" type="text" id="tel" value="" class="inputtext" size="20" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Mail* :</td>
                      <td><input name="mail" type="text" id="mail" value="" class="inputtext" size="30" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Inscription newsletter :</td>
                      <td><input name="newsletter" type="checkbox" value="1" checked="checked" /></td>
                    </tr>
                    <!--<tr>
                      <td align="right" valign="top" class="text">Comment avez-vous connu le BEC ?</td>
                      <td><textarea name="connu" cols="40" rows="4" id="connu" class="textarea"></textarea></td>
                    </tr>-->
                    <tr>
                      <td align="right" valign="top" class="text">Comment avez-vous connu le BEC ?</td>
                      <td><select name="connu" class="select"><option value="">- - -</option><option value="moteurs de recherche">moteurs de recherche</option><option value="l'Office">l'Office</option><option value="mon professeur">mon professeur</option><option value="un ami / ma famille">un ami / ma famille</option><option value="tract sur le salon Expolangues">tract sur le salon Expolangues</option><option value="tract devant ma fac / mon lycée">tract devant ma fac / mon lycée</option></select></td>
                    </tr>
                    <tr>
                      <td align="right" valign="top" class="text">Message :</td>
                      <td><textarea name="message" cols="50" rows="8" id="message" class="textarea"></textarea></td>
                    </tr>
                    <tr>
                      <td align="center" valign="bottom"></td>
                      <td align="left" valign="bottom">					  					  	<div><input  align="right" type="submit"  onClick="javascript:verifForm()" class="button" value="Télécharger la brochure "></div>					  					
                    </tr>
                  </form>
                </table>
				
				</div>
					<div align="center" class="col-sm-4"><img class="img-responsive" hspace="4" src="img/brochure-scolaires-2017.jpg"></div>
				</div>
				
                <? } ?>
                                   </div>       								                        <!-- fin contenu -->						<!-- Aside -->						<? include("droite_scolaires.php"); ?>                        												                    </div>                     <!-- contenu bas pages sur toute largeur-->										            </section>            <!-- End content info--> <? include("footer_scolaires.php"); ?>          			