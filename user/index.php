<?php
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
  header("location:apps/login/login.php");
}
require "../functions.php";
$tampilPeg    = mysqli_query($conn, "SELECT * FROM tbl_siswa WHERE nopen='$_SESSION[nopen]'");
$peg    = mysqli_fetch_array($tampilPeg);
$siswa = $peg["id_siswa"];
$semuaruangan = mysqli_query($conn, "SELECT * FROM tbl_ruangan INNER JOIN tbl_kelas ON tbl_ruangan.id_kelas=tbl_kelas.id_kelas WHERE id_siswa='$siswa'");
$kelas = mysqli_fetch_assoc($semuaruangan);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <!-- <link rel="icon" type="image/png" href="./assets/img/favicon.png"> -->
  <title>
    SMP HARAPAN BANUA
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <!-- css me -->
  <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" ">
        <img src="assets/img/logo-smp.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">SMP Harapan Banua</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>

          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="apps/user/index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Informasi</span>
          </a>
        </li>
      </ul>
    </div>

  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <h6 class="font-weight-bolder mb-0">Dashboard</h6>
          </ol>

          <h6 class="nama">Selamat Datang <?php echo $peg["namasiswa"] ?> </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">

            <ul class="navbar-nav  justify-content-end">
              <li class="nav-item d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                  <a href="apps/user/edituser.php?e=<?php echo $peg['nisn'] ?>"><i class="fa fa-user me-sm-1"></i></a>
                  <span class="d-sm-inline d-none"><a href="apps/login/logout.php">Log Out</a> </span>
                </a>
              </li>
              <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <?php if ($peg["statustes"] == 'Gagal') { ?>
          <p class="tidak_lulus">Mohon maaf anda tidak bisa melanjutkan ketahap berikutnya karena di nyatakan tidak lulus tes..</p>
        <?php } else { ?>
          <?php if ($peg["statusdaftarulang"] == 'Belum' && $peg["statusakhir"] == 'Belum') { ?>
            <?php if ($peg["statusreg"] == 'Berhasil' && $peg["statustes"] == 'Belum') { ?>
              <p class="lulus"></p>
              <p class="lulus">Silahkan masuk ke halaman informasi untuk membaca tahapan PPDB selajutnya atur profiel kalian dengan klik icon orang ,lalu <a href="apps/user/cetak.php?c=<?php echo $peg['nisn'] ?>" target="_blank">download</a> kartu ujian</p>
            <?php } else { ?>
              <p class="lulus">Selamat anda bisa melanjutkan ketahap berikutnya karena di nyatakan lulus tes..</p>
              <p class="lulus">Silahkan daftar ulang pada link ini <a href="apps/user/daftarulang.php?nisn=<?php echo $peg['nisn'] ?>" class="daftar_ulang">daftar</a> Sebelum daftar ulang silahkan baca informasi di bagian icon Informasi</p>
            <?php } ?>
          <?php } else if ($peg["statusdaftarulang"] == 'Berhasil' && $peg["statusakhir"] == 'Belum') { ?>
            <p class="lulus">Selamat daftar ulang anda berhasil silahkan tunggu hasil akhir..</p>
          <?php } else if ($peg["statusdaftarulang"] == 'Berhasil' && $peg["statusakhir"] == 'Lulus') { ?>
            <p class="lulus">Selamat anda di nyatakan lulus di SMP Harapan Banua Di Kelas <?php echo strtoupper($kelas["kelas"])  ?>..</p>
            <p class="lulus">Silahkan datang kesekolahan untuk konfirmasi dan membayar daftar ulang</p>
          <?php } else { ?>
            <p class="tidak_lulus">Mohon maaf anda tidak di terima di SMP HARAPAN BANUA..</p>
            <p class="lulus">Tetap Semangatt!!</p>
          <?php } ?>
        <?php } ?>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Status</p>
                <h4 class="mb-0">Regestrasi</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <?php if ($peg["statusreg"] == 'Berhasil') {
              ?>
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><?php echo $peg["statusreg"] ?></span></p>
              <?php
              } else {
              ?>
                <p class="mb-0"><span class="non text-sm font-weight-bolder" style="color:red;"><?php echo $peg["statusreg"] ?></span></p>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <?php if ($peg["statustes"] == 'Gagal') { ?>
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">person</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Status</p>
                  <h4 class="mb-0">Hasil Tes</h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <?php if ($peg["statustes"] == 'Lulus') { ?>
                  <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><?php echo $peg["statustes"] ?></span></p>
                <?php } else { ?>
                  <p class="mb-0"><span class="non text-sm font-weight-bolder"><?php echo $peg["statustes"] ?></span></p>
                <?php }  ?>
              </div>
            </div>
          <?php } else { ?>
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">person</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Status</p>
                  <h4 class="mb-0">Hasil Tes</h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <?php if ($peg["statustes"] == 'Lulus') { ?>
                  <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><?php echo $peg["statustes"] ?></span></p>
                <?php } else { ?>
                  <p class="mb-0"><span class="non text-sm font-weight-bolder"><?php echo $peg["statustes"] ?></span></p>
                <?php }  ?>
              </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Status</p>
                <h4 class="mb-0">Daftar Ulang</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <?php if ($peg["statusdaftarulang"] == 'Berhasil') { ?>
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><?php echo $peg["statusdaftarulang"] ?></span></p>
              <?php } else { ?>
                <p class="mb-0"><span class="non text-sm font-weight-bolder"><?php echo $peg["statusdaftarulang"] ?></span></p>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Status</p>
                <h4 class="mb-0">Kelulusan</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <?php if ($peg["statusakhir"] == 'Lulus') { ?>
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><?php echo $peg["statusakhir"] ?></span></p>
              <?php } else { ?>
                <p class="mb-0"><span class="non text-sm font-weight-bolder"><?php echo $peg["statusakhir"] ?></span></p>
              <?php } ?>

            </div>
          </div>
        <?php } ?>
        </div>
      </div>
      <div class="row">


      </div>


      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.Pendaftaran</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nisn</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Asal Sekolah</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Telepon</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <?php if ($peg["foto"] == NULL) { ?>
                        <img src="assets/img/icondefault.png" alt="" class="avatar avatar-sm me-3 border-radius-lg">
                      <?php } else {  ?>
                        <img src="apps/user/img/<?php echo $peg["foto"] ?>" class="avatar avatar-sm me-3 border-radius-lg" alt=" <?php echo $peg["namasiswa"] ?>">
                      <?php } ?>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm"> <?php echo $peg["namasiswa"] ?></h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0"> <?php echo $peg["nopen"] ?></p>
                </td>

                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold"> <?php echo $peg["nisn"] ?></span>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-success">Online</span>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0"> <?php echo $peg["asalsekolah"] ?></p>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0"> <?php echo $peg["telpon"] ?></p>
                </td>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
    <footer class="footer py-4  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Halis Najibi</a>

            </div>
          </div>

        </div>
      </div>
    </footer>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
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
  <script src="assets/js/material-dashboard.min.js?v=3.0.0"></script>

</body>

</html>