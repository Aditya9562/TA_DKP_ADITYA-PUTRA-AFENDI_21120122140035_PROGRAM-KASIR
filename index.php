<?php
include 'Restoran.php';

session_start();

if (!isset($_SESSION['restoran'])) {
    $_SESSION['restoran'] = new Restoran("SOKLAT");
}

$restoran = $_SESSION['restoran'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tambah_pesanan'])) {
        $pilihan_menu = $_POST['menu'];
        $jumlah_porsi = $_POST['jumlah'];
        $restoran->tambah_pesanan($pilihan_menu, $jumlah_porsi);
    } elseif (isset($_POST['selesai_pesan'])) {
        $restoran->hitung_total_harga();
        header("Location: selesai.php");
        exit();
    }
}
?>

<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>TA Program Kasir</title>
     <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>

<body>
     <header>
          <h2 class="text-center">SOKLAT</h2>
     </header>
    <h2 class="text-bawah">Daftar Menu</h2>
    <?php $restoran->show_menu(); ?>
    <h2 class="text-bawah">Keranjang Pesanan</h2>
    <?php $restoran->lihat_pesanan(); ?>
    <h2 class="text-bawah">Form Pemesanan</h2>
    <form method="POST" action="">
        <label for="menu" class="pesan">Pilih Menu   :</label>
        <select name="menu" id="menu" class="pesan">
            <option value="1">PAKET SOKLAT BESAR</option>
            <option value="2">PAKET SOKLAT KECIL</option>
            <option value="3">SOKLAT SEDANG</option>
            <option value="4">ROTI</option>
        </select>
        <br/>
        <label for="jumlah">Jumlah Porsi    :</label>
        <input type="number" name="jumlah" id="jumlah" min="1" value="1">
        <br>
        <button type="submit" name="tambah_pesanan" class="tambah">Tambahkan ke Keranjang</button>
    </form>
    <form method="POST" action="">
        <button type="submit" name="selesai_pesan">Selesai Memesan</button>
    </form>
</body>

</html>
