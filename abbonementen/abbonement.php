<?php
session_start();
include_once "../php/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <style>

    </style>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sucbcription page</title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

        <!-- Css Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">

    <link href="../style1.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="https://fonts.googleapis.com/css?family=Monda" rel="stylesheet">

    <script src="../js/jquery-1.11.0.min.js"></script>
    <script src="../js/jquery.magnific-popup.js" type="text/javascript"></script>
    <script src="../js/jquery.validate.min.js" type="text/javascript"></script>
</head>
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
                                <a href="../php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout |</a>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="../account_pagina/account.php">Account</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" >
            <div class="row" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;     background: -webkit-linear-gradient(left,whitesmoke,#41ac96 );
 ">
                <div class="col-lg-3">
                    <div class="header__logo" >
                        <a href="../index1.php"><img src="img/wasco.png" alt="" style="height: 80px; "></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu" style="margin-left: 50px; margin-right: 50px;" >
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
                            <?php
                            if ($row["subscription_id"] === '0'){
                                print '                            
                                           
                                           ';
                            } else {
                                print '
                                            <li><a href="../index1.php">Home</a></li>                            
                                            <li><a href="../chat.php">Chat</a></li>
                                            <li><a href="../post_toevoegen/toevoegen.php">Post Item</a></li>
                                            <li><a href="../account_pagina/wachtwoord.php">Password</a></li>
                                            ';
                            }
                            ?>

                            <!--<li><a href="./contact.html">Contact</a></li>-->


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
            <div class="section-title">
                <h1 style="color: black">Different Fees</h1>
            </div>
            <div class="priceing-table-main">
                <div class="price-grid" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                    <div class="price-block agile">
                        <div class="price-gd-top pric-clr1">
                            <h4>Basic</h4>
                            <h3>€5</h3>
                            <h5>a month</h5>
                        </div>
                        <div class="price-gd-bottom">
                            <div class="price-list">
                                <ul>
                                    <li>Full acces</li>
                                    <li>5 free posts a month</li>
                                    <li>24/7 contact</li>
                                    <li>Free Updates</li>
                                    <li>14 days free trial</li>
                                </ul>
                            </div>
                        </div>
                        <div class="price-selet pric-sclr1">
                            <a id="bnp-628d26e5c608690004ed7084"class="bnp-button"href="https://buynowplus.com/checkout/628d26e5c608690004ed7084">Take this</a>
                            <!--<a class="popup-with-zoom-anim" data-plan="basic" data-price="5.00" href="checkout.php">Neem dit abbonement</a>-->
                        </div>
                    </div>
                </div>
                <div class="price-grid" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                    <div class="price-block agile">
                        <div class="price-gd-top pric-clr2">
                            <h4>Standard</h4>
                            <h3>€10</h3>
                            <h5>a month</h5>
                        </div>
                        <div class="price-gd-bottom">
                            <div class="price-list">
                                <ul>
                                    <li>Full acces</li>
                                    <li>10 free posts a month</li>
                                    <li>24/7 contact</li>
                                    <li>Free Updates</li>
                                    <li>14 days free trial</li>
                                </ul>
                            </div>
                        </div>
                        <div class="price-selet pric-sclr2">
                            <a id="bnp-628d2870b0b4420004d49c31"class="bnp-button"href="https://buynowplus.com/checkout/628d2870b0b4420004d49c31">Take this</a>

                        </div>
                    </div>
                </div>
                <div class="price-grid wthree" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                    <div class="price-block agile">
                        <div class="price-gd-top pric-clr3">
                            <h4>Premium</h4>
                            <h3>€19</h3>
                            <h5>a month</h5>
                        </div>
                        <div class="price-gd-bottom">
                            <div class="price-list">
                                <ul>
                                    <li>Full acces</li>
                                    <li>20 free posts a month</li>
                                    <li>24/7 contact</li>
                                    <li>Free Updates</li>
                                    <li>14 days free trial</li>
                                </ul>
                            </div>
                        </div>
                        <div class="price-selet pric-sclr3">
                            <a id="bnp-628d2909c608690004ed7085"class="bnp-button"href="https://buynowplus.com/checkout/628d2909c608690004ed7085">Take this</a>
                        </div>
                    </div>
                </div>
                <div class="clear"> </div>
            </div>
        </div>
    </div>