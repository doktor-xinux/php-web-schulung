<?php
include 'db.php';
session_start();

if (!isset($_SESSION["benutzername"])) {
    header("Location: login.html");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = intval($_POST["id"]);
    
    // Der Admin darf sich nicht selbst löschen
    $stmt_check = $conn->prepare("SELECT benutzername FROM benutzer WHERE id = ?");
    $stmt_check->bind_param("i", $id);
    $stmt_check->execute();
    $stmt_check->bind_result($benutzername);
    $stmt_check->fetch();
    $stmt_check->close();

    if ($benutzername == $_SESSION["benutzername"]) {
        echo "Du kannst dich nicht selbst löschen.";
        exit;
    }

    // Benutzer löschen
    $stmt = $conn->prepare("DELETE FROM benutzer WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Benutzer erfolgreich gelöscht.";
    } else {
        echo "Fehler beim Löschen: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

