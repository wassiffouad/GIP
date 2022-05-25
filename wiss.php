<?php

include "connect.php";
include "php/config.php";

$sql = "DELETE FROM tblposts WHERE volgnummer = " . $_GET["tewissen"];
if ($mysqli->query($sql) === TRUE) {
    header("Location: remove_posts.php");
} else {
    echo "ERROR" . $mysqli->error;
}
$mysqli->close();

?>