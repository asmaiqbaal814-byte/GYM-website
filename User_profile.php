<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile</title>
</head>
<body style="font-family: Arial; background: #111; color: white; text-align:center;">
  <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?> 👋</h1>
  <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
  <p>Here you can view your packages, classes, and progress soon.</p>
  <a href="logout.php" style="color: red;">Logout</a>
</body>
</html>
