<?php
class image {

 var $img = "";
 var $dest = "";
 var $fond = "";
 var $larg = "";
 var $haut = "";
 var $plus = "";
 var $vign = "";

function upload($nom,$dest,$larg,$haut="",$fond="") {
 $this->img = $_FILES[$nom]['tmp_name'];
 $this->dest = $dest;
 $this->larg = $larg;
 $this->haut = $haut;
 $this->fond = $fond;
 $this->init();
 if (is_file($this->dest)) unlink($this->dest);
 $this->resize();
 return $this->vign;
}

function vignette($img,$larg,$haut="",$fond="",$plus="") {
 $this->img = $img;
 $this->dest = "";
 $this->larg = $larg;
 $this->haut = $haut;
 $this->fond = $fond;
 $this->plus = $plus;
 $this->init();
 $this->resize();
 return $this->vign;
}

function vignette_html($img,$larg,$haut="",$fond="",$plus="",$alt="Image") {
 $maVign = $this->vignette($img,$larg,$haut,$fond,$plus);
 $dim = getimagesize($maVign);
 
 return "<img src=\"$maVign\" $dim[3] alt=\"$alt\" border=\"0\">";
}

function init() {
  if ($this->img == "") echo "Pas d'image source.";
  if ($this->dest == "") {
    $ext = substr($this->img,strrpos($this->img,"."),strlen($this->img));
    $this->dest = preg_replace("/\.(gif|jpe|jpg|jpeg|png)$/i","_m".$this->plus.$ext,$this->img);
  }
  if ($this->fond == "") $this->fond = "000000";
  $this->vign = "";
}

function  hexa2dec($coul) {
  $retour[] = base_convert(substr($coul,0,2),16,10);
  $retour[] = base_convert(substr($coul,2,2),16,10);
  $retour[] = base_convert(substr($coul,4,2),16,10);
  return $retour;
}

function resize () {

  if (is_file($this->img)) {
    // L'image existe, on peut y aller !
    
    if (!is_file($this->dest)) {
      // La vignette n'existe pas encore

    // Enregistrement des dimensions de l'image source
    $size = getimagesize($this->img);
    
    // DÚfinition des rapports des dimensions de la vignette par rapport Ó l'image
    $raplarg = $this->larg/$size[0];
    $raphaut = $this->haut/$size[1];

    // On dÚfinit le mode de redimensionnement
    if ($this->larg != "" && $this->haut != "") {
      // On veut une image Ó dimensions  fixes
      if ($raplarg > $raphaut) {
        //$largdest = round($this->larg*$raphaut);
        $largdest = round($size[0]*$this->haut/$size[1]);
        $hautdest = $this->haut;
        $xdest = round(($this->larg-$largdest)/2);
        $ydest=0;
      } else {
        $largdest = $this->larg;
        $hautdest = round($size[1]*$this->larg/$size[0]);
        $xdest=0;
        $ydest = round(($this->haut-$hautdest)/2);
      }
    } else if ($this->larg != "") {
      // on veut une image Ó largeur fixe
      $this->haut = round($size[1]*$raplarg);
      $largdest = $this->larg;
      $hautdest = round($size[1]*$raplarg);
      $xdest=0;
      $ydest=0;
    } else {
      // on veut une image Ó hauteur fixe
      $this->larg = round($size[0]*raphaut);
      $largdest = round($size[0]*$raphaut);
      $hautdest = $this->haut;
      $xdest=0;
      $ydest=0;
    }
    
    // CrÚation de la ressource de l'image de destination
    $imgdest = imagecreatetruecolor($this->larg,$this->haut);
    
    // Dessin du fond
    $cl = $this->hexa2dec($this->fond);
    $cl = imagecolorallocate($imgdest,$cl[0],$cl[1],$cl[2]);
    imagefilledrectangle($imgdest,0,0,$this->larg,$this->haut,$cl);
    
    // CrÚation de la ressource de l'image source
    switch ($size[2]) {
      case 1:
        if (imagetypes() & IMG_GIF)
          $imgsrc = imagecreatefromgif($this->img); // l'image est au format gif
        break;
      case 2:
        if (imagetypes() & IMG_JPG)
          $imgsrc = imagecreatefromjpeg($this->img); // l'image est au format jpg
        break;
      case 2:
        if (imagetypes() & IMG_PNG)
          $imgsrc = imagecreatefrompng($this->img); // l'image est au format png
        break;
    }

    // Copie du rectangle de l'image source vers l'image
    //        de destination avec redimensionnement
    imagecopyresampled($imgdest,$imgsrc,$xdest,$ydest,0,0,$largdest,$hautdest,$size[0],$size[1]);

    // Enregistrement de la vignette
    switch ($size[2]) {
      case 1:
        if (imagetypes() & IMG_GIF)
          $src = imagegif($imgdest,$this->dest); // l'image est au format gif
        break;
      case 2:
        if (imagetypes() & IMG_JPG)
          $src = imagejpeg($imgdest,$this->dest); // l'image est au format jpg
        break;
      case 2:
        if (imagetypes() & IMG_PNG)
          $src = imagepng($imgdest,$this->dest); // l'image est au format png
        break;
    }

    imagedestroy($imgdest);
    imagedestroy($imgsrc);
    
    } else {
      // La vignette existe dÚjÓ
    }
    
    $this->vign = $this->dest;

  } else {
    // L'image n'existe pas
  }

}

}

