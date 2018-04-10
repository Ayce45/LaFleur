<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>
<!DOCTYPE HTML>
<html style="background-color:rgb(249, 217, 190)">
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
    <body style="background-color:rgb(249, 217, 190)">
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
        <header>
            <div class="banner">
                <div class="container">
                    <div class="header_top">
                        <div class="header_top_left">
                            <div class="box_11"><a href="checkout.php">
                                    <h4><p>Panier : <span id="Cart_total">0</span> € (<span id="Cart_quantity" class="simpleCart_quantity"><?= $nbrProducts ?></span> produits)</p><img src="images/bag.png" alt=""/><div class="clearfix"> </div></h4>
                                </a>                        
                            </div> 
                        </div>
                        <?php if (isset($_SESSION['auth'])) { ?>
                            <div class="header_top_right">
                                <div class="box_11"><a href="myorder.php">
                                        <h4 style="color: black"><i class="fa fa-user"></i>  <?= $_SESSION['auth'] ?></h4>                       
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="header_bottom">
                        <div class="logo">
                            <h1><a href="./"><span class="m_1">L</span>AFLEUR</a></h1>
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
                                <?php if (empty($_SESSION['auth'])) { ?>
                                    <li><a class="color7" href= "connexion.php?id=0"><i class ="fa fa-lock"></i></a></li>
                                <?php } else { ?>
                                    <li><a class="color7" href="logout.php"><i class ="fa fa-sign-out"></i></a></li>
                                        <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
        </header>
        <script>
            $('#Cart_total').load('ajax/getCartPrice.php');
        </script>