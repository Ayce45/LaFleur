<?php

function logged_only() {
    if (isset($_SESSION['auth'])) {
        if ($_SESSION['auth'] == 'admin') {
            header('Location: admin/admin_index.php');
            exit();
        }
    }
}

logged_only();
if (isset($_REQUEST['id'])) {

    $id = $_REQUEST['id'];

    include 'header.php';
}
?>
<html>
    <body>
        <div class="container">
            <div class="row" style="margin-right: 150px; margin-left: 150px;">
                <div class="box">
                    <div class="info">
                        <div class="card">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-5">
                                        <div class="login-panel">
                                            <h1 align="center">Connexion LAFLEUR</h1>
                                            <?php
                                            if (isset($_REQUEST['id'])) {
                                                ?>
                                                <div class="panel-body col-md-11">
                                                    <form role="form" method="POST" action="login.php">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <input class="form-control" placeholder="Nom d'utilisateur" name="username" autofocus="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input class="form-control" placeholder="Mot de passe" name="password" type="password" value="">
                                                            </div>                            
                                                            <input class="btn btn-lg btn-success btn-block" type="submit">
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            <?php } else {
                                                ?>
                                                <div class="panel-body col-md-11">
                                                    <form role="form" method="POST" action="login2.php">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <input class="form-control" placeholder="Nom d'utilisateur" name="username" autofocus="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input class="form-control" placeholder="Mot de passe" name="password" type="password" value="">
                                                            </div>                            
                                                            <input class="btn btn-lg btn-success btn-block" type="submit">
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>