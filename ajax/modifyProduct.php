<?php
include("../connect.php");
$ref=$_REQUEST["ref"];
$nom=$_REQUEST["name"];
$prix=$_REQUEST["price"];
$cat=$_REQUEST["categorie"];
echo($cat);
$sql ="UPDATE produit SET pdt_designation='$nom',pdt_prix=$prix,pdt_categorie='$cat' WHERE pdt_ref='$ref'";
$bdd->exec($sql);
header("Location: ../admin/view_produit.php");
?>