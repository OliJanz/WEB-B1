const form = document.getElementById("infoForm");
form.addEventListener("submit", validateForm);

function validateForm(evt) {
	console.log("InfoForm Prüfen");

	const retvalInfo = true;
	var vipInput = document.getElementById("vipInput").value;
	var fosInput = document.getElementById("fosInput").value;
	var stehInput = document.getElementById("stehInput").value;



	if (isNaN(vipInput) || isNaN(fosInput) || isNaN(stehInput)) {
		document.getElementById("einPlatz").style.visibility = "visible";
		retvalInfo = false;
		evt.preventDefault();
	}else{
		document.getElementById('einPlatz').style.visibility = "none";
	}


	if (vipInput <= 0 && fosInput <= 0 && stehInput <= 0) {
		document.getElementById("einPlatz").style.visibility = "visible";
		retval = false;
		evt.preventDefault();
	}else{
		document.getElementById('einPlatz').style.visibility = "none";
	}

	if (retval == false) {
		return false;
		evt.preventDefault();
	}
	return retval;
}
