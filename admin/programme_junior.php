<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%" class="tableau">
	<tr class="titre2"><td>Tarif</td></tr>
	<tr>
		<td colspan="2">
<br />

<?
if(isset($_POST["ok"]) && $_POST["ok"] == "1"){
	mysql_query("DELETE FROM junior_programme WHERE fiche_junior = '".addslashes($_GET["id"])."'") or die(mysql_error());
	
	$query = "INSERT INTO junior_programme VALUES ('".addslashes($_GET["id"])."', '".addslashes($_POST["s1_j1_1"])."', '".addslashes($_POST["s1_j1_2"])."', '".addslashes($_POST["s1_j1_3"])."', '".addslashes($_POST["s1_j2_1"])."', '".addslashes($_POST["s1_j2_2"])."', '".addslashes($_POST["s1_j2_3"])."', '".addslashes($_POST["s1_j3_1"])."', '".addslashes($_POST["s1_j3_2"])."', '".addslashes($_POST["s1_j3_3"])."', '".addslashes($_POST["s1_j4_1"])."', '".addslashes($_POST["s1_j4_2"])."', '".addslashes($_POST["s1_j4_3"])."', '".addslashes($_POST["s1_j5_1"])."', '".addslashes($_POST["s1_j5_2"])."', '".addslashes($_POST["s1_j5_3"])."', '".addslashes($_POST["s1_j6_1"])."', '".addslashes($_POST["s1_j6_2"])."', '".addslashes($_POST["s1_j6_3"])."', '".addslashes($_POST["s1_j7_1"])."', '".addslashes($_POST["s1_j7_2"])."', '".addslashes($_POST["s1_j7_3"])."', '".addslashes($_POST["s2_j1_1"])."', '".addslashes($_POST["s2_j1_2"])."', '".addslashes($_POST["s2_j1_3"])."', '".addslashes($_POST["s2_j2_1"])."', '".addslashes($_POST["s2_j2_2"])."', '".addslashes($_POST["s2_j2_3"])."', '".addslashes($_POST["s2_j3_1"])."', '".addslashes($_POST["s2_j3_2"])."', '".addslashes($_POST["s2_j3_3"])."', '".addslashes($_POST["s2_j4_1"])."', '".addslashes($_POST["s2_j4_2"])."', '".addslashes($_POST["s2_j4_3"])."', '".addslashes($_POST["s2_j5_1"])."', '".addslashes($_POST["s2_j5_2"])."', '".addslashes($_POST["s2_j5_3"])."', '".addslashes($_POST["s2_j6_1"])."', '".addslashes($_POST["s2_j6_2"])."', '".addslashes($_POST["s2_j6_3"])."', '".addslashes($_POST["s2_j7_1"])."', '".addslashes($_POST["s2_j7_2"])."', '".addslashes($_POST["s2_j7_3"])."', '".addslashes($_POST["s3_j1_1"])."', '".addslashes($_POST["s3_j1_2"])."', '".addslashes($_POST["s3_j1_3"])."', '".addslashes($_POST["s3_j2_1"])."', '".addslashes($_POST["s3_j2_2"])."', '".addslashes($_POST["s3_j2_3"])."', '".addslashes($_POST["s3_j3_1"])."', '".addslashes($_POST["s3_j3_2"])."', '".addslashes($_POST["s3_j3_3"])."', '".addslashes($_POST["s3_j4_1"])."', '".addslashes($_POST["s3_j4_2"])."', '".addslashes($_POST["s3_j4_3"])."', '".addslashes($_POST["s3_j5_1"])."', '".addslashes($_POST["s3_j5_2"])."', '".addslashes($_POST["s3_j5_3"])."', '".addslashes($_POST["s3_j6_1"])."', '".addslashes($_POST["s3_j6_2"])."', '".addslashes($_POST["s3_j6_3"])."', '".addslashes($_POST["s3_j7_1"])."', '".addslashes($_POST["s3_j7_2"])."', '".addslashes($_POST["s3_j7_3"])."', '".addslashes($_POST["jour1"])."', '".addslashes($_POST["jour2"])."', '".addslashes($_POST["jour3"])."', '".addslashes($_POST["jour4"])."', '".addslashes($_POST["jour5"])."', '".addslashes($_POST["jour6"])."', '".addslashes($_POST["jour7"])."', '".addslashes($_POST["c1_j1_1"])."', '".addslashes($_POST["c1_j1_2"])."', '".addslashes($_POST["c1_j1_3"])."', '".addslashes($_POST["c1_j2_1"])."', '".addslashes($_POST["c1_j2_2"])."', '".addslashes($_POST["c1_j2_3"])."', '".addslashes($_POST["c1_j3_1"])."', '".addslashes($_POST["c1_j3_2"])."', '".addslashes($_POST["c1_j3_3"])."', '".addslashes($_POST["c1_j4_1"])."', '".addslashes($_POST["c1_j4_2"])."', '".addslashes($_POST["c1_j4_3"])."', '".addslashes($_POST["c1_j5_1"])."', '".addslashes($_POST["c1_j5_2"])."', '".addslashes($_POST["c1_j5_3"])."', '".addslashes($_POST["c1_j6_1"])."', '".addslashes($_POST["c1_j6_2"])."', '".addslashes($_POST["c1_j6_3"])."', '".addslashes($_POST["c1_j7_1"])."', '".addslashes($_POST["c1_j7_2"])."', '".addslashes($_POST["c1_j7_3"])."', '".addslashes($_POST["c2_j1_1"])."', '".addslashes($_POST["c2_j1_2"])."', '".addslashes($_POST["c2_j1_3"])."', '".addslashes($_POST["c2_j2_1"])."', '".addslashes($_POST["c2_j2_2"])."', '".addslashes($_POST["c2_j2_3"])."', '".addslashes($_POST["c2_j3_1"])."', '".addslashes($_POST["c2_j3_2"])."', '".addslashes($_POST["c2_j3_3"])."', '".addslashes($_POST["c2_j4_1"])."', '".addslashes($_POST["c2_j4_2"])."', '".addslashes($_POST["c2_j4_3"])."', '".addslashes($_POST["c2_j5_1"])."', '".addslashes($_POST["c2_j5_2"])."', '".addslashes($_POST["c2_j5_3"])."', '".addslashes($_POST["c2_j6_1"])."', '".addslashes($_POST["c2_j6_2"])."', '".addslashes($_POST["c2_j6_3"])."', '".addslashes($_POST["c2_j7_1"])."', '".addslashes($_POST["c2_j7_2"])."', '".addslashes($_POST["c2_j7_3"])."', '".addslashes($_POST["c3_j1_1"])."', '".addslashes($_POST["c3_j1_2"])."', '".addslashes($_POST["c3_j1_3"])."', '".addslashes($_POST["c3_j2_1"])."', '".addslashes($_POST["c3_j2_2"])."', '".addslashes($_POST["c3_j2_3"])."', '".addslashes($_POST["c3_j3_1"])."', '".addslashes($_POST["c3_j3_2"])."', '".addslashes($_POST["c3_j3_3"])."', '".addslashes($_POST["c3_j4_1"])."', '".addslashes($_POST["c3_j4_2"])."', '".addslashes($_POST["c3_j4_3"])."', '".addslashes($_POST["c3_j5_1"])."', '".addslashes($_POST["c3_j5_2"])."', '".addslashes($_POST["c3_j5_3"])."', '".addslashes($_POST["c3_j6_1"])."', '".addslashes($_POST["c3_j6_2"])."', '".addslashes($_POST["c3_j6_3"])."', '".addslashes($_POST["c3_j7_1"])."', '".addslashes($_POST["c3_j7_2"])."', '".addslashes($_POST["c3_j7_3"])."', '".addslashes($_POST["num1_j1_1"])."', '".addslashes($_POST["num1_j1_2"])."', '".addslashes($_POST["num1_j1_3"])."', '".addslashes($_POST["num1_j2_1"])."', '".addslashes($_POST["num1_j2_2"])."', '".addslashes($_POST["num1_j2_3"])."', '".addslashes($_POST["num1_j3_1"])."', '".addslashes($_POST["num1_j3_2"])."', '".addslashes($_POST["num1_j3_3"])."', '".addslashes($_POST["num1_j4_1"])."', '".addslashes($_POST["num1_j4_2"])."', '".addslashes($_POST["num1_j4_3"])."', '".addslashes($_POST["num1_j5_1"])."', '".addslashes($_POST["num1_j5_2"])."', '".addslashes($_POST["num1_j5_3"])."', '".addslashes($_POST["num1_j6_1"])."', '".addslashes($_POST["num1_j6_2"])."', '".addslashes($_POST["num1_j6_3"])."', '".addslashes($_POST["num1_j7_1"])."', '".addslashes($_POST["num1_j7_2"])."', '".addslashes($_POST["num1_j7_3"])."', '".addslashes($_POST["num2_j1_1"])."', '".addslashes($_POST["num2_j1_2"])."', '".addslashes($_POST["num2_j1_3"])."', '".addslashes($_POST["num2_j2_1"])."', '".addslashes($_POST["num2_j2_2"])."', '".addslashes($_POST["num2_j2_3"])."', '".addslashes($_POST["num2_j3_1"])."', '".addslashes($_POST["num2_j3_2"])."', '".addslashes($_POST["num2_j3_3"])."', '".addslashes($_POST["num2_j4_1"])."', '".addslashes($_POST["num2_j4_2"])."', '".addslashes($_POST["num2_j4_3"])."', '".addslashes($_POST["num2_j5_1"])."', '".addslashes($_POST["num2_j5_2"])."', '".addslashes($_POST["num2_j5_3"])."', '".addslashes($_POST["num2_j6_1"])."', '".addslashes($_POST["num2_j6_2"])."', '".addslashes($_POST["num2_j6_3"])."', '".addslashes($_POST["num2_j7_1"])."', '".addslashes($_POST["num2_j7_2"])."', '".addslashes($_POST["num2_j7_3"])."', '".addslashes($_POST["num3_j1_1"])."', '".addslashes($_POST["num3_j1_2"])."', '".addslashes($_POST["num3_j1_3"])."', '".addslashes($_POST["num3_j2_1"])."', '".addslashes($_POST["num3_j2_2"])."', '".addslashes($_POST["num3_j2_3"])."', '".addslashes($_POST["num3_j3_1"])."', '".addslashes($_POST["num3_j3_2"])."', '".addslashes($_POST["num3_j3_3"])."', '".addslashes($_POST["num3_j4_1"])."', '".addslashes($_POST["num3_j4_2"])."', '".addslashes($_POST["num3_j4_3"])."', '".addslashes($_POST["num3_j5_1"])."', '".addslashes($_POST["num3_j5_2"])."', '".addslashes($_POST["num3_j5_3"])."', '".addslashes($_POST["num3_j6_1"])."', '".addslashes($_POST["num3_j6_2"])."', '".addslashes($_POST["num3_j6_3"])."', '".addslashes($_POST["num3_j7_1"])."', '".addslashes($_POST["num3_j7_2"])."', '".addslashes($_POST["num3_j7_3"])."', '".addslashes($_POST["txt1_j1_1"])."', '".addslashes($_POST["txt1_j1_2"])."', '".addslashes($_POST["txt1_j1_3"])."', '".addslashes($_POST["txt1_j2_1"])."', '".addslashes($_POST["txt1_j2_2"])."', '".addslashes($_POST["txt1_j2_3"])."', '".addslashes($_POST["txt1_j3_1"])."', '".addslashes($_POST["txt1_j3_2"])."', '".addslashes($_POST["txt1_j3_3"])."', '".addslashes($_POST["txt1_j4_1"])."', '".addslashes($_POST["txt1_j4_2"])."', '".addslashes($_POST["txt1_j4_3"])."', '".addslashes($_POST["txt1_j5_1"])."', '".addslashes($_POST["txt1_j5_2"])."', '".addslashes($_POST["txt1_j5_3"])."', '".addslashes($_POST["txt1_j6_1"])."', '".addslashes($_POST["txt1_j6_2"])."', '".addslashes($_POST["txt1_j6_3"])."', '".addslashes($_POST["txt1_j7_1"])."', '".addslashes($_POST["txt1_j7_2"])."', '".addslashes($_POST["txt1_j7_3"])."', '".addslashes($_POST["txt2_j1_1"])."', '".addslashes($_POST["txt2_j1_2"])."', '".addslashes($_POST["txt2_j1_3"])."', '".addslashes($_POST["txt2_j2_1"])."', '".addslashes($_POST["txt2_j2_2"])."', '".addslashes($_POST["txt2_j2_3"])."', '".addslashes($_POST["txt2_j3_1"])."', '".addslashes($_POST["txt2_j3_2"])."', '".addslashes($_POST["txt2_j3_3"])."', '".addslashes($_POST["txt2_j4_1"])."', '".addslashes($_POST["txt2_j4_2"])."', '".addslashes($_POST["txt2_j4_3"])."', '".addslashes($_POST["txt2_j5_1"])."', '".addslashes($_POST["txt2_j5_2"])."', '".addslashes($_POST["txt2_j5_3"])."', '".addslashes($_POST["txt2_j6_1"])."', '".addslashes($_POST["txt2_j6_2"])."', '".addslashes($_POST["txt2_j6_3"])."', '".addslashes($_POST["txt2_j7_1"])."', '".addslashes($_POST["txt2_j7_2"])."', '".addslashes($_POST["txt2_j7_3"])."', '".addslashes($_POST["txt3_j1_1"])."', '".addslashes($_POST["txt3_j1_2"])."', '".addslashes($_POST["txt3_j1_3"])."', '".addslashes($_POST["txt3_j2_1"])."', '".addslashes($_POST["txt3_j2_2"])."', '".addslashes($_POST["txt3_j2_3"])."', '".addslashes($_POST["txt3_j3_1"])."', '".addslashes($_POST["txt3_j3_2"])."', '".addslashes($_POST["txt3_j3_3"])."', '".addslashes($_POST["txt3_j4_1"])."', '".addslashes($_POST["txt3_j4_2"])."', '".addslashes($_POST["txt3_j4_3"])."', '".addslashes($_POST["txt3_j5_1"])."', '".addslashes($_POST["txt3_j5_2"])."', '".addslashes($_POST["txt3_j5_3"])."', '".addslashes($_POST["txt3_j6_1"])."', '".addslashes($_POST["txt3_j6_2"])."', '".addslashes($_POST["txt3_j6_3"])."', '".addslashes($_POST["txt3_j7_1"])."', '".addslashes($_POST["txt3_j7_2"])."', '".addslashes($_POST["txt3_j7_3"])."')";
	//echo $query."<br>";
	mysql_query($query) or die(mysql_error());
	
	echo "<script>document.location.href='admin.php?action=programme_juniorModif&id=".$_GET["id"]."';</script>";
}
?>

