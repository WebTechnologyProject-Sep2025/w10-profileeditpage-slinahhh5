<?php
session_start();
include('db_connection.php');  


if (!isset($_SESSION['username'])) {
    header('Location: login.php');  
    exit;
}

$username = $_SESSION['username']; 
$new_email = $_POST['email']; 


$query = "UPDATE user SET email = '$new_email' WHERE username = '$username'";
if (mysqli_query($conn, $query)) {
    
    header('Location: profile.php');
} else {
    echo "Error updating email: " . mysqli_error($conn);
}
?>

