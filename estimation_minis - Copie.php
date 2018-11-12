<?
session_start();
include("inc/conf.php");
include("inc/fonctions.php");
connexion();

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><META NAME="robots" CONTENT="noindex">
<title>Bec France - estimation séjour minis</title><link href="css/style.css" rel="stylesheet" media="screen">  


<link type="text/css" href="css/jquery.alerts.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.0.0.js"></script>
<script type="text/javascript" src="js/jquery.alerts.js"></script>
</head>

<body bgcolor="#ffffff">

<?
$query_d = "SELECT fm.*, p.nom as pays, v.nom as ville FROM fiche_minis fm INNER JOIN minis_pays p ON fm.pays = p.id INNER JOIN minis_ville v ON fm.ville = v.id WHERE fm.id = '".addslashes($_GET["fiche"])."'";
$exec_d = mysql_query($query_d) or die(mysql_error());
$data_d = mysql_fetch_assoc($exec_d);
//echo $data_d["tarif_nbjour_max"]."<br>";
?>
<script>
		function verifForm(){
			a="0";
			var min_duree = <?=$data_d["tarif_nbjour_min"]?>;
			var max_duree = <?=$data_d["tarif_nbjour_max"]?>;
			
			if (document.form.duree.value.length == 0) {alert('Vous n\'avez pas saisi de durée.'); a="1"; document.form.duree.focus();}
			else if (document.getElementById("zone").options[document.getElementById("zone").selectedIndex].value == "") {alert('Vous n\'avez pas sélectionné d\'académie.'); a="1";}
			//else if (document.form.duree.value < min_duree) {alert('La durée doit faire au moins '+min_duree+' PC.'); a="1"; document.form.duree.focus();}
			else if (document.form.duree.value < min_duree || document.form.duree.value > max_duree) {jAlert('Votre demande nécessite un calcul personnalisé. Adressez-nous votre demande en 2 étapes sur le lien suivant : <a href="devis_minis.php" target="_blank">demande de devis</a>', 'Message'); a="1"; document.form.duree.focus();}//jAlert('Vous devez<br>' + msg, 'Votre saisie est incomplète')
			
			if (a == 0) {
				document.form.submit();
			}
		}
</script>

<table width="100%" border="0" ><tr><td align="center" style="padding:5px;">

<div align="center" style="font-size:18px; font-weight:bold;  border-radius:5px; padding:4px;">ESTIMATION TARIFAIRE <b><?=stripslashes($data_d["pays"])?> - <?=stripslashes($data_d["ville"])?></b></div>
<?
$id_fiche = $_GET["fiche"];
$zone="";
if(isset($_GET["zone"]) && $_GET["zone"] != ""){
	$zone = $_GET["zone"];
}
$heb="";
if(isset($_GET["heb"]) && $_GET["heb"] != ""){
	$heb = $_GET["heb"];
}

$total = "";
if(isset($_GET["duree"]) && $_GET["duree"] != ""){
	$duree = $_GET["duree"];
}else{
	$duree = $data_d["tarif_nbjour_min"]; //7 jours = 4 PC
}
/*$duree += 3;
echo "duree:".$duree."<br>";*/

