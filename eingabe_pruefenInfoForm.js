function validateForm() {
  console.log("test");
  var vip = parseInt(document.getElementById("vipInput").value);
  var fos = parseInt(document.getElementById("fosInput").value);
  var steh = parseInt(document.getElementById("stehInput").value);
  // Überprüfen, ob alle Werte null sind
  if (vip == 0 || fos == 0 || steh == 0) {
    alert("Alle Werte sind Null. Bitte geben Sie mindestens einen positiven Wert ein.");
    return false;
  } 
  // Überprüfen, ob alle Werte positiv oder alle Werte negativ sind
  else if ((vip >= 0 && fos >= 0 && steh >= 0) || (vip <= 0 && fos <= 0 && steh <= 0)) {
    alert("Einer der Werte muss positiv sein und keiner darf negativ sein.");
    return false;
  } 

  return true;

}