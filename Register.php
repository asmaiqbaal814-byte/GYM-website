<?php
// Include database connection file
include 'db_connect.php';

// Check if the form was submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect input data from the signup form (from 'name' attributes in HTML)
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Encrypt the password before saving to the database (important for security)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Step 1: Check if the email already exists in the database
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($check) > 0) {
        // If the email already exists → show message and redirect to login page
        echo "<script>alert('Email already registered! Try logging in.'); window.location.href='login.html';</script>";
        exit();
    }

    // Step 2: Insert the new user into the 'users' table
    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

    // Step 3: Run the query and check if it worked
    if (mysqli_query($conn, $query)) {
        // If successful → show alert and go back to login
        echo "<script>
        alert('Registration successful! You can now log in.'); 
        window.location.href='login.html?show=login';
        </script>";
    } else {
        // If failed → show the MySQL error
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!-- echo "<script>
alert('Registration successful! You can now log in.');
window.location.href='login.html?show=login';
</script>"; -->