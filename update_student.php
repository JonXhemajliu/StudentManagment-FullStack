<?php
session_start();

//Checking if the usertype is student and if not it will redirect to the login page
echo isset($ksd);

if (!isset($_SESSION['username'])) {
    header("Location:login.php");
} elseif ($_SESSION['usertype'] == "student") {
    header("location: login.php");
}

//Configuring connection to database
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'e-school';

$data = mysqli_connect($host, $user, $password, $db);

$id = $_GET['student_id'];

$sql = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($data, $sql);

$info = $result->fetch_assoc();

if (isset($_POST['updateStudent'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    $query = "UPDATE user SET username = '$name', email = '$email', phone = '$phone', password = '$password' WHERE id = '$id' ";

    $result2 = mysqli_query($data, $query);

    if ($result2) {

        header("location: view_student.php");
        echo "Updated Successfully";
    }
}

//jidfnm
?>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Student</title>

    <style>
        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            width: 400px;
            padding-bottom: 70px;
            padding-top: 70px;
        }
    </style>

</head>

<body>

    <?php

    //Including the style of admin sidebar
    include 'admin_sidebar.php';

    ?>
    <center>
        <div class="content">

            <h1>
                Update Student!
            </h1>

            <div class="div_deg">

                <form action="update_student.php" method="POST">
                    <div>
                        <label for="">Username</label>
                        <input type="text" name="username" value="<?php echo "{$info['username']}"; ?>">
                    </div>

                    <div>
                        <label for="">Email</label>
                        <input type="email" name="email" value=<?php echo "{$info['email']}"; ?>>
                    </div>

                    <div>
                        <label for="">Phone</label>
                        <input type="number" name="phone" value=<?php echo "{$info['phone']}" ?>>
                    </div>

                    <div>
                        <label for="">Password</label>
                        <input type="text" name="password" value="<?php echo isset($info['password']) ? $info['password'] : ''; ?>">
                    </div>
                    <div>
                        <input type="text" name="id" value="<?php echo $info['id'] ?>">
                    </div>

                    <div>
                        <input class="btn btn-success" type="submit" name="updateStudent" value="updateStudent">
                    </div>

                </form>

            </div>

        </div>
    </center>

</body>

</html> 