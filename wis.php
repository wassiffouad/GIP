<?php
include "connect.php";
include "php/config.php";

        $sql = "DELETE FROM users WHERE unique_id = ".$_GET["tewissen"];
        if ($mysqli->query($sql) === TRUE){
            header("Location: gebruikers.php");
        } else {
            echo "ERROR" . $mysqli->error;
        }
        $mysqli->close();
        ?>
