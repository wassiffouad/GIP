
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
    <link rel="stylesheet" href="chatstyle.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<body>
    <div class="wrapper">
      <section class="users">
        <header>
          <div class="content">
            <?php
            print '<img src="uploads/' . $_SESSION["gebruiker"]["Profielfoto"] . '" alt="">';
            ?>
            <div class="details">
                <span>Wassif Fouad</span>
                <p>Active now</p>
            </div>
          </div>
          <a href="#" class="logout">Logout</a>
        </header>
        <div class="search">
          <span class="text">Select a user</span>
          <input type="text" placeholder="Enter name to search">
          <button type="button"><i class="fas fa-search"></i>S</button>
        </div>
        <div class="users-list">
          <a href="#">
            <div class="content">
              <?php
              print '<img src="uploads/' . $_SESSION["gebruiker"]["Profielfoto"] . '" alt="">';
              ?>
              <div class="details">
                  <span>Wassif Fouad</span>
                  <p>This is a test message</p>
              </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
          </a>
          <a href="#">
            <div class="content">
              <?php
              print '<img src="uploads/' . $_SESSION["gebruiker"]["Profielfoto"] . '" alt="">';
              ?>
              <div class="details">
                  <span>Wassif Fouad</span>
                  <p>This is a test message</p>
              </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
          </a>
          <a href="#">
            <div class="content">
              <?php
              print '<img src="uploads/' . $_SESSION["gebruiker"]["Profielfoto"] . '" alt="">';
              ?>
              <div class="details">
                  <span>Wassif Fouad</span>
                  <p>This is a test message</p>
              </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
          </a>
          <a href="#">
            <div class="content">
              <?php
              print '<img src="uploads/' . $_SESSION["gebruiker"]["Profielfoto"] . '" alt="">';
              ?>
              <div class="details">
                  <span>Wassif Fouad</span>
                  <p>This is a test message</p>
              </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
          </a>
        </div>


      </section>
    </div>
 <script  src="js/users.js" type="text/javascript"></script>
</body>
</html>
