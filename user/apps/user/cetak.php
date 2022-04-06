<?php
session_start();
require "../../../functions.php";
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['status'] != "login") {
  header("location:../login/login.php");
}

$nisn = $_GET["c"];
$tampil = tabel("SELECT * FROM tbl_siswa WHERE nisn=$nisn")[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kartu Peserta</title>
  <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
  <div class="container-kartu">
    <header>
      <p class="tes">Kartu Peserta Ujian</p>
    </header>
    <table class="table-cetak" border="1px" cellspacing="0px" cellpadding="5px" width="100%">
      <tr>
        <td rowspan="5"><img src="img/<?php echo $tampil["foto"] ?>" alt="" class="img-kartu"></td>
        <td>Asal Sekolah</td>
        <td><?php echo $tampil["asalsekolah"]; ?></td>
      </tr>
      <tr>
        <td>Nama Siswa</td>
        <td><?php echo $tampil["namasiswa"]; ?></td>
      </tr>
      <tr>
        <td>Nisn</td>
        <td><?php echo $tampil["nisn"]; ?></td>
      </tr>
      <tr>
        <td>Tempat /Tanggal Lahir</td>
        <td><?php echo $tampil["tempat_lahir"]; ?> <?php echo indotgl($tampil["tanggal_lahir"]); ?></td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td><?php echo strtoupper($tampil["jk"]) ; ?></td>
      </tr>
      <tr>
        <td colspan="2" class="nopen">Nomer Pendaftaran</td>
        <td class="nopen"><?php echo $tampil["nopen"]; ?></td>
      </tr>
    </table>
    <div class="foter">
      <div class="tulis">
        <p class="panitia">Ketua Panitia</p>
        <p class="ttd">TDT</p>
        <p class="nama">Muhammad Nor Khalis Najibi</p>
        <p class="np">NIP.123456</p>
      </div>
    </div>
  </div>
</body>
<script>
  window.print();
</script>

</html>