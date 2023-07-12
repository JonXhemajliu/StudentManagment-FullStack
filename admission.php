<?php 
session_start();

//Checking if the usertype is student and if not it will redirect to the login page
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}
elseif($_SESSION['usertype'] == "student"){
    header("location: login.php");
}

//Configuring the database connection 
$host = 'localhost';
$password = '';
$user = 'root';
$db = 'e-school';

//Connecting
$data = mysqli_connect($host,$password,$user,$db);

//Selecting all the user from admission table
$sql = 'SELECT * FROM admission';

//Updating the mysqli query with the value of data and the sql
$result = mysqli_query($data,$sql);

?>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel = "stylesheet" type = "text/css" href =  "admin.css">
        <title>Admin Dashboard</title>
    </head>
    <body>

   
        <header class = "header">
        <a href = "logout.php">  
                   <h1>Admision</h1>
                   
                   
                   <div class = "logout">
                       <a href="login.php" class = "btn btn-primary">Log out</a>
                       
                    </div>
         </a>
                </header>
                <aside>
                    <ul>

                        <li>
                            <a href="admission.php">Admission</a>
                        </li>

                        <li>
                            <a href="add_student.php">Add Student</a>
                        </li>

                        <li>
                            <a href = "view_student.php">View Student</a>
                        </li>

                        <li>
                            <a href="teacher.php">View Teacher</a>
                        </li>

                        <li>
                            <a href="teacher.php">Add Teacher</a>
                        </li>


                        <li>
                            <a href="">View Courses</a>
                        </li>

                    </ul>
                </aside>

            <div class = "content">
              <center>   
                        <h1>
                            Welcome to Admin Panel!
                        </h1>

                        <table>
                            <tr>
                                <th style = "padding:20px;font-size:15px;">Name</th>
                                <th style = "padding:20px;font-size:15px;">Email</th>
                                <th style = "padding:20px;font-size:15px;">Phone</th>
                                <th style = "padding:20px;font-size:15px;">Message</th>
                            </tr>
                            
                            <?php
                        
                        while($info = $result ->fetch_assoc()){
                            
                            ?>
                        <tr>
                            <td style = "padding:20px;">
                                <?php echo "{$info['name']}";?>
                            </td>
                            
                            <td style = "padding:20px;">
                                <?php echo "{$info['email']}"; ?>
                            </td>
                            
                            <td style = "padding:20px;">
                                <?php echo "{$info['phone']}"; ?>
                            </td>
                            
                            <td style = "padding:20px;">  
                                <?php echo "{$info['message']}" ?>
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
            