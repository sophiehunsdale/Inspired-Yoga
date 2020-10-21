<?php

session_start();

unset($_SESSION['userdash']);

header("location:login.php");

?>