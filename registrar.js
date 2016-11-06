
function registrar(nombre,apellidos,email,contraseña,numt,especialidad,interes,foto){
	xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById("registrado").innerHTML=xmlhttp.responseText;}
		
	}
	
	
	
	if(nombre==""|| apellidos==""|| email==""||contraseña=="" || numt=="" || especialidad==""){
		
		document.getElementById("registrado").innerHTML="Espabila";
		return;
		
	}
	xmlhttp.open("POST","Registrar.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("nombre="+nombre+"&apellidos="+apellidos+"&email="+email+"&contraseña="+contraseña+"&numt="+numt+"&especialidad="+especialidad+"&interes="+interes+"&img="+foto);
}

function verificarc(email){
	xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById("everifi").innerHTML=xmlhttp.responseText;
			if(xmlhttp.responseText == "SI"){
				
				document.getElementById("Registrar").disabled=false;
				
			}
			else document.getElementById("Registrar").disabled=true;
			}
		
	}
	
	
	
	if(email==""){
		
		document.getElementById("everifi").innerHTML="";
		return;
		
	}
	xmlhttp.open("POST","verificarc.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("email="+email);
}


function verificarcontra(contraseña){
	xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById("cverifi").innerHTML=xmlhttp.responseText;
			if(xmlhttp.responseText == "VALIDA"){
				
				document.getElementById("Registrar").disabled=false;
				
			}
			else document.getElementById("Registrar").disabled=true;
			}
		
	}
	
	
	
	if(contraseña==""){
		
		document.getElementById("cverifi").innerHTML="";
		return;
		
	}
	xmlhttp.open("POST","verificarcontra.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("contraseña="+contraseña);
}