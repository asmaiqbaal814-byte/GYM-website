<?php
// Start a new or existing session (used to remember user info while logged in)
session_start();

// Connect to the database
include 'db_connect.php';

// Check if login form was submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get email and password entered by the user
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Step 1: Check if the email exists in the 'users' table
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    // Step 2: If exactly one record found → user exists
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result); // Fetch user info as an array

        // Step 3: Verify password matches the hashed password in database
        if (password_verify($password, $user['password'])) {

            // Step 4: Store user info in SESSION (used across all pages)
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            // Step 5: Redirect to the user’s profile page
            header("Location: User_profile.php");
            exit();
        } else {
            // Wrong password
            echo "<script>alert('Incorrect password!'); window.location.href='login.html';</script>";
        }
    } else {
        // No user found with that email
        echo "<script>alert('Email not found! Please sign up first.'); window.location.href='login.html';</script>";
    }
}
?>
