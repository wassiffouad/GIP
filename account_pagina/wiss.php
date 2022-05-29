<?php
session_start();
include "../connect.php";
include "../php/config.php";

$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
    $counter = $row["counter"];
}
$sql = "DELETE FROM tblposts WHERE volgnummer = " . $_GET["tewissen"];
$counter--;
$sql2 = "UPDATE users SET counter = {$counter} WHERE unique_id = {$_SESSION['unique_id']}";
$resultaat = $mysqli->query($sql2);
if ($mysqli->query($sql) === TRUE) {
    header("Location: remove_posts.php");
} else {
    echo "ERROR" . $mysqli->error;
}
$mysqli->close();

?>