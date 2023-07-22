<?php 
    include "koneksi.php";

//baca nomor kartu dari NodeMCU
$nokartu = $_GET['nokartu'];
//kosongkan tabel rfid
mysqli_query($konek, "Delete from tmprfid");

//simpan nomor kartu yang baru ke tabel tmprfid
$simpan = mysqli_query($konek, "insert into tmprfid(nokartu)values('$nokartu')");
if($simpan)
    echo "Berhasil";
else
    echo "Gagal";
?>