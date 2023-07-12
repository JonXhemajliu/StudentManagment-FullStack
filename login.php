<?php 
error_reporting(0);

// ini_set('session.use_only_cookies',1);
// ini_set('session.use_strict_mode',1);
// session_set_cookie_params([
    //     'lifetime' => 1800,
    //     'domain' => 'localhost',
    //     'path' => '/',
    //     'secure' => true,
    //     'httponly' => true
    // ]);
    
    
    // if(!isset($_SESSION['last_regeneration'])){
        //     session_regenerate_id(true);
    //     $_SESSION['last_regeneration'] = time();
    // }
    //     else {
        //         $interval = 60 * 6;
        
        //         if(time() - $_SESSION['last_regeneration'] >= $interval){
            //             session_regenerate_id(true);
            //             $_SESSION['last_regeneration'] = time();
            //         }
            //     } 
            
            
            
            // sesssion_regenerate_id(true);
            // session_destroy();
            
            // error_reporting(0);

            session_start();
$loginMessage = isset($_SESSION['loginMessage']) ? $_SESSION['loginMessage'] : '';
?>


<html>
    <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body background = "school2.jpg" class = "body_deg">
            <title>
                Login form
            </title>

<center>
    <div class = "form_deg">
        <center class = "title_deg">
            Login Form
            <h4>
                <?php 
                
                echo $_SESSION['loginMessage'];
                ?>
            </h4>
        </center>
        <form action = "login_check.php" method = "POST" class = "login_form">
            <div>
                <label class = "label_deg">Username </label>
                    <input type="text" name = "username">
            </div>

            <div>
                <label class = 'label_deg'>
                    Password
                </label>
                    <input type="password" name = "password">
            </div>

            <div>
                    <input class = "btn btn-primary"type="submit" name = "submit" value = "Login">
            </div>
        </form>
    </div>
</center>
        </body>
</html>