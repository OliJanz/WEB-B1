
function validateForm() {
  console.log("test");
  var vipInput = document.getElementById("vipInput").value;
  var fosInput = document.getElementById("fosInput").value;
  var stehInput = document.getElementById("stehInput").value;

  if (isNaN(vipInput) || isNaN(fosInput) || isNaN(stehInput)) {
    alert("Bitte wählen Sie einen Sitzplatz aus.");
    return false;
  }

  if (vipInput <= 0 && fosInput <= 0 && stehInput <= 0) {
    document.getElementById("einPlatz").style.display = "block";
    return false;
  }

  return true;
}