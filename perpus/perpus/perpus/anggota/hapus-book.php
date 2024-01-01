<?php
include "../conn.php";
$id = $_GET['kd'];

$query = mysqli_query($conn, "DELETE FROM data_book WHERE id='$id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'book.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'book.php'</script>";	
}
