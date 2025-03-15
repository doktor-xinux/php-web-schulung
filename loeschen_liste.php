<?php
include 'db.php';
session_start();

// Prüfen, ob der Benutzer eingeloggt ist
if (!isset($_SESSION["benutzername"])) {
    header("Location: login.html");
    exit;
}

// Serverliste abrufen
$result = $conn->query("SELECT * FROM server");

if ($result->num_rows > 0) {
    echo "<h2>Server löschen</h2>";
    echo "<form method='post' action='loeschen.php'>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Rechnername</th><th>IP-Adresse</th><th>Betriebssystem</th><th>Festplatte (GB)</th><th>RAM (GB)</th><th>Hauptdienst</th><th>Auswahl</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["rechnername"] . "</td>";
        echo "<td>" . $row["ip_adresse"] . "</td>";
        echo "<td>" . $row["betriebssystem"] . "</td>";
        echo "<td>" . $row["festplattenspeicher"] . "</td>";
        echo "<td>" . $row["ram"] . "</td>";
        echo "<td>" . $row["hauptdienst"] . "</td>";
        echo "<td><input type='radio' name='id' value='" . $row["id"] . "' required></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<input type='submit' value='Ausgewählten Server löschen'>";
    echo "</form>";
    echo "<br><form action='eintragen.html' method='get'>";
    echo "<input type='submit' value='Neuen Server eintragen'>";
    echo "</form>";


} else {
    echo "Keine Server gefunden.";
}

$conn->close();
?>

