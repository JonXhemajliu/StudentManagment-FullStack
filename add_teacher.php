<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
} elseif ($_SESSION['usertype'] == "student") {
    header("location: login.php");
}

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'e-school';

$data = mysqli_connect($host, $user, $password, $db);



if (isset($_POST['add_teacher'])) {
    $name = $_POST["name"];
    $subject = $_POST['subject'];

    $file = isset($_POST['password']['name']);
    $dst = "./image/" . $file;
    $dst_db = "image/" . $file;

    move_uploaded_file(isset($_FILES['image']['tmp_name']), $dst);

    $sql = "INSERT INTO teacher(name, subject,image) VALUES ('$name','$subject', '$dst_db')";
    $result = mysqli_query($data, $sql);

    if ($result) {
        header('location:view_teacher.php');
        echo "<script type='text/javascript'>
                       alert('Student Added Successfully');
                       window.location.href = 'add_teacher.php';
                        </script>";
    } else {
        die("Error Adding teacher:" . $name);
    }


    $row_count = mysqli_num_rows($result);
    if ($row_count >= 1) {
        echo "Username already exists";
    } else {
        echo "<script type='text/javascript'>
    //                 alert('Student Added Successfully');
    //                 </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'admin_sidebar.php' ?>

    <link rel="stylesheet" type="text/css" href="admin.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <title>Teacher Page</title>
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

    <center>
        <div class="content">

            <form action="add_teacher.php" method="POST" enctype="multipart/form-data">

                <h1>
                    Add Teacher !
                </h1>

                <div>
                    <label>Name</label>
                    <input type="text" name="name">
                </div>

                <div>
                    <label>Subject</label>
                    <input type="text" name="subject">
                </div>

                <!-- <div>
                    <label>Password</label>
                    <input type="password" name="password">
                </div> -->

                <div>
                    <input type="file">
                </div>

                <div>
                    <input type="submit" class="btn btn-primary " name="add_teacher" value="Add Teacher">
                </div>

            </form>

        </div>
    </center>

</body>

</html>