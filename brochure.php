<!DOCTYPE html><? include("connect.php"); ?><? $site = "etudiant"; ?><html lang="fr">    <head> 
               <title>Bec s�jours linguistiques �tudiants et adultes - T�l�charger notre brochure</title>
			        <meta name="description" content="T�l�chargez notre brochure s�jours lignuistiques etudiants adultes">  
					<meta name="author" content="BEC S�jours linguistiques">                  <!-- Mobile Metas -->    
					<meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">        <!-- Your styles -->     
					<link href="css/style.css" rel="stylesheet" media="screen">          <!-- Skins Theme -->   
					<link href="#" rel="stylesheet" media="screen" class="skin">   
					<!-- Favicons -->        <link rel="shortcut icon" href="img/icons/favicon.ico"> 
					<link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">      
					<link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">          <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->        <!--[if lt IE 9]>          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        <![endif]-->        <!-- styles for IE -->  
					<!--[if lte IE 8]>        <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />        <![endif]-->                <!-- Skins Changer-->        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
					</head>
					<? include("top_adultes.php"); ?>           <!-- Section Title -->            <div class="section_title juniors">                <div class="container">                    <div class="row"> 						                        <div class="col-md-10"><br> 
					<h1>T�l�charger notre brochure Etudiants/Adultes</h1>                        </div> 	
					<div class="col-md-2"></div>						                    </div>     
					</div>                        </div>            <!-- End Section Title -->			            <!-- End content info -->        
					<section class="content_info">	             
					<div class="container">					<!-- Newsletter Box --> 
					<div class="newsletter_box">                        <div class="container">
					<div class="row">                              <div class="col-md-9 titre"> 
					<span><?=($fil_ariane)?></span>				                                </div>								                            </div>  
					</div>                    </div>                    <!-- End Newsletter Box -->                                        <section class="row padding_top">                        <!-- Properties -->                        <div class="col-md-9">
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
				else if (document.mail.tel.value.length == 0) {alert('Merci d indiquer votre num�ro de t�l�phone.'); a="1"; document.mail.tel.focus();}
				else if (document.mail.mail.value.length == 0) {alert('Vous n\'avez pas indiqu� votre adresse e-mail.'); a="1"; document.mail.mail.focus();}
				else if ((testm==false) && (document.mail.mail.value.length != 0)) {alert('Votre adresse e-mail est incorrecte.'); a="1"; document.mail.mail.focus();}
				
				if (a == 0) {
					_gaq.push(['_trackPageview', '/brochure.php']);
					document.mail.submit();
				}
			}
