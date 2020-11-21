<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
if(!isset($_SESSION["email"])) {
  header("location:loginteacher.php");
}
$currentPage = 'announcement';
include '../phpconfig.php';


$sql = "SELECT * FROM announcement";
$res = mysqli_query($mysqli, $sql);
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
                <li class="nav-item">
                    <a class="nav-link" href="takeattendance.php">Take Attendance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewattendance.php"> Past Attendance</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="viewstudents.php"> View Students</a>
                </li>
                 <li class="nav-item active">
                    <a class="nav-link" href="announcement.php"> <span
                            class="sr-only">(current)</span>Announcement</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a class="nav-link" href="logout.php">Log Out</a>
            </form>
        </div>
    </nav>


    <div class="container" style="margin-top: 5%; text-align: center; margin-bottom: 40px;">
        <h4 style="margin-bottom: 20px;">Manage Announcements Here!</h4>
        <hr>
    </div>

<form action="save_announcement.php" method="post">
    <div class="container">
        <div class="row">
            <div class="col" style="text-align: center;">
                 <div class="form-group">
    <label for="exampleFormControlTextarea1">Make an announcement</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="announcement"></textarea>
  </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>



    <div class="container" style="margin-top: 5%; text-align: center; margin-bottom: 40px;">
        <h4 style="margin-bottom: 20px;">Delete Announcements!</h4>
        <hr>
    </div>
    <div class="container">
        <div class="row">
        <?php while($r = mysqli_fetch_assoc($res)){ ?> 
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body" style="background-color: #F8D7DA;">
                        <p><?php echo $r['announcement'] ?></p>
                    </div>
                    <div class="card-footer">
                        <p class="buti"><a href="delete.php?id=<?php echo $r['id']; ?>" class="btn btn-danger" role="button">Delete</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>


</body>

</html>