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
                                        <th style="width:13%"></th>
                                    </tr>
                                </thead>

                                <?php
                                $reponse = $bdd->query("SELECT * FROM clientconnu ORDER BY 1");
                                while ($donnees = $reponse->fetch()) {
                                    ?>

                                    <tr>
                                        <!--here showing results in the table -->
                                        <td><?= $donnees["clt_code"] ?></td>
                                        <td><?= $donnees["clt_nom"] ?></td>
                                        <td><?= $donnees["clt_adresse"] ?></td>
                                        <td><?= $donnees["clt_tel"] ?></td>
                                        <td><?= $donnees["clt_email"] ?></td>
                                        <td> <button class="btn btn-danger btn-sm"  onclick="window.location.href = 'deleteClient.php?id=<?= $donnees["clt_code"] ?>'" data-toggle="modal"><i class="fa fa-trash-o"></i></button>	                                    
                                            <button class="btn btn-sucess" data-target="#modifyClient<?= $donnees["clt_code"] ?>" data-toggle="modal" ><i class="fa fa-key"></i></button>
                                        <button class="btn btn-info btn-sm"  onclick="window.location.href = '?id=<?= $donnees["clt_code"] ?>'" data-toggle="modal"><i class="fa fa-edit"></i></button> </td>                               
                                    </tr>

                                    <div class="modal fade in" tabindex="1" role="dialog" id="modifyClient<?= $donnees["clt_code"] ?>">        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="GET" action="../ajax/modifyPassword.php">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-center">⚠ Modification mot de passe ⚠</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div>
                                                            <span>Mot de passe*     <label></label></span>
                                                            <input name="password" type="password"> 
                                                        </div>
                                                        <div>
                                                            <span>Confirmation*      <label></label></span>
                                                            <input name="ConfirmPW" type="password"> 
                                                            <input name="id" type="hidden" value="<?= $donnees["clt_code"] ?>" >
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" onclick="window.location.href = '../ajax/modifyPW.php?id=<?= $donnees["clt_code"] ?>'" class="btn btn-primary">Oui</button>                    
                                                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Non</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

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
                <form method="POST" action="../ajax/addAccountAdmin.php" data-toggle="validator">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">⚠ CREATION CLIENT ⚠</h5>
                    </div>
                    <div class="modal-body">
                        <div>
                            <span>Nom*              <label></label></span>
                            <input name="nom" type="text" required> 
                        </div>
                        <div>
                            <span>Mot de passe*<label></label></span>
                            <input name="pass" type="password" required> 
                        </div>
                        <div>
                            <span>Confirmation*<label></label></span>
                            <input name="confirm" type="password" required> 
                        </div>
                        <div>
                            <span>Adresse*        <label></label></span>
                            <input name="adresse" type="text" required> 
                        </div>
                        <div>
                            <span>Tel*                <label></label></span>
                            <input name="tel" type="text" required> 
                        </div>
                        <div>
                            <span>Email*           <label></label></span>
                            <input name="email" type="text" required> 
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
