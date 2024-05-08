<?php
session_start();
include 'connection.php';

// Cek apakah user sudah login sebagai admin
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

// Inisialisasi variabel untuk pesan kesalahan
$error = '';

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil dan validasi input
    $ruangan_id = $_POST['ruangan_id'];
    $nama_ruangan = $_POST['nama_ruangan'];
    $kapasitas = $_POST['kapasitas'];
    $jenis_ruangan = $_POST['jenis_ruangan'];
    $lokasi = $_POST['lokasi'];

    // Siapkan perintah SQL untuk update data
    $sql = "UPDATE ruangan SET nama_ruangan = ?, kapasitas = ?, jenis_ruangan = ?, lokasi = ? WHERE ruangan_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sisss", $nama_ruangan, $kapasitas, $jenis_ruangan, $lokasi, $ruangan_id);

        if ($stmt->execute()) {
            // Redirect setelah sukses
            header("location: jadwal.php?ruangan=" . $nama_ruangan);
            exit;
        } else {
            $error = "Terjadi kesalahan. Silakan coba lagi nanti.";
        }
        $stmt->close();
    }
}

// Jika ID ruangan tidak disertakan dalam URL, redirect
if (!isset($_GET["ruangan_id"]) && !isset($_POST["ruangan_id"])) {
    header("location: index.php");
    exit;
}

// ID ruangan dari GET request atau POST request
$ruangan_id = isset($_GET["ruangan_id"]) ? $_GET["ruangan_id"] : $_POST["ruangan_id"];

// Ambil data ruangan saat ini dari database
$sql = "SELECT * FROM ruangan WHERE ruangan_id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $ruangan_id);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $ruangan = $result->fetch_assoc();
        } else {
            // Tidak ada ruangan dengan ID tersebut
            header("location: error.php");
            exit;
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Ruangan</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef5f3;
            /* Warna latar yang lebih lembut */
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
            border: 1px solid #b2dfdb;
            /* Border dengan warna hijau toska */
        }

        h2 {
            text-align: center;
            color: #00695c;
            /* Warna judul dengan nuansa hijau toska */
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
            color: #00695c;
            /* Warna label dengan nuansa hijau toska */
        }

        input[type="text"],
        input[type="submit"] {
            width: calc(100% - 16px);
            /* Menghitung lebar dengan padding */
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #b2dfdb;
            /* Border input dengan warna hijau toska */
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #00695c;
            /* Warna tombol dengan nuansa hijau toska */
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #004d40;
            /* Warna tombol saat di-hover */
        }

        .link-tabel {
            width: calc(100% - 16px);
            /* Menghitung lebar dengan padding */
            padding: 5px;
            margin-bottom: 20px;
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
</head>

<body>
    <div class="container">
        <h2 style="margin-bottom: -30px;">Edit Ruangan</h2>
        <?php if (!empty($error)): ?>
            <p style="color: red;">
                <?php echo $error; ?>
            </p>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="ruangan_id" value="<?php echo $ruangan_id; ?>">
            <label for="nama_ruangan">Nama Ruangan:</label>
            <input type="text" name="nama_ruangan" id="nama_ruangan" value="<?php echo $ruangan['nama_ruangan']; ?>"
                required>

            <label for="kapasitas">Kapasitas:</label>
            <input type="text" name="kapasitas" id="kapasitas" value="<?php echo $ruangan['kapasitas']; ?>" required>

            <label for="jenis_ruangan">Jenis Ruangan:</label>
            <input type="text" name="jenis_ruangan" id="jenis_ruangan" value="<?php echo $ruangan['jenis_ruangan']; ?>"
                required>

            <label for="lokasi">Lokasi:</label>
            <input type="text" name="lokasi" id="lokasi" value="<?php echo $ruangan['lokasi']; ?>" required>

            <div style="display: flex; justify-content: space-between; align-items: center;">
                <input type="submit" value="Update Ruangan" style="width: 73%;">
                <a href="javascript:history.back()" class="link-tabel" style="width: 23%; text-align: center;">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>