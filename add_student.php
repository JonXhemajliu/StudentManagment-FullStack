<?php
session_start();

//Checking if the usertype is student and if not it will redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
} elseif ($_SESSION['usertype'] == "student") {
    header("location: login.php");
}

//Configuring the database connection 
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'e-school';

//Connecting to the database
$data = mysqli_connect($host, $user, $password, $db);

//Inserting the data from user 
if (isset($_POST['add_student'])) {

    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];

    $user_password = $_POST['password'];
    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT);

    $usertype = 'student';
    //Checking data from the database
    $check = "SELECT * FROM user WHERE username = '$username'";

    $check_user = mysqli_query($data, $check);
    $row_count = mysqli_num_rows($check_user);


    //Checking if there is already a username 
    if ($row_count == 1) {

        echo " <script type = 'text/javascript'>
        alert('Username already exists');
        </script>";
    }
    //Loop for inserting data into the database
    else {

        $sql = "INSERT INTO user(username ,email,phone,password,usertype) VALUES ('$username','$user_email','$user_phone','$hashed_password','$usertype')";

        $result = mysqli_query($data, $sql);

        if ($result) {
            echo " <script type = 'text/javascript'>
        alert('Student Added Successfully');
        </script>";
        } else {
            die("Upload failed");
        }
    }
}
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="admin.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Add Student</title>
    <style type="text/css">
        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;

        }

        .div_deg {
            background-color: aqua;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>

<body>

    <?php

    include 'admin_sidebar.php';

    ?>
    <div class="positioning">
        <form action="" method="POST">

            <div class="content">
                <center>

                    <h1>
                        Add Student
                    </h1>

                    <div>
                        <label>Username</label>
                        <input type="text" name="name">
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="text" name="email">
                    </div>

                    <div>
                        <label>Phone</label>
                        <input type="number" name="phone">
                    </div>

                    <div>
                        <label>Password</label>
                        <input type="password" name="password">
                    </div>

                    <div>
                        <input type="submit" class="btn btn-primary " name="add_student" value="Add student">
                    </div>
        </form>

        </center>
    </div>

    </div>

</body>

</html>