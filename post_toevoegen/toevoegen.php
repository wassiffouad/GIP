<?php
session_start();
include "../connect.php";
include "../php/config.php";



    if (isset($_POST["knopje"])) {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            $counter = $row["counter"];
        }
        if ($row["subscription_id"] === '1' && $counter < '5'){
            $naam = $_POST["naam"];
            $soort = $_POST["soort"];
            $beschrijving = $_POST["beschrijving"];
            $prijs = $_POST["prijs"];
            $stad = $_POST["stad"];
            $postcode = $_POST["postcode"];

            $poster = $_SESSION["unique_id"];
            $date = date("Y-m-d G:i:s");


            //foto
            $targetDir = "../images/posts/";
            $fileName = basename($_FILES["afbeelding"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES["afbeelding"]["tmp_name"], $targetFilePath)) {
                    $sql = "INSERT INTO tblgoedkeuring (volgnummer,foto,soort,beschrijvingPost,poster,datum,likes,zoekertje,prijs,stad,postcode, id_user) 
                        VALUES (null,'" . $fileName . "','" . $soort . "','" . $beschrijving . "','" . $poster . "','" . $date . "',0,false,'" . $prijs . "','" . $stad . "','" . $postcode . "','" . $_SESSION["user_id"] . "')";
                    //$counter++;
                    if ($mysqli->query($sql)) {
                        $counter++;
                        $sql2 = "UPDATE users SET counter = {$counter} WHERE unique_id = {$_SESSION['unique_id']}";
                        $resultaat = $mysqli->query($sql2);
                        header("Location: ../account/approval.php");


                    } else {
                        print $sql;

                    }
                }
            }
        } else if ($row["subscription_id"] === '2'&& $counter < '10'){
            $naam = $_POST["naam"];
            $soort = $_POST["soort"];
            $beschrijving = $_POST["beschrijving"];
            $prijs = $_POST["prijs"];
            $stad = $_POST["stad"];
            $postcode = $_POST["postcode"];
            $poster = $_SESSION["unique_id"];
            $date = date("Y-m-d G:i:s");
            //foto
            $targetDir = "../images/posts/";
            $fileName = basename($_FILES["afbeelding"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES["afbeelding"]["tmp_name"], $targetFilePath)) {
                    $sql = "INSERT INTO tblgoedkeuring (volgnummer,foto,soort,beschrijvingPost,poster,datum,likes,zoekertje,prijs,stad,postcode, id_user) 
                        VALUES (null,'" . $fileName . "','" . $soort . "','" . $beschrijving . "','" . $poster . "','" . $date . "',0,false,'" . $prijs . "','" . $stad . "','" . $postcode . "','" . $_SESSION["user_id"] . "')";
                    //$counter++;
                    if ($mysqli->query($sql)) {
                        $counter++;
                        $sql2 = "UPDATE users SET counter = {$counter} WHERE unique_id = {$_SESSION['unique_id']}";
                        $resultaat = $mysqli->query($sql2);
                        header("Location: ../account/approval.php");


                    } else {
                        print $sql;
                        print $mysqli->error;
                    }
                }
            }

        }else if ($row["subscription_id"] === '3' &&  $counter < '15'){
            $naam = $_POST["naam"];
            $soort = $_POST["soort"];
            $beschrijving = $_POST["beschrijving"];
            $prijs = $_POST["prijs"];
            $stad = $_POST["stad"];
            $postcode = $_POST["postcode"];

            $poster = $_SESSION["unique_id"];
            $date = date("Y-m-d G:i:s");


            //foto
            $targetDir = "../images/posts/";
            $fileName = basename($_FILES["afbeelding"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES["afbeelding"]["tmp_name"], $targetFilePath)) {
                    $sql = "INSERT INTO tblgoedkeuring (volgnummer,foto,soort,beschrijvingPost,poster,datum,likes,zoekertje,prijs,stad,postcode, id_user) 
                        VALUES (null,'" . $fileName . "','" . $soort . "','" . $beschrijving . "','" . $poster . "','" . $date . "',0,false,'" . $prijs . "','" . $stad . "','" . $postcode . "','" . $_SESSION["user_id"] . "')";
                    //$counter++;
                    if ($mysqli->query($sql)) {
                        $counter++;
                        $sql2 = "UPDATE users SET counter = {$counter} WHERE unique_id = {$_SESSION['unique_id']}";
                        $resultaat = $mysqli->query($sql2);
                        header("Location: ../account/approval.php");


                    } else {
                        print $sql;
                        print $mysqli->error;
                    }
                }
            }

        } else {
            print '<script> 
                    alert("You do not have any posts. Renew your subscription or remove a post to proceed!");
                    </script>';
        }

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>


<?php include_once "../header.php"; ?>
<link rel="stylesheet" href="../style.css">
<body>
<div class="wrapper">
    <section class="form signup">
        <header>Add Item |        <a href="../index1.php" class="logout" style="color: black">Home</a>
        </header>
        <form action="toevoegen.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="field input">
                    <label>Name</label>
                    <input type="text" name="naam" placeholder="" required>
            </div>
                <div class="field input">
                <label>Type</label>
                <input type="text" name="soort" placeholder="T-shirt, sneaker, broek,..." required>
                </div>
            <div class="field input">
                <label>Description</label>
                <input type="text" name="beschrijving" placeholder="" required>
            </div>
            <div class="field input">
                <label>Price</label>
                <input type="text" name="prijs" placeholder="" required>
            </div>
            <div class="name-details">
            <div class="field input">
                <label>City</label>
                <input type="text" name="stad" placeholder="" required>
            </div>
            <div class="field input">
                <label>ZIP code</label>
                <input type="text" name="postcode" placeholder="" required>
            </div>
            </div>
            <div class="field image">
                <label>Select Image</label>
                <input type="file" name="afbeelding" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
            </div>
            <div class="field button">
                <input type="submit" name="knopje" value="Voeg toe">
            </div>
        </form>
    </section>
</div>
</body>
</html>


<!-- Js Plugins -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.nice-select.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/jquery.slicknav.js"></script>
<script src="../js/mixitup.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/main.js"></script>


</body>

</html>