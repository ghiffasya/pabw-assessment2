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

// Buat query untuk mengambil data obat
$sql = "SELECT * FROM obat";

// Jalankan query
$result = mysqli_query($conn, $sql);

// Periksa hasil query
if (mysqli_num_rows($result) > 0) {
    // Inisialisasi array untuk menampung data obat
    $data = [];

    // Ambil data obat dari setiap baris hasil query
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Konversi array data obat ke format JSON
    $json = json_encode($data, JSON_PRETTY_PRINT);

    // Tampilkan data obat dalam format JSON
    echo $json;
} else {
    echo "Tidak ada data obat yang ditemukan.";
}

// Tutup koneksi database
mysqli_close($conn);
