<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=users', 'root', '');
    $bdd->query("SET NAMES 'utf8'");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>