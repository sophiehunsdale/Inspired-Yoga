<?php
session_start();

    if(!isset($_GET['programid'])){
    
        header('location:personalprogramsubscribe.php');
    }else{

       $programid = $_GET['programid'];

       $editarray = array_values($_SESSION['subscribed']);     

       unset($editarray[$classid]);

        $_SESSION['subscribed'] = $classesbooked;

       header('location:personalprogramsubscribe.php');
    }
?>