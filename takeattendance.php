<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
if(!isset($_SESSION["email"])) {
  header("location:loginteacher.php");
}
$currentPage = 'myaccount';
include '../phpconfig.php';
?>


<html>

<head>
    <title>
        Take Attendance
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
                    <a class="nav-link" href="takeattendance.php">Take Attendance<span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
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

                <!-- <button class="btn btn-info my-2 my-sm-0" type="submit">Log Out</button> -->
                <a class="nav-link" href="logout.php">Log Out</a>
            </form>
        </div>
    </nav>


    <form action="submitattendance.php" name="attendance" method="post">

    <div class="container" style="margin-top: 5%; text-align: center; margin-bottom: 40px;">
        <h4 style="margin-bottom: 20px;">Take Attendance Here!</h4>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Date</label>
            <input type="date" id="date" name="date" class="date">
        </div>
        <hr>
    </div>



    <?php 
        $sql = "SELECT * FROM students";
        $res = mysqli_query($mysqli, $sql);
    ?>



    <table class="table table-striped" style="text-align: center;">
        <thead>
            <tr>
                <th scope="col">Present/Absent</th>
                <th scope="col">Student Name</th>
                <th scope="col">Registration Number</th>
                <th scope="col">Batch</th>
            </tr>
        </thead>
        <tbody>
            <?php while($r = mysqli_fetch_assoc($res)){ ?>
                 <tr>
                    <td scope="row">
                        <?php
                            echo '<input type="checkbox" class="form-check-input lol" name="lol[]" value="' . $r['regno'] . '">';
                        ?>

                    </td>
                    <!-- <td scope="row"><input class="form-check-input" type="checkbox" value="" id="defaultCheck1"></td> -->
                    <td><?php echo  $r['fname'] ?></td>
                    <td><?php echo  $r['regno'] ?></td>
                    <td>Batch <?php echo  $r['batch'] ?></td>
                </tr>
            <?php } ?>

            <!-- 
            <tr>
                <td scope="row"> <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"></th>
                <td>Himanshu</td>
                <td>RA1711003010400</td>
                <td>Batch 1</td>
            </tr>-->

        </tbody>

    </table>
    <div class="container">
        <div class="row">
            <div class="col" style="text-align: center;">
                <input type="submit" value="Submit" name="submit">
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </div>
        </div>
    </div>
</form>



</body>

</html>