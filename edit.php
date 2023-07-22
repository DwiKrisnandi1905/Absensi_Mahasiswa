<!-- proses penyimpanan -->

<?php  
    include "koneksi.php";

    $id = $_GET['id'];

    $cari = mysqli_query($konek, "select * from mahasiswa where id='$id'");
    $hasil = mysqli_fetch_array($cari);

    //jika tombol simpan di klik
    if(isset($_POST['btnSimpan']))
    {
        //baca isi inputan form
        $nokartu = $_POST['nokartu'];
        $nama    = $_POST['nama'];
        $kelas  = $_POST['kelas'];

        //simpan ke tabel mahasiswa
        $simpan = mysqli_query($konek, "update mahasiswa set nokartu='$nokartu', nama='$nama', kelas='$kelas' where id='$id'");

        //jika berhasil tersimpan tampilkan pesan tersimpan,
        //kembali ke data mahasiswa
        if ($simpan) 
        {
            echo "
                <script>
                    alert('Tersimpan');
                    location.replace('datamahasiswa.php');
                </script>
            ";
        }
        else
        {
            echo "
                <script>
                    alert('Gagal Tersimpan');
                    location.replace('datamahasiswa.php');
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php"; ?>
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    
    <?php include "menu.php"; ?>

    <div class="container-fluid">
        <h3>Tambah Data Mahasiswa</h3>
    

    <!-- format input -->
        <form method="POST">
            <div class="form-group">
                <label>No.Kartu</label>
                <input type="text" name="nokartu" id="nokartu" placeholder="nomor kartu RFID" class="form-control" style="width: 200px" value="<?php echo $hasil['nokartu']; ?>">
            </div>
            <div class="form-group">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama" id="nama" placeholder="nama mahasiswa" class="form-control" style="width: 400px" value="<?php echo $hasil['nama']; ?>">
            </div>
            <div class="form-group">
                <label>Kelas</label>
                <input type="text" name="kelas" id="kelas" placeholder="kelas" class="form-control" style="width: 200px" value="<?php echo $hasil['nama']; ?>">
            </div>
            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>

        </form>
    </div>

    <?php include "footer.php"; ?>

</body>
</html>