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

//Selecting all the student usertypes for student view
$sql = "SELECT * FROM user WHERE usertype= 'student'";

//Assigning the infomration on the variable result
$result = mysqli_query($data, $sql);

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>View Student</title>

</head>

<body>

    <?php

    include 'admin_sidebar.php';

    ?>
    <div class="content">
        <center>

            <h1>
                Student Data
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
                    <th class="table_th"> Username </th>
                    <th class="table_th"> Email </th>
                    <th class="table_th"> Phone </th>
                    <th class="table_th"> Password </th>
                    <th class="table_th">Delete</th>
                    <th class="table_th">Update</th>
                </tr>

                <?php
                while ($info = $result->fetch_assoc()) {


                ?>
                    <tr>

                        <td class="table_td">
                            <?php echo $info['username'];  ?>
                        </td>

                        <td class="table_td">
                            <?php echo $info['email']; ?>
                        </td>

                        <td class="table_td">
                            <?php echo $info['phone'] ?>
                        </td>

                        <td class="table_td">
                            <?php echo $info['password'] ?>
                        </td>

                        <td class="table_td">
                            <?php
                            echo "<a class = 'btn btn-danger' onClick = \"javascript: return confirm('Are You Sure you want to delete this ?'); \" href = 'delete.php?student_id={$info['id']}' > Delete </a>";
                            ?>

                        <td class="table_td">
                            <?php
                            echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'>Update</a>";
                            ?>

                        <?php
                    }
                        ?>
                        </td>


                        </td>

                    </tr>


            </table>

        </center>
    </div>



</body>

</html>