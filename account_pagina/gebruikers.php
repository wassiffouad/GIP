<?php
include "hoofding.php";
?>
    <style>
        div.pagination {
            display: inline-block;
            padding: 0;
            margin: 0;
        }

        div.pagination a {display: inline;}

        div.pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #dddddd;
        }

        div.pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        div.pagination  a:hover:not(.active) {background-color: cornflowerblue;}

    </style>


<body>
<div class="container">
    <div class="row">
        <div class="col-md-3 ">

            <div class="list-group ">
                <a href="account.php" class="list-group-item list-group-item-action">Info</a>
                <?php
                if ($row["admin"] === '1') {
                    print ' <a href="gebruikers.php" class="list-group-item list-group-item-actio active">User Management</a>
                            <a href="approval_posts" class="list-group-item list-group-item-action ">Approval Posts</a>
                            <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                            <a href="../post_toevoegen/toevoegen.php" class="list-group-item list-group-item-action">Post Item</a>
                            <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                            <a href="remove_posts.php" class="list-group-item list-group-item-action ">Remove Posts</a>
                            <a href="edit_posts.php" class="list-group-item list-group-item-action">Edit Posts</a>
                            <a href="profielfoto.php" class="list-group-item list-group-item-action">Edit Profile Picture</a>
                            <a href="#" class="list-group-item list-group-item-action">****</a>
                            <a href="#" class="list-group-item list-group-item-action">****</a>
                            <a href="#" class="list-group-item list-group-item-action">****</a>
                            ';
                } else if ($row["subscription_id"] > '0') {
                    print '        
                            <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                            <a href="../post_toevoegen/toevoegen.php" class="list-group-item list-group-item-action">Post Item</a>
                            <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                            <a href="remove_posts.php" class="list-group-item list-group-item-action active">Remove Posts</a>
                            <a href="edit_posts.php" class="list-group-item list-group-item-action">Edit Posts</a>
                            <a href="profielfoto.php" class="list-group-item list-group-item-action">Edit Profile Picture</a>
                            <a href="#" class="list-group-item list-group-item-action">****</a>
                            <a href="#" class="list-group-item list-group-item-action">****</a>
                            <a href="#" class="list-group-item list-group-item-action">****</a>';
                } else {
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
                            <?php
                            include "../connect.php";
                            //aantal paginas
                            $results_per_page = 2;

                            // aantal in databank
                            $sql7 = "SELECT * FROM users";
                            $result = mysqli_query($conn, $sql7);
                            $number_of_results = mysqli_num_rows($result);

                            //aantal paginas beschikbaar
                            $number_of_pages = ceil($number_of_results / $results_per_page);

                            //op welke pagina momenteel
                            if (!isset($_GET["page"])) {
                                $page = 1;
                            } else {
                                $page = $_GET["page"];
                            }

                            //limit starting number
                            $this_page_first_result = ($page - 1) * $results_per_page;

                            //neem geselecteerde resultaten van database en toon op pagina
                            $sql9 = "SELECT * FROM users WHERE user_id != 1 LIMIT " . $this_page_first_result . ',' . $results_per_page;
                            $result = mysqli_query($conn, $sql9);
                            while ($row = $result->fetch_assoc()) {
                                print '
                                        <div class="card" style="width: 18rem; display: inline-block;">
                                          <img class="card-img-top" style="height: 286px; width: 286px;" src="../php/images/' . $row["img"] . '"">
                                          <div class="card-body">
                                            <h5 class="card-title">' . $row["lname"] . ' ' . $row["fname"] . '</h5>
                                            <p class="card-text">' . $row["email"] . '</p>
                                        ';
                                if ($row["admin"] === '1') {
                                    print ' <p class="card-text">Admin</p>';
                                } else {
                                    print '<p class="card-text">Customer</p>';
                                }

                                print '
                                            <a href="wis.php?tewissen=' . $row["unique_id"] . '" class="btn btn-danger">Remove</a>
                                            ';
                                if ($row["admin"] === '1') {
                                    print ' <a href="admin.php?teverwijderen=' . $row["unique_id"] . '" class="btn btn-danger">Remove Admin</a>';
                                } else {
                                    print '<a href="admin1.php?teverwijder=' . $row["unique_id"] . '" class="btn btn-success">Make Admin</a>';
                                }
                                print '
                                            
                                          </div>
                                        </div>
                                     
                                           
                                        ';
                            }
                            ?>
                        </div>
                        <?php
                        print '<br>
                                <div class="pagination" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">';
                        for ($page = 1; $page <= $number_of_pages; $page++) {

                            echo '<a href="gebruikers.php.?page=' . $page . '">' . $page . '</a>';
                        }
                        print '</div>'
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>