<a href="admin.php?action=fiche_junior">Retour fiches</a><br /><br />


<form name="form" action="" method="post">
<input type="hidden" name="ok" value="1" />

<?
$query2 = "SELECT * FROM junior_programme WHERE fiche_junior = '".addslashes($_GET["id"])."'";
$exec2 = mysql_query($query2) or die(mysql_error());
$data2 = mysql_fetch_assoc($exec2);
?>

<table border="0" align="center" width="98%" cellpadding="2" cellspacing="0" class="cellule_hautgauche">
<tr class="titre3">
    <th class="cellule_basdroite">&nbsp;</th>
    <th class="cellule_basdroite">Jour 1<br /><input type="text" name="jour1" size="10" value="<?=stripslashes($data2["jour1"])?>" /></th>
    <th class="cellule_basdroite">Jour 2<br /><input type="text" name="jour2" size="10" value="<?=stripslashes($data2["jour2"])?>" /></th>
    <th class="cellule_basdroite">Jour 3<br /><input type="text" name="jour3" size="10" value="<?=stripslashes($data2["jour3"])?>" /></th>
    <th class="cellule_basdroite">Jour 4<br /><input type="text" name="jour4" size="10" value="<?=stripslashes($data2["jour4"])?>" /></th>
    <th class="cellule_basdroite">Jour 5<br /><input type="text" name="jour5" size="10" value="<?=stripslashes($data2["jour5"])?>" /></th>
    <th class="cellule_basdroite">Jour 6<br /><input type="text" name="jour6" size="10" value="<?=stripslashes($data2["jour6"])?>" /></th>
    <th class="cellule_basdroite">Jour 7<br /><input type="text" name="jour7" size="10" value="<?=stripslashes($data2["jour7"])?>" /></th>
