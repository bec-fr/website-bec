<?

//url rewriting
function url_rewrite($s){
	$r=str_replace(" : ","-",stripslashes($s));
	$r=str_replace("- ","-",$r);
	$r=str_replace(" -","-",$r);
	$r=str_replace(" - ","-",$r);
	$r=str_replace(" <br>","",$r);
	$r=str_replace(" <br/>","",$r);
	$r=str_replace(" <br />","",$r);
	$r=str_replace("‘","",$r);
	$r=str_replace("<br>","",$r);
	$r=str_replace("<br/>","",$r);
	$r=str_replace("<br />","",$r);
	$r=str_replace(" / ","-",$r);
	$r=str_replace(" + ","-",$r);
	$r=str_replace(", ","-",$r);
	$r=str_replace(" ","-",$r);
	$r=str_replace("é","e",$r);
	$r=str_replace("/","-",$r);
	$r=str_replace("è","e",$r);
	$r=str_replace("&","-et-",$r);
	$r=str_replace("-","-",$r); //ATTENTION !!!  les 2 tirets sont diffèrents
	$r=str_replace("–","-",$r);	
	$r=str_replace("ç","c",$r);
	$r=str_replace("à","a",$r);
	$r=str_replace("â","a",$r);
	$r=str_replace("ê","e",$r);
	$r=str_replace("ë","e",$r);
	$r=str_replace("ä","a",$r);
	$r=str_replace("ô","o",$r);
	$r=str_replace("ö","o",$r);
	$r=str_replace("û","u",$r);
	$r=str_replace("ü","u",$r);
	$r=str_replace("ï","i",$r);
	$r=str_replace("î","i",$r);
	$r=str_replace("µ","u",$r);
	$r=str_replace("ù","u",$r);
	$r=str_replace("°","-",$r);
	$r=str_replace("'","-",$r);
	$r=str_replace("*","-",$r);
	$r=str_replace("\"","-",$r);
	$r=str_replace(",","-",$r);
	$r=str_replace(".","",$r);
	$r=str_replace(":","",$r);
	$r=str_replace("®","",$r);
	$r=str_replace("?","",$r);
	$r=str_replace("!","",$r);
	$r=str_replace("’","-",$r);
	$r=str_replace("È","e",$r);
	$r=str_replace("É","e",$r);
	$r=str_replace("(","",$r);
	$r=str_replace(")","",$r);
	$r=str_replace("[","",$r);
	$r=str_replace("]","",$r);
	
	return $r;
}

?>