<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // eingabe_pruefung.js Validierungs Resultat hiergezogen nach dem "Submit" button angeklickt wurde
    $validationResult = $_POST["validationResult"];

    if ($validationResult === "true") {
        // Form Daten gezogen
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];

        // Serverseitige Validierung kommt hier, optionen müssen noch nachgedacht werden:
        if (empty($firstname) || empty($lastname) || empty($email)) {
 
            echo "Bitte fühlen sie alle Felder nach! ";
        } else {
            // Insert database
            $servername = "localhost";
            $username = "web_b-1";
            $password = "Uo3oa7ac";
            $dbname = "Web_b1";

            // DB SQL Connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection fehlgeschlagen: " . $conn->connect_error);
            }

            // SQL statement
            $sql = "INSERT INTO KUNDE (firstname, lastname, email) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);

            // Alle bekomene Parameter anbinden
            $stmt->bind_param("sss", $firstname, $lastname, $email);

            if ($stmt->execute()) {
                echo "Data erfolgreich hochgeladen!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Connection und Staement abschließen
            $stmt->close();
            $conn->close();
        }

        
    } else {
        echo "Validierung fehlgeschlagen! Bitte form data überprüfen!";
    }
}
?>