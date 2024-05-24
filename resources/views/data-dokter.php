<?php
// Mulai session
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>Data Dokter</title>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <section id="content">
        <?php
        // Lakukan koneksi ke database
        include 'connection.php';

        // Query untuk mengambil data dokter dari tabel dokter
        $sql = "SELECT * FROM dokter";
        $result = mysqli_query($koneksi, $sql);

        // Buat tabel HTML untuk menampilkan data dokter
        echo '<table class="data-table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>No</th>';
        echo '<th>ID Dokter</th>';
        echo '<th>Nama</th>';
        echo '<th>Jenis Kelamin</th>';
        echo '<th>Spesialisasi</th>';
        echo '<th>Nomor Telepon</th>';
        echo '<th>Alamat</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Periksa apakah terdapat data dokter
        if (mysqli_num_rows($result) > 0) {
            $counter = 1;
            // Ambil setiap baris data dari hasil query dan tampilkan dalam bentuk baris tabel HTML
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $counter++ . '</td>';
                echo '<td>' . $row['dokter_id'] . '</td>'; // Tampilkan ID Dokter
                echo '<td>' . $row['nama_lengkap'] . '</td>';
                echo '<td>' . $row['jenis_kelamin'] . '</td>';
                echo '<td>' . $row['spesialisasi'] . '</td>';
                echo '<td>' . $row['nomor_telepon'] . '</td>';
                echo '<td>' . $row['alamat'] . '</td>';
                echo '</tr>';
            }
        } else {
            // Jika tidak ada data dokter
            echo '<tr><td colspan="7">Tidak ada data dokter.</td></tr>';
        }

        echo '</tbody>';
        echo '</table>';

        // Tutup koneksi
        mysqli_close($koneksi);
        ?>
    </section>
</body>
</html>
