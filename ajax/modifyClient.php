<?php

session_start();
include('../connect.php');

$code = $_REQUEST['id'];
$nom = $_REQUEST['name'];
$adresse = $_REQUEST['adresse'];
$tel = $_REQUEST['tel'];
$mail = $_REQUEST['mail'];
$sql1 = "UPDATE clientconnu SET clt_nom='$nom', clt_adresse='$adresse', clt_tel='$tel', clt_email='$mail' WHERE clt_code='$code'";
$bdd->exec($sql1);
header('Location: ../admin/view_client.php');
?>


