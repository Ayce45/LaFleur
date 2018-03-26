<?php include 'header.php'; ?>   
<!-- On appelle la fonction actualise() une fois la page chargée -->
<body onload="actualise()">
    <div class="container">
        <div class="card-header bg-dark text-light">
            <div class="clearfix"></div>
        </div>

        <div class="container">
            <div class="row">
                <div class="box ">
                    <div class="info">       
                        <div class="check_box">
                            <div class="col-md-9">
                                <table id="cart" class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th style="width:20%"> </th>
                                            <th style="width:40%">Product</th>
                                            <th style="width:9%">Price</th>
                                            <th style="width:9%">Quantity</th>
                                            <th style="width:10%" class="text-center">Subtotal</th>
                                            <th style="width:12%"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="cart-header2">      
                                        <!-- On va chercher dans la session utilisateur son panier et pour chaque article nous recherchons dans la BDD les infos le concernant -->
                                        <?php
                                        if (isset($_SESSION['cart'])) {
                                            foreach ($_SESSION['cart'] as $product) {
                                                $reponseProduit = $bdd->query("SELECT * FROM produit WHERE pdt_ref ='" . $product['ref'] . "'");
                                                $reponseProduit = $reponseProduit->fetch();
                                                ?>                                      
                                                <tr class="cart-item1 product<?= $product['ref'] ?>">     
                                                    <td><img src="images/<?= $reponseProduit["pdt_image"] ?>.jpg" alt="..." class="img-responsive"/></td>
                                                    <td data-th="Product">
                                                        <div class="row">                                                                    
                                                            <div class="col-sm-10">
                                                                <h4 class="nomargin"><?= $reponseProduit["pdt_designation"] ?></h4>
                                                                <p class="text-info reference initialism"><?= $reponseProduit["pdt_ref"] ?></p>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td data-th="Price" class="prix" id="pu_<?= $product['ref'] ?>"><?= $reponseProduit["pdt_prix"] ?></td>
                                                    <td data-th="Quantity">
                                                        <input type="number" class="form-control quantite text-center" min="1" id="quantity<?= $product['ref'] ?>" value="<?= $product['quantity'] ?>">
                                                        <input type="hidden" class="quantite-base" value="<?= $product['quantity'] ?>">
                                                    </td>
                                                    <td data-th="Subtotal" id="subtotal<?= $product['ref'] ?>" class="text-center"></td>
                                                    <td class="actions" data-th="">
                                                        <button class="btn btn-danger btn-sm" data-target="#exampleModalLong<?= $product['ref'] ?>" data-toggle="modal" ><i class="fa fa-trash-o"></i></button>								
                                                    </td>
                                                </tr>  
                                            <div class="modal fade in" tabindex="-1" role="dialog" id="exampleModalLong<?= $product['ref'] ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-center">⚠ ATTENTION ⚠</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-center">Etes-vous sûr(e) de vouloir supprimer ce magnifique produit ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary close<?= $product['ref'] ?>" onclick="removeCart('<?= $product['ref']; ?>'); actualise();" data-dismiss="modal">Oui, supprimer</button>
                                                            <button type="button" class="btn btn-secondary " data-dismiss="modal">Non</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- On retire le produit de l'affichage quand on clique pour le supprimer -->
                                            <script>
                                                $(document).ready(deleteProduct(<?= $product['ref'] ?>));
                                            </script>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <span id="isCartFilled"></span>
                            </div>
                            <div class="col-md-3 cart-total">
                                </br>
                                </br>
                                <button class="btn btn-info" onclick="actualise()" style="padding: 10px 80px; margin-bottom: 28px; margin-right: 40px;"><i class="fa fa-refresh"></i></button>
                                <button class="btn btn-danger btn-sm" data-target="#exampleModalLongAll" data-toggle="modal"  style="padding: 10px 80px; margin-bottom: 28px; margin-right: 40px;"><i class="fa fa-trash-o"></i></button>
                                <a class="continue" href="./">Poursuivre mes achats</a>
                                <div class="price-details">
                                    <h3>Récapitulatif de commande</h3>
                                    <span>Total</span>
                                    <span id="total5"></span>
                                    <span>Frais de port</span>
                                    <span id ="FDP">20.00</span>
                                    <div class="clearfix"></div>				 

                                    <ul class="total_price">
                                        <li class="last_price"> <h4>TOTAL</h4></li>	
                                        <li><span id="last_price">0</span></li>
                                        <div class="clearfix"> </div>

                                    </ul>
                                </div>	
                                </br>
                                <div class="clearfix"></div>
                                <form method="POST" action="ajax/addOrder.php" name="login">
                                    <p><label>Code Client        </label><input type="text"  id="utilisateur" name="utilisateur" ></p>
                                    </br>
                                    <p><label>Mot de passe </label><input type="password" name="mdp" ></p>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" >COMMANDER</button>
                                    </div>  
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div> 
            </div>  
        </div>
    </div>



    <div class="modal fade in" tabindex="-1" role="dialog" id="exampleModalLongSucess">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">⚠ Demande d'achat ⚠</h5>
                </div>
                <div class="modal-body">
                    <p class="text-center">Etes-vous sûr(e) de vouloir procéder a la demande d'achat ?</p>
                    </br>
                    <p class="text-center"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="destroySession()" data-dismiss="modal">OUI</button>
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">QUITTER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade in" tabindex="-1" role="dialog" id="exampleModalLongAll">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">⚠ ATTENTION ⚠</h5>
                </div>
                <div class="modal-body">
                    <p class="text-center">Etes-vous sûr(e) de vouloir supprimer TOUT ces magnifiques produits ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="destroySession()" data-dismiss="modal">Oui, supprimer</button>
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Non</button>
                </div>
            </div>
        </div>
    </div>

</body>
<footer>
    <div class="copy">
        <p> &copy; 2018 LAFLEUR. All Rights Reserved | Design by NEJE</p>
    </div>
</footer>
</html>	

<script type="text/javascript" src="js/script.js"></script>