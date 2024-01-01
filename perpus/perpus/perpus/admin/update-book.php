<?php
$namafolder = "gambar_buku/"; //tempat menyimpan file

include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"])) {
   $jenis_gambar = $_FILES['nama_file']['type'];
   $id = $_POST['id'];
   $judul_buku = $_POST['judul_buku'];
   $penulis = $_POST['penulis'];
   $penerbit = $_POST['penerbit'];
   $isbn = $_POST['isbn'];
   $jumlah_halaman = $_POST['jumlah_halaman'];
//    $asal = $_POST['asal'];
   $tgl_input = $_POST['tgl_input'];

   if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/x-png") {
      $gambar = $namafolder . basename($_FILES['nama_file']['name']);
      if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
         $sql = "UPDATE data_book SET judul_buku='$judul_buku', penulis='$penulis', penerbit='$penerbit', isbn='$isbn', jumlah_halaman='$jumlah_halaman' WHERE id='$id'";
         $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
         echo "Gambar berhasil dikirim ke direktori" . $gambar;
         header('location:book.php');
      } else {
         echo "<p>Gambar gagal dikirim</p>";
      }
   } else {
      echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
   echo "Anda belum memilih gambar";
}
