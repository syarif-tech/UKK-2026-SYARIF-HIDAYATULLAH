<?php
session_start();
if($_SESSION['status_login'] != true){
    header("Location: loginadmin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Status - Aspirasi Siswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="bg-dashboard">

<div class="wrapper">

    <div class="sidebar">
        <h2>Aspirasi</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="history.php">History</a></li>
            <li><a href="status.php" class="active">Status</a></li>
            <li><a href="umpanbalik.php">Umpan Balik</a></li>
            <li><a href="keluar.php">Keluar</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="topbar">
            <h3>Status Aspirasi</h3>
        </div>

        <div class="box">
            <table class="table-status">
                <tr>
                    <th>No</th>
                    <th>Judul Aspirasi</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Perbaikan Fasilitas Kelas</td>
                    <td><span class="badge proses">Diproses</span></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Kebersihan Sekolah</td>
                    <td><span class="badge selesai">Selesai</span></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Kantin Sehat</td>
                    <td><span class="badge ditolak">Ditolak</span></td>
                </tr>
            </table>
        </div>
    </div>

</div>

</body>
</html>