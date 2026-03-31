<?php
session_start();
if($_SESSION['status_login'] != true){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History - Aspirasi Siswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="bg-dashboard">

<div class="wrapper">

    <div class="sidebar">
        <h2>Aspirasi</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="history.php" class="active">History</a></li>
            <li><a href="status.php">Status</a></li>
            <li><a href="umpanbalik.php">Umpan Balik</a></li>
            <li><a href="keluar.php">Keluar</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="topbar">
            <h3>History Aspirasi</h3>
        </div>

        <div class="box">
            <ul class="activity">
                <li>Aspirasi fasilitas kelas</li>
                <li>Aspirasi kebersihan sekolah</li>
                <li>Aspirasi kantin sehat</li>
            </ul>
        </div>
    </div>

</div>

</body>
</html>