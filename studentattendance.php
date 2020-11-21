<?php
// include ('php/logincheck.php');
if(session_id() == '' || !isset($_SESSION)){session_start();}
if(!isset($_SESSION["email"])) {
  header("location:loginstudent.php");
}

include '../phpconfig.php';

$sql = "SELECT * FROM announcement";
$res = mysqli_query($mysqli, $sql);
?>
<html>
<head>
    <title>
        My Attendance
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
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a class="nav-link" href="logout.php">Log Out</a>
            </form>
        </div>
    </nav>


<!-- Announcements! -->
<div class="container">
    <div style="margin-top: 40px">
        <?php while($r = mysqli_fetch_assoc($res)){ ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $r['announcement'] ?>
            </div>
        <?php } ?>
</div>
</div>
<!-- End Announcements! -->



    <div class="container" style="margin-top: 5%; text-align: center; margin-bottom: 40px;">
        <h4>Hey, you can view your Attendance here!</h4>
        <hr>
    </div>

<?php
        $regno=$_SESSION['regno'];
        $sql = "SELECT * FROM attdn where student_id='".$regno."'";
        $res = mysqli_query($mysqli, $sql);
        echo'<table class="table table-striped" style="text-align: center;">';
        echo'<thead>';
        echo'<tr>';
        echo'<th scope="col">Subject Name</th>';
        echo'<th scope="col">Date</th>';
        echo'<th scope="col">Attendance</th>';
        echo' </tr>';
        echo'</thead>';
        echo'<tbody>';
         while($r = mysqli_fetch_assoc($res)){
            echo"<tr>";
            echo'<td scope="row">'.$r['subject'].'</td>';
            echo'<td>'.$r['class_date'].'</td>';
            echo'<td>'.$r['status'].'</td>';
            echo"</tr>";

         }
          echo'</tbody>'; 
           echo'</table>';    
  

?>
 <!--    <table class="table table-striped" style="text-align: center;">
        <thead>
            <tr>
                <th scope="col">Subject Name</th>
                <th scope="col">Faculty</th>
                <th scope="col">Date</th>
                <th scope="col">Attendance</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Web Programming</th>
                <td>John Doe</td>
                <td>10/10/20</td>
                <td>Presnt</td>
            </tr>
            <tr>
                <th scope="row">Computer System Architecture</th>
                <td>Mark</td>
                <td>10/03/20</td>
                <td>Absent</td>
            </tr>
            <tr>
                <th scope="row">Calculus</th>
                <td>John Doe</td>
                <td>10/10/20</td>
                <td>Presnt</td>
            </tr>
            <tr>
                <th scope="row">Artificial Intelligence</th>
                <td>Mark</td>
                <td>10/03/20</td>
                <td>Absent</td>
            </tr>
            <tr>
                <th scope="row">Machine Learning</th>
                <td>Mark</td>
                <td>10/03/20</td>
                <td>Absent</td>
            </tr>
        </tbody>
    </table>
 -->



</body>

</html>