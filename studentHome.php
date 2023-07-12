<?php 
session_start();

//Checking if the usertype is student and if not it will redirect to the login page

if(!isset($_SESSION['username'])){
    header("Location:login.php");
}
elseif($_SESSION['usertype'] == "admin"){
    header("location: login.php");
}


?>
<html>
    <head>

        <link rel = "stylesheet" type = "text/css" href =  "admin.css">
        <title>Admin Dashboard</title>
    </head>
    <body>
        
        
        <?php include 'student_css.php' ?>
       <?php include 'student_sidebar.php'?>

                <div class = "content">
                    <h1>
                        Welcome to Student Panel!
                    </h1>
                </div>
        
    </body>
</html>
