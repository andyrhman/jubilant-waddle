<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/users.php");

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="css/login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <title>Daftar</title>
</head>

<body style="background: #263238;">

  <?php include(ROOT_PATH . "/app/includes/messages.php"); ?> 
  <div class="auth-content">

    <form action="register.php" method="post">
      <h2 class="form-title">Daftar</h2>
      <?php include(ROOT_PATH . "/app/helpers/formsError.php"); ?>

      <div>
        <label>Nama Pertama</label>
        <input type="text" name="firstname" class="text-input" value="<?php echo $nama_pertama; ?>">
      </div>
      <div>
        <label>Nama Terakhir</label>
        <input type="text" name="lastname" class="text-input" value="<?php echo $nama_terakhir; ?>">
      </div>
      <div>
        <label>Username</label>
        <input type="text" name="username" class="text-input" value="<?php echo $username; ?>">
      </div>
      <div>
        <label>Email</label>
        <input type="email" class="text-input" name="email" value="<?php echo $email; ?>">
      </div>
      <div>
        <label>Password</label>
        <input type="password" class="text-input" name="password" value="<?php echo $password; ?>">
      </div>
      <div>
        <label>Nomor HP</label>
        <input type="text" class="text-input" name="contact" value="<?php echo $contact; ?>">
      </div>
      <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" name="register-btn" class="btn btn-primary">Daftar</button>       
      </div>
      <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </form>

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom Script -->
  <script src="js/scripts.js"></script>

</body>

</html>
<?php

?>