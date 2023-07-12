<?php
session_start();

// error_reporting(E_ALL); // Enables error reporting for debugging purposes
// error_reporting(0);

//Configuring the database connection
$host = "localhost";
$password = "";
$user = "root";
$db = "e-school";

//Connnecting to the database
$data = mysqli_connect($host, $password, $user, $db);

if ($data == false) {
    die("Connection failed");
}

//Checking if the username and password are okay
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($data, $_POST['username']);
    $password = mysqli_real_escape_string($data, $_POST['password']);

    $sql = "SELECT * FROM user WHERE username = '$name' AND password = '$password'";
    $result = mysqli_query($data, $sql);

    if (!$result) {
        die("Query failed"); // Handle query execution error
    }

    $row = mysqli_fetch_array($result);
 
    //Seperating the usertypes: admin and student
    if ($row) {
        $usertype = $row["usertype"];
        if ($usertype == "student") {
            $_SESSION['username'] = $name;
            $_SESSION['usertype'] = $usertype;
            header('location: studentHome.php');
            exit();
        } elseif ($usertype == "admin") {
            $_SESSION['username'] = $name;
            $_SESSION['usertype']= $admin;
            header("location: adminHome.php");
            exit();
        }
    }

    $_SESSION['loginMessage'] = "Username or password do not match";
    header('location: login.php');
    exit();
}
?>
