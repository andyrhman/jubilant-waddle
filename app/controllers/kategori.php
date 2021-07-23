<?php 

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateKategori.php");
//include(ROOT_PATH . "/blog/app/helpers/validateUpdatePost.php");

$table = 'kategori_quiz'; //kode serbaguna


$errors = array();
$id = '';
$kategori = '';
$published = '';
$waktu_ujian = '';


if (isset($_POST['submit1'])) {
    // ok($_FILES['image']['name']);
    $errors = validateKategori($_POST);

    if (count($errors) === 0) {
        unset($_POST['submit1']);
        $_POST['id'] = $_SESSION['id'];
        $_POST['publish'] = isset($_POST['publish']) ? 1 : 0;
        $_POST['kategori'] = $_POST['kategori'];
        $_POST['waktu_ujian'] = $_POST['waktu_ujian'];
    
        $post_id = mysqli_query($conn, "INSERT INTO kategori_quiz values(NULL, '$_POST[kategori]', '$_POST[waktu_ujian]', '$_POST[publish]')") or die(mysqli_error($conn));;
        $_SESSION['message'] = "Post berhasil dibuat";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/kategori_ujian.php');
        exit();
    } else{
        $kategori = $_POST['kategori'];
        $waktu_ujian = $_POST['waktu_ujian'];
        $published = isset($_POST['publish']) ? 1 : 0;
    }

   
}

if (isset($_GET['published']) && isset($_GET['p_id'])) {    //published dari edit.php?published=0&p_id=<?php echo $post['id']
    $published = $_GET['published'];    //published dari edit.php?published=0&p_id=<?php echo $post['id']
    $p_id = $_GET['p_id'];
    $_POST['publish'] = isset($_POST['publish']) ? 1 : 0;
    //... update published
    $count = update($table, $p_id, ['publish' => $published]);  //'publish' diambli dari database

    $_SESSION['message'] = "Post publish berhasil diunggah";
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/admin/kategori_ujian.php');
    exit();
}