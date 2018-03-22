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
                                            <script>$(document).ready(function (c) {
                                                    $('.close<?= $product['ref'] ?>').on('click', function (c) {
                                                        $('.product<?= $product['ref'] ?>').fadeOut('slow', function (c) {
                                                            $('.product<?= $product['ref'] ?>').remove();
                                                        });
                                                    });
                                                });
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
                                <a class="continue" href="http://localhost/PPE2/">Poursuivre mes achats</a>
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
<script type="text/javascript">
    // Fonction pour arrondir
    function precisionRound(number, precision) {
        var factor = Math.pow(10, precision);
        return Math.round(number * factor) / factor;
    }

    // Fonction pour actualiser
    function actualise() {

        // On défini les valeurs par défaut
        document.getElementById('last_price').innerHTML = 0;
        document.getElementById('total5').innerHTML = 0;

        // On va rechercher le nombre de type de produits différents dans le panier
        var cartCount;
        $.get('ajax/getCartCount.php', function (data) {
            cartCount = data;
            if (cartCount < 1) {
                document.getElementById('isCartFilled').innerHTML = "<h1 class=\"text-center\">Panier vide<h1>";
            }


            produits = document.getElementsByClassName('cart-item1');
            produits = Array.from(produits);
            produits.forEach(function (element) {

                // Pour chaque type de produits on actualise les infos
                document.getElementById('subtotal' + element.getElementsByClassName('reference')[0].innerHTML).innerHTML = document.getElementById('quantity' + element.getElementsByClassName('reference')[0].innerHTML).value * document.getElementById('pu_' + element.getElementsByClassName('reference')[0].innerHTML).innerHTML;
                document.getElementById('total5').innerHTML = precisionRound(parseFloat(document.getElementById('total5').innerHTML) + parseFloat(document.getElementById('subtotal' + element.getElementsByClassName('reference')[0].innerHTML).innerHTML), 2);

                document.getElementById('last_price').innerHTML = precisionRound(parseFloat(document.getElementById('total5').innerHTML) + parseFloat(document.getElementById('FDP').innerHTML), 2);


                ref = element.getElementsByClassName('reference')[0].innerHTML;
                price = parseFloat(element.getElementsByClassName('prix')[0].innerHTML);
                quantity = parseFloat(element.getElementsByClassName('quantite')[0].value);

                // On définis la quantité modifiée par rapport a la valeur de base (pour retirer du panier ou ajouter)
                quantity = quantity - parseFloat(element.getElementsByClassName('quantite-base')[0].value);
                element.getElementsByClassName('quantite-base')[0].value = parseFloat(element.getElementsByClassName('quantite')[0].value);

                // On ajoute / retire des produits au panier
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "ajax/addCart.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("ref=" + ref + "&quantity=" + quantity);
                document.getElementById('Cart_quantity').innerHTML = parseInt(document.getElementById('Cart_quantity').innerHTML) + parseInt(quantity);
                document.getElementById('Cart_total').innerHTML = parseInt(document.getElementById('Cart_total').innerHTML) + parseInt(price) * parseInt(quantity);
            });
        });
    }
    // Fonction pour retirer un type d'article du panier
    function removeCart(ref) {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "ajax/removeCart.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("ref=" + ref);
        //console.log("ref=" + ref);
        location.reload();
    }

    function destroySession() {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "ajax/destroyCart.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("ref=" + ref);
        //console.log("ref=" + ref);
        location.reload();
    }
</script>
