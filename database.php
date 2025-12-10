<?php 
$conn = mysqli_connect("localhost", "root", "", "homestay");
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>