<?php
$namafolder = "gambar_anggota/"; //tempat menyimpan file

include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"])) {
    $jenis_gambar = $_FILES['nama_file']['type'];
    $id = $_POST['id'];
    $judul_artikel = $_POST['judul_artikel'];
    $penulis = $_POST['penulis'];
    $nama_jurnal = $_POST['nama_jurnal'];
    $volume_jurnal = $_POST['volume_jurnal'];
    $nomor_jurnal = $_POST['nomor_jurnal'];
    $halaman = $_POST['halaman'];
    $issn = $_POST['issn'];
    $penerbit = $_POST['penerbit'];
    $asal = $_POST['asal'];
    $doi = $_POST['doi'];
    $tgl_input = $_POST['tgl_input'];


    if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/x-png") {
        $gambar = $namafolder . basename($_FILES['nama_file']['name']);
        if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
            $sql = "INSERT INTO data_artikel(id,judul_artikel,penulis,nama_jurnal,volume_jurnal,nomor_jurnal,penerbit,issn,halaman,asal, doi,tgl_input,gambar) VALUES
            ('$id','$judul_artikel','$penulis','$nama_jurnal', '$volume_jurnal', '$nomor_jurnal','$penerbit','$issn','$halaman','$asal', '$doi','$tgl_input','$gambar')";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            echo "Gambar berhasil dikirim ke direktori" . $gambar;
            echo "<h3><a href='input-artikel.php'> Input Lagi</a></h3>";
            echo "<h3><a href='artikel.php'> Data Artikel</a></h3>";
        } else {
            echo "<p>Gambar gagal dikirim</p>";
        }
    } else {
        echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
    }
} else {
    echo "Anda belum memilih gambar";
}
