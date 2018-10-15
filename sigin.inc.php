<?php
function sigin() {
include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/soft/db.inc.php';

if (!preg_match('/^[\w\.\-]+@([\w\-]+\.)+[a-z]+$/i', $_POST['email'])) {
  header("Location: .?error_login=Email is not correctly");
  exit();
}
if (!preg_match('/^[a-zA-Z0-9\!\@\#\$\%\^\&\*]{6,16}$/', $_POST['password1'])) {
  header("Location: .?error_login=Password is not correctly");
  exit();
}
if (!preg_match('/^[a-zA-Z0-9\!\@\#\$\%\^\&\*]{6,16}$/', $_POST['password2'])) {
  header("Location: .?error_login=Password is not correctly");
  exit();
}

if ($_POST['password1'] !== $_POST['password2']) {
  header("Location: .?error_login=Passwords not the same");
  return false;
}
if (!preg_match('/^[A-Z_-]{1,20}$/i', $_POST['username'])) {
  header("Location: .?error_login=Username is not correctly");
  exit();
}
  try {
    $sql = "SELECT * FROM user WHERE email = :email";
    $s = $pdo->prepare($sql);
    $s->bindValue(':email', $_POST['email']);
    $s->execute();
  } catch (PDOException $e) {
    $error = 'Невозможно внести данные для регистрации ' . $e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'] . 'fewgroups/html/error.html.php';
    exit();
  }

  foreach ($s as $row) {
    $count[] = $row['email'];
  }

  if ($count > 0) {
    header("Location: .?error_login=This login is reserv");
    exit();
  }

  try {
    $sql = "INSERT INTO user SET email = :email, username = :username, password = :password";
    $s = $pdo->prepare($sql);
    $s->bindValue(':email', $_POST['email']);
    $s->bindValue(':password', password_hash($_POST['password1'], PASSWORD_DEFAULT));
    $s->bindValue(':username', $_POST['username']);
    $s->execute();
    $s->rowCount();
  } catch (PDOException $e) {
    $error = 'Невозможно внести данные для регистрации ' . $e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'] . 'fewgroups/html/error.html.php';
    exit();
  }
  session_start();
  $_SESSION['isset_login'] = true;
  $_SESSION['user_id'] = $fetch['id'];
  $_SESSION['email'] = $fetch['email'];
  $_SESSION['username'] = $fetch['username'];
  $_SESSION['name'] = $fetch['name'];
  $_SESSION['b_day'] = $fetch['b_day'];
  $_SESSION['b_month'] = $fetch['b_month'];
  $_SESSION['b_year'] = $fetch['b_year'];
  $_SESSION['sex'] = $fetch['sex'];
  $_SESSION['avatar'] = $fetch['avatar'];
  header("Location: .");
  exit();
}
?>
