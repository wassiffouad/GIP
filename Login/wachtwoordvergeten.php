<?php
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

</head>
<hr>
<div class="wrapper-main">
    <section class="section-default">
        <h1>Herstel wachtwoord</h1>
        <p>Je zal een mail ontvangen met instructies hoe je je wachtwoord moet herstellen.</p>
        <form action="includes/reset-request.inc.php" method="post">
            <input type="text" name="email" placeholder="E-mail...">
            <button type="submit" name="reset-request-submit">Ontvang nieuw wachtwoord via e-mail</button>
        </form>
        <?php
        if (isset($_GET["reset"])){
            if ($_GET["reset"] == "success") {
                echo '<p class="signupsuccess">Check uw e-mail!</p>';
            }
        }
        ?>
    </section>

</div>
