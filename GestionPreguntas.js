//AJAX METER PREGUNTAS

	function meterPregunta(pregunta,respuesta,dificultad,tema){
	xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById("espregunta").innerHTML=xmlhttp.responseText;}
		
	}
	
	
	
	if(pregunta==""|| respuesta==""|| dificultad==""||tema==""){
		
		document.getElementById("espregunta").innerHTML="";
		return;
		
	}
	xmlhttp.open("POST","InsertarPregunta.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("pregunta="+pregunta+"&respuesta="+respuesta+"&dificultad="+dificultad+"&tematica="+tema);
}

function verpreguntas(){
	
	xmlhttp= new XMLHttpRequest();
	xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById("verpreg").innerHTML=xmlhttp.responseText;}
		
	}
	
	xmlhttp.open("POST","VerPreguntasXML.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send();
	
	
	
	
}