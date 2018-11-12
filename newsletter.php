<!DOCTYPE html><? include("connect.php"); ?>
<html lang="fr">  
  <head> 
               <title>Bec séjours linguistiques adultes - newsletter</title> 
			      
			   <meta name="description" content="Notre lettre d'information sur les séjours linguistiques - BEC Séjours linguistiques">   
			   <meta name="author" content="BEC Séjours linguistiques">    
			   <!-- Mobile Metas -->     
			   <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">
			   <!-- Your styles -->        <link href="css/style.css" rel="stylesheet" media="screen">          <!-- Skins Theme -->        <link href="#" rel="stylesheet" media="screen" class="skin">        <!-- Favicons -->        <link rel="shortcut icon" href="img/icons/favicon.ico">        <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">        <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">          <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->        <!--[if lt IE 9]>          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        <![endif]-->        <!-- styles for IE -->        <!--[if lte IE 8]>        <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />        <![endif]-->                <!-- Skins Changer-->        <script type="text/javascript" src="http://www.google.com/jsapi"></script>	
			   </head><? include("top_bec.php"); ?>
			   
           <!-- Section Title -->            <div class="section_title features"> 
		   <div class="container">                    <div class="row"> 						                        						<div class="col-md-2"></div>						                    </div>                </div>                        </div> 
           <!-- End Section Title -->			            <!-- End content info --> 
		   
           <section class="content_info">	                <div class="container">		
		   <!-- Newsletter Box -->                                      <div class="newsletter_box">                        <div class="container">                            <div class="row">                              								                            </div>                        </div>                    </div>                    <!-- End Newsletter Box -->                        <section class="row padding_top">                        <!-- Properties --> 
		   <div class="col-md-9">                                                        <div class="titles">                                  <h1>Newsletter</h1>							</div>							Inscrivez-vous dés à present à notre newsletter, pour rester informé de l’actualité du site. <br>							<br>Pour toute question, <a href="contact.php">merci de envoyer un message.</a>						</div>                                                                   <!-- fin contenu -->
		   
		   <!-- Aside -->						                												                    </div>                     <!-- contenu bas pages sur toute largeur-->										<div class="container"> 					          					                </div>            </section>            <!-- End content info-->

				

 <? include("footer_home.php"); ?>  

<?
if(isset($_GET['mail'])){
	if($_GET['mail'] != ""){
		connexion();
		if(ValideMail($_GET['mail']) == 1 ){
			$query = "SELECT * FROM mailing WHERE mail = '".addslashes($_GET['mail'])."'";
			$exec = mysql_query($query);						if((mysql_num_rows($exec) == 0) AND ($_GET['inscription']) == 0 )			{			echo "<script>alert('Cette adresse  n\'est  pas présente dans notre liste ')</script>";			}			elseif((mysql_num_rows($exec) != 0) AND ($_GET['inscription']) == 0 )			{			$query2 = "DELETE FROM mailing WHERE mail = '".addslashes($_GET['mail'])."'";				if(mysql_query($query2)){				echo "<script>alert('Votre adresse a été retirée de notre liste.')</script>";				}				else 				{				echo "<script>alert('Un probleme est intervenu dans la procédure de desinscription. Veuillez nous contacter')</script>";				}			}
			elseif((mysql_num_rows($exec) == 0) AND ($_GET['inscription']) == 1 ){				
				$query = "INSERT INTO mailing (mail,groupe) VALUES ('".addslashes($_GET['mail'])."','".addslashes($_GET['groupe'])."')";
				if(mysql_query($query)){
					?>
					<!-- Google Code for Inscription Newsletter Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1064412344;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "_D0CCICn3QEQuMnG-wM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1064412344/?label=_D0CCICn3QEQuMnG-wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

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

                    <?
					echo "<script>alert('Votre adresse mail a bien été enregistrée dans notre newsletter.')</script>";
				}else{
					echo "<script>alert('Une erreur est survenue lors de l\'enregistrement de l\'adresse mail.')</script>";
				}
			}												else{
				echo "<script>alert('Cette adresse mail est déjà enregistrée dans notre newsletter.')</script>";
			}
		}else{
			echo "<script>alert('Cette adresse mail n\'est pas valide.')</script>";
		}
	}else{
		echo "<script>alert('Veuillez saisir une adresse mail.')</script>";
	}
}

?>

<?
if(isset($_SERVER['HTTP_REFERER'])){
	echo "<script>document.location.href='".$_SERVER['HTTP_REFERER']."';</script>";
}
?>