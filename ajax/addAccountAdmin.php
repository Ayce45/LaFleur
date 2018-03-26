<?php
session_start();
include('../connect.php');

$i = 0;
$nom = $_POST['nom'];
$pass = md5($_POST['pass']);
$confirm = md5($_POST['confirm']);
$adresse = $_POST['adresse'];
$tel = $_POST['tel'];
$email = $_POST['email'];

$a = $bdd->query('SELECT COUNT(*) AS nbr FROM clientconnu');
$a = $a->fetchAll();
$a = $a[0]['nbr'] + 1;

$str = "" . $a;
while (strlen($str) < 4) {
    $str = "0" . $str;
}
$a = 'c' . $str;


//Vérification du mdp
if ($pass != $confirm || empty($confirm) || empty($pass)) {
    $mdp_erreur = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";
    $i++;
}

if ($i == 0) {
    $query = $bdd->prepare('INSERT INTO clientconnu SET clt_code=:code, clt_nom=:nom, clt_adresse=:adresse, clt_tel=:tel, clt_email=:email,clt_motPasse=:pass');
    $query->execute(array(
    'code' => $a,
    'nom' => $nom,
    'adresse' => $adresse,
    'tel' => $tel,
    'email' => $email,
    'pass' => $pass
    ));
    header('Location: ../admin/view_client.php');
} 

?>








