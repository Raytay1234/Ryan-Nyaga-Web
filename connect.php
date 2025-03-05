<?php
$conn= mysqli_connect("localhost","root","","illnesses",);
if($conn){
    echo "connection succesful";
}
else{
    echo "connection failure";
}
?>