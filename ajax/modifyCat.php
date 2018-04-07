<?php
include ("../connect.php");


$test=$_REQUEST["code"];
$ref=$_REQUEST["code2"];
$test2=$_REQUEST["name"];
$nom=$_REQUEST["name2"];
$sql="UPDATE categorie SET cat_libelle='$nom' WHERE cat_libelle='$test2'";
$sql2="UPDATE categorie SET cat_code='$ref' WHERE cat_code='$test'";
$sql3="UPDATE produit SET pdt_categorie='$ref' WHERE pdt_categorie='$test'";
    $bdd->exec($sql);
    $bdd->exec($sql2);
    $bdd->exec($sql3);
header("Location: ../admin/view_category.php");
?>


