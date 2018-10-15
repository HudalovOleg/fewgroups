<?php
  function isset_login() {
    session_start();
    if (!isset($_SESSION['isset_login'])) {
      return FALSE;
    } else {
      return TRUE;
    }
  }
?>
