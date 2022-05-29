<?php
include "../connect.php";
include "../php/config.php";

        $sql = "DELETE FROM users WHERE unique_id = ".$_GET["tewissen"];
        if ($mysqli->query($sql) === TRUE){
            $sql3 = "DELETE FROM tblposts WHERE  poster = ".$_GET["tewissen"];
            $resultaat = $mysqli->query($sql3);
            header("Location: gebruikers.php");
        } else {
            echo "ERROR" . $mysqli->error;
        }
        $mysqli->close();
        ?>
