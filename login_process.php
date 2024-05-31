<?php
// Include database configuration
include_once 'db_config.php';

// Start session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Prepare SQL statement to retrieve user data
    $sql = "SELECT * FROM users WHERE email = '$email'";

    // Execute SQL statement
    $result = mysqli_query($conn, $sql);

    // Check if user exists
    if (mysqli_num_rows($result) > 0) {
        // Fetch user data
        $row = mysqli_fetch_assoc($result);

        // Verify password
        if ($password === $row['password']) {
            // Password is correct, set username in session
            $_SESSION['username'] = $row['username'];
            // Redirect to main.php
            header("Location: main.php");
            exit;
        } else {
            // Password is incorrect, set error message and redirect to login page
            $_SESSION['error'] = "Incorrect password!";
            header("Location: login.php");
            exit;
        }
    } else {
        // User does not exist, set error message and redirect to login page
        $_SESSION['error'] = "User not found!";
        header("Location: login.php");
        exit;
    }
} else {
    // If the form is not submitted, redirect back to login page
    header("Location: login.php");
    exit;
}
?>
