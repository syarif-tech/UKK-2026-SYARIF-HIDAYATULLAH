<?php
session_start();
include 'db.php';

if(!isset($_SESSION['nis'])){
    echo "<script>
        alert('Silakan login dulu!');
        window.location='loginsiswa.php';
    </script>";
    exit();
}

$nis = $_SESSION['nis'];

// Ambil data kategori
$data_kategori = mysqli_query($conn, "SELECT * FROM tb_kategori");

if(isset($_POST['submit'])){

    $id_kategori = $_POST['kategori'];
    $lokasi = mysqli_real_escape_string($conn, $_POST['lokasi']);
    $ket = mysqli_real_escape_string($conn, $_POST['ket']);
    $tgl = date('Y-m-d H:i:s');

    $insert = mysqli_query($conn, "
    INSERT INTO tb_input_aspirasi 
    (nis, id_kategori, lokasi, ket, tgl_input)
    VALUES 
    ('$nis', '$id_kategori', '$lokasi', '$ket', '$tgl')
");

if($insert){

    $id_pelaporan = mysqli_insert_id($conn);

    $status_insert = mysqli_query($conn, "
        INSERT INTO tb_aspirasi (status, id_pelaporan) 
        VALUES ('menunggu', '$id_pelaporan')
    ");

    if($status_insert){
        echo "<script>
            alert('Aspirasi berhasil dikirim!');
            window.location='dashboardsiswa.php';
        </script>";
    } else {
        echo "<script>alert('Gagal simpan status!');</script>";
    }
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Aspirasi</title>
    <link rel="stylesheet" href="style.css?v=1">
</head>
<body id="bg-login-siswa">

<div class="box-login">
    <h2>Tambah Aspirasi</h2>

    <form method="POST">

        <select name="kategori" class="input-control" required>
            <option value="">-- Pilih Kategori --</option>
            <?php while($k = mysqli_fetch_array($data_kategori)){ ?>
                <option value="<?php echo $k['id_kategori']; ?>">
                    <?php echo $k['kat_kategori']; ?>
                </option>
            <?php } ?>
        </select>

        <br><br>

        <input type="text" 
               name="lokasi" 
               class="input-control"
               placeholder="Lokasi kejadian (contoh: Lab Komputer)"
               required>

        <br><br>

        <textarea name="ket"
                  class="input-control"
                  placeholder="Tulis aspirasi Anda..."
                  required></textarea>

        <br><br>

        <input type="submit" 
               name="submit" 
               value="Kirim Aspirasi"
               class="btn">

    </form>
</div>

</body>
</html>