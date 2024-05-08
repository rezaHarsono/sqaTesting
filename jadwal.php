<?php
session_start();
include 'connection.php';

$namaRuangan = isset($_GET['ruangan']) ? $_GET['ruangan'] : 'AA204';
$adminLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;

$sqlRuangan = "SELECT * FROM ruangan WHERE nama_ruangan = '{$namaRuangan}'";
$resultRuangan = $conn->query($sqlRuangan);
$ruangan = ($resultRuangan && $resultRuangan->num_rows > 0) ? $resultRuangan->fetch_assoc() : null;

$sqlJadwal = "SELECT j.*, r.nama_ruangan FROM jadwal j JOIN ruangan r ON j.ruangan_id = r.ruangan_id WHERE r.nama_ruangan = '{$namaRuangan}' ORDER BY j.urutan_hari, j.jam_mulai";
$resultJadwal = $conn->query($sqlJadwal);

// Inisialisasi variabel error
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil dan validasi input
    $ruangan_id = $_POST['ruangan_id'];
    $nama_dosen = $_POST['nama_dosen'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $semester = $_POST['semester'];
    $kelas = $_POST['kelas'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_akhir = $_POST['jam_akhir'];
    $hari = $_POST['hari'];

    // Validasi form
    if (empty($nama_dosen) || empty($mata_kuliah) || empty($semester) || empty($kelas) || empty($jam_mulai) || empty($jam_akhir) || empty($hari)) {
        $error = "Harap isi semua field sebelum menambahkan jadwal.";
    } else {
        // Siapkan perintah SQL untuk insert data
        $sql = "INSERT INTO jadwal (ruangan_id, nama_dosen, nama_mata_kuliah, smt, kelas, jam_mulai, jam_akhir, hari) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("isssssss", $ruangan_id, $nama_dosen, $mata_kuliah, $semester, $kelas, $jam_mulai, $jam_akhir, $hari);

            if ($stmt->execute()) {
                // Redirect setelah sukses
                header("location: jadwal.php?ruangan=" . $namaRuangan);
                exit;
            } else {
                $error = "Terjadi kesalahan. Silakan coba lagi nanti.";
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <title>Jadwal Ruangan
        <?= htmlspecialchars($namaRuangan); ?> - TIK PNJ
    </title>
    <link rel="stylesheet" href="styles.css">
    <style>
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
            background-color: cadetblue;
            /* Sesuaikan warna dan opasitas sesuai kebutuhan */
        }

        .edit-button {
            background-color: #00a68c;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            text-align: center;
        }

        .edit-button:hover {
            background-color: #0056b3;
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
            background-color: #008080;
            border-radius: 0.25rem;
        }

        .nav-list a {
            text-decoration: none;
            color: inherit;
            display: inline-block;
        }

        .nav-right {
            position: absolute;
            right: 0;
            margin-right: 10px;
        }

        .informasiruangan {
            margin-left: 20px;
            margin-right: 700px;
            margin-top: -488px;
        }

        .tambahjadwal {
            margin-left: 700px;
            margin-right: 20px;
            margin-top: -50px;
        }

        .jadwalruangan {
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 10px;
        }

        .utama {
            background-color: #333;
            color: white;
        }

        h1 {
            margin-top: 15px;
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

        @media (max-width: 900px) {

            .informasiruangan,
            .tambahjadwal {
                margin: 20px auto;
                width: 90%;
                /* Atau lebar yang sesuai dengan kebutuhan Anda */
            }
        }


        @media (min-width: 900px) {

            .informasiruangan,
            .tambahjadwal {
                float: none;
                /* Menghapus float jika ada */
                margin: 20px auto;
                /* Menambahkan margin atas dan bawah, dan mengatur margin kiri dan kanan menjadi auto */
                width: 90%;
                /* Atau lebar yang sesuai dengan kebutuhan Anda */
            }
        }
        .link-tabel{
            position: absolute;
            right: 70px;
            text-decoration: none;
            display: inline-block;
            padding-left: 5px;
            padding-right: 5px;
            background-color: #cccccc;
        }
        .link-tabel:hover{
            background-color: #008080;
            border-radius: 0.25rem;
        }
    </style>
</head>

<body>
    <div class="utama">
        <h1 align="center">Jadwal Ruangan
            <?= htmlspecialchars($namaRuangan); ?> - TIK PNJ
        </h1>
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
                <li class="nav-right" style="right: 80px"><a
                        href="tambah_jadwal.php?ruangan_id=<?= $ruangan['ruangan_id']; ?>">Tambah Jadwal</a></li>
            <?php else: ?>
                <li class="nav-right"><a href="login.php">Login Admin</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <main>
        <section>
            <?php if ($ruangan): ?>
                <h2 align="center">Informasi Ruangan</h2>
                <form action="tambah_jadwal.php" method="post">
                    <table border="3" width="550" height="200">
                        <tr>
                            <th align="left">Nama Ruangan</th>
                            <th> : </th>
                            <td>
                                <?= htmlspecialchars($ruangan['nama_ruangan']); ?>
                            </td>
                        </tr>
                        <tr>
                            <th align="left">Kapasitas</th>
                            <th> : </th>
                            <td>
                                <?= htmlspecialchars($ruangan['kapasitas']); ?>
                            </td>
                        </tr>
                        <tr>
                            <th align="left">Jenis Ruangan</th>
                            <th> : </th>
                            <td>
                                <?= htmlspecialchars($ruangan['jenis_ruangan']); ?>
                            </td>
                        </tr>
                        <tr>
                            <th align="left">Lokasi</th>
                            <th> : </th>
                            <td>
                                <?= htmlspecialchars($ruangan['lokasi']); ?>
                                <?php if ($adminLoggedIn): ?>
                                    <a href="edit_ruangan.php?ruangan_id=<?= $ruangan['ruangan_id']; ?>" class="link-tabel">Edit Informasi Ruangan</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </form>
                <br />
            <?php else: ?>
                <p>Informasi ruangan tidak tersedia.</p>
            <?php endif; ?>
            <hr />
        </section>
        <div class="jadwalruangan">
            <section>
                <h2>Jadwal Ruangan</h2>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dosen</th>
                            <th>Mata Kuliah</th>
                            <th>Semester</th>
                            <th>Kelas</th>
                            <th>Jam Mulai</th>
                            <th>Jam Akhir</th>
                            <th>Hari</th>
                            <?php if ($adminLoggedIn): ?>
                                <th>Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($resultJadwal && $resultJadwal->num_rows > 0) {
                            $no = 1;
                            while ($row = $resultJadwal->fetch_assoc()) {
                                echo "<tr align=center>
                                        <td style='width: 5%;'>" . $no++ . "</td>
                                        <td style='width: 17.5%;'>" . htmlspecialchars($row["nama_dosen"]) . "</td>
                                        <td style='width: 15%;'>" . htmlspecialchars($row["nama_mata_kuliah"]) . "</td>
                                        <td style='width: 5%;'>" . htmlspecialchars($row["smt"]) . "</td>
                                        <td style='width: 5%;'>" . htmlspecialchars($row["kelas"]) . "</td>
                                        <td style='width: 7.5%;'>" . htmlspecialchars($row["jam_mulai"]) . "</td>
                                        <td style='width: 7.5%;'>" . htmlspecialchars($row["jam_akhir"]) . "</td>
                                        <td style='width: 5%;'>" . htmlspecialchars($row["hari"]) . "</td>";
                                if ($adminLoggedIn) {
                                    echo "<td style='width: 7.5%;'>
                                        <a href='edit_jadwal.php?jadwal_id=" . $row["jadwal_id"] . "'>Edit</a> |
                                        <a href='delete_jadwal.php?jadwal_id=" . $row["jadwal_id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus jadwal ini?\");'>Hapus</a>
                                    </td>";
                                }
                                echo "</tr>";
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
        <p>&copy;
            <?= date("Y"); ?> Teknik Informatika dan Komputer PNJ
        </p>
    </div>
</body>

</html>