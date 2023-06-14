<?php
include 'header.php';

$servername ="localhost";	// Von hier Datenbank Verbindung herstellen
		$user = "web_b-1";			
		$password = "Uo3oa7ac";
		$db = "Web_b1";

		$connection = new mysqli($servername, $user, $password, $db);

		if($connection->connect_error){
			die("Fehler bei der Connection.".$connection->connect_error); // bis hier ist die Anbindung der Datenbank
		}

        $event_id = $_GET['event_id'];

        $sql = "SELECT * FROM Event WHERE Eventnummer = '$event_id'";
        $result = $connection->query($sql);
        echo '<main>';
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo '<div id="info">';
                echo '<div id="infoTop">';
                echo '<div id="eventInfo">';
                echo '<span> Ort: '.$row['Ort']. '</span>';
                echo '<span> Datum: '.$row['Datum']. '</span>';
                echo '<span id="verfuegbarePlaetze"> Verfügbare Plätze:</span>';
                echo '<div id="plaetze">';
                echo '<div class="dPlaetze">';
                echo '<span> VIP Plätze: </span>';
                echo '<span> FOS Plätze: </span>';
                echo '<span> Stehplätze: </span>';
                echo '</div>';
                echo '<div class="dPlaetze">';
                $ticketart ="101";
                $Verfuegbarkeit= "SELECT Verfügbarkeit.`Verfügbare Plätze` 
                FROM Verfügbarkeit WHERE Verfügbarkeit.Eventnummer = $event_id
                AND Verfügbarkeit.ArtID = $ticketart";
                $ergebnis=$connection->query($Verfuegbarkeit);
                if($ergebnis->num_rows>0){
                    echo '<span>';
                    $zeile = $ergebnis->fetch_assoc();
                echo $zeile['Verfügbare Plätze'];
                echo '</span>';
                }
                $ticketart ="100";
                $Verfuegbarkeit= "SELECT Verfügbarkeit.`Verfügbare Plätze` 
                FROM Verfügbarkeit WHERE Verfügbarkeit.Eventnummer = $event_id
                AND Verfügbarkeit.ArtID = $ticketart";
                $ergebnis=$connection->query($Verfuegbarkeit);
                if($ergebnis->num_rows>0){
                    echo '<span>';
                    $zeile = $ergebnis->fetch_assoc();
                echo $zeile['Verfügbare Plätze'];
                echo '</span>';
                }
                $ticketart ="102";
                $Verfuegbarkeit= "SELECT Verfügbarkeit.`Verfügbare Plätze` 
                FROM Verfügbarkeit WHERE Verfügbarkeit.Eventnummer = $event_id
                AND Verfügbarkeit.ArtID = $ticketart";
                $ergebnis=$connection->query($Verfuegbarkeit);
                if($ergebnis->num_rows>0){
                    echo '<span>';
                    $zeile = $ergebnis->fetch_assoc();
                echo $zeile['Verfügbare Plätze'];
                echo '</span>';
                }
                echo '</div>';
                echo '<div class="dPlaetze"';
                echo '<span>von</span>';
                echo '<span>von</span>';
                echo '<span>von</span>';
                echo '</div>';
                echo '<div class="dPlaetze">';
                $ticketart ="101";
                $gesamteVerfuegbarkeit= "SELECT Verfügbarkeit.`Anzahl der Plätze` 
                FROM Verfügbarkeit WHERE Verfügbarkeit.Eventnummer = $event_id
                AND Verfügbarkeit.ArtID = $ticketart";
                $ergebnis=$connection->query($gesamteVerfuegbarkeit);
                if($ergebnis->num_rows>0){
                    echo '<span>';
                    $zeile = $ergebnis->fetch_assoc();
                echo $zeile['Anzahl der Plätze'];
                echo '</span>';}
                $ticketart ="100";
                $gesamteVerfuegbarkeit= "SELECT Verfügbarkeit.`Anzahl der Plätze` 
                FROM Verfügbarkeit WHERE Verfügbarkeit.Eventnummer = $event_id
                AND Verfügbarkeit.ArtID = $ticketart";
                $ergebnis=$connection->query($gesamteVerfuegbarkeit);
                if($ergebnis->num_rows>0){
                    echo '<span>';
                    $zeile = $ergebnis->fetch_assoc();
                echo $zeile['Anzahl der Plätze'];
                echo '</span>';}
                $ticketart ="102";
                $gesamteVerfuegbarkeit= "SELECT Verfügbarkeit.`Anzahl der Plätze` 
                FROM Verfügbarkeit WHERE Verfügbarkeit.Eventnummer = $event_id
                AND Verfügbarkeit.ArtID = $ticketart";
                $ergebnis=$connection->query($gesamteVerfuegbarkeit);
                if($ergebnis->num_rows>0){
                    echo '<span>';
                    $zeile = $ergebnis->fetch_assoc();
                echo $zeile['Anzahl der Plätze'];
                echo '</span>';}
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<img id="infoImage" src="data:image/png;base64,'.base64_encode($row['Bild']).'"/>';
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
                echo '<span class="falscheEingabe" id="einPlatzAuswahl">Bitte wählen Sie eine Art von Ticket</span>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        $connection->close();
        echo '</main>';
include 'footer.php';
?>