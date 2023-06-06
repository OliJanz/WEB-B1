const form = document.getElementById("infoForm");
form.addEventListener("submit", validateForm);

function validateForm(evt) {
	evt.preventDefault();
	var vipInput = document.getElementById("vipInput").value;
	var fosInput = document.getElementById("fosInput").value;
	var stehInput = document.getElementById("stehInput").value;

	if (isNaN(vipInput) || isNaN(fosInput) || isNaN(stehInput)) {
		document.getElementById("einPlatz").style.visibility = "visible";
	}
	if (vipInput <= 0 && fosInput <= 0 && stehInput <= 0) {
		document.getElementById("einPlatz").style.visibility = "visible";
		retval = false;
	}

	if (retval == false) {
		return false;
	}
	return retval;
}
