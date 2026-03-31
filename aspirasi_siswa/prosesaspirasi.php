<?php
include 'db.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"
SELECT * FROM tb_aspirasi 
WHERE id_pelaporan='$id'
");

$d = mysqli_fetch_array($data);

if(isset($_POST['submit'])){

$status = $_POST['status'];
$feedback = $_POST['feedback'];

mysqli_query($conn,"
UPDATE tb_aspirasi
SET status='$status',
feedback='$feedback'
WHERE id_pelaporan='$id'
");

echo "<script>
alert('Aspirasi berhasil diproses');
window.location='dashboard.php';
</script>";

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Proses Aspirasi</title>
<link rel="stylesheet" href="style.css">

</head>

<body id="bg-dashboard">

<div class="wrapper">

<div class="main">

<div class="box">

<h3>Proses Aspirasi</h3>

<form method="POST">

<label>Status</label>

<select name="status" class="input-control">

<option value="Menunggu">Menunggu</option>
<option value="Proses">Diproses</option>
<option value="Selesai">Selesai</option>

</select>

<br><br>

<label>Feedback Admin</label>

<textarea name="feedback" rows="4"></textarea>

<br><br>

<button class="btn" name="submit">Simpan</button>

</form>

</div>

</div>

</div>

</body>
</html>