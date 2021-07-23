<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/users.php");

?>
<!DOCTYPE html>
<html>

<?php include("app/includes/header.php")?>


<?php include(ROOT_PATH . "/app/includes/messages.php"); ?> 
    <div>
        <div class="position-absolute top-50 start-50 translate-middle">
            
            

            <?php
                $count = 0;
                $res = mysqli_query($conn, "SELECT * FROM hasil_quiz WHERE firstname='$_SESSION[firstname]' ORDER BY id DESC");
                $count = mysqli_num_rows($res);

                if ($count == 0) {
                    ?>
                    <div>
                        
                        <h1>Hasil terakhir belum ada</h1>
                        
                    </div>
                    <?php

                } else {
                                
                    ?>
                    <center><h2>Hasil Terkahir</h2></center>
                    <div class="table-responsive">
                        <table class="table ">
                            <thead class="table-dark">
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Total Pertanyaan</th>
                                <th scope="col">Jawaban Salah</th>
                                <th scope="col">Jawaban Benar</th>
                                <th scope="col">Tanggal Ujian</th>
                            </tr>
                            </thead>
                            <?php while ($row = mysqli_fetch_array($res)):?>
                            <tbody>
                            <tr>
                                <td><?php echo $row["firstname"]?></td>
                                <td><?php echo $row["tipe_quiz"]?></td>
                                <td><?php echo $row["total_pertanyaan"]?></td>
                                <td><?php echo $row["jawaban_salah"]?></td>
                                <td><?php echo $row["jawaban_benar"]?></td>
                                <td><?php echo $row["waktu_ujian"]?></td>
                                                    
                            </tr>
                            </tbody>
                            <?php endwhile;?>
                        </table>
                    </div>
                    <?php
                         


                        
                    

                }

            ?>

            
        </div>
    </div>




<?php include("app/includes/footer.php")?>
