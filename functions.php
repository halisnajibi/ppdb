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
('','$nopen','$nama','$nisn',null,'$telpon','$sekolah','$nilai','berhasil','$tgl_daftar',null,'belum',null,null,null,'belum',null,null,'belum',null,null,null)
";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

//daftar ulang
function daftar_ulang($pos){
  global $conn;
  $nisn=$pos["nisn"];
  $tanggal=$pos["tanggal"];
  $nama=htmlspecialchars($pos["nama"]);
  $ayah=htmlspecialchars($pos["ayah"]);
  $ibu=htmlspecialchars($pos["ibu"]);
  $alamat=htmlspecialchars($pos["alamatortu"]);
  $penghasilan=htmlspecialchars($pos["penghasilan"]);
  $berkas=uplod_berkas();
  if(!$berkas){
    return false;
  }

  $sql="INSERT INTO tbl_orangtua VALUES
        ('','$nama','$ayah','$ibu','$alamat','$penghasilan')";
  $sql_berkas="UPDATE tbl_siswa SET
               uplod='$berkas',
               tgl_daftarulang=current_timestamp(),
               statusdaftarulang='berhasil'
                WHERE nisn=$nisn";
  mysqli_query($conn,$sql_berkas);
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

//uplod berkas
function uplod_berkas(){
  $namafiles=$_FILES['upload']['name'];
  $ukuranfiles=$_FILES['upload']['size'];
  $error=$_FILES['upload']['error'];
  $tmpname=$_FILES['upload']['tmp_name'];

  //cek apakah tidak ada berkas yang di upload
  if($error === 4){
    echo "
    <script>
      alert('pilih berkas dulu');
    </script>    
    ";
    return false;
  }

  //cek apakah yang di uplod itu pdf
  $extensiberkasvalid=['pdf'];
  //mecah nama file
  $extensiberkas=explode('.',$namafiles);
  //ngambil nama file yang paling akhir(ekstensi)dan merubah nya menajadi huruf kecil semua
  $extensiberkas=strtolower(end($extensiberkas));

  if(!in_array($extensiberkas,$extensiberkasvalid)){
    echo
    "
     <script>
            alert('yang di uplod bukan pdf');
            </script>";
    return false;
  }

  //cek jika ukuran nya terlalu besar
  if($ukuranfiles > 5000000){
    echo "
        <script>
        alert('ukuran file terlalu besar');
        </script>";
    return false;
  }

  //lulus penegecikan,file siap di uplod
  //generate nama file baru
  $namafilebaru=uniqid();
  $namafilebaru .='.';
  $namafilebaru .=$extensiberkas;

  //nama folder relative sama file tambah data
  move_uploaded_file($tmpname, 'berkas/'.$namafilebaru);

  return $namafilebaru;
}

