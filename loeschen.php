<?php
include 'db.php';
session_start();

if (!isset($_SESSION["benutzername"])) {
    header("Location: login.html");
    exit;
}

// Prüfen, ob eine ID übergeben wurde
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = intval($_POST["id"]); // Sicherheit: ID in eine Zahl umwandeln

    // Sichere SQL-Abfrage mit Prepared Statements
    $stmt = $conn->prepare("DELETE FROM server WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "<p>Server erfolgreich gelöscht.</p>";
    } else {
        echo "<p>Fehler beim Löschen: " . $stmt->error . "</p>";
    }
} else {
    echo "<p>Kein Server ausgewählt.</p>";
}

// Zurück zur Admin-Liste
echo "<p><a href='loeschen_liste.php'>Zurück zur Serverliste</a></p>";

$conn->close();
?>

