<?php


if (isset($_POST["reset-request-submit"])){
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "www.mmtuts.net/forgottenpwd/create-new-password.php?selector=". $selector . "&validator=" . bin2hex($token);

    $expires =date("U")+ 1800;



    $userEmail = $_POST["email"];
    require '../connect.php';

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt,"s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExires) VALUES (?,?,?,? );";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error!";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"ssss", $userEmail,$selector,$hashedToken,$expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysli_close();

    $to = $userEmail;

    $subject = 'Reset your password for mmtuts';

    $message = '<p>We hebben een verzoek ontvangen voor je wachtwoord te herstellen. De link om je wachtwoord te herstellen is verzonden</p>';
    $message .= '<br> Hier is je link: </br>';
    $message .= '<a href ="' . $url . '">' . $url . '</a></p>';

    $headers = "From: mmtuts <usemmtuts@gmail.com>\r\n";
    $headers .= "Reply-to: usemmtuts@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to,$subject,$message,$headers);

    header("Location : ../wachtwoordvergeten.php?reset=success");

} else {
    header("Location: ../index.php");
}

