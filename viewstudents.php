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
<style>
table,th,td {
  border : 1px solid black;
  border-collapse: collapse;
}
th,td {
  padding: 5px;
}
</style>
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
                 <li class="nav-item active">
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

    <div class="container" style="margin-top: 5%; text-align: center; margin-bottom: 40px;">
        <h4 style="margin-bottom: 20px;">View all students.</h4>

        <hr>

        <button type="button" onclick="loadXMLDoc()">View All Students</button>
<br><br>
<table id="demo"></table>
    </div>
   

<script>
function loadXMLDoc() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      myFunction(this);
    }
  };
  xmlhttp.open("GET", "students.xml", true);
  xmlhttp.send();
}
function myFunction(xml) {
  var i;
  var xmlDoc = xml.responseXML;
  var table="<tr><th>Name</th><th>Registration Number</th></tr>";
  var x = xmlDoc.getElementsByTagName("STUDENT");
  for (i = 0; i <x.length; i++) { 
    table += "<tr><td>" +
    x[i].getElementsByTagName("NAME")[0].childNodes[0].nodeValue +
    "</td><td>" +
    x[i].getElementsByTagName("REGNO")[0].childNodes[0].nodeValue +
    "</td></tr>";
  }
  document.getElementById("demo").innerHTML = table;
}
</script>

</body>

</html>