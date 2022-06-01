<?php
include "../connect.php";
include "../php/config.php";
session_start();
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
}

$sql = "DELETE FROM users WHERE unique_id = ".$_SESSION['unique_id'];
if ($mysqli->query($sql) === TRUE){
    $sql3 = "DELETE FROM tblposts WHERE  poster = ".$_SESSION['unique_id'];
    $resultaat = $mysqli->query($sql3);
    unset($_SESSION['unique_id']);
    header("Location:../index.php");
} else {
    echo "ERROR" . $mysqli->error;
}
$mysqli->close();
?>
