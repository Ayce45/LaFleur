<?php
session_start();
include('../connect.php');
echo count($_SESSION['cart']);
?>
