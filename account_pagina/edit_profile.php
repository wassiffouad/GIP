<?php
include "hoofding.php";
include "../connect.php";
$page = $_SERVER['REQUEST_URI'];
include "../php/config.php";


if (isset($_POST["knop"])) {
    $voornaam = $_POST["voornaam"];
    $naam = $_POST["naam"];
    $email = $_POST["email"];

    $sql = "UPDATE users
        SET fname ='" . $voornaam . "', lname ='" . $naam . "',email ='" . $email  . "'WHERE unique_id =" . $_SESSION['unique_id'];

    $resultaat = $mysqli->query($sql);
    $row["fname"] = $voornaam;
    $row["lname"] = $naam;
    $row["email"] = $email;
    header("Location: account.php");

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
                            <a href="edit_profile.php" class="list-group-item list-group-item-action active">Edit Profile</a>
                            <a href="remove_posts.php" class="list-group-item list-group-item-action">Remove Posts</a>
                            <a href="edit_posts.php" class="list-group-item list-group-item-action">Edit Posts</a>
                            <a href="profielfoto.php" class="list-group-item list-group-item-action">Edit Profile Picture</a>';
                }else if ($row["subscription_id"] > '0'){
                    print '        
                            <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                            <a href="../post_toevoegen/toevoegen.php" class="list-group-item list-group-item-action">Post Item</a>
                            <a href="edit_profile.php" class="list-group-item list-group-item-action active">Edit Profile</a>
                            <a href="remove_posts.php" class="list-group-item list-group-item-action">Remove Posts</a>
                            <a href="edit_posts.php" class="list-group-item list-group-item-action">Edit Posts</a>
                            <a href="profielfoto.php" class="list-group-item list-group-item-action">Edit Profile Picture</a>';
                } else{
                    print '
                           <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                           <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                           <a href="profielfoto.php" class="list-group-item list-group-item-action">Edit Profile Picture</a>
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
                            <form method="post" action="edit_profile.php" autocomplete="off">
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">First Name</label>
                                    <div class="col-8">
                                        <input id="name" name="voornaam" placeholder="First Name" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastname" class="col-4 col-form-label">Last Name</label>
                                    <div class="col-8">
                                        <input id="lastname" name="naam" placeholder="Last Name" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Email</label>
                                    <div class="col-8">
                                        <input id="email" name="email" placeholder="Email" class="form-control here" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="knop" type="submit" class="btn btn-primary">Update My Profile</button>
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