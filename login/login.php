<?php
function logged_only() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['auth'])) {
        header('Location: admin_index.php');
        exit();
    }
}

logged_only();

include("../connect.php");
session_start();

$user_id = $_REQUEST['username'];
$user_pass = md5($_REQUEST['password']);

$run = "SELECT * FROM admin WHERE username='$user_id' AND password='$user_pass'";
$table = $bdd->query($run);
$ligne = $table->fetch();
if (!$ligne['username'] == null) {
    $_SESSION['auth'] = $user_id;
    header('Location: admin_index.php');
} else {
    header('Location: admin_index.php');
    ?>
    <script> alert("Nom d'utilisateur inccorect ou Mot de passe incorrect")</script>   
    <?php

}
?>
    