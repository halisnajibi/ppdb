<?php
require "../../../functions.php";
if (isset($_POST["simpan"])) {
  if (reg($_POST) > 0) {
    echo "
        <script>
                alert('Berhasil Regestrasi');
                  document.location.href='../user/infoakun.php?n=$_POST[nisn]';
         </script>
            ";
  } else {
    echo "
        <script>
                alert('gagal regestrasi);
         </script>
            ";
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Regestrasi
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
  <main class=" main-content mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class=" container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="sig-up col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Sign Up</h4>
                  <p class="mb-0">Enter your email and password to register</p>
                </div>
                <div class="card-body">
                  <form role="form" action="" method="post">
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" name="nama" placeholder="Nama" autocomplete="off">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" name="nisn" placeholder="Nisn" autocomplete="off">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" name="telpon" placeholder="Telpon" autocomplete="off">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" name="sekolah" placeholder="Asal Sekolah" autocomplete="off">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" name="nilai" placeholder="Nilai Akhir" autocomplete="off">
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="simpan">Sign Up</button>
                    </div>
                    <!-- hidden -->
                    <!-- membuat codingan kode barang otomatis -->
                    <?php
                    // mengambil data barang dengan kode paling besar
                    $query = mysqli_query($conn, "SELECT max(nopen) as kodeTerbesar FROM tbl_siswa");
                    $data = mysqli_fetch_array($query);
                    $kodeBarang = $data['kodeTerbesar'];

                    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                    // dan diubah ke integer dengan (int)
                    $urutan = (int) substr($kodeBarang, 3, 3);

                    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                    $urutan++;

                    // membentuk kode barang baru
                    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
                    // $huruf = "KY";
                    $kode = sprintf("%05s", $urutan);
                    ?>
                    <input type="hidden" name="nopen" value="<?php echo $kode ?>">
                    <!-- <input type="hidden" name="statusReg" value="aktif"> -->
                    <input type="hidden" name="tgl_daftar" value="<?php echo date('Y-m-d'); ?>">
                    <!-- <input type="hidden" name="statusTes" value="belum">
                    <input type="hidden" name="statusDaftarUlang" value="belum">
                    <input type="hidden" name="statusAkhir" value="belum">
                    <input type="hidden" name="alamat" value="alamat"> -->
                    <!-- akhir hidden -->
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Sudah Punya Akun?
                    <a href="login.php" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>