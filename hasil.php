<?php

include("path.php");
include(ROOT_PATH . "/app/controllers/users.php");

$date = date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d H-i-s", strtotime($date . " + $_SESSION[exam_time] minutes"));

?>
<!DOCTYPE html>
<html>

<?php include("app/includes/header.php")?>


    <div>
        <div class="position-absolute top-50 start-50 translate-middle">
            
        <?php
            $benar = 0;
            $salah = 0;

            if (isset($_SESSION["jawaban"])) 
            {
                for ($i=1; $i <= sizeof($_SESSION["jawaban"]); $i++) { 
                    $jawaban = "";
                    $res = mysqli_query($conn, "SELECT * FROM pertanyaan WHERE kategori='$_SESSION[kategori_quiz]' && no_pertanyaan= $i");
                    while ($row = mysqli_fetch_array($res)) {
                        $jawaban = $row["jawaban"];
                    }

                    if (isset($_SESSION["jawaban"][$i])) {
                       if ($jawaban == $_SESSION["jawaban"][$i]) {
                           $benar = $benar + 1;
                       }else 
                       {
                           $salah = $salah + 1 ;
                       }
                    }else 
                    {
                        $salah = $salah + 1;
                    }
                }
            }

            $count = 0;

            $res = mysqli_query($conn, "SELECT * FROM pertanyaan WHERE kategori='$_SESSION[kategori_quiz]'");
            $count = mysqli_num_rows($res);
            $salah = $count - $benar;
            echo "<br>"; echo "<br>";
            echo "Total pertanyaan = " . $count;
            echo "<br>";
            echo "Jawaban Benar = " . $benar;
            echo "<br>";
            echo "Jawaban Salah = " . $salah;

        ?>
            
        </div>
    </div>

    
<?php 

if (isset($_SESSION["exam_start"])) {
    $date = date("Y-m-d");
    mysqli_query($conn, "INSERT INTO hasil_quiz(id, firstname, tipe_quiz, total_pertanyaan, jawaban_benar, jawaban_salah, waktu_ujian) VALUES(NULL, '$_SESSION[firstname]', '$_SESSION[kategori_quiz]', '$count', '$benar', '$salah', '$date')");
}

if (isset($_SESSION["exam_start"])) {
    unset($_SESSION["exam_start"])

    ?>
        <script type="text/javascript">
           
           window.location.href = window.location.href;
            
        </script>

    <?php

}

?>


<?php include("app/includes/footer.php")?>
