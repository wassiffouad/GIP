<?php
    include "../connect.php";
    session_start();



        $sql = "UPDATE tblgebruikers SET status = '0' WHERE volgnummer = " . $_SESSION["gebruiker"]["volgnummer"];
        print $sql;

        if (!$resultaat = $mysqli->query($sql)) {
            print $mysqli->error;
        } else {

            session_destroy();
            header("Location: index.php");

        }

?>