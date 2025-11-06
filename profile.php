<?php
session_start();
include('db_connection.php');  


if (!isset($_SESSION['username'])) {
    header('Location: login.php');  
    exit;
}

$username = $_SESSION['username'];  


$query = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<h2>Profile</h2>
<p>Username: <?php echo $user['username']; ?></p>
<p>Email: <span id="email"><?php echo $user['email']; ?></span></p>


<button id="editButton">Edit Email</button>

<div id="editForm" style="display: none;">
    <form method="POST" action="update_profile.php">
        <label for="email">New Email: </label>
        <input type="email" name="email" required value="<?php echo $user['email']; ?>">
        <input type="submit" value="Update Email">
    </form>
</div>

<script>
    document.getElementById("editButton").onclick = function() {
        document.getElementById("editForm").style.display = "block";
    };
</script>

