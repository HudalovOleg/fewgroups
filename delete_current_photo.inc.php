<?php
  function delete_current_photo() {
    include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/soft/db.inc.php';
    session_start();
    $id = $_SESSION['user_id'];
    $avatar = $_SERVER['DOCUMENT_ROOT'];
    $avatar .= $_SESSION['avatar'];
    unset($_SESSION['avatar']);

    try {
      $sql = "SELECT avatar FROM user WHERE id = :id";
      $s = $pdo->prepare($sql);
      $s->bindValue(':id', $id);
      $s->execute();
    } catch (PDOException $e) {
      $error = "Не удалось проверить наличие ссылки на аватар" . $pdo->getMessage();
      include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/html/error_html.php';
      exit();
    }

    $row = $s->fetch();

    if ($row['avatar'] == NULL) {
      header("Location: .?settings");
      exit();
    }

    try {
      $sql = 'UPDATE user SET avatar = NULL WHERE user.id = :id';
      $s = $pdo->prepare($sql);
      $s->bindValue(':id', $id);
      $s->execute();
    } catch (PDOException $e) {
      $error = "Не удалось удалить аватар пользователя" . $pdo->getMessage();
      include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/html/error_html.php';
      exit();
    }
    unlink($avatar);
  }
?>
