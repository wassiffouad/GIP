<?php
session_start();
include "../connect.php";
include "../config.php";
$resultaat = $mysqli->query("SELECT * FROM tblgoedkeuring WHERE id_user = ". $_GET['teaccepteer']);
    $row = $resultaat->fetch_assoc();


$foto = $row["foto"];
$soort = $row["soort"];
$beschrijving = $row["beschrijvingPost"];
$prijs = $row["prijs"];
$stad = $row["stad"];
$postcode = $row["postcode"];
$poster = $_SESSION["unique_id"];
$date = date("Y-m-d G:i:s");
$likes = $row["likes"];
$zoekertje = $row["zoekertje"];
$id_user  = $row["id_user"];

$sql2 = "INSERT INTO tblposts (volgnummer,foto,soort,beschrijvingPost,poster,datum,likes,zoekertje,prijs,stad,postcode, id_user) 
                        VALUES (null,'" . $foto . "','" . $soort . "','" . $beschrijving . "','" . $poster . "','" . $date . "',0,false,'" . $prijs . "','" . $stad . "','" . $postcode . "','" . $id_user . "')";

if ($mysqli->query($sql2)) {
    $sql3 = "DELETE FROM tblgoedkeuring WHERE volgnummer = " . $row["volgnummer"];
    $resultaat1 = $mysqli->query($sql3);
    header("Location: index1.php");

} else {
    print $sql2;
    print '<br>';
    print $mysqli->error;
}
?>
