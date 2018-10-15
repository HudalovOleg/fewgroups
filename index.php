<?php
// Бизнес логика
if (isset($_POST['setting_change_password'])) {
  include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/soft/setting_change_password.inc.php';
  setting_change_password();
}
if (isset($_POST['setting_personal_data'])) {
  include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/soft/setting_personal_data.inc.php';
  setting_personal_data();
}
if (isset($_POST['load_new_current_photo'])) {
  include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/soft/load_new_current_photo.inc.php';
  load_new_current_photo();
  header("Location: .?settings");
}
if (isset($_GET['close_setting_avatar'])) {
  header("Location: .?settings");
}
if (isset($_GET['delete_current_photo'])) {
  include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/soft/delete_current_photo.inc.php';
  delete_current_photo();
  header("Location: .?settings");
}
if (isset($_POST['sigin'])) {
  include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/soft/sigin.inc.php';
  sigin();
}
if (isset($_POST['login'])) {
  include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/soft/login.inc.php';
  login();
}
if (isset($_POST['logout'])) {
  include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/soft/logout.inc.php';
  logout();
}

//Логика представления
include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/soft/isset_login.inc.php';
if (!isset_login()) {
  include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/html/sigin.html.php';
  exit();
}
include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/html/header.html.inc.php';
?>
