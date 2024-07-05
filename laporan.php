<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POM Bensin - laporan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img{
            width: 3%;
            height: 3%;
            display: flex;
            margin-top: 1rem;
        }
    </style>
</head>
<body>

    <a href="index.html">
        <img src="back.png" alt="" srcset="" id = "back">
    </a>

    <h2>Laporan Transaksi Pembelian Bensin</h2>

    <?php
    // Membaca isi file.txt
    $file = 'data.txt';
    if (file_exists($file)) {
        $content = file_get_contents($file);

        // Memisahkan setiap transaksi berdasarkan baris
        $transactions = explode("\n", $content);

        if (!empty($transactions)) {
            // Menampilkan tabel laporan
            echo "<table>";
            echo "<tr><th>Tanggal</th><th>Jenis Bensin</th><th>Harga per liter (Rp)</th><th>Jumlah liter</th><th>Total (Rp)</th></tr>";
            
            foreach ($transactions as $transaction) {
                if (!empty($transaction)) {
                    // Memecah data transaksi berdasarkan delimiter tertentu (misalnya, '|')
                    $data = explode("|", $transaction);

                    // Menampilkan baris transaksi dalam tabel
                    echo "<tr>";
                    echo "<td>" . $data[0] . "</td>"; // Tanggal
                    echo "<td>" . $data[1] . "</td>"; // Jenis Bensin
                    echo "<td>" . $data[2] . "</td>"; // Harga per liter
                    echo "<td>" . $data[3] . "</td>"; // Jumlah liter
                    echo "<td>" . $data[4] . "</td>"; // Total
                    echo "</tr>";
                }
            }
            
            echo "</table>";
        } else {
            echo "<p>Tidak ada transaksi yang tersimpan.</p>";
        }
    } else {
        echo "<p>File tidak ditemukan.</p>";
    }
    ?>

</body>
</html>
