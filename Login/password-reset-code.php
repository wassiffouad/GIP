<?php
session_start();
include "connect.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
function send_password_reset($get_name,$get_email,$token){

    $mail = new PHPMailer(true);
    //$mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->SMTPAuth   = true;

    $mail->Host       = 'smtp.example.com';
    $mail->Username   = 'user@example.com';
    $mail->Password   = '***';

    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;


    $mail->setFrom('from@example.com', $get_name);
    $mail->addAddress($get_email);


    $mail->isHTML(true);
    $mail->Subject("Reset wachtwoord melding");

    $email_template = "
    <h2>Hallo</h2>
    <h3>Je ontvangt deze mail omdat we een wachtwoord reset verzoek hebben gekregen for uw account.</h3>
    <br><br>
    <a href='http://phpoef/GIP/GIP/login/password-change.php?token=$token&email=$get_email'>Dit is de link.</a>
    ";
    $mail->Body = $email_template;
    $mail->send();
}

if (isset($_POST['password_reset_link'])){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM tblgebruikers WHERE email = '$email' LIMIT 1";
    $check_email_run =  mysqli_query($con,$check_email);

    if (mysqli_num_rows($check_email_run) > 0){
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['naam'];
        $get_email = $row['email'];

        $update_token = "UPDATE users SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con,$update_token);

        if ($update_token_run){
            send_password_reset($get_name,$get_email,$token);
            $_SESSION['status'] = "We hebben je een wachtwoord reset link gemailed";
            header("Location: password-reset.php");
            exit(0);
        }else {
            $_SESSION['status'] = "Er is iets fout gelopen. #1";
            header("Location: password-reset.php");
            exit(0);
        }

    }else{
        $_SESSION['status'] = "Geen e-mail gevonden";
        header("Location: password-reset.php");
        exit(0);
    }

}
?>
