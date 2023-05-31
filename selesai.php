<?php
include 'Restoran.php';

session_start();

if (!isset($_SESSION['restoran'])) {
    header("Location: index.php");
    exit();
}

$restoran = $_SESSION['restoran'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>SOKLAT - Struk Pembayaran</title>
     <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>

<body>
    <header>
    <h1 class="text-center">SOKLAT - Struk Pembayaran</h1>
    </header>
    <h2 class="text-bawah">Pesanan Anda:</h2>
    <?php $restoran->lihat_pesanan(); ?>
    <p class="total-harga">Total Harga: Rp. <?php echo $restoran->hitung_total_harga(); ?></p>
    <?php if ($restoran->diskon() > 0) : ?>
        <p>Diskon: Rp. <?php echo $restoran->diskon(); ?></p>
        <p>Total Harga Setelah Diskon: Rp. <?php echo $restoran->hitung_total_harga_setelah_diskon(); ?></p>
    <?php else : ?>
        <p>Anda tidak mendapatkan diskon</p>
    <?php endif; ?>
    <form method="POST" action="">
        <button type="submit" name="selesai" class="selesai">Selesai</button>
    </form>
</body>

</html>
