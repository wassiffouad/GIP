<?php include "hoofding.php"?>

<div class="container">
    <div class="row">
        <div class="col-md-3 ">
            <div class="list-group ">
                <a href="account.php" class="list-group-item list-group-item-action active">Info</a>
                <?php
                if ($row["admin"] === '1'){
                    print ' <a href="gebruikers.php" class="list-group-item list-group-item-action">User Management</a>
                            <a href="approval_posts.php" class="list-group-item list-group-item-action">Approval Posts</a>
                            <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                            <a href="../post_toevoegen/toevoegen.php" class="list-group-item list-group-item-action">Post Item</a>
                            <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                            <a href="remove_posts.php" class="list-group-item list-group-item-action">Remove Posts</a>
                            <a href="edit_posts.php" class="list-group-item list-group-item-action">Edit Posts</a>
                            <a href="profielfoto.php" class="list-group-item list-group-item-action">Edit Profile Picture</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete Account</button>';

                }else if ($row["subscription_id"] > '0'){
                    print '        
                            <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                            <a href="toevoegen.php" class="list-group-item list-group-item-action">Post Item</a>
                            <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                            <a href="remove_posts.php" class="list-group-item list-group-item-action">Remove Posts</a>
                            <a href="edit_posts.php" class="list-group-item list-group-item-action">Edit Posts</a>
                            <a href="profielfoto.php" class="list-group-item list-group-item-action">Edit Profile Picture</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete Account</button>';
                } else{
                    print '
                           <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                           <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                           <a href="profielfoto.php" class="list-group-item list-group-item-action">Edit Profile Picture</a>
                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete Account</button>
                           ';
                }
                ?>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are u sure u want to delete your account?<br>
                                There is no going back from here!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger"><a href="verwijder_account.php?tewissen='<?php  $row["unique_id"]  ?>'" style="text-decoration: none; color: white">Delete Account</a></button>
                            </div>
                        </div>
                    </div>
                </div>
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

                                <div class="form-group row">
                                        <label for="profile picture" class="col-4 col-form-label">Profile picture</label>
                                        <div class="col-8">
                                            <img style="height: 300px; width: 300px;" src="../php/images/<?php echo $row['img']; ?>" alt=""><br>
                                            <?php
                                            print'
                                            <a   href="profielfoto.php?page=' . $page . '" role="button">Change profile picture</a>'
                                            ?>
                                        </div>


                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">First Name</label>
                                    <div class="col-8">
                                        <?php
                                        print "<p>" . $row["fname"]. "</p>";
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastname" class="col-4 col-form-label">Last Name</label>
                                    <div class="col-8">
                                        <?php
                                        print "<p>" . $row["lname"]. "</p>";
                                        ?>
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email</label>
                                <div class="col-8">
                                    <?php
                                    print "<p>" . $row["email"]. "</p>";
                                    ?>
                                </div>
                            </div>
                                <div class="form-group row">
                                    <label for="select" class="col-4 col-form-label">Type</label>
                                    <div class="col-8">
                                        <?php
                                        if ($row["admin"] === '1'){
                                            print '<select id="select" name="select" class="custom-select">
                                                        <option value="admin">Admin</option>
                                                    </select>';
                                        } else{
                                            print '<select id="select" name="select" class="custom-select">
                                                        <option value="customer">Customer</option>
                                                    </select>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <?php
                                        if ($row["admin"] === '1'){
                                            print '<p><a class="btn btn-primary" href="gebruikers.php">Go to admin page</a></p>';
                                        }
                                        ?>
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