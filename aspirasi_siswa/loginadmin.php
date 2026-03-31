<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Admin</title>
<link rel="stylesheet" href="style.css">
</head>
<body id="bg-login-admin">

<div class="box-login">
<h2>Login Admin</h2>

<form method="POST">
    <input type="text" name="user" placeholder="Username" class="input-control" required>
    <input type="password" name="pass" placeholder="Password" class="input-control" required>
    <input type="submit" name="submit" value="Login" class="btn">
</form>

<?php 
if(isset($_POST['submit'])){

    include 'db.php';

    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    $cek = mysqli_query($conn,
        "SELECT * FROM tb_admin 
         WHERE username='$user' 
         AND password='".MD5($pass)."'"
    );

    if(mysqli_num_rows($cek) > 0){
        $d = mysqli_fetch_object($cek);

        $_SESSION['status_login'] = true;
        $_SESSION['username'] = $d->username;

        header("Location: dashboard.php");
        exit();
    } else {
        echo '<script>alert("Username atau Password Salah!")</script>';
    }
}
?>

</div>
</body>
</html>