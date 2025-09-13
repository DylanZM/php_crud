<?php
include("../db/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM crud_php WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Task deleted successfully";
    } else {
        $_SESSION['message'] = "Error deleting task";
    }
}

header("Location: ../index.php");
exit();
?>