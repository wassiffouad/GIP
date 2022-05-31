<?php
include "hoofding.php";

$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
}




    if ($_SERVER['REQUEST_METHOD'] == "POST"){
            //echo "<pre>";
            //print_r($_POST);
            //print_r($_FILES);
            //echo "</pre>";


            if (isset($_FILES["file"]["name"]) && $_FILES["file"]["name"] != ""){
                $img_name = $_FILES['file']['name'];
                $img_type = $_FILES['file']['type'];
                $tmp_name = $_FILES['file']['tmp_name'];

                $img_explode = explode('.',$img_name);
                $img_ext = end($img_explode);
                $extensions = ["jpeg", "png", "jpg"];
                if(in_array($img_ext, $extensions) === true) {
                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if(in_array($img_type, $types) === true) {
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name,"../php/images/".$new_img_name)) {
                            $sql = "UPDATE users SET img = '" . $new_img_name ."' WHERE unique_id = '{$_SESSION['unique_id']}'";
                            $resultaat = $mysqli->query($sql);

                            header("Location: account.php");
                        }

                    }
                }

            }else{
                echo '<div class="alert alert-danger" style=" text-align: center;"   role="alert">
                      Please add a valid image
                      </div>';
            }
    }


?>

<div class="container">
    <div class="row">
        <div class="col-md-3 ">

            <div class="list-group ">
                <a href="account.php" class="list-group-item list-group-item-action">Info</a>
                <?php
                if ($row["admin"] === '1'){
                    print ' <a href="gebruikers.php" class="list-group-item list-group-item-action">User Management</a>
                            <a href="approval_posts" class="list-group-item list-group-item-action">Approval Posts</a>
                            <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                            <a href="../post_toevoegen/toevoegen.php" class="list-group-item list-group-item-action">Post Item</a>
                            <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                            <a href="remove_posts.php" class="list-group-item list-group-item-action">Remove Posts</a>
                            <a href="edit_posts.php" class="list-group-item list-group-item-action">Edit Posts</a>
                            <a href="profielfoto.php" class="list-group-item list-group-item-action active">Edit Profile Picture</a>';
                }else if ($row["subscription_id"] > '0'){
                    print '        
                            <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                            <a href="../post_toevoegen/toevoegen.php" class="list-group-item list-group-item-action">Post Item</a>
                            <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                            <a href="remove_posts.php" class="list-group-item list-group-item-action ">Remove Posts</a>
                            <a href="edit_posts.php" class="list-group-item list-group-item-action">Edit Posts</a>
                            <a href="profielfoto.php" class="list-group-item list-group-item-action active">Edit Profile Picture</a>';
                } else{
                    print '
                           <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                           <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                           <a href="profielfoto.php" class="list-group-item list-group-item-action active">Edit Profile Picture</a>
                           ';
                }
                ?>
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
                            <form method="post" action="profielfoto.php" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label  class="col-4 col-form-label">Select Image</label>
                                    <div class="col-8">
                                        <input type="file" name="file">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button id="post" name="knop" type="submit" class="btn btn-primary">Change Profile Picture</button>
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



