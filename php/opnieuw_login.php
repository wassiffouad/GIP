<?php 
  session_start();
  include "connect.php";
  $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
  if(mysqli_num_rows($sql) > 0){
      $row = mysqli_fetch_assoc($sql);
  }
  include_once "header.php";
  print '
            <body>
              <div class="wrapper">
                <section class="form signup">
                  <header>Sign up </header>
                  <form action="opnieuw_login.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="error-text"></div>
                    <div class="name-details">
                      <div class="field input">
                        <label>Account was made succesfully!</label>
                       </div>
                    </div>
                    <div class="field button">
                      <a href="php/logout.php?logout_id=' . $row['unique_id'] .'" class="logout">Logout |</a>
                    </div>
                  </form>
                </section>
              </div>
            
              <script src="js/pass-show-hide.js"></script>
              <script src="js/signup.js"></script>
            
            </body>
            </html>
           ';
?>