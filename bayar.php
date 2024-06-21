<?php
session_start();
if (isset($_SESSION['keranjang'])) {
    $totalBarang = 0;
    foreach($_SESSION['keranjang'] as $barang) {
        if(isset($barang['total'])) {
            $totalBarang += $barang['total'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayar</title>
</head>
<body>
    <form action="" method="post">
        <label for="nominal"><h2>Masukkan Nominal Uang</h2></label>
        <input type="number" id="nominal" name="nominal" value="Jumlah Uang">
        <p>Total yang harus di bayar adalah: Rp. <?php echo $totalBarang;?></p>
        <button type="balik" name="balik" value="balik"><a href="index.php">Kembali</a></button>
        <button type="cetak" name="cetak" value="cetak">Bayar</button>
    </form>
    <?php
    if(isset($_POST['cetak'])){
        if(empty($_POST['nominal'])){
            echo "Nominal tidak boleh kosong";
            exit();
        } else {
            $nominal = $_POST['nominal'];
            if($nominal < $totalBarang) {
                echo "Uang yang dimasukkan kurang!";
                exit();
            } else {
                $_SESSION['nominal'] = $nominal;
                header('Location: struk.php');
                exit();
            }
        }
    }

   ?>
</body>
</html>