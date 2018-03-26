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

function deleteProduct(ref) {
    $('.close' + ref).on('click', function (ref) {
        $('.product' + ref).fadeOut('slow', function (ref) {
            $('.product' + ref).remove();
        });
    });
}

function addCart(ref, quantity, price) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "ajax/addCart.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("ref=" + ref + "&quantity=" + quantity);
    //console.log("ref=" + ref + "&quantity=" + quantity);
    document.getElementById('Cart_quantity').innerHTML = parseInt(document.getElementById('Cart_quantity').innerHTML) + parseInt(quantity);
    document.getElementById('Cart_total').innerHTML = parseInt(document.getElementById('Cart_total').innerHTML) + parseInt(price);
}