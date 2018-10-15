<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Black+Ops+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Plaster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mitr:200,300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="/fewgroups/css/sigin.css">
    <meta name="viewport" content="width=device-width">
    <title>Fewgroups - войдите или зарегистрируйтесь</title>
    <script src="/fewgroups/javascript/sigin.js">

    </script>
  </head>
  <body>
    <div id="main">
      <h1>+ Few groups</h1>
      <form id="login_form" method="post" action="">
        <input type="text" name="email" placeholder="Example@email.com">
        <input type="password" name="password" placeholder="Password">
        <input type="hidden" name="login" value="">
        <input type="button" value="Login" id="login_button">
        <a href="#">Forgot your password?</a>
      </form>
      <form id="sigin_form" method="post" action="">
        <input type="text" name="email" placeholder="Example@email.com">
        <input type="password" name="password1" placeholder="Password">
        <input type="password" name="password2" placeholder="Password">
        <input type="text" name="username" placeholder="Username">
        <input type="hidden" name="sigin" value="">
        <input type="button" value="Sigin in" id="sigin_button">
        <a href="#">By registering, you accept our terms of use.</a>
      </form>
      <div id="message">
        <?php if (isset($_GET['error_login'])) {
          echo $_GET['error_login'];
        } ?>
      </div>
    </div>
  </body>
</html>
