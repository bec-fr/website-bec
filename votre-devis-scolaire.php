<!DOCTYPE html>
<!--<? include("connect.php"); ?>-->
<html lang="fr">
    <head>  
	<meta http-equiv="Content-Type" name="viewport" content="width=device-width, initial-scale=1.0, text/html; charset=iso-8859-1"> 
        <title>Bec s�jours linguistiques - Votre devis scolaire personnalis�</title> 		
        <meta name="keywords" content="Devis voyage scolaire" />
        <meta name="description" content="Recevez votre devis scolaire personnalis�">
        <meta name="author" content="BEC S�jours linguistiques">  
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">
        <!-- Your styles -->
        <link href="css/style.css" rel="stylesheet" media="screen">  
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  

        <!-- Skins Theme -->
        <link href="#" rel="stylesheet" media="screen" class="skin">

        <!-- Favicons -->
        <link rel="shortcut icon" href="img/icons/favicon.ico">
        <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">  

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- styles for IE -->
        <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />
        <![endif]-->
        
        <!-- Skins Changer-->
		<STYLE type="text/css">
		.titles h1 {
    border-bottom: 3px solid #c10e12;
		}
		.h3
		{
		 padding-top :35px
		 }
		.titles span {
    background-color: #1e1e1e;
    color: #5c5c5c;
    font-weight: bold;
    font-size: 16px;
    line-height: 30px;
    display: block;
    text-align: center;
}
   

		</STYLE>
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>	
		<link rel="stylesheet" type="text/css" href="js/datepicker/datepickr.min.css">
		<script>
		function verifForm(){
		a="0";
		
		if (document.form.destination.value.length == 0) {alert('Vous n\'avez pas renseign� votre destination.'); a="1"; document.form.destination.focus();}	
		else if ((document.form.nb_eleve.value.length == 0) && (document.form.nb_eleve2.value.length == 0) && (document.form.nb_eleve3.value.length == 0)) {alert('Vous n\'avez pas renseign� le nombre d\'eleves.'); a="1"; document.form.nb_eleve.focus();}	
		else if (document.form.nb_adulte.value.length == 0) {alert('Vous n\'avez pas renseign� le nombre d\'encadrants.'); a="1"; document.form.nb_adulte.focus();}		
		else if (document.form.nb_pc.value.length == 0) {alert('Vous n\'avez pas renseign� le nombre de PC.'); a="1"; document.form.nb_pc.focus();}
		else if (document.form.date_debut.value.length == 0) {alert('Vous n\'avez pas renseign� la date de d�part.'); a="1"; document.form.date_debut.focus();}
		
		if (a == 0) {
			document.form.ok.value = "1";
			document.form.submit();
		}
	}
</script>

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '325277634598697');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=325277634598697&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

		
    </head>

           <!-- Section Title -->
            <div class="section_title juniors">
                <div class="container">
                    <div class="row"> 
						
                        <div class="col-md-10"><br>
                          
                        </div> 
						<div class="col-md-2"></div>						
                    </div>
                </div>            
            </div>
            <!-- End Section Title -->
			
            <!-- End content info -->
            <section class="content_info">	
                <div class="container">
					 <!-- Newsletter Box -->                  
                    <div class="newsletter_box">
                        <div class="container">
                            <div class="row">
                              <div class="col-md-8">
                                                 
                                </div>
                                <div align="right" class="col-md-4"><br>
                                  <b>Contactez nous au 01 55 35 25 00</b>
                                    <div id="result-newsletter"></div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Newsletter Box -->
                    <section class="row padding_top">
                        <!-- Properties -->
					<div class="col-md-6">
						<div>
						<h2>
						<img align="left" hspace="4" width="130" src="img/logo.png"> <b> <?php echo htmlentities($_GET['ecole'],ENT_QUOTES,'UTF-8'); ?> <br>
						
						<?php
if ($_GET['m'] == 1) {
    echo "Votre Offre de Fid�lit� 2018 -2019 ";
} elseif ($_GET['m'] == 2) {
    echo "Votre Offre de Bienvenue 2018 -2019";
} else {
    echo "Vos Offres et Remises 2018 -2019";
} 
?></b>
						</div>
							<div> 
							
							<?php
