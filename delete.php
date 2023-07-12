<?php 
session_start();


//Configuring the database connection
$host = 'localhost';
$user = 'root';
$password = '';
$db ='e-school';

//Connecting to the database
$data = mysqli_connect($host,$user,$password,$db);

//Deleting the student from the database
if(isset($_GET['student_id'])){
    $user_id = $_GET['student_id'];
    $sql = "DELETE FROM user WHERE id = '$user_id' ";
    $result = mysqli_query($data,$sql);

    //Loop for showing if the student is deleted or not 
    if($result){
        $_SESSION['message'] = 'Student Deleted Successfully';
         header("location:view_student.php");
    }
    else{
        echo"Error deleting record";
    }

}

?>