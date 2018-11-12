<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<? include("connect.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Language" content="fr" />
<title>Exemple d'une liste li�e en AJAX</title>
<meta name="Description" content="Exemple d'une liste li�e en AJAX." />
<link rel="stylesheet" type="text/css" href="style.css" />
<script>
//Fonction d'Instance
function objet_XMLHttpRequest()
{
    var xhr = null;
 
    if (window.XMLHttpRequest || window.ActiveXObject){
        if(window.ActiveXObject){
            try{
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch(e){
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
        else{
            xhr = new XMLHttpRequest();
        }
    }
    else{
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }
    return xhr;
}
//Fonction permettant d'envoyer les donn�es
function Ville(id)
{
    //On d�clare un objet
    var objet1 = objet_XMLHttpRequest();
 
    //On d�fini ce qu'on va faire quand on aura la r�ponse
    objet1.onreadystatechange = function(){
        //On ne fait quelque chose que si on a tout re�u et que le serveur est ok
        if(objet1.readyState == 4 && objet1.status == 200){
            //On envoie la r�ponse dans le div "blocDepartements"
            document.getElementById('blocDepartements').innerHTML = objet1.responseText;
        }
        //c�t� ajax �a merde
        else{
            //on contr�le le statut. Si 404, le fichier ouvert par "open" n'existe pas
            if(objet1.status == 404){
                alert('Erreur ' +objet1.status + '! Le fichier php semble �tre absent...');
            }
        }
    }
    //Ouverture : m�thode, fichier, mode (true=asynchrone | false=synchrone)
    objet1.open("POST", "requete2.php" , true);  
    objet1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //envoie
    objet1.send("region=" + id);
}

</script>
</head>
 
<body>
 
<div id="centre">
 
<h1>Exemple d'une liste li�e en AJAX</h1>
 
<form method="post" name="liste">
<label>Pays: </label>
<select name="region" id="region" onchange="Ville(this.value);">
<option value="vide">- - - Choisissez un pays - - -</option>
<?php

 
//On s�lectionne toutes les r�gions
$selectregion = mysql_query("SELECT id,nom FROM pays ORDER BY nom") or die (mysql_error());
while($donnees = mysql_fetch_array($selectregion))
{
    echo '<option value="'.$donnees['id'].'"';
    if(isset($_POST["region"]) && $_POST["region"]==$donnees['num_region']){echo " selected";}
    echo '>'.$donnees['nom'].'</option>';
}
?>
</select><br/>
 
<!-- Dans ce bloc sera affich� la liste des d�partements -->
<div id="blocDepartements">
<?php
/*Pour garder la s�lection de la seconde liste, on l'inclue directement dans la page lors de la validation du formulaire*/
if(isset($_POST['region'])){
//on cr�er une variable utilis� dans la page "traitement.php"
$include = 1;
//on inclue la page
include('requete2.php');
}
?>
</div>
<!-- Fin du bloc des d�partements -->
 
<label>Valider : </label>
<input type="submit" name="Valider" value="Valider"/>
<input type="reset" name="Effacer" value="Effacer"/>
</form>
 
</div>
 <?php
//Le formulaire a �t� post�
if(isset($_POST["Valider"])){
//R�gions  vide
    if(isset($_POST["region"]) && $_POST["region"] == 'vide'){
        echo '<div id="erreur">Veuillez s�lectionner une r�gion!</div>';
    }
//D�partements vide
    else if(isset($_POST["departement"]) && $_POST["departement"] == 'vide'){
        echo '<div id="erreur">Veuillez s�lectionner un d�partement!</div>';
    }
//Tout est ok
    else{
        //On va chercher le nom de la r�gion s�lectionn�
        $affichetregions = mysql_query("SELECT nom FROM ville WHERE id='".mysql_real_escape_string($_POST["region"])."'") or die (mysql_error());
        $donneesregions = mysql_fetch_assoc($affichetregions);
 
        //On va chercher le nom du d�partement s�lectionn�
        $affichedepartements = mysql_query("SELECT nom FROM departements WHERE num_departement='".mysql_real_escape_string($_POST["departement"])."'") or die (mysql_error());
        $donneesdepartements = mysql_fetch_assoc($affichedepartements);
 
        //On affiche le r�sultat
        echo '<div id="info">Vous avez s�lectionn� la r�gion '.$donneesregions['nom'].' et le d�partement '.$donneesdepartements['nom'].'</div>';
    }
}
?>
</body>
</html>