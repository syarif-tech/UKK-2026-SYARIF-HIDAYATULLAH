<?php
session_start();
include 'db.php';

if(!isset($_SESSION['nis'])){
    header("Location: loginsiswa.php");
    exit();
}

$nis = $_SESSION['nis'];

// Ambil semua data + status
$query = mysqli_query($conn, "
    SELECT i.*, s.status
    FROM tb_input_aspirasi i
    LEFT JOIN tb_aspirasi s ON i.id_pelaporan = s.id_pelaporan
    WHERE i.nis = '$nis'
");

// Hitung total
$total = mysqli_num_rows($query);

// Hitung per status
$menunggu = 0;
$diproses = 0;
$selesai = 0;

while($row = mysqli_fetch_assoc($query)){
    if($row['status'] == 'Menunggu') $menunggu++;
    if($row['status'] == 'Proses') $diproses++;
    if($row['status'] == 'Selesai') $selesai++;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="bg-dashboard">

<div class="navbar">
    <div class="logo">ASPIRASI SISWA</div>
    <div>
        <a href="tambahaspirasi.php">Buat Aspirasi</a>
        <a href="keluar.php">Logout</a>
    </div>
</div>

<div class="header">
    <h2>Halo Siswa 👋</h2>
    <p>NIS: <?php echo $nis; ?></p>
</div>

<!-- CARD STATUS DI SAMPING TOTAL -->
<div class="card-container">

    <div class="card total">
        <h1><?php echo $total; ?></h1>
        <p>Total Aspirasi</p>
    </div>

    <div class="card menunggu">
        <h1><?php echo $menunggu; ?></h1>
        <p>Menunggu</p>
    </div>

    <div class="card diproses">
        <h1><?php echo $diproses; ?></h1>
        <p>Diproses</p>
    </div>

    <div class="card selesai">
        <h1><?php echo $selesai; ?></h1>
        <p>Selesai</p>
    </div>

</div>

</body>
</html>