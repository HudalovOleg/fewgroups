<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/fewgroups/css/reset.css">
    <link rel="stylesheet" href="/fewgroups/css/header.css">
    <?php if (isset($_GET['settings'])): ?>
      <link rel="stylesheet" href="/fewgroups/css/settings.css">
      <title>Setting</title>
      <script src="/fewgroups/javascript/settings.js"></script>
    <?php else: ?>
      <title>Account</title>
    <?php endif; ?>
  </head>
  <body>
    <header>
      <div class="header">
        <ul id="left_menu">
          <li class="home"><a href="/fewgroups/">Home</a></li>
          <li class="Mygroups"><a href="?mygroups">My groups</a></li>
          <li class="Allsubscribers">All subscribers</li>
          <li class="logo"></li>
          <li class="search">
            <form action="" method="post">
              <input type="text" name="" value="">
            </form>
          </li>
          <li class="Subscriptions"><a href="?subscriptions">Subscriptions</a></li>
          <li class="Settings"><a href="?settings">Settings</a></li>
          <li class="Logout">
            <form action="" method="post">
              <input type="submit" name="logout" value="Logout">
            </form>
          </li>
        </ul>
      </div>
    </header>
<?php if (isset($_GET['settings'])): ?>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/fewgroups/html/setting.html.inc.php';?>
  <?php exit(); ?>
<?php endif; ?>
