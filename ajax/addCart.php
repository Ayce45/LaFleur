<?php
session_start();
if($_POST) {
    if(!empty($_POST['quantity']) && !empty($_POST['ref'])) {
        $_SESSION['cart'][$_POST['ref']]['quantity'] = $_SESSION['cart'][$_POST['ref']]['quantity'] + $_POST['quantity'];
        $_SESSION['cart'][$_POST['ref']]['ref'] = $_POST['ref'];
    }
} else {
    var_dump($_SESSION);
}