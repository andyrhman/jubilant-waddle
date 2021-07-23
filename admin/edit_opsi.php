<?php
include("../app/database/connect.php");

$id = $_GET['id'];
$id1 = $_GET['id1'];

$pertanyaan = '';
$opsi1 = '';
$opsi2 = '';
$opsi3 = '';
$opsi4 = '';
$jawaban = '';

$res = mysqli_query($conn, "SELECT * FROM pertanyaan WHERE id=$id");
while ($row = mysqli_fetch_array($res)) {
    $pertanyaan = $row["pertanyaan"];
    $opsi1 = $row["opt1"];
    $opsi2 = $row["opt2"];
    $opsi3 = $row["opt3"];
    $opsi4 = $row["opt4"];
    $jawaban = $row["jawaban"];

}

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<?php include("header.php")?>

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Pertanyaan dengan teks -->
    <form name="form1" action="" method="post" enctype="multipart/form-data">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><strong>Edit</strong><small> Ujian</small></div>
                    <div class="card-body card-block">
                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan Ujian</label><input type="text" name="pertanyaan" value="<?php echo $pertanyaan?>" placeholder="Buat Pertanyaan Ujian" class="form-control"></div>
                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan opsi 1</label><input type="text" name="opsi1" value="<?php echo $opsi1?>" placeholder="Buat Pertanyaan opsi 1" class="form-control"></div>
                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan opsi 2</label><input type="text" name="opsi2" value="<?php echo $opsi2?>" placeholder="Buat Pertanyaan opsi 2" class="form-control"></div>
                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan opsi 3</label><input type="text" name="opsi3" value="<?php echo $opsi3?>" placeholder="Buat Pertanyaan opsi 3" class="form-control"></div>
                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan opsi 4</label><input type="text" name="opsi4" value="<?php echo $opsi4?>" placeholder="Buat Pertanyaan opsi 4" class="form-control"></div>
                        <div class="form-group"><label for="company" class=" form-control-label">Jawaban</label><input type="text" name="jawaban" value="<?php echo $jawaban?>" placeholder="Buat Jawaban" class="form-control"></div>
                        <div><button type="submit" name="submit1" class="btn btn-success">Update Ujian!</button></div>
                </div>
            </div>  
        </div> <!-- .content -->
    </form>
<?php

if (isset($_POST['submit1'])) {
    mysqli_query($conn, "UPDATE pertanyaan SET pertanyaan='$_POST[pertanyaan]', opt1='$_POST[opsi1]', opt2='$_POST[opsi2]', opt3='$_POST[opsi3]', opt4='$_POST[opsi4]', jawaban='$_POST[jawaban]' WHERE id=$id ");

    ?>
    <script type="text/javascript">
        window.location="tambah_edit_pertanyaan_ujian.php?id=<?php echo $id1?>"
    </script>
    <?php
}

?>


<?php include("footer.php")?>

</html>