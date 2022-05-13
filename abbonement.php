<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
$id = $_SESSION['user_id'];
?>
<!DOCTYPE HTML>
<html>
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">


        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

        <!-- Css Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
        <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <title>Pricing Plans and Subscription Payment | by PHPJabbers.com</title>
    <link href="style1.css" rel="stylesheet" type="text/css" media="all"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Monda" rel="stylesheet">

    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
    <script src="js/jquery.validate.min.js" type="text/javascript"></script>
    <header class="header">
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
        }
        ?>
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>

                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout |</a>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="account.php">Account</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo" >
                        <a href="index1.php"><img src="img/wasco.png" alt=""style="height: 80px; "></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu" style="" >
                        <ul>
                            <!--<li><a href="./shop-grid.html">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>-->
                            </li>
                            <li><a href='index1.php'>Home</a></li>

                            <li><a href='chat.php'>Chat</a></li>

                            <li><a href='toevoegen.php'>Toevoegen</a></li>

                            <!--<li><a href="./contact.html">Contact</a></li>-->

                            <li><a href="wachtwoord.php">Wachtwoord</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <!--<div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>-->
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    <div class="priceing-table w3l">
        <div class="wrap">
            <h1>Verschillende tarieven</h1>
            <div class="priceing-table-main">
                <div class="price-grid">
                    <div class="price-block agile">
                        <div class="price-gd-top pric-clr1">
                            <h4>Basic</h4>
                            <h3>€5</h3>
                            <h5>per maand</h5>
                        </div>
                        <div class="price-gd-bottom">
                            <div class="price-list">
                                <ul>
                                    <li>Volledige toegang</li>
                                    <li>5 gratis posts per maand</li>
                                    <li>24/7 contact</li>
                                    <li>Gratis Updates</li>
                                    <li>*****************</li>
                                </ul>
                            </div>
                        </div>
                        <div class="price-selet pric-sclr1">
                            <a class="popup-with-zoom-anim" data-plan="basic" data-price="5.00" href="checkout.php">Neem dit abbonement</a>
                        </div>
                    </div>
                </div>
                <div class="price-grid">
                    <div class="price-block agile">
                        <div class="price-gd-top pric-clr2">
                            <h4>Standard</h4>
                            <h3>€10</h3>
                            <h5>per maand</h5>
                        </div>
                        <div class="price-gd-bottom">
                            <div class="price-list">
                                <ul>
                                    <li>Volledige toegang</li>
                                    <li>10 gratis posts per maand</li>
                                    <li>24/7 contact</li>
                                    <li>Gratis Updates</li>
                                    <li>*****************</li>
                                </ul>
                            </div>
                        </div>
                        <div class="price-selet pric-sclr2">
                            <a class="popup-with-zoom-anim" data-plan="standart" data-price="10.00" href="checkout.php">Neem dit abbonement</a>
                        </div>
                    </div>
                </div>
                <div class="price-grid wthree">
                    <div class="price-block agile">
                        <div class="price-gd-top pric-clr3">
                            <h4>Premium</h4>
                            <h3>€20</h3>
                            <h5>per maand</h5>
                        </div>
                        <div class="price-gd-bottom">
                            <div class="price-list">
                                <ul>
                                    <li>Volledige toegang</li>
                                    <li>20 gratis posts per maand</li>
                                    <li>24/7 contact</li>
                                    <li>Gratis Updates</li>
                                    <li>*****************</li>
                                </ul>
                            </div>
                        </div>
                        <div class="price-selet pric-sclr3">
                            <a class="popup-with-zoom-anim" data-plan="premium" data-price="20.00" href="checkout.php">Neem dit abbonement</a>
                        </div>
                    </div>
                </div>
                <div class="clear"> </div>
            </div>
        </div>
    </div>