<?php

include "php/config.php";
include "connect.php";
session_start();
if(!isset($_SESSION['unique_id'])){
    header("location: index1.php");
}

if (isset($_POST["knop"])){
    $nieuw = $_POST["nieuw"];
    $nieuw1 = $_POST["nieuw1"];
    $oud = $_POST["oud"];
    if ($nieuw != $nieuw1){
        //print "Passwords are not equal!";
        ?>
<script>
            function wachtwoord() {
                alert("Passwords are not equal!");
            }
        </script>

<?php

    }else if ($nieuw == $oud){
        //print "You can't use your old password!";
        ?>
        <script>
            function wachtwoord() {
                alert("You can't use your old password!");
            }
        </script>
<?php

    }
    else if ( $nieuw == $nieuw1 ){
        $encrypt_pass = md5($nieuw);
        $sql = "UPDATE users SET password = '".$encrypt_pass ." ' WHERE unique_id =". $_SESSION['unique_id'];
        $resultaat = $mysqli->query($sql);
        //print 'Password succesfully changed!';
        ?>
        <script>
            function wachtwoord() {
                alert("Password succesfully changed!");
            }
        </script>
<?php

    }

}

?>
<?php include_once "header.php"; ?>
<body>
<div class="wrapper">
    <section class="form signup">
        <header>Change password | <a href="index1.php" class="logout" style="color: black">Home</a></header>
        <form method="post" action="wachtwoord.php" autocomplete="off">
            <div class="error-text"></div>
                <div class="field input">
                    <label>New password</label>
                    <input type="password" name="nieuw" id="input" placeholder="new password" required="required"/>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field input">
                    <label>Confirm password</label>
                    <input type="password" name="nieuw1" placeholder="confirm password" required="required"/>
                    <i class="fas fa-eye"></i>
                </div>

            <div class="field input">
                <label>Old Password</label>
                <input type="password" name="oud" placeholder="old password" required="required"/>
                <i class="fas fa-eye"></i>
            </div>
            <div class="field button">
                <input type="submit" onclick="wachtwoord()" name="knop" value="Update">
            </div>
        </form>
    </section>
</div>

<script src="js/pass-show-hide.js"></script>

</body>
</html>








    <!-- Js Plugins -->
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