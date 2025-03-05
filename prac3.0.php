<?php
@include("connect.php");

if (isset($_POST["createuser"])) {
    $name = $_POST["name"];
    $reasons = $_POST["reason"]; // Array of selected reasons

    // Insert the patient
    $insertPatient = "INSERT INTO patients (Name) VALUES ('$name')";
    $patientResult = mysqli_query($conn, $insertPatient);

    if ($patientResult) {
        // Get the PatientID of the newly inserted patient
        $patientID = mysqli_insert_id($conn);

        // Insert each reason into the VisitReasons table
        foreach ($reasons as $reason) {
            $insertReason = "INSERT INTO illnessreason(patientsID, reason) VALUES ('$patientID', '$reason')";
            mysqli_query($conn, $insertReason);
        }

        echo "Patient and reasons added successfully!";
    } else {
        echo "Error while adding patient: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
</head>
<body>
    <center>
        <div class="register-container">
            <h1>Register</h1>
            <form action="#" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter name" required> 
                <br><br>
                
                <label>Reason For Visit:</label>
                <br><br>
                <input type="checkbox" name="reason[]" value="Medication Renewal"> Medication Renewal
                <br>
                <input type="checkbox" name="reason[]" value="Doctors appointment"> Doctor's Appointment
                <br>
                <input type="checkbox" name="reason[]" value="In-Patient Visit"> In-Patient Visit
                <br>
                <input type="checkbox" name="reason[]" value="Patient Clearance"> Patient Clearance
                <br><br>

                <button name="createuser" type="submit">Submit</button>
            </form>
        </div>
    </center>
</body>
</html>
