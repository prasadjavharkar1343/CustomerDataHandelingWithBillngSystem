<?php
include("config.php");
 
//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");
 echo "<body style='background-color:yellow'>";

header("Location:index.php");
?>