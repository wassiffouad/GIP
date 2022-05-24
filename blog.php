<?php
session_start();
include_once "php/config.php";
include "connect.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");

    //if (isset($_POST["knop"])) {

     //   $sql = "UPDATE users SET admin = 0  WHERE volgnummer =" . $_SESSION['unique_id'];

  //      $resultaat = $mysqli->query($sql);

    //   header("location:account.php");
   // }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>


<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="Login/logout.php"><i class="fa fa-user"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</header>
<!-- Header Section End -->


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Gebruikers</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php">Home</a>
                        <a href="accountoud.php">Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5x col-md-5">
                <div class="blog__sidebar">

                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    <?php

                        $sql = "select * from users";
                        $resultaat = $mysqli->query($sql);
                        while ($row = $resultaat->fetch_assoc()){
                            print '
                            <div class="col-lg-6 col-md-6 col-sm-6" >
                            <div class="blog__item">
                           
                                <div class="blog__item__text">
                                    <h5> nummer: ' . $row["user_id"]  . '<br> naam: ' . $row["fname"] . ' ' . $row["lname"] .'</h5>
                                    <h5> email: '. $row["email"]  . ' ' . '<br> admin: ' .$row["admin"] .' </h5>
                                  
                                </div>
                                ';
                            //if ($row["admin"] === '1'){
                              //  print '<button type="submit" name="knop">Remove Admin</button>';
                           // }else{
                             //   print '<button type="submit">Make Admin</button>';
                           // }

                            print '
                            </div>
                        </div>
                        ';
                    }

                        ?>
                    <div class="col-lg-12">
                        <div class="product__pagination blog__pagination">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->


<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>


</body>

</html>