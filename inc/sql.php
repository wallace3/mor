<?php 


function conexion(){

$con = mysqli_connect("localhost","root","","gamers_code");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


  return ($con);



  					}
  					
  					
  					
 					
  					
?>
