<? include("connect.php"); ?>
<? include("haut.php"); ?>
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
				else if (document.mail.mail.value.length == 0) {alert('Vous n\'avez pas indiqué votre adresse e-mail.'); a="1"; document.mail.mail.focus();}
				else if ((testm==false) && (document.mail.mail.value.length != 0)) {alert('Votre adresse e-mail est incorrecte.'); a="1"; document.mail.mail.focus();}
				else if (document.mail.nom_etab.value.length == 0) {alert('Vous n\'avez pas indiqué votre établissement.'); a="1"; document.mail.nom_etab.focus();}
				else if (document.mail.destination.value.length == 0) {alert('Vous n\'avez pas indiqué votre destination.'); a="1"; document.mail.destination.focus();}
				
				if (a == 0) {
					document.mail.submit();
				}
			}
</script>

<link rel="stylesheet" type="text/css" href="./calendrier/calendrier.css" />
<script language='JavaScript' src='calendrier/browserSniffer.js'></script>
<script language='JavaScript' src='calendrier/dynCalendar.js'></script>

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
                                  <td><img src="images/crochet<?=$fic_nom?>.jpg" align="absmiddle" />&nbsp;<span class="<?=$class_titre?>"><b>Devis</b></span></td>
                                </tr>
                                <tr height="350">
                                  <td valign="top" class="texteGris">
                                  <br />
                                  
