const vornameInput = document.getElementsByName('firstname')[0];
const nachnameInput = document.getElementsByName('lastname')[0];
const submitBtn = document.querySelector('button[type="submit"]');
const emailInput = document.getElementById('email');

function validateInput() {
  console.log("test123");
  const vorname = vornameInput.value.trim();
  const nachname = nachnameInput.value.trim();
  const email =emailInput.value.trim();

  // Vorname-Validierung
  const vornameRegex = /^[A-Z][a-z]{1,}$/; // min. 2 Buchstaben, beginnt mit Großbuchstabe
  if (!vornameRegex.test(vorname)) {
    alert('Bitte geben Sie einen gültigen Vornamen ein.');
    return false;
  }

  // Nachname-Validierung
  const nachnameRegex = /^([a-zA-ZäöüÄÖÜß]{1}(?![a-zA-ZäöüÄÖÜß]{2})[a-zA-ZäöüÄÖÜß]{0,18}){1}$/; // min. 2 Buchstaben, kann mit Kleinbuchstabe beginnen, keine zwei Bindestriche hintereinander, keine Sonderzeichen
  if (!nachnameRegex.test(nachname)) {
    alert('Bitte geben Sie einen gültigen Nachnamen ein.');
    return false;
  }

  // E-Mail-Validierung
  if (!validateEmail(email)){
    alert('Bitte geben Sie eine gültige E-Mail-Adresse ein.')
    return false;
  }

  // Größenbeschränkung
  if (vorname.length > 50 || nachname.length > 50) {
    alert('Vorname und Nachname dürfen maximal 50 Zeichen lang sein.');
    return false;
  }

  return true;
}

function validateEmail(email) {
    const emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailRegex.test(email);
  }

submitBtn.addEventListener('click', function(event) {
  if (!validateInput()) {
    event.preventDefault();
  }
});
