<?php

function validateKategori($post)
{
    $errors = array();

    // count(array($errors));

    if (empty($post['kategori'])) {
        array_push($errors, 'Kategori diperlukan!');
    }

    if (empty($post['waktu_ujian'])) {
        array_push($errors, 'Harus di isi!');
    }


    $existingPost = selectOne('kategori_quiz', ['kategori' => $post['kategori']]);
    if ($existingPost) {
        
        if (isset($post['submit1'])) {
            array_push($errors, 'Post dengan judul itu sudah ada!');
        }

    }


    return $errors;
}

