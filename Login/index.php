<?php
include "../connect.php";
session_start();

$validInfo = true;
if (isset($_POST["knop"])) {
    $email = $_POST["email"];
    $passwoord = $_POST["pass"];

    //SAFETY anders kunt ge SQL code beginnen schrijven
    $email = str_replace("'", "", $email);
    $passwoord = str_replace("'", "", $passwoord);

    $sql = "SELECT * FROM tblgebruikers WHERE email='" . $email . "' AND wachtwoord='" . $passwoord . "'";
    print $sql;




    $resultaat = $mysqli->query($sql);
    if ($info = $resultaat->fetch_assoc()) {

        $gebruikerInfo = array();

        $fieldInfo = $resultaat->fetch_fields();
        foreach ($fieldInfo as $val) {
            if ($val->name != "wachtwoord") {
                $arr = array($val->name => $info[$val->name]);
                $gebruikerInfo = array_merge($gebruikerInfo, $arr);
            }
        }
        $_SESSION["gebruiker"] = $gebruikerInfo;
        print_r($_SESSION["gebruiker"]);
        //header("Location:site/index1.php");


        if (!$resultaat = $mysqli->query($sql)) {
            print $mysqli->error;
        } else {
            $sql1 = "UPDATE tblgebruikers SET status = 1 WHERE email='" . $email . "' AND wachtwoord='" . $passwoord . "'";
            $resultaat1 = $resultaat = $mysqli->query($sql);
            header("location: ../index.php");
        }


    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">



    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--===============================================================================================-->
</head>
<body>


<div class="container ">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form method="post"  class="box">
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your login and password!</p>
                    <input type="text" name="email" placeholder="Email">
                    <input type="password" name="pass" placeholder="Password">
                    <a class="forgot text-muted" href="aanmelden.php"> Nog geen account? Klik hier</a>
                    <br>
                    <?php
                    if (isset($_GET["newpwd"])) {
                        if ($_GET["newpwd"] == "passwordupdated"){
                            echo '<p class="signupsuccess">Uw wachtwoord is gereset!</p>';
                        }
                    }
                    ?>
                    <a class="forgot text-muted" href="wachtwoordvergeten.php"> Wachtwoord vergeten? Klik hier</a>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <input class="login100-form-btn" type="submit"  value="Log in" name="knop">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="social-network social-circle">
                            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="icoGoogle" title="Google +"><i class="fab fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>