if ($_GET['m'] == 1) {
    echo "<h3>Votre Remise </h3><li> <b>Une remise imm�diate de 310�</b> sur le montant global";
} elseif ($_GET['m'] == 2) {
    echo "<h3>Votre Remise </h3> 
							<li>B�n�ficiez d'une <b>r�duction imm�diate de 150�</b> sur le budget global de votre s�jour. ";
} else {
    echo "<h3>Vos remises </h3>
            <li> <b>Une remise de 310�</b> si vous avez d�j� effectu� un voyage avec BEC
            <li> <b>Une remisSe de 150�</b> pour votre premier voyage avec BEC ";
}
?>




							
							<h3 style="padding-top :35px;">En plus</h3>
							<li><b>8 % de r�duction</b> pour tout s�jour avant le 31 janvier 2019 
<li><b>4 % de r�duction</b> pour tout s�jour entre le 1er et le 28 f�vrier 2019 
<br>
<h3 style="padding-top :35px;">Pourquoi choisir BEC ?</h3>
</div>
						<div class="row">
					<div align="center" class="col-md-6 col-xs-6"><img alt="50 ans bec" width="90" class="img-responsive" src="img/50ans.png">Depuis 1967 � votre service</div>
					<div align="center" class="col-md-6 col-xs-6"><img width="90" src="img/contrat-qualite.png"><br>Labelis� Contrat Qualit� de l'Office</div>
					<div align="center" class="col-md-6 col-xs-6"><img alt="assurance" width="90" src="img/assurance.png"><br>Assurance annulation totale scolaire</div>
					<div align="center" class="col-md-6 col-xs-6"><img   width="90"  src="img/garantie-apst.png"><br>Garantie des Fonds D�pos�s </div>
					</div><br>
					
					<br>De 2013 � 2018 : <br><br>
					<li><font style="font-size: 18px"><b>80</b></font> destinations (<a target="_blank" href="http://www.becfrance.com/doc/brochures-scolaires-2017.pdf">cf catalogue</a>)
					 <li><font style="font-size: 18px"><b>+ 1200</b></font> voyages organis�s
					 <li><font style="font-size: 18px"><b>+ 46.500</b></font> �l�ves et encadrants</b>  
					
					<br>
					<h3 <h3 style="padding-top :35px;">Ils ont voyag� avec nous</h3>
                            <blockquote><i>"Notre premier voyage avec BEC a �t� une magnifique r�ussite et je n'attends qu'une chose : repartir ! Merci encore et f�licitations � votre �quipe : Les �l�ves sont ravis. C'est un plaisir de travailler avec vous."</i>
                                <small>Mme Lavillat � <cite title="Source Title">Coll�ge St Fran�ois</cite></small>
                            </blockquote>
							<blockquote><i>"Tr�s bon travail de l'equipe du BEC. Bonnes visites, les �l�ves ont ador�. C'�tait impeccable !"</i>
                                <small>Mme Philippe � <cite title="Source Title">Coll�ge La Peyroua</cite></small>
                            </blockquote>



					</div>
                     <div class="col-md-6">
                        <!-- Contenu-->               
                                  
