<?php 

//Kk

session_start();

//Configuring the database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "e-school";


//Connecting to the database
$data = mysqli_connect($host,$user,$password,$db);

if($data ==  false){
    die("Connection to database failed");
}

//Loop for applying for student admission
if(isset($_POST['apply'])){
    $data_name= mysqli_real_escape_string($data,$_POST["name"]);
    $data_email=mysqli_real_escape_string($data,$_POST["email"]);
    $data_phone = mysqli_real_escape_string($data, $_POST["phone"]);
    $data_message = mysqli_real_escape_string($data, $_POST["message"]);
}


//Inserting the values into the database for admission
$sql ="INSERT INTO admission(name,email,phone,message)VALUES ('$data_name','$data_email','$data_phone','$data_message')";

//Updating the database
$result = mysqli_query($data, $sql);

if($result){
    $_SESSION["message"] = "Your application is sent successfully";
    header("location:index.php");
}
else {
    die("Apply failed");
}
?>