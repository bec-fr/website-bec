<?
include("inc/conf.php");
include("inc/fonctions.php");
connexion();
?>
		
<html>
<head>
<link rel="Shortcut Icon" href="favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$nom_site?></title>
<meta name="Description" content="Site Internet <?=$nom_site?>">
<meta name="Keywords" content="<?=$nom_site?>">
<style type="text/css">
.norm{
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;		
}
.Style2 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
</style>
<style type="text/css" media="print">
.norm{
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;		
}
.Style2 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
.cache {display:none; }
</style>
</head>

<body>

<?
$query = "SELECT r.*, f.nom as fiche, d.nom as date FROM reservation_junior r LEFT OUTER JOIN fiche_junior f ON r.rid_fiche = f.id LEFT OUTER JOIN fiche_junior_date d ON r.rid_date = d.id WHERE r.id = '".addslashes($_GET['id'])."'";
$exec = mysql_query($query) or die(mysql_error());
if(mysql_num_rows($exec) > 0){
	$row = mysql_fetch_array($exec);
	
	$query_d = "SELECT fj.*, p.nom as pays, v.nom as ville, p.id as idpays FROM fiche_junior fj INNER JOIN junior_pays p ON fj.pays = p.id INNER JOIN junior_ville v ON fj.ville = v.id WHERE fj.id = '".$row["rid_fiche"]."'";
	$exec_d = mysql_query($query_d) or die(mysql_error());
	$data_d = mysql_fetch_assoc($exec_d);
	
?>

<table width="95%" border="0" align="center" class="norm">
<tr><td height="20">&nbsp;</td><td rowspan="3" height="120" width="120">
	<table style="border:#000 1px solid;" border="0" align="center" cellpadding="3" cellspacing="0" class="norm">
    <tr><td align="center" width="90" height="120"><b>Photo<br>R�cente</b><br>� coller<br>ou agrafer</td></tr>
    </table>
</td></tr>
<tr><td height="40" bgcolor="#0071bb" style="color:#FFF; font-size:18px; padding:6px;"><b><i>BULLETIN D'INSCRIPTION</i></b></td></tr>
<tr><td valign="top">Merci de remplir ce document avec le plus de pr�cision possible pour un traitement plus rapide.</td></tr>
</table>

<table width="95%" align="center" class="norm" cellpadding="3">
<tr><td><b>Renseignements personnels</b></td></tr>
<tr><td>Nom : <?=stripslashes($row["nom"])?> _____________________________ &nbsp;&nbsp;Pr�nom : <?=stripslashes($row["prenom"])?> _____________________________</td></tr>
<tr><td><input type="checkbox"> Masculin &nbsp;&nbsp;<input type="checkbox"> F�minin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date de naissance : <?=parseDate($row["datenaiss"])?> ___________________</td></tr>
<tr><td>Profession du p�re : ___________________________ &nbsp;&nbsp;T�l. Travail : ___________________________________</td></tr>
<tr><td>Portable : ___________________________________ &nbsp;&nbsp;&nbsp;E-Mail : ____________________________________</td></tr>
<tr><td>Profession de la m�re : _________________________ &nbsp;&nbsp;T�l. Travail : ___________________________________</td></tr>
<tr><td>Portable : ___________________________________ &nbsp;&nbsp;&nbsp;E-Mail : ____________________________________</td></tr>
<tr><td>Adresse : <?=stripslashes($row["adresse"])?> ____________________________________________________________</td></tr>
<tr><td>Code postal : <?=stripslashes($row["cp"])?> _______________________ &nbsp;&nbsp;Ville : <?=stripslashes($row["ville"])?> _____________________________</td></tr>
<tr><td>Situation de famille des parents <input type="checkbox"> Mari�s &nbsp;&nbsp; <input type="checkbox"> Vie maritale &nbsp;&nbsp; <input type="checkbox"> Veuf/veuve Divorc�(e) &nbsp;&nbsp; <input type="checkbox"> C�libataire</td></tr>
<tr><td>Fr�res et soeurs : Nom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pr�nom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date de naissance &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Classe</td></tr>
<tr><td>_________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ______________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ______________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ______________</td></tr>
<tr><td>_________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ______________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ______________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ______________</td></tr>
<tr><td height="5"></td></tr>
<tr><td><b>Renseignements compl�mentaires</b></td></tr>
<tr><td>Dates de vacances des parents : du ___________________________ &nbsp;&nbsp;au : _____________________________</td></tr>
<tr><td>T�l. _______________________________________________________________________________________</td></tr>
<tr><td>Niveau en anglais <input type="checkbox"> Bon &nbsp;&nbsp; <input type="checkbox"> Moyen &nbsp;&nbsp; <input type="checkbox"> Faible</td></tr>
<tr><td>Sport et distractions pr�f�r�s <input type="checkbox"> Lecture &nbsp;&nbsp; <input type="checkbox"> Natation &nbsp;&nbsp; <input type="checkbox"> Football &nbsp;&nbsp; <input type="checkbox"> Natation &nbsp;&nbsp; <input type="checkbox"> Instr. musique</td></tr>
<tr><td>Le jeune est-il autoris� et apte � pratiquer tous les sports : <input type="checkbox"> Oui &nbsp;&nbsp;<input type="checkbox"> Non</td></tr>
<tr><td>A l'exception des sports suivants : ________________________________________________________________</td></tr>
<tr><td>Sant� (voir informations importantes au verso) - R�ponse d�taill�e obligatoire :</td></tr>
<tr><td>Le jeune est-il en bonne sant� : <input type="checkbox"> Oui &nbsp;&nbsp;<input type="checkbox"> Non</td></tr>
<tr><td>veuillez nous indiquer toute information particuli�re (allergie l�g�re si oui, pr�ciser laquelle - r�gime particulier, asthme l�ger, somnambulisme, handicap l�ger, etc)</td></tr>
<tr><td>____________________________________________________________________________________________</td></tr>
<tr><td height="5"></td></tr>
<tr><td><b>Autorisation sp�ciale</b> (r�ponse obligatoire � l'inscription - voir � infos importantes � au verso)</td></tr>
<tr><td>Le participant est-il autoris� � sortir seul le soir : <input type="checkbox"> Oui &nbsp;&nbsp;<input type="checkbox"> Non</td></tr>
<tr><td>Autorisation valable uniquement pour le s�jour � Brighton, sans accompagnement d'un adulte, jusqu'� maximum 22 heures et pour les plus de 15 ans.</td></tr>
</table>

<div style='page-break-after:always'></div>

<table width="95%" align="center" class="norm" cellpadding="3">
<tr><td><b>S�jour choisi</b></td></tr>
<tr><td>Pays : <?=stripslashes($data_d["pays"])?> ; Ville : <?=stripslashes($data_d["ville"])?></td></tr>
<tr><td>Date : <?=stripslashes($row["date"])?></td></tr>
<tr><td>Mode d'h�bergement choisi : <input type="checkbox"> Famille &nbsp;&nbsp; <input type="checkbox"> Campus &nbsp;&nbsp; <input type="checkbox"> H�tel</td></tr>
<tr><td>Pour les s�jours en famille aux USA, un dossier d'inscription compl�mentaire est envoy� � r�ception de ce document.</td></tr>
<tr><td height="5"></td></tr>
<tr><td><b>Tarif du s�jour choisi</b> ___________________________________________________________________ <?=$data_d["tarif"]?> �</td></tr>
<tr><td><b>D�part de Province</b></td></tr>
<?
$total = $data_d["tarif"];
if(isset($row["preacheminement"]) && $row["preacheminement"] == "1"){
	$total += 150;
}
?>
<? if($row["preacheminement"] == "1"){ ?>
<tr><td>Pr�acheminement de Province en Avion/Train depuis <?=stripslashes($data_d["preacheminement_ville"])?> _____________________________________ 150 �</td></tr>
<? } ?>
<?
if(isset($row["accueil_paris"]) && $row["accueil_paris"] == "1"){
	$total += 80;
}
?>
<? if($row["accueil_paris"] == "1"){ ?>
<tr><td>Accueil aller et retour � Paris � la Gare* <?=stripslashes($data_d["gare"])?> ________________________________________________ 80 �</td></tr>
<? } ?>
<?
if(isset($row["accueil_paris_aeroport"]) && $row["accueil_paris_aeroport"] == "1"){
	$total += 120;
}
?>
<? if($row["accueil_paris_aeroport"] == "1"){ ?>
<tr><td>Accueil aller et retour � Paris � l'a�roport de* <?=stripslashes($data_d["aeroport"])?> ___________________________________________ 120 �</td></tr>
<? } ?>
<tr><td><b>Assurances</b></td></tr>
<?
$soustotal = $total;
if(isset($row["ass_annulation"]) && $row["ass_annulation"] == "1"){
	$total += $soustotal*0.03;
}
?>
<? if($row["ass_annulation"] == "1"){ ?>
<tr><td>Annulation / Bagages (3% du montant total du s�jour) __________________________________________ <?=($soustotal*0.03)?> �</td></tr>
<? } ?>
<?
if(isset($row["ass_interruption"]) && $row["ass_interruption"] == "1"){
	$total += $soustotal*0.045;
}
?>
<? if($row["ass_interruption"] == "1"){ ?>
<tr><td>Pack multirisques (4,5 % du montant total du s�jour) ________________________________________________ <?=($soustotal*0.045)?> �</td></tr>
<? } ?>
<tr><td height="5"></td></tr>
<tr><td><b>Montant total du s�jour avec options et assurances</b> __________________________________________ <?=$row["total"]?> �</td></tr>
<tr><td height="5"></td></tr>
<tr><td><b>Mode de paiement</b></td></tr>
<tr><td>Merci de joindre l'acompte de 400� � ce dossier, major� du prix des assurances souscrites. A moins de 6 semaines du d�part,<br>joindre obligatoirement la totalit� du prix du s�jour.<br>
Je verse ce jour : ________ �  &nbsp;&nbsp;&nbsp;&nbsp; par ch�que bancaire/postal � l'ordre de B.E.C. (un ch�que par enfant)</td></tr>
<tr><td height="15"></td></tr>
<tr><td style="border:#000 1px solid">
    <b>Engagement</b><br><br>
    Je soussign�(e), _______________________________ r�pr�sentant l�gal de ______________________________________ d�clare exacts les renseignements fournis ci-dessus et certifie n'avoir omis aucune information importante. <br>J'autorise mon enfant � participer � ce s�jour et accepte sans r�serve les modalit�s et les "conditions particuli�res de vente" de la brochure. Je donne l'autorisation en cas d'urgence de prendre toutes dispositions pour hospitaliser mon enfant et l'op�rer (y compris anesth�sie) si cela s'av�rait n�cessaire.<br><br>
    <table width="100%" class="norm">
    <tr><td width="33%">Fait � _______________________</td><td width="33%" align="center">Signature du repr�sentant l�gal</td><td width="33%" align="center">Signature pour B.E.C.</td></tr>
    <tr><td height="40">le ________________________</td><td align="center"></td><td align="center"><img src="images/bec_signature.gif" border="0"></td></tr>
    </table>
    <br> 
    Pour �tre accept�, ce bulletin doit �tre compl�tement rempli et sign�. Nous vous recommandons d'en garder une copie. L'inscription ne deviendra d�finitive et n'aura valeur de contrat qu'apr�s envoi par B.E.C. du document
    appel� � confirmation d'inscription � et ce, sous r�serve des places disponibles.
</td></tr>
<tr><td height="5"></td></tr>
<tr><td><b>Information importantes</b></td></tr>
<tr><td style="font-size:10px">
� Nous regrettons de ne pouvoir accepter les jeunes atteints de maladies, de troubles (tels que �nur�sie, h�mophilie, spasmophilie, �pilepsie ou anorexie) ou de handicaps (c�cit�, surdit�) qui porteraient atteinte au bon d�roulement de leur s�jour et mettraient ou pourraient mettre en danger leur sant�.<br>
� En cas de non respect de l'interdiction imp�rative de sortie le soir, nous serons contraints de rapatrier le jeune aux frais de ses parents sans possibilit� de remboursement.<br>
� La conduite de tout v�hicule ou engin � moteur ainsi que la pratique de l'auto-stop sont rigoureusement interdites � tous les participants.
</td></tr>
</table>


<div class="cache">
<br><br>
<center><input type="button" value="Fermer" onClick="window.close();" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Imprimer" onClick="window.print();" /></center>
</div>

<?
}else{
	echo "<script>alert('La commande n\'existe pas.'); window.close(); document.location.href='index.php';</script>";
}
?>

</body>
</html>