<?php
session_start(); // Muss ganz oben stehen!
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $benutzername = $_POST["benutzername"];
    $passwort = $_POST["passwort"];

    $sql = "SELECT * FROM benutzer WHERE benutzername='$benutzername' AND passwort=password('$passwort')";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION["benutzername"] = $benutzername;
        header("Location: auswahl.html");
    } else {
        echo "Falsche Anmeldedaten.";
    }
}
?>
