<?php
session_start();
include "../connect.php";

include "../php/config.php";



$sql1 = "SELECT * FROM users";
$row = $mysqli->query($sql1) -> fetch_assoc();



if (isset($_POST["knop"])) {
    $naam = $_POST["naam"];
    $beschrijving = $_POST["beschrijving"];
    $prijs = $_POST["prijs"];
    $stad = $_POST["stad"];
    $postcode = $_POST["postcode"];

    $poster = $_SESSION["unique_id"];
    $date = date("Y-m-d G:i:s");


    //foto
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        echo "<pre>";
        print_r($_POST);
        print_r($_FILES);
        echo "</pre>";


        if (isset($_FILES["file"]["name"])){
            $img_name = $_FILES['file']['name'];
            $img_type = $_FILES['file']['type'];
            $tmp_name = $_FILES['file']['tmp_name'];



                    if(move_uploaded_file($tmp_name,"images/posts/".$img_name)) {

                        $sql = "UPDATE tblposts SET volgnummer = '0', foto ='" .$img_name . "', soort='" .$naam . "', beschrijvingPost='" .$beschrijving . "', poster='" .$_SESSION["unique_id"] . "', 
                        datum='" .$date . "', likes= '0', zoekertje= 'false',prijs='" .$prijs . "',stad='" .$stad . "', postcode='" .$postcode . "',id_user='" .$_SESSION["user_id"] . "'";
                        $resultaat = $mysqli->query($sql);

                        header("Location: account.php");
                    }




        }else{


            echo '<div class="alert alert-danger" style=" text-align: center;"   role="alert">
                      Please add a valid image
                      </div>';
        }
    }
    //$sql = "UPDATE users
        //SET fname ='" .  . "', lname ='" .  . "',email ='" .   . "'WHERE unique_id =" . $_SESSION['unique_id'];

} else {
    $sql =  "SELECT * FROM tblposts WHERE volgnummer = ".$_GET['tewijzigen'];
    $row1 = $mysqli->query($sql) -> fetch_assoc();
    print '

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
    <link rel="stylesheet" href="../css/account.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
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
                            <a href="../php/logout.php?logout_id="' . $row["unique_id"] . ' class="logout">Logout</a>
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
                        <a href="../index.php">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



<div class="container">
    <div class="row">
        <div class="col-md-3 ">

            <div class="list-group ">
                <a href="account.php" class="list-group-item list-group-item-action">Info</a>
                ';
    if ($row["admin"] === '1'){
        print ' <a href="gebruikers.php" class="list-group-item list-group-item-action">User Management</a>
                            <a href="approval_posts" class="list-group-item list-group-item-action">Approval Posts</a>
                            <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                            <a href="../post_toevoegen/toevoegen.php" class="list-group-item list-group-item-action">Post Item</a>
                            <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                            <a href="remove_posts.php" class="list-group-item list-group-item-action active">Remove Posts</a>
                            <a href="edit_posts.php" class="list-group-item list-group-item-action">Edit Posts</a>
                            <a href="profielfoto.php" class="list-group-item list-group-item-action">Edit Profile Picture</a>
                            <a href="#" class="list-group-item list-group-item-action">****</a>
                            <a href="#" class="list-group-item list-group-item-action">****</a>
                            <a href="#" class="list-group-item list-group-item-action">****</a>
                            ';
    }else if ($row["subscription_id"] > '0'){
        print '        
                            <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                            <a href="../post_toevoegen/toevoegen.php" class="list-group-item list-group-item-action">Post Item</a>
                            <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                            <a href="remove_posts.php" class="list-group-item list-group-item-action active">Remove Posts</a>
                            <a href="edit_posts.php" class="list-group-item list-group-item-action">Edit Posts</a>
                            <a href="profielfoto.php" class="list-group-item list-group-item-action">Edit Profile Picture</a>
                            <a href="#" class="list-group-item list-group-item-action">****</a>
                            <a href="#" class="list-group-item list-group-item-action">****</a>
                            <a href="#" class="list-group-item list-group-item-action">****</a>';
    } else{
        print '
                           <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                           <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                           <a href="profielfoto.php" class="list-group-item list-group-item-action">Edit Profile Picture</a>
                           ';

    }
    print '
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
                            <form method="post" action="wijzig.php" autocomplete="off">
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">Type</label>
                                    <div class="col-8">
                                        <input id="name"  name="naam" value="' .$row1["soort"] . '" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="beschrijving" class="col-4 col-form-label">Description</label>
                                    <div class="col-8">
                                        <textarea  rows="5" cols="20" name="beschrijving" value="'.$row1["beschrijvingPost"] . '" class="form-control here" type="text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Price</label>
                                    <div class="col-8">
                                        <input id="prijs" style="width: 60px; " name="prijs" value="'.$row1["prijs"] . '" class="form-control here" type="text">
                                    </div>
                                </div>                                
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">ZIP code</label>
                                    <div class="col-8">
                                        <input id="prijs" style="width: 80px; " name="postcode" value="'.$row1["postcode"] . '" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">City</label>
                                    <div class="col-8">
                                        <input id="prijs" style="width: 100px; " name="stad" value="'.$row1["stad"] . '" class="form-control here" type="text">
                                    </div>
                                </div>                                
                                <div class="form-group row">
                                     <label  class="col-4 col-form-label">Select Image</label>
                                    <div class="col-8">                                     
                                        <input type="file" name="afbeelding" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="knop" type="submit" class="btn btn-primary">Update My Post</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
';
}
?>

