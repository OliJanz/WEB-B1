<?php
include 'header.php';

//Serverdaten
$servername = "localhost";
$user = "web_b-1";
$password = "Uo3oa7ac";
$db = "Web_b1";

//Connection herstellen
$connection = new mysqli($servername, $user, $password, $db);
if ($connection->connect_error) {
    die("Es tut uns leid - Die Verbindung zum Server konnte nicht aufgebaut werden." . $connection->connect_error);
}


$event_id = $_GET['event_id'];
$sql = "SELECT * FROM Event WHERE Eventnummer = '$event_id'";
$event = $connection->query($sql);
echo '<main>';

if ($event->num_rows > 0) {
    while ($row = $event->fetch_assoc()) {
        echo '<div id="info">';
        echo '<div id="infoTop">';
        echo '<div id="eventInfo">';
        // echo '<h4>Name: ' . $row['Name'] . '</h4>'; //!Falsche Row
        echo '<span> Ort: ' . $row['Ort'] . '</span>';
        echo '<span> Datum: ' . $row['Datum'] . '</span>';
        echo '<span id="verfuegbarePlaetze"> Verfügbare Plätze:</span>';
        echo '<div id="plaetze">';
        echo '<div class="dPlaetze">';
        echo '<span> VIP Plätze: </span>';
        echo '<span> FOS Plätze: </span>';
        echo '<span> Stehplätze: </span>';
        echo '</div>';
        echo '<div class="dPlaetze">';
        for ($ticketart = 100; $ticketart < 103; $ticketart++) {
            $sql = "SELECT Verfügbare Plätze
                    FROM Verfügbarkeit WHERE Eventnummer = $event_id
                    AND ArtID = $ticketart";
            $vPlaetze = $connection->query($sql);
            echo '<span>Teeeeest4</span>';
            if ($vPlaetze->num_rows > 0) {
                $zeile = $vPlaetze->fetch_assoc();
                echo '<span>';
                echo $zeile['Verfügbare Plätze'];
                echo '</span>';
            }
        }
        echo '</div>';
        echo '<div class="dPlaetze">';
        echo '<span>von</span>';
        echo '<span>von</span>';
        echo '<span>von</span>';
        echo '</div>';
        echo '<div class="dPlaetze">';
        for ($ticketart = 100; $ticketart < 103; $ticketart++) {
            $sql = "SELECT `Anzahl der Plätze`
                    FROM Verfügbarkeit WHERE Eventnummer = $event_id
                    AND ArtID = $ticketart";
            $aPlaetze = $connection->query($sql);
            if ($aPlaetze->num_rows > 0) {
                $row = $aPlaetze->fetch_assoc();
                echo '<span>';
                echo $zeile['Anzahl der Plätze'];
                echo '</span>';
            }
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
        //!Bild 
        echo '<img id="infoImage" src="data:image/png;base64,' . base64_encode($row['Bild']) . '"/>';
        echo '</div>';
        echo '<div id="infoBottom">';
        echo '<img src ="resources/stadion.png" id=stadion>';
        echo '<form id="infoForm" action="buchung.php">';
        echo '<h4>Wählen Anzahl und Art der zu buchenden Plätze:</h4>';
        echo '<div id="inputs">';
        echo '<div id="vip">';
        echo '<input type="number" placeholder="0" min="0" name="vip" class="anzahlPlaetze id="vipInput">';
        echo '<label for="vip">VIP Plätze</label>';
        echo '</div>';
        echo '<div id="fos">';
        echo '<input type="number" placeholder="0" min="0" name="fos" class="anzahlPlaetze id="fosInput">';
        echo '<label for="fos">Front of Stage Plätze</label>';
        echo '</div>';
        echo '<div id="steh">';
        echo '<input type="number" placeholder="0" min="0" name="steh" class="anzahlPlaetze id="stehInput">';
        echo '<label for="steh">Stehplätze</label>';
        echo '</div>';
        echo '</div>';
        echo '<button type="submit" id="weiter">Weiter</button>';
        echo '<span class="falscheEingabe" id="einPlatz">Wählen Sie bitte mindestens einen Sitzplatz aus</span>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<span>Es ist ein Fehler beim Laden der Seite aufgetreten - versuchen sie es bitte später nocheinmal. Falls der Fehler weiterhin auftritt kontaktieren sie uns bitte</span>';
}
$connection->close();
echo '</main>';
include 'footer.php';
?>