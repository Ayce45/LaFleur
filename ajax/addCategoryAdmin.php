<?php

session_start();
include('../connect.php');

$ref = $_POST['ref'];
$desi = $_POST['desi'];


$query = $bdd->prepare('INSERT INTO categorie SET cat_code=:ref, cat_libelle=:desi');
$query->execute(array(
    'ref' => $ref,
    'desi' => $desi
));
header('Location: ../admin/view_category.php');
?>