<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=lafleur', 'root', '');
    $bdd->query("SET NAMES 'utf8'");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>