const form = document.getElementById("buchungsForm");
form.addEventListener("submit", validateInput);

function validateInput(evt) {
	console.log("test213");
	evt.preventDefault();
	var vorname = document.getElementById("vorname").value;
	var nachname = document.getElementById("nachname").value;
	var email = document.getElementById("emailAdresse").value;

	var retval = true;

	// Vorname-Validierung
	const vornameRegex =
		/^[A-ZÄÖÜ](?!.*([a-zA-Zäöüß -])\1{2})[a-zA-Zäöüß -]{0,19}$/; //Beginnt mit Großbuchstabe,erlaubt " ","-", maximal 2 gleiche Buchstaben nacheinander
	if (!vornameRegex.test(vorname)) {
		document.getElementById("falscherVorname").style.display = "block";
		console.log("vorname");
		retval = false;
	} else {
		document.getElementById("falscherVorname").style.display = "block";
	}

	// Nachname-Validierung
	/*const nachnameRegex = /^[A-ZÄÖÜ](?!.*([a-zA-Zäöüß -])\1{2})[a-zA-Zäöüß -]{0,19}$/; //Beginnt mit Großbuchstabe,erlaubt " ","-", maximal 2 gleiche Buchstaben nacheinander,max 20 Zeichen
	if (!nachnameRegex.test(nachname)) {
		document.getElementById("falscherNachname").style.visibility =
			"visible";
		retval = false;
	} else {
		document.getElementById("falscherNachname").style.visibility = "hidden";
	} */

	const min2Buchstaben = /./;
	if (!min2Buchstaben.test(nachname)) {
		console.log("vorname");
		document.getElementById("min2Buchst").style.display = "block";
		retval = false;
	} else {
		document.getElementById("min2Buchst").style.display = "block";
	}

	const kSonderzeichen = /[^a-zA-Z]+$/;
	if (!kSonderzeichen.test(nachname)) {
		document.getElementById("keineSonderzeichen").style.display = "block";
		retval = false;
	} else {
		document.getElementById("keineSonderzeichen").style.display = "block";
	}

	const ZweiBind = /-{2,}/; //Prüft auf 2 BIndestriche hitnereinander
	if (!ZweiBind.test(nachname)) {
		document.getElementById("k2BH").style.display = "block";
		retval = false;
	} else {
		document.getElementById("k2BH").style.display = "block";
	}

	const zweiWörter = /^[A-Za-z][a-zA-Z]* [A-Z][a-zA-Z]*$/; // zwei wörter: erstes wort fängt groß/klein an zweites wort fängt groß an
	if (!zweiWörter.test(nachname)) {
		document.getElementById("zweiWörter").style.display = "block";
		retval = false;
	} else {
		document.getElementById("zweiWörter").style.display = "block";
	}

	const einWort = /^[A-Z][a-z]*$/; //ein Wort erster Buchstabe groß, rest klein
	if (einWort.test(nachname)) {
		document.getElementById("einWort").style.display = "block";
		retval = false;
	} else {
		document.getElementById("einWort").style.display = "block";
	}

	// Größenbeschränkung
	if (vorname.length > 20) {
		display.getElementById("falscherVorname").style.display = "block";
		retval = false;
	}

	if (nachname.length > 20) {
		display.getElementById("falscherNachname").style.display = "block";
		retval = false;
	}

	// E-Mail-Validierung
	if (!validateEmail(email)) {
		document.getElementById("falscheEmail").style.display = "block";
		setTimeout(function () {
			document.getElementById("falscheEmail").style.display = "block";
		}, 3000);
		retval = false;
	}

	if (retval == false) {
		return false;
	}

	return retval;
}

function validateEmail(email) {
	const emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	return emailRegex.test(email);
}
