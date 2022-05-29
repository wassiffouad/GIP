<?php
session_start();

    include "../connect.php";
    include "../php/config.php";

    $sql1 = "select * from users";
    $row = $mysqli->query($sql1) -> fetch_assoc();

        $sql = "UPDATE users SET admin = 0 WHERE unique_id = " . $_GET["teverwijderen"];
        if ($mysqli->query($sql) === TRUE) {

            header("Location: gebruikers.php");
        } else {
            echo "ERROR" . $mysqli->error;
        }
        $mysqli->close();

    print "<br><a href='../gebruikers.php'>Go back</a>"
?>

