<?php
include("../app/database/connect.php");

$id = $_GET['id'];
$id1 = $_GET['id1'];
mysqli_query($conn, "DELETE FROM pertanyaan WHERE id=$id")

?>

<script type="text/javascript">
        window.location="tambah_edit_pertanyaan_ujian.php?id=<?php echo $id1?>"
</script>