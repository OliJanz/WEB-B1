const form = document.getElementById("buchungsForm");
form.addEventListener("submit", validateInput);

function validateInput(evt) {
	var vorname = document.getElementById("vorname").value;
	var nachname = document.getElementById("nachname").value;
	var email = document.getElementById("emailAdresse").value;

	var retval = true;

	// Vorname-Validierung
	const vornameRegex = /^[A-ZÄÖÜ](?!.*([a-zA-Zäöüß -])\1{2})[a-zA-Zäöüß -]{0,19}$/; //Beginnt mit Großbuchstabe,erlaubt " ","-", maximal 2 gleiche Buchstaben nacheinander
	if (!vornameRegex.test(vorname)) {
		document.getElementById("falscherVorname").style.visibility = "visible";

		retval = false;
	} else {
		document.getElementById("falscherVorname").style.visibility = "hidden";
	}

	// Nachname-Validierung
	const nachnameRegex = /^[A-ZÄÖÜ](?!.*([a-zA-Zäöüß -])\1{2})[a-zA-Zäöüß -]{0,19}$/; //Beginnt mit Großbuchstabe,erlaubt " ","-", maximal 2 gleiche Buchstaben nacheinander,max 20 Zeichen
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

	if (retval == false) {
		evt.preventDefault();
	}
}

function validateEmail(email) {
	const emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	return emailRegex.test(email);
}