if(isset($_GET["ok"]) && $_GET["ok"] == "1"){
	$query = "SELECT tarif FROM fiche_minis_tarif WHERE rid_fiche_minis = '".addslashes($id_fiche)."'";
	if($zone != ""){
		$query .= " AND rid_zone = '".addslashes($zone)."'";
	}
	if($heb != ""){
		$query .= " AND rid_hebergement = '".addslashes($heb)."'";
	}
	//echo $query."<br>";
	$exec = mysql_query($query) or die(mysql_error());
	$data = mysql_fetch_row($exec);
	$total = $data[0];
	
	//prix de la journée supplémentaire
	$query2 = "SELECT tarif FROM fiche_minis_tarif WHERE rid_fiche_minis = '".addslashes($id_fiche)."' AND rid_zone = '25'";
	if($heb != ""){
		$query .= " AND rid_hebergement = '".addslashes($heb)."'";
	}
	$exec2 = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_row($exec2);
	$prix_sup = $data2[0];
	
	$total += $prix_sup*($duree-$data_d["tarif_nbjour_min"]);
}else{
	$total = minis_prix_a_partir_de($id_fiche);
}
?>
<form name="form" action="" method="get">
<input type="hidden" name="ok" value="1">
<input type="hidden" name="fiche" value="<?=$id_fiche?>">
<table width="100%" border="0" class="texteGris" style="border:1px solid #EDEDED; padding:10px; border-radius:4px; ">
<tr><td colspan="2" align="center"><strong><?=(($_GET["fiche"] == "51" || $_GET["fiche"] == "52" || $_GET["fiche"] == "55") ? "L'estimation est établie pour 36 participants payants (33 élèves et 3 professeurs)." : "L'estimation est établie pour 53 participants payants (49 élèves et 4 professeurs)</br>avec un transport en autocar de tourisme de 53 places.")?></strong></td></tr>
<tr><td colspan="2"><hr style="border:none; border-bottom:1px solid #FFF;"></td></tr>
<tr><td width="36%" align="right">Nombre d'enfants : </td><td width="64%" style="color:#009EE1; font-size:14px;">&nbsp;<b><?=(($_GET["fiche"] == "51" || $_GET["fiche"] == "52" || $_GET["fiche"] == "55") ? "33" : "49")?></b></td></tr>
<tr><td align="right">Nombre d'adultes : </td><td style="color:#009EE1; font-size:14px;">&nbsp;<b><?=(($_GET["fiche"] == "51" || $_GET["fiche"] == "52" || $_GET["fiche"] == "55") ? "3" : "4")?></b></td></tr>
<tr><td align="right">Académie : </td><td><select name="zone" id="zone" class="select" onChange="document.form.submit();"><option value="">Sélectionnez votre académie</option>
<?
$query2 = "SELECT * FROM zone ORDER BY id_zone";
$exec2 = mysql_query($query2) or die(mysql_error());
while($data2 = mysql_fetch_assoc($exec2)){
	?>
	<option value="<?=$data2["id_zone"]?>" <?=(($zone == $data2["id_zone"]) ? " selected" : "")?>><?=stripslashes($data2["nom"])?></option>
	<?
}
?>
</select></td></tr>
<tr><td align="right">Hébergement : </td><td><select name="heb" id="heb" class="select" onChange="document.form.submit();"><option value="">Sélectionnez votre type d'hébergement</option>
<?
$query2 = "SELECT * FROM hebergement_minis2 WHERE 1";
if($zone != ""){
	$query2 .= " AND id IN (SELECT rid_hebergement FROM fiche_minis_tarif WHERE rid_zone = '".addslashes($zone)."')";
}
$query2 .= " ORDER BY nom";
$exec2 = mysql_query($query2) or die(mysql_error());
while($data2 = mysql_fetch_assoc($exec2)){
	?>
	<option value="<?=$data2["id"]?>" <?=(($heb == $data2["id"]) ? " selected" : "")?>><?=stripslashes($data2["nom"])?></option>
	<?
}
?>
</select></td></tr>
<tr><td align="right">Nombre de PC : </td><td><input type="text" name="duree" size="3" value="<?=((isset($_GET["duree"]) && $_GET["duree"] != "") ? $_GET["duree"] : $data_d["tarif_nbjour_min"])?>" maxlength="2" class="inputtext"> &nbsp;&nbsp;<input type="button" value="OK" onClick="verifForm()" style="background:url(http://www.becfrance.com/images/fond_btn_rouge_bandeau.png); border:none; border-radius:3px; padding:3px 5px; color:#FFFFFF; font-weight:bold; cursor:pointer;"></td></tr>
<tr height="10"><td></td></tr>
<tr>
  <td colspan="2" style="font-size:12px" align="center">(Pensions Complètes: 1 PC = repas du soir, nuit, petit déjeuner et panier repas). En fonction du point de départ et de la durée du trajet, <br>
    le nombre total de jours du voyage peut varier, sans incidence sur le nombre de PC, et donc sur le prix.<br><br></td></tr>
<tr><td colspan="2" align="center" style="font-size:14px"><div style="background:#cd2335; margin:auto; color:#FFFFFF; padding:5px; font-size:16px; border-radius:4px; width:30%;">TOTAL : <b><span id="total"><?=$total?></span>€</b></div></td></tr><tr><td colspan="2"><br><i>Vous souhaitez recevoir un devis complet pour cette destination ?</i><diV class="button" style="background:#cd2335;  color:#FFFFFF; padding:5px; font-size:16px; border-radius:4px; width:40%;"><a class="bouton" target="_top" href="devis_minis.php?sejour=<?=$data_d["id"]?>"><i class="fa fa-book"></i>&nbsp;Obtenir mon devis personnalisé</a></div></td></tr>
</table>
</form>


</td>
</tr></table><br>

</body>
</html>