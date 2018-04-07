<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['auth'] == 'admin') {
    header('Location: admin_index.php');
    exit();
}
else {
     header('Location: ../index.php');
}
logged_only();
?>