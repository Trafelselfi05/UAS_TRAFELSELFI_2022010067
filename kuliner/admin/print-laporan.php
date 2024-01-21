<?php

require("App/function.php");
$tanggal = $_GET['tanggal'];
$result = query("SELECT * FROM detail_pemesan 
               INNER JOIN produk ON detail_pemesan.id_produk = produk.id_produk
               INNER JOIN users ON detail_pemesan.username = users.username
               INNER JOIN pemesan ON detail_pemesan.id_pemesan = pemesan.id_pemesan 
               WHERE tanggal_pemesan = '$tanggal'");
               
foreach ($result as $row) {
    $temp = $row['total_harga'];
    $tanggal_pesanan = $row['tanggal_pemesan'];
    if (isset($totalHarga)) {
        if ($totalHarga != $temp) {
            $totalHarga += $row['total_harga'];
        }
    } else {
        $totalHarga = $row['total_harga'];
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<script>
    window.print();
</script>

<body>
    <div class="container mt-5">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-3">
                <h1>Joy <span class="fw-bold text-primary">Bakery</span></h1>
                <table>
                    <tr>
                        <td>Admin</td>
                        <td> : </td>
                        <td>Selfi</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>Buaran </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4">
                <table>
                    <tr>
                        <td>Tanggal Laporan </td>
                        <td>: </td>
                        <td><?= $tanggal_pesanan ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-7">
                <p class="text-center">----------------------------------------------------------------------------------------------------</p>
                <table class="table table-bordered" id="example">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Subharga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $produk) : ?>
                            <tr>
                                <td><?= $produk['nama_produk']; ?></td>
                                <td>Rp. <?= number_format($produk['harga'], 2, ",", ".") ?></td>
                                <td><?= $produk['jumlah_produk']; ?></td>
                                <td>Rp. <?= number_format($produk['jumlah_produk'] * $produk['harga'], 2, ",", ".") ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total Belanja</th>
                            <th colspan="2">Rp. <?= number_format($totalHarga, 2, ",", ".") ?></th>
                        </tr>
                    </tfoot>
                </table>
                <p class="text-center">----------------------------------------------------------------------------------------------------</p>
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5" style="line-height: 1.3px;">
                        <p>------------------------------------------</p>
                        <p>Terima kasih atas Kunjungan anda</p>
                        <p>jangan lupa datang kembali</p>
                        <p class="fw-bold text-danger">Note : Barang yang sudah di beli </p>
                        <p class="fw-bold text-danger">tidak dapat ditukarkan kembali</p>
                        <p>------------------------------------------</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>