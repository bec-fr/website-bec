<?
include('../inc/conf.php');
include('../inc/fonctions.php');
connexion();

$Fnm = "EX025565.txt";
$tableau = file($Fnm);
while(list($cle,$val) = each($tableau)){
	$t = explode(";", $val);
	
	if(trim($t[0]) != ""){
		$sql = "INSERT INTO mailing (mail, groupe) VALUES ('".addslashes(trim($t[5]))."', '14')";
		echo $sql."<br>"; 
		//mysql_query($sql);
	}
}
?>