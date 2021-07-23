<?php
include("../path.php");
include("../app/controllers/kategori.php");
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

        <!-- Kategori -->
        <form name="form1" action="kategori_ujian.php" method="post">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><strong>Form</strong><small> Ujian</small></div>
                    <?php include(ROOT_PATH . "/app/helpers/formsError.php"); ?>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Kategori Ujian Baru</label>
                                <input type="text" name="kategori" value="<?php echo $kategori?>" placeholder="Kategori Ujian" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="vat" class=" form-control-label">Waktu Ujian</label>
                                <input type="text" name="waktu_ujian" value="<?php echo $waktu_ujian?>" placeholder="Waktu" class="form-control">
                            </div>
                            <div class="form-group">
                                <?php if(empty($published)): ?>
                                <label>
                                    <input type="checkbox" name="publish" id="">
                                    Unggah
                                </label>
                                <?php else:?>
                                <label>
                                    <input type="checkbox" name="publish" id="" checked>
                                    Unggah
                                </label>
                                <?php endif;?>
                            </div>
                            <div><button type="submit" name="submit1" class="btn btn-success">Tambah Ujian</button></div>
                    </div>
                </div>  
            </div> <!-- .content -->
            <div class="col-lg-6">
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
                                    <th scope="col">Hapus</th>
                                    <th scope="col">Unggah</th>
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
                                        <td><a href="edit_Kategori_ujian.php?id=<?php echo $row["id"]?>">Edit</a></td>
                                        <td><a href="delete.php?id=<?php echo $row["id"]?>">Delete</a></td>

                                        <?php if ($row["publish"]): ?>
                                        <td><a href="unggah.php?published=0&p_id=<?php echo $row['id']?>">Jangan Unggah</a></td>
                                        <?php else:?>
                                        <td><a href="unggah.php?published=1&p_id=<?php echo $row['id']?>">Unggah</a></td>
                                        <?php endif;?>
                                    </tr>
                                
                                    <?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div><!-- /#right-panel -->


    <?php include("footer.php")?>

</html>
