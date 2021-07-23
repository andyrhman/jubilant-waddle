<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">


  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <title>Masuk</title>

</head>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container my-auto">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item me-2"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo BASE_URL . '/pilih-ujian.php' ?>">Pilih Ujian</a></li>
                    <li class="nav-item me-2"><a class="nav-link active" aria-current="page" href="<?php echo BASE_URL . '/hasil_terakhir.php' ?>">Hasil Terakhir</a></li>


                </ul>

            </div>
        <?php if(isset($_SESSION['id'])):?>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="img/avatar-mini2.jpg" alt="" class="rounded-circle justify-content-end" width="40" height="40"> 
                    <?php echo $_SESSION['firstname']; ?>   
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-danger" href="<?php echo BASE_URL . '/logout.php' ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        <?php else:?>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo BASE_URL . '/register.php' ?>">Daftar</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo BASE_URL . '/login.php' ?>">login</a></li>
            </ul>
        <?php endif;?>

        </div>
        



    </nav>
