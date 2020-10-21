<?php
//declare password
$pw = "XSZcyhzBn186RJvg";

//declare MySQL username
$user = "shunsdale01";

//declare webserver
$webserver = "shunsdale01.lampt.eeecs.qub.ac.uk";

//declare DB  
$db = "shunsdale01";


//mysqli api library in PHP to connect to the DB
$conn = new mysqli($webserver, $user, $pw, $db);

        if($conn->connect_error) {
          echo $conn->connect_error;
        }
 