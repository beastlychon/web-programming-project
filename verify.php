<?php
error_reporting(E_ERROR | E_PARSE);
if(session_id() == '' || !isset($_SESSION))
{session_start();}
if(!empty($_POST))
{
include '../phpconfig.php';
$username = mysqli_real_escape_string($mysqli, $_POST["email"]);
$password = mysqli_real_escape_string($mysqli, $_POST["pwd"]);
$flag = 'true';
$no=1;
$q1 = $mysqli->prepare('SELECT fname,lname,email,pswd,batch,branch,gender,regno from students WHERE email=?');
$q1->bind_param('s',$username);
if(!$q1->execute())
{
  echo 'Execution problem';
}
$q1->bind_result($fname,$lname,$email,$upswd,$batch,$branch,$gender,$regno);

if($q1->fetch()!=NULL)
{
    

    if($email == $username && md5($password)==$upswd)
    {
      $_SESSION['email'] = $email;
      $_SESSION['regno'] = $regno;
      $_SESSION['fname'] = $fname;
      $_SESSION['lname'] = $lname;
      $_SESSION['id'] = $id;
      header("location:studentattendance.php");

        
    }
    else
     {
        if($flag === 'true')
        {
          
          header("Refresh: 2; url=loginstudent.php");
  echo '<div align="center"><h2>Wrong Credentials</h2></div>';
  
          $flag = 'false';
        }
    }
}
else
{
  header("Refresh: 2; url=loginstudent.php");
  echo '<div align="center"><h2>Wrong Credentials</h2></div>';
  
}
}
?>