<?php
include "../connect.php";
session_start();

if (isset($_POST["knop"])) {
    $sql = "SELECT * FROM tblgebruikers";
    $resultaat = $mysqli->query($sql);
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["naam"];
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];
    $admin = 0;

    if ($_POST["wachtwoord"] != $_POST["2ndWachtwoord"]) {
        print "<a style='color: red'>Wachtwoorden zijn niet gelijk!</a>";
    } else {
        $test = false;
        while ($row = $resultaat->fetch_assoc()) {
            if ($row['naam'] == $_POST['naam'] && $row['voornaam'] == $_POST['voornaam']) {
                $test = true;
            }
        }
        if ($test) {
            print "<a style='color: red'>Gebruiker bestaat al!</a>";
        } else {


            $sql = "INSERT INTO tblgebruikers (naam, voornaam, email, wachtwoord, admin, status) VALUES ('" . $achternaam . "','" . $voornaam . "','" . $email . "','" . $wachtwoord . "','" . $admin. "','1')";

            if ($mysqli->query($sql)) {
                print "U bent succesvol aangemeld!";
                header("index.php");

            } else {
                print "Er is iets fout gegaan tijdens het verwerken van uw gegevens!";
                print "<br>";
                print $sql;
            }
        }
    }
}

print '
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="naam" placeholder="Uw naam"/>
                    </div>
                  </div>
                                                   
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="voornaam" placeholder="Uw voornaam"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" class="form-control" name="email" placeholder="Uw Email" />             
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="wachtwoord" placeholder="Wachtwoord" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" name="2ndWachtwoord" placeholder="Voer wachtwoord opnieuw in"/>
                    </div>
                  </div>
                  

                  
                  
                  <div class="form-check d-flex justify-content-center mb-5">
                    <input
                      class="form-check-input me-2"
                      type="checkbox"
                      value=""
                      id="form2Example3c"
                          />
                    <label class="form-check-label" for="form2Example3">
                        I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="knop" class="btn btn-primary btn-lg">Register</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/draw1.png" class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
'; ?>


