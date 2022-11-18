<?php

require_once '../src/php/config.php';

$upload_dir = '../src/videos/';

$name = $_FILES['file-video']['full_path'];
$tmp_name = $_FILES['file-video']['tmp_name'];

$upload_path = $upload_dir . basename($name);

if (file_exists($upload_path)) {
  header('Location:index.php?addv=exist#add-videos');
} else {
  $insert = $db->prepare('INSERT INTO videos(link) VALUES (:link)');
  $insert->execute(array('link' => $upload_path));

  move_uploaded_file($tmp_name, $upload_path);

  header('Location:index.php?addv=true#add-videos');
}
