<?php
// Koneksi ke database
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "apotek-sinar-sehat";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Validasi input
if (!isset($_POST['id_obat']) || empty($_POST['id_obat'])) {
    echo "Parameter 'id_obat' tidak valid.";
    exit;
}

$idObat = intval($_POST['id_obat']);

// Hapus obat dari database
$sql = "DELETE FROM obat WHERE id_obat = $idObat";
$result = mysqli_query($conn, $sql);

// Periksa hasil penghapusan
if ($result) {
    echo "success"; // Penghapusan berhasil
} else {
    echo "error"; // Penghapusan gagal
}

// Tutup koneksi database
mysqli_close($conn);
?>
