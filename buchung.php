<?php
$bodyId = 'body-buchung';
include 'header.php';
$vip = $_GET['vip'];
$fos = $_GET['fos'];
$steh = $_GET['steh'];
$eventID = $_GET['event_ID'];
echo '<main>';
echo '<form id="buchungsForm" method="POST" action="buchung_bestaetigung.php">';
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
// Versteckte Eingabefelder für $vip, $fos und $steh
echo '<input type="hidden" name="vip" value="' . $vip . '">';
echo '<input type="hidden" name="fos" value="' . $fos . '">';
echo '<input type="hidden" name="steh" value="' . $steh . '">';
echo '<input type="hidden" name="event_ID" value="' . $eventID . '">';
//-----------------------------------------------------------
echo '</form>';
echo '<div class="form-box">';
echo '<input type="hidden" name="validationResult" id="validationResult" value="" />';
echo '<button type="submit" id="verbindlichBuchen">Verbindlich buchen</button>';
echo '</div>';
echo '</div>';
echo '</form>';

echo '</main>';

include 'footer.php';
echo '<script src="eingabe_pruefen.js"></script>';

