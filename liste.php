<?php
include 'db.php';

$result = $conn->query("SELECT * FROM server");

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr><th>ID</th><th>Rechnername</th><th>IP-Adresse</th><th>Betriebssystem</th><th>Festplatte (GB)</th><th>RAM (GB)</th><th>Hauptdienst</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["rechnername"] . "</td><td>" . $row["ip_adresse"] . "</td><td>" . $row["betriebssystem"] . "</td><td>" . $row["festplattenspeicher"] . "</td><td>" . $row["ram"] . "</td><td>" . $row["hauptdienst"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Keine Server gefunden.";
}
?>
