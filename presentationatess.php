<?
session_start();
$_SESSION["site"] = "junior";
?>
<? include("connect.php"); ?>
<? include("haut.php"); ?>

						<table width="100%" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="10"></td>
                          </tr>
                          <tr>
                            <td width="9"></td>
                            <td valign="top" width="203"><? include("include/menu".$fic_nom.".php"); ?></td>
                            <td width="10"></td>
                            <td width="555" align="left" valign="top"><table cellpadding="0" cellspacing="0" width="550">
                                <tr>
                                  <td><img src="images/crochet<?=$fic_nom?>.jpg" align="absmiddle" />&nbsp;<span class="<?=$class_titre?>"><b>Présentation</b></span></td>
                                </tr>
                                <tr height="350">
                                  <td valign="top" class="texteGris" align="left" style="text-align:justify">
                                  <br />
                                  
                                  <p>Depuis 1967, le BEC est sp&eacute;cialis&eacute; dans l&rsquo;organisation de  S&eacute;jours Linguistiques pour adolescents et de voyages scolaires &eacute;ducatifs pour  les coll&egrave;ges et lyc&eacute;es. <br />
                                    Immatricul&eacute; aupr&egrave;s d&rsquo;Atout France (IM 075 11 0001), le  BEC est membre de l&rsquo;Office National de garantie des s&eacute;jours et stages  linguistiques et s&rsquo;engage sur les termes du Contrat Qualit&eacute; &eacute;labor&eacute; en  collaboration avec des f&eacute;d&eacute;rations de parents d&rsquo;&eacute;l&egrave;ves et des associations de  consommateurs agr&eacute;&eacute;es.</p>
                                  <p><strong>Les S&eacute;jours  Juniors</strong>&nbsp;sont  destin&eacute;s aux adolescents de 12 &agrave; 17 ans (inclus) et se d&eacute;roulent durant l'&eacute;t&eacute;.  Nous proposons&nbsp;:</p>
                                  <ul type="disc">
                                    <li>8 destinations&nbsp;:       Angleterre, USA, Irlande, Ecosse, Malte, Australie, Chypre et Espagne, </li>
                                    <li>3 modes d'h&eacute;bergement : en       familles h&ocirc;tesses, en campus ou en h&ocirc;tels, </li>
                                    <li>5 formules&nbsp;: Langue &amp;       D&eacute;couverte, Langue &amp; Sports, 100% Anglais, Semi Immersion, D&eacute;couverte       et Int&eacute;gration scolaire en Australie. </li>
                                  </ul>
                                  <p><strong>Et pour tous  les s&eacute;jours,</strong></p>
                                  <ul type="disc">
                                    <li>Toutes les activit&eacute;s et       excursions mentionn&eacute;es sont <strong>incluses,</strong></li>
                                    <li>Vous choisissez vous-m&ecirc;me votre       ville de s&eacute;jour, </li>
                                    <li>Le transport est exclusivement       propos&eacute; en <strong>avion ou Eurostar</strong>. </li>
                                    <li>L'h&eacute;bergement en campus est       propos&eacute; <strong>au sein des universit&eacute;s</strong>, <strong><u>en chambre individuelle ou       double</u></strong></li>
                                    <li>L&rsquo;encadrement est assur&eacute; par       nos moniteurs. </li>
                                    <li>Quotas de Francophones sur tous       les centres; &eacute;changes avec d'autres Jeunes Europ&eacute;ens, </li>
                                    <li>Plusieurs solutions de prise en       charge depuis la Province</li>
                                    <li><strong>Nous restons disponibles       pendant le s&eacute;jour de votre enfant 7J/7 et 24H/24,</strong></li>
                                  </ul>
                                  <p style="color:#FF0000"><strong>Utilisez  le moteur de recherche de notre site pour trouver la formule la plus adapt&eacute;e &agrave;  votre profil et b&eacute;n&eacute;ficiez d&rsquo;une r&eacute;duction de 8%* gr&acirc;ce au portail de l&rsquo;ATESS&nbsp;avec  le code de r&eacute;duction suivant&nbsp;: ATESS13 </strong><br />
                                    <strong>ou  contactez-nous au </strong><strong>01  55 35 25 00</strong></p><br />
                                    <span style="font-size:10px"><strong>*8%  applicables sur tous les s&eacute;jours, hors &eacute;ventuelles taxes d&rsquo;a&eacute;roports, options  et assurances souscrites, &agrave; l&rsquo;aide de votre code de r&eacute;duction.</strong></span>
                                  
                                  </td>
                                </tr>
                             </table></td>
                           </tr>
                         </table>
						</td>
                    </tr>
                  </table></td>
                <td width="195" valign="top"><? include("droite".$fic_nom.".php"); ?></td>
              </tr>
            </table>

<? include("bas.php"); ?>