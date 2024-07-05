<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POM Bensin - Transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="str.css">
</head>
<body>
    <div class="container">

        <a href="index.html">
        <img src="back.png" alt="" srcset="" id = "back">
        </a>

        <div class="form">
            <h1>TRANSAKSI</h1>

            <form id="pelangganForm" style="display: block;" action="transaksi.php" method="POST">
                <h5>Tanggal</h5>
                <input type="date" name="tanggal">

                <h5>Jenis Bensin</h5>
                <select id="jenis_bensin" name="jenis_bensin">
                    <option value="">Pilih...</option>
                    <option value="pertalite">Bensin Pertalite (Rp.10.000/liter)</option>
                    <option value="bensin-premium">Bensin Premium (Rp.13.000/liter)</option>
                    <option value="solar">Solar/Diesel (Rp.18.000/liter)</option>
                </select>

                <h5>Harga per liter (Rp)</h5>
                <input type="number"  name="harga" required step="any"><br>
        
                <h5>Jumlah liter</h5>
                <input type="number" name="liter" required step="any"><br><br>
        
                <button type="submit" value="Hitung Total">Total</button>

                <?php
                // Proses perhitungan total pembelian
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Mengambil nilai dari form
                        $tanggal = $_POST["tanggal"];
                        $bensin = $_POST["jenis_bensin"];
                        $harga_per_liter = $_POST["harga"];
                        $jumlah_liter = $_POST["liter"];

                    // Validasi input (opsional)
                        if ($bensin == "") {
                            echo "<p style='color: red;'>Silakan pilih jenis bensin terlebih dahulu.</p>";
                        } elseif ($harga_per_liter <= 0 || $jumlah_liter <= 0) {
                            echo "<p style='color: red;'>Mohon masukkan angka yang valid untuk harga dan jumlah liter.</p>";
                        } else {
                        // Menghitung total pembelian berdasarkan jenis bensin
                            switch ($bensin) {
                                case 'pertalite':
                                    $output = "Bensin Pertalite (Rp.10.000/liter)|10.000";
                                    $bensin = "Bensin Pertalite (Rp.10.000/liter)";
                                    break;
                                case 'bensin-premium':
                                    $output = "Bensin Premium (Rp.13.000/liter)|13.000";
                                    $bensin = "Bensin Premium (Rp.13.000/liter)";
                                    break;
                                case 'solar':
                                    $output = "Solar/Diesel (Rp.18.000/liter)|18.000";
                                    $bensin = "Solar/Diesel (Rp.18.000/liter)";
                                    break;
                            default:
                                $nama_bensin = "Jenis Bensin Tidak Dikenali";
                                break;
                            }

                        // Menghitung total pembelian
                            $total_pembelian = $harga_per_liter * $jumlah_liter;
                            $output = date('y-m-d', strtotime($tanggal)) . "|" . $bensin . "|" . $harga_per_liter . "|" . $jumlah_liter . "|" . number_format($total_pembelian, 3) . "|";

                            echo "<h3>Total Pembelian Bensin:</h3>";
                            echo "<p>Tanggal : " . date($tanggal). "</p>";
                            echo "<p>Jenis Bensin: " . $bensin . "</p>";
                            echo "<p>Harga per liter: Rp " . number_format($harga_per_liter, 3) . "</p>";
                            echo "<p>Jumlah liter: " . number_format($jumlah_liter, 3) . "</p>";
                            echo "<h4>Total: Rp " . number_format($total_pembelian, 3) . "</h4>";

                        // Menampilkan data transaksi ke layar
                            echo "<p>Data transaksi:</p>";
                            echo "<pre>" . $output . "</pre>";

                        // Menyimpan ke dalam file.txt
                            $file = 'data.txt';
                            if (file_put_contents($file, $output . "\n", FILE_APPEND | LOCK_EX) !== false) {
                                echo "<p>Transaksi berhasil disimpan ke data.txt.</p>";
                            } else {
                                echo "<p style='color: red;'>Gagal menyimpan transaksi ke data.txt.</p>";
                            }
                        }
                    }
                ?>

            </form><br>

            <h1>TERIMAKASIH</h1>
        </div>
        <a href="laporan.php"><h2>Lihat Laporan</h2></a>
    </div>

</body>
</html>