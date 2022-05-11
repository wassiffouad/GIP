<?php
include "php/config.php";
session_start();
if (isset($_GET['page'])) {
    $_SESSION['page'] = $_GET['page'];
}

if ($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_FILES['image']['name']) && $_FILES['profielfoto']['name'] != "") {
        $filename = $_FILES['profielfoto']['name'];
        $img_info = getimagesize($_FILES['profielfoto']['tmp_name']);
        $dst = "uploads/" . $filename;

        $width = $img_info[0];
        $height = $img_info[1];

        $nwidth = 1080;
        $nheight = 1080;


        switch ($img_info[2]) {
            case IMAGETYPE_GIF  :
                $src = imagecreatefromgif($_FILES['profielfoto']['tmp_name']);
                break;
            case IMAGETYPE_JPEG :
                $src = imagecreatefromjpeg($_FILES['profielfoto']['tmp_name']);
                break;
            case IMAGETYPE_PNG  :
                $src = imagecreatefrompng($_FILES['profielfoto']['tmp_name']);
                break;
            default :
                die("Unknown filetype");
        }

        $tmp = imagecreatetruecolor($width, $height);
        $tmp = imagescale($src,1080,1080);
        //imagecopyresampled($tmp, $src, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
        move_uploaded_file(imagejpeg($tmp, $dst), "uploads/" . $filename);

        if (file_exists("uploads/" . $filename)) {
            $query = "update tblgebruikers set profielFoto = '$filename' where volgnummer =" . $_SESSION["gebruiker"]["volgnummer"];
            $mysqli->query($query);
            $page = $_SESSION['page'];
            $_SESSION['page'] = "";
            $_SESSION['gebruiker']['Profielfoto'] = $filename;
            header(("Location:" . $page));
            die;
        }
    }
} else {
    print "error1";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script type="text/javascript" src="js-old/script.js"></script>
</head>
<body onbeforeunload="session_destroy()">
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
    <section>
        <div class="feature-photo">
            <figure><img src="img/breadcrumb.jpg" alt=""></figure>
            <div class="container-fluid">
                <div class="col-lg-10 col-sm-9" style="font-size: 15px;">
                    <div class="timeline-info">
                    </div>
                    <form method="post" enctype="multipart/form-data" action="profielfoto.php">
                        <div style="border: solid thin #aaa; padding: 10px; background-color: white;">
                            <input type="file" name="profielfoto">
                            <input id="post" type="submit" value="Verander" style="float:right;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
</section><!-- top area -->

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="js-old/main.min.js"></script>
<script src="js-old/script.js"></script>
<script src="js-old/map-init.js"></script>
<script src="js/main.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>

</body>
</html>