const form = document.getElementById("buchungsForm");
form.addEventListener("submit", validateInput);

function validateInput(evt) {
  console.log('test213');
	var vorname = document.getElementById("vorname").value;
	var nachname = document.getElementById("nachname").value;
	var email = document.getElementById("emailAdresse").value;

	var retval = true;

	// Vorname-Validierung
	const vornameRegex = /^[A-ZÄÖÜ](?!.*([a-zA-Zäöüß -])\1{2})[a-zA-Zäöüß -]{0,19}$/; //Beginnt mit Großbuchstabe,erlaubt " ","-", maximal 2 gleiche Buchstaben nacheinander
	if (!vornameRegex.test(vorname)) {
		document.getElementById("falscherVorname").style.visibility = "visible";
    console.log('vorname');
		retval = false;
	} else {
		document.getElementById("falscherVorname").style.visibility = "hidden";
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

	const min2Buchstaben=/./; 
  if(!min2Buchstaben.test(nachname)) { 
    console.log('vorname');
    document.getElementById("min2Buchst").style.visibility= "visible"; 
    retval = false; 
  } else {
		document.getElementById("min2Bucst").style.visibility="hidden";
	} 

  const kSonderzeichen =/[^a-zA-Z]/g ; 
  if(!kSonderzeichen.test(nachname)) {
    document.getElementById("keineSonderzeichen").style.visibility="visibile"; 
    retval= false; 
    } 
  else{
		document.getElementById("keineSonderzeichen").style.visibility="hidden";
	}

  const k2BindestricheH =/^(?!.*--).*$/g ; //Keine zwei - hintereinander  
  if(!k2BindestricheH.test(nachname)) { 
    document.getElementById("k2BH").style.visibility="visible";
    retval = false; 
  } 
  else{
		document.getElementById("k2BH").style.visibility="hidden";
	}  

  const zweiWörter= /^(?:[A-Za-z][A-Za-z]*)(?: [A-Z][A-Za-z]*)$/; // zwei wörter erstes wort fängt groß/klein an zweites wort fängt groß an  
  if(!zweiWörter.test(nachname)) {
    document.getElementById("zweiWörter").style.visibility="visible";
    retval= false; 
    } 
  else{
		document.getElementById("zweiWörter").style.visibility="hidden";
	}
    
  const einWort = /^(?:[A-Z][A-Za-z]*|[A-Z][a-z]*)$/; //ein Wort erster Buchstabe groß, rest klein
  if(einWort.test(nachname)) {
    document.getElementById("einWort").style.visibility="visibility";
		retval = false;}
  else {
	  document.getElementById("einWort").style.visibility="hidden";
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

  return retval;
}

function validateEmail(email) {
	const emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	return emailRegex.test(email);
}
