<?php
include "connect.php";
include "php/config.php";
session_start();
$page = $_SERVER['REQUEST_URI'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
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
                            <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
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

<?php
include "php/config.php";
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



<div class="container">
    <div class="row">
        <div class="col-md-3 ">

            <div class="list-group ">
                <a href="account.php" class="list-group-item list-group-item-action ">Info</a>
                <?php
                if ($row["admin"] === '1'){
                    print ' <a href="gebruikers.php" class="list-group-item list-group-item-action active">User Management</a>';
                }
                ?>
                <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                <a href="toevoegen.php" class="list-group-item list-group-item-action">Post Item</a>
                <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                <a href="#" class="list-group-item list-group-item-action">****</a>
                <a href="#" class="list-group-item list-group-item-action">****</a>
                <a href="#" class="list-group-item list-group-item-action">****</a>
                <a href="#" class="list-group-item list-group-item-action">****</a>
                <a href="#" class="list-group-item list-group-item-action">****</a>
                <a href="#" class="list-group-item list-group-item-action">****</a>
                <a href="#" class="list-group-item list-group-item-action">****</a>


            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Your Profile</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
        include "connect.php";
                            $sql = "select * from users";
                            $resultaat = $mysqli->query($sql);
                            while ($row = $resultaat->fetch_assoc()){
                                print '
                                        <div class="card" style="width: 18rem; display: inline-block;">
                                          <img class="card-img-top" style="height: 286px; width: 286px;" src="php/images/'. $row["img"] . '"">
                                          <div class="card-body">
                                            <h5 class="card-title">'. $row["lname"]. ' ' .$row["fname"]. '</h5>
                                            <p class="card-text">'. $row["email"]. '</p>
                                        ';
                                            if ($row["admin"] === '1'){
                                                print ' <p class="card-text">Admin</p>';
                                            } else{
                                                print '<p class="card-text">Customer</p>';
                                            }
                                
                                print '
                                            <a href="#" class="btn btn-danger">Remove</a>
                                            <a href="#" class="btn btn-success">Make Admin</a>
                                          </div>
                                        </div>
                                     
                                           
                                        ';
                            }
                        ?>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>