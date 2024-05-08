<?php
session_start();
include 'connection.php';

// Pastikan hanya admin yang bisa mengakses
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

$message = '';

// Proses penghapusan ruangan jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ruangan_id'])) {
    $ruangan_id = $_POST['ruangan_id'];

    // Siapkan dan jalankan query hapus
    $sql = "DELETE FROM ruangan WHERE ruangan_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $ruangan_id);
        if ($stmt->execute()) {
            // Redirect ke halaman daftar ruangan setelah berhasil dihapus
            header("Location: daftar_ruangan.php");
            exit;
        } else {
            $message = 'Terjadi kesalahan saat menghapus ruangan.';
        }
        $stmt->close();
    }
}

// Ambil daftar ruangan dari database
$sqlRuanganAA = "SELECT ruangan_id, nama_ruangan FROM ruangan WHERE nama_ruangan LIKE 'AA%'";
$resultRuanganAA = $conn->query($sqlRuanganAA);

$sqlRuanganGSG = "SELECT ruangan_id, nama_ruangan FROM ruangan WHERE nama_ruangan LIKE 'GSG%'";
$resultRuanganGSG = $conn->query($sqlRuanganGSG);

$sqlAddedRooms = "SELECT ruangan_id, nama_ruangan FROM ruangan WHERE nama_ruangan NOT LIKE 'AA%' AND nama_ruangan NOT LIKE 'GSG%'";
$resultAddedRooms = $conn->query($sqlAddedRooms);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hapus Ruangan - Sistem Informasi Ruangan</title>
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
            background-color: red;
            color: white;
            padding: 5px 20px;
            /* Mengatur padding yang lebih kecil untuk tombol */
            text-decoration: none;
            border-radius: 10px;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
            margin-top: 15px;
            text-align: center;
            /* Mengatur teks ke tengah */
            display: inline-block;
            /* Mengatur agar tombol berukuran sesuai dengan konten */
            width: auto;
            /* Mengatur agar lebar tombol disesuaikan dengan teks */
        }

        .red-button:hover {
            background-color: darkred;
        }




        .form-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label,
        select {
            margin-bottom: 10px;
        }

        select {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2 class="green-heading">Hapus Ruangan</h2>
        <?php if ($message): ?>
            <p>
                <?php echo $message; ?>
            </p>
        <?php endif; ?>

        <form action="hapusruangan.php" method="post">
            <label for="ruangan_id">Pilih Ruangan untuk Dihapus:</label>
            <select name="ruangan_id" id="ruangan_id" required>
                <option value="">-- Pilih Ruangan --</option>
                <optgroup label="Ruangan AA">
                    <?php while ($row = $resultRuanganAA->fetch_assoc()): ?>
                        <option value="<?php echo $row['ruangan_id']; ?>">
                            <?php echo htmlspecialchars($row['nama_ruangan']); ?>
                        </option>
                    <?php endwhile; ?>
                </optgroup>
                <optgroup label="Ruangan GSG">
                    <?php while ($row = $resultRuanganGSG->fetch_assoc()): ?>
                        <option value="<?php echo $row['ruangan_id']; ?>">
                            <?php echo htmlspecialchars($row['nama_ruangan']); ?>
                        </option>
                    <?php endwhile; ?>
                </optgroup>
                <optgroup label="Added Rooms">
                    <?php while ($row = $resultAddedRooms->fetch_assoc()): ?>
                        <option value="<?php echo $row['ruangan_id']; ?>">
                            <?php echo htmlspecialchars($row['nama_ruangan']); ?>
                        </option>
                    <?php endwhile; ?>
                </optgroup>
            </select>
            <input type="submit" value="Hapus Ruangan" class="green-button">
            <a href="daftar_ruangan.php" class="red-button">Cancel</a>

        </form>
    </div>
</body>

</html>