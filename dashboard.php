<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/users.php");
?>
<!DOCTYPE html>
<html>

<?php include("app/includes/header.php")?>
<br>
<div class="container">
    <div class="row justify-content-end">
        <h1 class="w-25 text-center justify-content-center rounded-3" id="countdowntimer"></h1>
    </div>

</div>

<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10 col-lg-10">
            <div class="border">
                <div class="question bg-white p-3 border-bottom">
                    <div class="d-flex flex-row justify-content-end align-items-center mcq">
                        <h4 class="flex-grow-1">Quiz</h4>
                        <span id="current_que"></span> /
                        <span id="total_que"></span>
                    </div>
                </div>
                <div class="question bg-white p-3 border-bottom" >
                    <div class="d-flex flex-row align-items-center question-title">
                        <div id="load_questions">
                            
                        </div>
                    </div>

                </div>
                <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                    <input type="button" class="btn btn-primary d-flex align-items-center btn-danger" value="Previous" onclick="load_previous();">               
                    <input type="button" class="btn btn-primary d-flex align-items-center btn-danger" value="Next" onclick="load_next();">               
                </div>
            </div>
            <div>


            </div>
        </div>
    </div>
</div>

<script src="js/sweetalert.min.js"></script> 
<script type="text/javascript">
    // Countdown Timer
    setInterval(function(){
        timer();
    },1000);
    function timer()
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                if(xmlhttp.responseText=="00:00:01")
                {
                    window.location="hasil.php";
                }

                document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;

            }
        };
        xmlhttp.open("GET","forajax/load_timer.php",true);
        xmlhttp.send(null);
    }

    // Mendisplay ujian
    function load_total_que()
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("total_que").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/load_total_que.php", true);
        xmlhttp.send(null);
    }

    var questionno = "1";
    load_questions(questionno);

    function load_questions(questionno)
    {
        document.getElementById("current_que").innerHTML = questionno;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                if (xmlhttp.responseText=="over") {
                    swal({
                        title: "Yakin mau berhenti?",
                        text: "Periksa dulu jawabannya...",
                        icon: "warning",
                        dangerMode: true,
                        buttons: true,
                        closeOnClickOutside: false,
                    })
                    .then((keluar) => {
                        if (keluar) {
                            window.location = "hasil.php";
                        } else {
                            window.location.href = window.location.href;
                        }
                    });
                    
                } else{
                    document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                    load_total_que();
                }
            }
        };
        xmlhttp.open("GET","forajax/load_questions.php?questionno="+ questionno, true);
        xmlhttp.send(null);
    }

    function radioclick(radiovalue, questionno)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                
            }
        };
        xmlhttp.open("GET","forajax/save_answer_in_session.php?questionno=" + questionno + "&value1="+ radiovalue, true);
        xmlhttp.send(null);
    }

    function load_previous()
    {
        if (questionno == "1") {
            load_questions(questionno);
        } else{
            questionno = eval(questionno)-1;
            load_questions(questionno);
        }
    }

    function load_next()
    {
        questionno = eval(questionno)+1;
        load_questions(questionno);
    }

</script>



<?php include("app/includes/footer.php")?>
