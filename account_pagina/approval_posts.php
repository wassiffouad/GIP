<?php
include "hoofding.php";


$sql2 = mysqli_query($conn, "SELECT * FROM tblposts");
if(mysqli_num_rows($sql2) > 0){
    $row2 = mysqli_fetch_assoc($sql2);
}

?>


<head>
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

        .pagination a:hover:not(.active) {background-color: #ddd;}

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
                            <a href="approval_posts" class="list-group-item list-group-item-action active">Approval Posts</a>
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
                }else if ($row["subscription_id"] > '0'){
                    print '        
                            <a href="wachtwoord.php" class="list-group-item list-group-item-action">Change Password</a>
                            <a href="../post_toevoegen/toevoegen.php" class="list-group-item list-group-item-action">Post Item</a>
                            <a href="edit_profile.php" class="list-group-item list-group-item-action">Edit Profile</a>
                            <a href="remove_posts.php" class="list-group-item list-group-item-action">Remove Posts</a>
                            <a href="edit_posts.php" class="list-group-item list-group-item-action">Edit Posts</a>
                            <a href="profielfoto.php" class="list-group-item list-group-item-action">Edit Profile Picture</a>
                            <a href="#" class="list-group-item list-group-item-action">****</a>
                            <a href="#" class="list-group-item list-group-item-action">****</a>
                            <a href="#" class="list-group-item list-group-item-action">****</a>';
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
                            include "../connect.php";
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
                            $sql9 = "select * from tblgoedkeuring LIMIT " . $this_page_first_result . ' , ' . $results_per_page;
                            $result = mysqli_query($conn, $sql9);




                            while ($row = $result->fetch_assoc()){
                                print '
                                        <div class="card" style="width: 18rem; display: inline-block;">
                                          <div class="card-body">
                                            <img class="card-img-top" style="height: 286px; width: 286px;" src="../images/posts/'. $row["foto"] . '"">
                                            <h5 class="card-title">'. $row["soort"]. '</h5>
                                            <p class="card-text">'. $row["datum"]. '</p>
                                        ';

                                print '
                                            <a href="approve_posts.php?teaccepteer='. $row["id_user"] . '" class="btn btn-success">Approve</a>
                                            <a href="decline_posts.php?teweiger='. $row["volgnummer"] . '" class="btn btn-danger">Decline</a>
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
                        for ($page = 1; $page <= $number_of_pages; $page++) {

                            echo '
                            <a href="approval_posts.php.?page=' . $page . '">' . $page . '</a>';
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