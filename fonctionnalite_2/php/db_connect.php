<?php
// Fichier : php/db_connect.php
$host = 'localhost';
$dbname = 'tv_fowet'; // Ton nom de base de données vu sur ta capture phpMyAdmin
$username = 'tv_fowet'; 
$password = '7AiiY5DG29yMMj1x'; 
try {
    // Création de la connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    // En cas d'erreur, on renvoie une erreur JSON pour que map.js comprenne le problème
    die(json_encode(['error' => "Erreur de connexion BDD : " . $e->getMessage()]));
}
?>