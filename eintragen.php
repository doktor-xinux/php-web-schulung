<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rechnername = $_POST["rechnername"];
    $ip_adresse = $_POST["ip_adresse"];
    $betriebssystem = $_POST["betriebssystem"];
    $festplattenspeicher = $_POST["festplattenspeicher"];
    $ram = $_POST["ram"];
    $hauptdienst = $_POST["hauptdienst"];

    $sql = "INSERT INTO server (rechnername, ip_adresse, betriebssystem, festplattenspeicher, ram, hauptdienst)
            VALUES ('$rechnername', '$ip_adresse', '$betriebssystem', '$festplattenspeicher', '$ram', '$hauptdienst')";

    if ($conn->query($sql) === TRUE) {
      header("Location: liste.php");
      exit;
    } else {
        echo "Fehler: " . $conn->error;
    }
}
?>
