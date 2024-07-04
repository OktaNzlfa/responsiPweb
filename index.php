<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleindex.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>POM Bensin - Welcome</title>
</head>
<body>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "logout") {
            echo"<script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasi logout',
                text: 'Anda telah berhasil logout dari sistem.',
            });</script>
            ";
        }
        else if ($_GET['pesan'] == "belumlogin") {
            echo"<script>
            Swal.fire({
                icon: 'error',
                title: 'Anda Belum Login',
                text: 'Silahkan login terlebih dahulu.',
            });</script>
            ";
        }
    }
    ?>

    <nav>
        <img id="logo" src="assets/img/logo.webp" alt="Logo perusahaan">
        <div class="cta">
            <h1>POM Bensin Mini IKAZA</h1>
        </div>
    </nav>
    <div class="container">
        <div class="hero">
            <h1>Selamat Datang di Website POM Bensin Mini IKAZA</h1>
            <p>Website yang akan mencatat transaksi yang dilakukan saat ada pelanggan. Dan menampilkannya secara rinci agar mudah untuk diperiksa oleh pemilik POM Bensin.</p>
        </div>
        <div class="features">
            <div class="feature">
                <h2>Catat Transaksi</h2>
                <p>Silahkan Masuk untuk mengisi data transaksi pembeli.</p>
                <a href="transaksi.php">Masuk</a>
            </div>
            <div class="feature">
                <h2>Laporan Transaksi</h2>
                <p>Silahkan Masuk untuk memeriksa data transaksi pembeli.</p>
                <a href="laporan.php">Masuk</a>
            </div>
        </div>
        <div class="testimonials">
            <h2>CATATAN / MOTIVASI</h2>
            <div class="testimonial">
                <p>"Jadilah pekerja yang jujur."</p>
                <div class="author">- Surti, CEO</div>
            </div><br>
            <div class="testimonial">
                <p>"Bekerjalah dengan giat."</p>
                <div class="author">- Ucup, Co CEO</div>
            </div><br>
            <div class="testimonial">
                <p>"Berkeja dengan niat yang baik."</p>
                <div class="author">- Tomo, karyawan</div>
            </div><br>
        </div>
    </div>
    <footer>
        <br>
        <strong>Copyright&copy; 2023-2024 <a href="#">okta</a>.</strong>
         All rights reserved.
         <div class="footer-right">
            <b>Version</b> 0.0.1
         </div>
    </footer>
</body>
</html>