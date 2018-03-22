<?php

session_start();
include('../connect.php');
$price = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        $productReq = $bdd->query("SELECT pdt_prix FROM produit WHERE pdt_ref ='" . $product['ref'] . "'");
        $productPrice = $productReq->fetch();
        $price = $price + $productPrice['pdt_prix'] * $product['quantity'];
    }
}
echo $price;
