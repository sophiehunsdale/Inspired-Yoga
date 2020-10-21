<?php
  session_start();
  include('../connection/conn.php');
 
  if(!isset($_SESSION['userdash'])){

        header('location:login.php');
    }

    $myid = $_GET['rowid'];
    $classes = "SELECT * FROM `inspired_yoga_class_calendar` 
            INNER JOIN inspired_yoga_classes 
            ON inspired_yoga_class_calendar.class_id = inspired_yoga_classes.class_id WHERE calendar_class_id='$myid';";

    $result = $conn->query($classes);
    if(!$result){
        echo $conn->error;
    }
    if(!isset($_SESSION['classes_booked'])){
        $booked=0;
    }else{
        $booked = count($_SESSION['classes_booked']);
    }
  

?>

<!DOCTYPE html>
<html>

  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Schedule Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <!--fancybox-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <!-- google-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--css-->
    <link href="../styles/gui.css" rel="stylesheet" type="text/css">
  </head>

  <body>
  <div id="container">
        <header>
            <div id="inspiredyogahead">
                <img id="logo" src="../img/logo.jpg" />
            </div>
        </header>
        <div id="navigation">
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <span class="navbar-text">user</span>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapse_target">
                    <a class="navbar-brand"></a>
                    <ul class="navbar-nav">
                            <a class="nav-link" href="dash.php">dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactus.php">contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">logout</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="bookings.php">bookings &nbsp;<span class="tag is-black"><?php echo $booked; ?></span></a>                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div id="text">

          <?php

                while($row=$result->fetch_assoc()){
    
                    $title=$row['class_name'];
                    $theday=$row['class_date'];
                    $id = $row['calendar_class_id'];
                    $coachname = $row['coach_name'];
                    $classdescription = $row['class_description'];
                    $classlength = $row['class_length'];
                    $price = $row['price'];
                    $image = $row['path'];
    
                    $newday=date('l, jS M Y', strtotime($theday));


                    echo"<div id='text'>
                        <div class='row'>
                             <div class='col-lg-3 col-md-12 col-sm-12' id='imgcol'>
                                <img id='classes'src='../admin/upload/$image'>
                            </div>                                    
                            <div class='col-lg-9 col-md-12 col-sm-12' id='textcol'>
                                  <h4 id='h5'>
                                    <b>$title on $newday </b>
                                </h4>
                                <h5>                                        
                                    <b id='h5'> $coachname</b>
                                </h5>
                                <p> <p><b>Class length:</b> $classlength mins </p>
                                <p><b>Coach:</b> $coachname </p>
                                <p><b>Price:</b> £ $price </p>                                    
                                <p><b>Class Description:</b> $classdescription </p>
                                </p>
                                <p>
                                <a href='bookings.php?class=$id' class='btn btn-outline-dark'>Book</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    ";               
                }
            ?>
        </div>

        <div id="foot">
            <div id=text>
                <div class="row">
                    <div class="col m6">
                        <h3>Contact us</h3>
                        <p>Inspired Yoga</p>
                        <p>18 Malone Rd</p>
                        <p>Belfast</p>
                        <p>BT9 5AF</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="18px" height="18px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3 3h18v2H3V3z"/></svg>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="18px" height="18px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 1.95c-5.52 0-10 4.48-10 10s4.48 10 10 10h5v-2h-5c-4.34 0-8-3.66-8-8s3.66-8 8-8 8 3.66 8 8v1.43c0 .79-.71 1.57-1.5 1.57s-1.5-.78-1.5-1.57v-1.43c0-2.76-2.24-5-5-5s-5 2.24-5 5 2.24 5 5 5c1.38 0 2.64-.56 3.54-1.47.65.89 1.77 1.47 2.96 1.47 1.97 0 3.5-1.6 3.5-3.57v-1.43c0-5.52-4.48-10-10-10zm0 13c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"/>
                        </svg>
                            <a>Email: shunsdale01@qub.ac.uk</a>
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="18px" height="18px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6.54 5c.06.89.21 1.76.45 2.59l-1.2 1.2c-.41-1.2-.67-2.47-.76-3.79h1.51m9.86 12.02c.85.24 1.72.39 2.6.45v1.49c-1.32-.09-2.59-.35-3.8-.75l1.2-1.19M7.5 3H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.49c0-.55-.45-1-1-1-1.24 0-2.45-.2-3.57-.57-.1-.04-.21-.05-.31-.05-.26 0-.51.1-.71.29l-2.2 2.2c-2.83-1.45-5.15-3.76-6.59-6.59l2.2-2.2c.28-.28.36-.67.25-1.02C8.7 6.45 8.5 5.25 8.5 4c0-.55-.45-1-1-1z"/>
                        </svg>
                            <a>Phone: 028 9097 4669</a>
                        </p>
                        </div>

                        <div class="col m6" id="footer-left">
                            <p>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2312.260253015376!2d-5.9396269843457565!3d54.581788180256495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486108ee843b6707%3A0x1aa3f74f8f2e5087!2s18%20Malone%20Rd%2C%20Belfast!5e0!3m2!1sen!2suk!4v1585685233740!5m2!1sen!2suk
                                " width="300 " height="250 " frameborder="0 " style="border:0; " allowfullscreen=" " aria-hidden="false " tabindex="0 "></iframe>
                            </p>
                            <p>
                                <a href="../admin/login.php" id="adminfooter"> admin </a>
                            </p>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>

</body>

</html>

  </body>

</html>