</tr>

<?
for($i=1 ; $i<=3 ; $i++){
?>
<tr align="center" onmouseover="this.style.backgroundColor='#DDDDDD'" onmouseout="this.style.backgroundColor='#ECECEC'">
	<td class="cellule_basdroite">S<?=$i?></td>
    <? for($j=1 ; $j<=7 ; $j++){ ?>
	<td class="cellule_basdroite">
    n� matin <input type="text" name="num<?=$i?>_j<?=$j?>_1" size="2" value="<?=stripslashes($data2["num".$i."_j".$j."_1"])?>" /><br />n� aprem <input type="text" name="num<?=$i?>_j<?=$j?>_2" size="2" value="<?=stripslashes($data2["num".$i."_j".$j."_2"])?>" /><br />n� soir <input type="text" name="num<?=$i?>_j<?=$j?>_3" size="2" value="<?=stripslashes($data2["num".$i."_j".$j."_3"])?>" /><br />
    <br /><input type="text" name="txt<?=$i?>_j<?=$j?>_1" size="15" value="<?=stripslashes($data2["txt".$i."_j".$j."_1"])?>" /><br /><input type="text" name="txt<?=$i?>_j<?=$j?>_2" size="15" value="<?=stripslashes($data2["txt".$i."_j".$j."_2"])?>" /><br /><input type="text" name="txt<?=$i?>_j<?=$j?>_3" size="15" value="<?=stripslashes($data2["txt".$i."_j".$j."_3"])?>" /></td>
    <? } ?>
</tr>
<? } ?>

