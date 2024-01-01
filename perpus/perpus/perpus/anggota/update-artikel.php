<?php
$namafolder = "gambar_anggota/"; // tempat menyimpan file

include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"])) {
    $jenis_gambar = $_FILES['nama_file']['type'];
    $id = $_POST['id']; // Assuming you have an input field for the article ID in your form
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
            $sql = "UPDATE data_artikel
                    SET judul_artikel = '$judul_artikel',
                        penulis = '$penulis',
                        nama_jurnal = '$nama_jurnal',
                        volume_jurnal = '$volume_jurnal',
                        nomor_jurnal = '$nomor_jurnal',
                        penerbit = '$penerbit',
                        issn = '$issn',
                        halaman = '$halaman',
                        asal = '$asal',
                        doi = '$doi',
                        tgl_input = '$tgl_input',
                        gambar = '$gambar'
                    WHERE id = $id";
            
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            echo "Data berhasil diupdate";
            echo "<h3><a href='artikel.php'> Kembali ke Data Artikel</a></h3>";
        } else {
            echo "<p>Gambar gagal dikirim</p>";
        }
    } else {
        echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
    }
} else {
    echo "Anda belum memilih gambar";
}
?>
