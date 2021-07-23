<?php
include("../app/database/connect.php");

$id = $_GET["id"];
$res = mysqli_query($conn, "SELECT * FROM kategori_quiz where id=$id");
while ($row = mysqli_fetch_array($res)) {
    $kategori_ujian = $row['kategori'];
    $waktu_ujian = $row['waktu_ujian'];
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
                        <h1>Edit Kategori Ujian</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kategori -->
        <form name="form1" action="" method="post">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><strong>Edit</strong><small> Ujian</small></div>
                        <div class="card-body card-block">
                            <div class="form-group"><label for="company" class=" form-control-label">Kategori Ujian Baru</label><input type="text" value="<?php echo $kategori_ujian; ?>" name="kategoriujian" placeholder="Kategori Ujian" class="form-control"></div>
                            <div class="form-group"><label for="vat" class=" form-control-label">Waktu Ujian</label><input type="text" value="<?php echo $waktu_ujian; ?>" name="waktuujian" placeholder="Waktu" class="form-control"></div>
                            <div><button type="submit" name="submit1" class="btn btn-success">Update Ujian</button></div>
                    </div>
                </div>  
            </div> <!-- .content -->

        </form>
    </div><!-- /#right-panel -->

<?php
if (isset($_POST['submit1'])) { 
    mysqli_query($conn, "UPDATE kategori_quiz set kategori='$_POST[kategoriujian]', waktu_ujian='$_POST[waktuujian]' WHERE id=$id") or die(mysqli_error($conn));
    ?>
    <script type="text/javascript">
        window.location = "kategori_ujian.php";
    </script>
    <?php
}
?>

<?php include("footer.php")?>

</html>
