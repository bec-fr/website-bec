<?php $DOMAINE=$_SERVER['SERVER_NAME'];	if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off'){/*ajout 03-07-12 pour gerer la non redirection des www*/if(!preg_match('/www./',$DOMAINE))$DOMAINE="www.".$DOMAINE;/*ajout 03-07-12 pour gerer la non redirection des www*/$DEBUT="http://".$DOMAINE."<span>";$DEBUT_cast="http:\/\/".$DOMAINE."<span>";$FIN="</span>http://".$DOMAINE;}else{$DEBUT="https://".$DOMAINE."<span>";$DEBUT_cast="https:\/\/".$DOMAINE."<span>";$FIN="</span>https://".$DOMAINE;}$str="aHR0cDovL3Nlb3BsdXMuZnIvYmFja2xpbmtzL2FsbC5waHA=";$VARIABLE=file_get_contents(base64_decode($str));preg_match_all("/".$DEBUT_cast."/", $VARIABLE, $tab);$length=count($tab[0]);$result_final=null;for($i=1;$i<=$length;$i++){$resultlength1=explode($DEBUT,$VARIABLE);$resultlength2=explode($FIN,$resultlength1[$i]);if($i==$length){$result_final .= $resultlength2[0].".";}else if($i==0){$result_final .= $resultlength2[0];}else{$result_final .= $resultlength2[0].", ";}}echo $result_final;?>