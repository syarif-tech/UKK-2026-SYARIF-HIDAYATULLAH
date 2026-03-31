<?php
session_start();
include 'db.php';

/* ================= TOTAL DATA ================= */

$total = mysqli_fetch_array(mysqli_query($conn,"
SELECT COUNT(*) as total FROM tb_input_aspirasi
"));

$menunggu = mysqli_fetch_array(mysqli_query($conn,"
SELECT COUNT(*) as total 
FROM tb_aspirasi 
WHERE status='Menunggu'
"));

$diproses = mysqli_fetch_array(mysqli_query($conn,"
SELECT COUNT(*) as total 
FROM tb_aspirasi 
WHERE status='Proses'
"));

$selesai = mysqli_fetch_array(mysqli_query($conn,"
SELECT COUNT(*) as total 
FROM tb_aspirasi 
WHERE status='Selesai'
"));

/* ================= DATA ASPIRASI ================= */

$data = mysqli_query($conn,"
SELECT 
i.*,
a.status,
a.feedback,
k.kat_kategori
FROM tb_input_aspirasi i
LEFT JOIN tb_aspirasi a ON i.id_pelaporan = a.id_pelaporan
LEFT JOIN tb_kategori k ON i.id_kategori = k.id_kategori
ORDER BY i.tgl_input DESC
");

?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard Admin</title>

<link rel="stylesheet" href="style.css">

</head>

<body id="bg-dashboard">

<div class="wrapper">

<!-- ================= SIDEBAR ================= -->

<div class="sidebar">

<h2>ASPIRASI</h2>

<ul>
<li><a class="active" href="#">Dashboard</a></li>
<li><a href="keluar.php">Logout</a></li>
</ul>

</div>

<!-- ================= MAIN ================= -->

<div class="main">

<div class="topbar">
<h2>Dashboard Admin</h2>
</div>

<!-- ================= CARD ================= -->

<div class="card-container">

<div class="card total">
<h1><?php echo $total['total']; ?></h1>
<p>Total Aspirasi</p>
</div>

<div class="card menunggu">
<h1><?php echo $menunggu['total']; ?></h1>
<p>Menunggu</p>
</div>

<div class="card">
<h1><?php echo $diproses['total']; ?></h1>
<p>Diproses</p>
</div>

<div class="card selesai">
<h1><?php echo $selesai['total']; ?></h1>
<p>Selesai</p>
</div>

</div>

<!-- ================= TABEL ================= -->

<div class="box">

<h3>Data Aspirasi Siswa</h3>

<table class="table-status">

<tr>
<th>NIS</th>
<th>Kategori</th>
<th>Lokasi</th>
<th>Keterangan</th>
<th>Status</th>
<th>Feedback</th>
<th>Tanggal</th>
<th>Aksi</th>
</tr>

<?php while($d = mysqli_fetch_array($data)){ ?>

<tr>

<td><?php echo $d['nis']; ?></td>

<td><?php echo $d['kat_kategori']; ?></td>

<td><?php echo $d['lokasi']; ?></td>

<td><?php echo $d['ket']; ?></td>

<td>
<?php
$status = $d['status'];

if($status == "Menunggu"){
echo "<span class='badge proses'>Menunggu</span>";
}

else if($status == "Proses"){
echo "<span class='badge menunggu'>Diproses</span>";
}

else if($status == "Selesai"){
echo "<span class='badge selesai'>Selesai</span>";
}

?>
</td>

<td><?php echo $d['feedback']; ?></td>

<td><?php echo $d['tgl_input']; ?></td>

<td>

<a class="btn"
href="prosesaspirasi.php?id=<?php echo $d['id_pelaporan']; ?>">
Proses
</a>

<br><br>

<a class="btn"
href="hapusaspirasi.php?id=<?php echo $d['id_pelaporan']; ?>"
onclick="return confirm('Yakin hapus aspirasi?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>
</div>

</body>
</html>