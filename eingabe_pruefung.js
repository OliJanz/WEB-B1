function validateInput() {
	var vorname = document.getElementById("vorname").value;
	var nachname = document.getElementById("nachname").value;
	var email = document.getElementById("emailAdresse").value;

	var retval = true;

	// Vorname-Validierung
	const vornameRegex = /^(?!.*([a-zA-Zäöüß -])\1{1})[a-zA-Zäöüß -]{1,20}$/; // min. 2 Buchstaben, beginnt mit Großbuchstabe
	if (!vornameRegex.test(vorname)) {
		document.getElementById("falscherVorname").style.visibility = "visible";

		retval = false;
	} else {
		document.getElementById("falscherVorname").style.visibility = "hidden";
	}

	// Nachname-Validierung
	const nachnameRegex = /^(?!.*([a-zA-Zäöüß -])\1{1})[a-zA-Zäöüß -]{1,20}$/; // min. 2 Buchstaben, kann mit Kleinbuchstabe beginnen, keine zwei Bindestriche hintereinander, keine Sonderzeichen
	if (!nachnameRegex.test(nachname)) {
		document.getElementById("falscherNachname").style.visibility =
			"visible";
		retval = false;
	} else {
		document.getElementById("falscherNachname").style.visibility = "hidden";
	}

	// Größenbeschränkung
	if (vorname.length > 20) {
		display.getElementById("falscherVorname").style.visibility = "visible";
		retval = false;
	}

	if (nachname.length > 20) {
		display.getElementById("falscherNachname").style.visibility = "visible";
		retval = false;
	}

	// E-Mail-Validierung
	if (!validateEmail(email)) {
		document.getElementById("falscheEmail").style.visibility = "visible";
		setTimeout(function () {
			document.getElementById("falscheEmail").style.visibility = "hidden";
		}, 3000);
		retval = false;
	}
	return retval;
}

function validateEmail(email) {
	const emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	return emailRegex.test(email);
}
