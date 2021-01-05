var w = window.innerWidth;
var h = window.innerHeight;
if(w < 680 || h < 458){
    document.getElementById("stickcol").innerHTML +=  '<div><iframe src="https://drive.google.com/file/d/10HKOybDTrDDfuhGBuvFLqs7v1_Qe4V0c/preview" width="480" height="338"></iframe></div>'
}
else{
	document.getElementById("stickcol").innerHTML +=  '<div><iframe src="https://drive.google.com/file/d/10HKOybDTrDDfuhGBuvFLqs7v1_Qe4V0c/preview" width="640" height="480"></iframe></div>'
}