<?
include('../inc/conf.php');
include('../inc/fonctions.php');
connexion();

$Fnm = "test.txt";
$tableau = file($Fnm);
while(list($cle,$val) = each($tableau))
{
   $t = explode("\t", $val);   
   $sql = "INSERT INTO fiche_etudiant_adulte_tarif VALUES ('', '4', '".addslashes(str_replace("\"", "", $t[0]))."', '".addslashes($t[6])."', '".addslashes($t[7])."')";
   echo $sql."<br>"; 
   mysql_query($sql) or die(mysql_error());
}
?>