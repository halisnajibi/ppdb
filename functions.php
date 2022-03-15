<?php
// koneksi
$conn = mysqli_connect("localhost", "root", "", "ppdb");
// if (!$conn) {
//   die("Koneksi gagal: " . mysqli_connect_error());
// }
// echo "Koneksi berhasil";
// mysqli_close($conn);
//
date_default_timezone_set('Asia/Singapore');
// ambil semua isi data tabel
function tabel($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $SemuaData = [];
  while ($Data = mysqli_fetch_assoc($result)) {
    $SemuaData[] = $Data;
  }
  return $SemuaData;
}

// insert regestrasi
function reg($pos)
{
  global $conn;
  $nopen = $pos["nopen"];
  $nama = htmlspecialchars($pos["nama"]);
  $nisn = htmlspecialchars($pos["nisn"]);
  $telpon = htmlspecialchars($pos["telpon"]);
  $sekolah = htmlspecialchars($pos["sekolah"]);
  $nilai = htmlspecialchars($pos["nilai"]);
  $tgl_daftar = $pos["tgl_daftar"];
  // sql
  $query = "INSERT INTO tbl_siswa
VALUES
('','$nopen','$nama','$nisn',null,'$telpon','$sekolah','$nilai',1,'berhasil','$tgl_daftar',null,'belum',null,null,null,'belum',null,null,'belum',null,null,null)
";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
