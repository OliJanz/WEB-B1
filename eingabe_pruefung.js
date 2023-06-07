const form = document.getElementById("buchungsForm");
form.addEventListener("submit", validateInput);

function validateInput(evt) {
	console.log("test213");
	var vorname = document.getElementById("vorname").value;
	var nachname = document.getElementById("nachname").value;
	var email = document.getElementById("emailAdresse").value;
	console.log(vorname);
	console.log(nachname);

	const einWort = /^[A-Z][a-z]*$/;

	var retval = true;
	// Vorname-Validierung
	const vornameRegex =
		/^[A-ZÄÖÜ](?!.*([a-zA-Zäöüß -])\1{2})[a-zA-Zäöüß -]{0,19}$/; //Beginnt mit Großbuchstabe,erlaubt " ","-", maximal 2 gleiche Buchstaben nacheinander
	if (!vornameRegex.test(vorname)) {
		document.getElementById("falscherVorname").style.display = "block";
		evt.preventDefault();
		retval = false;
	} else {
		document.getElementById("falscherVorname").style.display = "none";
	}

	const min2Buchstaben = /./;
	if (!min2Buchstaben.test(vorname)) {
		document.getElementById("min2BuchstabenVorname").style.display =
			"block";
		evt.preventDefault();
		retval = false;
	} else {
		document.getElementById("min2BuchstabenVorname").style.display = "none";
	}

	const kSonderzeichen = /[a-zA-Z]+$/;
	if (!kSonderzeichen.test(vorname)) {
		document.getElementById("keineSonderzeichenVorname").style.display =
			"block";
		evt.preventDefault();
		retval = false;
	} else {
		document.getElementById("keineSonderzeichenVorname").style.display =
			"none";
	}

	if (!einWort.test(vorname)) {
		document.getElementById("einWortVorname").style.display = "block";
		evt.preventDefault();
		retval = false;
	} else {
		document.getElementById("einWortVorname").style.display = "none";
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

	if (!min2Buchstaben.test(nachname)) {
		document.getElementById("min2Buchst").style.display = "block";
		evt.preventDefault();
		retval = false;
	} else {
		document.getElementById("min2Buchst").style.display = "none";
	}

	if (!kSonderzeichen.test(nachname)) {
		document.getElementById("keineSonderzeichen").style.display = "block";
		evt.preventDefault();
		retval = false;
	} else {
		document.getElementById("keineSonderzeichen").style.display = "none";
	}

	const ZweiBind = /-{2,}/; //Prüft auf 2 BIndestriche hitnereinander
	if (ZweiBind.test(nachname)) {
		document.getElementById("k2BH").style.display = "block";
		evt.preventDefault();
		retval = false;
	} else {
		document.getElementById("k2BH").style.display = "none";
	}

	const zweiWörter = /^[A-Za-z]+ [A-Z][a-zA-Z]*$/; // zwei wörter: erstes wort fängt groß/klein an zweites wort fängt groß an
	//ein Wort erster Buchstabe groß, rest klein

	if (checkNameWordCountOne(nachname) == true) {
		if (!einWort.test(nachname)) {
			document.getElementById("einWort").style.display = "block";
			evt.preventDefault();
			retval = false;
		} else {
			document.getElementById("einWort").style.display = "none";
		}
	}

	if (checkNameWordCountTwo(nachname) == true) {
		if (!zweiWörter.test(nachname)) {
			document.getElementById("zweiWörter").style.display = "block";
			evt.preventDefault();
			retval = false;
		} else {
			document.getElementById("zweiWörter").style.display = "none";
		}
	}

	// Größenbeschränkung
	if (vorname.length > 20) {
		display.getElementById("falscherVorname").style.display = "block";
		evt.preventDefault();
		retval = false;
	}

	if (nachname.length > 20) {
		display.getElementById("falscherNachname").style.display = "block";
		evt.preventDefault();
		retval = false;
	}

	// E-Mail-Validierung
	if (!validateEmail(email)) {
		document.getElementById("falscheEmail").style.display = "block";
		evt.preventDefault();
		setTimeout(function () {
			document.getElementById("falscheEmail").style.display = "none";
		}, 3000);
		retval = false;
	}

	if (retval == false) {
		evt.preventDefault();
		return false;
	}
	document.getElementById("validationResult").value = retval;
	return retval;
}

function validateEmail(email) {
	const emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	return emailRegex.test(email);
}

function getNumWords(name) {
	return name.split(" ");
}

function checkNameWordCountOne(nachname) {
	// Entferne führende und nachfolgende Leerzeichen
	nachname = nachname.trim();

	// Teile den Nachnamen anhand von Leerzeichen auf
	var words = nachname.split(" ");

	// Überprüfe die Anzahl der Wörter
	var wordCount = words.length;
	if (wordCount === 1) {
		return true;
	} else {
		return false;
	}
}

function checkNameWordCountTwo(nachname) {
	// Entferne führende und nachfolgende Leerzeichen
	nachname = nachname.trim();

	// Teile den Nachnamen anhand von Leerzeichen auf
	var words = nachname.split(" ");

	// Überprüfe die Anzahl der Wörter
	var wordCount = words.length;
	if (wordCount === 2) {
		return true;
	} else {
		return false;
	}
}
