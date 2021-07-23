<?php
function validateUserDaftar($user)
{
    $errors = array();

    // count(array($errors));

    if (empty($user['username'])) {
        array_push($errors, 'Username diperlukan!');
    }

    if (empty($user['email'])) {
        array_push($errors, 'Email diperlukan!');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Password diperlukan!');
    }

    if (empty($user['firstname'])) {
        array_push($errors, 'Nama pertama diperlukan!');
    }

    if (empty($user['lastname'])) {
        array_push($errors, 'Nama terakhir diperlukan!');
    }

    if (empty($user['contact'])) {
        array_push($errors, 'Nomor hp diperlukan!');
    }

    $existingEmail = selectOne('registration', ['email' => $user['email']]);
    if (isset($existingEmail)) {
        array_push($errors, 'Email sudah ada!');
    }

    $existingEmail = selectOne('registration', ['username' => $user['username']]);
    if (isset($existingEmail)) {
        array_push($errors, 'Username sudah ada!');
    }

    return $errors;
}

function validateLogin($user)
{
    $errors = array();


    if (empty($user['username'])) {
        array_push($errors, 'Username diperlukan!');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Password diperlukan!');
    }


    return $errors;
}
