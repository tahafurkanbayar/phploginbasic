<?php
session_start();
$host = 'localhost';
$dbname = 'loginsystem';
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}
?>
