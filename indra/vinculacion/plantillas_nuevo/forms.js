if (!document.layers) 
	 document.write("<style>.box{ font-size:10pt;background-color:white;border:1px solid #919191; font-family:Verdana;scrollbar-face-color:EEEEEE;scrollbar-highlight-color:F1F1F1;scrollbar-shadow-color:909090;scrollbar-3dlight-color:909090;scrollbar-arrow-color:909090;scrollbar-track-color:EFEFEF;scrollbar-darkshadow-color:f0f0f0;}.but{ font-size:9pt; background-color:white;border:1px solid #919191; font-family:Verdana;}<"+"\/"+"style>");


ie   = document.all?1:0;
ns   = document.layers?1:0;

function LightOn(what, message)
{
   if (ie||ns6){
		  window.status=message;
			what.style.backgroundColor='#EAEAEA';
			what.style.cursor='hand';
	 }else window.status=message;
}
function LightOut(what)
{
	 if (ie||ns6){
	    what.style.backgroundColor='white';
			window.status='';
	 }else window.status='';
}