<!--?
if(isset($_POST["ok"]) && $_POST["ok"] == 1){
	
	$query = "INSERT INTO devis_minis (destination, nb_adulte, nb_eleve, nb_eleve2,nb_eleve3,nb_pc, age, date_debut, date_fin,depart_nuit,retour_nuit, mode_voyage, mode_voyage2, trav,assurance,ass_complement,classe_etab, date_ca, datetime) VALUES ('".addslashes($_POST["destination"])."', '".addslashes($_POST["nb_adulte"])."', '".addslashes($_POST["nb_eleve"])."', '".addslashes($_POST["nb_eleve2"])."','".addslashes($_POST["nb_eleve3"])."', '".addslashes($_POST["nb_pc"])."', '".addslashes($_POST["age"])."', '".addslashes(date('d-m-y' , strtotime($_POST["date_debut"])))."', '".addslashes(date('d-m-y' , strtotime($_POST["date_fin"])))."','".addslashes($_POST["depart_nuit"])."', '".addslashes($_POST["retour_nuit"])."', '".addslashes($_POST["mode_voyage"])."', '".addslashes($_POST["mode_voyage2"])."', '".addslashes($_POST["trav"])."',  '".addslashes($_POST["assurance"])."','".addslashes($_POST["ass_complement"])."','".addslashes($_POST["classe_etab"])."', '".addslashes($_POST["date_ca"])."', '".date("Y-m-d H:i:s")."')";
	mysql_query($query) or die(mysql_error());
	$id = mysql_insert_id();
	
	
	 $dest =($_POST["destination"]);
	 echo $dest;
	 if (($dest > 1 and $dest < 18 ) or ($dest > 41 and $dest < 49) or ($dest > 75 and $dest < 78) ) {
    echo "angleterre-irlande";
	envoi_mail("dany@becfrance.com", "Devis Angleterre/Irlande depuis votre site Internet ".$url_site2, "Demande de devis Angleterre/Irlande depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le d�tail du devis mini-s�jour.");
} elseif ($dest > 18 and $dest < 22 ) {
    echo "italie";
	envoi_mail("frederic@becfrance.com", "Devis Italie depuis votre site Internet ".$url_site2, "Demande de devis Italie depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le d�tail du devis mini-s�jour.");
} elseif ($dest > 54 and $dest < 56  ) {
    echo "Malte";	
	envoi_mail("caroline@becfrance.com", "Devis Malte depuis votre site Internet ".$url_site2, "Demande de devis Malte depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le d�tail du devis mini-s�jour.");
	envoi_mail("eric@becfrance.com", "Devis Malte depuis votre site Internet ".$url_site2, "Demande de devis Malte depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le d�tail du devis mini-s�jour.");
} elseif ($dest > 21 and $dest < 36 ) {
    echo "espagne";
	envoi_mail("caroline@becfrance.com", "Devis Espagne depuis votre site Internet ".$url_site2, "Demande de devis Espagne depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le d�tail du devis mini-s�jour.");
	
 } elseif (($dest > 36 and $dest < 42 ) or ($dest > 69 and $dest < 73)) {
    echo "Allemagne";	
		envoi_mail("frederic@becfrance.com", "Devis Allemagne depuis votre site Internet ".$url_site2, "Demande de devis Allemagne depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le d�tail du devis mini-s�jour.");
		
 } elseif ($dest > 56 and $dest < 70 ) {
    echo "France";	
		envoi_mail("frederic@becfrance.com", "Devis France depuis votre site Internet ".$url_site2, "Demande de devis France depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le d�tail du devis mini-s�jour.");	
		
		

} elseif ($dest > 88 and $dest < 92 ) {
    echo "Grece";	
		envoi_mail("frederic@becfrance.com", "Devis Grece depuis votre site Internet ".$url_site2, "Demande de devis Grece depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le d�tail du devis mini-s�jour.");			
		envoi_mail("eric@becfrance.com", "Devis Grece depuis votre site Internet ".$url_site2, "Demande de devis Grece depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le d�tail du devis mini-s�jour.");			

} elseif ($dest > 50 and $dest < 53 ) {
    echo "new york";
   envoi_mail("caroline@becfrance.com", "Devis New-York depuis votre site Internet ".$url_site2, "Demande de devis New-York depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le d�tail du devis mini-s�jour.");	
    envoi_mail("eric@becfrance.com", "Devis New-York depuis votre site Internet ".$url_site2, "Demande de devis New-York depuis votre site Internet ".$url_site2."<br><br>Cliquez <a href='".$url_site."/admin'>ici</a> pour vous rendre dans l'administration afin d'obtenir le d�tail du devis mini-s�jour.");	
   
}
	 
	 
	
	
	if($_FILES['fic']['error'] == 0){
		$extension = strtolower(substr($_FILES['fic']['name'], strrpos($_FILES['fic']['name'], ".")+1));
		if($extension == "pdf" || $extension == "doc"){
			move_uploaded_file($_FILES['fic']['tmp_name'], "imagesUp/devis_minis/".$id.".".$extension);
		}else{
			echo "<script>alert('Le fichier envoy� n\'est pas dans un format valide.')</script>";
		}
	}
	
	echo "<script>document.location.href='votre-devis-scolaire2.php?ecole=".$_GET['ecole']."&m=".$_GET['m']."&email=".$_GET['email']."&nom=".$_GET['nom']."&prenom=".$_GET['prenom']."&id=".$id."';</script>";
}else{

?-->

                                                  
             
                  <form style="background-color: rgba(210, 231, 216, 0.5);padding: 10px;" action="localhost/website-bec/votre-devis-scolaire2.php" class="form-horizontal" enctype="multipart/form-data" method="post" id="form" name="form">
				  <input type="hidden" value="0" name="ok" />
					<div class="titles">
                                <span>ETAPE 1/2 : votre voyage</span>
                                <br>
                                <h1><i class="fa fa-edit"></i>&nbsp;Etablir un devis pour un mini-séjour scolaire</h1>  
					</div>
                    <div class="search_box2">
					    <div class="form-row">
							<label class="col-md-2" >Destination  </label>
							<div class="col-md-4">	
                                <label > Pays &nbsp &nbsp &nbsp</label>
                                <select name="destination" id ="destination" class="select" onchange='changeListeVille()' required>											
                                    <option value="">- - -</option>                                    
                                    <option value='Australie'>Australie</option>
                                    <option value='Autriche'>Autriche</option>
                                    <option value='Allemagne'>Allemagne</option>
                                    <option value='Espagne'>Espagne</option>
                                    <option value='France'>France</option>
                                    <option value='Angleterre'>Angleterre</option>
                                    <option value='Ecosse'>Ecosse</option>
                                    <option value='PaysGalles'>Pays de Galles</option>
                                    <option value='Grece'>Grèce</option>
                                    <option value='PaysBas'>Pays Bas</option>
                                    <option value='Irlande'>Irlande</option>
                                    <option value='Italie'>Italie</option>
                                    <option value='Malte'>Malte</option>
                                    <option value='USA'>USA</option>
                                </select>
						    </div>	
                            <div class="col-md-6">	
                                <label >Ville  </label>&nbsp &nbsp &nbsp
                                <select name="ville" class="select" id ="ville" >											
                                    <option value="">- - -</option>
                                    
                                </select>
						    </div>	
					    </div>	
					    <div class="form-row">
							<label  class="col-md-3 control-label">Nombre d'élèves*  </label>
							<div class="form-group col-md-3">								 
							-16 ans <input required name="less16" type="text" value=""   size="2" />
						    </div>
						    <div class="form-group col-md-3">								 
							16 /18 ans<input required name="equal16_18" type="text"  value=""  size="2" />
						    </div>
						    <div class="form-group col-md-3">								 	
							+ 18 ans <input required name="more18" type="text"  value="" size="2" />
						    </div>	
					    </div>	
					<div class="form-group">
						<label  class="col-sm-3 control-label">Nombre d'encadrants* </label>
						<div  class="col-sm-9">								 
							<input required name="framings" mandatory type="text" value="" class="inputtext" size="5" />	
						</div>	
					</div>
                    <div class="form-group">
						<label  class="col-sm-3 control-label">Nombre de PC* </label>
					    <div class="col-sm-9">								 
							<select required name="places" class="select">
                                <option value="">- - -</option>
                                <option value="2PC">2PC</option><option value="3PC">3PC</option><option value="4PC">4PC</option><option value="5">5PC</option><option value="+5">+ de 5PC</option>
                            </select> (Nombre de nuits sur place)	
                        <br>
                            (Pensions Complètes: 1 PC = repas du soir, nuit, petit déjeuner et panier repas).
                        <br />
                        <i>En fonction du point de départ et de la durée du trajet,
                            le nombre total de jours du voyage peut varier, sans incidence sur le nombre de PC, et donc sur le prix
                        </i>
					    <hr>
					</div>	
					</div>
                   <div class="form-group">
						<label  class="col-sm-3"></label>
						<div class="col-sm-9">						 
							  <i>Si vos dates ne sont pas pas encore définies, merci d'inscrire le 1er jour du mois du voyage.</i>
						</div>	
					</div>
                    <div class="form-group">
						<label  class="col-sm-3 control-label">Date de départ de l'établissement*</label>
						<div class="col-sm-4">	
							<input type="date" required class="datepickr" name="date_start">
            
						</div>
						<div class="col-sm-5">incluant un départ de nuit à l'aller <input type="checkbox" name="back_night_to_go" value="1">	
						</div>
					</div>
					
                   <div class="form-group">
						<label  class="col-sm-3 control-label">Date de retour à l'établissement*</label>
						<div class="col-sm-4">	<input type="date" required class="datepickr" name="date_end">							 
					    </div>	
                        <div class="col-sm-5"> incluant un départ de nuit au retour	 
                            <input type="checkbox" name="back_night_forth" value="1">
                        </div>
					</div>
                   <div class="form-group">
							<label  class="col-sm-3 control-label">Mode de voyage </label>
							<div class="col-sm-9">								 
							<select name="mode_travel" class="select">
                            <option value="1-Autocar">Autocar</option>
                            <option value="5-Autorcar+trarversee">Autocar + traversée</option>
                            <option value="2-Avion">Avion</option>
                            <option value="4-TGV+autocar">TGV + autocar francais</option>
                            <option value="3-Train">Train</option>
                    </select>
						</div>	
					</div>
					<div class="form-group">
							<label  class="col-sm-3 control-label">Traversée maritime </label>
							<div class="col-sm-9">								 
							<select name="crossing" class="select">
                        <option value="">- - -</option>
                        <option value="Bateau">Bateau</option>
                        <option value="Eurotunnel">Eurotunnel</option>
                        <option value="Bateau à l'aller - Eurotunnel au retour">Bateau à l'aller - Eurotunnel au retour</option>
                        <option value="Eurotunnel à l'aller - Bateau au retour">Eurotunnel à l'aller - Bateau au retour</option>
                    </select>
						</div>	
					</div>  
					<div class="form-group">
							<label  class="col-sm-3 control-label">Date du CA devant voter le voyage </label>
							<div class="col-sm-9">								 
							<input  type="date"  class="datepickr" name="date_ca">							 
                            
						</div>	
					</div>

					<div class="form-group">
							<label  class="col-sm-3 control-label">Joindre votre programme<br />(doc ou pdf) :</label>
							<div class="col-sm-9">								 
							<input name="prog_file" type="file" />
						</div>	
					</div>
					 <div class="form-group">
							<label  class="col-sm-3 control-label">Assurance souhaitée </label>
							<div class="col-sm-9">								 
							<select name="assurance" class="select">
                       
                        <option value="0">Pas d'assurance</option>
						<option value="3-assistance medicale">Assurance Assistance Médicale/Rapatriement</option>
                        <option value="1-annulation">Assurance Annulation</option>						
						<option value="4-multirisque">Le Pack Multirisque</option>
						          

							</select>
							</div>	
					</div>                    
					<div class="form-group">
							<label  class="col-sm-3 control-label">Assurance complémentaire </label>
							<div class="col-sm-9 tooltip_hover"><a  data-toggle="tooltip" href="#" data-original-title="Cette option impose de prendre une assurance au préalable">Annulation Totale Groupe</a>						 
							<input TYPE="checkbox" name="assurance_comp" value="1">
							</div>	
					</div>
                  
					
					<div align="right"><input  align="right" type="submit"  onClick="javascript:verifForm()" class="button" value="Passer à l'etape 2 - Coordonnées"></div>
                   
                  </form>
                </div>
                <!--? } ?-->
                                  
                                </div>
								
   								
                        <!-- fin contenu -->
						<!-- Aside -->
						                
						
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					
            </section>
            <!-- End content info-->
			<script>