<?
            if(isset($_POST["ok"]) && $_POST["ok"] == 1){
	
	$query = "INSERT INTO devis_minis (civilite, nom, prenom, adresse, cp, ville, tel, portable, mail, langue, langue_autre, nom_etab, adresse_etab, adresse_etab2, cp_etab, ville_etab, tel_etab, fax_etab, classe_etab, destination, nb_adulte, nb_eleve, nb_nuitee, age, date_debut, date_fin, mode_voyage, mode_voyage2, trav, message) VALUES ('".addslashes($_POST["civilite"])."', '".addslashes($_POST["nom"])."', '".addslashes($_POST["prenom"])."', '".addslashes($_POST["adresse"])."', '".addslashes($_POST["cp"])."', '".addslashes($_POST["ville"])."', '".addslashes($_POST["tel"])."', '".addslashes($_POST["portable"])."', '".addslashes($_POST["mail"])."', '".addslashes($_POST["langue"])."', '".addslashes($_POST["langue_autre"])."', '".addslashes($_POST["nom_etab"])."', '".addslashes($_POST["adresse_etab"])."', '".addslashes($_POST["adresse_etab2"])."', '".addslashes($_POST["cp_etab"])."', '".addslashes($_POST["ville_etab"])."', '".addslashes($_POST["tel_etab"])."', '".addslashes($_POST["fax_etab"])."', '".addslashes($_POST["classe_etab"])."', '".addslashes($_POST["destination"])."', '".addslashes($_POST["nb_adulte"])."', '".addslashes($_POST["nb_eleve"])."', '".addslashes($_POST["nb_nuitee"])."', '".addslashes($_POST["age"])."', '".addslashes($_POST["date_debut"])."', '".addslashes($_POST["date_fin"])."', '".addslashes($_POST["mode_voyage"])."', '".addslashes($_POST["mode_voyage2"])."', '".addslashes($_POST["trav"])."', '".addslashes($_POST["message"])."')";
	mysql_query($query) or die(mysql_error());
	
	//$mail_site = "mael@amenothes.fr";
	if(envoi_mail($mail_site, "Devis depuis votre site Internet ".$url_site2, "Demande de devis depuis votre site Internet ".$url_site2."<br><br>

Nom : ".htmlentities($_POST["civilite"])." ".htmlentities($_POST["nom"])." ".htmlentities($_POST["prenom"])."<br>
Adresse : ".htmlentities($_POST["adresse"]." ".$_POST["cp"]." ".$_POST["ville"])."<br>
T&eacute;l : ".htmlentities($_POST["tel"])."<br>
Mobile : ".htmlentities($_POST["portable"])."<br>
Mail : ".htmlentities($_POST["mail"])."<br>
Langue : ".htmlentities(($_POST["langue"] != "") ? $_POST["langue"] : $_POST["langue_autre"])."<br><br>

Etablissement : ".htmlentities($_POST["nom_etab"])."<br>
Adresse : ".htmlentities($_POST["adresse_etab"]." ".$_POST["adresse_etab2"]." ".$_POST["cp_etab"]." ".$_POST["ville_etab"])."<br>
T&eacute;l : ".htmlentities($_POST["tel_etab"])."<br>
Fax : ".htmlentities($_POST["fax_etab"])."<br>
Classe concern&eacute;e : ".htmlentities($_POST["classe_etab"])."<br><br>

Destination : ".htmlentities($_POST["destination"])."<br>
Nb adultes : ".htmlentities($_POST["nb_adulte"])."<br>
Nb élèves : ".htmlentities($_POST["nb_eleve"])."<br>
Nb nuitées : ".htmlentities($_POST["nb_nuitee"])."<br>
Age : ".htmlentities($_POST["age"])."<br>
Date de début : ".htmlentities($_POST["date_debut"])."<br>
Date de fin : ".htmlentities($_POST["date_fin"])."<br>
Mode de voyage : ".htmlentities($_POST["mode_voyage"])." - ".htmlentities($_POST["mode_voyage2"])."<br>
Travers&eacute;e maritime : ".htmlentities($_POST["trav"])."<br><br>

Message : ".nl2br(htmlentities($_POST["message"]))."<br>

")){
		echo "<br><br><div align='center' class='texteBleu'><b>Merci, votre demande a bien été envoyée !</b></div><br><br>";
	}else{
		echo "<br><br><div align='center' class='texteBleu'><b>Votre demande n'a pas pu être envoyée.</b></div><br><br>";
	}
}else{

?>
<br />
                                                  
                <table width="100%" border="0" align="center" cellpadding="3" class="texteGris">
                  <form action="" method="post" name="mail" id="mail">
                    <input type="hidden" value="1" name="ok" />
                    <tr><td colspan="2" bgcolor="<?=$bgcolor?>" class="texteBlanc"><b>VOS COORDONN&Eacute;ES</td></tr>
                    <tr>
                      <td width="37%" align="right" class="text">Titre :</td>
                      <td width="63%"><select name="civilite" class="select">
                        <option value="M.">M.</option>
                        <option value="Mme">Mme</option>
                        <option value="Melle">Melle</option>
                    </select></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Nom* :</td>
                      <td><input name="nom" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Pr&eacute;nom :</td>
                      <td><input name="prenom" type="text" value="" class="inputtext" size="40" /></td>
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
                      <td align="right" class="text">Tél :</td>
                      <td><input name="tel" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Portable :</td>
                      <td><input name="portable" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Mail* :</td>
                      <td><input name="mail" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Langue :</td>
                      <td><select name="langue" class="select">
                        <?
						$query = "SELECT * FROM langue WHERE 1 ORDER BY nom";
						$exec = mysql_query($query) or die(mysql_error());
						while($data = mysql_fetch_assoc($exec))
						{
							echo "<option value='".stripslashes($data["nom"])."'>".stripslashes($data["nom"])."</option>";
						}
						?>
                    </select> &nbsp;&nbsp;Autre : <input name="langue_autre" type="text" value="" class="inputtext" size="30" /></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td colspan="2" bgcolor="<?=$bgcolor?>" class="texteBlanc"><b>VOTRE &Eacute;TABLISSEMENT</td></tr>
                    <tr>
                      <td align="right" class="text">Etablissement* :</td>
                      <td><input name="nom_etab" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Adresse :</td>
                      <td><input name="adresse_etab" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Adresse complément :</td>
                      <td><input name="adresse_etab2" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Code postal :</td>
                      <td><input name="cp_etab" type="text" value="" class="inputtext" size="10" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Ville :</td>
                      <td><input name="ville_etab" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">T&eacute;l :</td>
                      <td><input name="tel_etab" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Fax :</td>
                      <td><input name="fax_etab" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Classe concernée :</td>
                      <td><input name="classe_etab" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td colspan="2" bgcolor="<?=$bgcolor?>" class="texteBlanc"><b>VOTRE VOYAGE</td></tr>
                    <tr>
                      <td align="right" class="text">Destination* :</td>
                      <td><select name="destination" class="select" style="width:400px"><option value="">- - -</option>
                        <?
						$query = "SELECT fm.*, p.nom as pays, v.nom as ville FROM fiche_minis fm INNER JOIN minis_pays p ON fm.pays = p.id INNER JOIN minis_ville v ON fm.ville = v.id WHERE 1 ORDER BY p.nom, v.nom, fm.nom";
						$exec = mysql_query($query) or die(mysql_error());
						while($data = mysql_fetch_assoc($exec))
						{
							echo "<option value='".stripslashes($data["pays"])." ".stripslashes($data["ville"])." - ".stripslashes($data["nom"])."'>".stripslashes($data["pays"])." ".stripslashes($data["ville"])." - ".stripslashes($data["nom"])."</option>";
						}
						?>
                    </select></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Nombre d'adultes :</td>
                      <td><input name="nb_adulte" type="text" value="" class="inputtext" size="10" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Nombre d'élèves :</td>
                      <td><input name="nb_eleve" type="text" value="" class="inputtext" size="10" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Nombre de nuitées<br /> sur place :</td>
                      <td><input name="nb_nuitee" type="text" value="" class="inputtext" size="10" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Age :</td>
                      <td><input name="age" type="radio" value="moins de 16 ans" checked="checked" /> moins de 16 ans &nbsp;&nbsp;&nbsp;<input name="age" type="radio" value="plus de 16 ans" /> plus de 16 ans</td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Date de début :</td>
                      <td><table cellpadding="0" cellspacing="0" align="left"><tr><td valign="middle"><INPUT TYPE="text" size="10" name="date_debut" maxlength="250" class="inputtext" readonly="readonly">
<script language="JavaScript" type="text/javascript">
function exampleCallback_ISO1(date, month, year)
{
    if (String(month).length == 1) {
        month = '0' + month;
    }

    if (String(date).length == 1) {
        date = '0' + date;
    }
    document.mail.date_debut.value = date + '/' + month + '/' + year;
}
calendar1 = new dynCalendar('calendar1', 'exampleCallback_ISO1', 'calendrier/');
calendar1.setMonthCombo(true);
calendar1.setYearCombo(true);  
</script>
</td></tr></table></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Date de fin :</td>
                      <td><table cellpadding="0" cellspacing="0" align="left"><tr><td valign="middle"><INPUT TYPE="text" size="10" name="date_fin" maxlength="250" class="inputtext" readonly="readonly">
<script language="JavaScript" type="text/javascript">
function exampleCallback_ISO2(date, month, year)
{
    if (String(month).length == 1) {
        month = '0' + month;
    }

    if (String(date).length == 1) {
        date = '0' + date;
    }
    document.mail.date_fin.value = date + '/' + month + '/' + year;
}
calendar2 = new dynCalendar('calendar2', 'exampleCallback_ISO2', 'calendrier/');
calendar2.setMonthCombo(true);
calendar2.setYearCombo(true);  
</script>
</td></tr></table></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Mode de voyage :</td>
                      <td><input name="mode_voyage" type="radio" value="voyage de jour" checked="checked" /> voyage de jour &nbsp;&nbsp;&nbsp;<input name="mode_voyage" type="radio" value="voyage de nuit" /> voyage de nuit</td>
                    </tr>
                    <tr>
                      <td align="right" class="text"></td>
                      <td><select name="mode_voyage2" class="select">
                        <option value="Tout car">Tout car</option>
                        <option value="TGV + car à Paris">TGV + car à Paris</option>
                        <option value="TGV + car à Lille">TGV + car à Lille</option>
                        <option value="Tout avion">Tout avion</option>
                        <option value="TGV + avion">TGV + avion</option>
                    </select></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Traversée maritime :</td>
                      <td><select name="trav" class="select">
                        <option value="Bateau">Bateau</option>
                        <option value="Eurotunnel">Eurotunnel</option>
                        <option value="Bateau à l'aller - Eurotunnel au retour">Bateau à l'aller - Eurotunnel au retour</option>
                        <option value="Eurotunnel à l'aller - Bateau au retour">Eurotunnel à l'aller - Bateau au retour</option>
                    </select></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td colspan="2" bgcolor="<?=$bgcolor?>" class="texteBlanc"><b>COMMENTAIRE</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                      <td align="right" valign="top" class="text">Message :</td>
                      <td><textarea name="message" cols="50" rows="8" class="textarea"></textarea></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                      <td colspan="2" align="center" valign="bottom"><a href="javascript:verifForm();"><img src="images/btOk<?=$fic_nom?>.jpg" border="0" /></a></td>
                    </tr>
                  </form>
                </table>
                <? } ?>
                                  
                                  </td>
                                </tr>
                              </table></td>
                            <td width="9">&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
                <td width="195" valign="top"><? include("droite".$fic_nom.".php"); ?></td>
              </tr>
            </table>

<? include("bas.php"); ?>