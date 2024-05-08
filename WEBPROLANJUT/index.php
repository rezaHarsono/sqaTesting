<?php 
session_start();
include 'connection.php'; 

// Set locale ke bahasa Indonesia
setlocale(LC_TIME, 'id_ID');

function convertHariToNama($nomorHari) {
    if ($nomorHari == 7) { // Jika hari Minggu, tampilkan jadwal Senin
        return 'Senin';
    }

    switch ($nomorHari) {
        case 1: return 'Senin';
        case 2: return 'Selasa';
        case 3: return 'Rabu';
        case 4: return 'Kamis';
        case 5: return 'Jumat';
        case 6: return 'Sabtu';
        default: return 'Senin'; // Default ke Senin jika terjadi kesalahan
    }
}

$nomorHari = date('N');
if ($nomorHari == 7) {
    // Jika hari Minggu, tambahkan 1 hari untuk mendapatkan hari esok
    $hariIni = convertHariToNama(1);
    $tanggal = date('d F Y', strtotime('+1 day'));
    $peringatan = "Jadwal Hari Esok:";
} else {
    $hariIni = convertHariToNama($nomorHari);
    $tanggal = date('d F Y');
    $peringatan = "Jadwal Hari Ini:";
}

// Query untuk mengambil jadwal berdasarkan ruangan dan hari ini
$sqlJadwal = "SELECT j.*, r.nama_ruangan FROM jadwal j 
              JOIN ruangan r ON j.ruangan_id = r.ruangan_id 
              WHERE j.hari = '{$hariIni}'
              ORDER BY r.nama_ruangan, j.jam_mulai";

$resultJadwal = $conn->query($sqlJadwal);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Penggunaan Ruangan TIK PNJ</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .utama {
            background-color: #333;
            color: white;
        }
        h1 {
            margin-top:15px;
        }
        .login-logout {
            margin: 1em;
            text-align: right;
        }
        .login-logout a {
            color: white;
            text-decoration: none;
            background-color: #00ffff;
            padding: 8px 12px;
            border-radius: 4px;
        }
        .login-logout a:hover {
            background-color: #0056b3;
        }
        .nav-container {
            width: 100%;
            min-height: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
            z-index: 10;
            background-color: cadetblue; /* You may need to adjust the color and opacity */
        }
        .nav-list {
            list-style-type: none;
            padding-left: 10px;
            margin: 0;
            display: flex;
        }
        .nav-list li {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .nav-list li:hover {
            background-color: #008080; /* You may need to adjust the color */
            border-radius: 0.25rem;
        }
        .nav-list a {
            text-decoration: none;
            color: inherit;
            display: inline-block;
        }
        .nav-right{
            position: absolute;
            right: 0;
            margin-right: 10px;
        }
        .pnjlogo {
            margin-left: 20px;
            margin-top: -70px;
        }
        .tiklogo {
            position: absolute;
            right: 0;
            margin-top: -78px;
        }
        .warning {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="utama">
        <h1 align="center">Sistem Informasi Jadwal Ruangan TIK PNJ</h1>
        <div class="pnjlogo">
            <img src="pnj-logo.svg" alt="logo    tik" width="65" height="70">
        </div>
        <div class="tiklogo">
            <img src="tik-pnj.png" alt="logo pnj" width="120" height="70">
        </div>
    </div>
    
    <div class="nav-container">
        <ul class="nav-list">
            <li><a href="index.php">Home</a></li>
            <li><a href="daftar_ruangan.php">Daftar Ruangan</a></li>
            <li><a href="about.php">About</a></li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li class="nav-right"><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li class="nav-right"><a href="login.php">Login Admin</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <main>
        <section>
            <h2><?= $peringatan ?> <?= $hariIni ?>, <?= $tanggal ?></h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dosen</th>
                        <th>Mata Kuliah</th>
                        <th>Semester</th>
                        <th>Kelas</th>
                        <th>Ruangan</th>
                        <th>Jam Mulai</th>
                        <th>Jam Akhir</th>
                        <th>Hari</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultJadwal && $resultJadwal->num_rows > 0) {
                        $no = 1;
                        while ($row = $resultJadwal->fetch_assoc()) {
                            echo "<tr>
                                    <td style='width: 5%;'>" . $no++ . "</td>
                                    <td style='width: 17.5%;'>" . htmlspecialchars($row["nama_dosen"]) . "</td>
                                    <td style='width: 15%;'>" . htmlspecialchars($row["nama_mata_kuliah"]) . "</td>
                                    <td style='width: 5%;'>" . htmlspecialchars($row["smt"]) . "</td>
                                    <td style='width: 7.5%;'>" . htmlspecialchars($row["kelas"]) . "</td>
                                    <td style='width: 5%;'>" . htmlspecialchars($row["nama_ruangan"]) . "</td>
                                    <td style='width: 5%;'>" . htmlspecialchars($row["jam_mulai"]) . "</td>
                                    <td style='width: 5%;'>" . htmlspecialchars($row["jam_akhir"]) . "</td>
                                    <td style='width: 5%;'>" . htmlspecialchars($row["hari"]) . "</td>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>Tidak ada jadwal yang tersedia.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <div class="footer">
        <p>&copy; <?= date("Y"); ?> Teknik Informatika dan Komputer PNJ</p>
    </div>
</body>
</html>
