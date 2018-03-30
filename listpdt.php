<?php include 'header.php'; ?>
<div class="container">
    <div class="row">
        <div class="box ">
            <div class="info">
                <div class="card">
                    <br>
                    <div class="card-header bg-dark text-light">
                        <div class="clearfix"></div>
                    </div>
                    <?php
                    $cat = $_REQUEST['cat'];
                    $reponse = $bdd->query("SELECT * FROM produit WHERE pdt_categorie ='" . $cat . "'");
                    while ($donnees = $reponse->fetch()) {
                        ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-2 col-md-2" style="margin-left: 20px">
                                    <img class="img-responsive" src="images/<?= $donnees["pdt_image"] ?>" alt="prewiew">
                                </div>
                                <div class="col-xs-4 col-md-6">
                                    <h4 class="product-name"><strong><?= $donnees["pdt_designation"] ?></strong></h4><h4><small>Référence : <?= $donnees["pdt_ref"] ?></small></h4>
                                </div>
                                <div class="col-xs-6 col-md-4 row">
                                    <div class="col-xs-6 col-md-6 text-right" style="padding-top: 5px">
                                        <h6><strong style="font-size: 20px"><span id="price-<?= $donnees["pdt_ref"] ?>"><?= $donnees["pdt_prix"] ?></span><span class="text-muted"> x</span></strong></h6>
                                    </div>
                                    <div class="col-xs-4 col-md-4">
                                        <input type="number" class="form-control quantite text-center" id="quantity-<?= $donnees["pdt_ref"] ?>" value="1">                                     

                                    </div>
                                    <div class="col-xs-2 col-md-2">
                                        <button type="button" onclick="addCart('<?= $donnees["pdt_ref"] ?>', document.getElementById('quantity-<?= $donnees["pdt_ref"] ?>').value, document.getElementById('price-<?= $donnees["pdt_ref"] ?>').innerHTML * document.getElementById('quantity-<?= $donnees["pdt_ref"] ?>').value)" class="btn btn-outline-danger btn-xs">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </br>
                        <?php
                    }
                    ?>
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

<script type="text/javascript" src="js/script.js"></script>