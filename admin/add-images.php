<?php

// add images
if (isset($_POST['submit'])) {

  $current_dir = getcwd();
  $upload_dir = '/uploads/';

  $name = $_FILES['img-file']['name'];
  $tmp_name = $_FILES['img-file']['tmp_name'];

  $upload_path = $current_dir . $upload_dir . basename($_FILES['img-file']['name']);

  if (!file_exists($upload_path)) {
    move_uploaded_file($tmp_name, $upload_path);
    header('Location:index.php?file=upload');
  } else header('Location:index.php?file=not-upload');
} else header('Location:index.php?file=form');
