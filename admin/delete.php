<?php
include("../app/database/connect.php");

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM kategori_quiz WHERE id=$id");
?>

<script type="text/javascript">
    window.location="kategori_ujian.php";
</script>