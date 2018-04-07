<?php

include("../connect.php");
$delete_id=$_REQUEST['id'];
$sql="DELETE From clientconnu WHERE clt_code='$delete_id'";
$req = $bdd-> exec($sql);
$sql="DELETE From commande WHERE cde_client='$delete_id'";
$req = $bdd-> exec($sql);
$sql="DELETE From contenir WHERE cde_client='$delete_id' ";
$req = $bdd-> exec($sql);
echo "<script>window.location.replace('../view_client.php')</script>";
?>