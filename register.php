<?php
session_start();

// Include database connection
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the POST data and sanitize it
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $dob = htmlspecialchars($_POST["dob"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $address = htmlspecialchars($_POST["address"]);
    $city = htmlspecialchars($_POST["city"]);
    $country = htmlspecialchars($_POST["country"]);

    // Check if passwords match
    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepare the insert query
    $stmt = $conn->prepare("INSERT INTO mutant (name, email, phone, dob, gender, address, city, country, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $name, $email, $phone, $dob, $gender, $address, $city, $country, $hashed_password);

    // Execute the query and check for errors
    if ($stmt->execute()) {
        // Store user ID in session
        $_SESSION['user_id'] = $conn->insert_id;

        // Redirect to profile page
        header("Location: myprofile.html");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="sign-up.css">
</head>
<body>
    <div class="container">
        <form method="POST" action="register_copy.php">
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="text" name="phone" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" required>

            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="address">Address:</label>
            <input type="text" name="address" required>

            <label for="city">City:</label>
            <input type="text" name="city" required>

            <label for="country">Country:</label>
            <input type="text" name="country" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" required>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
