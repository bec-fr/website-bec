<?
include('../inc/conf.php');
include('../inc/fonctions.php');
connexion();

for($i=0 ; $i<50 ; $i++)
{
   $sql = "INSERT INTO mailing VALUES ('', 'mael@amenothes.fr', '3')";
   echo $sql."<br>"; 
   mysql_query($sql) or die(mysql_error());
}
?>