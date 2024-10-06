<?php
include "connection.php";
    if(isset($_POST["register"])){
        print_r($_POST);
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $cpass = $_POST["cpassword"];

        if($pass != $cpass){
            echo "<span>Passwords do not match.</span>";
        }else{
            $dbQuery = "INSERT INTO `students` (`name`, `email`, `password`) VALUES ('$name', '$email', '$pass')";

            if(mysqli_query($con, $dbQuery)){
                echo "Inserted success";
                session_start();

                $_SESSION["email"] = $email;
                header("Location:index.php");
            }

        }




    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <style>
        .login{
            width: 400px;
            height: 380px;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            background-color: #f0f0f0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
        }
        
    </style>
</head>
<body>

    <div class="login">
        <center><h1>Register Page</h1></center>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br><br>
            <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="password"> New Password:</label>
        <input type="password" id="pass" name="password">
        <br><br>
        <label for="password"> Confirm Password:</label>
        <input type="password" id="pass" name="cpassword"><br><br>
         <button type="submit" name="register">Register</button>
    </form>
    </div>

</body>
</html>