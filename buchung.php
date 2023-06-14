<?php
$bodyId = 'body-buchung';
include 'header.php';
echo '<main>';
echo '<form id="buchungsForm" method="POST" action="bestaetigung.html">';
echo '<div class="formular">';
echo '<h3 id="form-headline">';
echo 'Zu Kontaktzwecken, sowie der Bestätigung des';
echo 'Buchungsvertrages brauchen wir noch ein paar Daten von';
echo 'Ihnen:';
echo '</h3>';
echo '<div class="inputs-container" >';
echo '<div class="form-box" id="firstname">';
echo '<label for="vorname">Vorname:</label>';
echo '<input type="text" name="firstname" id="vorname" required />';
echo '<span class="falscheEingabe" id="falscherVorname">Bitte geben Sie einen gültigen Vornamen ein.</span>';
echo '</div>';
echo '<div class="form-box" id="lastname">';
echo '<label for="nachname">Nachname:</label>';
echo '<input type="text" name="lastname" id="nachname" required />';
echo '<span class="falscheEingabe" id="falscherNachname">Mindestens 2 Buchstaben</span>';
echo '</div>';
echo '<div class="form-box" id="email">';
echo '<label for="emailAdresse">E-Mail:</label>';
echo '<input type="email" name="email" id="emailAdresse" required />';
echo '<span class="falscheEingabe" id="falscheEmail">Bitte geben Sie eine gültige E-Mail Adresse ein.</span>';
echo '</div>';
echo '</div>';
echo '<div>';
echo '<div class="form-box check-box">';
echo '<input type="checkbox" id="agb" name="agb" required />';
echo '<label for="agb">Ich habe die <a href="/agb.html">AGB\'s</a> gelesen und akzeptiere diese</label>';
echo '</div>';
echo '<div class="form-box check-box">';
echo '<input type="checkbox" id="datenschutz" name="datenschutz" required />';
echo '<label for="datenschutz">Ich habe die <a href="/datenschutz.html">Datenschutzverordnung</a> gelesen und akzeptiere diese</label>';
echo '</div>';
echo '</div>';
echo '<div class="form-box">';
echo '<input type="hidden" name="validationResult" id="validationResult" value="" />';
echo '<button type="submit" id="verbindlichBuchen">Verbindlich buchen</button>';
echo '</div>';
echo '</div>';
echo '</form>';

echo '</main>';

include 'footer.php';
echo '<script src="eingabe_pruefen.js"></script>';

$servername = "localhost";
$username = "web_b-1";
$password = "Uo3oa7ac";
$dbname = "Web_b1";

$conn = new MySQLi($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['lastname'];
$vorname = $_POST['firstname']; 
$email = $_POST['email']; 
$ptsm = $conn->prepare("INSERT INTO Kunde (Name, Vorname, Email) VALUES (?, ?, ?)");

$ptsm->bind_param("sss", $name, $vorname, $email);
$ptsm->execute();

$ptsm->close();
$conn->close();
?>