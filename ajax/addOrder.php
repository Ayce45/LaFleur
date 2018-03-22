<?php
include("../connect.php");


$user_id = $_REQUEST['utilisateur'];
$user_pass = md5($_REQUEST['mdp']);


$run = "SELECT * FROM clientconnu WHERE clt_code='$user_id' AND clt_motPasse='$user_pass'";
$table = $bdd->query($run);
$ligne = $table->fetch();
if (!$ligne['clt_code'] == null) {
    $stmt = $bdd->prepare('INSERT INTO commande VALUES (:temps, :code, :tpslocal)');
    $temps = time();
    $tpslocal = date('Y-m-d') . "\n";
    $stmt->execute(array(
        ':temps' => $temps,
        ':code' => $user_id ,
        ':tpslocal' => $tpslocal)
    );
    header('Location: sucess.php');
    } else {
    echo "<script>alert('Code et/ou mot de passe incorrect !')</script>";
    echo "<script>window.location.replace('../checkout.php')</script>";
}
?>
    