<?php
// Mulai session
session_start();

// Cek apakah user sudah login, jika ya arahkan ke index.php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("location: index.php");
    exit;
}

require_once "connection.php";

// Definisikan variabel dan inisialisasi dengan nilai kosong
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Proses data form ketika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Cek jika username kosong
    if (empty(trim($_POST["username"]))) {
        $username_err = "Harap masukkan username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Cek jika password kosong
    if (empty(trim($_POST["password"]))) {
        $password_err = "Harap masukkan password Anda.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validasi kredensial
    if (empty($username_err) && empty($password_err)) {
        // Siapkan SELECT statement
        $sql = "SELECT user_id, username, password FROM users WHERE username = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Ikat variabel ke statement sebagai parameter
            $stmt->bind_param("s", $param_username);

            // Set parameter
            $param_username = $username;

            // Mencoba untuk mengeksekusi statement tersebut
            if ($stmt->execute()) {
                // Simpan hasil
                $stmt->store_result();

                // Cek jika username ada, jika ya maka verifikasi password
                if ($stmt->num_rows == 1) {
                    // Ikat variabel hasil
                    $stmt->bind_result($user_id, $username, $hashed_password);
                    if ($stmt->fetch()) {
                        if (MD5($password) == $hashed_password) {
                            // Password benar, mulai sesi baru
                            session_start();

                            // Simpan data di session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $user_id;
                            $_SESSION["username"] = $username;

                            // Arahkan user ke halaman index
                            header("location: index.php");
                        } else {
                            // Password tidak valid, tampilkan pesan kesalahan umum
                            $login_err = "Username atau password salah.";
                        }
                    }
                } else {
                    // Username tidak ditemukan, tampilkan pesan kesalahan umum
                    $login_err = "Username atau password salah.";
                }
            } else {
                echo "Oops! Terjadi kesalahan. Silakan coba lagi nanti.";
            }

            // Tutup statement
            $stmt->close();
        }
    }

    // Tutup koneksi
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif,;
            background-color: cadetblue;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #DCDCDC;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            width: 300px;
        }
        p {
            font-size: small;
            text-align: center;
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 92%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
        .pnjlogo {
            margin-left: 80px;
        }
        .tiklogo {
            margin-left: 130px;
            margin-top: -75px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="pnjlogo">
            <img src="pnj-logo.svg" alt="logo tik" width="65" height="70">
        </div>
        <div class="tiklogo">
            <img src="tik-pnj.png" alt="logo pnj" width="120" height="70">
        </div>
        <h1>Login</h1>
        <p>Harap isi form ini untuk login.</p>

        <?php 
        if (!empty($login_err)) {
            echo '<div class="error">' . $login_err . '</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
                <span class="error"><?php echo $username_err; ?></span>
            </div>    
            <div>
                <label>Password</label>
                <input type="password" name="password">
                <span class="error"><?php echo $password_err; ?></span>
            </div>
            <div>
                <input type="submit" value="Login">
            </div>
        </form>

        <!-- Tambahkan pesan default username dan password di sini -->
        <p>Default username dan password adalah "admin" dan "admin".</p>
    </div>
</body>
</html>