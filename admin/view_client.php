<?php
include 'header.php';
include 'connect.php';
?>
<body>
    <div class="container">
        <div class="row">
            <div class="box ">
                <div class="info">
                    <div class="table-scrol">
                        </br>                        
                        <h1 align="center">Client</h1>
                        <button class="btn btn-sucess" data-target="#createclient" data-toggle="modal" ><i class="fa fa-plus"></i></button>	                 
                        </br>
                        </br>
                        <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->


                            <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
                                <thead>

                                    <tr>

                                        <th>Code client</th>
                                        <th>Nom</th>
                                        <th>Adresse</th>
                                        <th>Tel</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>

                                <?php
                                $reponse = $bdd->query("SELECT * FROM clientconnu");
                                while ($donnees = $reponse->fetch()) {
                                    ?>

                                    <tr>
                                        <!--here showing results in the table -->
                                        <td><?= $donnees["clt_code"] ?></td>
                                        <td><?= $donnees["clt_nom"] ?></td>
                                        <td><?= $donnees["clt_adresse"] ?></td>
                                        <td><?= $donnees["clt_tel"] ?></td>
                                        <td><?= $donnees["clt_email"] ?></td>                                        
                                    </tr>

                                <?php } ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </div>

    <div class="modal fade in" tabindex="1" role="dialog" id="createclient">        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="../ajax/addAccountAdmin.php">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">⚠ CREATION CLIENT ⚠</h5>
                    </div>
                    <div class="modal-body">
                        <div>
                            <span>Nom*         <label></label></span>
                            <input name="nom" type="text"> 
                        </div>
                        <div>
                            <span>Mot de passe*<label></label></span>
                            <input name="pass" type="password"> 
                        </div>
                        <div>
                            <span>Confirmation*<label></label></span>
                            <input name="confirm" type="password"> 
                        </div>
                        <div>
                            <span>Adresse*     <label></label></span>
                            <input name="adresse" type="text"> 
                        </div>
                        <div>
                            <span>Tel*         <label></label></span>
                            <input name="tel" type="text"> 
                        </div>
                        <div>
                            <span>Email*       <label></label></span>
                            <input name="email" type="text"> 
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Oui</button>                    
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Non</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>