function changeListeVille() {
         var paysEtVilles = {};         
         var pays = document.getElementById("destination");
         var ville = document.getElementById("ville");
    
         while(ville.options.length>1){
            ville.remove(ville.length-1);
         }
         var i=1;
        switch(pays.value){
            case 'Allemagne': 
                paysEtVilles ["Allemagne"] = ["Augsburg", "Berlin", "Cologne", "Lac de constance", "Forêt Noire", 
                                               "Mayence", "Munick - Sud de la bavière", "Nuremberg"];
                for (i = 1; i <= paysEtVilles["Allemagne"].length; i++) {
                    var newVillle = new Option(paysEtVilles["Allemagne"][i-1], i);
                    ville.options.add(newVillle);
                } 
                break;   
            case 'Australie': 
                paysEtVilles ["Australie"] = ["Sydney - Melbourne - Adelaide"];
                for (i = 1; i <= paysEtVilles["Australie"].length; i++) {
                    var newVillle = new Option(paysEtVilles["Australie"][i-1], i);
                    ville.options.add(newVillle);
                }  
                break;   
            case 'Autriche': 
                paysEtVilles ["Autriche"] = ["Vienne"];
                for (i = 1; i <= paysEtVilles["Autriche"].length; i++) {
                    var newVillle = new Option(paysEtVilles["Autriche"][i-1], i);
                    ville.options.add(newVillle);
                }                  
                break;   
            case 'Espagne': 
            paysEtVilles ["Espagne"] = ["Andalousie", "Barcelone", "Circuit Barcelone/Madrid", "Grenade", "Madrid", 
                                        "Salamanquee", "Ségovie", "Santander", "Séville", "St Jacques de Compostelle", 
                                        "Delta de l'Ebre", "Valence", "Valence Fallas", "Valence Intégration Scolaire", "Zamora"];
            for (i = 1; i <= paysEtVilles["Espagne"].length; i++) {
                    var newVillle = new Option(paysEtVilles["Espagne"][i-1], i);
                    ville.options.add(newVillle);
                }
                break;   
            case 'Angleterre': 
                paysEtVilles["Angleterre"] = ["Bath", "Brighton", "Cambridge", "Cheltenham", "Chester", "Intégration scolaire à Londres et sa région", 
                                         "Londres", "Londres à la carte", "Londres Christmas in London", "Circuit Londres/Plymouth", "Oxford", 
                                         "Plymouth", "Portsmouth", "Ramsgate", "Stratford upon Avon", "circuit Angleterre/Ecosse - Circuit Londres/Edimbourg", 
                                         "circuit Angleterre/Irlande - Circuit Londres/Dublin", "Circuit Angleterre/Pays de Galles  - Circuit Londres/Cardiff"];
         
                for (i = 1; i <= paysEtVilles["Angleterre"].length; i++) {
                    var newVillle = new Option(paysEtVilles["Angleterre"][i-1], i);
                    ville.options.add(newVillle);
                }
                break;   
            case 'France': 
                paysEtVilles ["France"] = ["La Provence Romaine", "Châteaux de la Loire", "Normandie", "Auvergne", "Le Parc du Futuroscope",
                                            "Paris", "Paris  Sciences et  Histoire", "Pyrénées", "Strasbourg", "Toulouse", "Verdun"];                
                for (i = 1; i <= paysEtVilles["France"].length; i++) {
                var newVillle = new Option(paysEtVilles["France"][i-1], i);
                    ville.options.add(newVillle);
                }
                break;   
            case 'Ecosse': 
                paysEtVilles ["Ecosse"] = ["Edimbourg", "circuit Angleterre/Ecosse - Circuit Londres/Edimbourg"];
                for (i = 1; i <= paysEtVilles["Ecosse"].length; i++) {
                    var newVillle = new Option(paysEtVilles["Ecosse"][i-1], i);
                    ville.options.add(newVillle);
                }
                break;   
            case 'Grèce': 
                paysEtVilles ["Grèce"] = ["Athènes", "Circuit Grèce Classique", "Grèce classique et météores"];
                for (i = 1; i <= paysEtVilles["Grèce"].length; i++) {
                    var newVillle = new Option(paysEtVilles["Grèce"][i-1], i);
                    ville.options.add(newVillle);
                }
                break;   
            case 'Pays de Galles': 
                paysEtVilles ["Pays de Galles"] = ["Cardiff", "Circuit Angleterre/Pays de Galles  - Circuit Londres/Cardiff"];
                for (i = 1; i <= paysEtVilles["Pays de Galles"].length; i++) {
                    var newVillle = new Option(paysEtVilles["Pays de Galles"][i-1], i);
                    ville.options.add(newVillle);
                }
                break;   
            case 'Irlande': 
                paysEtVilles ["Irlande"] = ["Connemara-Galway", "Cork", "Circuit Cork/Dublin", "Dublin",
                         "Dublin - Intégration Scolaire", "Circuit Galway/Dublin", "circuit Angleterre/Irlande - Circuit Londres/Dublin"];
                         for (i = 1; i <= paysEtVilles["Irlande"].length; i++) {
                    var newVillle = new Option(paysEtVilles["Irlande"][i-1], i);
                    ville.options.add(newVillle);
                }
                break;   
            case 'Italie': 
                paysEtVilles ["Italie"] = ["Florence", "Rome", "Circuit Rome/Sorrente", "Sicile", "Venise"];
                for (i = 1; i <= paysEtVilles["Italie"].length; i++) {
                    var newVillle = new Option(paysEtVilles["Italie"][i-1], i);
                    ville.options.add(newVillle);
                }
                break;   
            case 'Malte': 
                paysEtVilles ["Malte"] = ["Malte"];
                for (i = 1; i <= paysEtVilles["Malte"].length; i++) {
                    var newVillle = new Option(paysEtVilles["Malte"][i-1], i);
                    ville.options.add(newVillle);
                }
                break;   
            case 'USA': 
                paysEtVilles ["USA"] = ["Californie du Sud en Familles hôtesses", "Région de Boston",
                                 "New York", "Virginie", "Washington"];
                for (i = 1; i <= paysEtVilles["USA"].length; i++) {
                    var newVillle = new Option(paysEtVilles["USA"][i-1], i);
                    ville.options.add(newVillle);
                }
                break;      
                default:  
                        paysEtVilles ["Default"] = ["---"];
                        var newVillle = new Option(paysEtVilles["Default"][i-1], i);
                        ville.options.add(newVillle); 
                        ; 
        }
        
         
}
</script>

 <!--? include("footer_scolaires.php"); ?-->          
			   <!--<script type="text/javascript" src='http://becfrance.cameleonapp.com/cache/include/javascript/sugar_grp1.js?v=GsVna68Y_eKoDg9ei3iqbA'></script>-->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Core JS Libraries -->
    <script src="js/jquery.min.js"></script>         
        <!--Nav-->
        <script type="text/javascript" src="js/nav/tinynav.js"></script> 
        <script type="text/javascript" src="js/nav/superfish.js"></script>  
        <script type="text/javascript" src="js/nav/hoverIntent.js"></script>              
        <!--Totop-->
        <script type="text/javascript" src="js/totop/jquery.ui.totop.js" ></script>  
        <!--Slide-->
        <script type="text/javascript" src="js/slide/camera.js" ></script>      
        <script type='text/javascript' src='js/slide/jquery.easing.1.3.min.js'></script> 
        <!--owlcarousel-->
        <script type='text/javascript' src='js/owlcarousel/owl.carousel.js'></script> 
        <!--efect_switcher-->
        <script type='text/javascript' src='js/efect_switcher/jquery.content-panel-switcher.js'></script>         
        <!--Theme Options-->
        <script type="text/javascript" src="js/theme-options/theme-options4.js"></script>
        <script type="text/javascript" src="js/theme-options/jquery.cookies.js"></script> 
        <!-- Bootstrap.js-->
        <script src="js/bootstrap/bootstrap.js"></script>
        <!--fUNCTIONS-->
        <script type="text/javascript" src="js/main.js"></script>
        <!-- ======================= End JQuery libs =========================== -->
		
        
		<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16546505-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 971247872;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<!-- Go to www.addthis.com/dashboard to customize your tools 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55363f1c17e3d6b1" async="async">
