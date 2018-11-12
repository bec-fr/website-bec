
function aff_cache(id)
{
	if(document.getElementById(id).style.display == "none")
		document.getElementById(id).style.display = "";
	else
		document.getElementById(id).style.display = "none";
}

function aff_cache2(id)
{
	if(document.getElementById(id).style.visibility == "hidden")
		document.getElementById(id).style.visibility = "visible";
	else
		document.getElementById(id).style.visibility = "hidden";
}

function aff(id)
{
	if(document.getElementById(id).style.display == "none")
		document.getElementById(id).style.display = "";
}

function cache(id)
{
	if(document.getElementById(id).style.display == "")
		document.getElementById(id).style.display = "none";
}

function aff2(id)
{
	document.getElementById(id).style.visibility = "visible";
}

function cache2(id)
{
	document.getElementById(id).style.visibility = "hidden";
}


function enroule_deroule(objet)
{
	//alert(objet.src);
	if(objet.src == "http://www.vinonis.fr/images/derouler.gif")
		objet.src = "images/enrouler.gif";
	else
		objet.src = "images/derouler.gif";
}


function centrer_div(nom,l,h)
{
	largeur=((document.body.clientWidth)/2)-(l/2);
	hauteur=((document.body.clientHeight)/2)-(h/2);
	document.getElementById(nom).style.top=hauteur;
	document.getElementById(nom).style.left=largeur;
}

function centrer_div2(nom,l)
{
	largeur=((document.body.clientWidth)/2)-(l/2);
	document.getElementById(nom).style.left=largeur;
}

function voirSelect(v)
{	
			if(!window.Event){
				oSelects = document.getElementsByTagName('SELECT'); 
				for (i = 0; i < oSelects.length; i++) { 
					oSlt = oSelects[i]; 
					oSlt.style.visibility=v;
				}			
			}
		}


function reset_check()
{
	oSelects = document.getElementsByTagName('INPUT'); 
	for (i = 0; i < oSelects.length; i++) { 
		oSlt = oSelects[i];
		if(oSlt.type == "checkbox") {
			oSlt.checked = false;
		}
	}
}

function add_categorie()
{	
	document.form.categorie.value = "";
	document.getElementById('categorie_label').innerHTML = "";
	
	oSelects = document.getElementsByTagName('INPUT'); 
	for (i = 0; i < oSelects.length; i++) { 
		oSlt = oSelects[i];
		if(oSlt.type == "checkbox" && oSlt.checked) {
			//alert(oSlt.value);
			var letab = Array();
			letab = oSlt.value.split("-");
			
			//alert(letab[0] + " - " + letab[1]);
			if(document.form.categorie.value == "")
			{
				document.form.categorie.value += letab[0];
				document.getElementById('categorie_label').innerHTML += letab[1];
			}
			else
			{
				document.form.categorie.value += "," + letab[0];
				document.getElementById('categorie_label').innerHTML += ", " + letab[1];
			}
		}
	}
}

function change_action(coche)
{
	if(coche)
		document.rech.action = "entreprise.php";
	else
		document.rech.action = "annonce.php";
}

function change_action2(value)
{
	if(value == "2")
		document.rech.action = "entreprise.php";
	else
		document.rech.action = "annonce.php";
}

function rech_change_action2(value)
{
	if(value == "2")
		document.form.action = "entreprise.php";
	else
		document.form.action = "annonce.php";
}