<?php
session_start();
if($_POST) {
    if(!empty($_POST['ref'])) {
        unset($_SESSION['cart'][$_POST['ref']]);
    }
} else {
    var_dump($_SESSION);
}