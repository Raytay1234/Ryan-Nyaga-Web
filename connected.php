<?php
$conn= mysqli_connect("localhost","root","mutanthunter",);
if($conn){
    echo "connection succesful";
}
else{
    echo "connection failure";
}
?>