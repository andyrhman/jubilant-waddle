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
  <title>Login</title>
</head>

<body style="background: #263238;">
  <?php include(ROOT_PATH . "/app/includes/messages.php"); ?> 
  <div class="auth-content">

    <form action="login.php" method="post">
      <h2 class="form-title">Login</h2>

      <?php include(ROOT_PATH . "/app/helpers/formsError.php"); ?>
      <div>
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username?>" class="text-input" >
      </div>
      <div>
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $password?>" class="text-input" >
      </div>
      <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" name="login-btn" class="btn btn-primary">Login</button>       
      </div>
      <div class="d-grid gap-2 col-6 mx-auto">
        <a href="admin/index.php" class="btn btn-primary">Login Admin</a>    
      </div>
      <p>Belum punya akun? <a href="register.php">Daftar</a></p>
    </form>

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom Script -->
  <script src="js/scripts.js"></script>

</body>

</html>