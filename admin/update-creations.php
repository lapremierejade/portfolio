<?php

require_once '../src/php/config.php';

if (isset($_POST['title']) && isset($_POST['type']) && isset($_POST['tool']) && isset($_POST['text']) && isset($_POST['users']) && isset($_POST['imgs']) && !empty($_POST['title']) && !empty($_POST['type']) && !empty($_POST['tool']) && !empty($_POST['text']) && !empty($_POST['users']) && !empty($_POST['imgs'])) {

  $title = htmlspecialchars($_POST['title']);
  $type = htmlspecialchars($_POST['type']);
  $tool = htmlspecialchars($_POST['tool']);
  $text = htmlspecialchars($_POST['text']);
  $users = htmlspecialchars($_POST['users']);
  $imgs = htmlspecialchars($_POST['imgs']);

  $prepare = $db->prepare('UPDATE creations SET title = ?, type = ?, tool = ?, text = ?, users = ?, imgs = ?');
  $prepare->execute(array($title, $type, $tool, $text, $users, $imgs));
  header('Location:index.php?update=true#all-creations');
} else header('Location:update.php?update=form');
