<?php

require_once '../src/php/config.php';

if (isset($_POST['title']) && isset($_POST['type']) && isset($_POST['tool']) && isset($_POST['text']) && isset($_POST['users']) && isset($_POST['imgs']) && !empty($_POST['title']) && !empty($_POST['type']) && !empty($_POST['tool']) && !empty($_POST['text']) && !empty($_POST['users']) && !empty($_POST['imgs'])) {

  $title = htmlspecialchars($_POST['title']);
  $type = htmlspecialchars($_POST['type']);
  $tool = htmlspecialchars($_POST['tool']);
  $text = htmlspecialchars($_POST['text']);
  $users = htmlspecialchars($_POST['users']);
  $imgs = htmlspecialchars($_POST['imgs']);

  $prepare = $db->prepare('SELECT title from creations WHERE title = ?');
  $prepare->execute(array($title));
  $row = $prepare->rowCount();

  if ($row == 0) {
    $prepare = $db->prepare('INSERT INTO creations (title, type, tool, text, users, imgs) VALUES (:title, :type, :tool, :text, :users, :imgs)');
    $prepare->execute(array('title' => $title, 'type' => $type, 'tool' => $tool, 'text' => $text, 'users' => $users, 'imgs' => $imgs));
    header('Location:index.php?addc=true');
  }
  header('Location:index.php?addc=exist');
}
header('Location:index.php?addc=form');
