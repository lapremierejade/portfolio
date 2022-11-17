<?php

require_once '../src/php/config.php';

if (isset($_POST['submit-users']) && isset($_POST['link']) && !empty($_POST['link'])) {

  $upload_dir = '../src/uploads/';

  $link = htmlspecialchars($_POST['link']);
  $pseudo = htmlspecialchars($_POST['pseudo']);

  $name = $_FILES['file-user']['full_path'];
  $tmp_name = $_FILES['file-user']['tmp_name'];

  $upload_path = $upload_dir . basename($name);

  if (file_exists($upload_path)) {
    header('Location:index.php?addu=exist#add-users');
  } else {
    $insert = $db->prepare('INSERT INTO users(name, img, link) VALUES (:name, :img, :link)');
    $insert->execute(array('name' => $pseudo, 'img' => $upload_path, 'link' => $link));

    move_uploaded_file($tmp_name, $upload_path);

    header('Location:index.php?addu=true#add-users');
  }
} else header('Location:index.php?addu=form#add-users');
