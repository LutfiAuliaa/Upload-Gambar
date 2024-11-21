<?php
include('koneksi.php'); // Pastikan koneksi ke database terhubung

// Query SQL untuk mengambil data
$perintah = "SELECT * FROM namasiswa ORDER BY id DESC";
$query = mysqli_query($koneksi, $perintah);

// Cek apakah query berhasil dijalankan
if (!$query) {
    die("Query gagal dijalankan: " . mysqli_error($koneksi));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tampil Foto</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #E6E6FA; /* Lavender background */
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 700px;
        margin: 50px auto;
        background: #ffffff;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }
    h1 {
        text-align: center;
        color: #4B0082; /* Indigo */
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }
    table th {
        background-color: #4B0082; /* Indigo */
        color: white;
    }
    table tr:nth-child(even) {
        background-color: #F8F8FF; /* GhostWhite for alternating rows */
    }
    table tr:hover {
        background-color: #D8BFD8; /* Thistle for hover effect */
    }
    .btn-delete {
        color: white;
        background-color: #DC143C; /* Crimson */
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 5px;
    }
    .btn-delete:hover {
        background-color: #B22222; /* FireBrick */
    }
    .add-btn {
        text-decoration: none;
        background-color: #4B0082; /* Indigo */
        color: white;
        padding: 8px 12px;
        border-radius: 5px;
    }
    .add-btn:hover {
        background-color: #6A5ACD; /* SlateBlue */
    }
</style>

</head>
<body>
    <div class="container">
        <h1>Galeri Foto</h1>
        <a href="input_foto.php" class="add-btn">+ Tambah Data</a>
        <table>
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>FOTO</th>
                <th>DELETE</th>
            </tr>
            <?php
            $no = 1; // Penomoran
            while ($data = mysqli_fetch_assoc($query)) { // Menggunakan mysqli_fetch_assoc untuk koneksi modern
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($data['nama']); ?></td>
                <td>
                    <img src="gambar/<?php echo htmlspecialchars($data['gambar']); ?>" width="60" height="80" alt="gambar">
                </td>
                <td>
                    <a href="delete.php?del=<?php echo htmlspecialchars($data['id']); ?>" class="btn-delete">DELETE</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
