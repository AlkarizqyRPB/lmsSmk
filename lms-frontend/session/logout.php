<?php
// Mulai session
session_start();

// Hapus semua session
$_SESSION = array();

// Hancurkan session
session_destroy();

// Redirect ke halaman login
header("location: login.php");
exit;
?>
