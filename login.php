<?php
include("connection.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashed_password=md5($password);
    

    // Query to check if user exists
    $stmt = "SELECT * FROM mutant WHERE email = '$email' AND password = '$password'";
    $stmtres=mysqli_query($conn, $stmt);
    // $stmt->execute();
    // $stmt->store_result();
    // $stmt->bind_result($user_Id, $hashed_password);
    
    if ($stmtres) {
        // Verify the password
        
            $_SESSION['user_id'] = $user_id; // Set session variable
            header("location:lifeofadevcopy.php"); // Redirect to home page
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    }

    // $stmtres->close();
    // $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
       <link rel="stylesheet" href="login.css">
</head>
<body>
    <form action="lifeofadevcopy.php" method="POST"> <!-- Changed to redirect to dashboard.html -->
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <a href="lifeofadev.html"><button type="submit">Login</button></a>

            <div class="forgot-password">
                <a href="#">Forgot your password?</a>
            </div>
        </form>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
</body>
</html>