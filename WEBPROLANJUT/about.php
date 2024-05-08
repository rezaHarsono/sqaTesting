<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>About TIK/PNJ</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .utama {
            background-color: #333;
            color: white;
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
            background-color: cadetblue;
            /* You may need to adjust the color and opacity */
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
            /* You may need to adjust the color */
            border-radius: 0.25rem;
        }

        .nav-list a {
            text-decoration: none;
            color: inherit;
            display: inline-block;
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

        .nav-right {
            position: absolute;
            right: 0;
            margin-right: 10px;
        }

        h1 {
            margin-top: 15px;
        }

        .image-container {
            display: flex;
            align-items: center;
            /* Align items vertically in the center */
            margin-top: 20px;
        }

        .first-image,
        .second-image {
            max-width: 20%;
            /* Set the maximum width for the images */
            height: auto;
            border-radius: 8px;
            margin-right: 20px;
            /* Adjust the spacing between images and captions */
        }

        .image-container p {
            text-align: justify;
            font-size: 18px;
            flex: 1;
            /* Allow the text to take remaining space */
        }

        /* Style tambahan untuk toggle */
        .toggle-container {
            text-align: center;
            margin-top: 20px;
        }

        .toggle-container button {
            padding: 10px 20px;
            margin: 5px;
            background-color: #00A79D;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .toggle-container button:hover {
            background-color: #45a049;
        }

        .hidden {
            display: none;
        }

        .developer-image {
            width: 100%;
            max-width: 600px; /* Sesuaikan lebar maksimum sesuai kebutuhan */
            height: auto;
            margin: 20px 0;
            display: block; /* Ini akan membuat gambar terpusat */
        }
    </style>
</head>

<body>
    <div class="utama">
        <h1 align="center">Teknik Informatika dan Komputer PNJ</h1>
        <div class="pnjlogo">
            <img src="pnj-logo.svg" alt="logo tik" width="65" height="70">
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
                <li class="nav-right"><a href="logout.php">Logout</a>
                <li>
                <?php else: ?>
                <li class="nav-right"><a href="login.php">Login Admin</a>
                <li>
                <?php endif; ?>
        </ul>
    </div>

    <div class="toggle-container">
        <button id="btn-about-us">About TIK/PNJ</button>
        <button id="btn-about-dev">About Developer</button>
    </div>

    <main>
        <section id="section-about-us">
            <!-- Konten About Us -->
            <div class="image-container">
                <img src="pnj-logo.svg" alt="First Image" class="first-image">
                <p>Politeknik Negeri Jakarta telah tumbuh dan berkembang seiring dengan pesatnya perkembangan ilmu
                    pengetahuan dan teknologi.
                    Dengan selalu melakukan evaluasi diri dan pengembangan kemitraan dengan berbagai lembaga,
                    merupakan suatu komitmen kelembagaan sehingga setiap perubahan baik di sisi internal maupun
                    eksternal.
                    Politeknik Negeri Jakarta merupakan perguruan tinggi negeri yang menyelenggarakan program vokasi
                    yang
                    didirikan untuk memenuhi kebutuhan sumber daya manusia profesional di industri, baik industri jasa
                    maupun industri manufaktur.
                    Pembelajaran menerapkan Kurikulum Nasional (Kurnas) pendidikan profesional secara bertanggung jawab
                    dengan didukung oleh dosen-dosen profesional.
                    Sistemnya adalah dengan mempertemukan ilmu dan teknologi sesuai komposisi teori 45 persen dan
                    praktik 55 persen yang diterapkan secara harmonis untuk
                    menghasilkan lulusan yang profesional dan memenuhi kualifikasi industri.
                </p>
            </div>
            <div class="image-container">
                <img src="tik-pnj.png" alt="Second Image" class="second-image">
                <p>Jurusan Teknik Informatika dan Komputer (TIK) diresmikan pada 2 Juni 2014 yang bertujuan untuk
                    menghasilkan lulusan sarjana sains terapan yang berpengalaman dan mampu memecahkan masalah dalam
                    bidang Teknik Informatika dan Komputer dengan menganalisis, merancang dan membangun sistem. Saat ini
                    Jurusan Teknik Informatika dan Komputer memiliki empat program studi yaitu Teknik Informatika,
                    Teknik Multimedia dan Jaringan, Teknik Multimedia Digital dan Teknik Komputer dan Jaringan. Selain
                    itu terdapat program kerjasama baik dalam negeri maupun luar negeri. Kelas program kerja sama dalam
                    negeri yang diselenggarakan oleh jurusan TIK bekerja sama dengan B2PKLN Cevest Bekasi dan bekerja
                    sama dengan CCIT Fakutas Teknik Universitas Indonesia. Sedangkan kerja sama dengan luar negeri
                    antara Jurusan TIK dengan Asia e-University Malaysia adalah Teknik Informatika AeU dan Tekik
                    Multimedia dan Jaringan AeU.</p>
            </div>
        </section>
        <section id="section-about-dev" class="hidden">
            <!-- Konten Tentang Pengembang -->
            <img src="perpuspnj.jpg" alt="Perpustakaan PNJ" class="developer-image">
            <h2>Tentang Pengembang</h2>
            <p>
                Situs ini dikembangkan oleh Kelompok 1, yang terdiri dari mahasiswa-mahasiswa TI3B dari Program
                Studi Teknik Informatika Politeknik Negeri Jakarta. Kami berdedikasi untuk menyediakan informasi yang
                akurat dan terkini tentang Jurusan Teknik Informatika dan Komputer. Anggota tim kami adalah:
            </p>
            <ul>
                <li>Nurul Hasanah (2207411036) - <a href="https://github.com/hanavanilla20">hanavanilla20</a></li>
                <li>Muhammad Rizky Ramadhani (2207411044) - <a href="https://github.com/BuzanKun">BuzanKun</a></li>
                <li>Deva Alvyn Budinugraha (2207411050) - <a href="https://github.com/RioBithub">RioBithub</a></li>
                <li>Allia Chyanda Putri (2207411057) - <a href="https://github.com/chyanda07">chyanda07</a></li>
                <li>Fariz Haidar Zhaffran (2207411060) - <a href="https://github.com/farizhaidar">farizhaidar</a></li>
            </ul>
            <p>
                Tim ini bekerja sama untuk mengembangkan dan memelihara situs ini dengan tujuan untuk memudahkan akses
                informasi bagi mahasiswa dan dosen, serta meningkatkan pengalaman pengguna dalam menjelajahi dunia
                Teknik Informatika dan Komputer di Politeknik Negeri Jakarta.
            </p>
        </section>
    </main>

    <div class="footer">
        <p>&copy;
            <?= date("Y"); ?> Teknik Informatika dan Komputer PNJ
        </p>
    </div>

    <script>
        document.getElementById("btn-about-us").addEventListener("click", function () {
            document.getElementById("section-about-us").classList.remove("hidden");
            document.getElementById("section-about-dev").classList.add("hidden");
        });

        document.getElementById("btn-about-dev").addEventListener("click", function () {
            document.getElementById("section-about-dev").classList.remove("hidden");
            document.getElementById("section-about-us").classList.add("hidden");
        });
    </script>
</body>

</html>