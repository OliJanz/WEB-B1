const form = document.getElementById("buchungsForm"); 

form.addEventListener("submit", (e) => {
    e.preventDefault();

   if(checkInputs()=== true){
    form.submit();
   };
});

function checkInputs(){
    const vornameInput = document.getElementById("vorname").value.trim();
    const nachnameInput = document.getElementById("nachname").value.trim();
    const email = document.getElementById("emailAdresse").value.trim();

    if(checkVorname(vornameInput) === true && checkNachname(nachnameInput)=== true){
        return true;
    }
    
    return false;


}

function checkVorname (vornameInput){
    //Ab hier Sonderzeichen Prüfung
    if(hasNoSpecialCharacters(vornameInput) == false){
        document.getElementById("falscherVorname").innerHTML = "Keine Sonderzeichen Erlaubt,<br> bis auf Bindestrich <br>am Anfang und am Ende <br>darf kein Bindestrich stehen"
        document.getElementById("falscherVorname").style.display = "block";
        console.log(hasNoSpecialCharacters());
        return false;
    }
    //Hier prüft man die Länge des Namens.
    if(vornameInput.length <= 1){
        document.getElementById("falscherVorname").innerHTML = "Vorname zu kurz. Der Vorname muss <br> mindestens 2 Buchstaben enthalten";
        document.getElementById("falscherVorname").style.display = "block";
        return false;
    }
    //Ab Hier Prüfen, ob der erste Buchstabe klein ist: 
   
    if(startsWithUpperCase(vornameInput) === false){
        document.getElementById("falscherVorname").innerHTML = "Der erste Buchstabe darf nicht klein sein"
        document.getElementById("falscherVorname").style.display = "block";
        return false;
    }

    if (hasNoRepeatingCharacters(vornameInput) === false){
        document.getElementById("falscherVorname").innerHTML = "Keine 3 oder mehrere gleiche Buchstaben <br>hintereinander"
        document.getElementById("falscherVorname").style.display ="block";
        return false;
    }
    document.getElementById("falscherVorname").style.display = "none";
    return true;
}

function checkNachname(name){
    //Hier prüft man die Länge des Namens.
 if(name.length <= 1){
    document.getElementById("falscherNachname").innerHTML = "Nachname zu kurz. Der Nachname muss <br> mindestens 2 Buchstaben enthalten";
    document.getElementById("falscherNachname").style.display = "block";
    return false;
}
 //prüfen Nachname, darf "van" am Anfang haben oder Großbuchstabe und nach "van" muss ein Großbuchstabe folgen

 if(!startsWithUpperCase(name) && !name.match(/^van [A-Z]/)){
    document.getElementById("falscherNachname").innerHTML = "Nachname muss mit Großbuchstaben starten <br> oder mit 'van' nach 'van' <br>muss großbuchstabe erfolgen"
    document.getElementById("falscherNachname").style.display ="block";
    return false;
 }
 if(hasNoSpecialCharacters(name) === false){
    document.getElementById("falscherNachname").innerHTML = "Keine Sonderzeichen Erlaubt,<br> bis auf Bindestrich <br>am Anfang und am Ende <br>darf kein Bindestrich stehen"
    document.getElementById("falscherNachname").style.display ="block";
    return false;
 }

 if(hasNoRepeatingCharacters(name) === false){
    document.getElementById("falscherNachname").innerHTML = "Keine 3 oder mehrere gleiche Buchstaben <br>hintereinander"
    document.getElementById("falscherNachname").style.display ="block";
    return false;
 }
 
 document.getElementById("falscherNachname").style.display ="none";
 return true;

}
// Funktion zur Prüfung der Sonderzeichen...String nur aus Buchstaben besteht und dass ein einzelner Bindestrich zwischen den Buchstaben erlaubt ist. Der Ausdruck erlaubt keine Zahlen und keine Sonderzeichen.

function hasNoSpecialCharacters(name){
 const regex = /^[a-zA-Z]+([ -][a-zA-Z]+)*$/;
 if (regex.test(name) && !name.startsWith('-') && !name.endsWith('-')){
    return true;
 }
 else{
    return false;
 }
}
// Funktion prüft am Anfang, ob es ein Großbuchstabe oder kleinbuchstabe ist.
function startsWithUpperCase(name){
    const firstChar = name.charAt(0);
    const firstCharLowerCast = firstChar.toLowerCase();
    if(firstChar === firstCharLowerCast){
        return false; 
    }
    else{
        return true;
    }
}
// Funktion prüft, ob 3 oder mehrere gleiche Buchstaben hintereinander folgen.
function hasNoRepeatingCharacters(name){
    nameToLowerCase = name.toLowerCase();
    for(let i = 0; i < nameToLowerCase.length - 2; i++){
        if(nameToLowerCase[i] === nameToLowerCase[i+1] && nameToLowerCase[i] === nameToLowerCase[i+2]){
            return false;
        }
    }
    return true;
}