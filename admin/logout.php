<?php

session_start();

unset($_SESSION['admindash']);

header("location:../client/login.php");

?>