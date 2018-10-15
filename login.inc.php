<?php
function login() {
include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/soft/db.inc.php';
  $sql = "SELECT * FROM user WHERE email = :email";
  $s = $pdo->prepare($sql);
  $s->bindValue(':email', $_POST['email']);
  $s->execute();

  $fetch = $s->fetch();

  if (password_verify($_POST['password'], $fetch['password'])) {
    session_start();
    $_SESSION['isset_login'] = TRUE;
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
  } else {
    header("Location: .?error_login=Not login");
    exit();
  }
}
?>
