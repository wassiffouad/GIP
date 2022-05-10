
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
      <section class="chat-area">
        <header>
          <a href="#" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <?php
            print '<img src="uploads/' . $_SESSION["gebruiker"]["Profielfoto"] . '" alt="">';
            ?>
            <div class="details">
                <span>Wassif Fouad</span>
                <p>Active now</p>
            </div>

        </header>
        <div class="chat-box">
          <div class="chat outgoing">
            <div class="details">
              <p>ewa strijders mijn naam is wassif</p>
            </div>
          </div>
          <div class="chat incoming">
            <div class="details">
              <p>ewa strijders mijn naam is wassif</p>
            </div>
          </div>
          <div class="chat outgoing">
            <div class="details">
              <p>ewa strijders mijn naam is wassif</p>
            </div>
          </div>
          <div class="chat incoming">
            <div class="details">
              <p>ewa strijders mijn naam is wassif</p>
            </div>
          </div>
          <div class="chat outgoing">
            <div class="details">
              <p>ewa strijders mijn naam is wassif</p>
            </div>
          </div>
          <div class="chat incoming">
            <div class="details">
              <p>ewa strijders mijn naam is wassif</p>
            </div>
          </div>
        </div>
        <form class="typing-area" action="index.html" method="post">
          <input type="text" placeholder="Type a message here..">
          <button type="button"><i class="fab fa-telegram"></i>S</button>

        </form>
      </section>


</body>
</html>
