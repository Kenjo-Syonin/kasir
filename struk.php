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
    <title>Document</title>
    <style>
        body{
            height:100vh; 
            display:flex; 
            flex-direction:column; 
            justify-content:center; 
            align-items:center;
        }
        hr{
            border: 1px solid black;
            width: 300px;
        }
    </style>
</head>
<body>
    <h1>BUKTI PEMBAYARAN</h1>

    <p>No. Transaksi = #<?php 
    $a=array(1,2,3,4,5,6,7,8,9,0);
    $random_keys=array_rand($a,5);
    echo $a[$random_keys[0]];
    echo $a[$random_keys[1]];
    echo $a[$random_keys[2]];
    echo $a[$random_keys[3]];
    echo $a[$random_keys[4]];
    ?></p>

    <p>Tanggal:<?php 
    $mydate=getdate(date("U"));
    echo "$mydate[mday] $mydate[month], $mydate[year]";
    ?></p>

    <hr>
    <?php 
    foreach($_SESSION['keranjang'] as $key => $barang){ 
        echo $barang['nama']; 
        echo " Rp. " . $barang['harga']; 
        echo " x" . $barang['jmlh']; 
        echo " = " . $barang['total'] . "<br>"; 
        }
    ?>
    <hr>
    <p>Total: <?php echo  $totalBarang ;?></p>
    <p>Tunai: <?php echo $_SESSION['nominal'];?></p>
    <p>Kembalian: <?php $kembali = $_SESSION['nominal'] - $totalBarang; echo $kembali;?></p>
    <hr>
    <h3>Terimakasih atas kunjungan anda!</h3>    

    <button><a href="destroy.php">Kembali</a></button>

</body>
</html>