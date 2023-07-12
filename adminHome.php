<?php 
session_start();

//Checking if the usertype is student and if not it will redirect to the login page

if(!isset($_SESSION['username'])){
    header("Location:login.php");
}
elseif($_SESSION['usertype'] == "student"){
    header("location: login.php");
}


?>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel = "stylesheet" type = "text/css" href =  "admin.css">
        <title>Admin Dashboard</title>
    </head>
    <body>

    <?php 

    //Including the style of admin sidebar
    include 'admin_sidebar.php';
    
    ?>
                <div class = "content">
                    <h1>
                        Welcome to Admin Panel!
                    </h1>
                    <p>
                    orem Ipsum is simply dummy text of the printing and typesetting industry.
                     Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                      when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                </div>
        
    </body>
</html>
