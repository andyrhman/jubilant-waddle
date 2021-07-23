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

        <!-- Pertanyaan dengan teks & gambar -->
        <div class="breadcrumbs">
            <div class="col-sm-6">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Pertanyaan Ujian</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pertanyaan -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><strong>Edit</strong><small> Ujian</small></div>

                <form name="form1" action="" enctype="multipart/form-data" method="post">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Pertanyaan Ujian</label>
                            <input type="text" name="fpertanyaan" value="<?php echo $pertanyaan?>" placeholder="Buat Pertanyaan Ujian" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Pertanyaan opsi 1</label>
                            <div><img src="<?php echo $opsi1?>" alt="gambar" width="50" height="50"></div> <br>
                            <input type="file" name="fopsi1" style="padding-bottom: 35px;" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Pertanyaan opsi 2</label>
                            <div><img src="<?php echo $opsi2?>" alt="gambar" width="50" height="50"></div> <br>
                            <input type="file" name="fopsi2" style="padding-bottom: 35px;" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Pertanyaan opsi 3</label>
                            <div><img src="<?php echo $opsi3?>" alt="gambar" width="50" height="50"></div> <br>
                            <input type="file" name="fopsi3" style="padding-bottom: 35px;" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Pertanyaan opsi 4</label>
                            <div><img src="<?php echo $opsi4?>" alt="gambar" width="50" height="50"></div> <br>
                            <input type="file" name="fopsi4" style="padding-bottom: 35px;" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Jawaban</label>
                            <div><img src="<?php echo $jawaban?>" alt="gambar" width="50" height="50"></div> <br>
                            <input type="file" name="fjawaban" class="form-control">
                        </div>

                        <div><button type="submit" name="submit2" class="btn btn-success">Update Ujian!</button></div>
                    </div>
                </form> 
                            
            </div>  
        </div> <!-- .content -->


        <?php

if (isset($_POST['submit2'])) {

    $opt1 = $_FILES["fopsi1"]["name"];
    $opt2 = $_FILES["fopsi2"]["name"];
    $opt3 = $_FILES["fopsi3"]["name"];
    $opt4 = $_FILES["fopsi4"]["name"];
    $jawaban = $_FILES["fjawaban"]["name"];
 
    $tm = md5(time());

    if ($opt1!="") {

        $dst1 = "./opt_images/" . $tm . $opt1;
        $dst_db1 = "opt_images/" . $tm . $opt1;
        move_uploaded_file($_FILES["fopsi1"] ["tmp_name"], $dst1);
    
        mysqli_query($conn, "UPDATE pertanyaan SET pertanyaan='$_POST[fpertanyaan]', opt1='$dst_db1' WHERE id=$id ") or die(mysqli_error($conn));

    }

    if ($opt2!="") {

        $dst2 = "./opt_images/" . $tm . $opt2;
        $dst_db2 = "opt_images/" . $tm . $opt2;
        move_uploaded_file($_FILES["fopsi2"] ["tmp_name"], $dst2);
    
        mysqli_query($conn, "UPDATE pertanyaan SET pertanyaan='$_POST[fpertanyaan]', opt2='$dst_db2' WHERE id=$id ") or die(mysqli_error($conn));

    }

    if ($opt3!="") {

        $dst3 = "./opt_images/" . $tm . $opt3;
        $dst_db3 = "opt_images/" . $tm . $opt3;
        move_uploaded_file($_FILES["fopsi3"] ["tmp_name"], $dst3);
    
        mysqli_query($conn, "UPDATE pertanyaan SET pertanyaan='$_POST[fpertanyaan]', opt3='$dst_db1' WHERE id=$id ") or die(mysqli_error($conn));

    }

    if ($opt4!="") {

        $dst4 = "./opt_images/" . $tm . $opt4;
        $dst_db4 = "opt_images/" . $tm . $opt4;
        move_uploaded_file($_FILES["fopsi4"] ["tmp_name"], $dst4);
    
        mysqli_query($conn, "UPDATE pertanyaan SET pertanyaan='$_POST[fpertanyaan]', opt4='$dst_db1' WHERE id=$id ") or die(mysqli_error($conn));

    }

    if ($jawaban!="") {

        $dst5 = "./opt_images/" . $tm . $jawaban;
        $dst_db5 = "opt_images/" . $tm . $jawaban;
        move_uploaded_file($_FILES["fjawaban"] ["tmp_name"], $dst5);
    
        mysqli_query($conn, "UPDATE pertanyaan SET pertanyaan='$_POST[fpertanyaan]', jawaban='$dst_db5' WHERE id=$id ") or die(mysqli_error($conn));

    }

    mysqli_query($conn, "UPDATE pertanyaan SET pertanyaan='$_POST[fpertanyaan]' WHERE id=$id ") or die(mysqli_error($conn));

    ?>
    <script type="text/javascript">
        window.location="tambah_edit_pertanyaan_ujian.php?id=<?php echo $id1?>"
    </script>
    <?php
}

?>



<?php include("footer.php")?>

</html>