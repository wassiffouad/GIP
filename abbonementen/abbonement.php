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

        <!-- Css Styles -->

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
    <link rel="stylesheet" href="../css/navbar.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <link href="../style1.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Monda" rel="stylesheet">

    <script src="../js/jquery-1.11.0.min.js"></script>
    <script src="../js/jquery.magnific-popup.js" type="text/javascript"></script>
    <script src="../js/jquery.validate.min.js" type="text/javascript"></script>
</head>
<header class="header" style=" display: flex; padding: 30px 10%;">
    <?php
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
    }
    ?>
    <div class="header__top">
    </div>
    <div class="container">
        <div class="row" id="hallo" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <div class="col-lg-3">
                <div class="header">
                    <a  class="logo" href="../index1.php"><img src="../images/wasco.png" alt="" style="height: 60px;"></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="  width: 35px; height: 5px; background-color: cornflowerblue; margin: 6px 0;">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <?php
                            if ($row["subscription_id"] === '0') {
                                print ' 
                                <li class="nav-item active ">
                                    <a class="nav-link" href="../index1.php">Home<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="abbonementen/abbonement.php">Subscribe to chat and post</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../account_pagina/wachtwoord.php">Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../account_pagina/account.php">Account</a>                       
                                </li>
                                <li class="nav-item">
                                    <a href="../php/logout.php?logout_id=' . $row["unique_id"] . '" class="nav-link">Logout</a>                            
                                </li>           
                                           ';
                            } else {
                                print '
                                <li class="nav-item active">
                                    <a class="nav-link" href="../index1.php">Home<span class="sr-only">(current)</span></a>
                                </li>                               
                                <li class="nav-item">
                                    <a class="nav-link" href="../chat.php">Chat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../post_toevoegen/toevoegen.php">Post</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="../account_pagina/wachtwoord.php">Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../account_pagina/account.php">Account</a>                       
                                </li>
                               <li class="nav-item">
                                    <a class="nav-link" href="../php/logout.php?logout_id=' . $row["unique_id"] . '">Logout</a>                   
                                </li>                               
                                
                                ';

                            }
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header Section End -->
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