<?php
@include("connection.php");
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST["email"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]); // Escape the email

    $delete = "DELETE FROM mutant WHERE email = '$email'";
    $result = mysqli_query($conn, $delete);

    if ($result && mysqli_affected_rows($conn) > 0) {
        $message = "Patient deleted successfully.";
    } else {
        $message = "Error: No user found with the specified Email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link rel="stylesheet" href="sign-up.css">
</head>
<body>
    <center>
        <h1>Delete account</h1>
        <?php if (!empty($message)): ?>
            <p><?= htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Remove account</button>
        </form>
    </center>
</body>
</html>