function upload2($source,$destination,$largeur_max,$hauteur_max=0, $copyright=""){
	// Calcul des nouvelles dimensions
	$type=mime_content_type($source);
	list($width, $height) = getimagesize($source);
	if($largeur_max==0 || $largeur_max==""){
		if($height<$hauteur_max){
		  $new_width = $width;
		  $new_height = $height;
		}else{
		  $new_width = round(($width/$height)*$hauteur_max);
		  $new_height = $hauteur_max;
		}
	}else{
		if($width<$largeur_max){
		  $new_width = $width;
		  $new_height = $height;
		}else{
		  $new_width = $largeur_max;
		  $new_height = round(($height/$width)*$largeur_max);
		}
		if($hauteur_max!=0 && $hauteur_max!="" && $new_height>$hauteur_max){
			$new_width = round(($width/$height)*$hauteur_max);
			$new_height = $hauteur_max;
		}
	}
	
	// Redimensionnement
	$image_g = imagecreatetruecolor($new_width, $new_height);
	$fond=imagecolorallocate ($image_g,255,255,255);
	imagefilledrectangle($image_g, 0, 0, $new_width, $new_height, $fond);
	if($type=="image/png"){
		$image = imagecreatefrompng($source);
	}elseif($type=="image/gif"){
		$image = imagecreatefromgif($source);
	}else{
		$image = imagecreatefromjpeg($source);
	}
	imagecopyresampled($image_g, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	
	// Copyright
	if(is_array($copyright)){
		$copyright_size = getimagesize($copyright[0]);
		$copyright_largeur = $copyright_size[0];
		$copyright_hauteur = $copyright_size[1];
		$copyright_image = imagecreatefrompng($copyright[0]);
		
		$max_width = ceil($new_width/2)-($copyright[1]*2);
		$max_height = ceil($new_height/3)-($copyright[1]*2);
		
		if($copyright_largeur>$max_width){
			$new_copyright_hauteur = round(($copyright_hauteur/$copyright_largeur)*$max_width);
			$new_copyright_largeur = $max_width;
		}else{
			$new_copyright_largeur = $copyright_largeur;
			$new_copyright_hauteur = $copyright_hauteur;
		}
		if($new_copyright_hauteur>$max_height){
			$new_copyright_largeur = round(($copyright_largeur/$copyright_hauteur)*$max_height);
			$new_copyright_hauteur = $max_height;
		}
		
		if(isset($copyright[2]) && $copyright[2]=="bas"){
			$y_copyright = $new_height-$new_copyright_hauteur-$copyright[1];
		}else{
			$y_copyright = $copyright[1];
		}
		if(isset($copyright[3]) && $copyright[3]=="droite"){
			$x_copyright = $new_width-$new_copyright_largeur-$copyright[1];
		}else{
			$x_copyright = $copyright[1];
		}
		
		imagecopyresampled($image_g, $copyright_image, $x_copyright, $y_copyright, 0, 0, $new_copyright_largeur, $new_copyright_hauteur, $copyright_largeur, $copyright_hauteur);
	}
	
	// Enregistrement
	imagejpeg($image_g, $destination, 100);
	
	//destruction
	imagedestroy($image);
	imagedestroy($image_g);
}


/****************************************************************************

$top0 : booléen servant à déterminer si la découpe de l'image 
        doit se faire depuis le centre ou depuis le haut de l'image
$left0 : booléen servant à déterminer si la découpe de l'image 
         doit se faire depuis le centre ou depuis le bord gauche de l'image

*****************************************************************************/

function upload_decoupe($source,$destination,$largeur,$hauteur, $top0=false, $left0=false, $copyright=""){
	// Calcul des nouvelles dimensions
	$type=mime_content_type($source);
	list($width, $height) = getimagesize($source);
	if($largeur>=$hauteur){
		$new_width = $largeur;
		$new_height = round(($largeur * $height) / $width);
		if($new_height<$hauteur){
			$new_width = round(($hauteur * $width) / $height);
			$new_height = $hauteur;
		}
	}else{
		$new_width = round(($hauteur * $width) / $height);
		$new_height = $hauteur;
		if($new_width<$largeur){
			$new_width = $largeur;
			$new_height = round(($largeur * $height) / $width);
		}
	}
	
	// Redimensionnement
	$image_g = imagecreatetruecolor($new_width, $new_height);
	$fond=imagecolorallocate ($image_g,255,255,255);
	imagefilledrectangle($image_g, 0, 0, $new_width, $new_height, $fond);
	if($type=="image/png"){
		$image = imagecreatefrompng($source);
	}elseif($type=="image/gif"){
		$image = imagecreatefromgif($source);
	}else{
		$image = imagecreatefromjpeg($source);
	}
	imagecopyresampled($image_g, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	
	imagejpeg($image_g, $destination);	

	// Découpe
	if($left0){
		$decalage_x=0;
	}elseif($new_width>$largeur){
		$decalage_x=floor(($new_width-$largeur)/2);
	}else{
		$decalage_x=0;
	}
	if($top0){
		$decalage_y=0;
	}elseif($new_height>$hauteur){
		$decalage_y=floor(($new_height-$hauteur)/2);
	}else{
		$decalage_y=0;
	}
	$image_g2 = imagecreatetruecolor($largeur, $hauteur);
	imagecopy($image_g2, $image_g, 0, 0, $decalage_x, $decalage_y, $largeur, $hauteur);
	
	// Copyright
	if(is_array($copyright)){
		$copyright_size = getimagesize($copyright[0]);
		$copyright_largeur = $copyright_size[0];
		$copyright_hauteur = $copyright_size[1];
		$copyright_image = imagecreatefrompng($copyright[0]);
		
		$max_width = ceil($largeur/2)-($copyright[1]*2);
		$max_height = ceil($hauteur/3)-($copyright[1]*2);
		
		if($copyright_largeur>$max_width){
			$new_copyright_hauteur = round(($copyright_hauteur/$copyright_largeur)*$max_width);
			$new_copyright_largeur = $max_width;
		}else{
			$new_copyright_largeur = $copyright_largeur;
			$new_copyright_hauteur = $copyright_hauteur;
		}
		if($new_copyright_hauteur>$max_height){
			$new_copyright_largeur = round(($copyright_largeur/$copyright_hauteur)*$max_height);
			$new_copyright_hauteur = $max_height;
		}
		
		if(isset($copyright[2]) && $copyright[2]=="bas"){
			$y_copyright = $hauteur-$new_copyright_hauteur-$copyright[1];
		}else{
			$y_copyright = $copyright[1];
		}
		if(isset($copyright[3]) && $copyright[3]=="droite"){
			$x_copyright = $largeur-$new_copyright_largeur-$copyright[1];
		}else{
			$x_copyright = $copyright[1];
		}
		
		imagecopyresampled($image_g2, $copyright_image, $x_copyright, $y_copyright, 0, 0, $new_copyright_largeur, $new_copyright_hauteur, $copyright_largeur, $copyright_hauteur);
	}
	
	// Enregistrement
	imagejpeg($image_g2, $destination, 100);	
	
	//destruction
	imagedestroy($image);
	imagedestroy($image_g);
	imagedestroy($image_g2);
}

?>
