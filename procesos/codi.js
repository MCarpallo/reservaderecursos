function validacionLogin(){
	var user = document.getElementById('user').value;
	var password = document.getElementById('password').value;

	if (user == '' && password == '') {
		document.getElementById('mensaje').style.display ='block'
		document.getElementById('mensaje').innerHTML = "Los campos user y password son obligatorios";
		return false;
	}else if (user=='') {
		document.getElementById('mensaje').style.display ='block'
		document.getElementById('mensaje').innerHTML = "El campo user es obligatorio";
		return false;
	}else if (password=='') {
		document.getElementById('mensaje').style.display ='block'
		document.getElementById('mensaje').innerHTML = "El campo password es obligatorio";
		return false;
	}else {
		return true;
	}
	}


	
