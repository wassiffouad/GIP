<?php
session_start();
include_once "php/config.php";
include_once "connect.php";
if (!isset($_SESSION['unique_id'])) {
    header("location: index.php");
}


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Home page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        div.pagination {
            display: inline-block;
            padding: 0;
            margin: 0;
        }

        div.pagination a {
            display: inline;
        }

        div.pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #dddddd;
        }

        div.pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        div.pagination a:hover:not(.active) {
            background-color: cornflowerblue;
        }


    </style>


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
    <link rel="stylesheet" href="css/navbar.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">


</head>

<body>


<!-- Header Section Begin -->
<header class="header">
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
                <div class="header" id="hidden">
                    <a  class="logo" href="index1.php"><img src="images/shique.png" alt="" style="height: 150px; width: 200px;"></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="navbar navbar-expand-lg">
                    <div class="header">
                        <a  class="logo" href="index1.php"><img src="images/shique.png" alt="" style="height: 150px; width: 200px;"></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="  width: 35px; height: 5px; background-color: black; margin: 6px 0;">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <?php
                            if ($row["subscription_id"] === '0') {
                                print '
                                <li class="nav-item active ">
                                    <a class="nav-link cta" href="index1.php">Home<span class="sr-only">(current)</span></a>
                                </li> 
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="abbonementen/abbonement.php">Subscribe</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="account_pagina/wachtwoord.php">Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="account_pagina/account.php">Account</a>                       
                                </li>
                                <li class="nav-item">
                                    <a href="php/logout.php?logout_id=' . $row["unique_id"] . '" class="nav-link">Logout</a>                            
                                </li>           
                                           ';
                            } else {
                                print '
                                <li class="nav-item active">
                                    <a class="nav-link cta" href="index1.php">Home<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="abbonementen/abbonement.php">Subscription<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="chat.php">Chat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="post_toevoegen/toevoegen.php">Post</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="account_pagina/wachtwoord.php">Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="account_pagina/account.php">Account</a>                       
                                </li>
                               <li class="nav-item">
                                    <a class="nav-link" href="php/logout.php?logout_id=' . $row["unique_id"] . '">Logout</a>                   
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


<!-- Featured Section Begin -->

<section class="featured spad">
    <?php
    include "connect.php";
    //aantal paginas
    $results_per_page = 3;

    // aantal in databank
    $sql7 = "SELECT * FROM tblposts";
    $result = mysqli_query($conn, $sql7);
    $number_of_results = mysqli_num_rows($result);

    //aantal paginas beschikbaar
    $number_of_pages = ceil($number_of_results / $results_per_page);

    //op welke pagina momenteel
    if (!isset($_GET["page"])) {
        $page = 1;
    } else {
        $page = $_GET["page"];
    }

    //limit starting number
    $this_page_first_result = ($page - 1) * $results_per_page;

    //neem geselecteerde resultaten van database en toon op pagina
    $sql9 = "SELECT * FROM tblposts ORDER by datum DESC  LIMIT " . $this_page_first_result . ',' . $results_per_page;
    $result = mysqli_query($conn, $sql9);


    //$sql2 = mysqli_query($conn,"SELECT fname, lname, id_user, datum FROM users JOIN tblposts ON users.user_id = tblposts.id_user");
    //if(mysqli_num_rows($sql2) > 0){
    //  $row2 = mysqli_fetch_assoc($sql2);
    // }
    print '

        
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Products</h2>
                    </div>
                    <!--<div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul>
                    </div>-->
                </div>
            </div>
            <div class="breedte" style="display: flex; align-content: center; justify-content: center;">
            <div class="row">';


    while ($row3 = $result->fetch_assoc()) {

        $sql4 = "SELECT * FROM users WHERE user_id = " . $row3["id_user"];
        $persoon = $mysqli->query($sql4)->fetch_assoc();

        print '
                    <div class="featured__item">
                    <div class="col-sm">
                        <div class="card" style="width: 18rem; margin-left: 10px; margin-right: 10px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                            <div class="featured__item__pic set-bg card-img-top" style="height: 300px;" data-setbg="images/posts/' . $row3["foto"] . '" )>
                            <div class="card-body">
                                <ul class="featured__item__pic__hover">
                                    <!--<li><a href="#"><i class="fa fa-heart"></i></a></li>-->
                                    ';
        if ($row["subscription_id"] > '0') {
            print '
                                    <li><a " href="chat.php?user_id=' . $persoon["unique_id"] . '"><i class="fab fa-telegram-plane"></i></a></li>
                                    ';
        }
        print '
                                    <!--<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><strong> ' . $row3["soort"] . '</strong></h5>
                            <p class="card-text">' . $row3["beschrijvingPost"] . '</p>
                            <div class="featured__item__text">
                                <h5>??? ' . $row3["prijs"] . '</h5>
                            </div>
                            <p class="card-text">Posted by: ' . $persoon["lname"] . " " . $persoon["fname"] . '<br>
                                                 On: ' . $row3["datum"] . '<br>
                                                 From:' . $row3["postcode"] . " " . $row3["stad"] . '</p>
                           </div>
                        </div>
                        </div>
                      </div>';
    }
    print '</div>
            </div> <br>
                <div class="pagination" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">';
    for ($page = 1; $page <= $number_of_pages; $page++) {

        echo '
       
            <a href="index1.php.?page=' . $page . '">' . $page . '</a>';
    }
    print '</div>'
    ?>


</section>
<!-- Featured Section End -->


<!-- Js Plugins -->
<script>

</script>
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