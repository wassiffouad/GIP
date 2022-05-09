
<?php
include "connect.php";
session_start();
$page = $_SERVER['REQUEST_URI']

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
     <meta http-equiv="X-UA-Compatible" content="ie=edge ">
    <title>Page Title</title>
    <link rel="stylesheet" href="css/chatstyle.css" type="text/css">
      <link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css " type="text/css">
</head>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                     <?php
                      print '<img src="uploads/' . $_SESSION["gebruiker"]["Profielfoto"] . '" alt="">';
                      ?>
                    <div class="details">
                        <span>Chatten</span>
                        <p>Active now</p>
                    </div>

                </div>
                <a href="#" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select a user to start chat</span>
                <input type="text" placeholder="Enter name to search"
                <button><i class="fas fa-search"></i> </button>
                <div class="users-list">
                  <a href="#">
                    <div class="content">
                      <?php
                       print '<img src="uploads/' . $_SESSION["gebruiker"]["Profielfoto"] . '" alt="">';
                       ?>
                      <div class="details">
                          <span>Chatten</span>
                          <p>This is test messsage</p>
                      </div>
                    </div>
                      <div class="status-dot"><i class="fas fa-circle"></i></div>
                </a>
            </div>
        </section>
    </div>

</body>
</html>
