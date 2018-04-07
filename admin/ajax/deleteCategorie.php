<?php

include("../connect.php");
$delete_id=$_REQUEST['id'];



$sql="Select * FROM produit WHERE pdt_categorie='$delete_id'";
$table = $bdd ->query($sql);
while($ligne = $table->fetch()) { 
   $test=$ligne['pdt_ref']; 
   $run="DELETE From contenir WHERE  produit='$test'";
   $req= $bdd-> exec($run);
}    
$sql="DELETE From produit WHERE pdt_categorie='$delete_id'";
$req= $bdd-> exec($sql);
$sql="DELETE From categorie WHERE cat_code='$delete_id'";
$req= $bdd-> exec($sql);

echo "<script>window.location.replace('../view_category.php')</script>";
?>