function showFormSign() {
	if(document.getElementById('formSignup').style.display == 'block'){
		document.getElementById('formSignup').style.display = 'none';
	}
	else{
		document.getElementById('formSignup').style.display = 'block';
        document.getElementById('formChange').style.display = 'none';
        document.getElementById('formDelete').style.display = 'none';

        document.getElementById('buttonSign').style.display = 'none';
        document.getElementById('buttonChange').style.display = 'block';
        document.getElementById('buttonDelete').style.display = 'block';
	}
}

function showFormChange() {
    if(document.getElementById('formChange').style.display == 'block'){
    	document.getElementById('formChange').style.display = 'none';
    }
    else{
		document.getElementById('formChange').style.display = 'block';
        document.getElementById('formSignup').style.display = 'none';
        document.getElementById('formDelete').style.display = 'none';

            document.getElementById('buttonSign').style.display = 'block';
            document.getElementById('buttonChange').style.display = 'none';
            document.getElementById('buttonDelete').style.display = 'block';
		}
	}

function showFormDelete() {
	if(document.getElementById('formDelete').style.display == 'block'){
		document.getElementById('formDelete').style.display = 'none';
	}
	else{
		document.getElementById('formDelete').style.display = 'block';
        document.getElementById('formSignup').style.display = 'none';
        document.getElementById('formChange').style.display = 'none';
        
        document.getElementById('buttonSign').style.display = 'block';
        document.getElementById('buttonChange').style.display = 'block';
        document.getElementById('buttonDelete').style.display = 'none';
	}
}
