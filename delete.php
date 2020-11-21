<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "attendance");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$id = mysqli_real_escape_string($link, $_REQUEST['id']);
 
// Attempt insert query execution
$sql = "Delete From announcement where id='$id'";
if(mysqli_query($link, $sql)){
    echo "<h3 style='text-align:center;'>Announcement Deleted!</h3>";
    header("Refresh:2; url=announcement.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>