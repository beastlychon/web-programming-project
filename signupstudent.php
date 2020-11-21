<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$db=mysqli_connect("localhost","root","","attendance");
$passworderror="";
if(isset($_POST['register_btn'])){
    session_start();
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $regno=$_POST['regno'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $batch=$_POST['batch'];
    $branch = $_POST['branch'];
    $gender = $_POST['gender'];

    if($password==$cpassword){
        //create user
        $password=md5($password);//hash password before storing it
        $sql="INSERT INTO students(fname,lname,email,pswd,batch,branch,gender,regno) VALUES ('$fname','$lname','$email','$password','$batch','$branch','$gender','$regno')";
        mysqli_query($db,$sql);
        $_SESSION['message']="You are now logged in";
        header("location:studentattendance.php");
    }
    else{
        //failed
        $passworderror = "Password don't match!";
    }
    }   

?>

<html>
<head>
    <title>
        Sign Up Student
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body style="background-color: #8481B6;">


    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-6 mx-auto">
                <div class="card" style="padding:40px;border-radius: 10px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                    <div style="text-align:center">
                        <h4>Student Sign Up!</h4>
                    </div>
                    <form method="post" action="signupstudent.php">
                        <div class="row" style="margin-top: 20px;">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="First name" name="fname" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Last name" name="lname" required>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Registration Number" name="regno" required>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col">
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                            <div class="col">
                                <input type="password" class="form-control" placeholder="Confirm Password"
                                    name="cpassword" required>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Batch" name="batch" required>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col">
                                <label for="exampleFormControlSelect1">Branch</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="branch">
                                    <option>CSE</option>
                                    <option>IT</option>
                                    <option>Mechanical</option>
                                    <option>ECE</option>
                                    <option>EEE</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender"
                                        id="exampleRadios1" value="male" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Male
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender"
                                        id="exampleRadios2" value="female">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <span class="error" style="color: red;"><?php echo $passworderror;?></span><br/>
                        <button type="submit" class="btn btn-primary" name="register_btn" style="margin-top: 20px;">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- scripts -->
    <script>
        function validateForm() {
            var a = document.forms["myForm"]["fname"].value;
            var b = document.forms["myForm"]["lname"].value;
            var c = document.forms["myForm"]["email"].value;
            var d = document.forms["myForm"]["password"].value;
            var e = document.forms["myForm"]["cpassword"].value;
            var f = document.forms["myForm"]["batch"].value;
            var g = document.forms["myForm"]["branch"].value;
            if (a == "") {
                alert("First Name must be filled out.");
                return false;
            }
            if (b == "") {
                alert("Last Name must be filled out.");
                return false;
            }
            if (c == "") {
                alert("Email must be filled out.");
                return false;
            }
            if (d == "") {
                alert("Password must be filled out.");
                return false;
            }
            if (e == "") {
                alert("Please Confirm Password.");
                return false;
            }
            if (f == "") {
                alert("Batch must be filled out.");
                return false;
            }
            if (g == "") {
                alert("Password must be filled out.");
                return false;
            }
        }
    </script>





    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>

</html>