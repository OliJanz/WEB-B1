function validateInput() {
  console.log("test123");
  var vorname = document.getElementById('vorname').value;
  var nachname = document.getElementById('nachname').value;
  var email = document.getElementById('emailAdresse').value;
  console.log(vorname);
  console.log(nachname);
  console.log(email);

  var retval = true;
 

  // Vorname-Validierung
  const vornameRegex = /^[A-Z][a-z]{1,19}$/; // min. 2 Buchstaben, beginnt mit Großbuchstabe
  if (!vornameRegex.test(vorname)) {
    document.getElementById("falscherVorname").style.display = 'block';
    
    retval =  false;
  }
  else{
    document.getElementById("falscherVorname").style.display = 'none';
  }

  // Nachname-Validierung
  const nachnameRegex = /^[A-Z][a-zØ-öø-ÿ]+([ -](?!-)[a-zø-ÿ]+)*$/; // min. 2 Buchstaben, kann mit Kleinbuchstabe beginnen, keine zwei Bindestriche hintereinander, keine Sonderzeichen
  if (!nachnameRegex.test(nachname)) {
    document.getElementById("falscherNachname").style.display = 'block';
    retval =  false;
  }
  else{
    document.getElementById("falscherNachname").style.display = 'none';
  }

 // Größenbeschränkung
 if (vorname.length > 20 || nachname.length > 20) {
  alert('Vorname und Nachname dürfen maximal 20 Zeichen lang sein.');
  retval =  false;
}

  // E-Mail-Validierung
  if (!validateEmail(email)){
    document.getElementById("falscheEmail").style.display = 'block';
    retval = false;
  }
  return retval;
}

function validateEmail(email) {
    const emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailRegex.test(email);
  }

