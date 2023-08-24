<?php

session_start();

unset($_SESSION["logged"]);
unset($_SESSION["usuario"]);
session_unset();
header("location:index.php");
?>