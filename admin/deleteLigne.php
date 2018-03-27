<?php

include("../connect.php");
$delete_id=$_REQUEST['id'];
$sql="DELETE From produit WHERE pdt_ref='$delete_id'";//delete query
$req = $bdd-> exec($sql);
/*if($run)
{
//javascript function to open in the same window
    echo "<script>window.open('view_users.php?deleted=user has been deleted','_self')</script>";
}
*/
echo "<script>window.location.replace('view_produit.php')</script>";
?>