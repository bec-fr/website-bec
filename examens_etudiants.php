<!DOCTYPE html>
<? include("connect.php"); ?>
<html lang="fr">
    <head>        
        <title>Bec s�jours linguistiques adultes - les examens officiels UK & USA</title>  
               <meta name="description" content="Preparez votre examen de langue avec le BEC : TOEFL,TOEIC,IELTS, Cambridge ">
        <meta name="author" content="BEC s�jours linguistiques">  
        
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">
        <!-- Your styles -->
        <link href="css/style.css" rel="stylesheet" media="screen">  

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
        
     
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
		
    </head>
<? include("top_adultes.php"); ?>
           <!-- Section Title -->
            <div class="section_title features">
                <div class="container">
                    <div class="row"> 
						
                        <div class="col-md-10"><br>
                            <h1>LES EXAMENS OFFICIELS</h1>
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
                              <div class="col-md-9 titre"> 
										<span><?=($fil_ariane)?></span>				
                                </div>								
                            </div>
                        </div>
                    </div>
                    <!-- End Newsletter Box -->
                                        <section class="row padding_top">
                        <!-- Properties -->
                        <div class="col-md-9">
                            <!-- Contenu-->
							<div class="titles">
                                  <p><strong>ANGLAIS</strong></p>
                                  
                                  <p><strong class="texteBleu">Les examens anglais</strong><br />
Les certificats Cambridge sont reconnus partout dans le monde et constituent une preuve de votre niveau en Anglais pour les universit�s, les grandes �coles et les employeurs. La dur�e des cours de pr�paration � ces examens est g�n�ralement de 10 � 12 semaines et les sessions d'examens se d�roulent en g�n�ral en d�cembre et en juin. Une session en mars est �galement pr�vue pour le FCE et le CAE. L'IELTS peut se passer tous les mois.<br />

 <p><strong class="texteBleu">Les examens am�ricains</strong><br />
                                  Les deux principaux examens (TOEFL et TOEIC) qui ont �t� d�velopp�s aux Etats-Unis sont aujourd'hui reconnus par les grandes entreprises internationales.</p>
<?
														  $query2 = "SELECT * FROM examen ORDER BY nom";
														  $exec2 = mysql_query($query2) or die(mysql_error());
														  while($data2 = mysql_fetch_assoc($exec2)){
															  ?>
														  
													<h2> <?=stripslashes($data2["nom"])?></h2><br><br>
														
													   
															 <?=stripslashes($data2["description"])?><br>
															 <div class="row">
															 <div class="col-md-8 col-sm-1 ">&nbsp;</div>
															 <diV align="right" class="button col-md-4 col-sm-11"><a class="bouton" href="recherche.php?examen=<?=$data2["id"]?>"><i class="fa fa-book"></i>&nbsp;Liste des �coles</a></div>
															 
															</div>	
															<hr>
														
														                 
													  
													  <?
														  }
														  ?>


                                  
                                 
                                    
                           </div>

						   </div>               
                        <!-- fin contenu -->
						<!-- Aside -->
						<? include("droite_adultes.php"); ?>                        
						
						
                    </div>
                     <!-- contenu bas pages sur toute largeur-->

					
					
            </section>
            <!-- End content info-->

 <? include("footer.php"); ?>        