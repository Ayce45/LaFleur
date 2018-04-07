<?php
session_start();
include("../connect.php");
if (!isset($_SESSION['auth'])) {
    header('Location: ../connexion.php');
}
else{

$user_id = $_REQUEST['utilisateur'];

$temps = time();
$tpslocal = date('Y-m-d') . "\n";
    $stmt = $bdd->prepare('INSERT INTO commande VALUES (:temps, :code, :tpslocal)');       
    $stmt->execute(array(
        ':temps' => $temps,
        ':code' => $user_id,
        ':tpslocal' => $tpslocal)
    );
   $stmt1 = $bdd->prepare('INSERT INTO contenir VALUES(:temps, :code, :produit, :quantite');
   foreach ($_SESSION['cart'] as $product) {
        $ref = $product['ref'];
        $quantite = $product['quantity'];        
        $sql = "INSERT INTO contenir VALUES('".$temps."','".$user_id."','".$ref."',".$quantite.")";
        $bdd->exec($sql);          
    };
    header('Location: ../sucess.php');
}
?>
    