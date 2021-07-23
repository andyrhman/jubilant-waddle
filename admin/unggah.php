<?php
include("../path.php");
include(ROOT_PATH . "/app/database/db.php");

$table = 'kategori_quiz'; //kode serbaguna

$published = '';

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
