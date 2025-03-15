<?php
session_start();
if (!isset($_SESSION["benutzername"])) {
    echo "Session existiert nicht! <a href='login.html'>Neu anmelden</a>";
    exit;
}
echo "Session gefunden: " . $_SESSION["benutzername"];
?>
