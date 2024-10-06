<?php
include 'connection.php';
?>

  <a href="index.php" style="text-decoration: none; color: #333; font-weight: bold; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #f0f0f0; transition: background-color 0.3s, color 0.3s;" >Home</a><br><br>
<table border="1" cellpadding="10px" cellspacing="0">
    <tr>
        <th>S.N</th>
        <th>Name</th>
        <th>Image</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Roll</th>
        <th>Address</th>
        <th>Gender</th>
        <th colspan="3">Actions</th>
    </tr>
    <?php
    $query = "SELECT * FROM `students`";
    $data = mysqli_query($con, $query);
    $result = mysqli_num_rows($data);
    
    if ($result) {
        $i=1;
        while ($row = mysqli_fetch_array($data)) {  
            ?>
            <tr>
             <td><?php echo $i ?></td>
             <td><?php echo $row['name']; ?></td>
             <td><img src="/form/images/<?php echo $row['Image']; ?>" width="50" height="50"></td>

                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['roll']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                
               
                <td><a href="update.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                <td><a href="viewId.php?d=<?php echo $row['id']; ?>">viewId</a></td>

                <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

            </tr>
            <?php
            $i++;
        }
    } else {
        ?>
        <tr>
            <td colspan="7">No record found</td>
        </tr>
        <?php
    }
    ?>
</table>