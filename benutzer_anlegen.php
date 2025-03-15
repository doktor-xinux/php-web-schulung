<?php
include 'db.php';
session_start();

if (!isset($_SESSION["benutzername"])) {
    header("Location: login.html");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $benutzername = $_POST["benutzername"];
    $passwort = password_hash($_POST["passwort"], PASSWORD_BCRYPT);
    $rolle = $_POST["rolle"];

    $stmt = $conn->prepare("INSERT INTO benutzer (benutzername, passwort, rolle) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $benutzername, $passwort, $rolle);

    if ($stmt->execute()) {
        echo "Benutzer erfolgreich angelegt.";
    } else {
        echo "Fehler beim Anlegen: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

