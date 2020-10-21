<?php
session_start();

    if(!isset($_GET['groupid'])){
    
        header('location:groupsignup.php');
    }else{

       $groupid = $_GET['groupid'];

       $editarray = array_values($_SESSION['signed']);     

       unset($editarray[$classid]);

        $_SESSION['signed'] = $classesbooked;

       header('location: groupsignup.php');
    }
?>