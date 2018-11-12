/**********************************************************
Sleight
(c) 2001, Aaron Boodman
http://www.youngpup.net
**********************************************************/

if (navigator.platform == "Win32" && navigator.appName == "Microsoft Internet Explorer" && window.attachEvent)
{
	document.writeln('');
	window.attachEvent("onload", fnLoadPngs);
}

function fnLoadPngs()
{
	var arVersion = navigator.appVersion.split("MSIE")	
	var version = parseFloat(arVersion[1])	
	if ((version >= 5.5) && (version < 7) && (document.body.filters)) 
	{
	   for(var i=0; i<document.images.length; i++)
	   {
		  var img = document.images[i]
		  var imgName = img.src.toUpperCase()
		  if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
		  {
			 var imgID = (img.id) ? "id='" + img.id + "' " : ""
			 var imgClass = (img.className) ? "class='" + img.className + "' " : ""
			 var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
			 var imgStyle = "display:inline-block;" + img.style.cssText 
			 if (img.align == "left") imgStyle = "float:left;" + imgStyle
			 if (img.align == "right") imgStyle = "float:right;" + imgStyle
			 if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
			 var strNewHTML = "<span " + imgID + imgClass + imgTitle
			 + " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
			 + "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
			 + "(src=\'" + img.src + "\');\"></span>" 
			 img.outerHTML = strNewHTML
			 i = i-1
		  }
	   }
	}
}

/**********************************************************
Sleight for Backgrounds
Original code (c) 2001 Aaron Boodman, http://www.youngpup.net
This version (c) 2003 Drew McLellan, http://www.allinthehead.com
**********************************************************/
if (navigator.platform == "Win32" && navigator.appName == "Microsoft Internet Explorer" && window.attachEvent) {
	window.attachEvent("onload", alphaBackgrounds);
}

function alphaBackgrounds(){
	var rslt = navigator.appVersion.match(/MSIE (\d+\.\d+)/, '');
	var itsAllGood = (rslt != null && Number(rslt[1]) >= 5.5 && Number(rslt[1]) < 7);
	for (i=0; i < document.all.length; i++){
		var bg = document.all[i].currentStyle.backgroundImage;
		if (itsAllGood && bg){
			if (bg.match(/\.png/i) != null){
				var mypng = bg.substring(5,bg.length-2);				
				document.all[i].style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+mypng+"', sizingMethod='scale')";
				document.all[i].style.backgroundImage = "url('/assets/images/x.gif')";
			}
		}
	}
}