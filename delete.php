<?php
    include "connection.php";
    
    $id = $_GET["id"]; 

    $query = "DELETE FROM `students` WHERE id='$id'";
    
    

    if(mysqli_query($con, $query)){
        header("Location:index.php");
    }else{
        echo "something went wrong";
    }



?>