<?php

$student_id = $_POST['sid'];
$student_name = $_POST['sname'];
$student_address = $_POST['saddress'];
$student_class = $_POST['sclass'];
$student_phone = $_POST['sphone'];

$connection = mysqli_connect("localhost", "root", "", "crud") or die("Couldn't connect'");
$query = "UPDATE student SET sname='{$student_name}',saddress='{$student_address}',sclass='{$student_class}',sphone='{$student_phone}' WHERE sid={$student_id}";
$result = mysqli_query($connection, $query) or die("Data Send Failed");

header("Location:http://localhost:8080/Php crud/index.php");

mysqli_close($connection);
