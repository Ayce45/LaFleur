<?php
session_start();
session_destroy();
include 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="box ">
            <div class="info">
                <div class="card">
                    <div class="card-header bg-dark text-light">
                        <div class="clearfix"></div>
                    </div>
                    <div class="grid_1">
                        <br>
                        <h1>Commande Effectuée</h1>
                        <div class="grid_2 text-center">
                            <ul class="iphone">
                                <li class="phone_desc">La commande a été éfféctuée avec succès, elle arrivera d'ici peu!!! </li>
                            </ul>

                        </div>
                    </div>
                    <div class="register-but">                                                          
                        <button class="btn btn-primary" OnClick="window.location.href = './'">Retour à l'accueil</button>
                        <div class="clearfix"> </div>

                    </div>
                </div>
            </div>     
        </div>
    </div>
</div>
</body>
<div class="copy">
    <p> &copy; 2018 LAFLEUR. All Rights Reserved | Design by NEJE</p>
</div>    
</html>		
