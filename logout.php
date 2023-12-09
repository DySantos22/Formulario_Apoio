<?php
  session_start();
  unset($_SESSION['Email']);
  unset($_SESSION['Senha']);
  unset($_SESSION['Acesso']);
  session_destroy();
  header('location:../index.html');
?>