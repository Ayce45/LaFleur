<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>LAFLEUR</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="LAFLEUR E-COMMERCE" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- Custom Theme files -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <!--webfont-->
        <link href='//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Dorsa' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <!-- start menu -->
        <link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="js/megamenu.js"></script>
        <script src="js/jquery.easydropdown.js"></script>
        <link rel="shortcut icon" href="images/favicon.ico" type="images/x-icon" />
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <link rel="shortcut icon" href="images/favicon.ico" type="images/x-icon" />
    </head>

    <body>
        <?php
        include 'connect.php';
        $nbrProducts = 0;
        $nbrRefs = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $product) {
                $nbrProducts = $nbrProducts + $product['quantity'];
            }
            foreach ($_SESSION['cart'] as $product) {
                $nbrRefs++;
            }
        }
        ?>
        <div class="banner2">
            <div class="container">
                <div class="header_top">
                    <div class="header_top_left">
                        <div class="box_11"><a href="checkout.php">
                                <h4><p>Panier : <span id="Cart_total">0</span> € (<span id="Cart_quantity" class="simpleCart_quantity"><?= $nbrProducts ?></span> produits)</p><img src="images/bag.png" alt=""/><div class="clearfix"> </div></h4>
                            </a>                        
                        </div> 
                    </div>
                </div>
                <div class="header_bottom">
                    <div class="logo">
                        <h1><a href=""><span class="m_1">L</span>AFLEUR</a></h1>
                    </div>
                    <div class="menu">
                        <ul class="megamenu skyblue">	
                            <?php
                            $reponse = $bdd->query('SELECT * FROM categorie');
                            while ($donnees = $reponse->fetch()) {
                                echo '<li><a class="color7" href="listpdt.php?cat=' . $donnees["cat_code"] . '">' . $donnees["cat_libelle"] . '</a></li>';
                            }
                            ?>                            
                            <li><a class="color7" href="contact.php">Contact</a></li>
                            <li><a class="color7" href="inscription.php">Inscription</a></li>
                            <li><a class="color7" href="admin/"><i class ="fa fa-lock"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="box ">
                        <div class="info">
                            <h4 class="text-center">Title</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla viverra dui eget auctor. Etiam cursus nibh et mollis tincidunt. Nam commodo et velit quis aliquam. Donec mollis mattis ipsum sit amet mollis. Nullam vulputate volutpat quam sit amet tristique. Suspendisse euismod orci nibh, non aliquet velit rhoncus vitae. Duis a purus suscipit, suscipit velit sed, eleifend odio.

                                Curabitur accumsan neque vitae quam aliquet, ac elementum nulla hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse ultricies elit ut quam suscipit, eget semper erat vestibulum. Nulla faucibus cursus dui at ullamcorper. Proin vitae arcu vulputate, gravida lacus vitae, varius mi. Donec lacus eros, suscipit sed congue quis, tempor ut ligula. Ut imperdiet sapien vel nunc euismod pellentesque. Ut suscipit gravida mauris, sed fermentum sapien.

                                Maecenas at justo non sapien lobortis sodales. Donec Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla viverra dui eget auctor. Etiam cursus nibh et mollis tincidunt. Nam commodo et velit quis aliquam. Donec mollis mattis ipsum sit amet mollis. Nullam vulputate volutpat quam sit amet tristique. Suspendisse euismod orci nibh, non aliquet velit rhoncus vitae. Duis a purus suscipit, suscipit velit sed, eleifend odio. Curabitur accumsan neque vitae quam aliquet, ac elementum nulla hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse ultricies elit ut quam suscipit, eget semper erat vestibulum. Nulla faucibus cursus dui at ullamcorper. Proin vitae arcu vulputate, gravida lacus vitae, varius mi. Donec lacus eros, suscipit sed congue quis, tempor ut ligula. Ut imperdiet sapien vel nunc euismod pellentesque. Ut suscipit gravida mauris, sed fermentum sapien. Maecenas at justo non sapien lobortis sodales. Donec lacinia risus tellus, ac sodales enim porttitor in. Etiam ac auctor quam, auctor condimentum urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec at odio sed metus bibendum malesuada et sit amet felis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at erat diam. Proin condimentum imperdiet efficitur. Duis tristique vehicula velit, vel rutrum libero blandit nec. Ut ultricies, enim ac tristique feugiat, lectus diam venenatis lectus, sed pretium ligula tellus ac nisl.lacinia risus tellus, ac sodales enim porttitor in. Etiam ac auctor quam, auctor condimentum urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec at odio sed metus bibendum malesuada et sit amet felis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at erat diam. Proin condimentum imperdiet efficitur. Duis tristique vehicula velit, vel rutrum libero blandit nec. Ut ultricies, enim ac tristique feugiat, lectus diam venenatis lectus, sed pretium ligula tellus ac nisl.</p>        
                        </div>
                    </div>
                </div>     
            </div>
        </div>   

    </body>
</html>

<script>
    $('#Cart_total').load('ajax/getCartPrice.php');
</script>

