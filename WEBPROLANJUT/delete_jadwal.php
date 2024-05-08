<?php
include 'connection.php';

if(isset($_GET['jadwal_id'])){
    $jadwal_id = $_GET['jadwal_id'];

    // Query untuk mendapatkan nama ruangan berdasarkan jadwal_id sebelum menghapus jadwal
    $ruangan_query = "SELECT nama_ruangan FROM ruangan INNER JOIN jadwal ON ruangan.ruangan_id = jadwal.ruangan_id WHERE jadwal.jadwal_id = $jadwal_id";
    $ruangan_result = mysqli_query($conn, $ruangan_query);
    if($ruangan_result) {
        $ruangan_data = mysqli_fetch_assoc($ruangan_result);
        $nama_ruangan = $ruangan_data['nama_ruangan'];
    } else {
        // Handle error - could not get ruangan
        die("Error: Data tidak ditemukan.");
    }

    // Query untuk menghapus jadwal
    $query = "DELETE FROM jadwal WHERE jadwal_id = $jadwal_id";
    $result = mysqli_query($conn, $query);

    if($result){
        // Jika penghapusan berhasil, redirect ke jadwal dengan nama ruangan
        header('Location: jadwal.php?ruangan=' . urlencode($nama_ruangan));
        exit;
    } else {
        // Jika penghapusan gagal, tampilkan pesan error
        echo "<script>alert('Gagal menghapus jadwal.'); window.location.href='jadwal.php';</script>";
        exit;
   
    }
} else {
    // Jika jadwal_id tidak disediakan
    header('Location: jadwal.php');
    exit;
}
?>
