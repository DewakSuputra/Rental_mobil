<?php
session_start();


if(isset($_SESSION["login"]) ){
    echo "<script>document.location.href = '../index.php';</script>";
    exit;
}

require "../../admin/functions.php"; ?>

<?php
if (isset($_POST["login"])) {
  $yourEmail = $_POST["your-email"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE your_email = '$yourEmail'");

  if (mysqli_num_rows($result) === 1) {

    //cek password 
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["pwd_user"])) {

      //set session 
      $_SESSION["login"] = true;
      
      echo "<script>document.location.href = '../index.php';</script>";
      exit;
    }
  }

  $error = true; 

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
</head>

<body>

  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100 w-50">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 w-100">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log in</p>


                  <form class="mx-auto mx-md-8" action="" method="post">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" name="your-email" id="form3Example3c" class="form-control" />
                        <label class="form-label" for="form3Example3c">Your Email</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="password" id="form3Example4c" class="form-control" />
                        <label class="form-label" for="form3Example4c">Password</label>
                      </div>
                    </div>

                    <!-- <div class="form-check d-flex justify-content-center mb-5">
                      <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                      <label class="form-check-label" for="form2Example3">
                        I agree all statements in <a href="#!">Terms of service</a>
                      </label>
                    </div> -->

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <p>Not Have Account? <a href="register.php">Register</a></p>

                    </div>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" name="login" class="btn btn-primary btn-lg">Login</button>
                    </div>

                  </form>

                </div>
                <!-- <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2 ">

                  <img src="2144806.jpg" class="img-fluid mx-auto" alt="Sample image" style="height: 300px; width: 300px;">

                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
</body>

</html>