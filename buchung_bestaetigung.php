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
include "header.php";
if (checkVorname($vorname) && checkNachname($name)) {
    //checkNachname($name)
    // && checkNachname($name)
    $ptsm->bind_param("sss", $name, $vorname, $email);
    $ptsm->execute();
    $ptsm->close();
    $conn->close();
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
$eventnummer = 1000;

$vip = $_GET['vip'];
$fos = $_GET['fos'];
$steh = $_GET['steh'];

echo '$eventnummer';

$sql = "SELECT * FROM Verfügbarkeit WHERE ArtID = 101 AND Eventnummer = 'event_id';";
$pVer = $connection->query($sql);
$ptsm = $conn->prepare("UPDATE Verfügbarkeit SET Verfügbare Plätze = '?' WHERE ArtID = 101 AND Eventnummer = '?';");
$pErg = $pVer - $vip;
$ptsm->bind_param("ii", $pErg, $eventnummer);

echo 'geht2';

$sql = "SELECT * FROM Verfügbarkeit WHERE ArtID = 102 AND Eventnummer = 'event_id';";
$pVer = $connection->query($sql);
$ptsm = $conn->prepare("UPDATE Verfügbarkeit SET Verfügbare Plätze = '?' WHERE ArtID = 102 AND Eventnummer = '?';");
$pErg = $pVer - $fos;
$ptsm->bind_param("ii", $pErg, $eventnummer);

echo 'geht3';

$sql = "SELECT * FROM Verfügbarkeit WHERE ArtID = 100 AND Eventnummer = 'event_id';";
$pVer = $connection->query($sql);
$ptsm = $conn->prepare("UPDATE Verfügbarkeit SET Verfügbare Plätze = '?' WHERE ArtID = 100 AND Eventnummer = '?';");
$pErg = $pVer - $steh;
$ptsm->bind_param("ii", $pErg, $eventnummer);

echo 'geht4';

$ptsm->execute();

echo 'geht5';


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