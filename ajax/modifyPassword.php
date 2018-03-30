<?php

session_start();
include('../connect.php');
$code = $_REQUEST['id'];
echo $code;
$PW = md5($_REQUEST['password']);
echo $PW;
$CPW = md5($_REQUEST['ConfirmPW']);
echo $CPW;
echo ("UPDATE clientconnu SET clt_motPasse = '$PW' WHERE clt_code='$code'");
$sql = "UPDATE clientconnu SET clt_motPasse ='$PW' WHERE clt_code='$code'";
If ($PW == $CPW || empty($CPW) || empty($PW)) {
    $bdd->exec($sql);
    
    header('Location: ../admin/view_client.php');
}
?>