</script>-->
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/971247872/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<!--  MouseStats:Begin  -->
<script type="text/javascript">var MouseStats_Commands=MouseStats_Commands?MouseStats_Commands:[]; (function(){function b(){if(void 0==document.getElementById("__mstrkscpt")){var a=document.createElement("script");a.type="text/javascript";a.id="__mstrkscpt";a.src=("https:"==document.location.protocol?"https://ssl":"http://www2")+".mousestats.com/js/5/3/5371972402037218814.js?"+Math.floor((new Date).getTime()/6E5);a.async=!0;a.defer=!0;(document.getElementsByTagName("head")[0]||document.getElementsByTagName("body")[0]).appendChild(a)}}window.attachEvent?window.attachEvent("onload",b):window.addEventListener("load", b,!1);"complete"===document.readyState&&b()})(); </script>
<!--  MouseStats:End  -->
<script type="text/javascript">
(function(a,e,c,f,g,b,d){var h={ak:"971247872",cl:"w6h5CLPvw1wQgKKQzwM"};a[c]=a[c]||function(){(a[c].q=a[c].q||[]).push(arguments)};a[f]||(a[f]=h.ak);b=e.createElement(g);b.async=1;b.src="//www.gstatic.com/wcm/loader.js";d=e.getElementsByTagName(g)[0];d.parentNode.insertBefore(b,d);a._googWcmGet=function(b,d,e){a[c](2,b,h,d,null,new Date,e)}})(window,document,"_googWcmImpl","_googWcmAk","script");
</script>
</body>
</html>