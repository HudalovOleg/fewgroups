<?php
  function setting_personal_data() {
    include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/soft/db.inc.php';
    if (!preg_match('/^[\w\.\-]+@([\w\-]+\.)+[a-z]+$/i', $_POST['email'])) {
      header("Location: .?settings");
      exit();
    }
    if (!preg_match('/^[A-Z_-]{1,20}$/i', $_POST['user_name'])) {
      header("Location: .?settings");
      exit();
    }


    session_start();
    $id = $_SESSION['user_id'];
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];

    $name = $_POST['name'];
    if (!$_POST['name']) {
      $name = NULL;
    }
    for ($i=1; $i <= 31; $i++) {
      $b_day_array[] = $i;
    }
    $b_day = $_POST['b_day'];
    if ($_POST['b_day'] == "day" or  !in_array($_POST['b_day'], $b_day_array)) {
      $b_day = NULL;
    }
    $b_month_array = ['month',
    'january','february','march','april','may','june',
    'july','august','september','october','november','december'];
    $b_month = $_POST['b_month'];
    if ($_POST['b_month'] == "month" or !in_array($_POST['b_month'], $b_month_array)) {
      $b_month = NULL;
    }
    for ($i = 1905; $i <= 2018; $i++) {
      $b_year_array[] = $i;
    }
    $b_year = $_POST['b_year'];
    if ($_POST['b_year'] == "year" or !in_array($_POST['b_year'], $b_year_array)) {
      $b_year = NULL;
    }
    $sex_array = ['sex','woman','man'];
    $sex = $_POST['sex'];
    if ($_POST['sex'] == "sex" or !in_array($_POST['sex'], $sex_array)) {
      $sex = NULL;
    }

    if (!$email) {
      return FALSE;
    }
    if (!$user_name) {
      return FALSE;
    }

    try {
      $sql = "UPDATE user SET
        email = :email,
        username = :username,
        name = :name,
        b_day = :b_day,
        b_month = :b_month,
        b_year = :b_year,
        sex = :sex
        WHERE id = :id";

      $s = $pdo->prepare($sql);
      $s->bindValue(':email',$email);
      $s->bindValue(':username',$user_name);
      $s->bindValue(':name',$name);
      $s->bindValue(':b_day',$b_day);
      $s->bindValue(':b_month',$b_month);
      $s->bindValue(':b_year',$b_year);
      $s->bindValue(':sex',$sex);
      $s->bindValue(':id',$id);
      $s->execute();
    } catch (PDOException $e) {
      $error = 'Не удалось выполнить запрос на изменение личных данных' . $e->getMessafe();
      include $_SERVER['DOCUMENT_ROOT'] . 'fewgroups/html/error.html.php';
      exit();
    }

    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $user_name;
    $_SESSION['name'] = $name;
    $_SESSION['b_day'] = $b_day;
    $_SESSION['b_month'] = $b_month;
    $_SESSION['b_year'] = $b_year;
    $_SESSION['sex'] = $sex;

    header("Location: .?settings");
  }
?>
