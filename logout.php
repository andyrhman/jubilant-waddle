<?php
include('path.php');
session_start();

unset ($_SESSION['id']);
unset ($_SESSION['username']);
unset ($_SESSION['admin']);
unset ($_SESSION['pesan']);
unset ($_SESSION['type']);
session_destroy();

header('Location: ' . BASE_URL . '/login.php');