<?php
  function setting_change_password() {
    include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/soft/db.inc.php';

    session_start();
    $id = $_SESSION['user_id'];

    if (!preg_match('/^[a-zA-Z0-9\!\@\#\$\%\^\&\*]{6,16}$/', $_POST['new_password'])) {
      header("Location: .?settings");
      exit();
      return false;
    }

    if (!preg_match('/^[a-zA-Z0-9\!\@\#\$\%\^\&\*]{6,16}$/', $_POST['new_password_again'])) {
      header("Location: .?settings");
      exit();
      return false;
    }

    if ($_POST['new_password'] !== $_POST['new_password_again']) {
      header("Location: .?settings");
      return false;
    }

    try {
      $sql = "SELECT password FROM user WHERE id = :id";
      $s = $pdo->prepare($sql);
      $s->bindValue(':id', $id);
      $s->execute();
      $fetch = $s->fetch();
    } catch (PDOException $e) {
      $error = "Не удалось выполнить запрос на изъятие пароля для изменения: " . $e->getMessage();
      include $_SERVER['DOCUMENT_ROOT'] . 'fewgroups/html/error.html.php';
      exit();
    }

    if (password_verify($_POST['old_password'], $fetch['password'])) {
      try {
        $sql = "UPDATE user SET password = :password WHERE id = :id";
        $s = $pdo->prepare($sql);
        $s->bindValue(':password', password_hash($_POST['new_password'], PASSWORD_DEFAULT));
        $s->bindValue(':id', $id);
        $s->execute();
      } catch (PDOException $e) {
        $error = "Не удалось выполнить запрос изменение пароля: " . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . 'fewgroups/html/error.html.php';
        exit();
      }
      header("Location: .?settings");
    } else {
      header("Location: .?settings");
    }
  }
?>
