
<?php  
include 'connection.php';

// Check if ID is provided via GET
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch data from the database
    $select = "SELECT * FROM `students` WHERE id='$id'";
    $data = mysqli_query($con, $select);
    $row = mysqli_fetch_array($data);
}

// Check if form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $roll = $_POST['roll'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    
    // Update query
    $update_query = "UPDATE `students` SET 
                    name='$name', 
                    email='$email', 
                    phone='$phone', 
                    roll='$roll', 
                    address='$address', 
                    gender='$gender' 
                    WHERE id='$id'";
    
    // Execute the update query
    if(mysqli_query($con, $update_query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>
<?php include "navbar.php"; ?>
    <div>
    
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']??""; ?>"><br><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
            
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>"><br><br>
            
            <label for="roll">Roll No:</label>
            <input type="text" id="roll" name="roll" value="<?php echo $row['roll']; ?>"><br><br>
            
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>"><br><br>
            
          <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="male" <?php if(isset($row['gender']) && $row['gender'] == 'male') echo 'checked'; ?>>
         <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" <?php if(isset($row['gender']) && $row['gender'] == 'female') echo 'checked'; ?>>
         <label for="female">Female</label>
        <input type="radio" id="others" name="gender" value="others" <?php if(isset($row['gender']) &&  $row['gender'] == 'others') echo 'checked'; ?>>
            <label for="others">Others</label><br><br>
            <label for="">Upload image</label>
        <input type="file" name="image"><br><br>

    
            <input type="submit" name="submit" value="Update">
            <a href="view.php">View</a>
        </form>
    </div>
