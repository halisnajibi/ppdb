<?php 
require "../../../functions.php";
$id=$_GET["id"];

if(hapus_kelas($id) > 0){
  echo "
  <script>
    alert('kelas berhasil di hapus');
     document.location.href='view.php';    
  </script>
  ";
}else{
  echo "
  <script>
    alert('kelas gagal di hapus');
     document.location.href='view.php';    
  </script>
  ";
}
?>