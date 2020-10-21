<?php
session_start();

    if(!isset($_GET['class'])){
    
        header('location:bookings.php');

    }else{

       $classindex = $_GET['class'];

       $editarray = array_values($_SESSION['classes_booked']);

      //this was used to view the array and class indecies
       echo "<script>console.log(".json_encode(array_values($editarray)).")</script>";
       echo "<script>console.log(".json_encode($classindex).")</script>";

        unset($editarray[$classindex]);

        $_SESSION['classes_booked'] = $editarray;

      header('location:bookings.php');
    }
?>