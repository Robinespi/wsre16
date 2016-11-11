var contrav;
var emailv;


function checkform(nombre,apellidos,email,contraseña,contrav,numt,especialidad,interes,foto){
	
	var nombre
	var apellido
	var email
	var contraseña
	var numt
	
	
	nombre= document.getElementById("Nombre").value
	apellido= document.getElementById("Apellidos").value 
	email= document.getElementById("E-mail").value
	contraseña= document.getElementById("Contraseña").value
	numt= document.getElementById("Numero telefono").value
		
	
	if(!CNombre(nombre) || !CApellido(apellido) || !CEmail(email) || !CContraseña(contraseña,contrav) || !CNumt(numt))
	return false;
	else {
		
		registrar(nombre,apellidos,email,contraseña,numt,especialidad,interes,foto);
		return true;
	}
}

function CNombre(nombre){
	
	
	if(nombre.length == 0)
	{
		
		alert("Nombre obligatorio");
		return false;
	}
	else return true;
	
}

function CApellido(apellido){
	
	expra=/^([a-zA-Z])+[ ]([a-zA-Z])+$/;
	if(apellido.length == 0){
		
		alert("Apellido obligatorio");
		return false;
		
	}
	else if(!expra.test(apellido)){
		
		alert("Introduce dos apellidos");
		return false;
	}
	else return true;
	
}

function CEmail(email){
	
	expr=/^([a-z]){2,}[0-9][0-9][0-9]@ikasle\.ehu\.[e]u?[s]$/;
	
	if(email.length == 0){
		
		alert("E-mail obligatorio");
		return false;
		
	}
	else if(!expr.test(email))
	{
		
		alert("Formato e-mail:nombreXXX@ikasle.ehu.es o nombreXXX@ikasle.ehu.eus");
		return false;
		
	}
	else return true;
	
}

function CContraseña(contraseña,contrav){
	
	if( contraseña.length == 0){
		
		alert("Contraseña obligatorio");
		return false;
		
	}
	else if(contraseña.length < 6){
		
		alert("La contraseña tiene que tener al menos 6 caracteres");
		return false;
		
	}
	else if(contraseña!=contrav){
		
		alert("La contraseñas no coinciden");
		return false;
		
	}
	else return true;
	
}

function CNumt(numt){
	
	if(numt.length == 0){
		
		alert("Numero telefono obligatorio");
		return false;
		
	}
	else if(!/^([0-9])*$/.test(numt)){
		
		alert("El numero de telefono solo puede contener numeros");
		return false;
		
	}
	else if(numt.length < 9 || numt.length > 9){
		alert("El numero de telefono tiene que tener 9 digitos");
		return false;
		
	}
	else return true;
	
}

function CEspecialidad(){
	
	
	var t = document.getElementById('fotra');
	var txt = document.getElementById('txotra');
	
	if(document.getElementById('Especialidad').value == 'otra'){
	if(!txt){
	var r = document.createElement('input'); 
	var itype = 'text';
	var idotra = 'txotra';
	var name = 'txotra';
	var value = 'Probando el valor';
	r.setAttribute('type',itype);
	r.setAttribute('id',idotra);
	r.setAttribute('name', name);
	r.setAttribute('value', value);
		t.appendChild(r); }
		}
	else {
		if(txt){
			padre = txt.parentNode;
			padre.removeChild(txt);
		}
	}
}

function registrar(nombre,apellidos,email,contraseña,numt,especialidad,interes,foto){
	xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById("registrado").innerHTML=xmlhttp.responseText;}
		
	}
	
	
	
	if(nombre==""|| apellidos==""|| email==""||contraseña=="" || numt=="" || especialidad==""){
		
		document.getElementById("registrado").innerHTML="";
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
			emailv=xmlhttp.responseText;
			activarboton();
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


function verificarcontra(contraseña,clave){
	xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById("cverifi").innerHTML=xmlhttp.responseText;
		contrav=xmlhttp.responseText;
		activarboton();}
		
	}
	
	
	
	if(contraseña==""|| clave==""){
		
		document.getElementById("cverifi").innerHTML="";
		return;
		
	}
	xmlhttp.open("POST","verificarcontra.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("contraseña="+contraseña+"&clave="+clave);
}
function activarboton(){
if( contrav== "VALIDA" && emailv=="SI"){
	document.getElementById("Registrar").disabled=false;
}else { document.getElementById("Registrar").disabled=true;}
}