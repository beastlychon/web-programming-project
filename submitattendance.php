<?php
$link = mysqli_connect("localhost", "root", "", "attendance");
if(session_id() == '' || !isset($_SESSION)){session_start();}
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$date =$_POST["date"];
echo "<h3 style='text-align:center;'>". $date ."</h3>";
    if(!empty($_POST['lol'])) {
        foreach($_POST['lol'] as $value){
            echo "value : ".$value.'<br/>';
        }
    }

$present="Present";
$absent="Absent";
// $subject="Web Programming";
$subject=$_SESSION['subject'];
 $sql = "SELECT * FROM students";
        $res = mysqli_query($link, $sql);
while($r = mysqli_fetch_assoc($res)) {
	if (in_array($r['regno'], $_POST['lol'])){
		$haha=$r['regno'];
		$lul=$r['fname'];

		echo $haha;
		echo $date;
		echo $present;
		echo"<br>";
		 $sql1="INSERT INTO attdn(student_id,name,class_date,status,subject) VALUES ('$haha','$lul','$date','$present','$subject')";
        mysqli_query($link,$sql1);
	}
 	else {
 		$haha=$r['regno'];
 		$lul=$r['fname'];
 		echo $haha;
		echo $date;
		echo $absent;
		echo"<br>";
 		$sql2="INSERT INTO attdn(student_id,name,class_date,status,subject) VALUES ('$haha','$lul','$date','$absent','$subject')";
        mysqli_query($link,$sql2);
 	}

}
header("location:viewattendance.php");
// Close connection
mysqli_close($link);
?>