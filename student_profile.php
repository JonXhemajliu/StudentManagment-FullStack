<?php
session_start();

//Checking if the usertype is student and if not it will redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
} elseif ($_SESSION['usertype'] == "admin") {
    header("location: login.php");
}


$host = 'localhost';
$user = 'root';
$password = '';
$db = 'e-school';

$data = mysqli_connect($host, $user, $password, $db);

$name = $_SESSION['username'];

$sql = "SELECT * FROM user where username = '$name' ";
$result = mysqli_query($data, $sql);
$info = mysqli_fetch_assoc($result);

if (isset($_POST['updating_profile'])) {

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = (isset($_POST['password']));

    $sql2 = "UPDATE user SET email = '$email', phone = '$phone', password = '$password' WHERE username = '$name' ";
    $result2 = mysqli_query($data, $sql2);

    if ($result2) {
        header('location:student_profile.php');
    }
}

?>
<html>

<head>
    <style>
        label {
            display: inline-block;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        h2 {
            padding-left: 450px;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="admin.css">
</head>

<body>


    <?php include 'student_css.php' ?>
    <?php include 'student_sidebar.php' ?>


    <center>
        <h2>Profile Update</h2>
        <div class="content">

            <form action="" method="POST">

                <div>
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?php echo "{$info['email']}"; ?>">
                </div>

                <div>
                    <label for="">Phone</label>
                    <input type="phone" name="phone" value="<?php echo "{$info['phone']}"; ?>">
                </div>

                <div>
                    <label for="">password</label>
                    <input type="text" name="Password" value="<?php echo $info['password']; ?>">
                </div>

                <div>
                    <input class="btn btn-success" type="submit" name="updating_profile">
                </div>

            </form>

        </div>

    </center>
</body>

</html>