<?php
session_start();
if (isset($_POST["knop"])) {
    $email = $_POST["email"];


    include "connect.php";

    $mail = $_SESSION["mail"];

    $headers = 'From: wassifxf@gmail.com' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n" .
        'Content-Type: text/html; charset=utf-8';

//random code aanmaken
    $randomCode = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);

    $_SESSION["code"] = $randomCode;

    $subject = "Wachtwoord vergeten";

    $body = "Om je wachtwoord te kunnen aanpassen klik op deze link en typ je nieuw wachtwoord in.\n href: http://gip/resetPW/index.php?code=$randomCode";

    $result = mail($mail, $subject, $body, $headers);
    var_dump($result);
}
?>
<head>
    <title>Login V2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">



    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/ww.css">
    <!--===============================================================================================-->
</head>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php
                if (isset($_SESSION['status'])){
                    ?>
                    <div class="alert alert-success">
                        <h5><?=$_SESSION['status']; ?></h5>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Reset wachtwoord</h5>
                    </div>
                    <div class="card-body p-4">

                        <form action="password-reset.php" method="post">

                            <div class="form-group mb-3">
                                <label>Email Adres</label>
                                <input type="text" name="email" class="form-control" placeholder="E-mail adres hier">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="password_reset_link" class="btn btn-primary">Verstuur wachtwoord</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
