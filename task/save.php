<?php
include("../db/db.php"); 

if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];


    $query = "INSERT INTO crud_php(title, description) VALUES ('$title', '$description')";
   $result = mysqli_query($conn, $query);

   if (!$result) {
       die("Query Failed.");
   }
   echo "Task Saved Successfully";


    $_SESSION['message'] = 'Task Saved Successfully';
    $_SESSION['message_type'] = 'success';
    


   header("Location: ../index.php");
} 



?>