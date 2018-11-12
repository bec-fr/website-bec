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
				else if (document.mail.prenom.value.length == 0) {alert('Vous n\'avez pas indiqué votre prénom.'); a="1"; document.mail.prenom.focus();}
				else if (document.mail.nom_parent.value.length == 0) {alert('Vous n\'avez pas indiqué le nom des parents.'); a="1"; document.mail.nom_parent.focus();}
				else if (document.mail.mail.value.length == 0) {alert('Vous n\'avez pas indiqué votre adresse e-mail.'); a="1"; document.mail.mail.focus();}
				else if ((testm==false) && (document.mail.mail.value.length != 0)) {alert('Votre adresse e-mail est incorrecte.'); a="1"; document.mail.mail.focus();}
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
                            <td height="10">&nbsp;</td>
                          </tr>
                          <tr>
                            <td width="10">&nbsp;</td>
                            <td valign="top" width="201"><? include("include/menu".$fic_nom.".php"); ?></td>
                            <td width="15">&nbsp;</td>
                            <td valign="top"><table cellpadding="0" cellspacing="0" width="560">
                                <tr>
                                  <td><img src="images/crochet<?=$fic_nom?>.jpg" align="absmiddle" />&nbsp;<span class="<?=$class_titre?>"><b>Devis</b></span></td>
                                </tr>
                                <tr height="350">
                                  <td valign="top" class="texteGris">
                                  <br />
                                  
<?
            if(isset($_POST["ok"]) && $_POST["ok"] == 1){
	
	$query = "INSERT INTO devis_junior (nom, prenom, datenaiss, nationalite, sexe, classe, nom_parent, adresse, cp, ville, tel, portable, mail, destination, formule, message) VALUES ('".addslashes($_POST["nom"])."', '".addslashes($_POST["prenom"])."', '".addslashes($_POST["datenaiss"])."', '".addslashes($_POST["nationalite"])."', '".addslashes($_POST["sexe"])."', '".addslashes($_POST["classe"])."', '".addslashes($_POST["nom_parent"])."', '".addslashes($_POST["adresse"])."', '".addslashes($_POST["cp"])."', '".addslashes($_POST["ville"])."', '".addslashes($_POST["tel"])."', '".addslashes($_POST["portable"])."', '".addslashes($_POST["mail"])."', '".addslashes($_POST["destination"])."', '".addslashes($_POST["formule"])."', '".addslashes($_POST["message"])."')";
	mysql_query($query) or die(mysql_error());
	
	//$mail_site = "mael@amenothes.fr";
	if(envoi_mail($mail_site, "Devis depuis votre site Internet ".$url_site2, "Demande de devis depuis votre site Internet ".$url_site2."<br><br>

Nom : ".htmlentities($_POST["nom"])." ".htmlentities($_POST["prenom"])."<br>
Date de naissance : ".htmlentities($_POST["datenaiss"])."<br>
Nationalit&eacute; : ".htmlentities($_POST["nationalite"])."<br>
Sexe : ".htmlentities($_POST["sexe"])."<br>
Classe : ".htmlentities($_POST["classe"])."<br><br>

Nom des parents : ".htmlentities($_POST["nom_parent"])."<br>
Adresse : ".htmlentities($_POST["adresse"]." ".$_POST["cp"]." ".$_POST["ville"])."<br>
T&eacute;l : ".htmlentities($_POST["tel"])."<br>
Mobile : ".htmlentities($_POST["portable"])."<br>
Mail : ".htmlentities($_POST["mail"])."<br><br>

Destination : ".htmlentities($_POST["destination"])."<br>
Formule : ".htmlentities($_POST["formule"])."<br><br>

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
                    <tr><td colspan="2" bgcolor="<?=$bgcolor?>" class="texteBlanc"><b>LE PARTICIPANT</td></tr>
                    <tr>
                      <td width="37%" align="right" class="text">Nom* :</td>
                      <td width="63%"><input name="nom" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Pr&eacute;nom* :</td>
                      <td><input name="prenom" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Date de naissance :</td>
                      <td><input name="adresse" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Nationalité :</td>
                      <td><input name="nationalite" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Sexe :</td>
                      <td><input type="radio" name="sexe" value="h" checked="checked" /> h &nbsp;&nbsp;<input type="radio" name="sexe" value="f" /> f</td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Classe :</td>
                      <td><input name="classe" type="text" value="" class="inputtext" size="40" /></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td colspan="2" bgcolor="<?=$bgcolor?>" class="texteBlanc"><b>LES PARENTS</td></tr>
                    <tr>
                      <td align="right" class="text">Nom des parents* :</td>
                      <td><input name="nom_parent" type="text" value="" class="inputtext" size="40" /></td>
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
                    <tr><td>&nbsp;</td></tr>
                    <tr><td colspan="2" bgcolor="<?=$bgcolor?>" class="texteBlanc"><b>VOTRE VOYAGE</td></tr>
                    <tr>
                      <td align="right" class="text">Destination* :</td>
                      <td><select name="destination" class="select"><option value="">- - -</option>
                        <?
                        $query = "SELECT fj.*, p.nom as pays, v.nom as ville FROM fiche_junior fj INNER JOIN junior_pays p ON fj.pays = p.id INNER JOIN junior_ville v ON fj.ville = v.id WHERE 1 ORDER BY p.nom, v.nom, fj.nom";
						$exec = mysql_query($query) or die(mysql_error());
						while($data = mysql_fetch_assoc($exec))
						{
							echo "<option value='".stripslashes($data["pays"])." ".stripslashes($data["ville"])." - ".stripslashes($data["nom"])."'>".stripslashes($data["pays"])." ".stripslashes($data["ville"])." - ".stripslashes($data["nom"])."</option>";
						}
						?>
                    </select></td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Formule :</td>
                      <td><select name="formule" class="select"><option value="">- - -</option>
                        <?
                        $query = "SELECT * FROM formule_junior WHERE 1 ORDER BY nom";
						$exec = mysql_query($query) or die(mysql_error());
						while($data = mysql_fetch_assoc($exec))
						{
							echo "<option value='".stripslashes($data["nom"])."'>".stripslashes($data["nom"])."</option>";
						}
						?>
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