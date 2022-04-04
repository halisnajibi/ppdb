<?php 
require "../../../functions.php";
$id=$_GET["id"];
if(hapussiswa($id) > 0){
  echo "
    <script>
      alert('data berhasil di hapus');
       document.location.href='view.php';    
    </script>    
  ";
}else{
  echo "
    <script>
      alert('data gagal di hapus');
       document.location.href='view.php';    
    </script>    
  ";
}
?>