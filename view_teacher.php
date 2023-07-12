<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
} elseif (isset($_SESSION['usertype'])) {
    header('location:login.php');
}

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'e-school';


$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM teacher";

$result = mysqli_query($data, $sql);

if (isset($_GET['teacher_id'])) {

    $teacher_id = $_GET['teacher_id'];
    $sql2 = "DELETE FROM teacher WHERE id = '$teacher_id'";

    $result2 = mysqli_query($data, $sql2);

    if ($result2) {
        $_SESSION['message'] = "Deleted successfully";
        header("location: view_teacher.php");
        exit();
    } else {
        die("Error deleting record");
    }
}

?>

<html>

<head>
    <style type=text/css>
        .table_th {
            padding: 20px;
            font-size: 20px;
        }

        .table_td {
            padding: 20px;
            background-color: aqua;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>View Teachers</title>
</head>

<body>

    <?php

    include 'admin_sidebar.php';

    ?>
    <div class="content">
        <center>

            <h1>
                Teachers
            </h1>

            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
            }

            unset($_SESSION['message']);

            ?>

            <br>

            <table>
                <tr>
                    <th class="table_th"> Name </th>
                    <th class="table_th">Subject </th>
                    <th class="table_th">Image</th>
                    <th class="table_th">Delete</th>
                    <th class="table_th">Update</th>
                </tr>

                <?php
                while ($info = $result->fetch_assoc()) {
                ?>
                    <tr>

                        <td class="table_td">
                            <?php echo $info['name'];  ?>
                        </td>

                        <td class="table_td">
                            <?php echo $info['subject']; ?>
                        </td>

                        <td class="table_td">
                            <img height="100px" width="100px" src="<?php echo $info['image']; ?>">
                        </td>

                        <td class="table_td">
                            <?php
                            echo "<a class = 'btn btn-danger' onClick = \"javascript: return confirm('Are You Sure you want to delete this ?'); \" href = 'view_teacher.php?teacher_id={$info['id']}' > Delete </a>";
                            ?>

                        <td class="table_td">
                            <?php

                            echo "<a href = 'update_teacher.php?teacher_id={$info['id']}' class = 'btn btn-primary'> Update </a> ";
                
                            
                            ?>

                        </td>

                        </td>

                    </tr>

                <?php
                }
                ?>

            </table>

        </center>
    </div>



</body>

</html>