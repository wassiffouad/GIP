<?php
include "hoofding.php";
?>

    <style>
        .pagination {
            display: inline-block;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #ddd;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        .pagination a:hover:not(.active) {background-color: cornflowerblue;}

        .pagination a:first-child {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .pagination a:last-child {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }
    </style>
</head>

<body>

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
                            <a href="remove_posts.php" class="list-group-item list-group-item-action active">Remove Posts</a>
                            <a href="edit_posts.php" class="list-group-item list-group-item-action">Edit Posts</a>
                            <a href="profielfoto.php" class="list-group-item list-group-item-action">Edit Profile Picture</a>';
                }else if ($row["subscription_id"] > '0'){
                    print '        
                            <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                            <a href="../post_toevoegen/toevoegen.php" class="list-group-item list-group-item-action">Post Item</a>
                            <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                            <a href="remove_posts.php" class="list-group-item list-group-item-action active">Remove Posts</a>
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
                            <?php
                            $sql = "SELECT * FROM users";
                            $resultaat = $mysqli->query($sql);
                            //aantal paginas
                            $results_per_page = 2;

                            // aantal in databank
                            $sql7 = "SELECT * FROM tblposts";
                            $result = mysqli_query($conn, $sql7);
                            $number_of_results = mysqli_num_rows($result);

                            //aantal paginas beschikbaar
                            $number_of_pages = ceil($number_of_results/$results_per_page);

                            //op welke pagina momenteel
                            if (!isset($_GET["page"])){
                                $page = 1;
                            } else {
                                $page = $_GET["page"];
                            }

                            //limit starting number
                            $this_page_first_result =  ($page-1)*$results_per_page;

                            //neem geselecteerde resultaten van database en toon op pagina
                            $sql9 = "SELECT * FROM tblposts WHERE poster = " . $_SESSION["unique_id"] . " LIMIT " . $this_page_first_result . ',' . $results_per_page;
                            $result = mysqli_query($conn, $sql9);
                            while ($row = $result->fetch_assoc()){
                                print '
                                        <div class="card" style="width: 18rem; display: inline-block;">
                                          <div class="card-body">
                                            <h5 class="card-title">'. $row["soort"]. '</h5>
                                            <p class="card-text">€ '. $row["prijs"]. '</p>
                                            <p class="card-text">'. $row["datum"]. '</p>
                                        ';

                                print '
                                            <a href="wiss.php?tewissen='. $row["volgnummer"] . '" class="btn btn-danger">Remove</a>
                                            ';
                                print '
                                            
                                          </div>
                                        </div>
                                     
                                           
                                        ';
                            }
                            ?>
                        </div>

                        <?php
                        print '<div class="pagination">';
                        for ($page=1;$page<=$number_of_pages;$page++){

                            echo '
                       
                            <a href="remove_posts.php.?page=' .$page . '">' .$page . '</a>';
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