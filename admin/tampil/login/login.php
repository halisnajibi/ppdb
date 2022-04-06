<?php
require "../../../functions.php";
session_start();

if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $pass = $_POST["pass"];

  //cek kecocokan db
  $login = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE email='$email' AND pass='$pass'");
  //cek apakah ada yg cocok
  $cek = mysqli_num_rows($login);

  //membuat session
  if ($cek > 0) {
    $_SESSION["login"] = $login;
    $_SESSION["status"] = "status";
    echo "
      <script>
        alert(login berhasil);
      </script>
    ";
    header("location:../../index.php");
  } else {
    header("location:login.php?pesan=gagal");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="../../assets_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../assets_admin/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gradient-success">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="bg-login col-lg-6 d-none d-lg-block ">
                <img class="login" src="../../assets_admin/img/sp.png" alt="">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-primary mb-4">Silahkan Login!</h1>
                    <p>
                      <?php
                      if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "gagal") {
                          echo "
                                                <script>
                                                    alert('Username atau Password Salah!');
                                                </script>
                                            ";
                        }
                      }
                      ?>
                    </p>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." autocomplete="off" name="email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" autocomplete="off" name="pass">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <button type="submit" name="login" class="btn btn-outline-success col-12">Login</button>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../assets_admin/vendor/jquery/jquery.min.js"></script>
  <script src="../../assets_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../assets_admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../assets_admin/js/sb-admin-2.min.js"></script>

</body>

</html>