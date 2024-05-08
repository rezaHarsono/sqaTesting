<?php
session_start();
include 'connection.php';

// Cek apakah user adalah admin
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// Inisialisasi variabel error
$error = '';

// Proses form ketika di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_ruangan = $_POST['nama_ruangan'];
    $kapasitas = $_POST['kapasitas'];
    $jenis_ruangan = $_POST['jenis_ruangan'];
    $lokasi = $_POST['lokasi'];

    // Validasi input
    if (empty($nama_ruangan) || empty($kapasitas) || empty($jenis_ruangan) || empty($lokasi)) {
        $error = 'Semua field harus diisi.';
    } else {
        // Siapkan query SQL
        $sql = "INSERT INTO ruangan (nama_ruangan, kapasitas, jenis_ruangan, lokasi) VALUES (?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("siss", $nama_ruangan, $kapasitas, $jenis_ruangan, $lokasi);

            if ($stmt->execute()) {
                header("Location: daftar_ruangan.php");
                exit();
            } else {
                $error = 'Terjadi kesalahan saat menyimpan data.';
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
    <title>Tambah Ruangan - Sistem Informasi Ruangan</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .green-heading {
            color: #00A79D;
            margin-top: 15px;
        }

        .green-button {
            background-color: #00A79D;
            color: white;
            padding: 10px 70px;
            text-decoration: none;
            border-radius: 10px;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
            margin-top: 15px;
        }

        .green-button:hover {
            background-color: #0056b3;
        }

        .red-button {
            background-color: #00A79D;
            color: white;
            padding: 10px 70px;
            text-decoration: none;
            border-radius: 10px;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
            margin-top: 15px;
            text-align: center;
            display: inline-block;
            width: auto;
            font-size: 14px;
            /* Mengatur ukuran font */
        }

        .red-button {
            background-color: red;
            padding: 6px 30px;
        }

        .red-button:hover {
            background-color: darkred;
        }

        .error {
            color: red;
        }

        .form-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Mengatur tampilan field agar sejajar */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
        }

        input {
            padding: 5px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2 class="green-heading">Tambah Ruangan Baru</h2>
        <?php
        if (!empty($error)) {
            echo '<div class="error">' . $error . '</div>';
        }
        ?>
        <form action="tambahruangan.php" method="post">
            <label for="nama_ruangan">Nama Ruangan:</label>
            <input type="text" name="nama_ruangan" id="nama_ruangan" required>

            <label for="kapasitas">Kapasitas:</label>
            <input type="number" name="kapasitas" id="kapasitas" required>

            <label for="jenis_ruangan">Jenis Ruangan:</label>
            <input type="text" name="jenis_ruangan" id="jenis_ruangan" required>

            <label for="lokasi">Lokasi:</label>
            <input type="text" name="lokasi" id="lokasi" required>

            <input type="submit" value="Tambah" class="green-button" style="margin: 15 auto;">
            <a href="daftar_ruangan.php" class="red-button" style="margin: 600 auto;">Cancel</a>
        </form>
    </div>
</body>

</html>