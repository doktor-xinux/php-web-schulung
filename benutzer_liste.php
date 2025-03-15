<?php
include 'db.php';
session_start();

if (!isset($_SESSION["benutzername"])) {
    header("Location: login.html");
    exit;
}

$result = $conn->query("SELECT id, benutzername, rolle FROM benutzer");

if ($result->num_rows > 0) {
    echo "<form method='post' action='benutzer_loeschen.php'>";
    echo "<table border='1'><tr><th>ID</th><th>Benutzername</th><th>Rolle</th><th>Auswahl</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["benutzername"] . "</td>";
        echo "<td>" . $row["rolle"] . "</td>";
        echo "<td><input type='radio' name='id' value='" . $row["id"] . "' required></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<input type='submit' value='Benutzer löschen'>";
    echo "</form>";
} else {
    echo "Keine Benutzer gefunden.";
}

$conn->close();
?>

