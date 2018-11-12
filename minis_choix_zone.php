<?
session_start();
include("inc/conf.php");
include("inc/fonctions.php");
connexion();

$nom_fic = basename($_SERVER['PHP_SELF']);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Bec France</title>
<link href="design.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 10px;
	margin-top: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
}
-->
</style>
</head>

<body bgcolor="#ffffff">

<script>
	function choixzone(valeur){
		//alert(valeur);
		opener.document.getElementById("bloc_zone").innerHTML = "Vous avez sélectionner la zone de tarification " + valeur;
		window.opener.document.form_rechbudget.zone.value = valeur;
		window.close();
	}
</script>

<table width="100%" style="color:#666; font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px;"><tr><td style="padding:10px;">

<div align="center" class="titreRouge" style="font-size:20px; color:#FFF;">[ CHOIX DE LA ZONE ]</div>
<br>
<table border="0" align="center" cellpadding="1" cellspacing="0"><tr><td bgcolor="#e8e8e8"><table width="100%" border="0" cellspacing="0" cellpadding="4">
      <tr>
        <td bgcolor="#FFFFFF"><img src="images/cartefrance.jpg" border="0" usemap="#Map" /></td>
      </tr>
    </table></td></tr></table>

</td>
</tr></table><div align="center"><a href="#" onClick="window.close(); return false;"><img src="images/btFermer_minis.jpg" border="0" /></a></div>
</body>
</html>


<!--<map name="Map" id="Map">
  <area shape="poly" coords="316,54" href="#" />
  <area shape="poly" coords="221,96,266,110,279,135,275,165,247,188,234,196,231,217,208,203,183,170,150,143,148,132" href="#" onClick="choixzone('E');" />
  <area shape="poly" coords="267,108,301,78,313,55,356,81,351,110,338,144,309,149,279,132" href="#" onClick="choixzone('D');" />
  <area shape="poly" coords="360,90,344,150,378,172,389,215,425,183,439,152,451,122" href="#" onClick="choixzone('C');" />
  <area shape="poly" coords="376,31,455,41,455,88,409,88,372,63" href="#" onClick="choixzone('D');" />
  <area shape="poly" coords="283,141,277,170,261,186,285,218,277,242,300,266,357,264,348,223,382,208,375,172,337,150" href="#" onClick="choixzone('G');" />
  <area shape="poly" coords="256,186,231,222,207,322,237,339,244,303,274,282,283,246,269,201" href="#" onClick="choixzone('F');" />
  <area shape="poly" coords="243,340,253,303,290,266,349,268,363,291,363,316,329,334,323,356" href="#" onClick="choixzone('A');" />
  <area shape="poly" coords="354,224,363,258,368,320,404,331,449,300,427,246,419,215" href="#" onClick="choixzone('B');" />
</map>-->
<!--<map name="Map" id="Map">
  <area shape="poly" coords="327,195,428,140,485,162,505,219,485,247,439,279,451,311,407,299,332,225" href="#" onClick="choixzone('E');" />
  <area shape="poly" coords="494,152,565,77,622,129,604,167,588,211,555,214,506,182" href="#" onClick="choixzone('D');" />
  <area shape="poly" coords="649,47,767,71,766,126,720,145,671,121,642,84" href="#" onClick="choixzone('D');" />
  <area shape="poly" coords="627,135,599,215,643,233,675,263,668,308,731,257,756,181" href="#" onClick="choixzone('C');" />
  <area shape="poly" coords="450,280,459,315,435,322,401,460,450,486,456,434,503,398,520,385,495,343,507,300,477,271" href="#" onClick="choixzone('F');" />
  <area shape="poly" coords="460,490,466,436,526,383,549,401,606,397,617,420,632,420,623,457,577,478,570,510" href="#" onClick="choixzone('A');" />
  <area shape="poly" coords="483,263,517,200,549,222,607,235,656,277,652,306,605,324,597,351,623,374,599,387,525,375,520,308" href="#" onClick="choixzone('G');" />
  <area shape="poly" coords="609,332,686,314,723,333,748,433,711,475,635,462,643,415" href="#" onClick="choixzone('B');" />
  <area shape="poly" coords="723,499,698,535,724,569,739,533" href="#" onClick="choixzone('B');" />
</map>-->

<map name="Map" id="Map">
  <area shape="poly" coords="370,392,376,347,413,323,424,304,492,313,501,333,515,335,520,354,510,369,469,390,469,412,431,410" href="#" alt="Zone A" onClick="choixzone('A');">
  <area shape="poly" coords="498,313,523,294,523,258,536,246,561,251,580,253,591,287,588,317,609,344,580,382,548,386,524,371,513,370,522,352,518,333,503,333" href="#" alt="Zone B" onClick="choixzone('B');">
  <area shape="poly" coords="508,108,487,150,485,173,497,189,519,186,530,201,542,207,538,246,559,248,585,209,601,207,614,146,518,104" href="#" alt="Zone C" onClick="choixzone('C');">
  <area shape="poly" coords="530,40,519,65,540,101,587,117,629,84,622,46,541,34" href="#" alt="Zone D" onClick="choixzone('D');">
  <area shape="poly" coords="586,399,568,423,570,451,594,454,595,403" href="#" alt="Zone B" onClick="choixzone('B');">
  <area shape="poly" coords="483,169,504,96,466,61,438,68,438,99,400,121,416,152,436,150,447,171" href="#" alt="Zone D" onClick="choixzone('D');">
  <area shape="poly" coords="418,156,415,194,393,213,414,226,421,244,450,246,471,233,499,239,503,253,534,246,534,205,516,189,496,191,481,171,451,176,435,155" href="#" alt="Zone G" onClick="choixzone('G');">
  <area shape="poly" coords="269,151,351,151,348,111,397,122,415,158,412,194,392,210,361,221,367,250,331,237,267,174" href="#" alt="Zone E" onClick="choixzone('E');">
  <area shape="poly" coords="421,249,407,278,423,299,494,311,517,293,518,257,496,255,495,243,471,239,454,251" href="#" alt="Zone H" onClick="choixzone('H');">
  <area shape="poly" coords="388,215,367,224,371,254,354,254,327,366,370,393,374,346,422,304,404,275,420,247,408,225" href="#" alt="Zone F" onClick="choixzone('F');">
</map>

</body>
</html>