<tr><td colspan="8" align="center" class="cellule_basdroite"><br /><input type="submit" value="Modifier" class="bouton" /><br /><br /></td></tr>

</table>
</form>
<br /><br />

L�gende : pictos programme<br /><br />
<table border="0" width="100%" align="center">
<?
$query = "SELECT * FROM picto_programme WHERE 1 ORDER BY id";
$exec = mysql_query($query) or die(mysql_error());
$i=0;
while($data = mysql_fetch_assoc($exec)){
	if($i%8 == 0){
		?>
        <tr>
        <?
	}
	?>
    <td><?=$data["id"]?> :</td><td><img src="../images/picto_programme/<?=stripslashes($data["fichier"])?>" width="69" height="69" /><br /><?=stripslashes($data["nom"])?></td>
    <?
	$i++;
	if($i%8 == 0){
		?>
        </tr>
        <?
	}
}
?>
</table>
<br />

<!--<table border="0" width="100" align="center">
<tr><td>0 :</td><td bgcolor="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
<tr><td>1 :</td><td bgcolor="#cee9ed">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
<tr><td>2 :</td><td bgcolor="#94d2db">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
<tr><td>3 :</td><td bgcolor="#b1b1d6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
</table>
<br />-->


		</td>
	</tr>
</table><br>