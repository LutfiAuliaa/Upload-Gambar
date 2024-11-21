<?php
// Include koneksi ke database
include('koneksi.php');

// Ambil data dari form
$nama = $_POST['nama'];

// Validasi jika file diunggah
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['foto']['name']; // Nama file
    $tmp_dir = $_FILES['foto']['tmp_name']; // Temporary directory
    $ukuran = $_FILES['foto']['size']; // Ukuran file

    // Direktori penyimpanan
    $direktori = 'gambar/';
    $ekstensi = strtolower(pathinfo($file, PATHINFO_EXTENSION)); // Ekstensi file
    $valid_ekstensi = array('jpeg', 'jpg', 'png', 'gif'); // Ekstensi valid
    $gambar = rand(1000, 1000000) . "." . $ekstensi; // Nama file acak

    // Validasi ekstensi file
    if (in_array($ekstensi, $valid_ekstensi)) {
        // Validasi ukuran file
        if ($ukuran <= 10000000) { // Maksimal 10MB
            // Pindahkan file ke direktori tujuan
            if (move_uploaded_file($tmp_dir, $direktori . $gambar)) {
                // Query untuk menyimpan data ke database
                $query = "INSERT INTO namasiswa (nama, gambar) VALUES ('$nama', '$gambar')";
                $result = mysqli_query($koneksi, $query);

                if ($result) {
                    echo "Data berhasil disimpan! <br>";
                    echo "Nama: $nama <br>";
                    echo "<img src='$direktori$gambar' height='200'><br>";
                    echo "<a href='tampil_foto.php'>Lihat Data</a>";
                } else {
                    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
                }
            } else {
                echo "Gagal memindahkan file.";
            }
        } else {
            echo "Ukuran file terlalu besar (maksimal 1MB).";
        }
    } else {
        echo "Ekstensi file tidak valid.";
    }
} else {
    echo "Tidak ada file yang diunggah atau terjadi error.";
}
?>