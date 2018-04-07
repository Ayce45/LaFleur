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
                        <h1 align="center">Commandes de <?= $_SESSION['auth'] ?></h1>
                        </br>

                        <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->


                            <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
                                <thead>
                                    <tr>
                                        <th>Numéro de la commande</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <?php
                                $user_id = $_SESSION['auth'];
                                $reponse = $bdd->query("SELECT * FROM commande WHERE cde_client='$user_id'");
                                while ($donnees = $reponse->fetch()) {
                                    //var_dump($donnees);
                                    ?>                               
                                    <tr>
                                        <td><button class="btn btn-sucess" data-target="#viewcontenir-<?= $donnees["cde_moment"] ?>" data-toggle="modal" ><?= $donnees["cde_moment"] ?></button></td>
                                        <td><?= $donnees["cde_date"] ?></td>

                                    <div class="modal fade in" tabindex="1" role="dialog" id="viewcontenir-<?= $donnees["cde_moment"] ?>">        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-center">⚠ CONTENU DE LA COMMANDE ⚠</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <?php
                                                        $reponseC = $bdd->query("SELECT * FROM contenir WHERE cde_moment='" . $donnees["cde_moment"] . "'");
                                                        $donneesCn = $reponseC->fetchAll();
                                                        foreach ($donneesCn as $donneesC) {
                                                            //var_dump($donneesC);
                                                            $reponseC = $bdd->query("SELECT * FROM produit WHERE pdt_ref ='" . $donneesC['produit'] . "'");
                                                            $ligne = $reponseC->fetch();
                                                            ?>



                                                            <div class="row">
                                                                <div class="col-xs-2 col-md-2" style="margin-left: 20px">
                                                                    <img class="img-responsive" src="../images/<?= $ligne["pdt_image"] ?>" alt="prewiew">
                                                                </div>
                                                                <div class="col-xs-4 col-md-6">
                                                                    <h4 class="product-name"><strong><?= $ligne["pdt_designation"] ?></strong></h4><h4><small>Référence : <?= $ligne["pdt_ref"] ?></small></h4>
                                                                </div>
                                                                <div class="col-xs-6 col-md-4 row">
                                                                    <div class="col-xs-6 col-md-7 text-right" style="padding-top: 5px">
                                                                        <h6><strong style="font-size: 20px"><span id="price"><?= $ligne["pdt_prix"] ?></span><span class="text-muted"> x</span></strong></h6>
                                                                    </div>
                                                                    <div class="col-xs-4 col-md-4">
                                                                        <h6><strong style="font-size: 20px"><span><?= $donneesC["quantite"] ?></span>
                                                                                </div>
                                                                                </div>
                                                                                </div>

                                                                                <?php
                                                                            }
                                                                            ?>
                                                                            </div>                                            

                                                                            </br>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                            </div>

                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        </tr>
                                                                        </table>
                                                                        </div>
                                                                        </div>                   
                                                                        </div>
                                                                        </div>
                                                                        </div>     
                                                                        </div>

                                                                        </body>

                                                                        </html>