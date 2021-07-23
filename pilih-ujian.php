<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/users.php");
usersOnly();

$ujian = selectAll('kategori_quiz', ['publish' => 1]);


?>
<!DOCTYPE html>
<html>

<?php include("app/includes/header.php")?>

<?php include(ROOT_PATH . "/app/includes/messagesLogin.php"); ?> 

 
    <div>
        <div class="position-absolute top-50 start-50 translate-middle">
            <?php
                foreach ($ujian as $ujianse) {
                    ?>
                    <div>
                        <input type="button" class="btn btn-success" value="<?php echo $ujianse['kategori']?>" onclick="set_exam_type_session(this.value)" style="width: 150px;">               
                    </div>
                    <?php
                }
            
            ?>
            
        </div>
    </div>

<?php include("app/includes/footer.php")?>
<script type="text/javascript">

    function set_exam_type_session(kategori_quiz)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "dashboard.php";
            }
        };
        xmlhttp.open("GET","forajax/set_exam_type_session.php?kategori_quiz="+ kategori_quiz,true);
        xmlhttp.send(null);

    }

</script>
