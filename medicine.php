<?php
@include("connection.php");

if (isset($_POST["submit"])) {
    $meds = $_POST["meds"];
    $price = $_POST["price"];
    $amount = $_POST["amount"];

    $insert = "INSERT INTO medicine(meds,price,amount)VALUES('$meds','$price','$amount')";
    $result = mysqli_query($conn, $insert);
    if ($result) {
        echo "patient added success";

    } else {
        echo "error while adding patient";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Order Form</title>
</head>

<body>
    <form action="#" method="POST">
        <label>Needed medicine:</label>
        <br>
        <br>
        <input type="checkbox" name="meds" id="meds" value="panadol"> Panadol
        <input type="number" id="amount" name="amount" required>
        <br>
        <input type="checkbox" name="meds" id="meds" value="eno"> Eno
        <input type="number" id="amount" name="amount" required>
        <br>
        <input type="checkbox" name="meds" id="meds" value="kaluma"> Kaluma
        <input type="number" id="amount" name="amount" required>
        <br>
        <input type="checkbox" name="meds" id="meds" value="others"> Others
        <input type="number" id="amount" name="amount" required>
        <br>
        <br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>
        <br>
        <br>
        <button name="submit" type="submit" id="submit">Send Request</button>
    </form>
</body>

</html>