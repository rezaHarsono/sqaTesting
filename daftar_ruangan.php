<?php 
session_start();
include 'connection.php'; 
$adminLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;

// Ambil data ruangan dari database untuk masing-masing kategori
$sqlRuanganAA = "SELECT * FROM ruangan WHERE nama_ruangan LIKE 'AA%'";
$resultRuanganAA = $conn->query($sqlRuanganAA);

$sqlRuanganGSG = "SELECT * FROM ruangan WHERE nama_ruangan LIKE 'GSG%'";
$resultRuanganGSG = $conn->query($sqlRuanganGSG);

$sqlAddedRooms = "SELECT * FROM ruangan WHERE nama_ruangan NOT LIKE 'AA%' AND nama_ruangan NOT LIKE 'GSG%'";
$resultAddedRooms = $conn->query($sqlAddedRooms);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Penggunaan Ruangan TIK PNJ</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .ruangan-group {
            margin-bottom: 2em;
        }
        .ruangan-group h2 {
            color: #333;
        }
        .ruangan-list {
            list-style-type: none;
            padding: 0;
        }
        .ruangan-list li {
            display: inline-block;
            margin-right: 10px;
            margin-bottom: 10px;
        }
        .ruangan-list a {
            background-color: #00A79D;
            color: white;
            padding: 10px 20px; /* Wider padding for buttons */
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            display: inline-block; /* Make buttons inline */
            margin-bottom: 5px; /* Slightly reduce bottom margin for spacing */
        }
        .ruangan-list a:hover {
            background-color: #0056b3;
        }
        .login-logout {
            margin: 1em;
            text-align: right;
        }
        .login-logout a {
            color: white;
            text-decoration: none;
            background-color: #007bff;
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
        .utama {
            background-color: #333;
            color: white;
        }
        h1 {
            margin-top:15px;
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
        .green-button {
            background-color: #00A79D; /* Warna hijau toska */
            color: white;
            padding: 10px 20px; /* Wider padding for buttons */
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            display: inline-block; /* Make buttons inline */
            margin-bottom: 5px; /* Slightly reduce bottom margin for spacing */
            border: none; /* Hapus border default */
            cursor: pointer; /* Ganti kursor saat mengarah ke tombol */
            }

        .green-button a {
            text-decoration: none;
            color: white;
        }

        .green-button:hover {
             background-color: #0056b3; /* Warna hijau toska saat dihover */
}
    </style>
</head>
<body>
    <div class="utama">
        <h1 align="center">Daftar Ruangan TIK PNJ</h1>
        
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
        
        <div class="ruangan-group">
            <h2>Ruangan AA</h2>
            <ul class="ruangan-list">
                <?php
                $ruangansAA = $conn->query("SELECT nama_ruangan FROM ruangan WHERE nama_ruangan LIKE 'AA%' ORDER BY nama_ruangan");
                while($ruangan = $ruangansAA->fetch_assoc()) {
                    echo "<li><a href='jadwal.php?ruangan=" . htmlspecialchars($ruangan['nama_ruangan']) . "'>" . htmlspecialchars($ruangan['nama_ruangan']) . "</a></li>";
                }
                ?>
            </ul>
        </div>

        <div class="ruangan-group">
            <h2>Ruangan GSG</h2>
            <ul class="ruangan-list">
                <?php
                $ruangansGSG = $conn->query("SELECT nama_ruangan FROM ruangan WHERE nama_ruangan LIKE 'GSG%' ORDER BY nama_ruangan");
                while($ruangan = $ruangansGSG->fetch_assoc()) {
                    echo "<li><a href='jadwal.php?ruangan=" . htmlspecialchars($ruangan['nama_ruangan']) . "'>" . htmlspecialchars($ruangan['nama_ruangan']) . "</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="ruangan-group">
            <h2>Extra Rooms</h2>
            <ul class="ruangan-list">
                <?php
                if ($resultAddedRooms->num_rows > 0) {
                    while($ruangan = $resultAddedRooms->fetch_assoc()) {
                        echo "<li><a href='jadwal.php?ruangan=" . htmlspecialchars($ruangan['nama_ruangan']) . "'>" . htmlspecialchars($ruangan['nama_ruangan']) . "</a></li>";
                    }
                } else {
                    echo "<li>No extra rooms.</li>";
                }
                ?>
            </ul>
        </div>
    </main>
        <div>
        <?php if ($adminLoggedIn): ?>
            <div style="text-align: center; margin-bottom: 20px;">
            <button class="green-button"><a href="tambahruangan.php">Tambah Ruangan</a></button>
        </div>
        <div style="text-align: center; margin-bottom: 20px;">
            <button class="green-button"><a href="hapusruangan.php">Hapus Ruangan</a></button>
        </div>
        <?php endif; ?>
        </div>
    
    <div class="footer">
        <p>&copy; <?= date("Y"); ?> Teknik Informatika dan Komputer PNJ</p>
    </div>
</body>
</html>
