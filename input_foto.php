<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Gambar</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #E6E6FA; /* Lavender background */
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 500px;
        margin: 50px auto;
        background: #ffffff;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }
    h1 {
        text-align: center;
        color: #4B0082; /* Indigo for better contrast */
    }
    form table {
        width: 100%;
    }
    form th {
        text-align: center;
        font-size: 18px;
        color: #4B0082; /* Indigo */
        padding: 10px 0;
    }
    input[type="text"], input[type="file"] {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4B0082; /* Indigo */
        border: none;
        color: white;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #6A5ACD; /* SlateBlue */
    }
</style>

</head>
<body>
    <div class="container">
        <h1>Upload Foto</h1>
        <form method="post" action="proses.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <th colspan="2">SIMPAN & TAMPIL GAMBAR</th>
                </tr>
                <tr>
                    <td>Masukan Nama:</td>
                </tr>
                <tr>
                    <td><input type="text" name="nama" id="nama" placeholder="Masukan nama" required=""></td>
                </tr>
                <tr>
                    <td>Pilih Foto:</td>
                </tr>
                <tr>
                    <td><input type="file" name="foto" id="foto" required=""></td>
                </tr>
                <tr>
                    <td><input type="submit" name="kirim" id="kirim" value="SIMPAN"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
