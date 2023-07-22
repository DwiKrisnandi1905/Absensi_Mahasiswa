<!-- proses penyimpanan -->

<?php  
    include "koneksi.php";

    //jika tombol simpan di klik
    if(isset($_POST['btnSimpan']))
    {
        //baca isi inputan form
        $nokartu = $_POST['nokartu'];
        $nama    = $_POST['nama'];
        $kelas  = $_POST['kelas'];

        //simpan ke tabel mahasiswa
        $simpan = mysqli_query($konek, "insert into mahasiswa(nokartu, nama, kelas) values('$nokartu', '$nama', '$kelas')");

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

    //kosongkan tabel tmprfid
    mysqli_query($konek, "delete from tmprfid");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php"; ?>
    <title>Tambah Data Mahasiswa</title>

    <!-- pembacaan no kartu otomatis -->
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $("#norfid").load('nokartu.php')
            }, 0); //pembacaan nokartu.php, tiap 1 detik = 1000
        });
    </script>

</head>
<body>
    
    <?php include "menu.php"; ?>

    <div class="container-fluid">
        <h3>Tambah Data Mahasiswa</h3>
    

    <!-- format input -->
        <form method="POST">
            <div id="norfid"></div>
            <div class="form-group">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama" id="nama" placeholder="nama mahasiswa" class="form-control" style="width: 400px">
            </div>
            <div class="form-group">
                <label>Kelas</label>
                <input type="text" name="kelas" id="kelas" placeholder="kelas" class="form-control" style="width: 200px">
            </div>
            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>

        </form>
    </div>

    <?php include "footer.php"; ?>

</body>
</html>