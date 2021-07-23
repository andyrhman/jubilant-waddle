
<?php
include("../app/database/connect.php");


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
                    <h1>Tambah dan Edit Pertanyaan Ujian</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Kategori Ujian</strong>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Ujian</th>
                            <th scope="col">Waktu Ujian</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        $count = 0;
                        $sql = "SELECT * FROM kategori_quiz";
                        $res = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_array($res))
                        {
                        $count = $count+1;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $count; ?></th>
                                <td><?php echo $row["kategori"]; ?></td>
                                <td><?php echo $row["waktu_ujian"]; ?></td>
                                <td><a href="tambah_edit_pertanyaan_ujian.php?id=<?php echo $row["id"]?>">Edit</a></td>
                            </tr>
                        
                            <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>





<?php include("footer.php")?>

</html>