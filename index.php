
<?php 
include 'connection.php';
session_start();

if(!isset($_SESSION["email"])){
    header("Location:register.php");
}
if(isset($_POST['submit'])){
    $image = rand().$_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    $destination = "images/".$image;
    if (move_uploaded_file($tmpname, $destination)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $roll=$_POST['roll'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
          
    
    $query = "INSERT INTO `students` (`name`, `image`, `email`, `phone`, `roll`, `address`, `gender`) VALUES ('$name', '$image', '$email', '$phone', '$roll', '$address', '$gender')";

    $data=mysqli_query($con,$query);

    if($data){
       ?>
       <script>
        alert("data saved successfully")
       </script>
       <?php
    } else {
        ?>
       <script>
        alert("please try again")
       </script>
       <?php
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD operation</title>
    
</head>
<body>
    
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone"><br><br>
        <label for="roll">Roll No:</label>
        <input type="text" id="roll" name="roll"><br><br>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address"><br><br>
        
        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
        <input type="radio" id="others" name="gender" value="others">
        <label for="others" id="others" name="others">Others</label><br><br>
        <label for="">Upload image</label>
        <input type="file" name="image"><br><br>

        <input type="submit" name="submit" value="Submit">
        <button><a href="view.php">View</a></button> <br><br>
        </form>
    </div>

   
    
</body>
</html>
