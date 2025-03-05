<?php
@include("connection.php");
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST["user_id"])) {
    $user_id = intval($_POST["user_id"]); 

    $delete = "DELETE FROM mutant WHERE user_id = $user_id";
    $result = mysqli_query($conn, $delete);

    if ($result && mysqli_affected_rows($conn) > 0) {
        $message = "Patient deleted successfully.";
    } else {
        $message = "Error: No patient found with the specified ID.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Patient</title>
    <link rel="stylesheet" href="delete.css">
</head>
<body>
    <center>
        <h1>Remove Patient</h1>
        <?php if (!empty($message)): ?>
            <p><?= htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <form method="post">
            <label for="user_id">Patient ID:</label>
            <input type="number" id="user_id" name="user_id" required>
            <button type="submit">Remove Patient</button>
        </form>
    </center>
</body>
</html>
