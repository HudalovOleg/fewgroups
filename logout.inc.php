<?php
function logout() {
  session_start();
  unset($_SESSION['isset_login']);
  unset($_SESSION['user_id']);
  unset($_SESSION['username']);
  unset($_SESSION['email']);
  header("Location: .");
  exit();
}
?>
