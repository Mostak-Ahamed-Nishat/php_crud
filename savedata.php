<?php

$student_name = $_POST['sname'];
$student_address = $_POST['saddress'];
$student_class = $_POST['class'];
$student_phone = $_POST['sphone'];

$connection = mysqli_connect("localhost", "root", "", "crud") or die("Couldn't connect'");
$query = "INSERT INTO student(sname,saddress,sclass,sphone)values('{$student_name}','{$student_address}','{$student_class}','{$student_phone}')";
$result = mysqli_query($connection, $query) or die("Data Send Failed");

header("Location:http://localhost:8080/Php crud/index.php");

mysqli_close($connection);
