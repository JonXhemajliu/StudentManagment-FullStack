<?php
//Setting the reports all to true(1)
//error_reporting(1);
session_start();

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'>alert('$message')</script>";
}

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'e-school';

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM teacher";

$query = mysqli_query($data, $sql);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Student Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>

    <nav>
        <label class="logo">
            e-School
        </label>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="admission.php">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>

    <img class="first_image" src="school_managment.jpg">
    <div class="section1">
        <label class="first_text">Teaching students with care</label>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_image" src="school2.jpg">
            </div>
            <div class="col-md-8">
                <h1>Welcome to e-School</h1>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
            </div>
        </div>
    </div>
    <center>
        <h1>Our Teachers</h1>
    </center>

    <div class="container">
        <div class="row">

            <?php while ($info = $query->fetch_assoc()) {  ?>
                <div class="col-md-4">

                    <img class="teacher" src="<?php echo "{$info['subject']}" ?>">

                    <h3><?php echo "{$info['name']}" ?> </h3>
                    <h3><?php echo "{$info['subject']}" ?> </h3>

                <?php  } ?>

                </div>
                <div class="col-md-4">
                    <img class="teacher" src="python.png">


                </div>
                <div class="col-md-4">
                    <img class="teacher" src="php.jpg">
                </div>

                </div>
        </div>

        <br>
        <br>
        <br>
        <br>


        <center>
            <h1>Our Courses</h1>
        </center>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="teacher" src="graphicsD.png">
                </div>
                <div class="col-md-4">
                    <img class="teacher" src="socialMedia.jpg">
                </div>
                <div class="col-md-4">
                    <img class="teacher" src="marketing.jpg">
                </div>
            </div>
        </div>

        <center>
            <h1 class="adm">Admission</h1>
        </center>

        <div class="admission_form">
            <form action="data_check.php" method="POST">
                <div class="adm_int">
                    <label class="label_text">Name</label>
                    <input class="input_text" type="text" name="name">
                </div>
                <div class="adm_int">
                    <label>Email</label>
                    <input class="input_text" type="text" name="email">
                </div>
                <div class="adm_int">
                    <label class="label_text">Phone</label>
                    <input class="input_text" type="text" name="phone">
                </div>
                <div class="adm_int">
                    <label class="label_text">Message</label>
                    <textarea class="input_text" name="message"></textarea>
                </div>
                <div class="apply_button">
                    <div class="adm_int">
                        <input class="btn btn-primary" id="submit" type="submit" value="apply" name="apply">
                    </div>
                </div>
            </form>
        </div>

        <footer>
            <h3 class="Footer_text">
                All @copyright reserved
            </h3>
        </footer>
</body>

</html>