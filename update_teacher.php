<?php
session_start();


if (!isset($_SESSION['username'])) {
    header('location:login.php');
} elseif ($_SESSION['usertype'] == 'student') {
    header('location:login.php');
}

$host = 'localhost';
$user = 'user';
$password = '';
$db = 'e-school';

$data = mysqli_connect($host, $user, $password, $db);

$id = $_GET['teacher_id'];

$sql = "SELECT * FROM teacher WHERE id = '$id'";

$result = mysqli_query($data, $sql);

$info = $result->fetch_assoc();

// if (isset($_GET['teacher_id'])) {
// }

if (isset($_POST['updateTeacher'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $id = $_POST['id'];

    $file = isset($_FILES['image']['name']);
    $file_tmp = isset($_FILES['image']['tmp_name']);

    $dst = "./image/" . $file;
    $dst_db = "image/".$file;

    $query = "UPDATE teacher SET name = '$name', subject = '$subject' WHERE id = '$id'";

    $result2 = mysqli_query($data, $query);

    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    if ($result2) {
        header("location: view_teacher.php");
        echo "Updated Successfully";
    }
}
?>

<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Update Teacher</title>

    <style>
        label {
            display: inline-block;
            width: 150px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .form_deg {
            width: 600px;
            padding-top: 70px;
            padding-bottom: 70pxs;
            border-radius: 10px;
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
                Update Teacher's Data
            </h1>

            <form class="form_deg" action="update_teacher.php" method="POST" enctype="multipart/form-data">

                <input type="text" name="id" value="<?php echo "{$info['id']} " ?>" hidden>

                <div>
                    <label for="">Teacher's Name</label>
                    <input type="text" name="name" value="<?php echo "{$info['name']}" ?>">
                </div>

                <div>
                    <label for="">Teacher's Subject</label>
                    <input type="text" name="subject" value="<?php echo "{$info['subject']}" ?>">
                </div>

                <div>
                    <label for="">Teacher's Old Image</label>
                    <img width="100px" height="100px" src="teacher.jpg">
                </div>

                <div>
                    <label for="">Teacher's New Image: </label>
                    <img width="100px" height="100px" src="" alt="">
                    <input type="file" name="image">
                </div>

                <div>
                    <input type="submit" name="updateTeacher" value="updateTeacher" class="btn btn-success">
                </div>


            </form>
        </div>
    </center>


</body>

</html>