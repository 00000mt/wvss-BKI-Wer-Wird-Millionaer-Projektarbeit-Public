<?php
session_start();
if(isset($_SESSION['spielgeld'])){
    $geld = $_SESSION['spielgeld'];
}
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];


    // Hier musst du die Verbindung zur Datenbank herstellen (vermutlich bereits in deinem Code vorhanden)
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Überprüfe die Verbindung
    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    // Füge 1000 Spielgeld zum Benutzer hinzu
    $sql = "UPDATE accounts SET spielgeld = spielgeld + 1000 WHERE USERNAME = '$username'";
    if ($conn->query($sql) === TRUE) {
        echo "Spielgeld erfolgreich aktualisiert!";
        echo "Spielgeld: $geld";
    } else {
        echo "Fehler beim Aktualisieren des Spielgeldes: " . $conn->error;
    }

    // Schließe die Datenbankverbindung
    $conn->close();
} else {
    echo "Benutzer nicht angemeldet!";
}
?>
