document.getElementById("infoForm").addEventListener("submit", validateForm());

function validateForm() {
	console.log("test");
	var vipInput = document.getElementById("vipInput").value;
	var fosInput = document.getElementById("fosInput").value;
	var stehInput = document.getElementById("stehInput").value;
	console.log(vipInput);
	console.log(fosInput);
	console.log(stehInput);

	if (isNaN(vipInput) || isNaN(fosInput) || isNaN(stehInput)) {
		document.getElementById("einPlatz").style.display = "block";
		return false;
	}
	console.log("test12313423s");
	if (vipInput <= 0 && fosInput <= 0 && stehInput <= 0) {
		document.getElementById("einPlatz").style.display = "block";
		return false;
	}

	return true;
}
