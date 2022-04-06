<?php
session_start();
// if (isset($_SESSION["login"])) {
//   header("Location:../../index.php");
//   exit;
// }
require "../../../functions.php";
//ambil data yang dikirm
if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $pass = $_POST["pass"];

  //cek data apa sesaui sama db
  $query = mysqli_query($conn, "SELECT * FROM tbl_siswa WHERE nopen='$username' AND telpon='$pass'");
  //cek apakah ada data yang sesuai
  $cek = mysqli_num_rows($query);
  if ($cek > 0) {
    $panggil = mysqli_fetch_assoc($query);
    $_SESSION["username"] = $username;
    $_SESSION["pass"] = $pass;
    $_SESSION["nopen"] = $panggil["nopen"];
    $_SESSION["status"] = "login";
    // alihkan ke halaman dashboard user
    header("location:../../index.php");
  } else {
    header("location:login.php?pesan=gagal");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <!-- <link rel="icon" type="image/png" href="../assets/img/favicon.png"> -->
  <title>
    Login
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/material-dashboard.css?v=3.0.1" rel="stylesheet" />

  <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body id="login">
  <div class="container position-sticky z-index-sticky top-0">
  </div>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('../assets/img/bg.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                 
                </div>
              </div>
              <div class="card-body">
                <p class="pesan">
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
                <form role="form" class="text-start" method="POST">
                  <div class="input-group input-group-outline my-3">
                    <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <input type="password" class="form-control" name="pass" placeholder="Password" autocomplete="off">
                  </div>
                  <!-- <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                  </div> -->
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" name="login">Sign in</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Belum Punya Akun?
                    <a href="regestrasi.php" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart" aria-hidden="true"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">halis najibi</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/material-dashboard.min.js?v=3.0.1"></script>
</body>

</html>