</script>
								<div class="form-group">
      
                                  
                                  <?
            if(isset($_POST["ok"]) && $_POST["ok"] == 1){
			
				if(isset($_POST["pays"])){
				$string_pays = implode('-',($_POST["pays"]));
				}
				else {$string_pays = "";}
				if(isset($_POST["sejour"])){
				$string_sejour = implode('-',($_POST["sejour"]));
				}
				else {($string_sejour = "");}
				$query = "INSERT INTO brochure (site, nom, prenom, adresse, cp, ville, tel, mail, message, connu, pays, sejour, datetime) VALUES ('".$site."', '".addslashes($_POST["nom"])."', '".addslashes($_POST["prenom"])."', '".addslashes($_POST["adresse"])."', '".addslashes($_POST["cp"])."', '".addslashes($_POST["ville"])."', '".addslashes($_POST["tel"])."', '".addslashes($_POST["mail"])."', '".addslashes($_POST["message"])."', '".addslashes($_POST["connu"])."','".($string_pays)."','".($string_sejour)."', NOW())";
	mysql_query($query) or die(mysql_error());
				
	//$mail_site = "mael@amenothes.fr";
	if((envoi_mail($mail_site, "Demande de brochure depuis votre site Internet ".$url_site2, "Demande de brochure depuis votre site Internet ".$url_site2."<br><br>

Nom : ".htmlentities($_POST["nom"])."<br>
Pr&eacute;nom : ".htmlentities($_POST["prenom"])."<br>
Adresse : ".htmlentities($_POST["adresse"]." ".$_POST["cp"]." ".$_POST["ville"])."<br>
T&eacute;l : ".htmlentities($_POST["tel"])."<br>
Mail : ".htmlentities($_POST["mail"])."<br>
Brochure : ".(($site=="minis") ? "mini-s&eacute;jours" : (($site=="junior") ? "junior" : "&eacute;tudiant-adulte"))."<br><br>
Connu BEC : ".nl2br(htmlentities($_POST["connu"]))."<br><br>
Message : ".nl2br(htmlentities($_POST["message"]))."<br>

"))&& (envoi_mail($_POST["mail"], "Lien pour t�l�charger notre brochure 2016 - BEC Etudiants/Adultes", "<img src=http://www.becfrance.com/img/brochure_etudiants_adultes2016.jpg align=right hspace=3 width=200 height=285 alt=brochure BEC 2016> Bonjour&nbsp;".htmlentities($_POST["prenom"])." ".htmlentities($_POST["nom"])."<br><br>Merci de votre int�r�t pour nos s�jours �tudiants et adultes. <br>Vous pouvez <a href=http://www.becfrance.com/doc/brochure-etudiants-adultes-en-ecoles-de-langues-2016.pdf>t�l�charger notre brochure 2016 - BEC Etudiants/Adultes au format pdf en cliquant sur ce lien.</a>Nous vous souhaitons une bonne lecture.<br> Ensuite, nous vous invitons � �tablir une ou plusieurs demandes de devis estimatifs sur <a href=http://www.becfrance.com/devis.php>notre site www.becfrance.com</a> auxquelles un conseiller exp�riment� vous r�pondra le plus rapidement possible pour vous �tablir un devis gratuit personnalis�. <br><br>N�h�sitez pas � nous contacter au 01 55 35 25 00 pour toute autre question concernant nos s�jours et programmes �tudiants/adultes (� partir de 18 ans) � l��tranger.<br><br>Cordialement,<br><br>L'�quipe du BEC."))){			
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
		
		echo "<br><br><div align='center' class='texteBleu'><b>Merci, vous pouvez t�l�charger la brochure en cliquant sur ce lien : <a href='doc/brochure-etudiants-adultes-en-ecoles-de-langues-2016.pdf' target='_blank' onclick='_gaq.push(['_trackPageview', '/brochure-etudiants-adultes-en-ecoles-de-langues-2016.pdf']);'>Brochure �tudiants 2016</a></b><br><br>Vous recevrez �galement un email avec un lien vers ce pdf<br><br>Bonne lecture<br></div><br><br>";
	}else{
		echo "<br><br><div align='center' class='texteBleu'><b>Votre demande n'a pas pu �tre envoy�e.</b></div><br><br>";
	}
}else{

?>
<br />
               <b>Merci de remplir ce formulaire pour t�l�charger notre brochure �tudiants & adultes 2016</b><br><br>
			   <div class="row">
               <div class="col-sm-9" >
                  <form class="form-horizontal" action="" method="post" name="mail" id="mail">
				 
                    <input type="hidden" value="1" name="ok" />	

					<div class="search_box2">
					
					<div class="form-group">
							<label class="col-sm-4 control-label">Nom*</label>
							<div class="col-sm-6"><input name="nom" type="text" id="nom" value="" class="inputtext" size="30" /></div>
						
					</div>
					
						<div class="form-group">
							<label class="col-sm-4 control-label">Pr&eacute;nom* </label>
							<div class="col-sm-6"><input name="prenom" type="text" id="prenom" value="" class="inputtext" size="30" /></div>
						</div>	
					
                   
						<div class="form-group">
							<label class="col-sm-4 control-label">Adresse :</label>
							<div class="col-sm-6"><input name="adresse" type="text" id="adresse" value="" class="inputtext" size="30" /></div>	
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Code postal :</label>
							<div class="col-sm-6"><input name="cp" type="text" id="cp" value="" class="inputtext" size="10" /></div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Ville : </label>
							<div class="col-sm-6"><input name="ville" type="text" id="ville" value="" class="inputtext" size="30" /></div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">T&eacute;l* :</label>
							<div class="col-sm-6"><input name="tel" type="text" id="tel" value="" class="inputtext" size="30" /></div>
						</div>											
						<div class="form-group">
							<label class="col-sm-4 control-label">Mail* :</label>
							<div class="col-sm-6"><input name="mail" type="text" id="mail" value="" class="inputtext" size="30" /></div>							
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Destination(s) souhait�e(s) :</label>
							<div class="col-sm-8"><input name="pays[]" type="checkbox" value="Angleterre" />Angleterre&nbsp;<input name="pays[]" type="checkbox" value="USA" />USA &nbsp;<input name="pays[]" type="checkbox" value="Irlande" />Irlande&nbsp;<input name="pays[]" type="checkbox" value="Espagne" />Espagne &nbsp;<input name="pays[]" type="checkbox" value="Australie" />Australie&nbsp;<br><input name="pays[]" type="checkbox" value="Ecosse" />Ecosse &nbsp;<input name="pays[]" type="checkbox" value="New Zeland" />Nouvelle-Z�lande &nbsp;<input name="pays[]" type="checkbox" value="Canada" />Canada &nbsp;</div>							
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Type de s�jour :</label>
							<div class="col-sm-8"><input name="sejour[]" type="checkbox" value="Cours de langue" />Cours de langues&nbsp;<input name="sejour[]" type="checkbox" value="Pr�paration examens" />Pr�paration examens <br><input name="sejour[]" type="checkbox" value="Stage-job" />jobs & stages pro. non remun�r�s&nbsp;<input name="sejour[]" type="checkbox" value="Chez le professeur" />Cours chez le professeur en immersion totale&nbsp;</div>							
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Comment avez-vous connu le BEC ?</label>
							<div class="col-sm-6"><select name="connu" class="select"><option value="">- - -</option><option value="moteurs de recherche">moteurs de recherche</option><option value="l'Office">l'Office</option><option value="mon professeur">mon professeur</option><option value="un ami / ma famille">un ami / ma famille</option><option value="tract sur le salon Expolangues">tract sur le salon Expolangues</option><option value="tract devant ma fac / mon lyc�e">tract devant ma fac / mon lyc�e</option></select></div>							
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label">Message :</label>
							<div class="col-sm-8"><textarea name="message" cols="30" rows="8" id="message" class="textarea"></textarea></div>							
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Inscription newsletter :</label>
							<div class="col-sm-6"><input name="newsletter" type="checkbox" value="1" checked="checked" /></div>							
						</div>
						<div align="right">
						<input  align="right" type="submit"  onclick="javascript:verifForm(); return false;" class="button" value="T�l�charger la brochure">
						</div>                     
                  </form>
				</div>
				
				
				
				
				
				</div>
					<div class="col-sm-3"><img class="img-responsive" hspace="4" src="img/brochure_etudiants_adultes2016.jpg"></div>
				</div>
				
                <? } ?>	
				
				</div>	
				<div class="accordion-trigger"><i class="fa fa-star"></i>&nbsp;5 raisons de choisir BEC pour votre s�jour</div>     
                              <div class="accordion-container">      
                                                                    
                   <ul>
			<li>Nous sommes <b>sp�cialistes du s�jour linguistique depuis 1967.</b>	   
			<li>Vous payez exactement <b>le m�me tarif qu'en reservant directement � l'�cole, l'assistance et le service en plus.</b>
			<li>Vous profitez de <b>promotions et d'offres sp�ciales</b> sur les s�jours.
			<li>Nos conseillers sp�cialis�s sont <b>disponibles pour vous aiguiller dans le choix du s�jour le mieux adapt�</b> �  votre niveau et vos objectifs. 
			<li>Vous b�n�ficiez de notre <b>assurance Responsabilit� Civile Professionnelle</b> souscrite aupr�s de MMA ansi que de la garantie des fonds d�pos�s aupr�s de l'APST.			
			
			
			</ul>
                              </div>
							  <div class="accordion-trigger">Quel est votre niveau de langue ?</div>     
                              <div class="accordion-container">       
                                 <i>Certains cours propos�s par nos �coles partenaires poss�dent un niveau minimum requis pour pouvoir s'incrire. </i><br><li><b>Niveau 1 (A0) : D�butant</b><br>
Vous pouvez parler et comprendre la langue de mani�re tr�s limit�e, voire inexistante.

<li><b>Niveau 2 (A1) : �l�mentaire</b><br>
Vous pouvez comprendre la langue dans des situations quotidiennes �l�mentaires si votre interlocuteur parle doucement et clairement. Vous comprenez et utilisez des expressions simples. Am�liorez vos comp�tences d��coute et le vocabulaire.

<li><b>Niveau 3 (A2) : Pr�-interm�diaire</b><br>
Vous pouvez communiquer et vous faire comprendre avec des messages simples dans certains contextes quotidiens. D�veloppez vos comp�tences en grammaire, vocabulaire et � l�oral.

<li><b>Niveau 4 (B1) : Interm�diaire</b><br>
Vous pouvez parler la langue de mani�re compr�hensible, coh�rente et avec assurance sur des sujets de la vie courante qui vous sont familiers. Am�liorez vos comp�tences en grammaire et �largissez votre vocabulaire.

<li><b>Niveau 5 (B2) : Interm�diaire sup�rieur</b><br>
Vous pouvez utiliser la langue de mani�re efficace et vous exprimer pr�cis�ment. D�veloppez votre aisance � l�oral en discutant, d�battant et exprimant votre opinion de mani�re plus approfondie. Affinez votre utilisation de la grammaire et votre vocabulaire.

<li><b>Niveau 6 (C1) : Avanc�</b><br>
Vous pouvez parler la langue de mani�re plus complexe, spontan�e et sur des sujets vari�s. �tendez votre gamme de vocabulaire et affinez le style utilis� pour acqu�rir une aisance plus marqu�e.
<li><b>Niveau 7 (C2) : Comp�tent/Courant </b><br>
Vous pouvez utiliser la langue avec aisance et facilit� en argumentant sur des sujets complexes. Am�liorez votre compr�hension des nuances de la langue et engagez une lecture ind�pendante pour perfectionner votre vocabulaire.	<br>			
                              </div>
				
					
				
                          </div>   



						  <!-- fin contenu -->						<!-- Aside -->				
						  <? include("droite_adultes.php"); ?>                        												                    </div>  
						  <!-- contenu bas pages sur toute largeur-->										            </section>  
						  <!-- End content info--> <? include("footer.php"); ?>          			