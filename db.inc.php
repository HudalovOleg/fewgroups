<?php
try
{
  $pdo = new PDO('mysql:host=localhost;dbname=fewgroups', 'root', '');
}
catch (PDOException $e)
{
  $error = 'Невозможно подключиться к серверу бах данных. ' . $e->getMessage();
  include $_SERVER['DOCUMENT_ROOT'] . 'fewgroups/html/error.html.php';
  exit();
}
?>
