<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "attendance");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$announcement = mysqli_real_escape_string($link, $_REQUEST['announcement']);
 
// Attempt insert query execution
$sql = "INSERT INTO announcement (announcement) VALUES ('$announcement')";
if(mysqli_query($link, $sql)){
    echo "<h3 style='text-align:center;'>Announcement Made successfully!</h3>";
    header("Refresh:2; url=announcement.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>