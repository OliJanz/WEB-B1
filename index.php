<?php
include 'header.php';

$servername = "localhost"; // Von hier Datenbank Verbindung herstellen
$user = "web_b-1";
$password = "Uo3oa7ac";
$db = "Web_b1";

$connection = new mysqli($servername, $user, $password, $db);

if ($connection->connect_error) {
    die("Es tut uns leid - Die Verbindung zum Server konnte nicht aufgebaut werden." . $connection->connect_error); // bis hier ist die Anbindung der Datenbank
}

$sql = "SELECT * FROM Event";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $counter = 1;

    while ($row = $result->fetch_assoc()) {

        if ($counter == 1) {
            echo '<section id="focus"><a href="info.php?event_id=' . $row['Eventnummer'] . '"><img src="data:image/png;base64,' . base64_encode($row['Bild']) . '"></a></section>';
            echo '<section id="cardSection">';
        } else {
            echo '<div class="card"><a href="info.php?event_id=' . $row['Eventnummer'] . '"><img src="data:image/png;base64,' . base64_encode($row['Bild']) . '"></a></div>';

        }
        $counter++;
    }
    echo '</section>';
} else {
    echo '<span>Es ist ein Fehler beim Laden der Seite aufgetreten - versuchen sie es bitte später nocheinmal. Falls der Fehler weiterhin auftritt kontaktieren sie uns bitte</span>';
}

$connection->close();
include 'footer.php';
?>