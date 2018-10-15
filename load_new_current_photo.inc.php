<?php
  function load_new_current_photo() {
    include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/soft/db.inc.php';

    $upload = $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/user_img/';
    session_start();
    $unique_file_name = $_SESSION['user_id'];
    $id = $_SESSION['user_id'];

    try {
      $sql = "SELECT avatar FROM user WHERE id = :id";
      $s = $pdo->prepare($sql);
      $s->bindValue(":id", $id);
      $s->execute();
    } catch (PDOException $e) {
      $error = 'Не удалось проверить начилие ссылки на аватар для прежнего файла: '.$e->getMessage();
      include $_SERVER['DOCUMENT_ROOT'] . 'fewgroups/html/error.html.php';
      exit();
    }

    $row = $s->fetch();

    if ($row['avatar'] != NULL) {
      $avatar = $_SERVER['DOCUMENT_ROOT'];
      $avatar .= $_SESSION['avatar'];
      unlink($avatar);
    }

    $unique_file_name .= uniqid() . date(YzHis) . '.jpg';

    $upload .= $unique_file_name;

    if (is_uploaded_file($_FILES['new_avatar']['tmp_name'])) {
      if ($_FILES['new_avatar']['type'] == "image/png"
      OR $_FILES['new_avatar']['type'] == "image/PNG"
      OR $_FILES['new_avatar']['type'] == "image/jpg"
      OR $_FILES['new_avatar']['type'] == "image/JPG"
      OR $_FILES['new_avatar']['type'] == "image/jpeg"
      OR $_FILES['new_avatar']['type'] == "image/JPEG") {
        move_uploaded_file($_FILES['new_avatar']['tmp_name'],$upload);
        $img = '/fewgroups/user_img/';
        $img .= $unique_file_name;
        $_SESSION['avatar'] = $img;
        try {
          $sql = 'UPDATE user SET avatar = :avatar WHERE user.id = :id';
          $s = $pdo->prepare($sql);
          $s->bindValue(':avatar', $img);
          $s->bindValue(':id', $id);
          $s->execute();
        } catch (PDOException $e) {
          $error = 'Не удалось внести аватар пользоввателя: '.$e->getMessage();
          include $_SERVER['DOCUMENT_ROOT'] . 'fewgroups/html/error.html.php';
          exit();
        }
      } else {
        header('Location: .?settings');
      }
    } else {
      header('Location: .?settings');
    }
  }
?>
