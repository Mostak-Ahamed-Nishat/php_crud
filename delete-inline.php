<?php
echo $std_id = $_GET['id'];

include 'config.php';
$sql_query = "DELETE FROM student where sid={$std_id}";
$result = mysqli_query($connection, $sql_query) or die("Failed");

header("Location:http://localhost:8080/Php%20crud/index.php");
mysqli_close($connection);
