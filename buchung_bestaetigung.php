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

$name = $_POST['lastname'];
$vorname = $_POST['firstname']; 
$email = $_POST['email']; 
$ptsm = $conn->prepare("INSERT INTO Kunde (Nachname, Vorname, Email) VALUES (?, ?, ?)");

$ptsm->bind_param("sss", $name, $vorname, $email);
$ptsm->execute();

$ptsm->close();
$conn->close();

echo '<main class="image-center">';
echo '<h1 id="textBuchung">Buchung erfolgreich!</h1>
<img
    src="resources/check.png"
    alt="Grüner Haken"
    class="image-center"
    id="check"
/>

<br />
</main>';

include "footer.php";
?>