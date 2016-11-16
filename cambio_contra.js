var contraver;

function modificarc(contra,vcontra,email){
	
	if(contra != vcontra){ 
	alert("Las contraseñas no coinciden");
	}
	else{
	xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById("resultado").innerHTML=xmlhttp.responseText;}
		
	}
	
	
	
	if(contra=="" || vcontra=="" || email==""){
		
		document.getElementById("resultado").innerHTML="";
		return;
		
	}
	xmlhttp.open("POST","CambioContra.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("contra="+contra+"&vcontra"+vcontra+"&email="+email);
	}
}

function veriemail(email){
	
	xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById("everi").innerHTML=xmlhttp.responseText;}
		
	}
	
	
	
	if(email==""){
		
		document.getElementById("everi").innerHTML="";
		return;
		
	}
	xmlhttp.open("POST","VeriEmail.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("email="+email);
	
}

function verificarcontra(contra,clave){
	xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById("cverifi").innerHTML=xmlhttp.responseText;
		contraver=xmlhttp.responseText;
		activarboton();}
		
	}
	
	
	
	if(contra==""|| clave==""){
		
		document.getElementById("cverifi").innerHTML="";
		return;
		
	}
	xmlhttp.open("POST","verificarcontra.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("contra="+contra+"&clave="+clave);
}

function activarboton(){
if( contraver== "VALIDA"){
	document.getElementById("Cambiar").disabled=false;
}else { document.getElementById("Cambiar").disabled=true;}
}