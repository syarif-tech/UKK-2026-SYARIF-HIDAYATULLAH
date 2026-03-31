<?php

include 'db.php';

$id = $_GET['id'];

mysqli_query($conn,"
DELETE FROM tb_input_aspirasi 
WHERE id_pelaporan='$id'
");

mysqli_query($conn,"
DELETE FROM tb_aspirasi 
WHERE id_pelaporan='$id'
");

header("location:dashboard.php");

?>