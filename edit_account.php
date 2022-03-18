<?php
include "connect.php";
session_start();
$page = $_SERVER['REQUEST_URI'];

if (isset($_POST["knop"])) {
    $voornaam = $_POST["voornaam"];
    $naam = $_POST["naam"];
    $email = $_POST["email"];
    $telefoonnummer = $_POST["telefoonnummer"];

    $sql = "UPDATE tblgebruikers
        SET naam ='" . $naam . "', voornaam ='" . $voornaam . "',email ='" . $email . "', telefoonnummer ='" . $telefoonnummer . "'
        WHERE volgnummer =" . $_SESSION['gebruiker']['volgnummer'];

    $resultaat = $mysqli->query($sql);
    $_SESSION["gebruiker"]["voornaam"] = $voornaam;
    $_SESSION["gebruiker"]["naam"] = $naam;
    $_SESSION["gebruiker"]["email"] = $email;
    $_SESSION["gebruiker"]["telefoonnummer"] = $telefoonnummer;

    header("location:account.php");
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
    <link rel="stylesheet" href="css/account.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>
        Account
    </title>
</head>

<body>


<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header__top__left">

                    </div>
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
                    <h2>Profiel</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->


<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <?php
                    print '<img src="uploads/' . $_SESSION["gebruiker"]["Profielfoto"] . '" alt="">';
                    ?>                    <div class="file btn btn-lg btn-primary">
                        <?php
                        print'<a href="profielfoto.php?page=' . $page . '"> Profielfoto veranderen</a>'
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">

                    <?php
                    $sql = "SELECT naam AND voornaam FROM tblgebruikers WHERE volgnummer =" . $_SESSION["gebruiker"]["volgnummer"];
                    $resultaat = $mysqli->query($sql);
                    print "<h5>". $_SESSION["gebruiker"]["naam"] . " " . $_SESSION["gebruiker"]["voornaam"]. "</h5>";
                    ?>

                    <?php
                    $sql = "SELECT admin FROM tblgebruikers WHERE volgnummer =" . $_SESSION["gebruiker"]["volgnummer"];
                    $resultaat = $mysqli->query($sql);
                    if ($_SESSION["gebruiker"]["admin"] === '1'){
                        print "<h6>Admin</h6>";
                    } else {
                        print "<p> Verkoper of koper </p>";
                    }
                    ?>
                    </h6>
                    <?php
                    $sql = "SELECT status FROM tblgebruikers WHERE volgnummer =" . $_SESSION["gebruiker"]["volgnummer"];
                    $resultaat = $mysqli->query($sql);
                    if ($_SESSION["gebruiker"]["status"] == 1){
                        print "<p class='proile-rating'>STATUS: <span>online</span></p>";
                    } else if ($_SESSION["gebruiker"]["status"] == 0){
                        print "<p class='proile-rating'>STATUS: <span>offline</span></p>";

                    }
                    ?>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                        </li>-->
                    </ul>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>HANDIGE LINKS</p>
                    <a href="wachtwoord.php">Wachtwoord aanpassen</a><br/>
                    <a href="toevoegen.php">Items toevoegen</a><br/>
                    <a href="">Link</a>
                    <p>Titel</p>
                    <a href="">Link</a><br/>
                    <a href="">Link</a><br/>
                    <a href="">Link</a><br/>
                    <a href="">Link</a><br/>
                    <a href="">Link</a><br/>
                </div>
            </div>
            <form method="post" action="edit_account.php">
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="voornaam" placeholder="Jan">
                                <input type="text" name="naam" placeholder="Peters">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="email" placeholder="mail@mail.com">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="telefoonnummer" placeholder="+324 12 34 56 78">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Wachtwoord</label>
                            </div>
                            <div class="col-md-6">
                                <a href="wachtwoord.php">Wachtwoord veranderen? Klik hier</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit" name="knop" class="btn btn-primary" value="Verander gegevens">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
</div>
</div>
</form>
</div>
</body>