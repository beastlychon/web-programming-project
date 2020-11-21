<?php 
// include ('php/session.php');
include ('../phpconfig.php');
?>
<html>

<head>
    <title>
        Login Teacher
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body style="background-color: #48C4BA;">
    <form name="login" action="verifyfaculty.php" method="POST">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-6 mx-auto">
                    <div class="card" style="padding:40px;border-radius: 10px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                        <div style="text-align:center">
                            <h5>Faculty Login</h5>
                        </div>
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" aria-describedby="emailHelp" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="pwd" minlength="8" required>
                            </div>
                            <button class="btn btn-primary" id="form-submit" type="submit" name="submit">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- scripts -->
    <script>
        function validateForm() {
            var x = document.forms["myForm"]["email"].value;
            var y = document.forms["myForm"]["password"].value;
            if (x == "") {
                alert("Email must be filled out.");
                return false;
            }
            if (y == "") {
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