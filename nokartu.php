<?php 
    include "koneksi.php";
    //baca isi tabel tmprfid
    $sql = mysqli_query($konek, "select * from tmprfid");
    $data = mysqli_fetch_array($sql);
    
    // Check if any row is returned
    if ($data) {
        //baca nokartu
        $nokartu = $data['nokartu'];
    } else {
        // Set a default value if no row is returned
        $nokartu = '';
    }
?>

<div class="form-group">
    <label>No.Kartu</label>
    <input type="text" name="nokartu" id="nokartu" placeholder="tempelkan kartu RFID anda" class="form-control" style="width: 200px" value="<?php echo $nokartu; ?>">
</div>
