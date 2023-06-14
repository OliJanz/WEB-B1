<?php
include "header.php";
$servername = "localhost";
$username = "web_b-1";
$password = "Uo3oa7ac";
$dbname = "Web_b1";

$conn = new MySQLi($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = trim($_POST['lastname']);
$vorname = trim($_POST['firstname']);
$email = $_POST['email'];
$ptsm = $conn->prepare("INSERT INTO Kunde (Nachname, Vorname, Email) VALUES (?, ?, ?)");

if (checkVorname($vorname) && checkNachname($name)) {
    //checkNachname($name)
    // && checkNachname($name)
    $ptsm->bind_param("sss", $name, $vorname, $email);
    $ptsm->execute();
    $ptsm->close();
    echo '<main class="image-center">';
    echo '<h1 id="textBuchung">Buchung erfolgreich!</h1>
    <img  src="resources/check.png"
    alt="Grüner Haken"
    class="image-center"
    id="check"
    />
    <br />
    </main>';
} else {
    echo '<main class="image-center">';
    echo '<h1 id="textBuchung">Buchung fehlgeschlagen!</h1>
    <img
    src="resources/fehler.png"
    alt="Roter Haken"
    class="image-center"
    id="check"
    />
    <br />
    </main>';


}

// $eventnummer = $_GET['event_id'];
$eventnummer = $_POST['event_ID'];
$vip = $_POST['vip'];
$fos = $_POST['fos'];
$steh = $_POST['steh'];



// Abfrage und Aktualisierung für ArtID = 101
$sql = "SELECT `Verfügbare Plätze` FROM Verfügbarkeit WHERE ArtID = 101 AND Eventnummer = ?";
$ptsm = $conn->prepare($sql);
$ptsm->bind_param("i", $eventnummer);
$ptsm->execute();
$result = $ptsm->get_result();
$row = $result->fetch_assoc();
$pVer = $row['Verfügbare Plätze'];
$ptsm->close();

$pErg = $pVer - $vip;

$sql = "UPDATE Verfügbarkeit SET `Verfügbare Plätze` = ? WHERE ArtID = 101 AND Eventnummer = ?";
$ptsm = $conn->prepare($sql);
$ptsm->bind_param("ii", $pErg, $eventnummer);
$ptsm->execute();
$ptsm->close();

// Abfrage und Aktualisierung für ArtID = 102
$sql = "SELECT `Verfügbare Plätze` FROM Verfügbarkeit WHERE ArtID = 102 AND Eventnummer = ?";
$ptsm = $conn->prepare($sql);
$ptsm->bind_param("i", $eventnummer);
$ptsm->execute();
$result = $ptsm->get_result();
$row = $result->fetch_assoc();
$pVer = $row['Verfügbare Plätze'];
$ptsm->close();

$pErg = $pVer - $fos;

$sql = "UPDATE Verfügbarkeit SET `Verfügbare Plätze` = ? WHERE ArtID = 102 AND Eventnummer = ?";
$ptsm = $conn->prepare($sql);
$ptsm->bind_param("ii", $pErg, $eventnummer);
$ptsm->execute();
$ptsm->close();

// Abfrage und Aktualisierung für ArtID = 100
$sql = "SELECT `Verfügbare Plätze` FROM Verfügbarkeit WHERE ArtID = 100 AND Eventnummer = ?";
$ptsm = $conn->prepare($sql);
$ptsm->bind_param("i", $eventnummer);
$ptsm->execute();
$result = $ptsm->get_result();
$row = $result->fetch_assoc();
$pVer = $row['Verfügbare Plätze'];
$ptsm->close();

$pErg = $pVer - $steh;

$sql = "UPDATE Verfügbarkeit SET `Verfügbare Plätze` = ? WHERE ArtID = 100 AND Eventnummer = ?";
$ptsm = $conn->prepare($sql);
$ptsm->bind_param("ii", $pErg, $eventnummer);
$ptsm->execute();
$ptsm->close();

$conn->close();





function checkVorname($vorname)
{


    if (strlen($vorname) <= 1) {
        return false;
    }

    if (!startsWithUpperCase($vorname)) {
        return false;
    }

    if (!hasNoRepeatingCharacters($vorname)) {
        return false;
    }

    return true;
}

function checkNachname($name)
{
    if (!startsWithUpperCase($name) && !preg_match('/^van [A-Z]/', $name)) {
        return false;
    }


    if (!hasNoRepeatingCharacters($name)) {
        return false;
    }

    return true;
}


function startsWithUpperCase($name)
{
    $firstChar = $name[0];
    $firstCharLowerCast = strtolower($firstChar);
    if ($firstChar === $firstCharLowerCast) {
        return false;
    } else {
        return true;
    }
}

function hasNoRepeatingCharacters($name)
{
    $nameToLowerCase = strtolower($name);
    for ($i = 0; $i < strlen($nameToLowerCase) - 2; $i++) {
        if ($nameToLowerCase[$i] === $nameToLowerCase[$i + 1] && $nameToLowerCase[$i] === $nameToLowerCase[$i + 2]) {
            return false;
        }
    }
    return true;
}

include "footer.php";
?>