<?php
// Include database connection
include 'connection.php';
// Retrieve the ID from the URL parameter
$id = $_GET['d'];

// Query to fetch record based on ID
$query = "SELECT * FROM students WHERE id = $id";
$result = mysqli_query($con, $query);

// Check if record exists
if (mysqli_num_rows($result) > 0) {
    // Fetch record details
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card</title>
    <style>
       h1{
       color:red;
       }
        .id-card {
            width: 300px;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            background-color: #f0f0f0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .id-card img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .id-card p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

  <form method="GET">
  <center>
    
    <div class="id-card">
    <h1>Student ID Card</h1>
        <img src="/form/images/<?php echo $row['Image']; ?>" alt="Student Image">
        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
        <p><strong>Roll Number:</strong> <?php echo $row['roll']; ?></p>
        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
        <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
        <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
        <p><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
        
    </div>
    </center>
  </form>
</body>
</html>
<?php
} else {
    echo "ID not found";
}


?>