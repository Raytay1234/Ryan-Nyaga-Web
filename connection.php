<?php
$conn = mysqli_connect("localhost", "root", "", "hospital",);
if ($conn)
 {
    echo "connection succesful";
} else {
    echo "connection failure";
}
