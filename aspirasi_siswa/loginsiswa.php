<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Siswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login-siswa">
    <div class="box-login">
        <h2>Login Siswa</h2>
        <form action="" method="POST">
            <input type="text" name="nis" placeholder="Masukkan NIS" class="input-control" required>
            <input type="submit" name="submit" value="Login" class="btn">
        </form>

<?php
if(isset($_POST['submit']) && isset($_POST['nis'])){
    session_start();
    include 'db.php';

    $nis = mysqli_real_escape_string($conn, $_POST['nis']);

    $cek = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE nis = '$nis'");

    if(mysqli_num_rows($cek) > 0){
        $d = mysqli_fetch_object($cek);

   
      $_SESSION['status_login'] = true;
      $_SESSION['nis'] = $d->nis;
      $_SESSION['kelas'] = $d->kelas;

        echo '<script>window.location="dashboardsiswa.php"</script>';
    } else {
        echo '<script>alert("NIS tidak ditemukan!")</script>';
    }
}
?> 
        
    </div>
</body>
</html>