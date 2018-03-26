<?php

session_start();
include('../connect.php');

$ref = $_POST['ref'];
$desi = $_POST['desi'];
$prix = $_POST['prix'];
$image = $_POST['image'];
$categorie = $_POST['categorie'];

$query = $bdd->prepare('INSERT INTO produit SET pdt_ref=:ref, pdt_designation=:desi, pdt_prix=:prix, pdt_image=:image, pdt_categorie=:categorie');
$query->execute(array(
    'ref' => $ref,
    'desi' => $desi,
    'prix' => $prix,
    'image' => $image,
    'categorie' => $categorie
));
header('Location: ../admin/view_produit.php');
?>








