<!DOCTYPE html>
<html>
<head>
    <title>Login - Kings Luxury</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />
</head>
<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-image: url('images/cover4.jpg'); background-size: cover;">
    <div class="border rounded p-5 bg-white bg-opacity-50 shadow-sm" style="max-width: 400px;">
        <h2 class="intro-text text-center">Login to Kings Luxury Restaurant</h2>
        <?php 
        // Start session
        session_start();

        // Display error message as alert if session error is set
        if(isset($_SESSION['error'])): ?>
            <script>alert("<?php echo $_SESSION['error']; ?>");</script>
            <?php unset($_SESSION['error']);
        endif;

        // Display success message as alert if session success is set
        if(isset($_SESSION['success'])): ?>
            <script>alert("<?php echo $_SESSION['success']; ?>");</script>
            <?php unset($_SESSION['success']);
        endif;
        ?>

        <form action="login_process.php" method="post" onsubmit="return validateLogin();">
            <div class="form-floating form-group">
                <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" required>
                <label for="email" class="form-label">Email:</label>
            </div>
            <div class="form-floating form-group mt-3">
                <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control" required>
                <label for="password" class="form-label">Password:</label>
            </div>
            <p class="text-center" style="color: black;">Don't have an account? <a href="signup.php" style="color: blue;">Signup here</a></p>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-brand">Login</button>
            </div>
        </form>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function validateLogin() {
            // Perform client-side validation if needed
            return true; // Return true if the form is valid, false otherwise
        }
    </script>
</body>
</html>
