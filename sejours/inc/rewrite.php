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
	$r=str_replace("�","",$r);
	$r=str_replace("<br>","",$r);
	$r=str_replace("<br/>","",$r);
	$r=str_replace("<br />","",$r);
	$r=str_replace(" / ","-",$r);
	$r=str_replace(" + ","-",$r);
	$r=str_replace(", ","-",$r);
	$r=str_replace(" ","-",$r);
	$r=str_replace("�","e",$r);
	$r=str_replace("/","-",$r);
	$r=str_replace("�","e",$r);
	$r=str_replace("&","-et-",$r);
	$r=str_replace("-","-",$r); //ATTENTION !!!  les 2 tirets sont diff�rents
	$r=str_replace("�","-",$r);	
	$r=str_replace("�","c",$r);
	$r=str_replace("�","a",$r);
	$r=str_replace("�","a",$r);
	$r=str_replace("�","e",$r);
	$r=str_replace("�","e",$r);
	$r=str_replace("�","a",$r);
	$r=str_replace("�","o",$r);
	$r=str_replace("�","o",$r);
	$r=str_replace("�","u",$r);
	$r=str_replace("�","u",$r);
	$r=str_replace("�","i",$r);
	$r=str_replace("�","i",$r);
	$r=str_replace("�","u",$r);
	$r=str_replace("�","u",$r);
	$r=str_replace("�","-",$r);
	$r=str_replace("'","-",$r);
	$r=str_replace("*","-",$r);
	$r=str_replace("\"","-",$r);
	$r=str_replace(",","-",$r);
	$r=str_replace(".","",$r);
	$r=str_replace(":","",$r);
	$r=str_replace("�","",$r);
	$r=str_replace("?","",$r);
	$r=str_replace("!","",$r);
	$r=str_replace("�","-",$r);
	$r=str_replace("�","e",$r);
	$r=str_replace("�","e",$r);
	$r=str_replace("(","",$r);
	$r=str_replace(")","",$r);
	$r=str_replace("[","",$r);
	$r=str_replace("]","",$r);
	
	return $r;
}

?>