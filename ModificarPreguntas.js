//verpreguntas();
//AJAX ver preguntas
function verpreguntas(){
	
	xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById("verpreg").innerHTML=xmlhttp.responseText;}
		
	}
	
	xmlhttp.open("POST","VerPreguntasm.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send();
	
	
	
	
}


function verPreguntaD(num_preg){
	
	xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById("verinput").innerHTML=xmlhttp.responseText;}
		
	}
	
	
	
	if(num_preg==""){
		
		document.getElementById("verinput").innerHTML="Vacio";
		return;
		
	}
	xmlhttp.open("POST","AnadirInput.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("num_preg="+num_preg);
	
}

function modificarp(codigo,pregunta,respuesta,dificultad,tema){
	
	xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById("resultado").innerHTML=xmlhttp.responseText;}
		
	}
	
	
	
	if(codigo=="" || pregunta==""|| respuesta==""|| dificultad==""||tema==""){
		
		document.getElementById("resultado").innerHTML="";
		return;
		
	}
	xmlhttp.open("POST","ModificarPregunta.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("codigo="+codigo+"&pregunta="+pregunta+"&respuesta="+respuesta+"&dificultad="+dificultad+"&tematica="+tema);
	
}