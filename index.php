<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php"; ?>
    <title>Menu Utama</title>
    <style>
        .card1 {
            background: linear-gradient(to right, #8A2BE2, #0BCEF1, #0B77F1, #8A2BE2);
            border-radius: 10px;
            padding: 0px;
            width: 600px;
            margin: 80px 0 auto;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <?php include "menu.php"; ?>
    <div class="container-fluid" style="padding-top: 10%; text-align: center">
    <div class="card1">
        <h1>
            Selamat Datang <br>
            SISTEM ABSENSI MAHASISWA <br>
            BERBASIS KARTU RFID
        </h1>
    </div>
    </div>

    <?php include "footer.php"; ?> 
</body>
</html>