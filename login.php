<?php

include("connect.php");
session_start();

$user_id = $_REQUEST['username'];
$user_pass = md5($_REQUEST['password']);
echo("SELECT * FROM clientconnu WHERE clt_code='$user_id' AND clt_motPasse='$user_pass'");

$run = "SELECT * FROM clientconnu WHERE clt_code='$user_id' AND clt_motPasse='$user_pass'";
$table = $bdd->query($run);
$ligne = $table->fetch();
if (!$ligne['clt_code'] == null) {
    $_SESSION['auth'] = $user_id;
    if ($ligne['clt_code'] == 'admin') {
        header('Location: admin/admin_index.php');
    } else {
        header('Location: index.php');        
    }
} else {
    header('Location: connexion.php');
    ?>
    <script> alert("Nom d'utilisateur inccorect ou Mot de passe incorrect")</script>   
    <?php

}
?>
    