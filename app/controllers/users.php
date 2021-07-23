<?php
include(ROOT_PATH . "/app/database/connect.php");
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");
include(ROOT_PATH . "/app/helpers/middleware.php");

$table = 'registration'; //kode serbaguna
$errors = array();

$id = '';
$username = ''; // Berfungsi menyimpan username terakhir di form agar tidak hilang 
$nama_pertama = '';
$nama_terakhir = '';
$admin = '';
$email = '';
$password = '';
$contact = '';


// Tanpa copy satu-satu
function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['firstname'] = $user['firstname'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'Selamat akunmu telah dibuat!';
    $_SESSION['type'] = 'success';
    

    if ($_SESSION['admin']) {
        header('location: ' . BASE_URL . "/admin/dashboard.php"); // Kalo usernya admin redirect ke dashboard
    } else {
        header('location: ' . BASE_URL . '/register.php'); // Hanya untuk user biasa
    }
    
    exit();

}

if (isset($_POST['register-btn']) ) {
    // Cek adakah error 
    $errors = validateUserDaftar($_POST);

    if (count($errors) === 0) {
        // Kalo register-btn ditekan akun dibuat
        unset($_POST['register-btn']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT); //Password di encrypt
        
        //Kalo user admin atau bukan
        if (isset($_POST['admin'])) {
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = "Pengguna Admin berhasil dibuat!";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/blog/admin/users/index.php'); // Kalo usernya admin redirect ke dashboard
            exit();
        }else {
            $_POST['admin'] = 0;
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);
            
            // Login User
            loginUser($user);
        }

    } else {
        // Berfungsi menyimpan username terakhir di form agar tidak hilang jika pengguna tidak mengisi form
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $nama_pertama = $_POST['firstname'];
        $nama_terakhir = $_POST['lastname'];
        $contact = $_POST['contact'];
    }

}

if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password'])) { // Jika password benar akan return true
            //login redirect
            $_SESSION['id'] = $user['id'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['admin'] = $user['admin'];
            $_SESSION['pesan'] = $user['username'];
            $_SESSION['type'] = 'success';
            

            if ($_SESSION['admin']) {
                header('location: ' . BASE_URL . "/admin/dashboard.php"); // Kalo usernya admin redirect ke dashboard
            } else {
                header('location: ' . BASE_URL . "/pilih-ujian.php"); // Hanya untuk user biasa
            }

            exit();

        } else{ 
            // jika password salah
            array_push($errors, 'Password salah!');
        }
    }
    // Berfungsi menyimpan username terakhir di form agar tidak hilang jika pengguna tidak mengisi form
    $username = $_POST['username'];
    $password = $_POST['password'];
       
}

if (isset($_POST['login-admin'])) {
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password'])) { // Jika password benar akan return true
            //login redirect
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['admin'] = $user['admin'];
            $_SESSION['pesan'] = $user['username'];
            $_SESSION['type'] = 'success';
            

            if ($_SESSION['admin']) {
                header('location: ' . BASE_URL . "/admin/dashboard.php"); // Kalo usernya admin redirect ke dashboard
                exit();
            } else {
                array_push($errors, 'Anda bukan admin!');
            }

      

        } else{ 
            // jika password salah
            array_push($errors, 'Password salah!');
        }
    }
    // Berfungsi menyimpan username terakhir di form agar tidak hilang jika pengguna tidak mengisi form
    $username = $_POST['username'];
    $password = $_POST['password'];
       
}