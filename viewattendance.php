<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
if(!isset($_SESSION["email"])) {
  header("location:loginteacher.php");
}
include '../phpconfig.php';
?>
<html>
<head>
    <title>
        Past Attendance
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>

     <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="#"> 
            <?php echo $_SESSION['fname'];echo" "; echo $_SESSION['lname'];?>
                
            </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="takeattendance.php">Take Attendance</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="viewattendance.php"> Past Attendance</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="viewstudents.php"> View Students</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="announcement.php"> Announcement</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a class="nav-link" href="logout.php">Log Out</a>
            </form>
        </div>
    </nav>


 <form action="#" name="viewattendance" method="post">
    <div class="container" style="margin-top: 5%; text-align: center; margin-bottom: 40px;">
        <h4 style="margin-bottom: 20px;">View who all were present in your class.</h4>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Date</label><br/> 
            <input type="date" id="date" name="date" class="date"><br/>
            <button type="submit" class="btn btn-primary" name="register_btn" style="margin-top: 20px;">View</button>
        </div>
        <hr>
    </div>
</form>

<?php

    if(isset($_POST['register_btn'])){
        $dater=$_POST['date'];
        $sql = "SELECT * FROM attdn where class_date='".$dater."'";
        $res = mysqli_query($mysqli, $sql);
        echo'<table class="table table-striped" style="text-align: center;">';
        echo'<thead>';
        echo'<tr>';
        echo'<th scope="col">Student Name</th>';
        echo'<th scope="col">Registration Number</th>';
        echo'<th scope="col">Date</th>';
        echo'<th scope="col">Attendance</th>';
        echo' </tr>';
        echo'</thead>';
        echo'<tbody>';
         while($r = mysqli_fetch_assoc($res)){
            echo"<tr>";
            echo'<td scope="row">'.$r['name'].'</td>';
            echo'<td>'.$r['student_id'].'</td>';
            echo'<td>'.$r['class_date'].'</td>';
            echo'<td>'.$r['status'].'</td>';
            echo"</tr>";

         }
          echo'</tbody>'; 
           echo'</table>';    
    }   

?>


</body>

</html>