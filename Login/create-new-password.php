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
            <?php
            $selector = $_GET["selector"];
            $validator = $_GET["validator"];

            if (empty($selector) || empty($validator)) {
                echo "Could not validate your request!";
            } else {
                if (ctype_xdigit($selector)!== false && ctype_xdigit($validator) !== false) {
                    ?>
            <form action="includes/reset-password.inc.php" method="post">
                <input type="hidden" name="selector" value="<?php echo $selector;?>">
                <input type="hidden" name="validator" value="<?php echo $validator;?>">
                <input type="password" name="pwd" placeholder="Geef je wachtwoord..">
                <input type="password" name="pwd-repeat" placeholder="Geef je wachtwoord opnieuw..">
                <button type="submit" name="reset-password-submit">Reset wachtwoord</button>
            </form>

            <?php
                }
            }
            ?>


        </section>

    </div>

