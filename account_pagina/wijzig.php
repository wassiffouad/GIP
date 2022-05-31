<?php
include "hoofding.php";



$sql1 = "SELECT * FROM users";
$row = $mysqli->query($sql1) -> fetch_assoc();



if (isset($_POST["knop"])) {
    $naam = $_POST["naam"];
    $beschrijving = $_POST["beschrijving"];
    $prijs = $_POST["prijs"];
    $stad = $_POST["stad"];
    $postcode = $_POST["postcode"];

    $poster = $_SESSION["unique_id"];
    $date = date("Y-m-d G:i:s");


    //foto
    if ($_SERVER['REQUEST_METHOD'] == "POST"){


        if (isset($_FILES["file"]["name"])){
            $img_name = $_FILES['file']['name'];
            $img_type = $_FILES['file']['type'];
            $tmp_name = $_FILES['file']['tmp_name'];



                    if(move_uploaded_file($tmp_name,"images/posts/".$img_name)) {

                        $sql = "UPDATE tblposts SET volgnummer = '0', foto ='" .$img_name . "', soort='" .$naam . "', beschrijvingPost='" .$beschrijving . "', poster='" .$_SESSION["unique_id"] . "', 
                        datum='" .$date . "', likes= '0', zoekertje= 'false',prijs='" .$prijs . "',stad='" .$stad . "', postcode='" .$postcode . "',id_user='" .$_SESSION["user_id"] . "'";
                        $resultaat = $mysqli->query($sql);

                        header("Location: account.php");
                    }




        }else{


            echo '<div class="alert alert-danger" style=" text-align: center;"   role="alert">
                      Please add a valid image
                      </div>';
        }
    }
    //$sql = "UPDATE users
        //SET fname ='" .  . "', lname ='" .  . "',email ='" .   . "'WHERE unique_id =" . $_SESSION['unique_id'];

} else {
    $sql =  "SELECT * FROM tblposts WHERE volgnummer = ".$_GET['tewijzigen'];
    $row1 = $mysqli->query($sql) -> fetch_assoc();

    print '
<div class="container">
    <div class="row">
        <div class="col-md-3 ">

            <div class="list-group ">
                <a href="account.php" class="list-group-item list-group-item-action">Info</a>
                ';
    if ($row["admin"] === '1'){
        print ' <a href="gebruikers.php" class="list-group-item list-group-item-action">User Management</a>
                            <a href="approval_posts" class="list-group-item list-group-item-action">Approval Posts</a>
                            <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                            <a href="../post_toevoegen/toevoegen.php" class="list-group-item list-group-item-action">Post Item</a>
                            <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                            <a href="remove_posts.php" class="list-group-item list-group-item-action">Remove Posts</a>
                            <a href="edit_posts.php" class="list-group-item list-group-item-action active">Edit Posts</a>
                            <a href="profielfoto.php" class="list-group-item list-group-item-action">Edit Profile Picture</a>
                            ';
    }else if ($row["subscription_id"] > '0'){
        print '        
                            <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                            <a href="../post_toevoegen/toevoegen.php" class="list-group-item list-group-item-action">Post Item</a>
                            <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                            <a href="remove_posts.php" class="list-group-item list-group-item-action">Remove Posts</a>
                            <a href="edit_posts.php" class="list-group-item list-group-item-action active">Edit Posts</a>
                            <a href="profielfoto.php" class="list-group-item list-group-item-action">Edit Profile Picture</a>';
    } else{
        print '
                           <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                           <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                           <a href="profielfoto.php" class="list-group-item list-group-item-action">Edit Profile Picture</a>
                           ';

    }
    print '
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Your Profile</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="wijzig.php" autocomplete="off">
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">Type</label>
                                    <div class="col-8">
                                        <input id="name"  name="naam" value="' .$row1["soort"] . '" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="beschrijving" class="col-4 col-form-label">Description</label>
                                    <div class="col-8">
                                        <textarea  rows="5" cols="20" name="beschrijving" value="'.$row1["beschrijvingPost"] . '" class="form-control here" type="text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Price</label>
                                    <div class="col-8">
                                        <input id="prijs" style="width: 60px; " name="prijs" value="'.$row1["prijs"] . '" class="form-control here" type="text">
                                    </div>
                                </div>                                
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">ZIP code</label>
                                    <div class="col-8">
                                        <input id="prijs" style="width: 80px; " name="postcode" value="'.$row1["postcode"] . '" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">City</label>
                                    <div class="col-8">
                                        <input id="prijs" style="width: 100px; " name="stad" value="'.$row1["stad"] . '" class="form-control here" type="text">
                                    </div>
                                </div>                                
                                <div class="form-group row">
                                     <label  class="col-4 col-form-label">Select Image</label>
                                    <div class="col-8">                                     
                                        <input type="file" name="afbeelding" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="knop" type="submit" class="btn btn-primary">Update My Post</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
';
}
?>

