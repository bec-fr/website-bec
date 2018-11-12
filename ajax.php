<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<? include("connect.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Language" content="fr" />
<title>Exemple d'une liste liée en AJAX</title>
<meta name="Description" content="Exemple d'une liste liée en AJAX." />
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
//Fonction permettant d'envoyer les données
function Ville(id)
{
    //On déclare un objet
    var objet1 = objet_XMLHttpRequest();
 
    //On défini ce qu'on va faire quand on aura la réponse
    objet1.onreadystatechange = function(){
        //On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if(objet1.readyState == 4 && objet1.status == 200){
            //On envoie la réponse dans le div "blocDepartements"
            document.getElementById('blocDepartements').innerHTML = objet1.responseText;
        }
        //côté ajax ça merde
        else{
            //on contrôle le statut. Si 404, le fichier ouvert par "open" n'existe pas
            if(objet1.status == 404){
                alert('Erreur ' +objet1.status + '! Le fichier php semble être absent...');
            }
        }
    }
    //Ouverture : méthode, fichier, mode (true=asynchrone | false=synchrone)
    objet1.open("POST", "requete2.php" , true);  
    objet1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //envoie
    objet1.send("region=" + id);
}

</script>
</head>
 
<body>
 
<div id="centre">
 
<h1>Exemple d'une liste liée en AJAX</h1>
 
<form method="post" name="liste">
<label>Pays: </label>
<select name="region" id="region" onchange="Ville(this.value);">
<option value="vide">- - - Choisissez un pays - - -</option>
<?php

 
//On sélectionne toutes les régions
$selectregion = mysql_query("SELECT id,nom FROM pays ORDER BY nom") or die (mysql_error());
while($donnees = mysql_fetch_array($selectregion))
{
    echo '<option value="'.$donnees['id'].'"';
    if(isset($_POST["region"]) && $_POST["region"]==$donnees['num_region']){echo " selected";}
    echo '>'.$donnees['nom'].'</option>';
}
?>
</select><br/>
 
<!-- Dans ce bloc sera affiché la liste des départements -->
<div id="blocDepartements">
<?php
/*Pour garder la sélection de la seconde liste, on l'inclue directement dans la page lors de la validation du formulaire*/
if(isset($_POST['region'])){
//on créer une variable utilisé dans la page "traitement.php"
$include = 1;
//on inclue la page
include('requete2.php');
}
?>
</div>
<!-- Fin du bloc des départements -->
 
<label>Valider : </label>
<input type="submit" name="Valider" value="Valider"/>
<input type="reset" name="Effacer" value="Effacer"/>
</form>
 
</div>
 <?php
//Le formulaire a été posté
if(isset($_POST["Valider"])){
//Régions  vide
    if(isset($_POST["region"]) && $_POST["region"] == 'vide'){
        echo '<div id="erreur">Veuillez sélectionner une région!</div>';
    }
//Départements vide
    else if(isset($_POST["departement"]) && $_POST["departement"] == 'vide'){
        echo '<div id="erreur">Veuillez sélectionner un département!</div>';
    }
//Tout est ok
    else{
        //On va chercher le nom de la région sélectionné
        $affichetregions = mysql_query("SELECT nom FROM ville WHERE id='".mysql_real_escape_string($_POST["region"])."'") or die (mysql_error());
        $donneesregions = mysql_fetch_assoc($affichetregions);
 
        //On va chercher le nom du département sélectionné
        $affichedepartements = mysql_query("SELECT nom FROM departements WHERE num_departement='".mysql_real_escape_string($_POST["departement"])."'") or die (mysql_error());
        $donneesdepartements = mysql_fetch_assoc($affichedepartements);
 
        //On affiche le résultat
        echo '<div id="info">Vous avez sélectionné la région '.$donneesregions['nom'].' et le département '.$donneesdepartements['nom'].'</div>';
    }
}
?>
</body>
</html>