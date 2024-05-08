<?php
session_start();
include 'connection.php';

// Cek apakah user sudah login sebagai admin
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

// Inisialisasi variabel
$error = '';
if (isset($_GET['ruangan_id'])) {
    $ruanganId = $_GET['ruangan_id'];

    $query = "SELECT nama_ruangan FROM ruangan WHERE ruangan_id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $ruanganId);

        if ($stmt->execute()) {
            $stmt->bind_result($namaRuangan);
            $stmt->fetch();
        }

        $stmt->close();
    }
}
// Cek apakah form telah disubmit
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

    // Check for empty or null input
    if (empty($ruangan_id) || empty($nama_dosen) || empty($mata_kuliah) || empty($semester) || empty($kelas) || empty($jam_mulai) || empty($jam_akhir) || empty($hari)) {
        $error = "Semua kolom harus diisi. Silakan coba lagi.";
    } else {
        // Calculate urutan_hari
        $urutan_hari = array_search(strtoupper($hari), ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU']) + 1;

        // Siapkan perintah SQL untuk insert data
        $sql = "INSERT INTO jadwal (ruangan_id, nama_dosen, nama_mata_kuliah, smt, kelas, jam_mulai, jam_akhir, hari, urutan_hari) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("isssssssi", $ruangan_id, $nama_dosen, $mata_kuliah, $semester, $kelas, $jam_mulai, $jam_akhir, $hari, $urutan_hari);

            if ($stmt->execute()) {
                // Setelah berhasil menambahkan jadwal, arahkan kembali ke halaman jadwal dengan nama ruangan yang sesuai
                $sqlRuangan = "SELECT nama_ruangan FROM ruangan WHERE ruangan_id = ?";
                if ($stmtRuangan = $conn->prepare($sqlRuangan)) {
                    $stmtRuangan->bind_param("i", $ruangan_id);
                    if ($stmtRuangan->execute()) {
                        $resultRuangan = $stmtRuangan->get_result();
                        $rowRuangan = $resultRuangan->fetch_assoc();
                        $namaRuangan = $rowRuangan['nama_ruangan'];

                        header("location: jadwal.php?ruangan=" . urlencode($namaRuangan));
                        exit;
                    }
                    $stmtRuangan->close();
                }
            } else {
                $error = "Terjadi kesalahan saat menambahkan jadwal. Silakan coba lagi nanti.";
            }
            $stmt->close();
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Jadwal</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            /* Latar belakang berwarna abu-abu muda */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Tinggi viewport penuh */
        }

        .container {
            width: 80%;
            max-width: 500px;
            /* Lebar maksimum untuk container */
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
            /* Border dengan warna abu-abu */
        }

        h2 {
            text-align: center;
            color: #333;
            /* Warna judul yang lebih gelap */
        }

        form {
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
            /* Warna label yang lebih gelap */
        }

        input[type="text"],
        select,
        input[type="time"] {
            width: calc(100% - 16px);
            /* Menghitung lebar dengan padding */
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            /* Border input dengan warna abu-abu */
            border-radius: 4px;
        }

        select {
            height: 34px;
        }

        input[type="submit"] {
            background-color: #00a19b;
            /* Warna hijau toska untuk tombol */
            color: #fff;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #00887d;
            /* Warna tombol saat di-hover */
        }

        .link-tabel {
            width: calc(100% - 16px);
            /* Menghitung lebar dengan padding */
            padding: 7px;
            border: 1px solid #b2dfdb;
            /* Border input dengan warna hijau toska */
            border-radius: 4px;
            background-color: #FF0000;
            /* Warna tombol dengan nuansa hijau toska */
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .link-tabel:hover {
            background-color: #CE0000;
        }

        /* Menambahkan responsivitas pada form */
        @media (max-width: 600px) {
            .container {
                width: 90%;
            }
        }
    </style>
    <script>
        // Fungsi untuk menampilkan konfirmasi dialog sebelum kembali ke halaman sebelumnya
        function confirmBack() {
            var confirmation = confirm("Maaf, semua field harus diisi. Klik OK untuk kembali.");
            if (confirmation) {
                window.history.back();
            }
        }

        // Cek apakah ada pesan kesalahan
        <?php if (!empty($error)): ?>
            // Tampilkan konfirmasi dialog jika ada pesan kesalahan
            confirmBack();
        <?php endif; ?>
    </script>
</head>

<body>
    <div class="container">
        <h2 style="margin-bottom: -40px">Tambah Jadwal</h2>
        <form method="POST">
            <input type="hidden" name="ruangan_id" value="<?= isset($_GET['ruangan_id']) ? $_GET['ruangan_id'] : ''; ?>"
                readonly /><br>
            Nama Ruangan: <input type="text" id="nama_ruangan" name="nama_ruangan" value="<?= $namaRuangan ?>"
                readonly /><br>
            Nama Dosen: <input type="text" name="nama_dosen" /><br>
            Mata Kuliah: <input type="text" name="mata_kuliah" /><br>
            Semester: <input type="text" name="semester" /><br>
            Kelas: <input type="text" name="kelas" /><br>
            Jam Mulai: <input type="time" name="jam_mulai" /><br>
            Jam Akhir: <input type="time" name="jam_akhir" /><br>
            Hari:
            <select name="hari">
                <option value="SENIN">SENIN</option>
                <option value="SELASA">SELASA</option>
                <option value="RABU">RABU</option>
                <option value="KAMIS">KAMIS</option>
                <option value="JUMAT">JUMAT</option>
                <option value="SABTU">SABTU</option>
            </select><br>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <input type="submit" value="Tambah Jadwal" style="width: 73%;">
                <a href="javascript:history.back()" class="link-tabel" style="width: 23%; text-align: center;">Cancel</a>
            </div>
        </form>
    </div>
    <?php if (!empty($error)): ?>
        <p>
            <?php echo $error; ?>
        </p>
    <?php endif; ?>
</body>

</html>