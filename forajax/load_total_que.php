<?php

session_start();
include "../connect.php";
$total_que = 0;
$res1 = mysqli_query($conn, "SELECT * FROM pertanyaan WHERE kategori='$_SESSION[kategori_quiz]'");
$total_que = mysqli_num_rows($res1);
echo $total_que;