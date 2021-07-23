<?php

include("../path.php");
include(ROOT_PATH . "/app/controllers/users.php");

$kategori_quiz = $_GET["kategori_quiz"];
$_SESSION["kategori_quiz"] = $kategori_quiz;

$res = mysqli_query($conn, "SELECT * FROM kategori_quiz WHERE kategori='$kategori_quiz'");

while ($row = mysqli_fetch_array($res)) {
    $_SESSION["exam_time"] = $row["waktu_ujian"];
}

date_default_timezone_set('Asia/Makassar');
$tanggal = date("Y-m-d H:i:s");

$_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($tanggal . "+$_SESSION[exam_time] minutes"));
$_SESSION["exam_start"] = "yes";


