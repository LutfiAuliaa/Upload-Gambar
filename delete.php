<?php
include('koneksi.php'); // Menghubungkan ke database

// Validasi input GET['del']
if (isset($_GET['del']) && is_numeric($_GET['del'])) {
    $del = intval($_GET['del']); // Mengamankan input dengan intval

    // Query untuk memilih data berdasarkan ID
    $perintah2 = "SELECT * FROM namasiswa WHERE id = $del";
    $a = mysqli_query($koneksi, $perintah2);

    // Periksa apakah data ditemukan
    if (mysqli_num_rows($a) > 0) {
        $b = mysqli_fetch_assoc($a);

        // Validasi apakah kolom 'foto' ada dan tidak kosong
        if (!empty($b['foto'])) {
            $filePath = "gambar/" . $b['foto'];

            // Hapus file gambar jika ada
            if (file_exists($filePath)) {
                unlink($filePath); // Menghapus file
            } else {
                echo "File gambar tidak ditemukan.<br/>";
            }
        } else {
            echo "Data gambar kosong atau tidak valid.<br/>";
        }

        // Query untuk menghapus data dari database
        $perintah1 = "DELETE FROM namasiswa WHERE id = $del";
        $del2 = mysqli_query($koneksi, $perintah1);

        if ($del2) {
            echo "Gambar berhasil dihapus.<br/>
                  <a href='tampil_foto.php'>Kembali</a>";
        } else {
            echo "Gagal menghapus data dari database: " . mysqli_error($koneksi);
        }
    } else {
        echo "Data tidak ditemukan.<br/>
              <a href='tampil_foto.php'>Kembali</a>";
    }
} else {
    echo "ID tidak valid.<br/>
          <a href='tampil_foto.php'>Kembali</a>";
}
?>