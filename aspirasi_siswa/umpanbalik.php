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
    <title>Umpan Balik - Aspirasi Siswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="bg-dashboard">

<div class="wrapper">

    <div class="sidebar">
        <h2>Aspirasi</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="history.php">History</a></li>
            <li><a href="status.php">Status</a></li>
            <li><a href="umpanbalik.php" class="active">Umpan Balik</a></li>
            <li><a href="keluar.php">Keluar</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="topbar">
            <h3>Umpan Balik Admin</h3>
        </div>

        <div class="box">

            <h4>Daftar Umpan Balik</h4>
            <div class="feedback-list">
                <div class="feedback-item">
                    <p><b>Admin:</b> Terima kasih atas laporan fasilitas kelas. Sedang diproses.</p>
                </div>

                <div class="feedback-item">
                    <p><b>Admin:</b> Kebersihan sekolah sudah kami perbaiki.</p>
                </div>
            </div>

            <hr>

            <h4>Kirim Umpan Balik Baru</h4>
            <form method="post">
                <textarea name="pesan" placeholder="Tulis umpan balik..." required></textarea>
                <button type="submit" class="btn">Kirim</button>
            </form>

        </div>
    </div>

</div>

</body>
</html>