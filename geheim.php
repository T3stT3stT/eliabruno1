<?php
session_start();
if(!isset($_SESSION['usernameid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
 
//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['usernameid'];
 
echo "Hallo User: ".$usernameid;
?>