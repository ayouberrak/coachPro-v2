<?php
session_start();
$_SESSION = [];
session_destroy();
header("Location: login.controleur.php");
exit;
?>