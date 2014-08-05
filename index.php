<?php


include_once("inc/sql.php");



$con = conexion();

$sql = "select * from sales limit 10";

$result = mysqli_query($con, $sql);

$row = mysqli_fetch_array($result);

mysqli_free_result($result);

mysqli_close($con);

print_r($row);





?>